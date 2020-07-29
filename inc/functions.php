<?php
function printCode($source_code)
{

	if (is_array($source_code))
		return false;
  
	$source_code = explode("\n", str_replace(array("\r\n", "\r"), "\n", $source_code));
	$line_count = 1;

	foreach ($source_code as $code_line)
	{
		$formatted_code .= '<tr><td>'.''.'</td>';
		$line_count++;
	  
		if (ereg('<\?(php)?[^[:graph:]]', $code_line))
			$formatted_code .= '<td>'. str_replace(array('<code>', '</code>'), '', highlight_string($code_line, true)).'</td></tr>';
		else
			$formatted_code .= '<td>'.ereg_replace('(&lt;\?php&nbsp;)+', '', str_replace(array('<code>', '</code>'), '', highlight_string('<?php '.$code_line, true))).'</td></tr>';
	}

	return '<table style="font: 1em Consolas, \'andale mono\', \'monotype.com\', \'lucida console\', monospace;">'.$formatted_code.'</table>';
}
function terbilang($number) {
	$number = strval($number);
	if (!ereg("^[0-9]{1,15}$", $number)) 
		return(false); 
	$ones = array("", "satu", "dua", "tiga", "empat", 
		"lima", "enam", "tujuh", "delapan", "sembilan");
	$majorUnits = array("", "ribu", "juta", "milyar", "trilyun");
	$minorUnits = array("", "puluh", "ratus");
	$result = "";
	$isAnyMajorUnit = false;
	$length = strlen($number);
	for ($i = 0, $pos = $length - 1; $i < $length; $i++, $pos--) {
		if ($number{$i} != '0') {
			if ($number{$i} != '1')
				$result .= $ones[$number{$i}].' '.$minorUnits[$pos % 3].' ';
			else if ($pos % 3 == 1 && $number{$i + 1} != '0') {
				if ($number{$i + 1} == '1') 
					$result .= "sebelas "; 
				else 
					$result .= $ones[$number{$i + 1}]." belas ";
				$i++; $pos--;
			} else if ($pos % 3 != 0)
				$result .= "se".$minorUnits[$pos % 3].' ';
			else if ($pos == 3 && !$isAnyMajorUnit)
				$result .= "se";
			else
				$result .= "satu ";
			$isAnyMajorUnit = true;
		}
		if ($pos % 3 == 0 && $isAnyMajorUnit) {
			$result .= $majorUnits[$pos / 3].' ';
			$isAnyMajorUnit = false;
		}
	}
	$result = trim($result);
	if ($result == "") $result = "nol";
	return($result.' rupiah');
}
function formatRupiah($angka) {
	if(is_numeric($angka)) {
		$format_rupiah = 'Rp' . number_format ($angka, '2', ',', '.');
		return $format_rupiah;
	}
}
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
echo formatRupiah($angka);

function getmodname($mod){
$x=explode('_',$mod);
$val=$x[0];
return $val;	
}
function cekfolder($f){
$x=is_dir($f);
return $x;	
}
function setuplist($tbname,$fieldname){
$sql="SELECT * FROM setups where nama_tabel='$tbname' and nama_field='$fieldname'";
$result = mysql_query($sql);
return $result;	
	
}
function getpkname($tbname){
$sql="SELECT * FROM ".$tbname;
$result = mysql_query($sql);
$meta = mysql_fetch_field($result, 0);
$val=$meta->name;
return $val;	
}
function getfieldtype($tbname,$fieldname){
$sql="SELECT * FROM ".$tbname;
$result = mysql_query($sql);
$j=0;
while ($j < mysql_num_fields($result)) {
	$meta = mysql_fetch_field($result, $j);	
	if($meta->name==$fieldname){
	  $val=$meta->type;			  
	 
	} 
	
	$j++;
}
mysql_free_result($result);
return $val;	
}

function cektable($tbname){
$sql="select * from $tbname";
$hasil=mysql_query($sql);

return $hasil;	
}
function nicefieldname($fieldname){
	if(eregi("_",$fieldname)){
		$val=ereg_replace("_"," ",$fieldname);		
	} else {
		$val=$fieldname;
	}
	return ucwords($val);
}
function SaveToFile($filename,$content){
  $fp=fopen($filename,'w');   
  $tmp=fputs($fp,$content);
  fclose($fp);
  
if($tmp){
   echo "Simpan Data User Berhasil.";
   $download=$filename;
   echo '<a href="'.$download.'">Download File</a>';
} else {
   echo "Simpan Data User Gagal.";
}
  
}	 


function singletbname($tbname){
	$temp=$tbname."#";
	
	if (eregi('ies#', $temp)) {
		$result=str_replace('ies#','y',$temp);
	} else if(eregi('sses#', $temp)){
		$result=str_replace('es#','',$temp);    		    		
	} else if(eregi('es#', $temp)){
		$result=str_replace('es#','e',$temp);    		
	} else if(eregi('s#', $temp)){
		$result=str_replace('s#','',$temp);
	} else {
		$result=$tbname;	
	}
	return $result;
	   
}

