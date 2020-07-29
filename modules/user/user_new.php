<?php
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); }

$pass=md5($_POST['password']);
$sql = "INSERT INTO user ( nama, username, password, bagian) VALUES ('{$_POST['nama']}','{$_POST['username']}', '$pass', '{$_POST['bagian']}')"; 

mysql_query($sql) or die(mysql_error()); 
pesan_sukses("Data berhasil disimpan"); 
echo '<meta http-equiv="refresh" content="0;url=index.php?mod=user">'; 
} 
?>
<div class="rightpanel">
<ul class="breadcrumbs">
   <li><a href="index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
    <li><a href="index.php?mod=user">User Entry</a> <span class="separator"></span></li>
    
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
</ul>
        
<div class="pageheader">
            
            <div class="pageicon"><span class="iconfa-user"></span></div>
            <div class="pagetitle">
                <h5>User</h5>
                <h1>Entry User</h1>
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
                                                   
					<P><label>Nama</label>				
					<span class="field"><input class="form-control" input type="text"  name="nama" required="required" id="nama" size="50"/></span></P>
					
					<P><label>Username</label>				
					<span class="field"><input class="form-control" input type="text"  name="username" required="required" id="username" size="50"/></span></P>
                    
                    <P><label>Password</label>				
					<span class="field"><input class="form-control" input type="password"  name="password" required="required" id="password" size="50"/></span></P>
                    
                  
                     <P><label>Bagian</label>
                     <span class="field">
      <select name="bagian" required="required" >
	  	<option selected="selected" ></option>
		<option>admin</option>
      </select></span></P>			
					
                    

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