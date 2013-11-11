<?php
error_reporting(0); 
include_once 'includes/ConnectDB.inc';
include_once 'includes/header.php'; 
$input= $_GET['id'];
$arrayAccountType = array('employee' => 'কর্মচারীর', 'customer' => 'কাস্টমারের', 'proprietor' => 'প্রোপ্রাইটারের');
$showAccountType  = $arrayAccountType[$input];
?>
<title>আপডেট অ্যাকাউন্ট</title>
<style type="text/css">@import "css/style.css";</style>
<script type="text/javascript" src="javascripts/area.js"></script>
<script type="text/javascript" src="javascripts/external/mootools.js"></script>
<script type="text/javascript" src="javascripts/dg-filter.js"></script>
<script>
function goBack()
    {
        window.history.go(-1);
    }
</script>
<script type="text/javascript">
    function infoFromThana()
    {
        var type = <?php echo $g_type;?>;
        var xmlhttp;
        if (window.XMLHttpRequest) xmlhttp=new XMLHttpRequest();
        else xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) 
                document.getElementById('office').innerHTML=xmlhttp.responseText;
        }
        var division_id, district_id, thana_id;
        division_id = document.getElementById('division_id').value;
        district_id = document.getElementById('district_id').value;
        thana_id = document.getElementById('thana_id').value;
        xmlhttp.open("GET","includes/updateOfficeFromThana.php?dsd="+district_id+"&dvd="+division_id+"&ttid="+thana_id+"&type="+type,true);
        xmlhttp.send();
    }
</script>
<div class="column6">
    <div class="main_text_box">      
        <div style="padding-left: 110px;"><a onclick="goBack();" style="cursor: pointer;"><b><u>ফিরে যান</u></b></a></br>
        <div style="border: 1px solid grey;">
            <table  style=" width: 100%; margin-bottom: 10px;" > 
                    <tr><th style="text-align: center; background-image: radial-gradient(circle farthest-corner at center top , #FFFFFF 0%, #0883FF 100%);height: 45px;padding-bottom: 5px;padding-top: 5px;" colspan="2" ><h1>আপডেট <?php echo $showAccountType;?> অ্যাকাউন্ট</h1></th></tr>
            </table>
            <fieldset id="fieldset_style" style=" width: 90% !important; margin-left: 30px !important;" >
                <?php
                if($input == 'customer' || $input=='employee') {
                    include_once 'includes/areaSearch.php';
                    getArea("infoFromThana()");
                    ?>
<input type="hidden" id="method" value="infoFromThana()">
    সার্চ/খুঁজুন:  <input type="text" id="search_box_filter">
                <?php }?>
    <span id="office">
        <br/><br />
        <div>
            <table id="office_info_filter" border="1" align="center" width= 99%" cellpadding="5px" cellspacing="0px">
                <thead>
                    <tr align="left" id="table_row_odd">
                        <th><?php echo $showAccountType." নাম"; ?></th>
                        <th><?php echo $showAccountType."  অ্যাকাউন্ট নাম্বার"; ?></th>
                        <th><?php echo $showAccountType." ইমেইল"; ?></th>
                        <?php if($input == 'employee') {?>
                        <th><?php echo $showAccountType." মোবাইল নং"; ?></th>
                        <th><?php echo "অফিসের নাম"; ?></th>
                        <?php } elseif ($input == 'proprietor') {?>
                        <th><?php echo "হেড পাওয়ারস্টোরের নাম"; ?></th>
                        <?php } else {?>
                        <th><?php echo $showAccountType." মোবাইল নং"; ?></th>
                        <th><?php echo " থানা"; ?></th>
                        <?php }?>
                        <th><?php echo "করনীয়"; ?></th>
                    </tr>
                </thead>
                <tbody>                    
                    <?php
                    if($input== 'proprietor')
                    {
                    $sql_officeTable = "SELECT * FROM cfs_user, proprietor_account WHERE user_type = 'owner'";
                    $rs = mysql_query($sql_officeTable);
                    }
                    else{
                    $sql_officeTable = "SELECT * from ".$dbname.".office WHERE office_type <> 'pwr_head' ORDER BY office_name ASC";
                    $rs = mysql_query($sql_officeTable);
                    }
                    //echo mysql_num_rows($rs);
                    while ($row_officeNcontact = mysql_fetch_array($rs)) {
                        $db_offName = $row_officeNcontact['office_name'];
                        $db_offNumber = $row_officeNcontact['office_number'];
                        $db_offAN = $row_officeNcontact['account_number'];
                        $db_offAddress = $row_officeNcontact['office_details_address'];
                        $db_offID = $row_officeNcontact['idOffice'];
                        echo "<tr>";
                        echo "<td>$db_offName</td>";
                        echo "<td>$db_offNumber</td>";
                        echo "<td>$db_offAN</td>";
                        echo "<td>$db_offAddress</td>";
                        $v = base64_encode($db_offID);
                        echo "<td><a href='update_account.php?id=$v&type=$g_type'>আপডেট</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>                        
        </div>
    </span>          
</fieldset>
        </div>
            </div>
    </div>
</div>

<script type="text/javascript">
    var filter = new DG.Filter({
        filterField : $('search_box_filter'),
        filterEl : $('office_info_filter')
    });
</script>
<?php include_once 'includes/footer.php'; ?>