function realtbname($s){
	if (ereg('ay_id', $s) || ereg('iy_id', $s) || ereg('uy_id', $s) || ereg('ey_id', $s) || ereg('oy_id', $s)) {
		$temp=str_replace("y_id","ys",$s);
	} else if (ereg('y_id', $s)) {
		$temp=str_replace("y_id","ies",$s);		
	} else if (ereg('s_id', $s)) {
		$temp=str_replace("s_id","ses",$s);
	} else if (ereg('e_id', $s)) {
		$temp=str_replace("e_id","es",$s);
	} else {
		$temp=str_replace("_id","s",$s);
	}
return $temp;
}

function getalltables($dbname){
$sql="show tables from $dbname";
$result = mysql_query($sql);
return $result;	
}

function getallfields($tbname){
$sql2="select * from ".$tbname;
$result2=mysql_query($sql2);	
$fields='';
$j=0;
	while ($j < mysql_num_fields($result2)) {
		$meta = mysql_fetch_field($result2, $j);	
		if($j<mysql_num_fields($result2)-1){
		  $fields .=$meta->name.',';	
		} else {
		  $fields .=$meta->name;	
		}
		
		$j++;
	}	
return $fields;
}
function getalldatefields($tbname){
$sql2="select * from ".$tbname;
$result2=mysql_query($sql2);	
$fields='';
$j=0;
	while ($j < mysql_num_fields($result2)) {
		$meta = mysql_fetch_field($result2, $j);
		if($meta->type=='date' || $meta->type=='datetime'){			
			if($j<mysql_num_fields($result2)-1){
			  $fields .=$meta->name.',';	
			} else {
			  $fields .=$meta->name;	
			}
		}
		$j++;
	}	
return $fields;
}

function textarea($name,$col,$row){
$t='<textarea name="'.$name.'" id="'.$name.'" style="margin-bottom:10px" cols="'.$col.'" rows="'.$row.'"></textarea>';
echo $t;	
}

function textareaedit($name,$col,$row,$value){
$t='<textarea name="'.$name.'" id="'.$name.'" style="margin-bottom:10px" cols="'.$col.'" rows="'.$row.'">'.$value.'</textarea>';
echo $t;	
}

function selectfieldbynumber($tbname,$number){
$z=$number-1;	
$x=getallfields($tbname);
$y=explode(",",$x);
return $y[$z];	
}
function comboarray($varname,$list){
    $a=explode(',',$list);
    $i=count($a);
	echo '<select name="'.$varname.'" id="'.$varname.'">';
    for($j=0;$j<=$i-1;$j++){
		
		echo '<option value="'.$a[$j].'">'.$a[$j].'</option>';
						
    }
	echo '</select>';
	
}

function comboarrayscript($varname,$list,$script){
    $a=explode(',',$list);
    $i=count($a);
	echo '<select name="'.$varname.'" id="'.$varname.'" onchange="'.$script.'">';
    for($j=0;$j<=$i-1;$j++){
		
		echo '<option value="'.$a[$j].'">'.$a[$j].'</option>';
						
    }
	echo '</select>';
	
}
function comboarray3($varname,$list1,$list2){
    $a=explode(',',$list1);
	$b=explode(',',$list2);
    $i=count($a);
	echo '<select name="'.$varname.'" id="'.$varname.'">';
    for($j=0;$j<=$i-1;$j++){
		
		echo '<option value="'.$b[$j].'">'.$a[$j].'</option>';
						
    }
	echo '</select>';
	
}

function comboarray2($varname,$list,$selectedval){
    $a=explode(',',$list);
    $i=count($a);
	echo '<select name="'.$varname.'" id="'.$varname.'">';
	echo '<option value="'.$selectedval.'" selected="selected">'.$selectedval.'</option>';
    for($j=0;$j<=$i-1;$j++){
		
		echo '<option value="'.$a[$j].'">'.$a[$j].'</option>';
						
    }
	echo '</select>';
	
}
function comboarrayedit($varname,$list,$value){
    $a=explode(',',$list);
    $i=count($a);
	echo '<select name="'.$varname.'" id="'.$varname.'">';
	echo '<option value="'.$value.'" selected="selected">'.$value.'</option>';
    for($j=0;$j<=$i-1;$j++){
		
		echo '<option value="'.$a[$j].'">'.$a[$j].'</option>';
						
    }
	echo '</select>';
	
}
function combolist($varname,$tablename,$valuefield,$captionfield){
$sql="select * from $tablename where id <> 3";	
$hasil=mysql_query($sql);
	echo '<select class="combobox" name="'.$varname.'" id="'.$varname.'" required>';
	echo '<option></option>';
	while($data=mysql_fetch_array($hasil)){		
		echo '<option value="'.$data[$valuefield].'">'.$data[$captionfield].'</option>';
						
	}
	echo '</select>';
}

function combolistt($varname,$tablename,$valuefield,$captionfield){
$sql="select * from $tablename ";	
$hasil=mysql_query($sql);
	echo '<select class="combobox" name="'.$varname.'" id="'.$varname.'" required>';
	echo '<option></option>';
	while($data=mysql_fetch_array($hasil)){		
		echo '<option value="'.$data[$valuefield].'">'.$data[$captionfield].'</option>';
						
	}
	echo '</select>';
}


