<?php 
error_reporting(0);
include 'includes/ConnectDB.inc';
include 'includes/header.php';
?>
<style type="text/css">
    @import "css/bush.css";
</style>
<script>
function validateForm()
{
    var account_id=document.forms["account_postponed_form"]["account_number"].value;
    if (account_id==null || account_id=="")
      {
      alert("You Should Give An Account Number");
      return false;
      }
  
    var fup = document.getElementById('scan_doc');
    var fileName = fup.value;
    if(fileName==null || fileName==""){
    return true;
    }else{
    var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
    if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "doc" || ext == "pdf")
    {
    return true;
    } 
    else
    {
    alert("Please, Upload pdf, doc, Gif or Jpg content");
    fup.focus();
    return false;
    }
    }
}
</script>
<?php 
if(isset($_POST['submit'])){
    $account_number = $_POST['account_number'];
    $sql_account_number_id = mysql_query("SELECT * from ".$dbname.".customer_account where cust_acc_number = '$account_number'");
    while($row_account_number_id = mysql_fetch_array($sql_account_number_id)){
        $account_number_id = $row_account_number_id['idCustomer_account'];
    }
    $postpone_type = $_POST['postpone_type'];
    $cause = $_POST['cause'];
    $scan_document = $_POST['scan_doc'];
    
    //print_r($_POST);
    //echo "account_number: ".$account_number." Cause: ".$cause." scan_document:".$scan_document." account_number_id: ".$account_number_id." postpone_type: ".$postpone_type;
    
    //Check in account_close_restart Table
        $check_account_close_restart_sql = mysql_query("SELECT * from ".$dbname.".account_close_restart where Customer_account_idCustomer_account = '$account_number_id'");
        $check_acr_row_number = mysql_num_rows($check_account_close_restart_sql);
        
        //...........................Test Echo for see output.............................................
       //echo "date: ".$date_date." RipdNGovt: ".$RipdNGovtHoliday." check_RnGDay_row_number: ".$check_RnGDay_row_number."<br />";
        if($check_acr_row_number<1){
          //echo "check_acr_row_number: ".$check_acr_row_number;
          $sql_insert_acr = "INSERT into $dbname.account_close_restart (postpond_type, coz_of_account_close, scan_doc, Customer_account_idCustomer_account) 
                                                    VALUES ('$postpone_type', '$cause', '$scan_document', '$account_number_id')";   
          if(mysql_query($sql_insert_acr)){
              $msg = "You Have Successfully Blocked Account: ".$account_number;
          }else{
              $msg = "দুঃখিত, আবার চেষ্টা করুন";
          }
        }
        elseif($check_acr_row_number>0){
            //echo "check_acr_row_number: ".$check_acr_row_number;
            $sql_update_acr = "UPDATE ".$dbname.".account_close_restart SET postpond_type='$postpone_type', coz_of_account_close='$cause', scan_doc='$scan_document' where Customer_account_idCustomer_account = '$account_number_id'";
            if(mysql_query($sql_update_acr)){
              $msg = "You Have Successfully Blocked Account: ".$account_number;
          }else{
              $msg = "দুঃখিত, আবার চেষ্টা করুন";
          }
        }else{}        
}
?>
<div class="columnSld" style=" padding-left: 50px;">
    <div class="main_text_box">
        <div style="padding-left: 110px;"><a href="index.php?apps=CA"><b>ফিরে যান</b></a></div>
        <div>           
            <form name="account_postponed_form" method="POST" onsubmit="return validateForm()">	
                <table class="formstyle"  style=" width: 98%; ">          
                    <tr><th style="text-align: center" colspan="3"><h1>একাউন্ট স্থগিত করন</h1>
                    </th>
                    </tr>
                    <tr>
                        <td colspan="3" height="25px" style="text-align: center;"><b><span style="color:green;font-size:20px;"><blink><?php if(!empty($msg)){echo $msg;} ?></blink></b></td>
                    </tr>                    
                    <tr>
                        <td style="width: 20%">একাউন্ট নাম্বার</td>
                        <td style="width: 1%">:</td>
                        <td style="width: 55%"><input  class ="box" type="text" id="account_number" name="account_number" />
                        </td>                                      
                    </tr>
                    <tr><td>স্থগিতকরণের ধরন</td>
                           <td>:</td>
                           <td><input type="radio" name="postpone_type" value="confiscated" checked>সাময়িক স্থগিত
                                    <input type="radio" name="postpone_type" value="close">একাউন্ট বন্ধ</td>
                    </tr>
                    <tr>
                        <td>কারন</td>
                        <td>:</td>
                        <td style="padding-left: 0px"><textarea id="cause" name="cause" ></textarea>
                    </tr>
                    <tr>
                        <td>স্ক্যান ডকুমেন্ট</td>
                        <td>:</td>
                        <td > <input class="box" type="file" id="scan_doc" name="scan_doc" style="font-size:10px;"/> </td>
                    </tr>
                    <tr>                    
                        <td colspan="3" style="padding-left: 250px; " ><input class="btn" style =" font-size: 12px; " type="submit" name="submit" value="সেভ করুন" />
                            <input class="btn" style =" font-size: 12px" type="reset" name="reset" value="রিসেট করুন" />
                        </td>                           
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include_once 'includes/footer.php'; ?>