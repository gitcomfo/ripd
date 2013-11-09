<?php
include 'connectionPDO.php';
$sql_select_command = $conn->prepare("SELECT * FROM command ORDER BY commandno ASC");
$sql_select_account_type = $conn->prepare("SELECT idAccount_type, account_name FROM account_type LIMIT 5");
$sql_select_soft_account_pv = $conn->prepare("SELECT sc.store_selling_earn, hc.pv_ripd_income, sc.direct_sales_cust, at.account_name,
                                                                                        hc.Rone, hc.Rtwo, hc.Rthree, hc.Rfour, hc.Rfive,
                                                                                        sc.office, sc.staff, sc.shariah, sc.charity, sc.presentation, sc.training, sc.program, sc.travel, sc.patent, sc.leadership, sc.transport, sc.research, sc.server, sc.bag, sc.brochure, sc.form, sc.money_receipt, sc.pad, sc.box, sc.extra
                                                                                           FROM pv_hitting_customer as hc, pv_softcost as sc, account_type as at
                                                                                                    WHERE hc.command_idcommand=sc.command_idcommand AND hc.Account_type_idAccount_type=at.idAccount_type
                                                                                                            AND hc.command_idcommand=?");
$sql_select_unreg_account_pv = $conn->prepare("SELECT un.sales_type, un.store_type, un.less_amount, un.selling_earn, un.patent_nh, un.ripd_income, 
                                                                                                sc.office, sc.staff, sc.shariah, sc.charity, sc.presentation, sc.training, sc.program, sc.travel, sc.patent, sc.leadership, sc.transport, sc.research, sc.server, sc.bag, sc.brochure, sc.form, sc.money_receipt, sc.pad, sc.box, sc.extra
                                                                                                        FROM pv_softcost as sc, pv_unregistered_customer as un
                                                                                                                WHERE un.command_idcommand = sc.command_idcommand
                                                                                                                        AND sc.command_idcommand=?
                                                                                                                                ORDER BY un.sales_type ASC");
$sql_pv_view = $conn->prepare("SELECT
cust_type, sales_type, store_type, less_amount, selling_earn, patent_nh,
pv_ripd_income, direct_sales_cust, account_name, Rone, Rtwo, Rthree, Rfour, Rfive,
office, staff, shariah, charity, presentation, training, program, travel, patent, leadership, transport, research, server, bag, brochure, form, money_receipt, pad, box, extra
FROM view_pv_view WHERE idcommand=?
ORDER BY cust_type ASC")
?>
