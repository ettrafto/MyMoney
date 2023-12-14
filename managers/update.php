<?php
include 'top.php';
?>

<?php
if (in_array($netId, $allowedNetIds)) {
    print '<h1>password protected</h1>';
    print '<main>';
    print '<h1>Managers Page</h1>';
    print '</main>';
} else {
    print '<p>access denied</p>';
}
$userId = 1;
// Assuming $userId is set to the ID of the user whose record needs to be updated
//$userId = isset($_GET['userId']) ? (int) $_GET['userId'] : 0;
?>
<form class="select-boxes"action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            <!-- Month Dropdown -->
                            <label for="month">Month:</label>
                            <select name="month" id="month">
                                <?php
                                $months = [
                                    1 => 'January',
                                    2 => 'February',
                                    3 => 'March',
                                    4 => 'April',
                                    5 => 'May',
                                    6 => 'June',
                                    7 => 'July',
                                    8 => 'August',
                                    9 => 'September',
                                    10 => 'October',
                                    11 => 'November',
                                    12 => 'December'
                                ];

                                // Get the submitted month, or set to current month if not submitted

                                //

                                $month = isset($_POST['month']) ? $_POST['month'] : date('n');

                                foreach ($months as $num => $name) {
                                    echo "<option value=\"$num\"" . ($num == $month ? ' selected' : '') . ">$name</option>";
                                }
                                ?>
                            </select>

                            <!-- Year Dropdown -->
                            <label for="year">Year:</label>
                            <select name="year" id="year">
                                <?php
                                $currentYear = date('Y');
                                $earliestYear = $currentYear - 10;
                                $selectedYear = isset($_POST['year']) ? $_POST['year'] : $currentYear;

                                for ($year = $currentYear; $year >= $earliestYear; $year--) {
                                    echo "<option value=\"$year\"" . ($year == $selectedYear ? ' selected' : '') . ">$year</option>";
                                }
                                ?>
                            </select>
                            <input type="submit" value="Submit">
                        </form>

                    <?php

                    // Check if the form has been submitted
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        // Access the selected month and year from the POST data
                        $selectedMonth = $_POST['month'];
                        $selectedYear = $_POST['year'];


                        // Format the month for SQL (ensure it's two digits)
                        $formattedMonth = str_pad($selectedMonth, 2, '0', STR_PAD_LEFT);

                    }else {
                        //setting default data before Form Submission
                        $selectedMonth = 1;
                        $selectedYear = 2023;

                        $formattedMonth = str_pad($selectedMonth, 2, '0', STR_PAD_LEFT);

                    }
                    
                    


$userId = 1; // Update this according to your application logic

$sql = 'SELECT fldIncome AS Income
        FROM tblUser
        WHERE pmkUserId = :userId';

$statement = $pdo->prepare($sql);
$statement->bindParam(':userId', $userId, PDO::PARAM_INT);
$statement->execute();

// Fetch the result
$result = $statement->fetch(PDO::FETCH_ASSOC);

// Assign income to the variable
$income = $result ? $result['Income'] : 0;


//fix for multiple months
$selectedMonth = 'January'; // Example, should be assigned based on user input
if($month > 0 && $month <13){
    switch ($month) {
        case 1:
            $selectedMonth = 'January';
            break;
        case 2:
            $selectedMonth = 'February';
            break;
        case 3:
            $selectedMonth = 'March';
            break;
        case 4:
            $selectedMonth = 'April';
            break;
        case 5:
            $selectedMonth = 'May';
            break;
        case 6:
            $selectedMonth = 'June';
            break;
        case 7:
            $selectedMonth = 'July';
            break;
        case 8:
            $selectedMonth = 'August';
            break;
        case 9:
            $selectedMonth = 'September';
            break;
        case 10:
            $selectedMonth = 'October';
            break;
        case 11:
            $selectedMonth = 'November';
            break;
        case 12:
            $selectedMonth = 'December';
            break;
    }
}
$selectedYear = '2023'; // Example, should be assigned based on user input

// Combine selected month and year for filtering
$selectedMonthYear = $selectedMonth . ' ' . $selectedYear; 


