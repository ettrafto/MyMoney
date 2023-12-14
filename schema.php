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
    pmkTransactionId INT AUTO_INCREMENT,
    fnkAccountId INT(11) NOT NULL DEFAULT '0',
    fnkCategoryName VARCHAR(20) NOT NULL DEFAULT '0',
    fldTransactionName VARCHAR(25) NOT NULL DEFAULT '0', 
    fldTransactionAmount INT(14) NOT NULL DEFAULT '0', 
    fldTransactionDate DATETIME NOT NULL DEFAULT '2023-01-01 00:00:00',

    PRIMARY KEY(pmkTransactionId,fnkAccountId,fnkCategoryName)
);

CREATE TABLE tblCategory (
    pmkCategoryName VARCHAR(19) NOT NULL PRIMARY KEY,
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



-- Inserting data for Users
INSERT INTO tblUser (fldUsername, fldIncome, fldNetWorth)
VALUES
    ('User1', 5000.00, 25000.00);

-- Inserting data for Accounts
INSERT INTO tblAccount (pmkAccountId, fnkUserId, fldAccountName, fldCurrentBalance, fldLastMonthBalance)
VALUES
    (1,1, 'Savings', 10000, 9500),
    (2,1, 'Checking', 7500, 7200),
    (3,1, 'Investment', 30000, 29500),
    (4,1, 'Credit Cards', 30000, 29500);
    

-- Inserting data for Categories
INSERT INTO tblCategory (pmkCategoryName, fldDisplayOrder)
VALUES
    ('Housing', 1),
    ('Utilities', 2),
    ('Food', 3),
    ('Transportation', 4),
    ('Loans', 5),
    ('Savings', 6),
    ('Personal', 7),
    ('Entertainment', 8),
    ('Health and Fitness', 9), 
    ('Education', 10),
    ('Investments', 11),
    ('Miscellaneous', 12);

-- Inserting data for Transactions
INSERT INTO tblTransaction (fnkAccountId, fnkCategoryName, fldTransactionName, fldTransactionAmount, fldTransactionDate)
VALUES
    (1, 'Housing', 'Rent payment', 1200.00, '2023-01-05 09:30:00'),
    (1, 'Housing', 'Utilities payment', 150.00, '2023-01-15 15:45:00'),

    (1, 'Utilities', 'Electricity bill', 60.00, '2023-01-10 12:00:00'),
    (1, 'Utilities', 'Water bill', 40.00, '2023-01-20 18:30:00'),

    (1, 'Food', 'Grocery shopping', 75.00, '2023-01-08 11:00:00'),
    (1, 'Food', 'Dinner delivery', 25.00, '2023-01-18 19:15:00'),

    (1, 'Transportation', 'Gas refueling', 30.50, '2023-01-22 14:45:00'),
    (1, 'Transportation', 'Public transit pass', 15.00, '2023-01-27 17:30:00'),

    (1, 'Loans', 'Student loan payment', 100.00, '2023-01-25 14:00:00'),
    (1, 'Loans', 'Car loan payment', 50.00, '2023-01-28 16:45:00'),

    (1, 'Savings', 'Transfer to savings', 200.00, '2023-02-02 10:30:00'),
    (1, 'Savings', 'Emergency fund deposit', 50.00, '2023-02-12 12:15:00'),

    (1, 'Personal', 'Gym membership', 35.50, '2023-02-05 12:00:00'),
    (1, 'Personal', 'Beauty products', 20.00, '2023-02-15 15:30:00'),

    (1, 'Entertainment', 'Movie night', 20.00, '2023-02-10 19:00:00'),
    (1, 'Entertainment', 'Concert tickets', 40.00, '2023-02-20 21:45:00'),

    (1, 'Health and Fitness', 'Yoga class', 25.00, '2023-02-15 18:00:00'),
    (1, 'Health and Fitness', 'Vitamins purchase', 15.00, '2023-02-28 13:30:00'),

    (1, 'Education', 'Book purchase', 30.00, '2023-02-20 12:30:00'),
    (1, 'Education', 'Online course fee', 50.00, '2023-03-05 10:15:00'),

    (1, 'Investments', 'Stock purchase', 50.00, '2023-02-25 14:00:00'),
    (1, 'Investments', 'Cryptocurrency investment', 30.00, '2023-03-10 16:45:00'),

    (1, 'Miscellaneous', 'Misc expense', 15.75, '2023-03-01 16:30:00'),
    (1, 'Miscellaneous', 'Gift purchase', 25.00, '2023-03-12 14:00:00');


-- Inserting data for Budgets
INSERT INTO tblBudget (pmkMonth, fnkUserId, fnkCategoryName, fldTotalBudget, fldAmount)
VALUES
    ('January 2023', 1, 'Housing', 180.00, 30.00),
    ('January 2023', 1, 'Utilities', 180.00, 0.00),
    ('January 2023', 1, 'Food', 180.00, 25.00),
    ('January 2023', 1, 'Transportation', 180.00, 15.00),
    ('January 2023', 1, 'Loans', 180.00, 0.00),
    ('January 2023', 1, 'Savings', 180.00, 10.00),
    ('January 2023', 1, 'Personal', 180.00, 15.00),
    ('January 2023', 1, 'Entertainment', 180.00, 5.00),
    ('January 2023', 1, 'Health and Fitness', 180.00, 20.00),
    ('January 2023', 1, 'Education', 180.00, 20.00),
    ('January 2023', 1, 'Investments', 180.00, 0.00),
    ('January 2023', 1, 'Miscellaneous', 180.00, 5.00);