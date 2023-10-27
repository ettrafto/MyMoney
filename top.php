<?php
define ('PHP_SELF',$_SERVER['PHP_SELF']);
define ('PATH_PARTS', pathinfo(PHP_SELF));
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CS2480 Lab6</title>
        <meta name="author" content="Evan Trafton">
        <meta name="description" content="CS2480 Lab4 ">
        
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        
        <!--<link rel="favicon icon" href="images/assets/favicon.ico" type="image/x-icon">-->
        
        <link rel="stylesheet" href="css/custom.css?version=<?php print time(); ?>" type="text/css">
        <link rel="stylesheet" media="(max-width: 800px)" href="css/tablet.css?version=<?php print time(); ?>" type="text/css">
        <link rel="stylesheet" media="(max-width: 600px)" href="css/phone.css?version=<?php print time(); ?>" type="text/css">

        <!-- Javascript link would go here  -->
    </head>


    <?php
    print '<body>' . PHP_EOL;
    include 'header.php';
    print PHP_EOL;
    include 'nav.php';
    print PHP_EOL;
    ?>