function combolistorderby($varname,$tablename,$valuefield,$captionfield,$orderby){
$sql="select * from $tablename order by $orderby";	
$hasil=mysql_query($sql);
	echo '<select name="'.$varname.'" id="'.$varname.'" required>';
	echo '<option></option>';
	while($data=mysql_fetch_array($hasil)){		
		echo '<option value="'.$data[$valuefield].'">'.$data[$captionfield].'</option>';
						
	}
	echo '</select>';
}

function combofield($varname,$tablename){
$sql="show fields from $tablename";	
$hasil=mysql_query($sql);
	echo '<select name="'.$varname.'" id="'.$varname.'">';
	echo '<option></option>';
	while($data=mysql_fetch_row($hasil)){		
		echo '<option value="'.$data[0].'">'.$data[0].'</option>';						
	}
	echo '</select>';
}
function combolistval($varname,$tablename,$valuefield,$captionfield,$value){
$sql="select * from $tablename";	
$hasil=mysql_query($sql);
	echo '<select name="'.$varname.'" id="'.$varname.'">';
	echo '<option>'.$value.'</option>';
	while($data=mysql_fetch_array($hasil)){		
		echo '<option value="'.$data[$valuefield].'">'.$data[$captionfield].'</option>';
						
	}
	echo '</select>';
}
function combolistval2($varname,$tablename,$valuefield,$captionfield,$value,$caption){
$sql="select * from $tablename";	
$hasil=mysql_query($sql);
	echo '<select name="'.$varname.'" id="'.$varname.'">';
	echo '<option value="'.$value.'">'.$caption.'</option>';
	while($data=mysql_fetch_array($hasil)){		
		echo '<option value="'.$data[$valuefield].'">'.$data[$captionfield].'</option>';
						
	}
	echo '</select>';
}
function combolistcriteria($varname,$tablename,$valuefield,$captionfield,$criteriafield,$criteriavalue){
$sql="select * from $tablename where ".$criteriafield."='".$criteriavalue."'";	
$x='';
$hasil=mysql_query($sql);
	$x.= '<select name="'.$varname.'" id="'.$varname.'">';
	$x.= '<option></option>';
	while($data=mysql_fetch_array($hasil)){		
		$x.= '<option value="'.$data[$valuefield].'">'.$data[$captionfield].'</option>';						
	}
	
	$x.= '</select>';
	return $x;

}

function combolistcriteria2($varname,$tablename,$valuefield,$captionfield,$criteria){
$sql="select * from $tablename where ".$criteria;	
$hasil=mysql_query($sql);
	echo '<select name="'.$varname.'" id="'.$varname.'">';
	echo '<option></option>';
	while($data=mysql_fetch_array($hasil)){		
		echo '<option value="'.$data[$valuefield].'">'.$data[$captionfield].'</option>';
						
	}
	echo '</select>';
}
function combolist2($varname,$tablename,$valuefield,$captionfield,$script){
$sql="select * from $tablename";	
$hasil=mysql_query($sql);
	echo '<select name="'.$varname.'" id="'.$varname.'" onchange ="'.$script.'">';
	echo '<option>--pilih--</option>';
	while($data=mysql_fetch_array($hasil)){		
		echo '<option value="'.$data[$valuefield].'">'.$data[$captionfield].'</option>';
						
	}
	echo '</select>';
}

function combolisticon($varname,$tablename,$valuefield,$captionfield,$script,$iconclass){
$sql="select * from $tablename";	
$hasil=mysql_query($sql);
	echo '<select class="'.$iconclass.'" name="'.$varname.'" id="'.$varname.'" onchange ="'.$script.'" >';	
	while($data=mysql_fetch_array($hasil)){		
		echo '<option data-icon="'.$data[$valuefield].'" value="'.$data[$valuefield].'">'.$data[$captionfield].'</option>';
						
	}
	echo '</select>';
}

function combolisticonedit($varname,$tablename,$valuefield,$captionfield,$script,$iconclass,$value,$caption){
$sql="select * from $tablename";	
$hasil=mysql_query($sql);
	echo '<select class="'.$iconclass.'" name="'.$varname.'" id="'.$varname.'" onchange ="'.$script.'" >';
	echo '<option data-icon="'.$value.'" value="'.$value.'">'.$caption.'</option>';	
	while($data=mysql_fetch_array($hasil)){		
		echo '<option data-icon="'.$data[$valuefield].'" value="'.$data[$valuefield].'">'.$data[$captionfield].'</option>';
						
	}
	echo '</select>';
}

function combolistedit($varname,$tablename,$valuefield,$captionfield,$value,$caption){
$sql="select * from $tablename";	
$hasil=mysql_query($sql);
	echo '<select name="'.$varname.'" id="'.$varname.'">';
	echo '<option value="'.$value.'" selected="selected">'.$caption.'</option>';
	while($data=mysql_fetch_array($hasil)){		
		echo '<option value="'.$data[$valuefield].'">'.$data[$captionfield].'</option>';
						
	}
	echo '</select>';
}

