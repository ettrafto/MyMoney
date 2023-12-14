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

$userCountQuery = "SELECT COUNT(*) AS userCount FROM tblUser";
$stmt = $pdo->query($userCountQuery);
$userCount = $stmt->fetch(PDO::FETCH_ASSOC)['userCount'];

echo "<h2>Manager's Report</h2>";
echo "<p>Number of Users: " . $userCount . "</p>";

// Fetch user accounts
$userAccountsQuery = "SELECT U.fldUsername, A.fldAccountName 
                      FROM tblUser U 
                      JOIN tblAccount A ON U.pmkUserId = A.fnkUserId
                      ORDER BY U.fldUsername, A.fldAccountName";
$stmt = $pdo->query($userAccountsQuery);
$userAccounts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Process and display user accounts
echo "<h3>User Accounts</h3>";

$currentUser = "";
foreach ($userAccounts as $account) {
    // Check if the user has changed
    if ($currentUser != $account['fldUsername']) {
        // Display the username if it's a new user
        if ($currentUser != "") {
            echo "</ul>"; // Close the previous list
        }
        echo "<p><strong>" . $account['fldUsername'] . ":</strong></p>";
        echo "<ul>"; // Start a new list for this user
        $currentUser = $account['fldUsername'];
    }
    // Display the account name
    echo "<li>" . $account['fldAccountName'] . "</li>";
}
if ($currentUser != "") {
    echo "</ul>"; // Close the last list
}

$userTransactionsQuery = "SELECT 
                              U.fldUsername, 
                              COUNT(T.pmkTransactionId) AS transactionCount 
                          FROM 
                              tblUser U 
                          JOIN 
                              tblAccount A ON U.pmkUserId = A.fnkUserId 
                          JOIN 
                              tblTransaction T ON A.pmkAccountId = T.fnkAccountId
                            WHERE
                              U.pmkUserId = 1
                          GROUP BY 
                              U.pmkUserId, U.fldUsername";
$stmt = $pdo->query($userTransactionsQuery);
$userTransactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<h3>Number of Transactions per User</h3>";
foreach ($userTransactions as $transaction) {
    echo "<p>" . $transaction['fldUsername'] . ": " . $transaction['transactionCount'] . " transactions</p>";
}


?>

<?php include 'footer.php';?>

</body>
</html>
    