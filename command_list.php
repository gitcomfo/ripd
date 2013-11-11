<?php
error_reporting(0);
include_once 'includes/header.php';
include_once 'includes/selectQueryPDO.php';
include 'includes/MiscFunctions.php';
?>

<title>কমান্ড লিস্ট</title>
<style type="text/css">@import "css/bush.css";</style>
 
<div style="font-size: 14px;">
        <form  action="" method="post">
                <div style="padding-top: 10px;">    
                    <div style="padding-left: 110px; width: 58%; float: left"><a href="index.php?apps=COMM"><b>ফিরে যান</b></a></div>
                </div>
                <table class="formstyle" style =" width:78%;">        
                    <tr>
                        <th colspan="5">কমান্ড লিস্ট ও পি,ভি এর মান</th>
                    </tr>
                    <tr>
                        <th>কমান্ড নং</th>
                        <th>কমান্ডের বর্ণনা</th>
                        <th>১ পিভির সমমূল্য টাকা</th>
                        <th>১ টাকার সমমূল্য পিভি</th>
                        <th></th>
                    </tr>
                    <?php
                    $sql_select_command->execute();
                    $arr_command_details = $sql_select_command->fetchAll();
                    foreach ($arr_command_details as $acd_key)
                            {
                            $acd_command_id = $acd_key['idcommand'];
                            $acd_command_no = english2bangla($acd_key['commandno']);
                            $acd_command_desc = $acd_key['command_desc'];
                            $acd_pv_value = $acd_key['pv_value'];
                            $pv_value2taka = english2bangla(round(1/$acd_pv_value, 6));
                            $acd_pv_value = english2bangla($acd_pv_value);
                            echo
                            "<tr>
                                <td>কমান্ড - $acd_command_no</td>
                                <td>$acd_command_desc</td>
                                <td>$pv_value2taka টাকা</td>
                                <td>$acd_pv_value পিভি</td>
                                <td><a href='command_details.php?id=$acd_command_id&no=$acd_command_no'>বিস্তারিত দেখুন</a></td>
                            </tr>"; 
                            }
                    ?>    
                </table>
        </form>
    </div>

<?php
        include_once 'includes/footer.php';
?> 
