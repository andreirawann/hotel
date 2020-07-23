<?php
include "koneksi.php";
$sqlu = mysql_query("select * from user where username='$_SESSION[useradm]'");
$ru = mysql_fetch_array($sqlu);
?>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <h3>TAMBAH DATA MAKANAN DAN MINUMAN</h3>
  <input type="hidden" name="iduser" value="<?php echo "$ru[iduser]"; ?>" />
  <p>Nama Makanan / Minuman 
    <input name="nama" type="text" id="nama">
  </p>
  <p>Harga  
    <input name="harga" type="text" id="harga">
  </p>
  <p>
    <input name="simpan" type="submit" id="simpan" value="SIMPAN DATA MAKANAN DAN MINUMAN">
  </p>
</form>

<?php
if($_POST["simpan"]){
  include "koneksi.php";
  $sqlm = mysql_query("insert into makanminum (iduser, nama, harga) values ('$_POST[iduser]', '$_POST[nama]', '$_POST[harga]')");
  
  if($sqlm){
  	echo "Data berhasil disimpan";
  }else{
  	echo "Gagal Menyimpan";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=makanminum'>";
}
?> 