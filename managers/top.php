<?php 
$phpSelf=htmlspecialchars($_SERVER['PHP_SELF']);
$pathParts = pathinfo($phpSelf);
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CS2480 Lab6</title>
        <meta name="author" content="Evan Trafton">
        <meta name="description" content="CS2480 Lab6 ">
        
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        
        <!--<link rel="favicon icon" href="images/assets/favicon.ico" type="image/x-icon">-->
        
        <link rel="stylesheet" href="css/custom.css?version=<?php print time(); ?>" type="text/css">
        <link rel="stylesheet" media="(max-width: 800px)" href="css/tablet.css?version=<?php print time(); ?>" type="text/css">
        <link rel="stylesheet" media="(max-width: 600px)" href="css/phone.css?version=<?php print time(); ?>" type="text/css">

        <!-- Javascript link would go here  -->

        
        <?php 
        $allowedNetIds = array('rerickso','ettrafto','aschaef1');

        $netId = htmlentities($_SERVER["REMOTE_USER"], ENT_QUOTES, "UTF-8");
        
        if(in_array($netId, $allowedNetIds)){
            print '<h1>password protected</h1>';
        } else{
            print '<p> access denied</p>';
        }

        ?>
    </head>


    <?php
    print '<body>' . PHP_EOL;
    include 'Connect-DB.php';
    print PHP_EOL;
    include 'header.php';
    print PHP_EOL;
    include 'nav.php';
    print PHP_EOL;
    ?>