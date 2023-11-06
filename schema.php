<?php
include 'top.php';
?>

    <h2>Lab 6: Schema</h2>

    
    <h3>User Table</h3>

    <p>
    CREATE TABLE tblUser (<br>
    pmkUserId INT AUTO_INCREMENT PRIMARY KEY,<br>
    fldUsername VARCHAR(25) NOT NULL DEFAULT '0', <br>
    fldIncome DECIMAL(15,2) NOT NULL DEFAULT '0',<br>
    fldNetWorth DECIMAL(15,2) NOT NULL DEFAULT '0'<br>
    );<br>
    <br>
    INSERT INTO tblUser (fldUsername, fldIncome, fldNetWorth)<br>
    VALUES<br>
    ('User1', 5000.00, 25000.00),<br>
    ('User2', 6000.50, 30000.75),<br>
    ('User3', 7500.25, 40000.25),<br>
    ('User4', 5500.75, 27500.50),<br>
    ('User5', 6200.00, 35000.25);
    </p>

<h3>Account Table</h3>

    <p>
    CREATE TABLE tblAccount (<br>
    pmkAccountId INT AUTO_INCREMENT,<br>
    fnkUserId INT(11) NOT NULL DEFAULT '0',<br>
    fldAccountName VARCHAR(25) NOT NULL DEFAULT '0', <br>
    fldCurrentBalance INT(14) NOT NULL DEFAULT '0', <br>
    fldLastMonthBalance INT(14) NOT NULL DEFAULT '0',<br>
<br>
    PRIMARY KEY(pmkAccountId, fnkUserId)<br>
    );<br>
    <br>
    INSERT INTO tblAccount (fnkUserId, fldAccountName, fldCurrentBalance, fldLastMonthBalance)<br>
    VALUES<br>
    (1, 'Savings', 10000, 9500),<br>
    (2, 'Checking', 7500, 7200),<br>
    (3, 'Investment', 30000, 29500),<br>
    (4, 'Credit Card', -500, -250),<br>
    (5, 'Loan', 1500, 1500);

    </p>

<h3>Transaction Table</h3>

    <p>
    CREATE TABLE tblTransaction (<br>
    pmkTransactionId INT(11) NOT NULL DEFAULT '0',<br>
    fnkAccountId INT(11) NOT NULL DEFAULT '0',<br>
    fnkCategoryName VARCHAR(20) NOT NULL DEFAULT '0',<br>
    fldTransactionName VARCHAR(25) NOT NULL DEFAULT '0',<br> 
    fldTransactionAmount INT(14) NOT NULL DEFAULT '0', <br>
    fldTransactionDate DATETIME NOT NULL DEFAULT '2023-01-01 00:00:00',<br>

    PRIMARY KEY(pmkTransactionId,fnkAccountId,fnkCategoryName)<br>
    );<br>
    <br>
    INSERT INTO tblTransaction (fnkAccountId, fnkCategoryName, fldTransactionName, fldTransactionAmount, fldTransactionDate)<br>
    VALUES<br>
    (1, 'Groceries', 'Grocery shopping', 150.50, '2023-01-05 09:30:00'),<br>
    (2, 'Utilities', 'Electric bill', 120.25, '2023-01-10 14:15:00'),<br>
    (3, 'Entertainment', 'Concert tickets', 75.00, '2023-01-15 19:00:00'),<br>
    (4, 'Dining', 'Restaurant bill', 85.75, '2023-01-20 18:45:00'),<br>
    (5, 'Shopping', 'Online purchase', 60.00, '2023-01-25 16:00:00');
    
    </p>

<h3>Category Table</h3>

    <p>

    CREATE TABLE tblCategory (<br>
    pmkCategoryName VARCHAR(15) NOT NULL PRIMARY KEY,<br>
    fldDisplayOrder INT(11) NOT NULL DEFAULT '0'<br>
    );<br>
    <br>
    INSERT INTO tblCategory (pmkCategoryName, fldDisplayOrder)<br>
    VALUES<br>
    ('Groceries', 1),<br>
    ('Utilities', 2),<br>
    ('Entertainment', 3),<br>
    ('Dining', 4),<br>
    ('Shopping', 5);

    </p>
<h3>Budget Table</h3>

    <p>
    CREATE TABLE tblBudget (<br>
    pmkMonth VARCHAR(15) NOT NULL DEFAULT '0',<br>
    fnkUserId INT(11) NOT NULL DEFAULT '0',<br>
    fnkCategoryName  VARCHAR(15) NOT NULL DEFAULT '0',<br>
    fldTotalBudget DECIMAL(15,2) NOT NULL DEFAULT '0',<br>
    fldAmount DECIMAL(15,2) NOT NULL DEFAULT '0',<br>

    PRIMARY KEY(pmkMonth,fnkUserId,fnkCategoryName)<br>
    );<br>
    <br>
    INSERT INTO tblBudget (pmkMonth, fnkUserId, fnkCategoryName, fldTotalBudget, fldAmount)<br>
    VALUES<br>
    ('January 2023', 1, 'Groceries', 200.00, 175.00),<br>
    ('January 2023', 2, 'Utilities', 150.00, 130.00),<br>
    ('January 2023', 3, 'Entertainment', 100.00, 90.00),<br>
    ('January 2023', 4, 'Dining', 120.00, 105.00),<br>
    ('January 2023', 5, 'Shopping', 90.00, 75.00);
    </p>











    