$sql = 'SELECT
            B.fnkCategoryName AS CategoryName,
            B.fldTotalBudget AS TotalBudget,
            B.fldAmount AS AmountSpent
        FROM
            tblBudget B
        WHERE
            B.fnkUserId = :userId AND
            B.pmkMonth = :selectedMonthYear';

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
$stmt->bindParam(':selectedMonthYear', $selectedMonthYear, PDO::PARAM_STR);

$stmt->execute();

// Fetch the data
$budgetData = $stmt->fetchAll(PDO::FETCH_ASSOC);
//echo '<pre>';
//print_r($budgetData);
//echo '</pre>';

$housing = $utilities = $food = $transportation = $loans = $savings = $personal = $entertainment = $healthFitness = $education = $investments = $miscellaneous = 0;
foreach ($budgetData as $item) {
    switch ($item['CategoryName']) {
        case 'Housing':
            $housing = $item['AmountSpent'];
            $spending = $item['TotalBudget'];
            break;
        case 'Utilities':
            $utilities = $item['AmountSpent'];
            break;
        case 'Food':
            $food = $item['AmountSpent'];
            break;
        case 'Transportation':
            $transportation = $item['AmountSpent'];
            break;
        case 'Loans':
            $loans = $item['AmountSpent'];
            break;
        case 'Savings':
            $savings = $item['AmountSpent'];
            break;
        case 'Personal':
            $personal = $item['AmountSpent'];
            break;
        case 'Entertainment':
            $entertainment = $item['AmountSpent'];
            break;
        case 'Health and Fitness':
            $healthFitness = $item['AmountSpent'];
            break;
        case 'Education':
            $education = $item['AmountSpent'];
            break;
        case 'Investments':
            $investments = $item['AmountSpent'];
            break;
        case 'Miscellaneous':
            $miscellaneous = $item['AmountSpent'];
            break;
    }
}




?>

       
                    


<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnBottomSubmit'])) {

    $userId = 1;
    
    

    // Example array of budget categories and their corresponding form inputs
    $categories = [
        
        'Housing' => $_POST['txtHousing'],
        'Utilities' => $_POST['txtUtilities'],
        'Food' => $_POST['txtFood'],
        'Transportation' => $_POST['txtTransportation'],
        'Loans' => $_POST['txtLoans'],
        'Savings' => $_POST['txtSavings'],
        'Personal' => $_POST['txtPersonal'],
        'Entertainment' => $_POST['txtEntertainment'],
        'Health and Fitness' => $_POST['txtHealthFitness'],
        'Education' => $_POST['txtEducation'],
        'Investments' => $_POST['txtInvestments'],
        'Miscellaneous' => $_POST['txtMiscellaneous']
    ];





    // Prepare and execute SQL statements for each category
    try {
        $pdo->beginTransaction(); // Start the transaction

        foreach ($categories as $categoryName => $amountSpent) {
            $sql = "UPDATE tblBudget 
                    SET fldAmount = :amountSpent 
                    WHERE fnkUserId = :userId 
                    AND pmkMonth = :selectedMonthYear 
                    AND fnkCategoryName = :categoryName";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':amountSpent', $amountSpent, PDO::PARAM_STR);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':selectedMonthYear', $selectedMonthYear, PDO::PARAM_STR);
            $stmt->bindParam(':categoryName', $categoryName, PDO::PARAM_STR);

            if (!$stmt->execute()) { // Execute and check for errors
                $errorInfo = $stmt->errorInfo();
                echo "Error in execution: " . $errorInfo[2]; // Error info
                $pdo->rollBack(); // Rollback the transaction on error
                exit; // Exit the script or handle the error as needed
            }
            //print $amountSpent;
            //print $userId;
            //print $selectedMonthYear;
            //print $categoryName;
            //print $sql;
        }

        $pdo->commit(); // Commit the transaction if no errors

                //updating form values
                $housing = $_POST['txtHousing'];
                $utilities = $_POST['txtUtilities'];
                $food = $_POST['txtFood'];
                $transportation = $_POST['txtTransportation'];
                $loans = $_POST['txtLoans'];
                $savings = $_POST['txtSavings'];
                $personal = $_POST['txtPersonal'];
                $entertainment = $_POST['txtEntertainment'];
                $healthFitness = $_POST['txtHealthFitness'];
                $education = $_POST['txtEducation'];
                $investments = $_POST['txtInvestments'];
                $miscellaneous = $_POST['txtMiscellaneous'];

        echo "Budget updated successfully";
    } catch (PDOException $e) {
        $pdo->rollBack(); // Rollback the transaction if an exception occurs
        echo "Error: " . $e->getMessage();
    }
}
//UPDATE tblBudget SET fldAmount = 30.00 WHERE fnkUserId = 1 AND pmkMonth = 'January 2023' AND fnkCategoryName = Housing;
//UPDATE tblBudget SET fldAmount = 300.00 WHERE fnkUserId = 1 AND pmkMonth = 'January 2023' AND fnkCategoryName = 'Housing';
?>

