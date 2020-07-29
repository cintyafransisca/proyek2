<?php
if (isset($_GET['id']) ) { 
$id = (string) $_GET['id']; 
if (isset($_POST['submitted'])) { 
mysql_query("DELETE FROM pegawai WHERE nip = '$id' ") ; 
mysql_query("DELETE FROM penilaian WHERE nip = '$id' ") ; 
mysql_query("DELETE FROM hasil_akhir WHERE nip = '$id' ") ; 
mysql_query("DELETE FROM user WHERE username = '$id' ") ; 
echo (mysql_affected_rows()) ? pesan_sukses("record is deleted.") : pesan_gagal("Delete failed."); 
echo '<meta http-equiv="refresh" content="0;url=index.php?mod=pegawai">'; 
}
$row = mysql_fetch_array ( mysql_query("SELECT * FROM pegawai WHERE nip = '$id' "));
?>
<div class="rightpanel">
<ul class="breadcrumbs">
     <li><a href="index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
    <li><a href="index.php?mod=pegawai">Pegawai Delete</a> <span class="separator"></span></li>
    
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
</ul>
        
<div class="pageheader">
            
            <div class="pageicon"><span class="iconfa-trash"></span></div>
            <div class="pagetitle">
                <h5>Pegawai</h5>
                <h1>Hapus Data</h1>
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
                          
						  <p><label>NIP	</label>				
					<span class="field"><?php echo $row['nip']; ?></span></p>
					
					<p><label>Nama Pegawai</label>				
					<span class="field"><?php echo $row['nama_pegawai']; ?></span></p>
			
                    <p><label>Divisi</label>				
					<span class="field"><?php echo $row['nama_divisi']; ?></span></p>
                    
                                        
                			<p class="stdformbutton">
                                <button class="btn btn-primary">DELETE</button>                                
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
