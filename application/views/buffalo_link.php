<?PHP
get_instance()->load->helper('cloud_view_helper');
$this->config->load('products');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>LinkStation View</title>
        <script
            src="https://code.jquery.com/jquery-3.5.0.min.js"
            integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
        crossorigin="anonymous"></script>
        <style>
            body {
                width: 70%;
                margin: 75px auto;
                font-family: Arial;
            }
            h3 {
                color: #ff6666;
                text-align: center;
            }
            .center{
                color: #0066ff;
                text-align: center;
            }
            .padd {
                padding: 1px 0px;
            }
            .align {
                align-content: center;
                padding: 10px;
            }
            .container {
                max-width: 350px;
                background: #FAFAFA;
                padding: 30px;
                margin: 50px auto;
                box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
                border-radius: 10px;
                border: 6px solid #305A72;
            }
            .Cbutton {
                margin: 0 132px;
                box-shadow: inset 0px 1px 0px 0px #3985B1;
                background-color: #216288;
                border: 1px solid #17445E;
                display: inline-block;
                cursor: pointer;
                color: #FFFFFF;
                padding: 12px 18px;
                text-decoration: none;
                font: 16px Arial, Helvetica, sans-serif;
            }
            .Cbutton2 {
                margin: 0 102px;
                box-shadow: inset 0px 1px 0px 0px #3985B1;
                background-color: #216288;
                border: 1px solid #17445E;
                display: inline-block;
                cursor: pointer;
                color: #FFFFFF;
                padding: 12px 18px;
                text-decoration: none;
                font: 16px Arial, Helvetica, sans-serif;
            }
            .column {
                float: left;
                width: 31.55%;
                padding: 10px;
            }

            .row:after {
                content: "";
                display: table;
                clear: both;
            }

            .novaPlan {
                display: inline-block;
                width: 100%;
                cursor: pointer;
                padding: 10px 15px;
            }

            .cloudStorage {
                display: inline-block;
                width: 100%;
                cursor: pointer;
                padding: 10px 15px;
            }

            .cloudStoragePer {
                display: inline-block;
                width: 100%;
                cursor: pointer;
                padding: 10px 15px;
            }

            .quantity {
                height: 34px;
                width: 50px;
                border-radius: 5px;
                border: 1px solid #56CCF2;
                background-color: #eee;
                color: #333;
                padding: 0;
                text-align: center;
                font-size: 1.2em;
                margin-right: 25px;
            }
            .product-total {
                text-align: start;
                margin-top: 10px;
                margin-right: 10px;
            }

            .price-title {
                font-weight: bold;
                font-size: 1.5em;
                color: black;
                margin-right: 20px;
                padding: 10px 0px;
            }
            
            .total {
                font-size: 2em;
            }

            .totals {
                margin-top: 20px;
                margin-bottom: 40px;
            }

            .totals-item {
                float: right;
                clear: both;
                width: 100%;
                margin-bottom: 10px;


                label {
                    float: left;
                    clear: both;
                    text-align: right;
                }

                .totals-value {
                    float: right;
                    text-align: right;
                }

                .totals-item-total {
                    font-family: bold;
                }
            }

        </style>
        <script src="/tools/js/price.js" async></script>
        <script>
            $(document).ready(function () {

                var chosenPlan = $("#novaPlanJS").val();

                if (chosenPlan === "new_subscription_pricing") {

                    $("#cloudStorageSub").css("display", "block");
                    $("#cloudStoragePer").css("display", "none");

                }

                if (chosenPlan === "new_perpetual_pricing") {

                    $("#cloudStorageSub").css("display", "none");
                    $("#cloudStoragePer").css("display", "block");

                }

                $("#novaPlanJS").on('change', function () {

                    var chosenPlan = $("#novaPlanJS").val();

                    if (chosenPlan === "new_subscription_pricing") {

                        $("#cloudStorageSub").css("display", "block");
                        $("#cloudStoragePer").css("display", "none");

                    }

                    if (chosenPlan === "new_perpetual_pricing") {

                        $("#cloudStorageSub").css("display", "none");
                        $("#cloudStoragePer").css("display", "block");

                    }
                });
            });
        </script>
    </head>
    <body>
        <h1>NovaBACKUP Redemption / Order Form For Buffalo LinkStation Customers</h1>
        <h2 class="center">Option 1</h2>
        <h3>Get FREE Standard Package Items</h3>
        <div class="container">
            <h2>NovaBACKUP® Workstation Buffalo Edition - No Support</h2>
            <p>Backup software for 5 Windows PCs/Laptops – No Support/License Only</p>
            <a href = "https://store.novastor.com/243/uurl-5vhtvozpgz?cart=203060&quantity_203060=1&currencies=USD&cookie=false&x-serial=<?= $serial ?>" class="button">
                Select  
            </a>
        </div>
        <h2 class="center">Option 2</h2>
        <h3>Choose Recommended Package Items With Support and Flexible OS Choices
            and get a $100.00 CREDIT!</h3>
        <div class="row" >
            <div class="column">
                <div class="container">
                    <h2>NovaBACKUP® PC v19 Licenses (Delivered in Quantities of 5)</h2>
                    <ul>
                        <li>Complete data protection for PCs/Laptops/Workstations</li>
                        <li>Each key delivered supports up to 5 machines</li>
                        <li>Rated #1 PC backup software</li>
                        <li>File-level backups: Full | Incremental | Differential</li>
                        <li>Image-level backups – protects all applications and system</li>
                        <li>Includes NovaCARE Premium Support</li>
                    </ul>
                    <p>Purchase NovaBACKUP® PC v19 with NovaCARE Premium Support. Get the best protection and help you need!</p>
                    <form id="novaProducts" action="./serialProduct" method="GET">
                        <label for="novaPlan">NovaBACKUP Plan: </label>
                        <div class="padd">
                            <select class="novaPlan" id="novaPlanJS" name="novaPlan">
                                <option value="new_subscription_pricing">Subscription</option>
                                <option value="new_perpetual_pricing">Perpetual</option>
                            </select>
                        </div>
                        <br>
                        <label for="cloudStorage">Cloud Storage: </label>
                        <div class="padd">
                            <select class="cloudStorage" id="cloudStorageSub" name="cloudStorageSub">
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["pc5"][5] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["pc5"][0] ?>" value="5">5 GB (Free)</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["pc5"][50] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["pc5"][50] ?>" value="50">50 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["pc5"][100] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["pc5"][100] ?>" value="100">100 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["pc5"][250] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["pc5"][250] ?>" value="250">250 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["pc5"][500] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["pc5"][500] ?>" value="500">500 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["pc5"][1000] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["pc5"][1000] ?>" value="1000">1000 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["pc5"][2000] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["pc5"][2000] ?>" value="2000">2000 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["pc5"][5000] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["pc5"][5000] ?>" value="5000">5000 GB</option>
                            </select>

                            <select class="cloudStoragePer" id="cloudStoragePer" name="cloudStoragePer">
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["pc5"][5] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["pc5"][0] ?>" value="0">No Storage</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["pc5"][50] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["pc5"][50] ?>" value="50">50 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["pc5"][100] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["pc5"][100] ?>" value="100">100 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["pc5"][250] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["pc5"][250] ?>" value="250">250 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["pc5"][500] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["pc5"][500] ?>" value="500">500 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["pc5"][1000] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["pc5"][1000] ?>" value="1000">1000 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["pc5"][2000] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["pc5"][2000] ?>" value="2000">2000 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["pc5"][5000] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["pc5"][5000] ?>" value="5000">5000 GB</option>
                            </select>
                        </div>
                        <br>
                        <label for="quantity">Quantity: </label>
                        <div class="padd">
                            <input class="quantity" type="number" id="quantity" name="quantity" value="1">
                        </div>
                        <input type="hidden" id="serial" name="serial" value="<?= $serial ?>">
                        <input type="hidden" id="productType" name="productType" value="<?= $productType ?>">
                        <input type="hidden" id="product" name="product" value="pc5">
                        <div class="totals">
                            <div class="totals-item">
                                <label>Subtotal</label>
                                <div class="totals-value price" id="cart-subtotal">0</div>
                            </div>
                            <div class="totals-item">
                                <label>Discount</label>
                                <div class="totals-value discount" id="cart-shipping">-$100</div>
                            </div>
                            <div class="totals-item totals-item-total">
                                <label>Grand Total</label>
                                <div class="totals-value total" id="cart-total">0</div>
                            </div>
                        </div>
                        <input class="button" type="submit" value="Purchase">
                    </form>
