<?php
error_reporting(0);
include_once 'includes/MiscFunctions.php';
include 'includes/db.php';
include 'includes/ConnectDB.inc';
include 'includes/header.php';
$loginUSERname = $_SESSION['UserID'];
//echo "$loginUSERname";

$queryemp = mysql_query("SELECT * FROM employee WHERE cfs_user_idUser = ANY(SELECT idUser FROM cfs_user WHERE user_name = '$loginUSERname');");
$emprow = mysql_fetch_assoc($queryemp);
$db_onsid = $emprow['emp_ons_id'];
$queryonsr = mysql_query("SELECT * FROM ons_relation WHERE idons_relation ='$db_onsid' ;");
$onsrow = mysql_fetch_assoc($queryonsr);
$db_catagory = $onsrow['catagory'];
$db_id = $onsrow['add_ons_id'];
switch ($db_catagory) {
    case 'office' :
        $offquery = mysql_query("SELECT * FROM office WHERE idOffice= '$db_id';");
        $offrow = mysql_fetch_assoc($offquery);
        $db_offname = $offrow['office_name'];
        break;

    case 's_store' :
        $salesquery = mysql_query("SELECT * FROM sales_store WHERE idSales_store=$db_id");
        $salesrow = mysql_fetch_assoc($salesquery);
        $db_offname = $salesrow['salesStore_name'];
        break;
}

if (isset($_POST['submit_selected'])) {
    print_r($_POST);
    $inserted_ons_catagory = $_POST['ons_catagory'];
    $inserted_ons_id = $_POST['ons_id'];
    $selected_post_id = $_POST['post_id'];
    $inserted_post_number = $_POST['post_number'];
    
    $sql_insert_post_number = "INSERT INTO post_in_ons (number_of_post, free_post, post_onstype, used_post, post_onsid, Post_idPost) 
                Values('$inserted_post_number', '$inserted_post_number', '$inserted_ons_catagory', '', '$inserted_ons_id', '$selected_post_id')";
    if (mysql_query($sql_insert_post_number)) {
        echo " Query is successful in post_in_ons";
    } else {
        echo "I am failed";
    }
} elseif (isset($_POST['submit_new'])) {
    print_r($_POST);
    $inserted_ons_catagory = $_POST['ons_catagory'];
    $inserted_ons_id = $_POST['ons_id'];
    $inserted_post_name = $_POST['post_name'];
    $inserted_post_number = $_POST['post_number'];
    $inserted_post_responsibility = $_POST['responsibility'];

    $sql_insert_post = "INSERT INTO post (post_name, responsibility_desc) values('$inserted_post_name', '$inserted_post_responsibility')";
    if (mysql_query($sql_insert_post)) {
        echo "I am successful";
        $inserted_post_id = mysql_insert_id();
        echo $inserted_post_id . " ------";
        $sql_insert_post_number = "INSERT INTO post_in_ons (number_of_post, free_post, post_onstype, used_post, post_onsid, Post_idPost) 
                Values('$inserted_post_number', '$inserted_post_number', '$inserted_ons_catagory', '', '$inserted_ons_id', '$inserted_post_id')";
        if (mysql_query($sql_insert_post_number)) {
            echo " Query is successful in post_in_ons";
        }
    } else {
        echo "I am failed";
    }
}
?>
<title>ক্রিয়েট পোস্ট</title>
<style type="text/css"> @import "css/bush.css";</style>
<script type="text/javascript" src="javascripts/area.js"></script>
<script type="text/javascript" src="javascripts/external/mootools.js"></script>
<script language="JavaScript" type="text/javascript" src="javascripts/postsearch.js"></script>
<script type="text/javascript" src="javascripts/dg-filter.js"></script>
<script>
    function showResponsibility(postid)
    {
       
            if(window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest();
            }
            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById("responsibility").innerHTML=xmlhttp.responseText;
                }
            }		
            xmlhttp.open("GET","showResponsibility.php?post_id="+postid,true);
            xmlhttp.send();
    }
</script>  

