<?php
error_reporting(0);
include 'ConnectDB.inc';
 $p_acc = $_GET['acc'];
 $p_pass = $_GET['pass'];

$cfs_query = mysql_query("SELECT * FROM cfs_user WHERE account_number= '$p_acc' AND password='$p_pass';");
$y = mysql_num_rows($cfs_query);
if($y < 1)
{
    echo "দুঃখিত, অ্যাকাউন্ট নং এবং পাসওয়ার্ড ম্যাচ  হয়নি";
}
 else {
    echo "";
}
?>
