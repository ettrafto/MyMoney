<nav class="m-nav">
    <a class="<?php if ($pathParts['filename'] == 'index') {print "activePage";}?>" href="index.php">Report</a>
    <a class="<?php if ($pathParts['filename'] == 'add') {print "activePage";}?>" href="add.php">Add</a>
    <a class="<?php if ($pathParts['filename'] == 'update') {print "activePage";}?>" href="update.php">Update</a>
    <a class="<?php if ($pathParts['filename'] == 'delete') {print "activePage";}?>" href="delete.php">Delete</a>
</nav>