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

                $records = $statement->fetchAll();
                
                print '<table class="table-display">';
                print '<tr>';
                print '<th>Name</th>';
                print '<th>Category</th>';
                print '<th>Account</th>';
                print '<th>Date</th>';
                print '<th>Amount</th>';
                print '</tr>';
                
                foreach ($records as $record) {

                    // Formatting date
                    $formattedDate = date("M d, Y", strtotime($record['Date']));
                
                    // Formatting amount as currency
                    $formattedAmount = '$' . number_format($record['Amount'], 2);
                
                    print '<tr>';
                    print '<td>' . $record['TransactionName'] . '</td>';
                    print '<td>' . $record['CategoryName'] . '</td>';
                    print '<td>' . $record['AccountName'] . '</td>';
                    print '<td>' . htmlspecialchars($formattedDate) . '</td>';
                    print '<td>' . htmlspecialchars($formattedAmount) . '</td>';
                    print '</tr>';
                }
                print '</table>';
                ?>


        </main>
    
    <?php include 'footer.php';?>    


    </body>
</html>
    