function radiolist($varname,$tablename,$valuefield,$captionfield){
$sql="select * from $tablename";
echo '<span class="formwrapper2">';	
$hasil=mysql_query($sql);
	
	
	while($data=mysql_fetch_array($hasil)){		
		
		echo '<input type="radio" name="'.$varname.'" value="'.$data[$valuefield].'">'.$data[$captionfield].' &nbsp; &nbsp;';					
	}
	echo '</span>';
}

function radioarray($varname,$list){
    $a=explode(',',$list);
    $i=count($a);
	
    for($j=0;$j<=$i-1;$j++){
		echo '<input type="radio" name="'.$varname.'" value="'.$a[$j].'">'.$a[$j].' &nbsp; &nbsp;';						
    }
	
	
}

function checklist($varname,$tablename,$valuefield,$captionfield){
$sql="select * from $tablename";
echo '<span class="formwrapper2">';	
$hasil=mysql_query($sql);
	
	
	while($data=mysql_fetch_array($hasil)){		
		
		echo '<input type="checkbox" name="'.$varname.'" value="'.$data[$valuefield].'">'.$data[$captionfield].' &nbsp; &nbsp;';					
	}
	echo '</span>';
}

function getrandomnumber(){
for($i=1;$i<=20;$i++){
	$a= mt_rand(11333333, 99699999);
	$b=ceknumber($a);
		if($b==0){
		  break;
		}
}

return $a;
}
function getmaxday($month,$year){
$val=date('t',strtotime($month.'/20/'.$year));
return $val;
}

function DateAdd($mydate,$interval) {
//$mydate format is d-m-Y	 
	 $curdate = explode('-',$mydate);
	 $cday = $curdate[0]+$interval;
	 $cmonth = $curdate[1];
	 $cyear = $curdate[2];
	 $maxday=getmaxday($cmonth,$cyear);
	  if ($cday > $maxday){
	    $cmonth = $cmonth + 1;
	    $cday = $cday - $maxday;
	 
	  if ($cmonth == 13){
	     $cyear = $cyear + 1;
	     $cmonth = 1;
	  }
	 
	 }
	 
//	$ourDate format is Y-m-d
	$ourDate= $cyear.'-'.$cmonth.'-'.$cday;
	return $ourDate;
	 
}

function reversedate($tgl){
$t=explode("-",$tgl);
$val=$t[2].'-'.$t[1].'-'.$t[0];
return $val;	
}

function getage($tgl){
$t=explode("-",$tgl);
$born_year=$t[0];
$cur_year=date('Y');
$val=$cur_year-$born_year;
return $val;		
}

function angkaromawi($num) 
{
 // Make sure that we only use the integer portion of the value
 $n = intval($num);
 $result = '';

 // Declare a lookup array that we will use to traverse the number:
 $lookup = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400,
 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40,
 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);

 foreach ($lookup as $roman => $value) 
 {
	 // Determine the number of matches
	 $matches = intval($n / $value);

	 // Store that many characters
	 $result .= str_repeat($roman, $matches);

	 // Substract that from the number
	 $n = $n % $value;
 }

 // The Roman numeral should be built, return it
 return $result;
}

function getdaycode($tanggal){
$x=explode("-",$tanggal);	
//echo "July 1, 2000 is on a " . date("l", mktime(0, 0, 0, 7, 1, 2000));
$val=date("N",mktime(0,0,0,$x[1],$x[2],$x[0]));
return $val;	
}

function getstartdateofweek($tanggal){
$x=explode("-",$tanggal);	
$a=getdaycode($tanggal);
if($a>1){
   $b=$a-($a-$a+1);	
}

$val  = date("Y-m-d",mktime(0, 0, 0,$x[1],$x[2]-$b,$x[0]));	
return $val;
}

function gettanggal($tanggal,$add){
$x=explode("-",$tanggal);	

$val  = date("Y-m-d",mktime(0, 0, 0,$x[1],$x[2]+$add,$x[0]));	
return $val;	
}

function gethari($tanggal){
$a=getdaycode($tanggal);
if($a==1){
	$val='Senin';
} else if($a==2){
	$val='Selasa';
} else if($a==3){
	$val='Rabu';
} else if($a==4){
	$val='Kamis';
} else if($a==5){
	$val='Jum at';
} else if($a==6){
	$val='Sabtu';
} else if($a==7){
	$val='Minggu';	
}
return $val;
}

function normaldate($tanggal){
$x=explode("-",$tanggal);
$val=date("j F Y", mktime(0, 0, 0, $x[1], $x[2], $x[0]));
return $val;
}

function get_tanggal_lahir($umur){
$tanggal=date("Y-m-d");	
$x=explode("-",$tanggal);
$val=date("d F Y", mktime(0, 0, 0, 1, 1, $x[0]-$umur));
return $val;	
}

function datediff($startdate,$enddate){
	
$diff = abs(strtotime($enddate) - strtotime($startdate));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
return $years;
}
function datediff2($startdate,$enddate){
	
$diff = abs(strtotime($enddate) - strtotime($startdate));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
return $days;
}
function datediff3($startdate,$enddate){
	
$diff = abs(strtotime($enddate) - strtotime($startdate));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
return $months;
}
function weekdiff($startdate,$enddate){
$diff = abs(strtotime($enddate) - strtotime($startdate));
$val=(int)($diff/(60*60*24)/7);
return $val;	
}
function roundmix($n){
$a=round($n,-3);
$b=$a-$n;
if($b<0){
	$x=$a+500;
} else if($b==500) {
	$x=$n;
    	
} else {
    $x=$a;	
}
return $x;		
}

