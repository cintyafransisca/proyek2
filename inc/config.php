<?php
// connect to db
$dbname='proyek2';
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

if (! mysql_select_db($dbname) ) {
    die ('Can\'t use database : ' . mysql_error());
}
?>