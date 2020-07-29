<div class="leftpanel">
<?php
session_start();
if(!empty($_SESSION['username']) and !empty($_SESSION['password'])){
    $sql = "SELECT * FROM user where username='$_SESSION[username]'";
    $result = mysql_query($sql);
	$data = mysql_fetch_array($result);
}
?>
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">PEGAWAI, <?php echo "$data[nama]";?></li>
                <li><a href="index.php"><span class="iconfa-laptop"></span> Dashboard</a></li>
                <li><a href="index.php?mod=pegawai2"><span class="iconfa-user"></span>Data Diri</a></li>
                <li><a href="index.php?mod=penilaian2"><span class="iconfa-file"></span>Penilaian</a></li>
                
                <li><a href="logout.php"><span class="iconfa-off"></span> Log Out</a></li>
                
            </ul>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->