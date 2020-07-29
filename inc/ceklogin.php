<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$u=sanitize($_SESSION['suser']);
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$p=sanitize($_SESSION['spass']);
$sql = "select * from user where username='$u' and password='$p'";
if(mysql_num_rows(mysql_query($sql))==0) {
    echo '<meta http-equiv="refresh" content="2;url=login.php" />';
	die();
}
?>