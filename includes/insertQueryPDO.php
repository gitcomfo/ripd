<?php
include_once 'connectionPDO.php';

//command option insert BASIC
$sql_insert_command = $conn->prepare("INSERT into command (commandno, command_desc, pv_value) VALUES (?, ?, ?)");    

//soft costing command for a particular command
$columns_scc = array('command_idcommand', 'store_selling_earn', 'direct_sales_cust', 'office', 'staff', 'shariah', 'charity', 'presentation', 'training', 'program', 
                                            'travel', 'patent', 'leadership', 'transport', 'research', 'server', 'bag', 'brochure', 'form', 'money_receipt', 'pad', 'box', 'extra');
$column_list_scc = join(',', $columns_scc);
$param_list_scc = join(',', array_map(function($col_scc) { return ":$col_scc"; }, $columns_scc));
$sql_insert_soft_cost_command = $conn->prepare("INSERT into pv_softcost ($column_list_scc) VALUES ($param_list_scc)");

//PV hitting customer for different package and command
$columns_hitting_customer = array('command_idcommand', 'Account_type_idAccount_type', 'Rone', 'Rtwo', 'Rthree', 'Rfour', 'Rfive', 'pv_ripd_income');
$column_list_hitting_cust = join(',', $columns_hitting_customer);
$param_list_hitting_cust = join(',', array_map(function($col_hcc) { return ":$col_hcc"; }, $columns_hitting_customer));
$sql_insert_hitting_customer_command = $conn->prepare("INSERT into pv_hitting_customer ($column_list_hitting_cust) VALUES ($param_list_hitting_cust)");

//PV hitting unregistered customer for different sales store and sales type
$columns_unreg_customer = array('command_idcommand', 'sales_type', 'store_type', 'less_amount', 'selling_earn', 'patent_nh', 'ripd_income');
$column_list_unreg_cust = join(',', $columns_unreg_customer);
$param_list_unreg_cust = join(',', array_map(function($col_ucc) { return ":$col_ucc"; }, $columns_unreg_customer));
$sql_insert_unreg_customer_command = $conn->prepare("INSERT into pv_unregistered_customer ($column_list_unreg_cust) VALUES ($param_list_unreg_cust)");

//command execution
$sql_insert_curr_command = $conn->prepare("INSERT into command_execution (commandno, com_start_date) VALUES (?, NOW())");

?>
