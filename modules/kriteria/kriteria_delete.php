<?php
if (isset($_GET['id']) ) { 
$id = (string) $_GET['id']; 
if (isset($_POST['submitted'])) { 
mysql_query("DELETE FROM kriteria WHERE kode_kriteria = '$id' ") ; 
echo (mysql_affected_rows()) ? pesan_sukses("record is deleted.") : pesan_gagal("Delete failed."); 
echo '<meta http-equiv="refresh" content="0;url=index.php?mod=kriteria">'; 
}
$row = mysql_fetch_array ( mysql_query("SELECT * FROM kriteria WHERE kode_kriteria = '$id' "));
?>
<div class="rightpanel">
<ul class="breadcrumbs">
     <li><a href="index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
    <li><a href="index.php?mod=kriteria">Kriteria Delete</a> <span class="separator"></span></li>
    
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
</ul>
        
<div class="pageheader">
            
            <div class="pageicon"><span class="iconfa-trash"></span></div>
            <div class="pagetitle">
                <h5>Kriteria</h5>
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
                          
						  <p><label>Kode Kriteria	</label>				
					<span class="field"><?php echo $row['kode_kriteria']; ?></span></p>
					
					<p><label>Nama Kriteria</label>				
					<span class="field"><?php echo $row['nama_kriteria']; ?></span></p>
			
                    <p><label>Bobot</label>				
					<span class="field"><?php echo $row['bobot']; ?></span></p>
                    
                                        
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
