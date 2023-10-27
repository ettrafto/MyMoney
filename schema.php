<?php
include 'top.php';
?>

    <h2>Lab 6: Schema</h2>

    <h3>User Table</h3>
    <p>

    CREATE TABLE tblUser (<br>
    pmkUserId INT AUTO_INCREMENT PRIMARY KEY,<br>
    fldUsername varchar(25) NOT NULL DEFAULT '0', <br>
    fldPassword varchar(35) NOT NULL DEFAULT '0'<br>
    );
    </p>

    <h3>Account Table</h3>
    <p>

    CREATE TABLE tblAccount (<br>
    pmkAccountId INT AUTO_INCREMENT PRIMARY KEY,<br>
    fnkUserId INT(11) NOT NULL DEFAULT '0',<br>
    fldAccountName varchar(25) NOT NULL DEFAULT '0', <br>
    fldAccountAmount int(14) NOT NULL DEFAULT '0', <br>
    fldAccountMonthlyDifference int(14) NOT NULL DEFAULT '0'<br>
    );
    </p>

    <h3>AccountTransaction Table</h3>
    <p>
    CREATE TABLE tblAccountTransaction (<br>
    fnkTransactionId INT(11) NOT NULL DEFAULT '0',<br>
    fnkAccountId INT(11) NOT NULL DEFAULT '0'<br>
    );
    </p>

    <h3>Transaction Table</h3>
    <p>
    CREATE TABLE tblTransaction (<br>
    pmkTransactionId INT(11) NOT NULL DEFAULT '0',<br>
    fldTransactionName varchar(25) NOT NULL DEFAULT '0', <br>
    fldTransactionAmount int(14) NOT NULL DEFAULT '0', <br>
    fldTransactionDate DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'<br>
    );
    </p>

    <h3>TransactionCategory Table</h3>
    <p>
    CREATE TABLE tblTransactionCategory (<br>
    pmkTransactionId INT(11) NOT NULL DEFAULT '0',<br>
    fnkCategoryName varchar(15) NOT NULL DEFAULT '0'<br>
    );

    </p>
    <h3>Category Table</h3>
    <p>
    CREATE TABLE tblCategory (
    pmkCategoryName VARCHAR(15) NOT NULL PRIMARY KEY, <br>
    fldCategoryAmount INT(14) NOT NULL DEFAULT 0, <br>
    fldCategoryPercent int(3) NOT NULL DEFAULT '0'<br>
    );
    </p>

    <h3>Budget Goal Table</h3>
    <p>
    CREATE TABLE tblBudgetGoal (<br>
    pmkBudgetGoalId INT(11) NOT NULL DEFAULT '0',<br>
    fldBGTotalAmount INT(14) NOT NULL DEFAULT 0, <br>
    fldBGTIncome int(14) NOT NULL DEFAULT '0'<br>
    );
    </p>

    <h3>Budget Goal Budget Category Table</h3>
    <p>
    CREATE TABLE tblBudgetGoalBudgetCategory (
    fnkBudgetGoalId INT(11) NOT NULL DEFAULT '0',<br>
    fnkGCategoryName varchar(15) NOT NULL DEFAULT '0'<br>
    );

    </p>
    <h3>Budget Category Table</h3>
    <p>
    CREATE TABLE tblBudgetCategory (<br>
    pmkGCategoryName VARCHAR(15) NOT NULL PRIMARY KEY, <br>
    fldGCategoryAmount INT(14) NOT NULL DEFAULT 0, <br>
    fldGCategoryPercent int(3) NOT NULL DEFAULT '0'<br>
    );

    </p>
    

<?php include 'footer.php';?>    

    </body>
</html>

