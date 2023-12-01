<?php
//TO-DO: pass and recieve value
//passed value
$userId;

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
$month;
$spending;
$income;
$housing;
$utilities;
$food;
$transportation;
$loans;
$savings;
$personal;
$entertainment;
$healthFitness;
$education;
$investments;
$miscellaneous;

$dataIsGood =false;
?>
<section id="me-form">

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
    "planning" => (int) getData("chkPlanning")
);


foreach ($variables as $varName => $value) {
    if ($value == "") {
        print "<p class='mistake'>Please enter your $varName.</p>";
        $dataIsGood = false;
    } elseif (!verifyAlphaNum($value)) {
        print("<p class='mistake'>Your $varName contains extra characters that are not allowed. ");
        print("Use only letters, numbers, hyphens, and spaces.</p>");
        $dataIsGood = false;
    }
}



//save the data
if ($dataIsGood){
        print "data is good";

        $userSql = "UPDATE tblUser SET fldIncome = ? WHERE pmkUserId = $userId";


        
        // Prepare the statement
        $stmt = $mysqli->prepare($userSql);

        // Bind parameters
        $stmt->bind_param("d", $income);

        $stmt->execute();
        $stmt->close();
}


        

$variables2 = array(
    $housing,
    $utilities,
    $food,
    $transportation,
    $loans,
    $savings,
    $personal,
    $entertainment,
    $healthFitness,
    $education,
    $investments, 
    $miscellaneous);

        //for each of the above values, where varName gives key of currElement and value give value
        foreach ($variables2 as $varName => $value){

            $sql = "INSERT INTO tblBudget (pmkMonth, fnkUserId, fnkCategoryName, fldTotalBudget, fldAmount)";
            $sql .= "VALUES (?, ?, ?, ?, ?)";
                
            // Bind parameters
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("sdsdd", $month, $userId, $varName, $spending, $value);

            // Execute the statement
            $stmt->execute();

            // Close the statement
            $stmt->close();

        }

        //TO-DO: edit to work with my statements
        /*      try {
                $statement = $pdo->prepare($sql);

                if ($statement->execute($params)) {
                        print('<h2>Thank you, your information has been received.</h2>');
                } else {
                        print('<p>Record was NOT successfully saved.</p>');
                }
        } catch (PDOException $e) {
            print('<p>Couldn\'t insert the record</p>');
        }*/


?>

<h2>Montly Goal</h2>
<form action = "#" method = "POST">
        
    <fieldset  class="listbox">

        <legend>Select a Month</legend>
        <p>
            <select id="MultiMonth" name="MultiMonth" tabindex="100" required>
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
    </fieldset>


    <fieldset class = "Budget">

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

