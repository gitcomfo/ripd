<?php
include 'connectionPDO.php';
$sql_insert_command = $conn->prepare("INSERT into command (commandno, command_desc, pv_value) VALUES (?, ?, ?)");    
$columns_scc = array('command_idcommand', 'store_selling_earn', 'direct_sales_cust', 'office', 'staff', 'shariah', 'charity', 'presentation', 'training', 'program', 
                                            'travel', 'patent', 'leadership', 'transport', 'research', 'server', 'bag', 'brochure', 'form', 'money_receipt', 'pad', 'box', 'extra');
$column_list_scc = join(',', $columns_scc);
$param_list_scc = join(',', array_map(function($col) { return ":$col"; }, $columns_scc));
$sql_insert_soft_cost_command = $conn->prepare("INSERT into pv_softcost ($column_list_scc) VALUES ($param_list_scc)");
?>
