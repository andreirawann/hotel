<?php session_start(); ?>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>cPanel Hotel</title>
<?php
if(!empty($_SESSION["useradm"]) and !empty($_SESSION["passadm"])){
include "koneksi.php";
$sqlu = mysql_query("select * from user where username='$_SESSION[useradm]'");
$ru = mysql_fetch_array($sqlu);
?>
<div class="container1">
  <div class="grid">
    <div class="dh3">
	  <ul id="menu">
	    <li><a href="#">Welcome, <?php echo"$ru[nama]"; ?></a></li>
	    <li><a href="<?php echo"?p=beranda"; ?>">Beranda</a></li>
	    <li><a href="<?php echo"?p=user"; ?>">User</a></li>
		<li><a href="<?php echo"?p=tipekamar"; ?>">Tipe Kamar</a></li>
		<li><a href="<?php echo"?p=kamar"; ?>">Kamar</a></li>
	    <li><a href="<?php echo"?p=member"; ?>">Member</a></li>
	    <li><a href="<?php echo"?p=grup"; ?>">Grup</a></li>
	    <li><a href="<?php echo"?p=makanminum"; ?>">Makanan / Minuman</a></li>
	    <li><a href="<?php echo"?p=jasa"; ?>">Jasa</a></li>		
	    <li><a href="<?php echo"?p=logout"; ?>">Logout</a></li>
	  </ul>
	</div>
	<div class="dh9">
	  <div id="isiadmin">
<?php
  if($_GET["p"] == "logout"){
    include "logout.php";
  }else if($_GET["p"] == "user"){
    include "user.php";
  }else if($_GET["p"] == "useradd"){
    include "useradd.php";
  }else if($_GET["p"] == "useredit"){
    include "useredit.php";
  }else if($_GET["p"] == "userdel"){
    include "userdel.php";
  }else if($_GET["p"] == "grup"){
    include "grup.php";
  }else if($_GET["p"] == "grupadd"){
    include "grupadd.php";
  }else if($_GET["p"] == "grupedit"){
    include "grupedit.php";
  }else if($_GET["p"] == "grupdel"){
    include "grupdel.php";
  }else if($_GET["p"] == "jasa"){
    include "jasa.php";
  }else if($_GET["p"] == "jasaadd"){
    include "jasaadd.php";
  }else if($_GET["p"] == "jasaedit"){
    include "jasaedit.php";
  }else if($_GET["p"] == "jasadel"){
    include "jasadel.php";
  }else if($_GET["p"] == "makanminum"){
    include "makanminum.php";
  }else if($_GET["p"] == "makanminumadd"){
    include "makanminumadd.php";
  }else if($_GET["p"] == "makanminumedit"){
    include "makanminumedit.php";
  }else if($_GET["p"] == "makanminumdel"){
    include "makanminumdel.php";
  }else if($_GET["p"] == "tipekamar"){
    include "tipekamar.php";
  }else if($_GET["p"] == "tipekamaradd"){
    include "tipekamaradd.php";
  }else if($_GET["p"] == "tipekamaredit"){
    include "tipekamaredit.php";
  }else if($_GET["p"] == "tipekamardel"){
    include "tipekamardel.php";
  }else if($_GET["p"] == "kamar"){
    include "kamar.php";
  }else if($_GET["p"] == "kamaradd"){
    include "kamaradd.php";
  }else if($_GET["p"] == "kamaredit"){
    include "kamaredit.php";
  }else if($_GET["p"] == "kamardel"){
    include "kamardel.php";
  }else if($_GET["p"] == "member"){
    include "member.php";
  }else{
    include "home.php";
  }
?>
      </div>
    </div>
  </div>
</div>
<?php
}else if(!empty($_SESSION["userres"]) and !empty($_SESSION["passres"])){
include "koneksi.php";
$sqlu = mysql_query("select * from user where username='$_SESSION[userres]'");
$ru = mysql_fetch_array($sqlu);
?>
<div class="container1">
  <div class="grid">
    <div class="dh3">
	  <ul id="menu">
	    <li><a href="#">Welcome, <?php echo"$ru[nama]"; ?></a></li>
	    <li><a href="<?php echo"?p=beranda"; ?>">Beranda</a></li>
	    <li><a href="<?php echo"?p=booking"; ?>">Booking</a></li>
	    <li><a href="<?php echo"?p=checkin"; ?>">Check In</a></li>
	    <li><a href="<?php echo"?p=checkout"; ?>">Check Out</a></li>
	    <li><a href="<?php echo"?p=logout"; ?>">Logout</a></li>
	  </ul>
	</div>
	<div class="dh9">
	  <div id="isiadmin">
<?php
  if($_GET["p"] == "logout"){
    include "logout.php";
  }else if($_GET["p"] == "booking"){
    include "booking.php";
  }else if($_GET["p"] == "checkin"){
    include "checkin.php";
  }else if($_GET["p"] == "checkindetail"){
    include "checkindetail.php";
  }else if($_GET["p"] == "checkout"){
    include "checkout.php";
  }else if($_GET["p"] == "checkoutdetail"){
    include "checkoutdetail.php";
  }else{
    include "home.php";
  }
?>
      </div>
    </div>
  </div>
</div>
<?php
}else if(!empty($_SESSION["userman"]) and !empty($_SESSION["passman"])){
include "koneksi.php";
$sqlu = mysql_query("select * from user where username='$_SESSION[userman]'");
$ru = mysql_fetch_array($sqlu);
?>
<div class="container1">
  <div class="grid">
    <div class="dh3">
	  <ul id="menu">
	    <li><a href="#">Welcome, <?php echo"$ru[nama]"; ?></a></li>
	    <li><a href="<?php echo"?p=beranda"; ?>">Beranda</a></li>
	    <li><a href="<?php echo"?p=laporan"; ?>">Laporan</a></li>
	    <li><a href="<?php echo"?p=logout"; ?>">Logout</a></li>
	  </ul>
	</div>
	<div class="dh9">
	  <div id="isiadmin">
<?php
  if($_GET["p"] == "logout"){
    include "logout.php";
  }else if($_GET["p"] == "laporan"){
    include "laporan.php";
  }else{
    include "home.php";
  }
?>
      </div>
    </div>
  </div>
</div>
<?php
}else{
  include "login.php";
}  
?>