<div id="login">
<fieldset>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <h3>cPanel Hotel </h3>
  <p>Username
    <input name="username" type="text" id="username">
  </p>
  <p>Password 
    <input name="password" type="password" id="password">
  </p>
  <p>Login Sebagai : 
    <label>
    <select name="level" id="level">
      <option>Pilih</option>
      <option value="Administrator">Administrator</option>
      <option value="Resepsionis">Resepsionis</option>
      <option value="Manajer">Manajer</option>
    </select>
    </label>
  </p>
  <p>
    <input name="login" type="submit" value="LOGIN">
</p>
  </form>
  
<?php
if($_POST["login"]){
  include "koneksi.php";
  if($_POST["level"]=="Administrator"){
    $sqlu = mysql_query("select * from user where username='$_POST[username]' and password='$_POST[password]' and level='Administrator'");
	$ru = mysql_fetch_array($sqlu);
	$row = mysql_num_rows($sqlu);
	if($row > 0){
	  session_start();
	  $_SESSION["useradm"]=$ru["username"];
	  $_SESSION["passadm"]=$ru["password"];
	  echo "Login Berhasil";	
	}else{
	  echo "Login Gagal";
	}
  }else if($_POST["level"]=="Resepsionis"){
    $sqlu = mysql_query("select * from user where username='$_POST[username]' and password='$_POST[password]' and level='Resepsionis'");
	$ru = mysql_fetch_array($sqlu);
	$row = mysql_num_rows($sqlu);
	if($row > 0){
	  session_start();
	  $_SESSION["userres"]=$ru["username"];
	  $_SESSION["passres"]=$ru["password"];
	  echo "Login Berhasil";	
	}else{
	  echo "Login Gagal";
	}
  }else if($_POST["level"]=="Manajer"){
    $sqlu = mysql_query("select * from user where username='$_POST[username]' and password='$_POST[password]' and level='Manajer'");
	$ru = mysql_fetch_array($sqlu);
	$row = mysql_num_rows($sqlu);
	if($row > 0){
	  session_start();
	  $_SESSION["userman"]=$ru["username"];
	  $_SESSION["passman"]=$ru["password"];
	  echo "Login Berhasil";	
	}else{
	  echo "Login Gagal";
	}
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=beranda'>";
}
?>
  
</fieldset>
</div>
