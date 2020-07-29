<div class="rightpanel">
        <ul class="breadcrumbs">
            <li><a href="index.php"><i class="iconfa-home"></i></a></li>            
            <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
        </ul>
               
        <div class="pageheader">
            <!--<form action="results.html" method="post" class="searchbar">
                <input type="text" name="keyword" placeholder="To search type and hit enter..." />
            </form>-->
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">
                <h1>WELCOME !</h1>
                <h5>PT. ANTARMITRA SEMBADA</h5>
                
            </div>
        </div><!--pageheader-->
        
<div class="maincontent">
            <div class="maincontentinner">
                        
                        <h5 class="subtitle">Recently Viewed Pages</h5>
                        <ul class="shortcuts">
                        
                        <?php
						if($_SESSION['bagian']=='admin'){ 
                            metroicon('Dashboard','index.php?mod=home','iconfa-laptop','OliveDrab');
							metroicon('User','index.php?mod=user','iconfa-user','DeepPink');
							metroicon('Data Pegawai','index.php?mod=pegawai','iconfa-group','DeepPink');
							metroicon('Data Kriteria','index.php?mod=kriteria','iconfa-list','DeepPink');
							metroicon('Penilaian','index.php?mod=penilaian','iconfa-file','DeepPink');
							metroicon('Hasil Akhir','index.php?mod=hasil','iconfa-folder-close','DeepPink');
							metroicon('Log Out','logout.php','iconfa-off','Black'); 
						}
						if($_SESSION['bagian']=='pegawai'){ 
							metroicon('Dashboard','index.php?mod=home','iconfa-laptop','OliveDrab'); 
							metroicon('Data Diri','index.php?mod=pegawai2','iconfa-user','DeepPink');
							metroicon('Penilaian','index.php?mod=penilaian2','iconfa-file','DeepPink');
							metroicon('Log Out','logout.php','iconfa-off','Black'); 
						}
												
						if($_SESSION['bagian']=='pimpinan'){ 
                            metroicon('Dashboard','index.php?mod=home','iconfa-laptop','OliveDrab'); 
                            metroicon('Data Kriteria','index.php?mod=kriteria_pimpinan','iconfa-list','OliveDrab'); 
							metroicon('Hasil','index.php?mod=hasil_pimpinan','iconfa-folder-close','DeepPink');
							metroicon('Log Out','logout.php','iconfa-off','Black'); 
						}
							
						
						?>
                            
                           
                        </ul>
                        
                        <br />
                        
                       
                        
                        <div class="divider30"></div>
                        
                        <div id="dashboard-right" class="span4">
                        
                       
                        
                        
                        
                        <br/>
                        
                        </div>
                        </div>
                
                <?php
				   include 'footer.php';
				?>
                
            </div><!--maincontentinner-->
        </div><!--maincontent-->