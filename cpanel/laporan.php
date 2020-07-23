<?php
  $y = date("Y");
?>
<h3>LAPORAN</h3>
<form name="form1" method="post" action="" enctype="multipart/form-data">
<?php
  $d = date("d");
  $m = date("m");
  $y = date("Y");
  $j = date("h");
  $mi = date("i");
  $s = date("s");
?>
<div id="view" align="center">
<fieldset>
<h3>DARI</h3>
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
<div id="view" align="center">
<fieldset>
<h3>SAMPAI</h3>
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
<p><input type="submit" name="lihat" value="Lihat Laporan"></p>
</form>

<?php
if($_POST["lihat"]){
	include "koneksi.php";
	$d1 = ("$_POST[thn]-$_POST[bln]-$_POST[tgl]");
	$d2 = ("$_POST[thnk]-$_POST[blnk]-$_POST[tglk]");
	$sqlt = mysql_query("select * from transaksi where tglbayar between '$d1' and '$d2'");
	echo "<h3>Laporan Periode : $d1 s/d $d2</h3>";
	echo "<table>";	
	echo "<tr>";
	  echo "<th>NO</th>";
	  echo "<th>BOOKING</th>";
	  echo "<th>KAMAR</th>";
	  echo "<th>TRANSAKSI</th>";
	echo "</tr>";
	$no = 1;
	while($rt = mysql_fetch_array($sqlt)){
		$sqlc = mysql_query("select * from checkin where idcheckin='$rt[idcheckin]'");
		$rc = mysql_fetch_array($sqlc);
		$sqlh = mysql_query("select * from histori where idbooking='$rc[idbooking]'");
		$rh = mysql_fetch_array($sqlh);
		$sqltp = mysql_query("select * from tipekamar where idtipe='$rh[idtipe]'");
		$rtp = mysql_fetch_array($sqltp);
		$sqlk = mysql_query("select * from kamar where idkamar='$rh[idkamar]'");
		$rk = mysql_fetch_array($sqlk);
		$sqlm = mysql_query("select * from member where idmember='$rh[idmember]'");
		$rm = mysql_fetch_array($sqlm);
		echo "<tr>";
		echo "<td>$no</td>";
		echo "<td>Kode Booking<br><big>$rh[kdbooking]</big><p>";
		echo "Atas Nama<br><big>$rm[namalengkap]</big><p>";
		echo "Lama Menginap<br><big>$rh[tglmasuk] s/d $rh[tglkeluar] ($rh[lamanginap] hari)</big></td>";
		echo "<td>Tipe Kamar<br><big>$rtp[kdtipe] - $rtp[namatipe]</big><p>";
		echo "Harga<br><big>Rp. $rtp[harga]</big> per malam<p>";
		echo "No. Kamar<br><big>$rk[nokamar]</big></td>";
		echo "<td>Status<br><big>$rc[status]</big><p>";
		echo "Total Bayar<br><big>Rp. $rt[totalbayar]</big><p>";
		echo "Pada Tanggal<br><big>$rt[tglbayar]</big></td>";
		echo "</tr>";
		$total += $rt['totalbayar'];
		$no++;
	}
	echo "<tr>";
	echo "<td colspan='3' align='right'><big>Total Pemasukan : </big></td>";
	echo "<td><big>Rp. $total</big></td>";
	echo "</tr>";
	echo "</table>";
}
?>