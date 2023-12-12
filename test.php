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

$totalHousing/$total;
$totalUtilities/$total;
$totalFood/$total;
$totalTransportation/$total;
$totalLoans/$total;
$totalSavings/$total;
$totalPersonal/$total;
$totalEntertainment/$total;
$totalHealthFitness/$total;
$totalEducation/$total;
$totalInvestments/$total;
$totalMiscellaneous/$total;
}

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

/*
$dataPoints = array( 
	array("label"=>"Housing", "y"=>$housing),
	array("label"=>"Utilities", "y"=>$utilities),
	array("label"=>"Food", "y"=>$food),
	array("label"=>"Transportation", "y"=>$transportation),
	array("label"=>"Loans", "y"=>$loans),
	array("label"=>"Savings", "y"=>$savings),
    array("label"=>"Personal", "y"=>$personal),
    array("label"=>"Entertainment", "y"=>$entertainment),
    array("label"=>"Health & Fitness", "y"=>$healthFitness),
	array("label"=>"Education", "y"=>$education),
	array("label"=>"Investments", "y"=>$investments),
	array("label"=>"Miscellaneous", "y"=>$miscellaneous)


);
*/
print $entertainment . PHP_EOL;
print $total . PHP_EOL;
?>
/*
$dataPoints = array( 
	array("label"=>"Industrial", "y"=>51.7),
	array("label"=>"Transportation", "y"=>26.6),
	array("label"=>"Residential", "y"=>13.9),
	array("label"=>"Commercial", "y"=>7.8)
);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Breakdown"
	},
	subtitles: [{
		text: ""
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>       */