<?php
//ambil nilai normalisasi dari tiap kriteria
$kriteria1 = "SELECT normalisasi FROM kriteria WHERE id_kriteria=1";
$result_kriteria1 = mysql_query($kriteria1);
$data_kriteria1 = mysql_fetch_array($result_kriteria1);
$kriteria2 = "SELECT normalisasi FROM kriteria WHERE id_kriteria=2";
$result_kriteria2 = mysql_query($kriteria2);
$data_kriteria2 = mysql_fetch_array($result_kriteria2);
$kriteria3 = "SELECT normalisasi FROM kriteria WHERE id_kriteria=3";
$result_kriteria3 = mysql_query($kriteria3);
$data_kriteria3 = mysql_fetch_array($result_kriteria3);
$kriteria4 = "SELECT normalisasi FROM kriteria WHERE id_kriteria=4";
$result_kriteria4 = mysql_query($kriteria4);
$data_kriteria4 = mysql_fetch_array($result_kriteria4);
$kriteria5 = "SELECT normalisasi FROM kriteria WHERE id_kriteria=5";
$result_kriteria5 = mysql_query($kriteria5);
$data_kriteria5 = mysql_fetch_array($result_kriteria5);
$kriteria6 = "SELECT normalisasi FROM kriteria WHERE id_kriteria=6";
$result_kriteria6 = mysql_query($kriteria6);
$data_kriteria6 = mysql_fetch_array($result_kriteria6);
$kriteria = "SELECT normalisasi FROM kriteria";
$result_kriteria = mysql_query($kriteria);
$sql_penilaian = "SELECT * FROM penilaian";
$result_penilaian = mysql_query($sql_penilaian);
?>

<?php	
//hitung s dari tiap pegawai
$i=1;
while($data_penilaian = mysql_fetch_array($result_penilaian)){
    $nip = $data_penilaian['nip'];
    $nama_pegawai = $data_penilaian['nama_pegawai'];
    $sql1 = mysql_query("SELECT * FROM penilaian where nip=$nip");
    $result1 = mysql_fetch_array($sql1);

    //$s_penilaian=(pow($result1['kriteria1'],$data_kriteria1['normalisasi']))*(pow($result1['kriteria2'],$result1['normalisasi']))*(pow($result1['kriteria3'],$data_kriteria3['normalisasi']))*(pow($result1['kriteria4'],$data_kriteria4['normalisasi']))*(pow($result1['kriteria5'],$data_kriteria5['normalisasi']))*(pow($result1['kriteria6'],$data_kriteria6['normalisasi'])); 
    	
    //looping perhitungan s_penilaian dari tiap pegawai
    $j=1;
    while($data_kriteria = mysql_fetch_array($result_kriteria)){
        $s_penilaian = pow($result1['kriteria'],$data_kriteria['normalisasi']);
        //perkalian buat tiap kriterianya?
        
        $j++;
        }
    $sql_hasil_akhir = "SELECT * FROM `hasil_akhir` WHERE `nip`= $nip";
    $result_hasil_akhir = mysql_query($sql_hasil_akhir);
    $data_hasil_akhir = mysql_fetch_array($result_hasil_akhir);

    //hitung hasil_akhir
    $sql_total = "SELECT sum(nilai_s) as total FROM hasil_akhir";
    $result_total = mysql_query($sql_total);
    $data_total = mysql_fetch_array($result_total);
    $hasil_akhir = $s_penilaian/$data_total['total'];
    var_dump($data_hasil_akhir['nip']);
    
    

    if ($data_hasil_akhir['nip'] != null)
    {
        $sql = "UPDATE hasil_akhir SET nilai_s = $s_penilaian, hasil = $hasil_akhir WHERE nip=$nip";   
    } else {
    $sql = "INSERT INTO hasil_akhir (nip, nama_pegawai, nilai_s, hasil) VALUES (
        '$nip','$nama_pegawai','$s_penilaian','$hasil_akhir')";
        }
    $result = mysql_query($sql);
    ?>
    <?php
    $i++;
}
?>
 <?php
//hitung v dari tiap pegawai    
    //$sql = "INSERT INTO hasil_akhir (nip, nama_pegawai, hasil) VALUES (
    //'{$_POST['nip']}','{$_POST['nama_pegawai']}','$hasil')"; 
    //$result = mysql_query($sql);
?>
<?php
mysql_query($sql) or die(mysql_error()); 
pesan_sukses("Membuka Halaman Hasil Akhir"); 
echo '<meta http-equiv="refresh" content="0;url=index.php?mod=hasil">'; 

?>