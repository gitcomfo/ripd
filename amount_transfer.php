<?php
error_reporting(0);
include 'includes/ConnectDB.inc';
include_once 'includes/header.php';
include './includes/connectionPDO.php';

$sql_mod_ins= $conn->prepare("INSERT INTO security_modules (module_name,module_desc) VALUES (?, ?);");
$sql_mod_sel = $conn->prepare("SELECT * FROM security_modules");
?>
<?php
$flag = 'false';
function showMessage($flag, $msg) {
    if (!empty($msg)) {
        if ($flag == 'true') {
            echo '<tr><td colspan="2" height="30px" style="text-align:center;"><b><span style="color:green;font-size:20px;">' . $msg . '</b></td></tr>';
        } else {
            echo '<tr><td colspan="2" height="30px" style="text-align:center;"><b><span style="color:red;font-size:20px;"><blink>' . $msg . '</blink></b></td></tr>';
        }
    }
}
 if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['amountTransForm'])) {
    $p_modname = $_POST ['new_module'];
    $p_moddes = $_POST ['module_des'];
    $mod_ins = $sql_mod_ins->execute(array($p_modname,$p_moddes));
    if ($mod_ins==1) {
        $msg = "আপনি সফলভাবে " . $p_modname . " নামে নতুন মডিউলটি তৈরি করেছেন";
        $flag = 'true';
    } else {
        $msg = "দুঃখিত, আবার চেষ্টা করুন";
        $flag = 'false';
    }
}
?>

<title>ব্যাক্তিগত অ্যামাউন্ট ট্রান্সফার</title>
<style type="text/css">@import "css/bush.css";</style>
  <script type="text/javascript">
 function getPassword()
 {
        var acc = document.getElementById('accountNo').value; 
        var xmlhttp;
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
            document.getElementById("passwordbox").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","includes/amount_transfer_with_paswrd.php?accountno="+acc,true);
xmlhttp.send();
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
function checkAmount(checkvalue)
{
    var amount = document.getElementById('amount1').value;
    if(amount != checkvalue) 
        {
            document.getElementById('amount2').focus();
            document.getElementById('errormsg').innerHTML = "পরিমান সঠিক হয় নি";
        }
        else{document.getElementById('errormsg').innerHTML="";  document.getElementById('submit').disabled= false;  }
}

function checkPass(passvalue)
{
    var password = document.getElementById('password1').value;
    if(password != passvalue)
        {
            document.getElementById('password2').focus();
            document.getElementById('passcheck').style.color='red';
            document.getElementById('passcheck').innerHTML = "পাসওয়ার্ড সঠিক হয় নি";
        }
        else{
            document.getElementById('passcheck').style.color='green';
            document.getElementById('passcheck').innerHTML="OK";
            document.getElementById('submit').disabled= false;
        }
}
function checkAndSubmit()
{
//    var msg = document.getElementById('showError').innerText;
//        if(msg == '0')
//        {
            document.getElementById('amountTransForm').submit();
//        }
//        else{
//            document.getElementById('password1').value="";
//            document.getElementById('password2').value="";
//            document.getElementById('password1').focus();
//        }
}
function  checkCorrectPass()
{
   var pass = document.getElementById('password1').value;
   var acc = document.getElementById('accountNo').value;
var xmlhttp;
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
    document.getElementById("showError").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","includes/matchPassword.php?acc="+acc+"&pass="+pass,true);
xmlhttp.send();
}
 </script>
 
<div style="font-size: 14px;">
    <form  action="" id="amountTransForm" method="post" style="font-family: SolaimanLipi !important;">
            <div style="padding-top: 10px;">    
                <div style="padding-left: 110px; width: 58%; float: left"><a href="index.php?apps=PROF"><b>ফিরে যান</b></a></div>
            </div>
            <table class="formstyle" style =" width:78%;font-family: SolaimanLipi !important;">        
                <tr>
                    <th colspan="2">ব্যাক্তিগত অ্যামাউন্ট ট্রান্সফার</th>
                </tr>
                <?php showMessage($flag, $msg);?>
                <tr>
                    <td style="text-align: right; width: 30%;">অ্যাকাউন্ট নং</td>
                    <td>: <input  class="box" type="text" name="accountNo"  id="accountNo" value=""/> <em>(ইংরেজিতে লিখুন)</em></td>   
                </tr>
                <tr>
                    <td style="text-align: right; width: 30%;">টাকার পরিমান</td>
                    <td>: <input  class="box" type="text" name="amount1"  id="amount1"  onkeypress="return checkIt(event)" /> টাকা </td>   
                </tr>
                 <tr>
                    <td style="text-align: right; width: 30%;">টাকার পরিমান (পুনরায়)</td>
                    <td>: <input  class="box" type="text" name="amount2"  id="amount2"  onkeypress="return checkIt(event)" onblur="checkAmount(this.value);"/> টাকা <span id="errormsg"></span></td>   
                </tr>
                <tr>
                    <td style="text-align: right; width: 30%;">ট্রান্সফারের কারন</td>
                    <td> <textarea  class="box" type="text" name="trans_des"  id="trans_des" value=""></textarea></td>   
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center"></br><input type="button" class="btn" name="submit" id="submit" value="সেভ" onclick="getPassword();">&nbsp;<input type="reset" class="btn" name="reset" value="রিসেট"></td>
                </tr>
                    <tr>
                    <td colspan="2" id="passwordbox"></td>
                </tr>
            </table>
        </form>
    </div>
    <?php
include_once 'includes/footer.php';
?> 