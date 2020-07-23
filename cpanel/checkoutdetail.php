<?php
include "koneksi.php";
$sqlb = mysql_query("select * from booking where kdbooking='$_GET[kdb]'");
$rb = mysql_fetch_array($sqlb);
$sqlm = mysql_query("select * from member where idmember='$rb[idmember]'");
$rm = mysql_fetch_array($sqlm);
$sqlt = mysql_query("select * from tipekamar where idtipe='$rb[idtipe]'");
$rt = mysql_fetch_array($sqlt);
$sqlk = mysql_query("select * from kamar where idkamar='$rb[idkamar]'");
$rk = mysql_fetch_array($sqlk);
$sqlu = mysql_query("select * from user where username='$_SESSION[userres]'");
$ru = mysql_fetch_array($sqlu);
$sqlc = mysql_query("select * from checkin where idbooking='$rb[idbooking]'");
$rc = mysql_fetch_array($sqlc);
?>
<form name="form1" method="post" action="" enctype="multipart/form-data">
<div class="dh12">
<div id="view">
<fieldset>
Kode Booking : <big><b><?php echo "$rb[kdbooking]"; ?></b></big>
<input name="idcheckin" type="hidden" value="<?php echo "$rc[idcheckin]"; ?>">
</fieldset>
</div>
</div>
<div class="dh12">
<div class="dh6">
<div id="view">
<fieldset>
<h3>DATA MEMBER</h3>
<p>Nama Lengkap<br>
<big><?php echo "$rm[namalengkap]";?></big></p>
<p>No. KTP<br>
<big><?php echo "$rm[noktp]";?></big></p>
<p>Alamat<br>
<big><?php echo "$rm[alamat]";?></big></p>
<p>No. Handphone<br>
<big><?php echo "$rm[nohp]";?></big></p>
</fieldset>
</div>
</div>
<div class="dh6">
<div id="view">
<fieldset>
<h3>DATA KAMAR</h3>
<input name="harga" type="hidden" value="<?php echo "$rt[harga]"; ?>">
<p>Tipe Kamar<br>
<big><?php echo "$rt[kdtipe] - $rt[namatipe]";?></big></p>
<p>Harga<br>
<big><?php echo "Rp. $rt[harga]";?></big> per malam</p>
<p>No. Kamar<br>
<big><?php echo "$rk[nokamar]";?></big></p>
</fieldset>
</div>
</div>
</div>
<div class="dh12">
<div id="view" align="center">
<fieldset>
<h3>TANGGAL MENGINAP</h3>
<input name="lamanginap" type="hidden" value="<?php echo "$rb[lamanginap]"; ?>">
  <?php   echo "<big><b>$rb[tglmasuk]</b> sampai <b>$rb[tglkeluar]</b> (<b>$rb[lamanginap]</b> hari)</big>";   ?>  
