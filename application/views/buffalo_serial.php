<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="utf-8">
        <title>Serial Number View</title>
        <style>
            body {
                width: 70%;
                margin: 75px auto;
                font-family: Arial;
            }
            .container {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
                box-sizing: border-box;
                border: 2px solid green;
                border-radius: 4px;
            }
            input[type=submit]{
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 16px 32px;
                text-decoration: none;
                margin: 4px 2px;
                cursor: pointer;
            }
            input[type=text] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
                border: 2px solid green;
                border-radius: 4px;
            }
            .gallery {
                margin: 5px;
                border: 1px solid #ccc;
                float: left;
                width: 180px;
            }
        </style>
    </head>
    <body>
        <h1>Redeem your Free NovaBACKUP Software</h1>
        <p>Buffalo Storage + NovaBACKUP Software = Reliable Data Protection</p>
        <div class="container">
            <form action="./serialBuffaloValid" id="usrform" method="POST">
                <br>
                <div class="fieldSec">Enter Serial Number<input type="text" name="serial" value="<?= $serial ?? "" ?>"></div>
                <?= $message ?? "" ?>
                <br>
                <input type="submit" value="Enter">
                <br>
            </form>
        </div>
        <p>Don't know your serial number? See below</p>
        <div class="gallery">
            <img src="/tools/css/Pictures/LS220D-Clean.jpg" alt="LS220D-Clean" width="400" height="210">
        </div>
    </body>
</html>