<?php

// where to set userId 
// what belongs in the GET
$userId = (isset($_GET['userId'])) ? (int) htmlspecialchars($_GET['userId']) : null;

//testing 
$userId = 1;
$totalBudget = 1000;

//TO-DO: pass and recieve value
//passed value

//sanitization function
function getData($field){
        if (!isset($_POST[$field])){
            $data="";
        } else {
            $data = trim($_POST[$field]);
            $data = htmlspecialchars($data);
        }
        return $data;
    }
    
    function verifyAlphaNum($testString){
        return (preg_match ("/^([[:alnum]]|-|\'|&|;|#)+$/", $testString)) == 1;
    }
    
    // TO-DO: change to months
    $months = array('Janurary','February','March','April','May','June','July','August','September','October','November','December');
    //can use !in_array to validate multi selects 

//declaring variables for stickyness
$month='';
$spending='';
$income='';
$housing='';
$utilities='';
$food='';
$transportation='';
$loans='';
$savings='';
$personal='';
$entertainment='';
$healthFitness='';
$education='';
$investments='';
$miscellaneous='';

$dataIsGood =false;

//pulling intial values for updates

/*
if($userId> 0) {
     $sql= 'SELECT pmkWildlifeId, fldType, fldCommonName, fldDescription, fldHabitat, '; 
     $sql .= 'fldReproduction, fldDiet, fldManagement, fldStatus, fldMainImage'; 
     $sql .= 'FROM tblWildlife';
     $sql .= 'WHERE pmkWildlifeId= ? '; 
     $sql .= 'ORDER BY fldCommonName'; 
     $data= array($critterId); 
     $animals= $thisDatabaseReader->select($sql, $data); 
if(!empty($animals)) { 
    $critterCommonName= $animals[0]['fldCommonName']; 
    $critterType= $animals[0]['fldType']; 
    $description= $animals[0]['fldDescription']; 
    $habitat= $animals[0]['fldHabitat']; 
    $reproduction= $animals[0]['fldReproduction']; 
    $diet= $animals[0]['fldDiet']; 
    $management= $animals[0]['fldManagement']; 
    $status= $animals[0]['fldStatus']; 
    $mainImage= $animals[0]['fldMainImage']; } 
}
*/



?>
<section id="form">

<?php
               
print '<p>Post Array:</p><pre>';
print_r($_POST);
print '</pre>';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $dataIsGood = true;

    print PHP_EOL . '<!--Starting Sanitization-->' . PHP_EOL;
    $month = (int) getData("txtMonth");
    $spending = (int) getData("txtSpending");
    $income = (int) getData("txtIncome");
    $housing = (int) getData("txtHousing");
    $utilities = (int) getData("txtUtilities");
    $food = (int) getData("txtFood");
    $transportation = (int) getData("txtTransportation");
    $loans = (int) getData("txtLoans");
    $savings = (int) getData("txtSavings");
    $personal = (int) getData("txtPersonal");
    $entertainment = (int) getData("txtEntertainment");
    $healthFitness = (int) getData("txtHealthFitness");
    $education = (int) getData("txtEducation");
    $investments = (int) getData("txtInvestments");
    $miscellaneous = (int) getData("txtMiscellaneous");

//validattion

//saving

$params = array();

$sql = "INSERT INTO tblBudget (pmkMonth, fnkUserId, fnkCategoryName, fldTotalBudget, fldAmount) VALUES ";


$params[] = $month;
$params[] = $userId;
$params[] = "housing";
$params[] = $spending;
$params[] = $housing;

$sql .= " (?, ?, ?, ?, ?), ";

$params[] = $month;
$params[] = $userId;
$params[] = "utilities";
$params[] = $spending;
$params[] = $utilities;

$sql .= " (?, ?, ?, ?, ?), ";


$params[] = $month;
$params[] = $userId;
$params[] = "food";
$params[] = $spending;
$params[] = $food;

$sql .= " (?, ?, ?, ?, ?), ";

