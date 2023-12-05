<?php
include 'top.php';
$userId = 1;
?>

        <main>                  
        <?php
$sql = 'SELECT
        A.pmkAccountId AS AccountID,
        A.fldAccountName AS AccountName,
        SUM(T.fldTransactionAmount) AS TotalTransactionAmount
        FROM
            tblTransaction T
            JOIN tblAccount A ON T.fnkAccountId = A.pmkAccountId
            JOIN tblUser U ON A.fnkUserId = U.pmkUserId
        WHERE 
        	A.fnkUserId = ?
        GROUP BY
            A.pmkAccountId, A.fldAccountName
        ORDER BY
            A.pmkAccountId';

$statement = $pdo->prepare($sql);
$statement->execute(array($userId));

$records = $statement->fetchAll();
print '<table>';
print '<tr>';
print '<th>Account</th>';
print '<th>Amount</th>';
print '</tr>';

foreach ($records as $record) {
    print '<tr>';
    print '<td>' . $record['AccountName'] . '</td>';
    print '<td>' . $record['TotalTransactionAmount'] . '</td>';
    print '</tr>';
}

echo '</table>';


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
            T.fldTransactionDate DESC
        LIMIT 4;';

$statement = $pdo->prepare($sql);
$statement->execute();

$records = $statement->fetchAll();
print '<table>';
print '<tr>';
print '<th>Transaction Name</th>';
print '<th>Category Name</th>';
print '<th>Account ID</th>';
print '<th>Transaction Date</th>';
print '<th>Amount</th>';
print '</tr>';

foreach ($records as $record) {
    print '<tr>';
    print '<td>' . $record['TransactionName'] . '</td>';
    print '<td>' . $record['CategoryName'] . '</td>';
    print '<td>' . $record['AccountID'] . '</td>';
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
    