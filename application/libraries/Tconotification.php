<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class TCONotification
{
    
    public function __construct()
    {
        $this->v = true;
        $this->v = false;
        
        $this->pass_to_compute_hash = ")o#kMa5f*ghS9rbwQ3AH";
//        $this->pass_to_compute_hash = "AABBCCDDEEFF";
    }
    
    public function hashTest2CONotification($post_contents){
        $string_to_compute_hash = "";
        $hash_received = $post_contents["HASH"];
        
        //Build result string for hashing
        foreach ($post_contents as $key=>$val) {
            if($key != "HASH"){
                if(is_array($val)) $string_to_compute_hash .= $this->arrayExpand2CO($val);
                else{
                    $val_size = strlen(StripSlashes($val));
                    $string_to_compute_hash .= $val_size.StripSlashes($val);
                }
            }
        }
        $date_return = date("YmdGis");

        $return_string_to_hash = strlen($_POST["IPN_PID"][0]).$_POST["IPN_PID"][0].strlen($_POST["IPN_PNAME"][0]).$_POST["IPN_PNAME"][0];
        $return_string_to_hash .= strlen($_POST["IPN_DATE"]).$_POST["IPN_DATE"].strlen($date_return).$date_return;
        
        $calculated_hash =  $this->calculate2COHash($string_to_compute_hash); /* HASH for data received */
        if($calculated_hash == $hash_received){
            echo "Verified OK!";
//            echo "<br>$return_string_to_hash<br>";
            $result_hash =  $this->calculate2COHash($this->pass_to_compute_hash, $return_string_to_hash);
            echo "<EPAYMENT>".$date_return."|".$result_hash."</EPAYMENT>";
            return true;
        }else{
            echo "Hash Error on notification from 2Checkout!!\r\n\r\n";
            echo $string_to_compute_hash."\r\n\r\nHash: ".$calculated_hash."\r\n\r\nSignature: ".$hash_received."\r\n\r\nReturnSTR: ".$return_string_to_hash;
            return false;
        }
    }
    
    public function arrayExpand2CO($array){
        $retval = "";
        for($i = 0; $i < sizeof($array); $i++){
            $size        = strlen(StripSlashes($array[$i]));
            $retval    .= $size.StripSlashes($array[$i]);
        }
        return $retval;
    }
    
    public function calculate2COHash($data, $key = null){
        if(!$key) $key = $this->pass_to_compute_hash;
        $b = 64; // byte length for md5
        if (strlen($key) > $b) {
            $key = pack("H*",md5($key));
        }
        $key  = str_pad($key, $b, chr(0x00));
        $ipad = str_pad('', $b, chr(0x36));
        $opad = str_pad('', $b, chr(0x5c));
        $k_ipad = $key ^ $ipad ;
        $k_opad = $key ^ $opad;
        return md5($k_opad  . pack("H*",md5($k_ipad . $data)));
    }
    
    public function addHashToCustomPurchaseLink($parameters){
        $md5Len = strlen(StripSlashes($parameters));
        $md5Hash = $this->calculate2COHash($md5Len.$parameters);
        return "$parameters&PHASH=$md5Hash";
    }
    
}