$params[] = $month;
$params[] = $userId;
$params[] = "transportation";
$params[] = $spending;
$params[] = $transportation;

$sql .= " (?, ?, ?, ?, ?), ";

$params[] = $month;
$params[] = $userId;
$params[] = "loans";
$params[] = $spending;
$params[] = $loans;

$sql .= " (?, ?, ?, ?, ?), ";


$params[] = $month;
$params[] = $userId;
$params[] = "savings";
$params[] = $spending;
$params[] = $savings;

$sql .= " (?, ?, ?, ?, ?), ";


$params[] = $month;
$params[] = $userId;
$params[] = "personal";
$params[] = $spending;
$params[] = $personal;

$sql .= " (?, ?, ?, ?, ?), ";

$params[] = $month;
$params[] = $userId;
$params[] = "entertainment";
$params[] = $spending;
$params[] = $entertainment;

$sql .= " (?, ?, ?, ?, ?), ";

$params[] = $month;
$params[] = $userId;
$params[] = "healthFitness";
$params[] = $spending;
$params[] = $healthFitness;

$sql .= " (?, ?, ?, ?, ?), ";

$params[] = $month;
$params[] = $userId;
$params[] = "education";
$params[] = $spending;
$params[] = $education;

$sql .= " (?, ?, ?, ?, ?), ";

$params[] = $month;
$params[] = $userId;
$params[] = "investments";
$params[] = $spending;
$params[] = $investments;

$sql .= " (?, ?, ?, ?, ?), ";

$params[] = $month;
$params[] = $userId;
$params[] = "miscellaneous";
$params[] = $spending;
$params[] = $miscellaneous;

$sql .= " (?, ?, ?, ?, ?) ";


$sqlText = $sql;
foreach ($params as $value){
// Look for ? and replace with the value
// look for ? replace with value
$pos = strpos($sqlText, '?');
if ($pos !== false) {
$sqlText = substr_replace($sqlText, '"' . $value . '"', $pos, strlen('?'));
}
}
print '<p>' . $sqlText . '</p>';

}








print PHP_EOL . '<!--Starting Validation-->' . PHP_EOL;

$variables = array(
    "month" => (int) getData("txtMonth"),
    "spending" => (int) getData("txtSpending"),
    "income" => (int) getData("txtIncome"),
    "housing" => (int) getData("txtHousing"),
    "utilities" => (int) getData("txtUtilities"),
    "food" => (int) getData("txtFood"),
    "transportation" => (int) getData("txtTransportation"),
    "loans" => (int) getData("txtLoans"),
    "savings" => (int) getData("txtSavings"),
    "personal" => (int) getData("txtPersonal"),
    "entertainment" => (int) getData("txtEntertainment"),
    "healthFitness" => (int) getData("txtHealthFitness"),
    "education" => (int) getData("txtEducation"),
    "investments" => (int) getData("txtInvestments"),
    "miscellaneous" => (int) getData("txtMiscellaneous"),
);


foreach ($variables as $varName => $value) {
    if ($varName === "month" && (empty($value) || !is_numeric($value))) {
        print "<p class='mistake'>Please select a valid month.</p>";
        $dataIsGood = false;
    } elseif ($value === 0) {
        print "<p class='mistake'>Please enter a valid $varName.</p>";
        $dataIsGood = false;
    } elseif (!is_numeric($value)) {
        print("<p class='mistake'>Your $varName must be a numeric value.</p>");
        $dataIsGood = false;
    }
}

?>