<?php include 'footer.php';?>    

    </body>
</html>

<!--
CREATE TABLE tblUser (
    pmkUserId INT AUTO_INCREMENT PRIMARY KEY,
    fldUsername VARCHAR(25) NOT NULL DEFAULT '0', 
    fldIncome DECIMAL(15,2) NOT NULL DEFAULT '0',
    fldNetWorth DECIMAL(15,2) NOT NULL DEFAULT '0'
);

CREATE TABLE tblAccount (
    pmkAccountId INT AUTO_INCREMENT,
    fnkUserId INT(11) NOT NULL DEFAULT '0',
    fldAccountName VARCHAR(25) NOT NULL DEFAULT '0', 
    fldCurrentBalance INT(14) NOT NULL DEFAULT '0', 
    fldLastMonthBalance INT(14) NOT NULL DEFAULT '0',

    PRIMARY KEY(pmkAccountId, fnkUserId)
);

CREATE TABLE tblTransaction (
    pmkTransactionId INT(11) NOT NULL DEFAULT '0',
    fnkAccountId INT(11) NOT NULL DEFAULT '0',
    fnkCategoryName VARCHAR(20) NOT NULL DEFAULT '0',
    fldTransactionName VARCHAR(25) NOT NULL DEFAULT '0', 
    fldTransactionAmount INT(14) NOT NULL DEFAULT '0', 
    fldTransactionDate DATETIME NOT NULL DEFAULT '2023-01-01 00:00:00',

    PRIMARY KEY(pmkTransactionId,fnkAccountId,fnkCategoryName)
);

CREATE TABLE tblCategory (
    pmkCategoryName VARCHAR(15) NOT NULL PRIMARY KEY,
    fldDisplayOrder INT(11) NOT NULL DEFAULT '0'
);

CREATE TABLE tblBudget (
    pmkMonth VARCHAR(15) NOT NULL DEFAULT '0',
    fnkUserId INT(11) NOT NULL DEFAULT '0',
    fnkCategoryName  VARCHAR(15) NOT NULL DEFAULT '0',
    fldTotalBudget DECIMAL(15,2) NOT NULL DEFAULT '0',
    fldAmount DECIMAL(15,2) NOT NULL DEFAULT '0',

    PRIMARY KEY(pmkMonth,fnkUserId,fnkCategoryName)
);

INSERT INTO tblUser (fldUsername, fldIncome, fldNetWorth)
VALUES
    ('User1', 5000.00, 25000.00),
    ('User2', 6000.50, 30000.75),
    ('User3', 7500.25, 40000.25),
    ('User4', 5500.75, 27500.50),
    ('User5', 6200.00, 35000.25);

   INSERT INTO tblAccount (fnkUserId, fldAccountName, fldCurrentBalance, fldLastMonthBalance)
VALUES
    (1, 'Savings', 10000, 9500),
    (2, 'Checking', 7500, 7200),
    (3, 'Investment', 30000, 29500),
    (4, 'Credit Card', -500, -250),
    (5, 'Loan', 1500, 1500);

    INSERT INTO tblTransaction (fnkAccountId, fnkCategoryName, fldTransactionName, fldTransactionAmount, fldTransactionDate)
VALUES
    (1, 'Groceries', 'Grocery shopping', 150.50, '2023-01-05 09:30:00'),
    (2, 'Utilities', 'Electric bill', 120.25, '2023-01-10 14:15:00'),
    (3, 'Entertainment', 'Concert tickets', 75.00, '2023-01-15 19:00:00'),
    (4, 'Dining', 'Restaurant bill', 85.75, '2023-01-20 18:45:00'),
    (5, 'Shopping', 'Online purchase', 60.00, '2023-01-25 16:00:00');


    INSERT INTO tblCategory (pmkCategoryName, fldDisplayOrder)
VALUES
    ('Groceries', 1),
    ('Utilities', 2),
    ('Entertainment', 3),
    ('Dining', 4),
    ('Shopping', 5);

INSERT INTO tblBudget (pmkMonth, fnkUserId, fnkCategoryName, fldTotalBudget, fldAmount)
VALUES
    ('January 2023', 1, 'Groceries', 200.00, 175.00),
    ('January 2023', 2, 'Utilities', 150.00, 130.00),
    ('January 2023', 3, 'Entertainment', 100.00, 90.00),
    ('January 2023', 4, 'Dining', 120.00, 105.00),
    ('January 2023', 5, 'Shopping', 90.00, 75.00);





    SELECT
    (fldTransactionName, fnkCategoryName, fnkAccountId, fldTransactionDate, fldTransactionAmount)
    FROM
    tblTransaction;
    Join tblAccount on pmkAccountId = fnkAccountId;
    Join tblUser on pmkUserId = fnkUserId;
    WHERE pmkUserId = 1;
    ORDER BY fldTransactionDate;


SELECT
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
    T.fldTransactionDate;

-->