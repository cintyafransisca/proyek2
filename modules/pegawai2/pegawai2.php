<?php
session_start();
if(!empty($_SESSION['username']) and !empty($_SESSION['password'])){
    $sql = "SELECT * FROM pegawai where nip='$_SESSION[username]'";
    $result = mysql_query($sql);
	$data = mysql_fetch_array($result);
	$modname="data diri";	
}
?>
<div class="rightpanel">
<ul class="breadcrumbs">
    <li><a href="index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
    <li><a href="index.php?mod=<?php echo $modname;?>>"><?php echo ucwords($modname);?></a> <span class="separator"></span></li>  
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
</ul>        
<div class="pageheader">
            
            <div class="pageicon"><span class=" iconfa-user"></span></div>
            <div class="pagetitle">
                <h5>Pegawai</h5>
                <h1>Data Diri</h1>
            </div>
        </div><!--pageheader-->
<div class="maincontent">
            <div class="maincontentinner">
            <div class="row-fluid">
             <div id="dashboard-left" class="span5">                    
				  <div class="widgetbox">
					  <h4 class="widgettitle">Form Data Diri</h4>
					  <div class="widgetcontent nopadding">
						  <form class="stdform stdform2" method="post" action="" >
						  
                    
                     <p><label>NIP	</label>				
					<span class="field"><?php echo $data['nip']; ?></span></p>
					
					<p><label>Nama Pegawai</label>				
					<span class="field"><?php echo $data['nama_pegawai']; ?></span></p>
			
                    <p><label>Divisi</label>				
					<span class="field"><?php echo $data['nama_divisi']; ?></span></p>
                   
                  
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