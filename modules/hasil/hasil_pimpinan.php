<?php	
$cari=$_GET['cari'];
		if(isset($cari)){
		$ket="where nama_pegawai like '%" . $cari. "%'";
	} else {
		$ket="";
	}
    $sql = "SELECT * FROM hasil_akhir ".$ket." order by hasil desc";
    $result = mysql_query($sql);
	$modname="hasil";		
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
                <h5>Hasil Penilaian</h5>
                <h1>Pegawai Terbaik</h1>
            </div>
        </div><!--pageheader-->
<div class="maincontent">
            <div class="maincontentinner">
                
                </ul>
					
                
                <table id="dyntable" class="table table-bordered responsive">
                
					
                    <thead>
                        <tr> 
                    <th width="20">No</th>   
	     			<th width="20">NIP</th>
	     			<th width="50">Nama Pegawai</th>
	     			<th width="50">Nilai S</th>
	     			<th width="50">Hasil</th>
	     			<th width="50">Persentase Hasil</th>
                     <th width="50">Action</th>
		        </tr>
    		</thead>
    		<tbody>
	
	<?php
	    $i=1;
	    while($data = mysql_fetch_array($result)){
	?>    
        		<tr>
 	 			<td><?php echo $i; ?></td>
 	 			<td><?php echo $data['nip'] ?></td>
 	 			<td><?php echo $data['nama_pegawai'] ?></td>
 	 			<td><?php echo $data['nilai_s'] ?></td>
 	 			<td><?php echo $data['hasil'] ?></td>
 	 			<td><?php echo $data['hasil']*100 ?> %</td>
                <td><div align="center"><a href="index.php?mod=<?php echo $modname; ?>_edit&id=<?php echo $data['kode_kriteria'] ?>"><span title="Edit" class="iconfa-ok-sign" style="font-size:20px"></span></a></div></td>
				</tr>
                

                        <?php
		   					$i++;
	        			}
	    				?>  
                       
                       
                    </tbody>
                </table>
                
                <?php include "footer.php"; ?>
            
    </div><!--maincontentinner-->
</div><!--maincontent-->
</div>