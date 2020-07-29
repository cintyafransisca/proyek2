<?php	
$cari=$_GET['cari'];
		if(isset($cari)){
		$ket="where nama_kriteria like '%" . $cari. "%'";
	} else {
		$ket="";
	}
    $sql = "SELECT * FROM kriteria ".$ket." order by kode_kriteria asc";
    $result = mysql_query($sql);
	$modname="kriteria";		
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
                <h5>Kriteria</h5>
                <h1>Daftar Kriteria</h1>
            </div>
        </div><!--pageheader-->
<div class="maincontent">
            <div class="maincontentinner">
            
                
                </ul>
                
                
                <table id="dyntable" class="table table-bordered responsive">
                    
                    <thead>
                        <tr> 
                    <th width="20">No</th>   
	     			<th width="20">Kode Kriteria</th>
	     			<th width="30">Nama Kriteria</th>
                    <th width="25">Bobot Kriteria</th>
                    <th width="25">Normalisasi</th>
	     			<th width="20">Action</th>
		        </tr>
    		</thead>
    		<tbody>
	<?php
	    $i=1;
	    while($data = mysql_fetch_array($result)){
	
	//$hitung = 9;
	//$hasil= $hitung / $i;
	
	
	?>    
        		<tr>
 	 			<td><?php echo $i; ?></td>
 	 			<td><?php echo $data['kode_kriteria'] ?></td>
 	 			<td><?php echo $data['nama_kriteria'] ?></td>
                <td><?php echo $data['bobot'] ?></td>
                <td><?php echo $data['normalisasi'] ?></td>
 	 			
<td><div align="center"><a href="index.php?mod=<?php echo $modname; ?>_edit&id=<?php echo $data['kode_kriteria'] ?>"><span title="Edit" class="iconfa-ok-sign" style="font-size:20px" ></span></a></div></td></tr>
                        <?php
		   					$i++;
	        			}
	    				?>  
                        
                        
                    </tbody>
                </table>
                
                <ul class="list-nostyle list-inline">
                	<li><a href="index.php?mod=kriteria_aksi" class="btn btn-primary">
                    <i class="iconfa-refresh"></i>&nbsp;PERBARUI NORMALISASI</a></li>
                 
                </ul>
                
                <?php include "footer.php"; ?>
            
    </div><!--maincontentinner-->
</div><!--maincontent-->
</div>