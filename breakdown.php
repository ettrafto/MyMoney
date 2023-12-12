    <?php
    include 'top.php';
    $month = 1;
    $year = 2023;
    ?>
    <!--TODO:

    fix percents
    -->
                <main>
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
                    
                    
                    $statement = $pdo->prepare($sql);
                    $statement->bindParam(':year', $selectedYear, PDO::PARAM_INT);
                    $statement->bindParam(':month', $formattedMonth, PDO::PARAM_STR);
                    $statement->execute();

                    $transactions = $statement->fetchAll();

                    $totalHousing=0;
                    $totalUtilities=0;
                    $totalFood=0;
                    $totalTransportation=0;
                    $totalLoans=0;
                    $totalSavings=0;
                    $totalPersonal=0;
                    $totalEntertainment=0;
                    $totalHealthFitness=0;
                    $totalEducation=0;
                    $totalInvestments=0;
                    $totalMiscellaneous=0;

                    
                    $housingPrint = '<tr>' . '<th>Name</th>'.'<th>Account</th>'.'<th>Date</th>'.'<th>Amount</th>'.'</tr>';
                    $utilitiesPrint = '<tr>' . '<th>Name</th>'.'<th>Account</th>'.'<th>Date</th>'.'<th>Amount</th>'.'</tr>';
                    $foodPrint = '<tr>' . '<th>Name</th>'.'<th>Account</th>'.'<th>Date</th>'.'<th>Amount</th>'.'</tr>';
                    $transportationPrint = '<tr>' . '<th>Name</th>'.'<th>Account</th>'.'<th>Date</th>'.'<th>Amount</th>'.'</tr>';
                    $loansPrint = '<tr>' . '<th>Name</th>'.'<th>Account</th>'.'<th>Date</th>'.'<th>Amount</th>'.'</tr>';
                    $savingsPrint = '<tr>' . '<th>Name</th>'.'<th>Account</th>'.'<th>Date</th>'.'<th>Amount</th>'.'</tr>';
                    $personalPrint = '<tr>' . '<th>Name</th>'.'<th>Account</th>'.'<th>Date</th>'.'<th>Amount</th>'.'</tr>';
                    $entertainmentPrint = '<tr>' . '<th>Name</th>'.'<th>Account</th>'.'<th>Date</th>'.'<th>Amount</th>'.'</tr>';
                    $healthFitnessPrint = '<tr>' . '<th>Name</th>'.'<th>Account</th>'.'<th>Date</th>'.'<th>Amount</th>'.'</tr>';
                    $educationPrint = '<tr>' . '<th>Name</th>'.'<th>Account</th>'.'<th>Date</th>'.'<th>Amount</th>'.'</tr>';
                    $investmentsPrint = '<tr>' . '<th>Name</th>'.'<th>Account</th>'.'<th>Date</th>'.'<th>Amount</th>'.'</tr>';
                    $miscellaneousPrint = '<tr>' . '<th>Name</th>'.'<th>Account</th>'.'<th>Date</th>'.'<th>Amount</th>'.'</tr>';

                    foreach($transactions as $transaction){

                        switch ($transaction['CategoryName']){
                            case 'Housing':
                                $totalHousing += $transaction['Amount'];
                                $housingPrint .= '<tr>' . PHP_EOL;
                                $housingPrint .= '<td>' . $transaction['TransactionName'] . '</td>' . PHP_EOL;
                                $housingPrint .= '<td>' . $transaction['AccountName'] . '</td>' . PHP_EOL;
                                $housingPrint .= '<td>' . $transaction['Date'] . '</td>' . PHP_EOL;
                                $housingPrint .= '<td>' . $transaction['Amount'] . '</td>' . PHP_EOL;
                                $housingPrint .= '</tr>' . PHP_EOL;
                                break;
                            case 'Utilities':
                                $totalUtilities += $transaction['Amount'];
                                $utilitiesPrint .= '<tr>' . PHP_EOL;
                                $utilitiesPrint .= '<td>' . $transaction['TransactionName'] . '</td>' . PHP_EOL;
                                $utilitiesPrint .= '<td>' . $transaction['AccountName'] . '</td>' . PHP_EOL;
                                $utilitiesPrint .= '<td>' . $transaction['Date'] . '</td>' . PHP_EOL;
                                $utilitiesPrint .= '<td>' . $transaction['Amount'] . '</td>' . PHP_EOL;
                                $utilitiesPrint .= '</tr>' . PHP_EOL;
                                
                                break;
                            case 'Food':
                                $totalFood += $transaction['Amount'];
                                $foodPrint .= '<tr>' . PHP_EOL;
                                $foodPrint .= '<td>' . $transaction['TransactionName'] . '</td>' . PHP_EOL;
                                $foodPrint .= '<td>' . $transaction['AccountName'] . '</td>' . PHP_EOL;
                                $foodPrint .= '<td>' . $transaction['Date'] . '</td>' . PHP_EOL;
                                $foodPrint .= '<td>' . $transaction['Amount'] . '</td>' . PHP_EOL;
                                $foodPrint .= '</tr>' . PHP_EOL;
                                break;
                            case 'Transportation':
                                $totalTransportation += $transaction['Amount'];
                                $transportationPrint .= '<tr>' . PHP_EOL;
                                $transportationPrint .= '<td>' . $transaction['TransactionName'] . '</td>' . PHP_EOL;
                                $transportationPrint .= '<td>' . $transaction['AccountName'] . '</td>' . PHP_EOL;
                                $transportationPrint .= '<td>' . $transaction['Date'] . '</td>' . PHP_EOL;
                                $transportationPrint .= '<td>' . $transaction['Amount'] . '</td>' . PHP_EOL;
                                $transportationPrint .= '</tr>' . PHP_EOL;
                                break;
                            case 'Loans':
                                $totalLoans += $transaction['Amount'];
                                $loansPrint .= '<tr>' . PHP_EOL;
                                $loansPrint .= '<td>' . $transaction['TransactionName'] . '</td>' . PHP_EOL;
                                $loansPrint .= '<td>' . $transaction['AccountName'] . '</td>' . PHP_EOL;
                                $loansPrint .= '<td>' . $transaction['Date'] . '</td>' . PHP_EOL;
                                $loansPrint .= '<td>' . $transaction['Amount'] . '</td>' . PHP_EOL;
                                $loansPrint .= '</tr>' . PHP_EOL;
                                break;
                            case 'Savings':
                                $totalSavings += $transaction['Amount'];
                                $savingsPrint .= '<tr>' . PHP_EOL;
                                $savingsPrint .= '<td>' . $transaction['TransactionName'] . '</td>' . PHP_EOL;
                                $savingsPrint .= '<td>' . $transaction['AccountName'] . '</td>' . PHP_EOL;
                                $savingsPrint .= '<td>' . $transaction['Date'] . '</td>' . PHP_EOL;
                                $savingsPrint .= '<td>' . $transaction['Amount'] . '</td>' . PHP_EOL;
                                $savingsPrint .= '</tr>' . PHP_EOL;
                                break;
                            case 'Personal':
                                $totalPersonal += $transaction['Amount'];
                                $personalPrint .= '<tr>' . PHP_EOL;
                                $personalPrint .= '<td>' . $transaction['TransactionName'] . '</td>' . PHP_EOL;
                                $personalPrint .= '<td>' . $transaction['AccountName'] . '</td>' . PHP_EOL;
                                $personalPrint .= '<td>' . $transaction['Date'] . '</td>' . PHP_EOL;
                                $personalPrint .= '<td>' . $transaction['Amount'] . '</td>' . PHP_EOL;
                                $personalPrint .= '</tr>' . PHP_EOL;
                                break;
                            case 'Entertainment':
                                $totalEntertainment += $transaction['Amount'];
                                $entertainmentPrint .= '<tr>' . PHP_EOL;
                                $entertainmentPrint .= '<td>' . $transaction['TransactionName'] . '</td>' . PHP_EOL;
                                $entertainmentPrint .= '<td>' . $transaction['AccountName'] . '</td>' . PHP_EOL;
                                $entertainmentPrint .= '<td>' . $transaction['Date'] . '</td>' . PHP_EOL;
                                $entertainmentPrint .= '<td>' . $transaction['Amount'] . '</td>' . PHP_EOL;
                                $entertainmentPrint .= '</tr>' . PHP_EOL;
                                break;
                            case 'HealthFitness':
                                $totalHealthFitness += $transaction['Amount'];
                                $healthFitnessPrint .= '<tr>' . PHP_EOL;
                                $healthFitnessPrint .= '<td>' . $transaction['TransactionName'] . '</td>' . PHP_EOL;
                                $healthFitnessPrint .= '<td>' . $transaction['AccountName'] . '</td>' . PHP_EOL;
                                $healthFitnessPrint .= '<td>' . $transaction['Date'] . '</td>' . PHP_EOL;
                                $healthFitnessPrint .= '<td>' . $transaction['Amount'] . '</td>' . PHP_EOL;
                                $healthFitnessPrint .= '</tr>' . PHP_EOL;
                                break;
                            case 'Education':
                                $totalEducation += $transaction['Amount'];
                                $educationPrint .= '<tr>' . PHP_EOL;
                                $educationPrint .= '<td>' . $transaction['TransactionName'] . '</td>' . PHP_EOL;
                                $educationPrint .= '<td>' . $transaction['AccountName'] . '</td>' . PHP_EOL;
                                $educationPrint .= '<td>' . $transaction['Date'] . '</td>' . PHP_EOL;
                                $educationPrint .= '<td>' . $transaction['Amount'] . '</td>' . PHP_EOL;
                                $educationPrint .= '</tr>' . PHP_EOL;
                                break;
                            case 'Investments':
                                $totalInvestments += $transaction['Amount'];
                                $investmentsPrint .= '<tr>' . PHP_EOL;
                                $investmentsPrint .= '<td>' . $transaction['TransactionName'] . '</td>' . PHP_EOL;
                                $investmentsPrint .= '<td>' . $transaction['AccountName'] . '</td>' . PHP_EOL;
                                $investmentsPrint .= '<td>' . $transaction['Date'] . '</td>' . PHP_EOL;
                                $investmentsPrint .= '<td>' . $transaction['Amount'] . '</td>' . PHP_EOL;
                                $investmentsPrint .= '</tr>' . PHP_EOL;
                                break;
                            case 'Miscellaneous':
                                $totalMiscellaneous += $transaction['Amount'];
                                $miscellaneousPrint .= '<tr>' . PHP_EOL;
                                $miscellaneousPrint .= '<td>' . $transaction['TransactionName'] . '</td>' . PHP_EOL;
                                $miscellaneousPrint .= '<td>' . $transaction['AccountName'] . '</td>' . PHP_EOL;
                                $miscellaneousPrint .= '<td>' . $transaction['Date'] . '</td>' . PHP_EOL;
                                $miscellaneousPrint .= '<td>' . $transaction['Amount'] . '</td>' . PHP_EOL;
                                $miscellaneousPrint .= '</tr>' . PHP_EOL;
                                break;
                        }
                        
                    }
                    //checking if a given category for a time period is empty
                    if ($totalHousing == 0) {
                        $housingPrint = '<tr><td colspan="4">You don\'t have any transactions in the Housing category for the selected month.</td></tr>';
                    }
                    
                    // Utilities
                    if ($totalUtilities == 0) {
                        $utilitiesPrint = '<tr><td colspan="4">You don\'t have any transactions in the Utilities category for the selected month.</td></tr>';
                    }
                    
                    // Food
                    if ($totalFood == 0) {
                        $foodPrint = '<tr><td colspan="4">You don\'t have any transactions in the Food category for the selected month.</td></tr>';
                    }
                    
                    // Transportation
                    if ($totalTransportation == 0) {
                        $transportationPrint = '<tr><td colspan="4">You don\'t have any transactions in the Transportation category for the selected month.</td></tr>';
                    }
                    
                    // Loans
                    if ($totalLoans == 0) {
                        $loansPrint = '<tr><td colspan="4">You don\'t have any transactions in the Loans category for the selected month.</td></tr>';
                    }
                    
                    // Savings
                    if ($totalSavings == 0) {
                        $savingsPrint = '<tr><td colspan="4">You don\'t have any transactions in the Savings category for the selected month.</td></tr>';
                    }
                    
                    // Personal
                    if ($totalPersonal == 0) {
                        $personalPrint = '<tr><td colspan="4">You don\'t have any transactions in the Personal category for the selected month.</td></tr>';
                    }
                    
                    // Entertainment
                    if ($totalEntertainment == 0) {
                        $entertainmentPrint = '<tr><td colspan="4">You don\'t have any transactions in the Entertainment category for the selected month.</td></tr>';
                    }
                    
                    // Health & Fitness
                    if ($totalHealthFitness == 0) {
                        $healthFitnessPrint = '<tr><td colspan="4">You don\'t have any transactions in the Health & Fitness category for the selected month.</td></tr>';
                    }
                    
                    // Education
                    if ($totalEducation == 0) {
                        $educationPrint = '<tr><td colspan="4">You don\'t have any transactions in the Education category for the selected month.</td></tr>';
                    }
                    
                    // Investments
                    if ($totalInvestments == 0) {
                        $investmentsPrint = '<tr><td colspan="4">You don\'t have any transactions in the Investments category for the selected month.</td></tr>';
                    }
                    
                    // Miscellaneous
                    if ($totalMiscellaneous == 0) {
                        $miscellaneousPrint = '<tr><td colspan="4">You don\'t have any transactions in the Miscellaneous category for the selected month.</td></tr>';
                    }
                    ?>
                    <!-- Pie Chart -->
                    <section class='chart-container'>
                        <div id="chartContainerPi" style="height: 370px; width: 100%;"></div>
                        <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

                    <!-- Line Chart -->
                        <div id="chartContainerBar" style="height: 370px; width: 100%;"></div>
                        <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                    </section>
    <section class="button-parent">
    <?php

                    //<span class="arrow-down" id="arrow-housing">
                    // Housing
                    print '<button class="full-width-button" onclick="dropPanel(\'housing\')"></span> Housing</button>';
                    print '<table id="housing" style="display:none;">';
                    print $housingPrint;
                    print '</table>';

                    // Utilities
                    print '<button class="full-width-button" onclick="dropPanel(\'utilities\')">Utilities</button>';
                    print '<table id="utilities" style="display:none;">';
                    print $utilitiesPrint;
                    print '</table>';

                    // Food
                    print '<button class="full-width-button" onclick="dropPanel(\'food\')">Food</button>';
                    print '<table id="food" style="display:none;">';
                    print $foodPrint;
                    print '</table>';

                    // Transportation
                    print '<button class="full-width-button" onclick="dropPanel(\'transportation\')">Transportation</button>';
                    print '<table id="transportation" style="display:none;">';
                    print $transportationPrint;
                    print '</table>';

                    // Loans
                    print '<button class="full-width-button" onclick="dropPanel(\'loans\')">Loans</button>';
                    print '<table id="loans" style="display:none;">';
                    print $loansPrint;
                    print '</table>';

                    // Savings
                    print '<button class="full-width-button" onclick="dropPanel(\'savings\')">Savings</button>';
                    print '<table id="savings" style="display:none;">';
                    print $savingsPrint;
                    print '</table>';

                    // Personal
                    print '<button class="full-width-button" onclick="dropPanel(\'personal\')">Personal</button>';
                    print '<table id="personal" style="display:none;">';
                    print $personalPrint;
                    print '</table>';

                    // Entertainment
                    print '<button class="full-width-button" onclick="dropPanel(\'entertainment\')">Entertainment</button>';
                    print '<table id="entertainment" style="display:none;">';
                    print $entertainmentPrint;
                    print '</table>';

                    // Health & Fitness
                    print '<button class="full-width-button" onclick="dropPanel(\'healthFitness\')">Health & Fitness</button>';
                    print '<table id="healthFitness" style="display:none;">';
                    print $healthFitnessPrint;
                    print '</table>';

                    // Education
                    print '<button class="full-width-button" onclick="dropPanel(\'education\')">Education</button>';
                    print '<table id="education" style="display:none;">';
                    print $educationPrint;
                    print '</table>';

                    // Investments
                    print '<button class="full-width-button" onclick="dropPanel(\'investments\')">Investments</button>';
                    print '<table id="investments" style="display:none;">';
                    print $investmentsPrint;
                    print '</table>';

                    // Miscellaneous
                    print '<button class="full-width-button" onclick="dropPanel(\'miscellaneous\')">Miscellaneous</button>';
                    print '<table id="miscellaneous" style="display:none;">';
                    print $miscellaneousPrint;
                    print '</table>';
                    ?>
                    
                </section>
                    <?php
                    



                    //graph work

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

                    //populating line graph
                    $sql1 = 'SELECT
                        DAY(T.fldTransactionDate) AS DayOfMonth,
                        SUM(T.fldTransactionAmount) AS TotalAmount
                    FROM
                        tblTransaction T
                        JOIN tblAccount A ON T.fnkAccountId = A.pmkAccountId
                        JOIN tblUser U ON A.fnkUserId = U.pmkUserId
                    WHERE
                        U.pmkUserId = 1 AND
                        YEAR(T.fldTransactionDate) = :year AND
                        MONTH(T.fldTransactionDate) = :month
                    GROUP BY
                        DAY(T.fldTransactionDate);';

                    $statement = $pdo->prepare($sql1);
                    $statement->bindParam(':year', $selectedYear, PDO::PARAM_INT);
                    $statement->bindParam(':month', $formattedMonth, PDO::PARAM_INT);
                    $statement->execute();
                    $dailyTotals = $statement->fetchAll(PDO::FETCH_ASSOC);

                    // Initialize an array for each day of the month with 0 amount
                    $dataPoints1 = array_fill(1, 31, array("label" => "", "y" => 0));

                    // Initialize an array for each day of the month with 0 amount
                    $dataPoints1 = array_fill(0, 31, array("label" => "", "y" => 0));

                    // Populate the array with actual data
                    foreach ($dailyTotals as $dayData) {
                        $day = (int)$dayData['DayOfMonth'];
                        // Subtract 1 from day to correctly index into the array
                        $dataPoints1[$day - 1] = array("label" => "Day $day", "y" => $dayData['TotalAmount']);
                    }
                    //debug
                    /*foreach($dataPoints1 as $data){
                        print_r($data);  // or var_dump($data) for more detailed output
                        echo "<br>";     // Adds a line break for readability in the browser
                    }*/
                    

                ?>
                <script>
                    window.onload = function () {
                        var pieChart = new CanvasJS.Chart("chartContainerPi", {
                            animationEnabled: true,
                            title: {
                                text: "Spending Breakdown",
                                fontFamily: "'Raleway','Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"

                            },
                            subtitles: [{
                                text: ""
                            }],
                            axisY: {
                                titleFontFamily: "'Raleway','Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"
                            },
                            axisX: {
                                labelFontFamily: "'Raleway','Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"
                            },
                            data: [{
                                type: "pie",
                                yValueFormatString: "#,##0.##\"%\"", // Adjusted format string
                                indexLabel: "{label} (#percent%)", // Using built-in percent formatter
                                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                            }]
                        });
                        pieChart.render();

                        var lineChart = new CanvasJS.Chart("chartContainerBar", {
                            title: {
                                text: "Spending by Day",
                                fontFamily: "'Raleway','Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"

                            },
                            subtitles: [{
                                text: ""
                            }],
                            axisY: {
                                title: "Spending ($)",
                                titleFontFamily: "'Raleway','Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"

                            },
                            axisX: {
                                labelFontFamily: "'Raleway','Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"
                            },
                            data: [{
                                type: "column",
                                dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
                            }]
                        });
                        lineChart.render();
                    }
                </script>
                        
            
            </main>
        
        <?php include 'footer.php';?>    

        </body>
    </html>
        