<div class="column6">
    <div class="main_text_box">
        <div style="padding-left: 110px;"><a href="index.php?apps=HRE"><b>ফিরে যান</b></a></div>
        <div class="domtab" style="font-family: SolaimanLipi !important;">
            <ul class="domtabs">
                <li class="current"><a href="#01" style="width: 200px !important">সিলেক্ট পোস্ট এন্ড পোস্ট সংখ্যা</a></li> 
                <li class="current"><a href="#02" style="width: 200px !important">ক্রিয়েট নিউ পোস্ট এন্ড সংখ্যা</a></li> 
                <li class="current"><a href="#03">পোস্ট লিস্ট</a></li>
            </ul>
        </div> 

        <div>
            <h2><a name="01" id="01"></a></h2><br/>
            <form method="POST" onsubmit="" name="" action="">	
                <table  class="formstyle" style="font-family: SolaimanLipi !important;">          
                    <tr><th colspan="2" style="text-align: center;"> সিলেক্ট পোস্ট এন্ড পোস্ট সংখ্যা </th></tr>
                    <tr>
                        <td>অফিস / সেলস স্টোর / পাওয়ার স্টোর</td>
                        <td>: 
                            <input class="box" type="text" id="ons_name" name="ons_name" value="<?php echo $db_offname; ?>" readonly=""/>
                            <input type="hidden" id="ons_id" name="ons_id" value="<?php echo $db_id; ?>"/>
                            <input type="hidden" id="ons_catagory" name="ons_catagory" value="<?php echo $db_catagory; ?>"/>                            
                        </td>            
                    </tr>
                    <tr>
                        <td>সিলেক্ট পোস্ট নাম</td>
                        <td>:  <select class="box7" type="text" id="post_id" name="post_id" onchange="showResponsibility(this.value)" />
                    <option value="0">-সিলেক্ট পোস্ট-</option>
                    <?php
                    $post_sql = mysql_query("SELECT * FROM post ORDER BY post_name ASC");
                    while ($post_rows = mysql_fetch_array($post_sql)) {
                        $db_post_id = $post_rows['idPost'];
                        $db_post_name = $post_rows['post_name'];
                        echo'<option style="width: 96%" value=' . $db_post_id . '>' . $db_post_name . '</option>';
                    }
                    ?>
                    </select></td>                                  
                    </tr>                    
                    <tr>
                        <td>পোস্টের দায়িত্ব</td>
                        <td> <textarea id='responsibility' name='responsibility'  style='width: 70%;'></textarea></td>                                  
                    </tr>
                    <tr>
                        <td>নাম্বার অফ পোস্ট</td>
                        <td>:   <input class="box" type="text" id="post_number" name="post_number" onkeypress=' return numbersonly(event)' /> জন</td>                                  
                    </tr>
                    <tr>                    
                        <td colspan="2" style="padding-left: 250px; " ><input class="btn" style =" font-size: 12px; " type="submit" name="submit_selected" value="সেভ করুন" />
                            <input class="btn" style =" font-size: 12px" type="reset" name="reset" value="রিসেট করুন" /></td>                           
                    </tr>    
                </table>
                </fieldset>
            </form>
        </div>

        <div>
            <h2><a name="02" id="02"></a></h2><br/>
            <form method="POST" onsubmit="" name="" action="">	
                <table  class="formstyle" style="font-family: SolaimanLipi !important;">          
                    <tr><th colspan="2" style="text-align: center;">ক্রিয়েট নিউ পোস্ট এন্ড সংখ্যা</th></tr>
                    <tr>
                        <td>অফিস / সেলস স্টোর / পাওয়ার স্টোর</td>
                        <td>: 
                            <input class="box" type="text" id="ons_name" name="ons_name" value="<?php echo $db_offname; ?>" readonly=""/>
                            <input type="hidden" id="ons_id" name="ons_id" value="<?php echo $db_id; ?>"/>
                            <input type="hidden" id="ons_catagory" name="ons_catagory" value="<?php echo $db_catagory; ?>"/>

                        </td>            
                    </tr>
                    <tr>
                        <td>পোস্ট-এর নাম</td>
                        <td>:   <input class="box" type="text" id="post_name" name="post_name" value=""/></td>                                  
                    </tr>
                    <tr>
                        <td>পোস্টের দায়িত্ব</td>
                        <td>  <textarea id="responsibility" name="responsibility"  style="width: 70%;"></textarea></td>                                  
                    </tr>
                    <tr>
                        <td>নাম্বার অফ পোস্ট</td>
                        <td>:   <input class="box" type="text" id="post_number" name="post_number" onkeypress=' return numbersonly(event)' /> জন</td>                                  
                    </tr>
                    <tr>                    
                        <td colspan="2" style="padding-left: 250px; " ><input class="btn" style =" font-size: 12px; " type="submit" name="submit_new" value="সেভ করুন" />
                            <input class="btn" style =" font-size: 12px" type="reset" name="reset" value="রিসেট করুন" /></td>                           
                    </tr>    
                </table>
                </fieldset>
            </form>
        </div>

        <div>
            <h2><a name="03" id="03"></a></h2><br/>
            <form method="POST" onsubmit="" name="frm" action="">	
                <table  class="formstyle">          
                    <tr><th colspan="2" style="text-align: center;">ভিউ পোস্ট</th></tr>
                    <td colspan="6">
                        <span id="office2">
                            <table  style="border: black solid 1px;" align="center" width= 90%" cellpadding="1px" cellspacing="1px">
                                <thead>
                                    <tr><td colspan="4" style="color: sienna; text-align: center; font-size: 20px;"><?php echo $db_offname; ?></td></tr>
                                    <tr style="border: black solid 1px;">
                                        <th>পোস্ট</th>
                                        <th>নাম্বার অফ পোস্ট</th>
                                        <th>দায়িত্ব</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql_select_post_in_ons = "SELECT * FROM post, post_in_ons where post_onstype='$db_catagory' And post_onsid='$db_id' AND Post_idPost = idPost";
//$db_slNo = 0;
                                    $selected_post_in_ons = mysql_query($sql_select_post_in_ons);

                                    while ($rows_post_in_ons = mysql_fetch_array($selected_post_in_ons)) {
                                        $db_selected_post_name = $rows_post_in_ons['post_name'];
                                        $db_selected_post_number = $rows_post_in_ons['number_of_post'];
                                        $db_selected_post_responsibility = $rows_post_in_ons['responsibility_desc'];
                                        echo "<tr style='border: black solid 1px;'>";
                                        echo "<td>$db_selected_post_name</td>";
                                        echo "<td>$db_selected_post_responsibility</td>";
                                        echo "<td>$db_selected_post_number</td>";
                                        echo "<td><a href='#'>এডিট করুন</a></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </span>  
                    </td>
                    </tr>    
                </table>
            </form>
        </div>                 
    </div>
    <?php
    include 'includes/footer.php';
    ?>