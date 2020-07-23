<div id="login">
<fieldset>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <h3>LOGIN MEMBER </h3>
  <p>Username
    <input name="username" type="text" id="username">
  </p>
  <p>Password 
    <input name="password" type="password" id="password">
  </p>
  <p>
    <input name="login" type="submit" value="LOGIN">
</p>
  </form>
  
<?php
if($_POST["login"]){
  include "koneksi.php";
    $sqlm = mysql_query("select * from member where username='$_POST[username]' and password='$_POST[password]'");
	$rm = mysql_fetch_array($sqlm);
	$row = mysql_num_rows($sqlm);
	if($row > 0){
	  session_start();
	  $_SESSION["usermbr"]=$rm["username"];
	  $_SESSION["passmbr"]=$rm["password"];
	  echo "Login Berhasil";	
	}else{
	  echo "Login Gagal";
	}
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=beranda'>";
}
?>
  
</fieldset>
</div>
