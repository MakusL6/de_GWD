<?php
putenv("nodeNUM=9");
echo shell_exec('/usr/local/bin/pingNODE $nodeNUM');
die();
?>
