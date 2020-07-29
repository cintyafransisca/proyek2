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
            	<li class="nav-header">ADMIN, <?php echo $data['nama']?></li>
                <li><a href="index.php"><span class="iconfa-laptop"></span> Dashboard</a></li>
                <li><a href="index.php?mod=user"><span class="iconfa-user"></span>User</a></li>
                <li><a href="index.php?mod=pegawai"><span class="iconfa-group"></span>Data Pegawai</a></li>
                <li><a href="index.php?mod=kriteria"><span class="iconfa-list"></span>Data Kriteria</a></li>
                <li><a href="index.php?mod=penilaian"><span class="iconfa-file"></span>Penilaian</a></li>
                <li><a href="index.php?mod=hasil"><span class="iconfa-folder-close"></span>Hasil Akhir</a></li>
                
                <li><a href="logout.php"><span class="iconfa-off"></span> Log Out</a></li>
                
            </ul>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->