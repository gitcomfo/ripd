<?php
error_reporting(0);
include 'includes/ConnectDB.inc';
include_once 'includes/header.php';
include './includes/connectionPDO.php';

?>

<title>Simple</title>
<style type="text/css">@import "css/bush.css";</style>
 
<div style="font-size: 14px;">
    <form  action="" id="amountTransForm" method="post" style="font-family: SolaimanLipi !important;">
            <div style="padding-top: 10px;">    
                <div style="padding-left: 110px; width: 58%; float: left"><a href="index.php?apps=PROF"><b>ফিরে যান</b></a></div>
            </div>
            <table class="formstyle" style =" width:78%;font-family: SolaimanLipi !important;">        
                <tr>
                    <th colspan="2">হেডিং</th>
                </tr>
                <tr>
                    <td style="text-align: right; width: 30%;">অ্যাকাউন্ট নং</td>
                    <td>: <input  class="box" type="text" name="accountNo"  id="accountNo" value=""/> <em>(ইংরেজিতে লিখুন)</em></td>   
                </tr>
                <tr>
                    <td style="text-align: right; width: 30%;">টাকার পরিমান</td>
                    <td>: <input  class="box" type="text" name="amount1"  id="amount1"  onkeypress="return checkIt(event)" /> টাকা </td>   
                </tr>
                 
                <tr>
                    <td colspan="2" style="text-align: center"></br><input type="button" class="btn" name="submit" id="submit" value="ঠিক আছে" onclick="getPassword();" disabled="">&nbsp;<input type="reset" class="btn" name="reset" value="রিসেট"></td>
                </tr>
            </table>
        </form>
    </div>
    <?php
include_once 'includes/footer.php';
?> 
