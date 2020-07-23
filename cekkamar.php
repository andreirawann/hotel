<?php
include "koneksi.php";
$sqlm = mysql_query("select * from member where idmember='$_GET[idm]'");
$rm = mysql_fetch_array($sqlm);
$sqlt = mysql_query("select * from tipekamar where idtipe='$_GET[idt]'");
$rt = mysql_fetch_array($sqlt);
$sqlk = mysql_query("select * from kamar where idkamar='$_GET[idk]'");
$rk = mysql_fetch_array($sqlk);
?>
<form name="form1" method="post" action="" enctype="multipart/form-data">
<input name="idkamar" type="hidden" value="<?php echo "$rk[idkamar]"; ?>">
<?php
  $kd = "BOOK";
  $d = date("d");
  $m = date("m");
  $y = date("Y");
  $j = date("h");
  $mi = date("i");
  $s = date("s");
?>
<h3>Kamar : <?php echo "$rk[nokamar]";?></h3>
<input name="kdbooking" type="hidden" value="<?php echo "$kd-$y$m$d$j$mi$s"; ?>">
<div class="dh12">
<div class="dh6">
<div id="view" align="center">
<fieldset>
<h3>TANGGAL MASUK</h3>
  <select name="tgl" id="tgl">
  <?php
  for($a=1; $a<=31; $a++){
    if($d == $a){ $sel = " selected"; }
	else{ $sel = ""; }
    echo "<option value='$a' $sel>$a</option>";
  }
  ?>
  </select>
   <select name="bln" id="bln">
  <?php
  for($b=1; $b<=12; $b++){
    if($m == $b){ $sel = " selected"; }
	else{ $sel = ""; }
	if($b==1){ $bm="Januari";}
	else if($b==2){ $bm="Februari";}
	else if($b==3){ $bm="Maret";}
	else if($b==4){ $bm="April";}
	else if($b==5){ $bm="Mei";}
	else if($b==6){ $bm="Juni";}
	else if($b==7){ $bm="Juli";}
	else if($b==8){ $bm="Agustus";}
	else if($b==9){ $bm="September";}
	else if($b==10){ $bm="Oktober";}
	else if($b==11){ $bm="November";}
	else if($b==12){ $bm="Desember";}
    echo "<option value='$b' $sel>$bm</option>";
  }
  ?>
  </select>
    <select name="thn" id="thn">
  <?php
  $ca = $y + 10;
  for($c=$y; $c<=$ca; $c++){
    if($y == $c){ $sel = " selected"; }
	else{ $sel = ""; }
    echo "<option value='$c' $sel>$c</option>";
  }
  ?>
  </select>
</fieldset>
</div>
</div>
<div class="dh6">
<div id="view" align="center">
<fieldset>
<h3>TANGGAL KELUAR</h3>
  <select name="tglk" id="tglk">
  <?php
  for($i=1; $i<=31; $i++){
    if($d == $i){ $sel = " selected"; }
	else{ $sel = ""; }
    echo "<option value='$i' $sel>$i</option>";
  }
  ?>
  </select>
   <select name="blnk" id="blnk">
  <?php
  for($j=1; $j<=12; $j++){
    if($m == $j){ $sel = " selected"; }
	else{ $sel = ""; }
	if($j==1){ $bk="Januari";}
	else if($j==2){ $bk="Februari";}
	else if($j==3){ $bk="Maret";}
	else if($j==4){ $bk="April";}
	else if($j==5){ $bk="Mei";}
	else if($j==6){ $bk="Juni";}
	else if($j==7){ $bk="Juli";}
	else if($j==8){ $bk="Agustus";}
	else if($j==9){ $bk="September";}
	else if($j==10){ $bk="Oktober";}
	else if($j==11){ $bk="November";}
	else if($j==12){ $bk="Desember";}
    echo "<option value='$j' $sel>$bk</option>";
  }
  ?>
  </select>
    <select name="thnk" id="thnk">
  <?php
  $ka = $y + 10;
  for($k=$y; $k<=$ka; $k++){
    if($y == $k){ $sel = " selected"; }
	else{ $sel = ""; }
    echo "<option value='$k' $sel>$k</option>";
  }
  ?>
  </select>
</fieldset>
</div>
</div>
<p><input type="submit" name="cek" value="Periksa Ketersediaan Kamar"></p>
</div>
</form>


<?php
if($_POST["cek"]){
  include "koneksi.php";  
  $d1 = ("$_POST[thn]-$_POST[bln]-$_POST[tgl]");
  $d2 = ("$_POST[thnk]-$_POST[blnk]-$_POST[tglk]");
  $sqlb = mysql_query("select * from booking where idkamar='$_POST[idkamar]'");
  while($rb = mysql_fetch_array($sqlb)){	
    $tanggal_awal = "$rb[tglmasuk]";
    $tanggal_akhir = "$rb[tglkeluar]";
		while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
		  if((strtotime($d1) == strtotime($tanggal_awal)) or (strtotime($d2) == strtotime($tanggal_awal))){
			$asd = "<div align='center'>Pada tanggal <big>$tanggal_awal</big> kamar <big>$rk[nokamar]</big> sudah <big>TERISI</big><br>Kamar <big>$rk[nokamar]</big> terisi mulai dari <big>$rb[tglmasuk]</big> sampai <big>$rb[tglkeluar]</big></div>"; 
		  }
		  $tanggal_awal = date ("Y-m-d", strtotime("+1 day", strtotime($tanggal_awal)));
		}
		 
  }
  if($asd!=""){
	  echo "$asd";
  }else{
		echo "<div align='center'>Pada tanggal <big>$d1</big> sampai <big>$d2</big> kamar <big>$rk[nokamar]</big> masih <big>KOSONG</big><p> <a href='?p=booking&idm=$rm[idmember]&idt=$rt[idtipe]&idk=$rk[idkamar]&tglm=$d1&tglk=$d2'><button type='button' class='btn btn-more'>Booking Sekarang</button></a></div>"; 
  }

}
?> 