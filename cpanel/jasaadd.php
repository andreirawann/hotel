<?php
include "koneksi.php";
$sqlu = mysql_query("select * from user where username='$_SESSION[useradm]'");
$ru = mysql_fetch_array($sqlu);
?>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <h3>TAMBAH DATA JASA</h3>
  <input type="hidden" name="iduser" value="<?php echo "$ru[iduser]"; ?>" />
  <p>Nama Jasa 
    <input name="nama" type="text" id="nama">
  </p>
  <p>Harga  
    <input name="harga" type="text" id="harga">
  </p>
  <p>
    <input name="simpan" type="submit" id="simpan" value="SIMPAN DATA JASA">
  </p>
</form>

<?php
if($_POST["simpan"]){
  include "koneksi.php";
  $sqlj = mysql_query("insert into jasa (iduser, nama, harga) values ('$_POST[iduser]', '$_POST[nama]', '$_POST[harga]')");
  
  if($sqlj){
  	echo "Data berhasil disimpan";
  }else{
  	echo "Gagal Menyimpan";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=jasa'>";
}
?> 