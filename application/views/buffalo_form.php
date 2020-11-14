<!DOCTYPE html>
<html>
    <head>
        <style>
            .fieldSec{
                padding: 5px;
            }
            .field input{
                padding: 3px;
                width: 300px;
                margin-left: 20px;
            }
        </style>
        
        <script>
        
        </script>
    </head>
<body>

<form action="./processBuffaloSubmission" id="usrform" method="POST">
<div>Enter the following fields for this customer:</div>
<div class="fieldSec">First Name:<div class="field"><input type="text" name="firstName" value="<?=$firstName ?? ""?>"></div></div>
<div class="fieldSec">Last Name:<div class="field"><input type="text" name="lastName" value="<?=$lastName ?? ""?>"></div></div>
<div class="fieldSec">Company Name:<div class="field"><input type="text" name="companyName" value="<?=$companyName ?? ""?>"></div></div>
<div class="fieldSec">Address 1:<div class="field"><input type="text" name="address1" value="<?=$address1 ?? ""?>"></div></div>
<div class="fieldSec">Address 2:<div class="field"><input type="text" name="address2" value="<?=$address2 ?? ""?>"></div></div>
<div class="fieldSec">City:<div class="field"><input type="text" name="city" value="<?=$city ?? ""?>"></div></div>
<div class="fieldSec">State:<div class="field"><input type="text" name="state" value="<?=$state ?? ""?>"></div></div>
<div class="fieldSec">Zip:<div class="field"><input type="text" name="zip" value="<?=$zip ?? ""?>"></div></div>
<div class="fieldSec">Country:<div class="field"><input type="text" name="country" value="<?=$country ?? ""?>"></div></div>
<div class="fieldSec">Language:<div class="field"><input type="text" name="language" value="en"></div></div>
<div class="fieldSec">Email:<div class="field"><input type="text" name="email" value="<?=$email ?? ""?>"></div></div>
<div class="fieldSec">Phone:<div class="field"><input type="text" name="phone" value="<?=$phone ?? ""?>"></div></div>
<div class="fieldSec">Serial 1:<div class="field"><input type="text" name="serial1" value="<?=$serial1 ?? ""?>"></div></div>
<div class="fieldSec">Serial 1 Purchase Date:<div class="field"><input type="text" name="purchaseDate1" value="<?=$purchaseDate1 ?? ""?>"></div></div>
<div class="fieldSec">Serial 2:<div class="field"><input type="text" name="serial2" value="<?=$serial2 ?? ""?>"></div></div>
<div class="fieldSec">Serial 2 Purchase Date:<div class="field"><input type="text" name="purchaseDate2" value="<?=$purchaseDate2 ?? ""?>"></div></div>
<div class="fieldSec">Serial 3:<div class="field"><input type="text" name="serial3" value="<?=$serial3 ?? ""?>"></div></div>
<div class="fieldSec">Serial 3 Purchase Date:<div class="field"><input type="text" name="purchaseDate3" value="<?=$purchaseDate3 ?? ""?>"></div></div>
<br>
  <input type="submit" value="Generate Keys">
</form>

</body>
</html>
