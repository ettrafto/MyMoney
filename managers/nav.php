<nav class="m-nav">
    <a class="<?php if ($pathParts['filename'] == 'index') {print "activePage";}?>" href="index.php">Dashboard</a>
    <a class="<?php if ($pathParts['filename'] == 'transactions') {print "activePage";}?>" href="transactions.php">Transactions</a>
    <a class="<?php if ($pathParts['filename'] == 'breakdown') {print "activePage";}?>" href="breakdown.php">Breakdown</a>
    <a class="<?php if ($pathParts['filename'] == 'form') {print "activePage";}?>" href="form.php">Budget Goals</a>
</nav>