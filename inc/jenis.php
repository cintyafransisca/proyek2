<?php
//cek.php
header('Content-Type: text/xml');
  include("config.php");
  include("functions.php");

$kode = $_GET['kode'];

if(!$kode==''){
$temp =$kode;
} else {
$temp ='';	
}
// membuat root tag elemen
echo '<response>';

if ($kode==''){
echo '';
	  

// jika nama masih kosong
} else if (trim($kode) == ''){
echo 'Error, coy';

}else{

echo htmlentities($temp);
}
// menutup root tag elemen
echo '</response>';
?>