<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="utf-8">
        <title>License View</title>
                <style>
            body {
                width: 70%;
                margin: 75px auto;
                font-family: Arial;
            }
        </style>
    </head>
    <body>

        <?= "Serial number (" . $serial . ") has been registered" ?? "" ?> 
        <br>
        <br>
        Here are the license's associated with that serial number:
        <br>
        <br>
        <?PHP
        foreach ($license as $L) {
            echo $L;
            ?> <br> <?PHP
        }
        ?>


    </body>
</html>