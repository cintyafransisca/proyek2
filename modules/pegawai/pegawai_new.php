<?php
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); }

$sql = "INSERT INTO pegawai ( nip, nama_pegawai, nama_divisi) VALUES (
'{$_POST['nip']}','{$_POST['nama_pegawai']}','{$_POST['nama_divisi']}')"; 
mysql_query($sql) or die(mysql_error()); 
pesan_sukses("Data berhasil disimpan"); 
echo '<meta http-equiv="refresh" content="0;url=index.php?mod=pegawai">'; 
} 
?>
<div class="rightpanel">
<ul class="breadcrumbs">
   <li><a href="index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
    <li><a href="index.php?mod=pegawai">Entry Pegawai</a> <span class="separator"></span></li>
    
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
</ul>
        
<div class="pageheader">
            
            <div class="pageicon"><span class="iconfa-pencil"></span></div>
            <div class="pagetitle">
                <h5>Pegawai</h5>
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
                          
						  <P><label> NIP</label>				
					<span class="field"><input type="text"  name="nip" required="required" id="nip" size="50" class="input-xlarge"/></span></P>
                    
					<P><label> Nama Pegawai</label>				
					<span class="field"><input type="text" name="nama_pegawai" required="required" id="nama_pegawai" size="50" class="input-xlarge"/></span></P>
                    
                    
                   <P><label> Divisi</label>				
					<span class="field"><?php echo combolistorderby ('nama_divisi','divisi','nama_divisi','nama_divisi','nama_divisi');?></span></P>
                    
                   
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