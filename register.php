<div class="view">
<fieldset>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <h3>FORM REGISTRASI</h3>
  <p>Username
    <input name="username" type="text" id="username">
</p>
  <p>Password 
    <input name="password" type="text" id="password">
  </p>
  <p>No. KTP
    <input name="noktp" type="text" id="noktp">
  </p>
  <p>Nama Lengkap
    <input name="namalengkap" type="text" id="namalengkap">
  </p>
  <p>Alamat
    <textarea name="alamat" id="alamat"></textarea>
  </p>
  <p>No. Handphone
    <input name="nohp" type="text" id="nohp">
  </p>
  <p>
    <input name="register" type="submit" id="register" value="Register sebagai Member">
  </p>
</form>

<?php
if($_POST["register"]){
  include "koneksi.php";
  $sqlm = mysql_query("insert into member (username, password, noktp, namalengkap, alamat, nohp, tgldaftar) values ('$_POST[username]', '$_POST[password]', '$_POST[noktp]', '$_POST[namalengkap]', '$_POST[alamat]', '$_POST[nohp]', NOW())");
  
  if($sqlm){
  	echo "Proses registrasi berhasil. Silahkan Login";
  }else{
  	echo "Proses registrasi gagal";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='2; URL=?p=beranda'>";
}
?> 
</div>
</fieldset>