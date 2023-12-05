<?php
include 'top.php';
?>

        <main>                  
         
        <p>transactions</p>

      
                <?php
                $sql = 'SELECT
                T.fldTransactionName AS TransactionName,
                T.fnkCategoryName AS CategoryName,
                T.fnkAccountId AS AccountID,
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
                print '<table>';
                print '<tr>';
                print '<th>Name</th>';
                print '<th>Category</th>';
                print '<th>Date</th>';
                print '<th>Amount</th>';
                print '</tr>';
                
                foreach ($records as $record) {
                    print '<tr>';
                    print '<td>' . $record['TransactionName'] . '</td>';
                    print '<td>' . $record['CategoryName'] . '</td>';
                    print '<td>' . $record['Date'] . '</td>';
                    print '<td>' . $record['Amount'] . '</td>';
                    print '</tr>';
                }
                
                echo '</table>';
                ?>


        </main>
    
    <?php include 'footer.php';?>    


    </body>
</html>
    