</fieldset>
</div>
</div>
<div class="dh12">
<div id="view">
<fieldset>
<h3>GRUP</h3>
<?php
$sqlg = mysql_query("select * from grup order by idgrup asc");
while($rg = mysql_fetch_array($sqlg)){
	echo "<table><tr>
	<td width='5%'><input type='radio' name='grup' value='$rg[diskon]'></td>
	<td width='15%'><big>$rg[kdgrup]</big></td>
	<td><big>$rg[namagrup]</big></td>
	<td width='15%'><big>$rg[diskon] %</big></td>
	</tr></table>";
}
?>
</fieldset>
</div>
</div>
<div class="dh12">
<div id="view">
<fieldset>
<h3>MAKANAN / MINUMAN</h3>
<?php
$sqlmm = mysql_query("select * from makanminum order by idmakanminum asc");
$j = 1;
while($rmm = mysql_fetch_array($sqlmm)){
	echo "<table><tr>
	<td width='5%'><input type='checkbox' name='makanminum[]' value='$rmm[harga]'></td>
	<td><big>$rmm[nama]</big></td>
	<td width='25%'><big>Rp. $rmm[harga]</big></td>
	</tr></table>";
	$j++;
}
?>
</fieldset>
</div>
</div>
<div class="dh12">
<div id="view">
<fieldset>
<h3>JASA</h3>
<?php
$sqlj = mysql_query("select * from jasa order by idjasa asc");
$i = 1;
while($rj = mysql_fetch_array($sqlj)){
	echo "<table><tr>
	<td width='5%'><input type='checkbox' name='jasa[]' value='$rj[harga]'></td>
	<td><big>$rj[nama]</big></td>
	<td width='25%'><big>Rp. $rj[harga]</big></td>
	</tr></table>";
    $i++;
}
?>
</fieldset>
</div>
</div>
<p><input type="submit" name="hitung" value="Hitung"></p>
</form>
<?php
if($_POST["hitung"]){
  include "koneksi.php";
  $harga = $_POST["harga"];
  $lamanginap = $_POST["lamanginap"];
  $diskon = $_POST["grup"];
  $makanminum = $_POST["makanminum"];
  $jasa = $_POST["jasa"];
  $hargakamar = ($harga * $lamanginap);
  echo "<table>";
  echo "<tr><td width='50%'>Harga Kamar per malam</td><td width='50%' align='right'>Rp. $harga</td></tr>";
  echo "<tr><td width='50%'>Lama Menginap</td><td width='50%' align='right'>$lamanginap hari</td></tr>";
  echo "<tr><td width='50%'><big>Total Harga Kamar</big></td><td width='50%' align='right'><big>Rp. $hargakamar</big></td></tr>";
  foreach($makanminum as $mm){
	  $sqlmk = mysql_query("select * from makanminum where harga='$mm'");
	  while($rmk = mysql_fetch_array($sqlmk)){
		echo "<tr><td width='50%'>$rmk[nama]</td><td width='50%' align='right'>Rp. $mm </td></tr>";
	  }
	  $totmm += $mm;
  }
  echo "<tr><td width='50%'><big>Total Harga Makanan dan Minuman</big></td><td width='50%' align='right'><big>Rp. $totmm</big></td></tr>";
  foreach($jasa as $js){
	  $sqljs = mysql_query("select * from jasa where harga='$js'");
	  while($rjs = mysql_fetch_array($sqljs)){
		echo "<tr><td width='50%'>$rjs[nama]</td><td width='50%' align='right'>Rp. $js </td></tr>";
	  }
	  $totjs += $js;
  }
  echo "<tr><td width='50%'><big>Total Harga Jasa</big></td><td width='50%' align='right'><big>Rp. $totjs</big></td></tr>";
  $hargakamarmmjs = ($harga * $lamanginap) + $totmm + $totjs;  
  $totaldiskon = $diskon * $hargakamarmmjs / 100;
  $bayar = $hargakamarmmjs - $totaldiskon;
  $ppn = 10 * $bayar / 100;
  $totalbayar = $bayar + $ppn;
  echo "<tr><td width='50%'><big>Total Harga Kamar + Makanan Minuman + Jasa</big></td><td width='50%' align='right'><big>Rp. $hargakamarmmjs</big></td></tr>";
  echo "<tr><td width='50%'>Diskon ($diskon %)</td><td width='50%' align='right'>Rp. $totaldiskon</td></tr>";
  echo "<tr><td width='50%'><big>Jumlah Bayar</big></td><td width='50%' align='right'><big>Rp. $bayar</big></td></tr>";
  echo "<tr><td width='50%'>PPN (10 %)</td><td width='50%' align='right'>Rp. $ppn</td></tr>";
  echo "<tr><td width='50%'><big><h3>TOTAL YANG HARUS DIBAYAR</h3></big></td><td width='50%' align='right'><big><h3>Rp. $totalbayar</h3></big></td></tr>";
  echo "</table>";
  
}
?>

<form name="form2" method="post" action="" enctype="multipart/form-data">
<input name="idbooking" type="hidden" value="<?php echo "$rb[idbooking]"; ?>">
<input name="idcheckin" type="hidden" value="<?php echo "$_POST[idcheckin]"; ?>">
<input name="ppn" type="hidden" value="<?php echo "$ppn"; ?>">
<input name="totalbayar" type="hidden" value="<?php echo "$totalbayar"; ?>">
<p><input type="submit" name="checkout" value="Check Out"></p>
</form>

<?php
if($_POST["checkout"]){
	include "koneksi.php";
	$sqltr = mysql_query("insert into transaksi (idcheckin, ppn, tglbayar, totalbayar) values ('$_POST[idcheckin]', '$_POST[ppn]', NOW(), '$_POST[totalbayar]')");
	$sqlc = mysql_query("update checkin set status='Checkout' where idcheckin='$_POST[idcheckin]'");
	$sqlh = mysql_query("insert into histori select * from booking where idbooking='$_POST[idbooking]'");
	$sqlb = mysql_query("delete from booking where idbooking='$_POST[idbooking]'");
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=checkout'>";
}
?>