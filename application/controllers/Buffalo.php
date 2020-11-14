<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Buffalo extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->v = true;
        $this->v = false;
    }

//    http://localhost/tools/index.php/Buffalo/serialBuffalo
    public function serialBuffalo() {
        $this->load->view('header');
        $this->load->view('buffalo_serial');
        $this->load->view('footer');
    }

    public function serialBuffaloValid() {
        $this->load->model('olsdb_model');
        $this->olsdb_model->getCon();
        $this->load->model('buffalo_model');
        $this->load->view('header');
        $serial = $_POST["serial"];
        if ($serial == "") {
            $this->serialBuffaloError($serial);
            return;
        }
        $licenses = $this->olsdb_model->getValuesByConstraints("license", "buffalo", "serial = '$serial'");
//        var_dump($licenses);
//        die();
        $productType = $this->buffalo_model->serialCheckValidator($serial);
        if (empty($licenses)) {
            if ($productType == 'LinkStation') {
                $data = array("serial" => $serial, "productType" => $productType);
                $this->load->view('buffalo_link', $data);
            } elseif ($productType == 'TeraStation') {
                $data = array("serial" => $serial, "productType" => $productType);
                $this->load->view('buffalo_tera', $data);
            } else {
                $this->serialBuffaloError($serial);
//                echo( "<br><br><button onclick= \"location.href='serialBuffalo'\">Check Again</button>");
            }
        } else {
            $data = array("serial" => $serial, "license" => $licenses);
            $this->load->view('buffalo_license', $data);
        }
        $this->load->view('footer');
    }

//    public function serialProduct() {
//        $this->load->model('buffalo_model');
//        $serial = $_GET["serial"];
//        $productType = $_GET["productType"];
//        $parameters = array("productType" => $productType, "product" => $_GET["product"], "quantity" => $_GET["quantity"], "cloudStorage" => $_GET["cloudStorage"]);
//        $productTypeValid = $this->buffalo_model->serialCheckValidator($serial);
//        if ($productType != $productTypeValid) {
//            throw ErrorException;
//        } else {
//            $url = $this->serialURL($parameters);
//            header("Location: $url");
//        }
//    }
//
////        $priceOptionPrice = "";
////        if($customPrice !== null) $priceOptionPrice = "&PRICES$productId"."[USD]=$customPrice";
////        $hashedParameters = "QTY=1&PRODS=$productId&OPTIONS$productId=$priceOption$priceOptionPrice";
////        if($customPrice !== null) $hashedParameters = $this->tconotification->addHashToCustomPurchaseLink($hashedParameters);
////        $purchaseUrl = "$baseURL?$hashedParameters&$nonhashedParameters";
////        return $purchaseUrl;
//
//    public function serialURL($parameters) {
//        $this->config->load('products');
//        $this->load->library('TCONotification');
//        $subscriptionPricing = $this->config->item('new_subscription_pricing');
//        $product = $parameters["product"];
//        $quantity = $parameters["quantity"];
//        $productType = $parameters["productType"];
//        $cloudStorage = $parameters["cloudStorage"];
//        if ($product === 'pc5') {
//            $cloudStorage = 5;
//        }
//        $productID = $this->config->item('2coProductIds')["subscription"][$product];
//        $price = $subscriptionPricing[$product][$cloudStorage];
//        if ($productType === 'LinkStation') {
//            $customPrice = (($subscriptionPricing[$product][$cloudStorage]) * $quantity) - 100;
//        } else if ($productType === 'TeraStation') {
//            $customPrice = (($subscriptionPricing[$product][$cloudStorage]) * $quantity) - 150;
//        } else {
//            throw ErrorException;
//        }
//        if ($customPrice < 0) {
//            $customPrice = 0;
//        }
//        $baseURL = "https://secure.2checkout.com/order/checkout.php";
//        $nonhashedParameters = "SHORT_FORM=1&CLEAN_CART=1";
//        $hashedParameters = "QTY=$quantity&PRODS=$productID&PRICES$productID" . "[USD]=$customPrice";
//        $hashedParameters = $this->tconotification->addHashToCustomPurchaseLink($hashedParameters);
//        $purchaseUrl = "$baseURL?$hashedParameters&$nonhashedParameters";
//        return $purchaseUrl;
//    }

    public function serialProduct() {
        $this->load->model('buffalo_model');
        $serial = $_GET["serial"];
        $productType = $_GET["productType"];
        $product = $_GET["product"];
        $novaPlan = $_GET["novaPlan"];
        if ($product === 'pc5' && $novaPlan === 'new_subscription_pricing') {
            $cloudStorage = $_GET["cloudStorageSub"];
//            echo 'sub';
//            var_dump($cloudStorage);
//            die();
        } else if ($product === 'pc5' && $novaPlan === 'new_perpetual_pricing') {
            $cloudStorage = $_GET["cloudStoragePer"];
//            echo 'per';
//            var_dump($cloudStorage);
//            die();
        } else {
            $cloudStorage = $_GET["cloudStorage"];
        }
        $parameters = array("productType" => $productType, "product" => $product, "quantity" => $_GET["quantity"], "cloudStorage" => $cloudStorage, "novaPlan" => $novaPlan);
        $productTypeValid = $this->buffalo_model->serialCheckValidator($serial);
        if ($productType != $productTypeValid) {
            throw ErrorException;
        } else {
            $url = $this->serialURL($parameters);
            header("Location: $url");
        }
    }

