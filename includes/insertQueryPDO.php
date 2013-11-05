<?php
include 'connectionPDO.php';
$sql_insert_command = $conn->prepare("INSERT into command (commandno, command_desc, pv_value) VALUES (?, ?, ?)");                
?>
