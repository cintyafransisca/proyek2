<?php
if (isset($_GET['id']) ) { 
$id = (string) $_GET['id']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$nip=$_POST['nip'];
$nama_pegawai=$_POST['nama_pegawai'];
$nama_divisi=$_POST['nama_divisi'];
$kriteria1=$_POST['kriteria1'];
$kriteria2=$_POST['kriteria2'];
$kriteria3=$_POST['kriteria3'];
$kriteria4=$_POST['kriteria4'];
$kriteria5=$_POST['kriteria5'];
$kriteria6=$_POST['kriteria6'];
		

$sql = "UPDATE penilaian set nip='{$_POST['nip']}', kriteria1='{$_POST['kriteria1']}', kriteria2='{$_POST['kriteria2']}', kriteria3='{$_POST['kriteria3']}', kriteria4='{$_POST['kriteria4']}', kriteria5='{$_POST['kriteria5']}', kriteria6='{$_POST['kriteria6']}' WHERE nip='$id'";
mysql_query($sql) or die(mysql_error()); 
pesan_sukses("Data berhasil disimpan"); 
echo '<meta http-equiv="refresh" content="0;url=index.php?mod=penilaian">'; 
}
$row = mysql_fetch_array ( mysql_query("SELECT * FROM penilaian WHERE nip='$id' ")); 
$row2 = mysql_fetch_array ( mysql_query("SELECT * FROM  pegawai pg, penilaian pn WHERE pn.nip=pg.nip")); 
?>
<div class="rightpanel">
<ul class="breadcrumbs">
    <li><a href="index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
    <li><a href="index.php?mod=penilaian">Penilaian</a> <span class="separator"></span></li>
    
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
</ul>
        
<div class="pageheader">
            
            <div class="pageicon"><span class="iconfa-cogs"></span></div>
            <div class="pagetitle">
                <h5>Penilaian</h5>
                <h1>Edit Penilaian</h1>
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
                    <span class="field"><input type="text" required="required" name="nama_pegawai" id="nama_pegawai" readonly="readonly" value="<?php echo $row2['nama_pegawai']; ?>" /></span></p>	
                    
                    <p><label>Divisi</label>
                    <span class="field"><input type="text"  required="required" name="nama_divisi" id="nama_divisi" readonly="readonly" value="<?php echo $row2['nama_divisi']; ?>" /></span></p>
                    
                    <P><label> Kedisiplinan</label>				
					<span class="field"><select name="kriteria1">
							<option value="<?php echo"$row[kriteria1]"?>"><?php echo"$row[kriteria1]"?></option>
							<option value="1">1 -Sangat rendah</option>
							<option value="2">2 - Rendah</option>
							<option value="3">3 - Sedang</option>
							<option value="4">4 - Tinggi</option>
							<option value="5">5 - Sangat tinggi</option>
						  </span></select></P>
                    
                    <P><label> Kerjasama Tim</label>				
					<span class="field"><select name="kriteria2">
							<option value="<?php echo"$row[kriteria2]"?>"><?php echo"$row[kriteria2]"?></option>
							<option value="1">1 -Sangat rendah</option>
							<option value="2">2 - Rendah</option>
							<option value="3">3 - Sedang</option>
							<option value="4">4 - Tinggi</option>
							<option value="5">5 - Sangat tinggi</option>
						  </span></select></P>
						  
					<P><label> Produktivitas</label>				
					<span class="field"><select name="kriteria3">
							<option value="<?php echo"$row[kriteria3]"?>"><?php echo"$row[kriteria3]"?></option>
							<option value="1">1 -Sangat rendah</option>
							<option value="2">2 - Rendah</option>
							<option value="3">3 - Sedang</option>
							<option value="4">4 - Tinggi</option>
							<option value="5">5 - Sangat tinggi</option>
						  </span></select></P>
                    
					<P><label> Presensi</label>				
					<span class="field"><select name="kriteria4">
							<option value="<?php echo"$row[kriteria4]"?>"><?php echo"$row[kriteria4]"?></option>
							<option value="1">1 -Sangat rendah</option>
							<option value="2">2 - Rendah</option>
							<option value="3">3 - Sedang</option>
							<option value="4">4 - Tinggi</option>
							<option value="5">5 - Sangat tinggi</option>
						  </span></select></P>
                    
					<P><label> Skill</label>				
					<span class="field"><select name="kriteria5">
							<option value="<?php echo"$row[kriteria5]"?>"><?php echo"$row[kriteria5]"?></option>
							<option value="1">1 -Sangat rendah</option>
							<option value="2">2 - Rendah</option>
							<option value="3">3 - Sedang</option>
							<option value="4">4 - Tinggi</option>
							<option value="5">5 - Sangat tinggi</option>
						  </span></select></P>
											  
					<P><label> Sikap</label>				
					<span class="field"><select name="kriteria6">
							<option value="<?php echo"$row[kriteria6]"?>"><?php echo"$row[kriteria6]"?></option>
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
