<?php
include_once 'includes/header.php';
include_once 'includes/insertQueryPDO.php';
include_once 'includes/selectQueryPDO.php';
include 'includes/MiscFunctions.php';

if($_POST['submit_command_soft_cost'])
        {
        $p_commman_no = $_POST['command_no'];
        $p_commman_desc = $_POST['command_desc'];
        $p_pv_value_in_100 = $_POST['pv_100'];
        $p_pv_value_in_1 = $_POST['pv_1'];
        $pv_value = round($p_pv_value_in_100/100, 3);
        if($pv_value == $p_pv_value_in_1)
                {
                $sql_insert_command->execute(array($p_commman_no, $p_commman_desc, $pv_value));
                }
        else echo "পি,ভি এর মান সমান হয়নি।";
        }
?>

<title>কমান্ড অপশন</title>
<style type="text/css">@import "css/bush.css";</style>
 
<div style="font-size: 14px;">
        <form  action="" method="post">
                <div style="padding-top: 10px;">    
                    <div style="padding-left: 110px; width: 58%; float: left"><a href="index.php?apps=COMM"><b>ফিরে যান</b></a></div>
                </div>
                <table class="formstyle" style =" width:78%;">        
                    <tr>
                        <th colspan="2">সফট কস্টিং সংক্রান্ত পিভি বন্টণ</th>
                    </tr>
                    <tr>
                        <td style="text-align: right; width: 40%;">কমান্ড নম্বর</td>
                        <td>: 
                            <select class="box" name="command_no">
                                    <?php
                                    $sql_select_command->execute();
                                    $arr_command_list = $sql_select_command->fetchAll();
                                    //print_r($arr_command_list);
                                    foreach ($arr_command_list as $key => $value) 
                                            {
                                            $var_command_id = $arr_command_list[''];
                                            }
                                    ?>    
                            </select>
                        </td>   
                    </tr>
                    <tr>
                        <td colspan='2' ><hr /></td>
                    </tr>
                    <tr>
                        <td style="text-align: right; width: 40%;">১০০ টাকা </td>
                        <td>=<input  class="box" type="text" name="pv_100" /> পি,ভি</td>   
                    </tr>     
                    <tr>
                        <td style="text-align: right; width: 40%;">১ টাকা </td>
                        <td>=<input  class="box" type="text" name="pv_1" /> পি,ভি</td>   
                    </tr>             
                    <tr>
                        <td colspan="2" style="text-align: center;"></br><input type="submit" class="btn" name="submit_command_soft_cost" id="submit_command_soft_cost" value="ঠিক আছে">&nbsp;<input type="reset" class="btn" name="reset" value="রিসেট"></td>
                    </tr>
                </table>
        </form>
    </div>

<?php
        include_once 'includes/footer.php';
?> 
