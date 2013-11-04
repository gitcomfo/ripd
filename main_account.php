<?php
include_once 'includes/MiscFunctions.php';
include 'includes/db.php';
include 'includes/ConnectDB.inc';
include 'includes/header.php';
error_reporting(0);
function showPowerHeads()
{
    echo  "<option value=0> -সিলেক্ট করুন- </option>";
    $sql_office= mysql_query("SELECT * FROM office WHERE office_type='pwr_head' ORDER BY office_name;");
    while($headrow = mysql_fetch_assoc($sql_office))
    {
        echo  "<option value=".$headrow['account_number'].">".$headrow['office_name']."</option>";
    }
}
if($_POST['submit'])
        {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $account_name = $_POST['name'];
        $account_number = $_POST['acc_num'];
        $account_email = $_POST['email'];
        $account_mobile = $_POST['mobile'];
        mysql_query("INSERT INTO cfs_user (user_name, password, blocked, overall_access, account_name, account_number, account_open_date, mobile, email, cfs_account_status, user_type)
                                                                        VALUES ('$username', '$password', '0', 'blank', '$account_name', '$account_number', NOW(), '$account_mobile', '$account_email', 'active', 'owner')") or exit(mysql_error()." sorry");
       echo  $cfs_user_id = mysql_insert_id();
        $account_type = $_POST['account_type'];
        if($account_type == "employee")
                {
                $employee_type = $_POST['employee_type'];
                $employee_grade = $_POST['employee_grade'];
                $employee_office = $_POST['office_selection'];
                mysql_query("INSERT into $dbname.employee (status, employee_type, Office_idOffice, cfs_user_idUser, Employee_grade_idEmployee_grade)
                                                                                    VALUES ('Non-posting', '$employee_type', '$employee_office', '$cfs_user_id', '$employee_grade')");
                $employee_id = mysql_insert_id();
                mysql_query("INSERT into $dbname.employee_information (employee_attendance_idemployee_attendance, Employee_idEmployee)
                                                                                                VALUES ('1', '$employee_id')");
                $employee_info_id = mysql_insert_id();
                $pass_message = "create_employee_account.php?=".$employee_info_id;
                }
        else if($account_type == "customer")
                {
                $pin_number = $_POST['pin_num'];
                mysql_query("INSERT into $dbname.employee (status, employee_type, Office_idOffice, cfs_user_idUser, Employee_grade_idEmployee_grade)
                                                                                    VALUES ('Non-posting', '$employee_type', '$employee_office', '$cfs_user_id', '$employee_grade')");
                $employee_id = mysql_insert_id();
                mysql_query("INSERT into $dbname.employee_information (employee_attendance_idemployee_attendance, Employee_idEmployee)
                                                                                                VALUES ('1', '$employee_id')");
                $employee_info_id = mysql_insert_id();
                $pass_message = "create_employee_account.php?=".$employee_info_id;
                }
       else if($account_type == "proprietor")
                {
                    echo $pwrHeadAccNo = $_POST['powerStore_accountNumber'];
                    $sel_pwrID = mysql_query("SELECT * FROM office WHERE account_number = '$pwrHeadAccNo' ");
                    $officerow = mysql_fetch_assoc($sel_pwrID);
                    echo $db_pwrOfficeID = $officerow['idOffice'];
                    echo $db_pwrHeadname = $officerow['office_name'];
                    echo $sql_pro_ins= mysql_query("INSERT INTO proprietor_account (powerStore_name, powerStore_accountNumber, Office_idOffice, cfs_user_idUser)
                                            VALUES ('$db_pwrHeadname', '$pwrHeadAccNo',$db_pwrOfficeID,  $cfs_user_id)");
                    $propreitor_account_id = mysql_insert_id();
                    if($sql_pro_ins == 1){$pass_message = "create_proprietor_account.php?proID=".$propreitor_account_id;}                     
                }
        }

?>
<title>ক্রিয়েট কর্মচারী অ্যাকাউন্ট</title>
<style type="text/css">@import "css/bush.css";</style>
<link rel="stylesheet" type="text/css" media="all" href="javascripts/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="javascripts/jsDatePick.min.1.3.js"></script>
<script type="text/javascript" src="javascripts/jquery-1.4.3.min.js"></script>
<script>
  window.onclick = function()
    {
        new JsDatePick({
            useMode: 2,
            target: "date",
            dateFormat: "%Y-%m-%d"
        });
    }
    function goBack()
    {
        window.history.go(-1);
    }
        function numbersonly(e)
   {
        var unicode=e.charCode? e.charCode : e.keyCode
            if (unicode!=8)
            { //if the key isn't the backspace key (which we should allow)
                if (unicode<48||unicode>57) //if not a number
                return false //disable key press
            }
}
   function checkIt(evt) // float value-er jonno***********************
    {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode ==8 || (charCode >47 && charCode <58) || charCode==46) {
        status = "";
        return true;
    }
    status = "This field accepts numbers only.";
    return false;
}
function checkPass(passvalue) // check password in repeat
{
    var password = document.getElementById('password').value;
    if(password != passvalue)
        {
            document.getElementById('reap_password').focus();
            document.getElementById('passcheck').style.color='red';
            document.getElementById('passcheck').innerHTML = "পাসওয়ার্ড সঠিক হয় নি";
        }
        else{
            document.getElementById('passcheck').style.color='green';
            document.getElementById('passcheck').innerHTML="OK";
        }
}
    function showAccountNo(account)
    {
        document.getElementById('powerStore_accountNumber').value= account;
    }
</script>
<script>
function check(str) // for currect email address form checking
{
if (str.length==0)
  {
  document.getElementById("error_msg").innerHTML=""; 
  document.getElementById("error_msg").style.border="0px";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("error_msg").innerHTML=xmlhttp.responseText;
    document.getElementById("error_msg").style.display = "inline";
    }
  }
xmlhttp.open("GET","includes/check.php?x="+str,true);
xmlhttp.send();
}
</script>
<div class="column6">
    <div class="main_text_box">
        <div style="padding-left: 110px;"><a onclick="goBack();" style="cursor: pointer;"><b><u>ফিরে যান</u></b></a></div> 
        <div>            
            <form method="POST" action="">
                <?php
                    $input= $_GET['id'];
                    $arrayAccountType = array('employee' => 'কর্মচারীর', 'customer' => 'কাস্টমারের', 'proprietor' => 'প্রোপ্রাইটারের');
                    $showAccountType  = $arrayAccountType[$input];
                    
                    echo "<tr><td><input type='hidden' value='$input' name='account_type'/></td></tr>";

                    echo "<table  class='formstyle'>          
                    <tr><th colspan='4' style='text-align: center;'>$showAccountType মূল তথ্য</th></tr>  
                    <tr>
                        <td >$showAccountType নাম</td>
                        <td>:   <input class='box' type='text' id='name' name='name'/></td>			
                    </tr>
                    <tr>
                        <td >একাউন্ট নাম্বার</td>
                        <td>:   <input class='box' type='text' id='acc_num' name='acc_num' /> <em>ইংরেজিতে লিখুন</em></td>			
                    </tr>
                    <tr>
                        <td >ই মেইল</td>
                       <td>:   <input class='box' type='text' id='email' name='email' onblur='check(this.value)' /> <em>ইংরেজিতে লিখুন</em> <span id='error_msg' style='margin-left: 5px'></span></td>			
                    </tr>
                    <tr>
                        <td >মোবাইল</td>
                        <td>:   <input class='box' type='text' id='mobile' name='mobile' onkeypress=' return numbersonly(event)' /> <em>ইংরেজিতে লিখুন</em></td>		
                    </tr>";
                    if($input == "customer")
                            {
                            echo "<tr>
                                <td >পিন নাম্বার</td>
                                <td>:   <input class='box' type='text' id='pin_num' name='pin_num' /> <em>ইংরেজিতে লিখুন</em></td>		
                            </tr>";
                            }
                    echo "
                   <tr>
                        <td>ইউজারের নাম</td>
                      <td>:   <input class='box' type='text' id='username' name='username' /> <em>ইংরেজিতে লিখুন</em></td>
                    </tr>   
                    <tr>
                        <td>পাসওয়ার্ড</td>
                       <td>:   <input class='box' type='password' id='password' name='password' /> <em>ইংরেজিতে লিখুন</em></td>
                    </tr>
                    <tr>
                        <td>কনফার্ম পাসওয়ার্ড</td>
                       <td>:   <input class='box' type='password' id='reap_password' name='reap_password' onkeyup='checkPass(this.value);'/> <em>ইংরেজিতে লিখুন</em> <span id='passcheck'></span></td>
                    </tr>";
                    if($input == "customer" || $input == "employee") {
                   echo "<tr>
                        <td colspan='2' ><hr /></td>
                    </tr>
                    <tr>
                        <td>কর্মচারীর ধরন</td>
                      <td>:   <select  class='box'  name='date' style =' font-size: 11px'>
                                <option > একটি নির্বাচন করুন</option>
                                <option value=1></option>
                                <option value=2></option>
                                <option value=3></option>
                                <option value=4></option> 
                            </select></td>
                    </tr>   
                    <tr>
                        <td>গ্রেড নির্বাচন</td>
                       <td>:    <select  class='box'  name='date' style =' font-size: 11px'>
                                <option > একটি নির্বাচন করুন</option>
                                <option value=1></option>
                                <option value=2></option>
                                <option value=3></option>
                                <option value=4></option> 
                            </select></td>
                    </tr>
                    <tr>
                        <td>সেলারি</td>
                       <td>:   <input class='box' type='password' id='password' name='password' /> টাকা</td>
                    </tr>
                     <tr>
                        <td>অফিস / সেলস স্টোর / পাওয়ার স্টোর</td>
                        <td>: <input class='box' type='text' id='officesearch' name='officesearch' />
                        </td>            
                    </tr>
                    <tr>
                        <td>দায়িত্ব / পোস্ট</td>
                        <td>: <input class='box' type='text' id='officesearch' name='officesearch' />
                        </td>            
                    </tr>
                    <tr>
                        <td>যোগদানের তারিখ</td>
                        <td>: <input class='box' type='text' id='date' placeholder='Date' name='date' value=''/>
                        </td>            
                    </tr>"; }
                    if($input == 'proprietor')
                    {
                        echo "<tr>
                        <td>পাওয়ার স্টোরের নাম</td>
                        <td >:  <select  class='box' name='powerStore_name' style='height:20px;'onchange='showAccountNo(this.value)'>";
                                showPowerHeads();
                         echo "</select>	
                        </td>
                        <td>পাওয়ার স্টোরের একাউন্ট নং </td>
                        <td>:  <input class='box' type='text' readonly='' id='powerStore_accountNumber' name='powerStore_accountNumber' /></td>	
                    </tr>";
                    }
                    echo "<tr>                    
                        <td colspan='4' style='padding-left: 250px; '>";
                    if($_POST['submit'])
                            {
                            echo "<a href='$pass_message'>পরবর্তী ধাপে যেতে ক্লিক করুন</a>";
                            }
                    else echo "<input class='btn' style ='font-size: 12px;' type='submit' name='submit' value='সেভ করুন' />";
                    echo "</td>                           
                    </tr>             
                </table>";        
                ?>
            </form>
        </div>
    </div>      
</div> 
<?php
include 'includes/footer.php';
?>