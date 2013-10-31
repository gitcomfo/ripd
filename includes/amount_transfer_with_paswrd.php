<?php
error_reporting(0);
include 'ConnectDB.inc';
include_once 'MiscFunctions.php';

echo "<table>";
echo " <tr>
                    <td style='text-align: right; width: 30%;'>পাসওয়ার্ড লিখুন</td>
                    <td>: <input  class='box' type='text' name='password1'  id='password1' onblur='checkCorrectPass();'/></td>   
                    </tr>
                    <tr>
                        <td style='text-align: right; width: 30%;'>পুনরায় পাসওয়ার্ড লিখুন</td>
                        <td>:  <input  class='box' type='text' name='password2'  id='password2' onblur='checkPass(this.value); '/> 
                            <span id='passcheck'></span><span id='showError'></span></td>   
                    </tr>
                    <tr>                    
                        <td colspan='2' style='padding-left: 150px; ' ></br><input class='btn' style =' font-size: 12px; ' type='button'  value='ঠিক আছে' onclick='checkAndSubmit();' />
                        <input class='btn' style =' font-size: 12px' type='reset' name='reset' value='রিসেট করুন' /></td>                           
                    </tr></table>";
?>