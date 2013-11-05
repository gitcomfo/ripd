<?php
include 'connectionPDO.php';
$sql_select_command = $conn->prepare("SELECT idcommand, commandno FROM command");
?>
