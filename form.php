<?php
include 'top.php';
?>

        <main>   
      
<?php
$currentDate = new DateTime();
$currentDate->modify('-1 month'); // Subtract one month

$selectedMonth = $currentDate->format('n'); // Previous month (numeric)
$selectedYear = $currentDate->format('Y'); // Year of the previous month

// Hardcoded values for January 2023
//$selectedMonth = "01"; // January as a two-digit number
//$selectedYear = 2023;  // The year 2023

$sql = 'SELECT
T.fldTransactionName AS TransactionName,
T.fnkCategoryName AS CategoryName,
T.fnkAccountId AS AccountID,
A.fldAccountName AS AccountName,
T.fldTransactionDate AS Date,
T.fldTransactionAmount AS Amount
FROM
    tblTransaction T
    JOIN tblAccount A ON T.fnkAccountId = A.pmkAccountId
    JOIN tblUser U ON A.fnkUserId = U.pmkUserId
WHERE
    U.pmkUserId = 1 AND
    YEAR(T.fldTransactionDate) = :year AND
    MONTH(T.fldTransactionDate) = :month
ORDER BY
    T.fldTransactionDate;';


//print '<p>SQL: ' . $sql;
//print '<p>' .  $selectedYear;
//print '<p>' . $selectedMonth;

$statement = $pdo->prepare($sql);
$statement->bindParam(':year', $selectedYear, PDO::PARAM_INT);
$statement->bindParam(':month', $selectedMonth, PDO::PARAM_STR);
$statement->execute();

$transactions = $statement->fetchAll();


$dataPoints = array();
$totalHousing = $totalUtilities = $totalFood = $totalTransportation = $totalLoans = $totalSavings = $totalPersonal = $totalEntertainment = $totalHealthFitness = $totalEducation = $totalInvestments = $totalMiscellaneous = 0;



foreach($transactions as $transaction){

    switch ($transaction['CategoryName']){
        case 'Housing':
            $totalHousing += $transaction['Amount'];


            break;
        case 'Utilities':
            $totalUtilities += $transaction['Amount'];
 
            
            break;
        case 'Food':
            $totalFood += $transaction['Amount'];

            break;
        case 'Transportation':
            $totalTransportation += $transaction['Amount'];
 
            break;
        case 'Loans':
            $totalLoans += $transaction['Amount'];

            break;
        case 'Savings':
            $totalSavings += $transaction['Amount'];

            break;
        case 'Personal':
            $totalPersonal += $transaction['Amount'];

            break;
        case 'Entertainment':
            $totalEntertainment += $transaction['Amount'];
 
            break;
        case 'HealthFitness':
            $totalHealthFitness += $transaction['Amount'];

            break;
        case 'Education':
            $totalEducation += $transaction['Amount'];

            break;
        case 'Investments':
            $totalInvestments += $transaction['Amount'];

            break;
        case 'Miscellaneous':
            $totalMiscellaneous += $transaction['Amount'];

            break;
    }
    
}


$total = $totalHousing + $totalUtilities + $totalFood + $totalTransportation + $totalLoans + $totalSavings + $totalPersonal + $totalEntertainment +$totalHealthFitness + $totalEducation + $totalInvestments + $totalMiscellaneous;

if($total != 0){
    $housing = $totalHousing/$total;
    $utilities = $totalUtilities/$total;
    $food = $totalFood/$total;
    $transportation = $totalTransportation/$total;
    $loans = $totalLoans/$total;
    $savings = $totalSavings/$total;
    $personal = $totalPersonal/$total;
    $entertainment = $totalEntertainment/$total;
    $healthFitness = $totalHealthFitness/$total;
    $education = $totalEducation/$total;
    $investments = $totalInvestments/$total;
    $miscellaneous = $totalMiscellaneous/$total;
}



$dataPoints = array();

//creating labels for graph
if ($total != 0) {
    if ($totalHousing > 0) {
        $dataPoints[] = array("label" => "Housing", "y" => $totalHousing / $total);
    }
    if ($totalUtilities > 0) {
        $dataPoints[] = array("label" => "Utilities", "y" => $totalUtilities / $total);
    }
    if ($totalFood > 0) {
        $dataPoints[] = array("label" => "Food", "y" => $totalFood / $total);
    }
    if ($totalTransportation > 0) {
        $dataPoints[] = array("label" => "Transportation", "y" => $totalTransportation / $total);
    }
    if ($totalLoans > 0) {
        $dataPoints[] = array("label" => "Loans", "y" => $totalLoans / $total);
    }
    if ($totalSavings > 0) {
        $dataPoints[] = array("label" => "Savings", "y" => $totalSavings / $total);
    }
    if ($totalPersonal > 0) {
        $dataPoints[] = array("label" => "Personal", "y" => $totalPersonal / $total);
    }
    if ($totalEntertainment > 0) {
        $dataPoints[] = array("label" => "Entertainment", "y" => $totalEntertainment / $total);
    }
    if ($totalHealthFitness > 0) {
        $dataPoints[] = array("label" => "Health & Fitness", "y" => $totalHealthFitness / $total);
    }
    if ($totalEducation > 0) {
        $dataPoints[] = array("label" => "Education", "y" => $totalEducation / $total);
    }
    if ($totalInvestments > 0) {
        $dataPoints[] = array("label" => "Investments", "y" => $totalInvestments / $total);
    }
    if ($totalMiscellaneous > 0) {
        $dataPoints[] = array("label" => "Miscellaneous", "y" => $totalMiscellaneous / $total);
    }
}


// where to set userId 
// what belongs in the GET
$userId = (isset($_GET['userId'])) ? (int) htmlspecialchars($_GET['userId']) : null;

//testing 
$userId = 1;
$totalBudget = 1000;

//TO-DO: pass and recieve value
//passed value

//TO-DO: 
//Uniform month + year data
//uniform category strings for insertions -- capitalize
//fix intial bad data for form

//TO-DO: Pi Charts + Line charts

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


?>

<?php
               
//print '<p>Post Array:</p><pre>';
//print_r($_POST);
//print '</pre>';
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
}


?>
<section class="flex-container">
    <section id="form-graph">
        <div id="chartContainerPi" style="height: 370px; width: 100%;"></div>
        <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
        <script>
            window.onload = function () {
                var pieChart = new CanvasJS.Chart("chartContainerPi", {
                    animationEnabled: true,
                    title: {
                        text: "Spending Breakdown for <?php echo date('F Y', mktime(0, 0, 0, $previousMonth, 10, $previousYear)); ?>",
                        fontFamily: "'Raleway','Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"

                    },
                    data: [{
                        type: "pie",
                        yValueFormatString: "#,##0.##\"%\"",
                        indexLabel: "{label} (#percent%)",
                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                pieChart.render();
            }
        </script>      
    </section>         
    <form class="form-container"action = "#" method = "POST">

        <!-- passing userId to form
        <input type="hidden"
            value="<?php // print $critterId; ?>"
            id="hidWildlifeId"
            name="hidWildlifeId" >
            
        <fieldset  class="listbox">-->

        <h2>Montly Goal</h2>

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
</section>
</main>
    
    <?php include 'footer.php';?>    

    </body>
</html>