<!--                    <a href="./serialProduct?serial=<?= $serial ?>&productType=<?= $productType ?>&product=pc5&quantity=<?= $quantity ?>&cloudStorage=<?= $cloudStorage ?>" class="button2">Select</a>-->
                </div>
            </div>
            <div class="column">
                <div class="container">
                    <h2>NovaBACKUP® Business Essentials v19 License</h2>
                    <ul>
                        <li>Complete data protection for Windows Servers with SQL/Exchange</li>
                        <li>Unlimited Virtual Machine Backup</li>
                        <li>Single Mailbox Restore</li>
                        <li>Rated #1 Server backup software</li>
                        <li>File-level backups: Full | Incremental | Differential</li>
                        <li>Image-level backups – protects all applications and system</li>
                        <li>Includes NovaCARE Premium Support</li>
                    </ul>
                    <p style="padding: 10px 0px 5px 0px">Purchase NovaBACKUP® Business Essentials v19 with NovaCARE Premium Support. Get the best protection and help you need!</p>
                    <form id="novaProducts" action="./serialProduct" method="GET">
                        <label for="novaPlan">NovaBACKUP Plan: </label>
                        <div class="padd">
                            <select class="novaPlan" id="novaPlan" name="novaPlan">
                                <option value="new_subscription_pricing">Subscription</option>
                                <option value="new_perpetual_pricing">Perpetual</option>
                            </select>
                        </div>
                        <br>
                        <label for="cloudStorage">Cloud Storage: </label>
                        <div class="padd">
                            <select class="cloudStorage" id="cloudStorage" name="cloudStorage">
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["be"][0] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["be"][0] ?>" value="0">No Cloud Storage</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["be"][100] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["be"][100] ?>" value="100">100 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["be"][250] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["be"][250] ?>" value="250">250 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["be"][500] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["be"][500] ?>" value="500">500 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["be"][1000] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["be"][1000] ?>" value="1000">1000 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["be"][2000] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["be"][2000] ?>" value="2000">2000 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["be"][5000] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["be"][5000] ?>" value="5000">5000 GB</option>
                            </select>
                        </div>
                        <br>
                        <label for="quantity">Quantity: </label>
                        <div class="padd">
                            <input class="quantity" type="number" id="quantity" name="quantity" value="1">
                        </div>
                        <input type="hidden" id="serial" name="serial" value="<?= $serial ?>">
                        <input type="hidden" id="productType" name="productType" value="<?= $productType ?>">
                        <input type="hidden" id="product" name="product" value="be">
                        <div class="totals">
                            <div class="totals-item">
                                <label>Subtotal</label>
                                <div class="totals-value price" id="cart-subtotal">0</div>
                            </div>
                            <div class="totals-item">
                                <label>Discount</label>
                                <div class="totals-value discount" id="cart-shipping">-$100</div>
                            </div>
                            <div class="totals-item totals-item-total">
                                <label>Grand Total</label>
                                <div class="totals-value total" id="cart-total">0</div>
                            </div>
                        </div>
                        <input class="button" type="submit" value="Purchase">
                    </form>
