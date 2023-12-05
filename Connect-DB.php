<!--Connecting -->
<?php

$databaseName = 'ETTRAFTO_cs2480_final';
$dsn = 'mysql:host=webdb.uvm.edu;dbname=' .$databaseName;
$username = 'ettrafto_admin';
$password = '5MR2SPhz5ALr';
$pdo = new PDO($dsn, $username, $password);
if ($pdo) print '<!-- Connection Complete -->';
?>