<form class="form-container"action = "#" method = "POST">



<h2>Montly Goal</h2>

<fieldset class = "Budget">

 

    <p>
        <label class = "label" for = "txtSpending">Monthly Spending:</label>
        <input type = "text" name = "txtSpending" id = "txtSpending" tabindex="160" value="<?php echo htmlspecialchars($spending); ?>" required>
    </p>   

    <p>
        <label class="label" for="txtIncome">Income:</label>
        <input type="text" name="txtIncome" id="txtIncome" tabindex="180" value="<?php echo htmlspecialchars($income); ?>" required>
    </p>

    <p>
        <label class="label" for="txtHousing">Housing:</label>
        <input type="text" name="txtHousing" id="txtHousing" tabindex="190" value="<?php echo htmlspecialchars($housing); ?>" required>
    </p>

    <p>
        <label class="label" for="txtUtilities">Utilities:</label>
        <input type="text" name="txtUtilities" id="txtUtilities" tabindex="200" value="<?php echo htmlspecialchars($utilities); ?>" required>
    </p>

    <p>
        <label class="label" for="txtFood">Food:</label>
        <input type="text" name="txtFood" id="txtFood" tabindex="210" value="<?php echo htmlspecialchars($food); ?>" required>
    </p>

    <p>
        <label class="label" for="txtTransportation">Transportation:</label>
        <input type="text" name="txtTransportation" id="txtTransportation" tabindex="220" value="<?php echo htmlspecialchars($transportation); ?>" required>
    </p>

    <p>
        <label class="label" for="txtLoans">Loans:</label>
        <input type="text" name="txtLoans" id="txtLoans" tabindex="230" value="<?php echo htmlspecialchars($loans); ?>" required>
    </p>

    <p>
        <label class="label" for="txtSavings">Savings:</label>
        <input type="text" name="txtSavings" id="txtSavings" tabindex="240" value="<?php echo htmlspecialchars($savings); ?>" required>
    </p>

    <p>
        <label class="label" for="txtPersonal">Personal:</label>
        <input type="text" name="txtPersonal" id="txtPersonal" tabindex="250" value="<?php echo htmlspecialchars($personal); ?>" required>
    </p>

    <p>
        <label class="label" for="txtEntertainment">Entertainment:</label>
        <input type="text" name="txtEntertainment" id="txtEntertainment" tabindex="260" value="<?php echo htmlspecialchars($entertainment); ?>" required>
    </p>

    <p>
        <label class="label" for="txtHealthFitness">Health & Fitness:</label>
        <input type="text" name="txtHealthFitness" id="txtHealthFitness" tabindex="270" value="<?php echo htmlspecialchars($healthFitness); ?>" required>
    </p>

    <p>
        <label class="label" for="txtEducation">Education:</label>
        <input type="text" name="txtEducation" id="txtEducation" tabindex="280" value="<?php echo htmlspecialchars($education); ?>" required>
    </p>

    <p>
        <label class="label" for="txtInvestments">Investments:</label>
        <input type="text" name="txtInvestments" id="txtInvestments" tabindex="290" value="<?php echo htmlspecialchars($investments); ?>" required>
    </p>

    <p>
        <label class="label" for="txtMiscellaneous">Miscellaneous:</label>
        <input type="text" name="txtMiscellaneous" id="txtMiscellaneous" tabindex="300" value="<?php echo htmlspecialchars($miscellaneous); ?>" required>
    </p>
</fieldset>

<fieldset class="buttons">
        <input id = "btnSubmit" 
        name = "btnBottomSubmit" 
        type = "submit" 
        tabindex="1000"
        value = "Update" >
</fieldset>
</form>             

<?php include 'footer.php';?>

</body>
</html>
    