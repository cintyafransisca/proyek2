<?php
session_start();
include 'inc/config.php';
include 'inc/functions.php';
include 'inc/ceklogin.php';
include 'header.php';
if (isset ( $_GET ['mod'])){
	$mod = $_GET ['mod'] ;
} else {
	$mod="";
}
if ($mod=="") {
			$mod = 'modules/home/home';
	
	} else {
		
	if(preg_match('/_/i',$mod)){
		$modname = explode('_', $mod);
		$mod = 'modules/'.$modname[0].'/'.$mod;
	} else {
		$mod = 'modules/'.$mod.'/'.$mod;
	}
	}
		
?>

<div class="mainwrapper">
    
<?php include "topnav_.php"; ?>
           <!-- /. NAV TOP  -->
          <?php
include 'leftmenu_'.$_SESSION['bagian'].'.php';
?> 
        <!-- /. NAV SIDE  -->
<?php include "content.php"; ?>
     <!-- /. WRAPPER  -->

       
      </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    
</div><!--mainwrapper-->

</body>
</html>
