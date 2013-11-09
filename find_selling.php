<?php
include_once 'includes/MiscFunctions.php';
include 'includes/ConnectDB.inc';
include 'includes/header.php';
?>
<style type="text/css">
    @import "css/bush.css";
</style>

<div class="column6">
    <div class="main_text_box">
      <div style="padding-left: 110px;"><a href="index.php?apps=PROD"><b>ফিরে যান</b></a></div> 
        <div>         
            <table  class="formstyle">          
                <tr><th colspan="11" style="text-align: center;">ফাইন্ড সেলিং</th></tr>  
                <tr>                          
                <td colspan ="6"><b>এন্টার চালান নং : </b><input   class="box" type="text" id="search_box_filter">
                <input type="submit" value="সাবমিট">
               </td>
                </tr>
                <tr align="left" id="table_row_odd">
                    <td > &nbsp;ক্রম</td>
                    <td style="width: 92px;">প্রোডাক্ট ক্যাটাগরি</td>
                    <td style="width: 92px;">প্রোডাক্টের নাম</td>
                    <td >ব্র্যান্ড</td>
                    <td >পরিমাণ</td>
                     <td >একক</td>
                      <td >সাইজ</td>
                </tr> 
                <tr>
                    <td> ০১</td>
                      <td>ভোগ্যপণ্য</td>
                    <td>চাউল                      
                   </td>    
                                       
                        <td>   প্রাণ                      		
                                   
                        <td>   ২টি                    		
                                   
                        <td>   লিটার                       		
                 
                        <td>  বড়                       		
                    
                </tr>
            </table>
        </div>

    </div>
    <?php
    include 'includes/footer.php';
    ?>