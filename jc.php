<?php
//error_reporting(0);
include 'includes/db.php';
include 'includes/ConnectDB.inc';
include './includes/connectionPDO.php';
$arr = array('dipie-ibu-join','ac-8463-4399');
 for($a=0;$a<2;$a++)
                       {
                          echo $account = $arr[$a];
                           $sql_cfs = mysql_query("SELECT * FROM cfs_user WHERE account_number = '$account';");
                           $getrow=mysql_fetch_assoc($sql_cfs);
                           echo $getrow['account_name'];
                           
                       }
?>