<?php
$sql = "SELECT * FROM kriteria";
$result = mysql_query($sql);
$sql2 = "SELECT sum(bobot) as total FROM kriteria";
$result2 = mysql_query($sql2);
$data2 = mysql_fetch_array($result2);
?>
<?php
$i=1;
while($data = mysql_fetch_array($result)){
    $normalisasi = $data['bobot']/$data2['total'];
    $sql3 = "UPDATE kriteria SET normalisasi = $normalisasi WHERE id_kriteria=$i";  
    var_dump($normalisasi);  
    $result3= mysql_query($sql3);
?>
<?php
    $i++;
}
?>
<?php
echo "<script language='JavaScript'>
document.location='index.php?mod=kriteria';
</script>"; 
?>   