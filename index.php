<?php
include 'top.php';
$userId = 1;
?>
<?php
                    $sql = 'SELECT
                    T.fnkCategoryName AS CategoryName,
                    SUM(T.fldTransactionAmount) AS TotalAmount
                FROM
                    tblTransaction T
                    JOIN tblAccount A ON T.fnkAccountId = A.pmkAccountId
                    JOIN tblUser U ON A.fnkUserId = U.pmkUserId
                WHERE
                    U.pmkUserId = 1
                GROUP BY
                    T.fnkCategoryName
                ORDER BY
                    SUM(T.fldTransactionAmount) DESC;'; // Order by total amount for better visualization
        
        $statement = $pdo->prepare($sql);
        $statement->execute();
        
        $transactions = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        $totalAmount = 0;
        $dataPoints = array();
        
        foreach ($transactions as $transaction) {
            $totalAmount += $transaction['TotalAmount'];
        }
        
        foreach ($transactions as $transaction) {
            if ($totalAmount > 0) {
                $percentage = ($transaction['TotalAmount'] / $totalAmount) * 100;
                $dataPoints[] = array("label" => $transaction['CategoryName'], "y" => $percentage);
            }
        }
        
        // Ensure $dataPoints is not empty
        if (empty($dataPoints)) {
            $dataPoints[] = array("label" => "No Data", "y" => 100);
        }
?>
        <main>
        <script>
window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainerPi", {
        animationEnabled: true,
        title:{
            text: "Spending Breakdown",
            fontFamily: "'Raleway','Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"

        },
        data: [{
            type: "pie",
            startAngle: 240,
            yValueFormatString: "##0.00\"%\"",
            indexLabel: "{label} {y}",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
}
</script>
            <div id="chartContainerPi" style="height: 370px; width: 100%;"></div>
            <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

            <section class="index-tables">                  
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
print '<table class="table-display">';
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
            T.fldTransactionDate DESC
        LIMIT 4;';

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

echo '</table>';

?>
    </section>
            
        </main>
    
    <?php include 'footer.php';?>    

    </body>
</html>
    