//        $priceOptionPrice = "";
//        if($customPrice !== null) $priceOptionPrice = "&PRICES$productId"."[USD]=$customPrice";
//        $hashedParameters = "QTY=1&PRODS=$productId&OPTIONS$productId=$priceOption$priceOptionPrice";
//        if($customPrice !== null) $hashedParameters = $this->tconotification->addHashToCustomPurchaseLink($hashedParameters);
//        $purchaseUrl = "$baseURL?$hashedParameters&$nonhashedParameters";
//        return $purchaseUrl;

    public function serialURL($parameters) {
        $this->config->load('products');
        $this->load->library('TCONotification');
        $novaPlan = $parameters["novaPlan"];
        $planPricing = $this->config->item($novaPlan);
        $product = $parameters["product"];
        $quantity = $parameters["quantity"];
        $productType = $parameters["productType"];
        $cloudStorage = $parameters["cloudStorage"];
        if ($novaPlan === 'new_subscription_pricing') {
            $productID = $this->config->item('2coProductIds')["subscription"][$product];
        } else {
            $productID = $this->config->item('2coProductIds')["perpetual"][$product];
        }
        if ($productType === 'LinkStation') {
            $customPrice = (($planPricing[$product][$cloudStorage]) * $quantity) - 100;
//            var_dump($customPrice);
//            die();
        } else if ($productType === 'TeraStation') {
            $customPrice = (($planPricing[$product][$cloudStorage]) * $quantity) - 150;
//            var_dump($customPrice);
//            die();
        } else {
            throw ErrorException;
        }
        if ($customPrice < 0) {
            $customPrice = 0;
        }
        $baseURL = "https://secure.2checkout.com/order/checkout.php";
        $nonhashedParameters = "SHORT_FORM=1&CLEAN_CART=1";
        if ($product === "pc5") {
            if($novaPlan === "new_perpetual_pricing")
            {
                $priceOption = "pc_$cloudStorage" . "GB_p";
            }
            else {
            $priceOption = "pc_$cloudStorage" . "GB";
            }
        } else {
            $priceOption = "server_$cloudStorage" . "GB";
        }


        $hashedParameters = "QTY=$quantity&PRODS=$productID&PRICES$productID" . "[USD]=$customPrice&OPTIONS$productID=$priceOption";
        $hashedParameters = $this->tconotification->addHashToCustomPurchaseLink($hashedParameters);
        $purchaseUrl = "$baseURL?$hashedParameters&$nonhashedParameters";
        return $purchaseUrl;
    }

    public function serialBuffaloError($serial) {
        $msg = "Error. Enter valid serial number";
        $data = array("serial" => $serial, "message" => $msg);
        $this->load->view("buffalo_serial", $data);
    }

    public function enterBuffaloForm() {
        $this->load->view('buffalo_input');
    }

    public function scrapeBuffaloSubmission() {
        $this->load->model('olsdb_model');
        $this->olsdb_model->getCon();


//        echo "SUBMITTED";
        $submission = $_POST['submission'];
        $sub = [];
//        $json = file_get_contents('php://input');        
        $lines = explode("\n", $submission);
//        var_dump($lines);
        $address = 0;
        $serials = 0;
        foreach ($lines as $line) {
            $match = [];

            //Special Address Handling
            if ($address && $address < 5) {
//                if(!strpos($line, ":")){
                if ($address < 3) {
                    $sub["address$address"] = trim($line);
                }
                if ($address == 3) {  //City State, Zip
                    if (strpos($line, ",")) {
                        $arr = preg_split("/,+(?=[^,]*+$)/", $line);
                        $line = $arr[0];
                        $sub["zip"] = trim($arr[1]);
                    }
                    if (strpos($line, " ")) {
                        $arr = preg_split("/\s+(?=\S*+$)/", $line);
                        $sub["city"] = trim($arr[0]);
                        $sub["state"] = trim($arr[1]);
                    } else {
                        $sub["city"] = trim($line);
                    }
                } else if ($address == 4) {
                    $line = strtolower(trim($line));
                    if ($line == 'united states')
                        $line = 'US';
                    if ($line == 'canada')
                        $line = 'CA';
                    $sub["country"] = trim($line);
                }
                $address++;
                continue;
            }

            if (preg_match('/^Registration Form submitted at (.*)$/', $line, $match)) {
                $sub["regAt"] = trim($match[1]);
            } else if (preg_match('/^Customer Name:(\s*)?(.[^\s]*)(.*)$/', $line, $match)) {
                $sub["firstName"] = trim($match[2]);
                $sub["lastName"] = sizeof($match) > 3 ? trim($match[3]) : "";
            } else if (preg_match('/^Address:(.*)$/', $line)) {
                $address = 1;
                continue;
            } else if (preg_match('/^Company Name:(\s*)?(.*)$/', $line, $match)) {
                $sub["companyName"] = trim($match[2]);
            } else if (preg_match('/^Email:(\s*)?(.*)$/', $line, $match)) {
                $sub["email"] = trim($match[2]);
            } else if (preg_match('/^Phone:(\s*)?(.*)$/', $line, $match)) {
                $sub["phone"] = trim($match[2]);
            } else if (preg_match('/^Serial Number:(\s*)?(.*)$/', $line, $match)) {
                $serials++;
                $serial = trim($match[2]);
                $registered = $this->olsdb_model->getFirstTableRow("XParameters", "pVal = '$serial'");
                $purchase_id = $registered['purchaseId'];
                $purchase = $this->olsdb_model->getFirstTableRow("Purchases", "purchaseId = '$purchase_id'");
                if ($registered) {
                    echo "Serial: $serial is already Registered!<br>";
                    echo "<br>Registration Date: " . $purchase['creationTime'] . "<br>";
                    var_dump($registered);
                }
                $sub["serial$serials"] = $serial;
            } else if (preg_match('/^Date of Purchase:(\s*)?(.*)$/', $line, $match)) {
                $sub["purchaseDate$serials"] = trim($match[2]);
            }
        }
        $this->load->view('buffalo_form', $sub);
    }

    public function processBuffaloSubmission() {
        $this->load->model('olsdb_model');
        $this->olsdb_model->getCon();

        $this->registerBuffalo($_POST);
    }

    //Register all buffalo accounts in a csv file
    public function registerBuffalos() {
        $this->load->model('olsdb_model');
        $this->olsdb_model->getCon();


        $fn = 'C:\\Users\\brendon.eby\\Documents\\buffalo_email_body_fields_not_reg.csv';
        $f = fopen($fn, "r");
        $keys = fgetcsv($f);
        $i = 0;
        $rows = [];
        while (!feof($f)) {
            $row = fgetcsv($f);
            $ar = [];
            if ($row)
                for ($i = 0; $i < sizeof($row); $i++) {
                    $ar[$keys[$i]] = $row[$i];
                }
            $this->registerBuffalo($ar);
//            $rows[] = $ar;
        }
    }

    public function registerBuffalo($ar) {
        $this->load->model('cleverbridge_api');

        $cartItems = [];
        $extraParam = [];
        $cartItems[] = $this->generateCartItem($ar['serial1']);
        $extraParam[] = array(
            "Key" => "x-regSource",
            "Value" => "API"
        );
        $extraParam[] = array(
            "Key" => "x-serial",
            "Value" => $ar['serial1']
        );
        if (array_key_exists('serial2', $ar) && $ar['serial2']) {
            $cartItems[] = $this->generateCartItem($ar['serial2']);
            $extraParam[] = array(
                "Key" => "x-serial2",
                "Value" => $ar['serial2']
            );
        }
        if (array_key_exists('serial3', $ar) && $ar['serial3']) {
            $cartItems[] = $this->generateCartItem($ar['serial3']);
            $extraParam[] = array(
                "Key" => "x-serial3",
                "Value" => $ar['serial3']
            );
        }

        var_dump($cartItems);
        var_dump($extraParam);

        //Need to set state to process countries outside of the US (US will defualt to CA).  Countries must be specified here, with a default state, or this will not work for them.
        if (!$ar["state"] && $ar["country"] == 'MX')
            $ar["state"] = 'EM';

        $contact = array(
            "LanguageId" => strtolower($ar["language"] ?? "en"),
            "Company" => $ar["companyName"],
            "CompanyTypeId" => "COM",
            "Firstname" => $ar["firstName"],
            "Lastname" => $ar["lastName"],
            "Street1" => $ar["address1"],
            "Street2" => $ar["address2"],
            "PostalCode" => $ar["zip"],
            "City" => $ar["city"],
            "CountryId" => $ar["country"],
            "Phone1" => $ar["phone"],
            "EMail" => $ar["email"]
        );

        if ($ar['country'] == 'US' || $ar['country'] == 'CA') {
            $logonPurchaseId = 166412284;      //Generic Registration for US and CA, this is separated because those countries require states
            $contact['StateId'] = $ar["state"] ? $ar["country"] . "-" . $ar["state"] : "";      //Add state for US and CA
        } else
            $logonPurchaseId = 166562879;                                                      //Generic Registration for any countries outside of the US and CA, where CB doesn't recongize states

        $cart = array(
            "Cart" => array(
                "BillingContact" => $contact,
                "DeliveryContact" => $contact,
                "LicenseeContact" => $contact,
                "DefaultCountryId" => $ar["country"],
                "DefaultCurrencyId" => "USD",
                "DefaultLanguageId" => strtolower($ar["language"] ?? 'en'),
                "CustomerIsReseller" => "false",
                "UseInternalContacts" => "false",
//                    "LogonPurchaseId" => 0,
                "LogonPurchaseId" => $logonPurchaseId, //Generic registration in cleverbridge, under "Buffalo Customer".  Used for default values.
                "CartItems" => $cartItems,
                "ExtraParameters" => $extraParam,
            ),
            "ProcessCartMode" => "interactive",
            "FraudProtectionMode" => "disabled",
            "ExtraParameterMode" => "Default"
        );
        var_dump($cart);
        $this->cleverbridge_api->processCleverbridgeCart($cart);
    }

    public function generateCartItem($serial) {
        $this->load->model('buffalo_model');

        $product = $this->buffalo_model->serialCheckValidator($serial);
        if ($product == 'LinkStation')
            $product_id = 203060;
        else if ($product == 'TeraStation')
            $product_id = 203061;
        else {
            echo "ERROR, BAD SERIAL: $serial<br>";
            die();
        }
        return array(
            "ProductId" => $product_id,
            "Quantity" => 1,
            "Key" => "string",
            "Value" => "string"
        );
    }

}
