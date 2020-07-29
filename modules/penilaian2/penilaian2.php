<?php	
session_start();
if(!empty($_SESSION['username']) and !empty($_SESSION['password'])){
    $sql = "SELECT * FROM penilaian where nip='$_SESSION[username]'";
    $result = mysql_query($sql);
	$data = mysql_fetch_array($result);
	$modname="penilaian";	
}	
?>

<div class="rightpanel">
<ul class="breadcrumbs">
    <li><a href="index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
    <li><a href="index.php?mod=<?php echo $modname;?>>"><?php echo ucwords($modname);?></a> <span class="separator"></span></li>  
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
</ul>        
<div class="pageheader">
            
            <div class="pageicon"><span class=" iconfa-file"></span></div>
            <div class="pagetitle">
                <h5>Penilaian</h5>
                <h1>Data Penilaian</h1>
            </div>
        </div><!--pageheader-->
<div class="maincontent">
            <div class="maincontentinner">
			
                <div class="row-fluid">
             <div id="dashboard-left" class="span5">                    
				  <div class="widgetbox">
					  <h4 class="widgettitle">Form Penilaian</h4>
					  <div class="widgetcontent nopadding">
						  <form class="stdform stdform2" method="post" action="" >
						  
                    
                      <p><label>Kedisiplinan	</label>				
					<span class="field"><?php echo $data['kriteria1']; ?></span></p>
					
					<p><label>Kerjasama Tim</label>				
					<span class="field"><?php echo $data['kriteria2']; ?></span></p>
			
                    <p><label>Sikap</label>				
					<span class="field"><?php echo $data['kriteria3']; ?></span></p>
					
					<p><label>Presensi</label>				
					<span class="field"><?php echo $data['kriteria4']; ?></span></p>
					
					<p><label>Skill</label>				
					<span class="field"><?php echo $data['kriteria5']; ?></span></p>
					
					<p><label>Produktivitas</label>				
					<span class="field"><?php echo $data['kriteria6']; ?></span></p>
                   
				   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Keterangan :
				   <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1&nbsp;=&nbsp;Sangat rendah</br>
				   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2&nbsp;=&nbsp;Rendah
				   <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3&nbsp;=&nbsp;Sedang</br>
				   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4&nbsp;=&nbsp;Tinggi
				   <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5&nbsp;=&nbsp;Sangat tinggi</br> 
				   
                  
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->
            
             </div><!--span5-->
			<div id="dashboard-right" class="span4">
                    

                    
                    </div><!--span4-->
                </div><!--row-fluid-->
                
                
                <?php include "footer.php"; ?>
            
    </div><!--maincontentinner-->
</div><!--maincontent-->
</div>