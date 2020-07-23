<?php
if(!empty($_SESSION["usermbr"]) and !empty($_SESSION["passmbr"])){
  echo "Selamat Datang, <b>$rm[namalengkap]</b> | ";
  echo "<a href='?p=mybooking&idm=$rm[idmember]'>My Booking</a> | ";
  echo "<a href='?p=logout'>Logout</a> |";
}else{
  echo "<a href='?p=register'>Register</a> | ";
  echo "<a href='?p=login'>Login</a>";
}
?>