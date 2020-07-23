<h3>DATA MEMBER</h3>
<?php include "koneksi.php"; ?>
<table border="0" width="90%" cellpadding="10">
<tr>
  <th>No.</th>
  <th>AKUN</th>
  <th>BIODATA</th>
  <th>TERDAFTAR SEJAK</th>
</tr>
<?php
$sqlm = mysql_query("select * from member order by idmember asc");
$no = 1;
while($rm = mysql_fetch_array($sqlm)){
  echo "<tr valign='top'>
    <td>$no</td>
    <td>Username : <br><big>$rm[username]</big><p>Password : <br><big>$rm[password]</big></td>
    <td><big>$rm[namalengkap]</big><br>No. KTP : $rm[noktp]<p>$rm[alamat]<br>$rm[nohp]</td>
    <td>$rm[tgldaftar]</td>
  </tr>";
  $no++;
}
?>
</table>
