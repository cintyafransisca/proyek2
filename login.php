<?php 
session_start();
include 'inc/config.php';
include 'inc/functions.php';
include 'header.php';
?>

<div class="mainwrapper">
    
<?php
  include 'topnav_.php';
  include 'leftmenu.php';
  
?>    
    
<div class="rightpanel">
<ul class="breadcrumbs">
    <li><a href="index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
   
    <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
</ul>        
<div class="pageheader">
            
            <div class="pageicon"><span class="iconfa-key"></span></div>
            <div class="pagetitle">
                <h5>Login Form</h5>
                <h1>Log In</h1>
            </div>
        </div><!--pageheader-->
<div class="maincontent">
            <div class="maincontentinner">
            
                <div class="widgetbox">                        
                        <div class="headtitle">
                            
                            <h4 class="widgettitle">Log-In Box</h4>
                        </div>
                        <div class="widgetcontent nopadding">
                            <form class="stdform stdform2" method="post" action="loginact.php">
                            <p>
                                <label>Username</label>
                                <span class="field"><input type="text" name="username" id="username" class="input-xlarge" /></span>
                            </p>
                            <p>
                                <label>Password</label>
                                <span class="field"><input type="password" name="password" id="password" class="input-xlarge" /></span>
                            </p>
                           

                        	<p class="stdformbutton">
                                <button class="btn btn-primary">LOG IN</button>
								  </p>
								
							
                    </form>
                        </div><!--widgetcontent-->
                        </div><!--widgetbox-->

                
                
                
                <?php include "footer.php"; ?>
            
    </div><!--maincontentinner-->
</div><!--maincontent-->
</div>
    
</div><!--mainwrapper-->

</body>
</html>