<?php 
$sqlb = mysql_query("update booking set status='OK' where kdbooking='$_GET[kdb]'");
echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=mybooking&idm=$_GET[idm]'>";
?>