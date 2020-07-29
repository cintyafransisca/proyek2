<?php	
$cari=$_GET['cari'];
		if(isset($cari)){
		$ket="where nama_pegawai like '%" . $cari. "%'";
	} else {
		$ket="";
	}
    $sql = "SELECT * FROM pegawai ".$ket." order by nip asc";
    $result = mysql_query($sql);
	$modname="pegawai";		
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
                <h1>Daftar Pegawai</h1>
            </div>
        </div><!--pageheader-->
<div class="maincontent">
            <div class="maincontentinner">
            
                <ul class="list-nostyle list-inline">
                	<li><a href="index.php?mod=pegawai_new" class="btn btn-primary">
                    <i class="iconfa-plus"></i>&nbsp;Tambah Data Pegawai</a></li>
                    
                </ul>
                </ul>
                <form class="stdform3" action="" method="GET">
                	<div class="input-append" style="position:absolute;top:255px; left:1055px">
                    
                    	<label>Nama Pegawai</label>
                        <input type="text" name="cari"/>
                        <button type="submit" class="btn">CARI</button>
                        <input type="hidden" name="mod" value="pegawai"/>
                        
                        </div>
                        </form>
                
                <table id="dyntable" class="table table-bordered responsive">
                    
                    <thead>
                        <tr> 
                    <th width="20">No</th>   
	     			<th width="20">NIP</th>
	     			<th width="50">Nama Pegawai</th>
                    <th width="25">Divisi</th>
	     			<th width="20">Action</th>
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
                <td><?php echo $data['nama_divisi'] ?></td>
				
 	 			
<td><div align="center"><a href="index.php?mod=<?php echo $modname; ?>_edit&id=<?php echo $data['nip'] ?>"><span title="Edit" class="iconfa-edit" style="font-size:20px"></span></a>&nbsp;&nbsp;
<a href="index.php?mod=<?php echo $modname; ?>_delete&id=<?php echo $data['nip'] ?>"><span title="Delete" class="iconfa-trash" style="font-size:20px"></span></a>&nbsp;&nbsp;
<?php		
	$sql1 = "SELECT * FROM user where username='$data[nip]'";
	$result1 = mysql_query($sql1);
	$data1=mysql_fetch_array($result1);
	
	if($data1['username']==$data['nip']){
	echo"";
	}
	else{
		echo "<a href='index.php?mod=pegawai_add_user&id=$data[nip]'><span title='Add User' class='iconfa-plus' style='font-size:20px'></span></a>";
		}
		
	?>
	</div>
</td></tr>
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