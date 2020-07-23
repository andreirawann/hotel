<?php
  include "koneksi.php";
  $sqlm = mysql_query("select * from makanminum where idmakanminum='$_GET[idm]'");
  $rm = mysql_fetch_array($sqlm);
?>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <h3>UBAH DATA MAKANAN DAN MINUMAN</h3>
    <input name="idmakanminum" type="hidden" id="idmakanminum" value="<?php echo "$rm[idmakanminum]"; ?>">
  <p>Nama Makanan / Minuman 
    <input name="nama" type="text" id="nama" value="<?php echo "$rm[nama]"; ?>">
  </p>
  <p>Harga
    <input name="harga" type="text" id="harga" value="<?php echo "$rm[harga]"; ?>">
  </p>
  <p>
    <input name="simpan" type="submit" id="simpan" value="SIMPAN PERUBAHAN DATA MAKANAN DAN MINUMAN">
  </p>
</form>

<?php
if($_POST["simpan"]){
  include "koneksi.php";
  $sqlm = mysql_query("update makanminum set nama='$_POST[nama]', harga='$_POST[harga]' where idmakanminum='$_POST[idmakanminum]'");
  
  if($sqlm){
  	echo "Perubahan data berhasil disimpan";
  }else{
  	echo "Gagal Menyimpan";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=makanminum'>";
}
?> 