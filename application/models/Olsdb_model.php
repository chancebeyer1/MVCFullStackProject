<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class OLSDB_model extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->v = true;
        $this->v = false;
        
        if (!isset($this->page)) {
            $this->page = new stdClass();
        }
    }
    
    public function getCon(){
        $this->con = mysqli_connect("localhost","root","", "OLS");
        mysqli_set_charset($this->con,"utf8");
        return $this->con;
    }
    public function closeCon(){
        mysqli_close($this->con);
    }
    
    //Generate a key array, which can be used to create a novacare table in the novacare_model
    //Can also be used for other license tables
    public function generateKeyArr($lics, $items = null){
        $keys = [];
        foreach ($lics as $lic) {
            $keyAr = new stdClass();
            $keyAr->key = $lic['licenseKey'];
            if($items && array_key_exists($lic['lastPurchaseItemRunningNumber'], $items)){
                $item = $items[$lic['lastPurchaseItemRunningNumber']];
                $name = $item['productName'];
            }
            else $name = $this->getValueByConstraints('productName', 'Items', "purchaseId = '".$lic['lastPurchaseId']."' and runningNumber = '".$lic['lastPurchaseItemRunningNumber']."'");
            $keyAr->name = $name;
            $keyAr->exp = $lic['novaCareExpiration'];
            $keys[] = $keyAr;
        }
        return $keys;
    }
    
    //Update the novacare expirations for all licenses
    public function getSubscriptionForLicense($licenseKey){
        $this->load->model('ls_api');
        $con = $this->getCon();
        $license = $this->getTableRowByKey("Licenses","LicenseKey",$licenseKey);
        echo "Total Number of Licenses: $licCount<br>\n";
//        die();
        $selected = 0;
        $page = 100;
        $end = 180000;
        while($selected < $licCount){
            $res = $this->queryOLS("select * from Licenses order by licenseId limit $selected,$page");
            $numI = mysqli_num_rows($res);
            echo "Selected $selected, Number returned: $numI<br>\n";
            $i = $selected;
            $selected += $numI;
            if($selected > $end) die();
            
            $emails = [];
            while($license = $res->fetch_assoc()) {
                
//                var_dump($contact);
                $id = $license['licenseId'];
                $key = $license['licenseKey'];
                $ls_info = $this->ls_api->getLicenseInformation($key);
                $exp  = $ls_info['UpgradeSubscriptionExpirationDate'];
//                echo "$key expires on $exp\n";
                if(!$exp || $exp == '') continue;
                $exp = date("Y-m-d H:i:s", strtotime($exp));
                echo "$key expires on $exp\n";
                $this->updateOLS('Licenses', ['novaCareExpiration' => $exp], 'licenseId', $id);
//                die();
                
            }
            
//            die();
        }
    }
    
    
    public function arrayToDBInsert($table, $ar){
        $keys = array();
        $escaped_values = array();
        foreach($ar as $key => $value) {
//            echo "$key -> ".var_export($value, true)."<br>";
            if($value === null) continue;
            if($value instanceof DateTime) $value = $value->format('Y-m-d H:i:s');
            if(is_numeric($value) || is_bool($value)) $value = var_export($value, true);
            else $value = "'" . mysqli_real_escape_string($this->con, $value) . "'";
            $keys[] = $key;
            $escaped_values[] = $value;
        }
//        echo "INSERT INTO `$table` (".implode(", ", $keys).") VALUES (".implode(", ", $escaped_values).")";
//        die();
        return "INSERT INTO `$table` (".implode(", ", $keys).") VALUES (".implode(", ", $escaped_values).")";
    }
    
    //Update an array of properties, in the given table, with the specified id
    //ForceEmpty updates empty fields
    public function arrayToDBUpdate($table, $ar, $idName, $idVal = false, $forceEmpty = false, $updateIndex = false){
        $valueSets = array();
        foreach($ar as $key => $value) {
            if(!$forceEmpty && (!$value || $value === "")) continue;
            if($value instanceof DateTime) $value = $value->format('Y-m-d H:i:s');
            if(!is_numeric($value)) $value = "'" . mysqli_real_escape_string($this->con, $value) . "'";
            if($updateIndex || $key != $idName) $valueSets[] = mysqli_real_escape_string($this->con, $key) . " = $value";
        }
        $idVal = $idVal!==false?$idVal:$ar[$idName];
        if(!is_numeric($idVal)) $idVal = "'" . mysqli_real_escape_string($this->con, $idVal) . "'";
        if(empty($valueSets)) return null;   //Empty update array
        return "UPDATE `$table` set ".implode(", ", $valueSets)." where $idName = ".$idVal;
    }
    
    //Insert a row into a specified table.  Optionally include an id name, in which to store the auto increment id.
    //Returns auto generated id
    //NR doesnt update the array with the new ID.  Used when we cant pass an array by reference, ex: creating an array in the function call.
    public function insertToOLS_NR($table, $ar, $idName = false, $additional = ""){ return $this->insertToOLS($table, $ar, $idName, $additional);  }
    public function insertToOLS($table, &$ar, $idName = false, $additional = ""){
        if(!$ar || empty($ar)) return false;
        $res = $this->queryOLS($this->arrayToDBInsert($table, $ar).$additional);
        if(!$res) return false;     //Return false if failed (example, duplicate unique value)
        $id = mysqli_insert_id($this->con);
        if($idName) $ar[$idName] = $id;
        return $id;
    }
    
    public function updateOLS($table, $ar, $idName, $idVal = false, $forceEmpty = false, $updateIndex = false){
        if(empty($ar)) return null;   //Empty update array
        return $this->queryOLS($this->arrayToDBUpdate($table, $ar, $idName, $idVal, $forceEmpty, $updateIndex));
    }
    
    //Either insert a new row into a table, or update an existing one with all variables in this array.
    //Returns true if inserted, false if updated
    public function updateOrInsertOLS($table, $ar, $idName, $idVal = false, $forceEmpty = false){
        if(!$ar || empty($ar)) return false;
//        var_dump($ar);
        if(!$idVal) $idVal = $ar[$idName]??null;
        
        $result = $this->getValueByKey($idName, $table, $idName, $idVal);
        if(!$result) {
            $id = $this->olsdb_model->insertToOLS($table, $ar, $idName); 
            return $id;
        } else {
            $this->olsdb_model->updateOLS($table,$ar,$idName,$idVal,$forceEmpty);
            return false;
        }
    }
    
    //Insert bridge if not exists
    public function addBridgeOLS($table, $ar){
        reset($ar); $fk = array_key_exists('type',$ar)?'type':mysqli_real_escape_string($this->con, key($ar));
        $this->queryOLS($this->arrayToDBInsert($table, $ar)." ON DUPLICATE KEY UPDATE $fk = ".(is_numeric($ar[$fk])?$ar[$fk]:"'".$ar[$fk]."'"));
    }
    
    public function queryOLS_all($q){ 
        $ar = [];
        $ret = $this->queryOLS($q);
        while($ar[] = mysqli_fetch_array($ret,MYSQLI_ASSOC)){ continue; }
        return $ar;
    }
    public function queryOLS_array($q){ return mysqli_fetch_array($this->queryOLS($q),MYSQLI_ASSOC); }
    public function queryOLS($q){
        if($q == null) return null;
        if($this->v) echo "Executing Query: $q<br>\n";
        $res = mysqli_query($this->con, $q) or die("Query Failed! SQL: $q - Error: ".mysqli_error($this->con));
//        $res = mysqli_query($this->con, $q) or trigger_error("Query Failed! SQL: $q - Error: ".mysqli_error($this->con), E_USER_ERROR);
        if($this->v) echo "Result: ".($res?"Success":"Fail!")."<br>\n";
        return $res;
    }
    
    
    //Returns a table row as an associative array
    public function getTableRowByKey($table, $keyName, $key){
        if($table == null || $key == null || $table == "" || $key == "") return null;
        $q = "select * from $table where $keyName = ".(is_numeric($key)?$key:"'".str_replace("'","",$key)."'");
//        if($this->v) echo "Executing Query: $q<br>";
        $res = $this->queryOLS($q);
        return mysqli_fetch_array($res,MYSQLI_ASSOC);
    }
    
    public function getValueByKey($val, $table, $keyName, $key){
        if($table == null || $key == null || $table == "" || $key == "") return null;
        $q = "select $val from $table where $keyName = ".(is_numeric($key)?$key:"'".str_replace("'","",$key)."'");
//        if($this->v) echo "Executing Query: $q<br>";
        $res = $this->queryOLS($q);
        return mysqli_fetch_array($res,MYSQLI_ASSOC)[$val];
    }
    
    public function getValueByConstraints($val, $table, $constraints){
        if($table == null || $val == null || $table == "" || $val == "") return null;
        $q = "select $val from $table ".($constraints?"where $constraints ":"")."LIMIT 1";
//        if($this->v) echo "Executing Query: $q<br>";
        $res = $this->queryOLS($q);
        return mysqli_fetch_array($res,MYSQLI_ASSOC)[$val];
    }
    
    public function getValuesByConstraints($val, $table, $constraints){
        if($table == null || $val == null || $table == "" || $val == "") return null;
        $q = "select $val from $table ".($constraints?"where $constraints ":"");
//        if($this->v) echo "Executing Query: $q<br>";
        $res = $this->queryOLS($q);
        $all_res = mysqli_fetch_all($res,MYSQLI_ASSOC);
        $values = [];
        foreach($all_res as $res) $values[] = $res[$val];
        return $values;
    }
    
    //Returns a table row as an associative array
    public function getTableRows($table, $constraints){
        if($table == null || $constraints == null || $table == "" || $constraints == "") return null;
        $q = "select * from $table where $constraints";
//        if($this->v) echo "Executing Query: $q<br>";
        $res = $this->queryOLS($q);
        return mysqli_fetch_all($res,MYSQLI_ASSOC);
    }
    
    //Same as above, but only returns the first returned row
    public function getFirstTableRow($table, $constraints){
        $ret = $this->getTableRows($table, $constraints);
        if($ret) return $ret[0];
        else return null;
    }
    
    //Returns a table row as an associative array
    public function getBridgedTableRows($table, $bridge, $joinIndex, $selectIndex, $val, $type = null){
        if($table == null || $bridge == null || $joinIndex == null || $val == null || $table == "" || $bridge == "" || $joinIndex == "" || $val == "") return null;
        $q = "select $table.* from $bridge inner join $table on $table.$joinIndex = $bridge.$joinIndex";
        if($type) $q = "$q and type = '$type'";
        $q = "$q where $bridge.$selectIndex = ".(is_numeric($val)?$val:"'$val'");
        if($this->v) echo "Executing Query: $q<br>";
        $res = $this->queryOLS($q);
        return mysqli_fetch_all($res,MYSQLI_ASSOC);
    }
    
    
    //Insert or fetch a contact if it doesnt exist.  If update is set to true, then update the contact with the provided array
    function insertOrFetchContact(&$cont, $update = false){
        $ciq = $this->queryOLS("select contactId,hubspotVID,accountId from Contacts where email = '".mysqli_real_escape_string($this->con, $cont['email'])."'");
        if(!$ciq || !mysqli_num_rows($ciq)){
            $cont['contactId'] = $this->insertToOLS_NR('Contacts',$cont, 'contactId');
        }
        else { 
            $row = $ciq->fetch_assoc();
            $cont['contactId'] = $row['contactId'];
            //If we arent updating, or if the provided contact doesnt have a vid or accountid, update those in the provided contact
            if(!$update || !array_key_exists('hubspotVID', $cont) || !$cont['hubspotVID']) $cont['hubspotVID'] = $row['hubspotVID'];
            if(!$update || !array_key_exists('accountId', $cont) || !$cont['accountId']) $cont['accountId'] = $row['accountId'];
            if($update) $this->updateOLS('Contacts', $cont, 'contactId');     //Update if requested
        }
        return $cont['contactId'];
    }
}
