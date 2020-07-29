<?php
//cek.php
header('Content-Type: text/xml');
  include("config.php");
  include("functions.php");

$kode = getjenis2($_GET['kode']);

$temp='<select>';
if(!$kode==''){
while($dt=mysql_fetch_array($kode)){
	$temp .='<option value="'.$dt['kode_barang'].'">'.$dt['nama_barang'].'</option>';	
}
$temp .='</select>';

} else {
$temp ='';	
}
// membuat root tag elemen
echo '<response>';

if ($kode==''){
echo '';
	  

// jika nama masih kosong
} else if ($kode == ''){
echo 'Error, coy';

}else{

echo htmlentities($temp);
}
// menutup root tag elemen
echo '</response>';
?>