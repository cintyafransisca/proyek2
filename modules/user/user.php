<?php	

    $sql = "SELECT * FROM user order by id_user asc";
    $result = mysql_query($sql);
	$modname="user";		
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
                <h5>User</h5>
                <h1>Daftar User</h1>
            </div>
        </div><!--pageheader-->
<div class="maincontent">
            <div class="maincontentinner">
            
                <ul class="list-nostyle list-inline">
                	<li><a href="index.php?mod=user_new" class="btn btn-primary">
                    <i class="iconfa-plus"></i>&nbsp;Tambah User</a></li>
                                
                <table id="dyntable" class="table table-bordered responsive">
                    
                    <thead>
                        <tr> 
                    <th width="10">No</th> 
					
                    <th width="50">Nama</th>  
                   
	     			<th width="50">Username</th>
	     			
                    
                    <th width="50">Bagian</th>
                   
                    
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
                
 	 			<td><?php echo $data['nama'] ?></td>
				
				
 	 			<td><?php echo $data['username'] ?></td>
 	 			
 	 			
                <td><?php echo $data['bagian'] ?></td>
                
               
 	 			
<td><div align="left"><a href="index.php?mod=<?php echo $modname; ?>_delete&id=<?php echo $data['id_user'] ?>"><span title="Delete" class="iconfa-trash" style="font-size:20px"></span></a></div></td></tr>
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