<?php
error_reporting(0);
include_once 'includes/';
include_once 'includes/columnLeft.php';
?>
<style type="text/css">@import "css/domtab.css";</style>

<div class="columnSld">
    <form method="POST" onsubmit="">	
        <table class="formstyle"> 
            <tr><th style="text-align: center" colspan="2"><h1>কমান্ড ও পি,ভি বন্টণ</h1></th></tr>
            <tr>
                <td><a href="command_making.php">কমান্ড অপশন তৈরি</a></td>            
            </tr>
            <tr>
                <td><a href="command_soft_costing_making.php">সফট কস্টিং সংক্রান্ত পিভি বন্টণ</a></td>             
            </tr>
            <tr>
                <td><a href="command_hitting_customer_making.php">কাস্টমার হিটিং সংক্রান্ত পিভি বন্টণ</a></td>
                <td><a href="#">আন-রেজিস্ট্রার্ড কাস্টমার এর সংক্রান্ত পিভি বন্টণ</a></td>               
            </tr>
            <tr><th style="text-align: center" colspan="2"><h1>সিকিউরিটি </h1></th></tr>
            <tr>
                <td><a href="security_module.php">মডিউল</a></td>
                <td><a href="security_submodule.php">সাবমডিউল</a></td>               
            </tr>
            <tr>
                <td><a href="security_page_setting.php">পেজ সেটিং</a></td>
                <td><a href="security_role.php">রোল সেটিং</a></td>               
            </tr>
        </table>
    </form>
</div>