function breadcrumb(){
echo '<ul class="breadcrumbs">
            <li><a href="index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="index.php?mod=auto">Auto</a> <span class="separator"></span></li>
            <li>Message</li>
            <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
        </ul>';
}

function pagehead(){
  echo '<div class="pageheader">            
            <div class="pageicon"><span class="iconfa-info-sign"></span></div>
            <div class="pagetitle">
                <h1>Information</h1>
                <h5>One click to complete all task</h5>
                
            </div>
        </div><!--pageheader-->';
}
function container_start(){
echo '<div class="maincontent"><div class="maincontentinner">';
}

function container_end(){
include "footer.php";
echo '</div></div>';
}

function pesan_sukses($s){
container_start();
echo '<div class="alert alert-success"><h4>Sukses</h4><p style="margin: 8px 0">'.$s.'</p></div>';
container_end();			
	
}
function pesan_gagal($s){
container_start();
echo '<div class="alert alert-error"><h4>Error!</h4><p style="margin: 8px 0">'.$s.'</p></div>';
container_end();			
	
}
function pesan_info($s){
container_start();
echo '<div class="alert alert-info"><h4>Informasi</h4><p style="margin: 8px 0">'.$s.'</p></div>';
container_end();			
	
}
function pesan_warning($s){
container_start();
echo '<div class="alert alert-block"><h4>Peringatan</h4><p style="margin: 8px 0">'.$s.'</p></div>';
container_end();			
	
}

function recorded(){
date_default_timezone_set("Asia/Jakarta");	
$recorded=date("Y-m-d H:i:s");
return $recorded;	
}

function getroles(){
$sql="select * from roles";
$hasil=mysql_query($sql);
$rec=mysql_affected_rows();
$val='';
$i=1;
	while($data=mysql_fetch_array($hasil)){
		$val .=$data['role_name'];
		if($i<$rec){
			$val .=',';
		} else {
			$val.='';
		}
		$i++;
	}
return $val;	
}

function getrolename($id){
$sql="select * from role where id='$id'";
$hasil=mysql_query($sql);
$data=mysql_fetch_array($hasil);
$val=$data['role_name'];	
return $val;
}

function getjk($kode){
	if($kode=='L'){
		$val='Laki-laki';
	} else if($kode=='P'){
		$val='Perempuan';
	} else {
		$val='-';
	}
return $val;
}
function comboarrayval($varname,$list,$value){
    $a=explode(',',$list);
    $i=count($a);
	echo '<select name="'.$varname.'" id="'.$varname.'">';
	echo '<option>'.$value.'</option>';
    for($j=0;$j<=$i-1;$j++){
		
		echo '<option value="'.$a[$j].'">'.$a[$j].'</option>';
						
    }
	echo '</select>';
	
}

function combonumber($varname,$start,$max){
	echo '<select name="'.$varname.'" id="'.$varname.'">';
	echo '<option>'.$max.'</option>';
    for($j=$start+1;$j<=$max;$j++){
		
		echo '<option value="'.$j.'">'.$j.'</option>';
						
    }
	echo '<option value="'.$start.'">Tidak Dipakai</option>';
	echo '</select>';
	
}

function combonumber2($varname,$start,$max){
	echo '<select name="'.$varname.'" id="'.$varname.'">';
	echo '<option>'.$start.'</option>';
    for($j=$start+1;$j<=$max;$j++){
		
		echo '<option value="'.$j.'">'.$j.'</option>';
						
    }
	echo '<option value="'.$start.'">Tidak Dipakai</option>';
	echo '</select>';
	
}

function combonumber3($varname,$value,$start,$max){
	echo '<select name="'.$varname.'" id="'.$varname.'" style="width:60px">';
	echo '<option value="'.$value.'" selected="selected">'.$value.'</option>';
    for($j=$start;$j<=$max;$j++){
		
		echo '<option value="'.$j.'">'.$j.'</option>';
						
    }
	echo '<option value="0">Tanpa sisa</option>';
	echo '</select>';
	
}

function radio($varname,$value,$caption){
$radio='<input type="radio"  name="'.$varname.'" id="'.$varname.'" value="'.$value.'"/><input type="text" value="'.$caption.'" class="noborder"/><br/>';	
return $radio;
}


