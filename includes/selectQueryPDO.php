<?php
include 'connectionPDO.php';
$sql_select_command = $conn->prepare("SELECT idcommand, commandno FROM command");
$sql_select_account_type = $conn->prepare("SELECT idAccount_type, account_name FROM account_type");
?>
