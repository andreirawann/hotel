<?php
  include "koneksi.php";
  $sqlj = mysql_query("select * from jasa where idjasa='$_GET[idj]'");
  $rj = mysql_fetch_array($sqlj);
?>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <h3>UBAH DATA JASA</h3>
    <input name="idjasa" type="hidden" id="idjasa" value="<?php echo "$rj[idjasa]"; ?>">
  <p>Nama Jasa 
    <input name="nama" type="text" id="nama" value="<?php echo "$rj[nama]"; ?>">
  </p>
  <p>Harga
    <input name="harga" type="text" id="harga" value="<?php echo "$rj[harga]"; ?>">
  </p>
  <p>
    <input name="simpan" type="submit" id="simpan" value="SIMPAN PERUBAHAN DATA JASA">
  </p>
</form>

<?php
if($_POST["simpan"]){
  include "koneksi.php";
  $sqlj = mysql_query("update jasa set nama='$_POST[nama]', harga='$_POST[harga]' where idjasa='$_POST[idjasa]'");
  
  if($sqlj){
  	echo "Perubahan data berhasil disimpan";
  }else{
  	echo "Gagal Menyimpan";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=jasa'>";
}
?> 