<?php include_once 'includes/header.php'; ?>
<style type="text/css">
    @import "css/bush.css";
</style>
<?php
if (isset($_POST['submit'])) {
    ?>
    <div class="columnSld" style=" padding-left: 50px;">
        <div class="main_text_box">
            <div style="padding-left: 110px;"><a href="index.php?apps=VA"><b>ফিরে যান</b></a></div>
            <div>           
                <form method="POST" onsubmit="">	
                    <table class="formstyle"  style=" width: 98%; ">          
                        <tr><th style="text-align: center" colspan="2"><h1>সেন্ড এমাউন্ট</h1></th></tr>
                        <tr><td colspan="2"></td></tr>
                        <tr>
                            <td>সেন্ডার সেল নাম্বার</td>
                            <td>:    <input  class ="textfield" type="text" id="pin_number" name="pin_number" /></td>
                        </tr>
                        <tr>                    
                            <td colspan="4" style="padding-left: 250px; " ><input class="btn" style =" font-size: 12px; " type="submit" name="submit" value="সেভ করুন" />
                                <input class="btn" style =" font-size: 12px" type="reset" name="reset" value="রিসেট করুন" /></td>                           
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <?php
} else {
    ?>

    <div class="columnSld" style=" padding-left: 50px;">
        <div class="main_text_box">
            <div style="padding-left: 110px;"><a href="index.php?apps=VA"><b>ফিরে যান</b></a></div>
            <div>           
                <form method="POST" onsubmit="">	
                    <table class="formstyle"  style=" width: 98%; ">          
                        <tr><th style="text-align: center" colspan="2"><h1>সেন্ড এমাউন্ট</h1></th></tr>

                        <tr><td colspan="2"></td></tr>
                        <tr>
                            <td>ব্যালেন্সড এমাউন্ট</td>
                            <td>:    <input  class ="textfield" type="text" id="pin_number" name="pin_number" /></td>
                        </tr>
                        <tr>
                            <td>সেন্ড বিডিটি</td>
                            <td>:    <input  class ="textfield" type="text" id="pin_number" name="pin_number" /></td>
                        </tr>
                        <tr>
                            <td>ট্রাস্ট প্রোপার্টি</td>
                            <td>:    <input  class ="textfield" type="text" id="pin_number" name="pin_number" /></td>
                        </tr>
                        <tr>
                            <td>আর্ন এমাউন্ট</td>
                            <td>:    <input  class ="textfield" type="text" id="pin_number" name="pin_number" /></td>
                        </tr>
                        <tr>
                            <td>ট্যাক্স</td>
                            <td>:    <input  class ="textfield" type="text" id="pin_number" name="pin_number" /></td>
                        </tr>
                        <tr>
                            <td>সার্ভিস চার্জ</td>
                            <td>:    <input  class ="textfield" type="text" id="pin_number" name="pin_number" /></td>
                        </tr>
                        <tr>                    
                            <td colspan="4" style="padding-left: 250px; " ><input class="btn" style =" font-size: 12px; " type="submit" name="submit" value="সেভ করুন" />
                                <input class="btn" style =" font-size: 12px" type="reset" name="reset" value="রিসেট করুন" /></td>                           
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <?php
}
include_once 'includes/footer.php';
?>