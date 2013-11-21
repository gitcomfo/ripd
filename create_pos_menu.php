<?php
error_reporting(0);
include_once 'includes/columnLeft.php';
?>
<style type="text/css">@import "css/domtab.css";</style>
<div class="columnSld">
    <form method="POST" onsubmit="">	
        <table class="formstyle"> 
            <tr><th style="text-align: center" colspan="2"><h1>বিক্রয় কার্যক্রম</h1></th></tr>
            <tr>
                <td><a href="pos/newSale.php?selltype=1">খুচরা বিক্রয়</a></td>
                <td><a href="pos/newSale.php?selltype=2">পাইকারি বিক্রয়</a></td>
            </tr>
            <tr>
                <td><a href="pos/replace.php">পণ্য ফেরত</a></td>
                <td><a href="pos/productIN.php">প্রোডাক্ট ইন</a></td>
            </tr>
            <tr>
                <td><a href="pos/product_list.php">পণ্য তালিকা</a></td>
                <td><a href="pos/package_inventory.php">প্যাকেজ পণ্য তালিকা</a></td>
            </tr>
             <tr><th style="text-align: center" colspan="2"><h1>প্যাকেজ সংক্রান্ত</h1></th></tr>
             <tr>
                <td><a href="pos/create_package.php">নতুন প্যাকেজ তৈরি</a></td>
                <td><a href="pos/package_entry.php">প্যাকেজ এন্ট্রি</a></td>
            </tr>
             <tr>
                <td><a href="pos/package_breaking.php">প্যাকেজ ব্রেক</a></td>
                <td><a href="pos/package_inventory.php">প্যাকেজ ইনভেন্টরি</a></td>
            </tr>
        </table>
    </form>
</div>