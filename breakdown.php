<?php
include 'top.php';
?>

        <main>                  
        
        <?php
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
                U.pmkUserId = 1
            ORDER BY
                T.fldTransactionDate;';
            
            
            $statement = $pdo->prepare($sql);
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

            // Housing
            print '<button onclick="dropPanel(\'housing\')">Toggle Housing</button>';
            print '<table id="housing" style="display:none;">';
            print $housingPrint;
            print '</table>';

            // Utilities
            print '<button onclick="dropPanel(\'utilities\')">Toggle Utilities</button>';
            print '<table id="utilities" style="display:none;">';
            print $utilitiesPrint;
            print '</table>';

            // Food
            print '<button onclick="dropPanel(\'food\')">Toggle Food</button>';
            print '<table id="food" style="display:none;">';
            print $foodPrint;
            print '</table>';

            // Transportation
            print '<button onclick="dropPanel(\'transportation\')">Toggle Transportation</button>';
            print '<table id="transportation" style="display:none;">';
            print $transportationPrint;
            print '</table>';

            // Loans
            print '<button onclick="dropPanel(\'loans\')">Toggle Loans</button>';
            print '<table id="loans" style="display:none;">';
            print $loansPrint;
            print '</table>';

            // Savings
            print '<button onclick="dropPanel(\'savings\')">Toggle Savings</button>';
            print '<table id="savings" style="display:none;">';
            print $savingsPrint;
            print '</table>';

            // Personal
            print '<button onclick="dropPanel(\'personal\')">Toggle Personal</button>';
            print '<table id="personal" style="display:none;">';
            print $personalPrint;
            print '</table>';

            // Entertainment
            print '<button onclick="dropPanel(\'entertainment\')">Toggle Entertainment</button>';
            print '<table id="entertainment" style="display:none;">';
            print $entertainmentPrint;
            print '</table>';

            // Health & Fitness
            print '<button onclick="dropPanel(\'healthFitness\')">Toggle Health & Fitness</button>';
            print '<table id="healthFitness" style="display:none;">';
            print $healthFitnessPrint;
            print '</table>';

            // Education
            print '<button onclick="dropPanel(\'education\')">Toggle Education</button>';
            print '<table id="education" style="display:none;">';
            print $educationPrint;
            print '</table>';

            // Investments
            print '<button onclick="dropPanel(\'investments\')">Toggle Investments</button>';
            print '<table id="investments" style="display:none;">';
            print $investmentsPrint;
            print '</table>';

            // Miscellaneous
            print '<button onclick="dropPanel(\'miscellaneous\')">Toggle Miscellaneous</button>';
            print '<table id="miscellaneous" style="display:none;">';
            print $miscellaneousPrint;
            print '</table>';


        ?>
        
        </main>
    
    <?php include 'footer.php';?>    

    </body>
</html>
    