function tanggal_normal(){
$bulan=date("n");
if($bulan==1){
  $bln='Januari';	
} else if($bulan==2){
  $bln='Februari';	
} else if($bulan==3){
  $bln='Maret';	
} else if($bulan==4){
  $bln='April';	
} else if($bulan==5){
  $bln='Mei';	
} else if($bulan==6){
  $bln='Juni';	
} else if($bulan==7){
  $bln='Juli';	
} else if($bulan==8){
  $bln='Agustus';	
} else if($bulan==9){
  $bln='September';	
} else if($bulan==10){
  $bln='Oktober';	
} else if($bulan==11){
  $bln='Nopember';	
} else if($bulan==12){
  $bln='Desember';	
} else {
  $bln='';	
}
$val=date("d").' '.$bln.' '.date("Y");
return $val;
}
function nama_bulan($bulan){
if($bulan==1){
  $bln='Januari';	
} else if($bulan==2){
  $bln='Februari';	
} else if($bulan==3){
  $bln='Maret';	
} else if($bulan==4){
  $bln='April';	
} else if($bulan==5){
  $bln='Mei';	
} else if($bulan==6){
  $bln='Juni';	
} else if($bulan==7){
  $bln='Juli';	
} else if($bulan==8){
  $bln='Agustus';	
} else if($bulan==9){
  $bln='September';	
} else if($bulan==10){
  $bln='Oktober';	
} else if($bulan==11){
  $bln='Nopember';	
} else if($bulan==12){
  $bln='Desember';	
} else {
  $bln='';	
}

return $bln;
}


function upload($varname,$foldername){
//Cara upload : $namafoto = upload('foto','images');
//foto adalah nama komponen input
//images adalah folder di root direktori aplikasi

$var = $_FILES[$varname]['name'];
$path=$foldername.'/'.$var;
if (strlen($var)>0) {
  if (is_uploaded_file($_FILES[$varname]['tmp_name'])) {
	  move_uploaded_file ($_FILES[$varname]['tmp_name'], $path);
  }
}
return $var;	
}


function uang($number){
echo number_format($number,0,",",".").'&nbsp;&nbsp;';
}

function formatnumber($number){
echo number_format($number,0,",",".").'&nbsp;&nbsp;';
}



function pageheader($icon_class,$big_title,$small_title){
echo '<div class="pageheader">
    <div class="pageicon"><span class="'.$icon_class.'"></span></div>
    <div class="pagetitle">
        <h1>'.$big_title.'</h1>
        <h5>'.$small_title.'</h5>
        
    </div>
</div><!--pageheader-->';	
}

function pageheader2($icon_class,$big_title,$small_title){
echo '<div class="pageheader">
    <div class="pageicon2"><span class="'.$icon_class.'"></span></div>
    <div class="pagetitle">
        <h1>'.$big_title.'</h1>
        <h5>'.$small_title.'</h5>
        
    </div>
</div><!--pageheader-->';	
}




function selisihtanggal($startdate,$enddate){ 
$CheckInX = explode("-", $startdate); 
$CheckOutX =  explode("-", $enddate); 
$date1 =  mktime(0, 0, 0, $CheckInX[1],$CheckInX[2],$CheckInX[0]); 
$date2 =  mktime(0, 0, 0, $CheckOutX[1],$CheckOutX[2],$CheckOutX[0]); 
 $interval =($date2 - $date1)/(3600*24); 

// returns numberofdays 
return  $interval ; 

} 

function sanitize($input) {
    $input = trim(htmlentities(strip_tags($input,",")));
 
    if (get_magic_quotes_gpc())
        $input = stripslashes($input);
 
    $input = mysql_real_escape_string($input);
 
    return $input;
}

function countsubmenu($parentid){
$sql="select count(*) as total from topmenu where parent_id='$parentid'";
$hasil=mysql_query($sql);
$data=mysql_fetch_array($hasil);
$val=$data['total'];
return $val;
}

function getsubmenu($parentid){
$sql="select * from topmenu where parent_id='$parentid'";
$hasil=mysql_query($sql);
return $hasil;	
}

function leftjoin($tbname){
$a=getallfields($tbname);
$x=explode(',',$a);
$temp ='SELECT * FROM '.$tbname;
foreach($x as $nilai){
  $temp .=' ';
  if(preg_match('/_id/i', $nilai)){
	$y=explode('_',$nilai);	  
	$pk=getpkname($y[0]);
	$temp .='LEFT JOIN '.$y[0].' ON('.$tbname.'.'.$nilai.'='.$y[0].'.'.$pk.')'; 
  }
}
$temp .=' LIMIT 100';
return $temp;	
}

function metroicon($title,$url,$icon,$color){
echo '
<li class="events">
   		<a href="'.$url.'" class="'.$color.'">
		<span class="shortcuts-icon2 '.$icon.'"></span>
		<span class="shortcuts-label">'.$title.'</span>
	</a>
</li>';	
}

function getcities($provinsi){
$sql="select nama_kota from cities where provinsi='$provinsi'";
$hasil=mysql_query($sql);

return $hasil;		
}



function addfewmonths($tanggal, $interval){
$date = date_create($tanggal);
date_add($date, date_interval_create_from_date_string($interval.' months'));
return date_format($date, 'Y-m-d');
}

function getjenis($nouji){
$sql="select jenis from masterdata where nomor_uji='$nouji'";
$hasil=mysql_query($sql);
$data=mysql_fetch_array($hasil);
$val=$data['jenis'];
return $val;	
}

function GetDateDiffFromNow($originalDate) 
{
    $unixOriginalDate = strtotime($originalDate);
    $unixNowDate = strtotime(date("Y-m-d"));
    $difference = $unixNowDate - $unixOriginalDate ;
    $days = (int)($difference / 86400);
    $hours = (int)($difference / 3600);
    $minutes = (int)($difference / 60);
    $seconds = $difference;
	return $days;
    // now do what you want with this now and return ...
}

