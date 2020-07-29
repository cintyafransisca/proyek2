<?php
if (isset($_GET['id']) ) { 
$id = (string) $_GET['id']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE pegawai set nip='{$_POST['nip']}', nama_pegawai='{$_POST['nama_pegawai']}',  nama_divisi='{$_POST['nama_divisi']}' WHERE nip='$id'";
mysql_query($sql) or die(mysql_error()); 
pesan_sukses("Data berhasil disimpan"); 
echo '<meta http-equiv="refresh" content="0;url=index.php?mod=pegawai">'; 
}
$row = mysql_fetch_array ( mysql_query("SELECT * FROM pegawai WHERE nip = '$id' ")); 
?>
<div class="rightpanel">
<ul class="breadcrumbs">
    <li><a href="index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
    <li><a href="index.php?mod=pegawai">Edit Data Pegawai</a> <span class="separator"></span></li>
    
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
</ul>
        
<div class="pageheader">
            
            <div class="pageicon"><span class="iconfa-folder-open"></span></div>
            <div class="pagetitle">
                <h5>Pegawai</h5>
                <h1>Edit Data</h1>
            </div>
        </div><!--pageheader-->
<div class="maincontent">
    <div class="maincontentinner">
       	<div class="row-fluid">
             <div id="dashboard-left" class="span8">                    
				  <div class="widgetbox">
					  <h4 class="widgettitle">Form Edit</h4>
					  <div class="widgetcontent nopadding">
						  <form class="stdform stdform2" method="post" action="" >
						  
                    
                     <p><label>NIP</label>	
                     <span class="field"><input type="text" required="required" name="nip" id="nip" readonly="readonly" value="<?php echo $row['nip']; ?>" /></span></p>
                     
					<p><label>Nama Pegawai</label>
                    <span class="field"><input type="text" required="required" name="nama_pegawai" id="nama_pegawai" value="<?php echo $row['nama_pegawai']; ?>" /></span></p>
                    
                    <p><label>Divisi</label>	
                   <span class="field"><?php combolistedit ('nama_divisi','divisi','nama_divisi','nama_divisi', $row ['nama_divisi'], $row ['nama_divisi']); ?></span></p>		
                   
                  
                			<p class="stdformbutton">
                                <button class="btn btn-primary">UPDATE</button>                                
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
<?php } 
?>
