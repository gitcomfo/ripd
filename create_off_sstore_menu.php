<?php
error_reporting(0);
include_once 'includes/';
include_once 'includes/columnLeft.php';
?>
<style type="text/css">@import "css/domtab.css";</style>
<div class="columnSld">
    <form method="POST" onsubmit="">	
        <table class="formstyle"> 
            <tr><th style="text-align: center" colspan="2"><h1>একাউন্ট তৈরির ফর্মসমূহ</h1></th></tr>
            <tr>                                
                <td><a href="create_powerstore_account.php">ক্রিয়েট মেইন পাওয়ারস্টোর একাউন্ট</a></td>
                <td><a href="update_office_account.php?pwr=1">আপডেট মেইন পাওয়ারস্টোর একাউন্ট</a></td>
            </tr>
            <tr>                                
                <td><a href="create_office_account.php">ক্রিয়েট অফিস একাউন্ট</a></td>
                <td><a href="update_office_account.php?pwr=0">আপডেট অফিস একাউন্ট</a></td>
            </tr>
            <tr>                                
                <td><a href="create_salesStore_account.php">ক্রিয়েট সেলস স্টোর একাউন্ট</a></td>
                <td><a href="update_salesStore_account.php">আপডেট সেলস স্টোর একাউন্ট</a></td>
            </tr>
            <tr>                                           
                <td><a href="main_account.php?id=proprietor">ক্রিয়েট প্রোপ্রাইটার একাউন্ট</a></td>
                <td><a href="#">আপডেট প্রোপ্রাইটার একাউন্ট</a></td>
            </tr>
            <tr><th style="text-align: center" colspan="2"><h1>ছুটিসমূহ</h1></th></tr>
            <tr>
                <td><a href="make_ripd_and_govt_holiday.php">রিপড এন্ড সরকারী ছুটির দিন তৈরি</a></td>
                <td><a href="make_weekly_holiday.php">সাপ্তাহিক ছুটির দিন তৈরি</a></td>
            </tr>
            <tr>
                <td><a href="make_office_day_off_day.php">মেইক অফিস ডে এন্ড অফ ডে</a></td>
                <td><a href="make_sales_store_day_off_day.php">মেইক সেলস স্টোর ডে এন্ড অফ ডে</a></td>
            </tr>
            <tr><th style="text-align: center" colspan="2"><h1>অফিস খরচ</h1></th></tr>
            <tr>
                <td><a href="monthly_office_expenditure.php">অফিসের মাসিক খরচ</a></td> 
                <td><a href="daily_office_expenditure.php">অফিসের দৈনিক খরচ</a></td>               
            </tr>
            <tr>
                <td><a href="office_expenditure.php">অফিস এক্সপেন্ডিচার</a></td>
                <td><a href="sales_expenditure.php">সেলসষ্টোর এক্সপেন্ডিচার</a></td>
            </tr>
        </table>
    </form>
</div>