function interval($startdate){
$date1=new DateTime("now") ;
$date2=new DateTime($startdate);
$date= $date1->diff($date2);
return $date->format('%y Tahun, %m Bulan, %d Hari');	
}

function getjenis2($kode){
$sql="select * from barang where kode_jenis='$kode'";
$hasil=mysql_query($sql);	
return $hasil;
}

function getstok($kodebarang){
	$sql="select stok from kartupersediaan where kode_barang='$kodebarang'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['stok'];
	return $val;
}



function updateharga($kodebarang,$harga){
	
	$sql="update barang set harga='$harga' where kode_barang='$kodebarang'";
	$hasil=mysql_query($sql);
	$val=mysql_affected_rows();
	return $val;
}

function gettotalbayar($idpembelian){
	$sql="select total_bayar from pembelian where idpembelian='$idpembelian'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['total_bayar'];
	return $val;
}

function gettotalbayar2($idpenjualan){
	$sql="select total_bayar from penjualan where idpenjualan='$idpenjualan'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['total_bayar'];
	return $val;
}

function updatetotalbayar($idpembelian,$subtotal){
	$totalbayar=gettotalbayar($idpembelian);
	$totalbayar=$totalbayar+$subtotal;
	$sql="update pembelian set total_bayar='$totalbayar' where idpembelian='$idpembelian'";
	$hasil=mysql_query($sql);
	$val=mysql_affected_rows();
	return $val;
}

function updatetotalbayar2($idpenjualan,$subtotal){
	$totalbayar=gettotalbayar2($idpenjualan);
	$totalbayar=$totalbayar+$subtotal;
	$sql="update penjualan set total_bayar='$totalbayar' where idpenjualan='$idpenjualan'";
	$hasil=mysql_query($sql);
	$val=mysql_affected_rows();
	return $val;
}
function getnamabarang($kodebarang){
	$sql="select nama_barang from barang where kode_barang='$kodebarang'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['nama_barang'];
	return $val;
}

function getnamabarang2($namabarang){
	$sql="select nama_barang from barang where nama_barang='$namabarang'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['nama_barang'];
	return $val;
}

function cekkodebarang ($kodebarang){
	$sql="select count(*) as total from kartupersediaan where kode_barang='$kodebarang'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['total'];
	return $val;
}
function max_id($kodebarang){
	$sql="select max(idkartu) as iddetail from kartupersediaan where kode_barang='$kodebarang'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['iddetail'];
	return $val;
}
function getsaldoqty($kodebarang, $id){
	$sql="select qty_s from kartupersediaan where kode_barang='$kodebarang' and idkartu='$id'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['qty_s'];
	return $val;
}
function getdatakeluar($id){
	$sql="select qty_k from kartupersediaan where idkartu='$id'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['qty_k'];
	return $val;
}
function getdatasaldo($id){
	$sql="select qty_s from kartupersediaan where idkartu='$id'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['qty_s'];
	return $val;
}
function tambahdatakeluar($id,$nilai){
	$a=getdatakeluar($id);
	$b=$a+$nilai;
	$sql=" update kartupersediaan set qty_k='$b' where idkartu='$id'";
	$hasil=mysql_query($sql);
	$val=mysql_affected_rows();
	return $val;
}
function kurangidatasaldo($id,$nilai){
	$a=getdatasaldo($id);
	$b=$a-$nilai;
	$sql=" update kartupersediaan set qty_s='$b' where idkartu='$id'";
	$hasil=mysql_query($sql);
	$val=mysql_affected_rows();
	return $val;
}
function gethargasaldo($id){
	$sql="select harga_s from kartupersediaan where idkartu='$id'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['harga_s'];
	return $val;
}
function updatejumlahkeluar($id){
	$a=gethargasaldo($id);
	$b=getdatakeluar ($id);
	$c=$a*$b;
	$sql=" update kartupersediaan set harga_k='$a',jumlah_k='$c' where idkartu='$id'";
	$hasil=mysql_query($sql);
	$val=mysql_affected_rows();
	return $val;
}
function getdebitjurnal($idjurnal){
	$sql="select debit from jurnal where idjurnal='$idjurnal'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['debit'];
	return $val;
}
function getkreditjurnal($idjurnal){
	$sql="select kredit from jurnal where idjurnal='$idjurnal'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['kredit'];
	return $val;
	
}
function updatejurnalpembelian($idpembelian,$nilai){
	$sql=" update jurnal set debit='$nilai' where kode_akun='501' and noref='$idpembelian' and jenis='PB'";
	$hasil1=mysql_query($sql);
	$v1=mysql_affected_rows();
	
	$sql2=" update jurnal set kredit='$nilai' where kode_akun='101' and noref='$idpembelian' and jenis='PB'";
	$hasil2=mysql_query($sql2);
	$v2=mysql_affected_rows();
	
	$val=$v1+$v2;
	return $val;
}

function jurnalpembelian(){
	$sql="select * from pembelian ";
	$hasil=mysql_query($sql);
	while ($data=mysql_fetch_array($hasil)){
		$idpembelian=$data['idpembelian'];
		$nilai=$data['total_bayar'];
		$x=updatejurnalpembelian($idpembelian,$nilai);
		
	}
	echo '<meta http-equiv="refresh" content="0;url=index.php?mod=jurnal">'; 
}

