<?php
include 'connectionPDO.php';
$sql_insert_command = $conn->prepare("INSERT into command (commandno, command_desc, pv_value) VALUES (?, ?, ?)");    
$sql_insert_soft_cost_command = $conn->prepare("INSERT into pv_softcost 
                                (store_selling_earn, direct_sales_cust, office, staff, shariah, charity, presentation, training, program, travel, patent, leadership, transport, research, server, bag, brochure, form, money_receipt, pad, box, extra, command_idcommand)
                                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
?>
