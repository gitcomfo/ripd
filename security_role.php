<?php
error_reporting(0);
include 'includes/ConnectDB.inc';
include_once 'includes/header.php';
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

if (isset($_POST['submit']) && ($_GET['action'] == 'new')) {
    $division = $_POST ['new_division'];
    $sql = "insert into division (division_name)values('$division')";
    if (mysql_query($sql)) {
        $msg = "আপনি সফলভাবে " . $division . " নামে নতুন বিভাগটি তৈরি করেছেন";
        $flag = 'true';
    } else {
        $msg = "দুঃখিত, আবার চেষ্টা করুন";
        $flag = 'false';
    }
}
if (isset($_POST['submit']) && ($_GET['action'] == 'edit')) {
    $division_id = $_GET['id'];
    $division_name = $_POST ['division_name'];
    $sql = "update division set division_name='$division_name' where idDivision='$division_id'";
    if (mysql_query($sql)) {
        $msg = "আপনি সফলভাবে " . $division_name . " বিভাগ নামে তথ্য পরিবর্তন করেছেন";
        $flag = 'true';
    } else {
        $msg = "দুঃখিত, আবার চেষ্টা করুন";
        $flag = 'false';
    }
}
?>

<title>রোল / অনুমতি</title>
<link rel="stylesheet" href="css/tinybox.css" type="text/css" media="screen" charset="utf-8"/>
<script src="javascripts/tinybox.js" type="text/javascript"></script>
  <script type="text/javascript">
 function editRole(id)
	{ TINY.box.show({iframe:'editRole.php?gradeid='+id,width:500,height:280,opacity:30,topsplit:3,animate:true,close:true,maskid:'bluemask',maskopacity:50,boxid:'success'}); }
 </script>
<script type="text/javascript">
    function  isBlankDivision_new()
    {
        var y=document.forms["division"]["division_name_new"].value;
        if (y == null || y == "")
        {
            alert("বিভাগের নাম পূরন করুন");
            return false;
        }
    }
    function isBlankDivision_edit()
    {
        var x=document.forms["division"]["division_name_edit"].value;
        if (x== null || x== "")
        {
            alert("বিভাগের নাম পূরন করুন");
            return false;
        }
       
    }
</script>
<style type="text/css">@import "css/bush.css";</style>
    <?php
if ($_GET['action'] == 'list') {
    ?>
    <div style="padding-top: 10px;font-size: 14px;">    
        <div style="padding-left: 110px; width: 62%; float: left"><a href="index.php?apps=COMM"><b>ফিরে যান</b></a></div>
        <div><a href="security_role.php"> নতুন রোল </a>&nbsp;&nbsp;<a href="security_role.php?action=list">রোল লিস্ট</a></div>
    </div>
<div style="font-size: 14px;font-family: SolaimanLipi !important;">
        <form method="POST">
            <table class="formstyle" style =" width:78%;font-family: SolaimanLipi !important;" >
                <tr>
                    <th>রোল লিস্ট</th>
                </tr>
                <tr>
                    <td>
                        <table style="width: 100%;padding-right: 12px;">                         
                            <tr id = "table_row_odd">
                                <td style="background-color: #89C2FA; width: 50%;text-align: center;" >রোলের নাম</td>
                                <td style="background-color: #89C2FA; width: 50%;text-align: center;">করনীয়</td>
                            </tr>
                            <?php
                            $result = mysql_query("select * from division");
                            while ($row = mysql_fetch_array($result)) {
                                $division_id = $row['idDivision'];
                                $division_name = $row['division_name'];
                                echo "  <tr>
                                <td>$division_name</td>
                               <td><a onclick='editRole($gradid)' style='cursor:pointer;color:blue;'><u>এডিট করুন</u></a></td>  
                            </tr>";
                            }
                            ?>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php
} else {
    ?>
<div style="font-size: 14px;">
    <form  action="" onsubmit="return isBlankDivision_new()" method="post" style="font-family: SolaimanLipi !important;">
            <div style="padding-top: 10px;">    
                <div style="padding-left: 110px; width: 62%; float: left"><a href="index.php?apps=COMM"><b>ফিরে যান</b></a></div>
                <div style=" float: left" ><a href="security_role.php"> নতুন রোল </a>&nbsp;&nbsp;<a href="security_role.php?action=list">রোল লিস্ট</a></div>
            </div>
            <table class="formstyle" style =" width:78%;font-family: SolaimanLipi !important;">        
                <tr>
                    <th colspan="2">নতুন রোল</th>
                </tr>
                <?php
                showMessage($flag, $msg);
                ?>
                <tr>
                    <td style="text-align: center; width: 50%;">রোলের নাম</td>
                    <td>: <input  class="box" type="text" name="new_module"  id="new_module" value=""/></td>   
                </tr>
                <tr>
                    <td style="text-align: center; width: 50%;">রোলের বর্ণনা</td>
                    <td> <textarea  class="box" type="text" name="module_des"  id="module_des" value=""></textarea></td>   
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center"></br><input type="submit" class="btn" name="submit" value="সেভ">&nbsp;<input type="reset" class="btn" name="reset" value="রিসেট"></td>
                </tr>
            </table>
        </form>
    </div>
   

    <?php
}
include_once 'includes/footer.php';
?> 
