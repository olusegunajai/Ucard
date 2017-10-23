<?php
$user = $_SESSION['MM_Username'];
mysql_select_db($database_conn, $conn);
$query_currentuser = "SELECT * FROM `user` WHERE `user`.email='$user'";
$currentuser = mysql_query($query_currentuser, $conn) or die(mysql_error());
$row_currentuser = mysql_fetch_assoc($currentuser);
$totalRows_currentuser = mysql_num_rows($currentuser);
$cur_user = $row_currentuser['username'];
?>
