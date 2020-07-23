<?php
include "koneksi.php";
$sqlu = mysql_query("select * from user where iduser='$_GET[idu]'");
$ru = mysql_fetch_array($sqlu);
?>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <p>UBAH DATA USER  </p>
  <input type="hidden" name="iduser" value="<?php echo "$ru[iduser]"; ?>" />
  <p>Username
    <input name="username" type="text" id="username" value="<?php echo "$ru[username]"; ?>" disabled>
  </p>
  <p>Password 
    <input name="password" type="text" id="password" value="<?php echo "$ru[password]"; ?>">
  </p>
  <p>Nama Lengkap  
    <input name="nama" type="text" id="nama" value="<?php echo "$ru[nama]"; ?>">
  </p>
  <p>Level 
    <label></label>
    <input name="level" type="text" id="level" value="<?php echo "$ru[level]"; ?>" disabled />
  </p>
  <p>
    <input name="simpan" type="submit" id="simpan" value="SIMPAN DATA USER">
</p>
</form>

<?php
if($_POST["simpan"]){
  include "koneksi.php";
  $sqlu = mysql_query("update user set password='$_POST[password]', nama='$_POST[nama]' where iduser='$_POST[iduser]'");
  if($sqlu){ 
  	echo "Data Berhasil Disimpan";
  }else{
  	echo "Penyimpanan Data Gagal";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=user'>";
}
?>