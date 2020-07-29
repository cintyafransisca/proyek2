<?php
if (isset($_GET['id']) ) { 
$id = (string) $_GET['id']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE kriteria set kode_kriteria='{$_POST['kode_kriteria']}', nama_kriteria='{$_POST['nama_kriteria']}',  bobot='{$_POST['bobot']}' , normalisasi='$normalisasi' WHERE kode_kriteria='$id'";
mysql_query($sql) or die(mysql_error()); 
pesan_sukses("Data berhasil disimpan"); 
echo '<meta http-equiv="refresh" content="0;url=index.php?mod=kriteria">'; 
}
$row = mysql_fetch_array ( mysql_query("SELECT * FROM kriteria WHERE kode_kriteria = '$id' ")); 
?>
<div class="rightpanel">
<ul class="breadcrumbs">
    <li><a href="index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
    <li><a href="index.php?mod=kriteria">Edit Data Kriteria</a> <span class="separator"></span></li>
    
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
</ul>
        
<div class="pageheader">
            
            <div class="pageicon"><span class="iconfa-folder-open"></span></div>
            <div class="pagetitle">
                <h5>Kriteria</h5>
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
						  
                    
                     <p><label>Kode Kriteria</label>	
                     
                     <span class="field"><input type="text" required="required" name="kode_kriteria" id="kode_kriteria" readonly="readonly" value="<?php echo $row['kode_kriteria']; ?>" /></span></p>
                     
					<p><label>Nama Kriteria</label>
                    <span class="field"><input type="text" required="required" name="nama_kriteria" id="nama_kriteria" readonly="readonly" value="<?php echo $row['nama_kriteria']; ?>" /></span></p>
                    
                    <P><label> Bobot Kriteria</label>				
					<span class="field"><select name="bobot">
							<option value="<?php echo"$row[bobot]"?>"><?php echo"$row[bobot]"?></option>
							<option value="1">1 -Sangat rendah</option>
							<option value="2">2 - Rendah</option>
							<option value="3">3 - Sedang</option>
							<option value="4">4 - Tinggi</option>
							<option value="5">5 - Sangat tinggi</option>
						  </span></select></P>
                     
			
                			<p class="stdformbutton">
                                <button class="btn btn-primary">UPDATE</button>                                
                                <input type="hidden" value="1" name="submitted" /> 
                            </p>

<?php	
//ambil data bobot kriteria
$sql_kriteria = "SELECT * from kriteria";
$result_kriteria = mysql_fetch_array(mysql_query($sql_kriteria));
$bobot_kriteria=$result_kriteria['bobot'];

//hitung total bobot kriteria
$sql_total = "SELECT sum(bobot) as total from kriteria";
$result_total = mysql_fetch_array(mysql_query($sql_total));
	
//hitung normalisasi kriteria & input nilai normalisasi tiap kriteria ke tabel kriteria	
$normalisasi=$row['bobot']/$result_total['total'];
?>

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
