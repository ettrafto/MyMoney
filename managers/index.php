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
?>

<?php include 'footer.php';?>

</body>
</html>
    