function updatejurnalpenjualan($idpenjualan,$nilai){
	$sql=" update jurnal set debit='$nilai' where kode_akun='101' and noref='$idpenjualan' and jenis='PJ'";
	$hasil1=mysql_query($sql);
	$v1=mysql_affected_rows();
	
	$sql2=" update jurnal set kredit='$nilai' where kode_akun='401' and noref='$idpenjualan' and jenis='PJ'";
	$hasil2=mysql_query($sql2);
	$v2=mysql_affected_rows();
	
	$val=$v1+$v2;
	return $val;
}
function jurnalpenjualan(){
	$sql="select * from penjualan ";
	$hasil=mysql_query($sql);
	while ($data=mysql_fetch_array($hasil)){
		$idpenjualan=$data['idpenjualan'];
		$nilai=$data['total_bayar'];
		$x=updatejurnalpenjualan($idpenjualan,$nilai);
		
	}
	echo '<meta http-equiv="refresh" content="0;url=index.php?mod=jurnal">'; 
}

function getnotabeli($id){
	$sql="select nomor_nota from pembelian where idpembelian='$id'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['nomor_nota'];
	return $val;
}
function getnotajual($id){
	$sql="select nobuktipenjualan from penjualan where idpenjualan='$id'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['nobuktipenjualan'];
	return $val;
}
function updatevalidjurnalpembelian($id){
	
	$sql=" update jurnal set valid='1' where idjurnal='$id'";
	$hasil=mysql_query($sql);
	$val=mysql_affected_rows();
	return $val;
}
function updatevalidjurnalpenjualan($id){
	
	$sql=" update jurnal set valid='1' where idjurnal='$id'";
	$hasil=mysql_query($sql);
	$val=mysql_affected_rows();
	return $val;
}
function hapuskartupersediaan($id){
	$sql=" delete from kartupersediaan where idkartu='$id'";
	$hasil=mysql_query($sql);
	$val=mysql_affected_rows();
	return $val;
}

function hapuskartupersediaan2($iddetail){
	$sql=" delete from kartupersediaan where iddetail='$iddetail'";
	$hasil=mysql_query($sql);
	$val=mysql_affected_rows();
	return $val;
}
function gettanggalbeli($id){
	$sql="select tanggal from pembelian where idpembelian='$id'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['tanggal'];
	return $val;
}

function gettanggaljual($id){
	$sql="select tanggal from penjualan where idpenjualan='$id'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['tanggal'];
	return $val;
}
function getsubtotal($idpembelian,$kodebarang){
	$sql="select * from pembellian A left join pembeliandetail B on ( A.idpembelian=B.idpembelian) where A.idpembelian='$idpembelian' and B.kode_barang='$kodebarang'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['subtotal'];
	return $val;
}
function getkodebarang($idpembelian){
	$sql="select * from pembellian A left join pembeliandetail B on ( A.idpembelian=B.idpembelian) where A.idpembelian='$idpembelian'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['kode_barang'];
	return $val;
}
function ambiltotalbayar($idpembelian){
	$sql="select sum(subtotal) as total from `pembeliandetail` where idpembelian='$idpembelian' group by idpembelian";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['total'];
	return $val;
}

function ambiltotalbayar4($idpenjualan){
	$sql="select sum(subtotal) as total from `penjualandetail` where idpenjualan='$idpenjualan' group by idpenjualan";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['total'];
	return $val;
}

function updatetotalbayarpembelian($id){
	$nilai=ambiltotalbayar($id);
	$sql="update pembelian set total_bayar='$nilai' where idpembelian='$id'";
	$hasil=mysql_query($sql);
	$val=mysql_affected_rows();
	return $val;
}


function totalbayarpembelian(){
	
	$sql="select * from pembelian";
	$hasil=mysql_query($sql);
	while ($data=mysql_fetch_array($hasil)){
	updatetotalbayar3($data['idpembelian']);
	}

}
function ambiltotaljual($idpenjualan){
	$sql="select sum(subtotal) as total from `penjualandetail` where idpenjualan='$idpenjualan' group by idpenjualan";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$val=$data['total'];
	return $sql;
}
function updatetotalbayarpenjualan($id){
	$nilai=ambiltotalbayar4($id);
	$sql="update penjualan set total_bayar='$nilai' where idpenjualan='$id'";
	$hasil=mysql_query($sql);
	$val=mysql_affected_rows();
	return $val;
}
function hapusjurnalbeli($id){
	$sql=" delete from jurnal where noref='$id' and jenis='PB'";
	$hasil=mysql_query($sql);
	$val=mysql_affected_rows();
	return $val;
}
function hapusjurnaljual($id){
	$sql=" delete from jurnal where noref='$id' and jenis='PJ'";
	$hasil=mysql_query($sql);
	$val=mysql_affected_rows();
	return $val;
}
function getnomornota($id,$jenis){
	if ($jenis=="PJ"){
		$val=getnotajual($id);
	}else{
		$val=getnotabeli($id);
	}
	return $val;
}

?>