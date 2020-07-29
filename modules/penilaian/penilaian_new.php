<?php
if (isset($_POST['submitted'])){ 
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
				
				
$sql = "INSERT INTO penilaian (nip, nama_pegawai, nama_divisi, kriteria1, kriteria2, kriteria3, kriteria4, kriteria5, kriteria6) VALUES (
'{$_POST['nip']}','{$_POST['nama_pegawai']}','{$_POST['nama_divisi']}','$kriteria1','$kriteria2', '$kriteria3', '$kriteria4', '$kriteria5', '$kriteria6')"; 

mysql_query($sql) or die(mysql_error()); 
pesan_sukses("Data berhasil disimpan"); 
echo '<meta http-equiv="refresh" content="0;url=index.php?mod=penilaian">'; 
} 
?>
<div class="rightpanel">
<ul class="breadcrumbs">
   <li><a href="index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
    <li><a href="index.php?mod=penilaian">Penilaian Entry</a> <span class="separator"></span></li>
    
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
</ul>
        
<div class="pageheader">
            
            <div class="pageicon"><span class="iconfa-pencil"></span></div>
            <div class="pagetitle">
                <h5>Penilaian</h5>
                <h1>Tambah Penilaian</h1>
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
                          
					<P><label>NIP</label>				
					<span class="field" >
                    <?php 
    $result = mysql_query("select * from pegawai where NOT EXISTS (select * from penilaian where pegawai.nip=penilaian.nip) order by nama_pegawai");
    $jsArray = "var prdName = new Array();\n";
    echo '<select required="required" name="nip" id="nip" onchange="changeValue(this.value)" class="input-xlarge"><option ></option>';
     while ($row = mysql_fetch_array($result)) {
   echo '
  <option value="' . $row['nip'] . '">' . $row['nip'] . ' - '. $row['nama_pegawai'] .'</option>';
   $jsArray .= "prdName['" . $row['nip'] . "'] = {nama:'" . addslashes($row['nama_pegawai']) . "',divisi:'".addslashes($row['nama_divisi'])."'};\n";   
  
     }
     echo '
     </select>';
    ?>
                    
					<P><label>Nama Pegawai</label>
    <span class="field">			
					<td><input type="text" required="required" name="nama_pegawai" id="nama_pegawai" title="Pilih NIP Dulu" readonly="readonly" class="input-xlarge" placeholder="Pilih NIP Dulu" /></td>
                    
                    <P><label>Divisi</label>
    <span class="field">			
					<td><input type="text" required="required" name="nama_divisi" id="nama_divisi" title="Pilih NIP Dahulu" readonly="readonly" class="input-xlarge" placeholder="Pilih NIP Dulu"/></td>
                    
                    <script type="text/javascript">
    <?php echo $jsArray; ?> 
	function changeValue(nip){  
    document.getElementById('nama_pegawai').value = prdName[nip].nama;  
    document.getElementById('nama_divisi').value = prdName[nip].divisi;  
    };  
</script> 

					<P><label> Kedisiplinan</label>				
					<span class="field"><select name="kriteria1">
							<option value="0">-- Isi nilai kriteria 1 --</option>
							<option value="1">1 -Sangat rendah</option>
							<option value="2">2 - Rendah</option>
							<option value="3">3 - Sedang</option>
							<option value="4">4 - Tinggi</option>
							<option value="5">5 - Sangat tinggi</option>
						  </span></select></P>
                    
                    <P><label> Kerjasama Tim</label>				
					<span class="field"><select name="kriteria2">
							<option value="0">-- Isi nilai kriteria 2 --</option>
							<option value="1">1 -Sangat rendah</option>
							<option value="2">2 - Rendah</option>
							<option value="3">3 - Sedang</option>
							<option value="4">4 - Tinggi</option>
							<option value="5">5 - Sangat tinggi</option>
						  </span></select></P>
                    
                     <P><label> Produktivitas</label>				
					<span class="field"><select name="kriteria3">
							<option value="0">-- Isi nilai kriteria 3 --</option>
							<option value="1">1 -Sangat rendah</option>
							<option value="2">2 - Rendah</option>
							<option value="3">3 - Sedang</option>
							<option value="4">4 - Tinggi</option>
							<option value="5">5 - Sangat tinggi</option>
						  </span></select></P>
                 
                 	<P><label> Presensi</label>				
					<span class="field"><select name="kriteria4">
							<option value="0">-- Isi nilai kriteria 4 --</option>
							<option value="1">1 -Sangat rendah</option>
							<option value="2">2 - Rendah</option>
							<option value="3">3 - Sedang</option>
							<option value="4">4 - Tinggi</option>
							<option value="5">5 - Sangat tinggi</option>
						  </span></select></P>
                  
				  <P><label> Skill</label>				
					<span class="field"><select name="kriteria5">
							<option value="0">-- Isi nilai kriteria 5 --</option>
							<option value="1">1 -Sangat rendah</option>
							<option value="2">2 - Rendah</option>
							<option value="3">3 - Sedang</option>
							<option value="4">4 - Tinggi</option>
							<option value="5">5 - Sangat tinggi</option>
						  </span></select></P>
						  
						  <P><label> Sikap</label>				
					<span class="field"><select name="kriteria6">
							<option value="0">-- Isi nilai kriteria 6 --</option>
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