<?php
echo "<h3>TIPE KAMAR</h3>";
include "koneksi.php";
$sqlt = mysql_query("select * from tipekamar order by idtipe asc");
while($rt = mysql_fetch_array($sqlt)){
  echo "<div class='dh6' align='center'>";
  echo "<div id='prd'>";
  echo "<fieldset>";
  echo "<img src='fotokamar/$rt[foto1]' width='100%'>";
  echo "<h3>$rt[kdtipe] - $rt[namatipe]</h3>";
  echo "<big><b>Rp. $rt[harga]</b></big> per malam";
  echo "<p>$rt[keterangan]";
  echo "<p><a href='?p=kamar&idt=$rt[idtipe]'><button type='button' class='btn btn-more'>Lihat Kamar</button></a>";
  echo "</fieldset>";
  echo "</div>";
  echo "</div>";
}
?>