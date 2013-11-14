<?php
include_once 'connectionPDO.php';
$sql_update_prev_command = $conn->prepare("UPDATE command_execution SET com_end_date=NOW() WHERE commandno=? ORDER BY idcommandexec DESC LIMIT 1");

?>
