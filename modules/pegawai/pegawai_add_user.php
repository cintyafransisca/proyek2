<?php
if (isset($_GET['id']) ) { 
$id = (string) $_GET['id']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); }  
	
$nip=$_POST['nip'];
$nama=$_POST['nama'];
$username=$_POST['username'];
$password=$_POST['password'];
$pass_md5 = md5($password);
	
$sql = "INSERT INTO user (nama, username, bagian, password) VALUES (
'$nama', '$username','pegawai','$pass_md5')"; 

mysql_query($sql) or die(mysql_error()); 
pesan_sukses("Username berhasil ditambahkan"); 
echo '<meta http-equiv="refresh" content="0;url=index.php?mod=user">'; 
}
$row = mysql_fetch_array ( mysql_query("SELECT * FROM pegawai WHERE nip = '$id' "));
?>

<div class="rightpanel">
<ul class="breadcrumbs">
     <li><a href="index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
    <li><a href="index.php?mod=pegawai">Tambah User Pegawai</a> <span class="separator"></span></li>
    
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
</ul>
        
<div class="pageheader">
            
            <div class="pageicon"><span class="iconfa-plus"></span></div>
            <div class="pagetitle">
                <h5>Pegawai</h5>
                <h1>Add User</h1>
            </div>
        </div><!--pageheader-->
<div class="maincontent">
    <div class="maincontentinner">
       	<div class="row-fluid">
             <div id="dashboard-left" class="span8">                    
				  <div class="widgetbox">
					  <h4 class="widgettitle">Form Delete</h4>
					  <div class="widgetcontent nopadding">
						  <form class="stdform stdform2" method="post" action="" >
                          
						  <p><label>Nama</label>				
					<span class="field"><input type="text" required="required" name="nama" id="nama" readonly="readonly" value="<?php echo $row['nama_pegawai']; ?>" /></span></p>
						  
						  <p><label>Username</label>				
					<span class="field"><input type="text" required="required" name="username" id="username" readonly="readonly" value="<?php echo $row['nip']; ?>" /></span></p>
					
					<p><label>Bagian</label>				
					<span class="field"><input type="text" required="required" name="bagian" id="bagian" readonly="readonly" value="pegawai" /></span></p>
			
                    <p><label>Password</label>				
					<span class="field"><input type="password" required="required" name="password" id="password" readonly="readonly" value="<?php echo $row['nip']; ?>" /></span></p>
                    
                                        
                			<p class="stdformbutton">
                                <button class="btn btn-primary">TAMBAH SEBAGAI USER</button>                                
                                <input type="hidden" value="1" name="submitted" /> 
                            </p>
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->
            
             </div><!--span8-->
			<div id="dashboard-right" class="span4">
                    

                    
                    </div><!--span4-->
                </div><!--row-fluid-->
                
                
                
                <?php include "footer.php"; ?>
            
    </div><!--maincontentinner-->
</div><!--maincontent-->
</div>
<?php } ?>