<!--                    <a href="./serialProduct?serial=<?= $serial ?>&productType=<?= $productType ?>&product=be&quantity=<?= $quantity ?>&cloudStorage=<?= $cloudStorage ?>" class="button2">Select</a>-->
                </div>
            </div>
            <div class="column">
                <div class="container">
                    <h2>NovaBACKUP® Server v19 License</h2>
                    <ul>
                        <li>Complete data protection for Windows Servers</li>
                        <li>Rated #1 Server backup software</li>
                        <li>File-level backups: Full | Incremental | Differential</li>
                        <li>Image-level backups – protects all applications and system</li>
                        <li>Includes NovaCARE Premium Support</li>
                    </ul>
                    <p style="padding: 10px 0px 105px 0px">Purchase NovaBACKUP® Server v19 with NovaCARE Premium Support. Get the best protection and help you need!</p>
                    <form id="novaProducts" action="./serialProduct" method="GET">
                        <label for="novaPlan">NovaBACKUP Plan: </label>
                        <div class="padd">
                            <select class="novaPlan" id="novaPlan" name="novaPlan">
                                <option value="new_subscription_pricing">Subscription</option>
                                <option value="new_perpetual_pricing">Perpetual</option>
                            </select>
                        </div>
                        <br>
                        <label for="cloudStorage">Cloud Storage: </label>
                        <div class="padd">
                            <select class="cloudStorage" id="cloudStorage" name="cloudStorage">
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["server"][0] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["server"][0] ?>" value="0">No Cloud Storage</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["server"][100] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["server"][100] ?>" value="100">100 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["server"][250] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["server"][250] ?>" value="250">250 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["server"][500] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["server"][500] ?>" value="500">500 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["server"][1000] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["server"][1000] ?>" value="1000">1000 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["server"][2000] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["server"][2000] ?>" value="2000">2000 GB</option>
                                <option data-sub="<?= $this->config->item("new_subscription_pricing")["server"][5000] ?>" data-per="<?= $this->config->item("new_perpetual_pricing")["server"][5000] ?>" value="5000">5000 GB</option>
                            </select>
                        </div>
                        <br>
                        <label for="quantity">Quantity: </label>
                        <div class="padd">
                            <input class="quantity" type="number" id="quantity" name="quantity" value="1">
                        </div>
                        <input type="hidden" id="serial" name="serial" value="<?= $serial ?>">
                        <input type="hidden" id="productType" name="productType" value="<?= $productType ?>">
                        <input type="hidden" id="product" name="product" value="server">
                        <div class="totals">
                            <div class="totals-item">
                                <label>Subtotal</label>
                                <div class="totals-value price" id="cart-subtotal">0</div>
                            </div>
                            <div class="totals-item">
                                <label>Discount</label>
                                <div class="totals-value discount" id="cart-shipping">-$100</div>
                            </div>
                            <div class="totals-item totals-item-total">
                                <label>Grand Total</label>
                                <div class="totals-value total" id="cart-total">0</div>
                            </div>
                        </div>
                        <input class="button" type="submit" value="Purchase">
                    </form>
<!--                    <a href="./serialProduct?serial=<?= $serial ?>&productType=<?= $productType ?>&product=server&quantity=<?= $quantity ?>&cloudStorage=<?= $cloudStorage ?>" class="button2">Select</a>-->
                </div>
            </div>
        </div>

    </body>
</html>