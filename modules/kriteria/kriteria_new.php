<?php
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); }

$sql = "INSERT INTO kriteria ( kode_kriteria, nama_kriteria, bobot) VALUES (
'{$_POST['kode_kriteria']}','{$_POST['nama_kriteria']}','{$_POST['bobot']}')"; 

mysql_query($sql) or die(mysql_error()); 
pesan_sukses("Data berhasil disimpan"); 
echo '<meta http-equiv="refresh" content="0;url=index.php?mod=kriteria">'; 
} 
?>
<div class="rightpanel">
<ul class="breadcrumbs">
   <li><a href="index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
    <li><a href="index.php?mod=kriteria">Entry Kriteria</a> <span class="separator"></span></li>
    
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
</ul>
        
<div class="pageheader">
            
            <div class="pageicon"><span class="iconfa-pencil"></span></div>
            <div class="pagetitle">
                <h5>Kriteria</h5>
                <h1>Tambah Data</h1>
            </div>
        </div><!--pageheader-->
<div class="maincontent">
    <div class="maincontentinner">
       	<div class="row-fluid">
             <div id="dashboard-left" class="span8">                    
				  <div class="widgetbox">
					  <h4 class="widgettitle">Form Entry</h4>
					  <div class="widgetcontent nopadding">
						  <form class="stdform stdform2" method="post" action="" >
                          
						  <P><label> Kode Kriteria</label>				
					<span class="field"><input type="text"  name="kode_kriteria" required="required" id="kode_kriteria" size="50" class="input-xlarge"/></span></P>
                    
					<P><label> Nama Kriteria</label>				
					<span class="field"><input type="text" name="nama_kriteria" required="required" id="nama_kriteria" size="50" class="input-xlarge"/></span></P>
                    
                    
                   <P><label> Bobot Kriteria</label>				
					<span class="field"><select name="bobot">
							<option value="0">-- Isi bobot kriteria --</option>
							<option value="1">1 -Sangat rendah</option>
							<option value="2">2 - Rendah</option>
							<option value="3">3 - Sedang</option>
							<option value="4">4 - Tinggi</option>
							<option value="5">5 - Sangat tinggi</option>
						  </span></select></P>
                    
                   
                			<p class="stdformbutton">
                                <button class="btn btn-primary">SUBMIT</button>                                
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