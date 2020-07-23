<form name="form1" method="post" action="" enctype="multipart/form-data">
  <p>TAMBAH DATA USER  </p>
  <p>Username
    <input name="username" type="text" id="username">
  </p>
  <p>Password 
    <input name="password" type="text" id="password">
  </p>
  <p>Nama Lengkap  
    <input name="nama" type="text" id="nama">
  </p>
  <p>Level 
    <label>
    <select name="level" id="level">
      <option value="Administrator">Administrator</option>
      <option value="Resepsionis">Resepsionis</option>
      <option value="Manajer">Manajer</option>
    </select>
    </label>
  </p>
  <p>
    <input name="simpan" type="submit" id="simpan" value="SIMPAN DATA USER">
</p>
</form>

<?php
if($_POST["simpan"]){
  include "koneksi.php";
  $sqlu = mysql_query("insert into user (username, password, nama, level) values ('$_POST[username]' ,'$_POST[password]' ,'$_POST[nama]', '$_POST[level]')");
  if($sqlu){ 
  	echo "Data Berhasil Disimpan";
  }else{
  	echo "Penyimpanan Data Gagal";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=user'>";
}
?>