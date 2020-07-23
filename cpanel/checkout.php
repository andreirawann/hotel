<h3>CHECK OUT</h3>
<table border="0" width="90%" cellpadding="10">
<tr>
  <th>NO</th>
  <th>KODE BOOKING</th>
  <th>NAMA</th>
  <th>KAMAR</th>
  <th>TANGGAL MENGINAP</th>
  <th>AKSI</th>
</tr>
<?php
  $sqlc = mysql_query("select * from checkin order by idcheckin asc");
  $no = 1;
  while($rc = mysql_fetch_array($sqlc)){
    if($rc["status"] == "Checkin"){	  
    $sqlb = mysql_query("select * from booking where idbooking='$rc[idbooking]'");
	$rb = mysql_fetch_array($sqlb);	     		  
    $sqlm = mysql_query("select * from member where idmember='$rb[idmember]'");
	$rm = mysql_fetch_array($sqlm);	    		  
    $sqlk = mysql_query("select * from kamar where idkamar='$rb[idkamar]'");
	$rk = mysql_fetch_array($sqlk);	 
    echo "<tr align='center'>
	  <td>$no</td>
	  <td>$rb[kdbooking]</td>
	  <td>$rm[namalengkap]</td>
	  <td>$rk[nokamar]</td>
	  <td>$rb[tglmasuk] sampai $rb[tglkeluar]</td>
	  <td><a href='?p=checkoutdetail&kdb=$rb[kdbooking]'><button type='button' class='btn btn-more'>Check Out</button></a></td>
	</tr>";
	$no++;
	}
  }
?>
</table>