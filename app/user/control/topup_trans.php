<?php
mysql_select_db($database_conn, $conn);
$query_transactions = "SELECT topups.productcodes, topups.destinations, topups.amounts, topups.resultdescription, topups.comments, topups.created_date FROM topups WHERE topups.created_by = '$cur_user'";
$transactions = mysql_query($query_transactions, $conn) or die(mysql_error());
$row_transactions = mysql_fetch_assoc($transactions);
$totalRows_transactions = mysql_num_rows($transactions);
?>