<h2>Montly Goal</h2>
<form action = "#" method = "POST">

    <!-- passing userId to form -->
    <input type="hidden"
           value="<?php print $critterId; ?>"
           id="hidWildlifeId"
           name="hidWildlifeId" >
        
    <fieldset  class="listbox">




    <fieldset class = "Budget">

        <p>
            <select id="MultiMonth" name="txtMonth" tabindex="100" required>
                <option value="Janurary"<?php if($month == "Janurary") print('selected') ?>>Janurary</option>
                <option value="February" <?php if($month == "February") print('selected') ?>>February</option>
                <option value="March" <?php if($month == "March") print('selected') ?>>March</option>
                <option value="April" <?php if($month == "April") print('selected') ?>>April</option>
                <option value="May" <?php if($month == "May") print('selected') ?>>May</option>
                <option value="June" <?php if($month == "June") print('selected') ?>>June</option>
                <option value="July" <?php if($month == "July") print('selected') ?>>July</option>
                <option value="August" <?php if($month == "August") print('selected') ?>>August</option>
                <option value="September" <?php if($month == "September") print('selected') ?>>September</option>
                <option value="October" <?php if($month == "October") print('selected') ?>>October</option>
                <option value="November" <?php if($month == "November") print('selected') ?>>November</option>
                <option value="December" <?php if($month == "December") print('selected') ?>>December</option>
            </select>
        </p>

        <p>
            <label class = "label" for = "txtSpending">Monthly Spending:</label>
            <input type = "text" name = "txtSpending" id = "txtSpending" tabindex="160" value ="<?php print $spending; ?>" required>
        </p>   

        <p>
            <label class="label" for="txtIncome">Income:</label>
            <input type="text" name="txtIncome" id="txtIncome" tabindex="180" value="<?php print $income; ?>" required>
        </p>

        <p>
            <label class="label" for="txtHousing">Housing:</label>
            <input type="text" name="txtHousing" id="txtHousing" tabindex="190" value="<?php print $housing; ?>" required>
        </p>

        <p>
            <label class="label" for="txtUtilities">Utilities:</label>
            <input type="text" name="txtUtilities" id="txtUtilities" tabindex="200" value="<?php print $utilities; ?>" required>
        </p>

        <p>
            <label class="label" for="txtFood">Food:</label>
            <input type="text" name="txtFood" id="txtFood" tabindex="210" value="<?php print $food; ?>" required>
        </p>

        <p>
            <label class="label" for="txtTransportation">Transportation:</label>
            <input type="text" name="txtTransportation" id="txtTransportation" tabindex="220" value="<?php print $transportation; ?>" required>
        </p>

        <p>
            <label class="label" for="txtLoans">Loans:</label>
            <input type="text" name="txtLoans" id="txtLoans" tabindex="230" value="<?php print $loans; ?>" required>
        </p>

        <p>
            <label class="label" for="txtSavings">Savings:</label>
            <input type="text" name="txtSavings" id="txtSavings" tabindex="240" value="<?php print $savings; ?>" required>
        </p>

        <p>
            <label class="label" for="txtPersonal">Personal:</label>
            <input type="text" name="txtPersonal" id="txtPersonal" tabindex="250" value="<?php print $personal; ?>" required>
        </p>

        <p>
            <label class="label" for="txtEntertainment">Entertainment:</label>
            <input type="text" name="txtEntertainment" id="txtEntertainment" tabindex="260" value="<?php print $entertainment; ?>" required>
        </p>

        <p>
            <label class="label" for="txtHealthFitness">Health & Fitness:</label>
            <input type="text" name="txtHealthFitness" id="txtHealthFitness" tabindex="270" value="<?php print $healthFitness; ?>" required>
        </p>

        <p>
            <label class="label" for="txtEducation">Education:</label>
            <input type="text" name="txtEducation" id="txtEducation" tabindex="280" value="<?php print $education; ?>" required>
        </p>

        <p>
            <label class="label" for="txtInvestments">Investments:</label>
            <input type="text" name="txtInvestments" id="txtInvestments" tabindex="290" value="<?php print $investments; ?>" required>
        </p>

        <p>
            <label class="label" for="txtMiscellaneous">Miscellaneous:</label>
            <input type="text" name="txtMiscellaneous" id="txtMiscellaneous" tabindex="300" value="<?php print $miscellaneous; ?>" required>
        </p>
    </fieldset>

    <fieldset class="buttons">
            <input id = "btnSubmit" 
            name = "btnSubmit" 
            type = "submit" 
            tabindex="1000"
            value = "Submit" >
    </fieldset>
</form>