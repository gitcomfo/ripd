<?php
error_reporting(0);
include_once 'includes/';
?>
<style type="text/css">
    @import "css/domtab.css";
</style>
<?php
include_once 'includes/columnLeft.php';
?>
<div class="columnSld">
    <form method="POST" onsubmit="">	
        <table class="formstyle"> 
            <tr><th style="text-align: center" colspan="2"><h1>একাউন্ট তৈরির ফর্মসমূহ</h1></th></tr>
            
            <tr>
                <td><a href="main_account.php?id=customer">ক্রিয়েট কাস্টমার একাউন্ট</a></td>
                <td><a href="#">আপডেট কাস্টমার একাউন্ট</a></td>
            </tr>
             <tr><th style="text-align: center" colspan="2"><h1>একাউন্ট ম্যানেজম্যান্ট</h1></th></tr>            
            <tr>
                <td><a href="close_account.php">একাউন্ট বন্ধ / পুনারায় চালু করন</a></td>
               <td><a href="recover_password.php">পাসওয়ার্ড পুনরুদ্ধার</a></td>  
            </tr>
       
        </table>
    </form>
</div>