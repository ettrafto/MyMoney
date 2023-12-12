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

        <script>
            function dropPanel(id){
                var element = document.getElementById(id);
                if (element.style.display === 'none') {    
                    element.style.display = 'block';       
                } else if (element.style.display === 'block') { 
                    element.style.display = 'none';        
                }
            }

            
        function onSelectionChange() {
            var month = document.getElementById('month').value;
            var year = document.getElementById('year').value;

            // Creating an XMLHttpRequest object
            var xhttp = new XMLHttpRequest();

            // Define what happens on successful data submission
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Handle response here (e.g., update the page)
                    console.log(this.responseText);
                }
            };

            // Set up our request
            xhttp.open("POST", "handle_selection.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            // Sending the request to the server
            xhttp.send("month=" + month + "&year=" + year);
        }
        function togglePanel(panelId) {
            var panel = document.getElementById(panelId);
            var arrow = document.getElementById('arrow-' + panelId);

            if (panel.style.display === "none") {
                panel.style.display = "block";
                arrow.className = "arrow-up";
            } else {
                panel.style.display = "none";
                arrow.className = "arrow-down";
            }
        }
 
            
        </script>
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