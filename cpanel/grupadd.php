<?php
include "koneksi.php";
$sqlu = mysql_query("select * from user where username='$_SESSION[useradm]'");
$ru = mysql_fetch_array($sqlu);
?>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <h3>TAMBAH DATA GRUP</h3>
  <input type="hidden" name="iduser" value="<?php echo "$ru[iduser]"; ?>" />
  <p>Kode Grup 
    <input name="kdgrup" type="text" id="kdgrup">
</p>
  <p>Nama Grup 
    <input name="namagrup" type="text" id="namagrup">
  </p>
  <p>Diskon  
    <input name="diskon" type="text" id="diskon">
  </p>
  <p>
    <input name="simpan" type="submit" id="simpan" value="SIMPAN DATA GRUP">
  </p>
</form>

<?php
if($_POST["simpan"]){
  include "koneksi.php";
  $sqlg = mysql_query("insert into grup (iduser, kdgrup, namagrup, diskon) values ('$_POST[iduser]', '$_POST[kdgrup]', '$_POST[namagrup]', '$_POST[diskon]')");
  
  if($sqlg){
  	echo "Data berhasil disimpan";
  }else{
  	echo "Gagal Menyimpan";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=grup'>";
}
?> 