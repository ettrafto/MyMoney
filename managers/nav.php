<!--NAV-->
<nav class="m-nav">

    <a class=
        "<?php if ($pathParts['filename'] == 'index') {print "activePage";}?>"
            href="index.php">Dashboard</a>

    <a class=
        "<?php if ($pathParts['filename'] == 'dd') {print "activePage";}?>"
            href="transactions.php">Transactions</a>

    <a class=
        "<?php if ($pathParts['filename'] == 'dd') {print "activePage";}?>"
            href="breakdown.php">Breakdown</a>

    <a class=
        "<?php if ($pathParts['filename'] == 'dd') {print "activePage";}?>"
            href="goals.php">Budget Goals</a>

</nav>
    