<?php
error_reporting(0);
include_once 'includes/ConnectDB.inc';
include_once 'includes/header.php';
include_once 'includes/MiscFunctions.php';
$x= $_GET['id'];
$proprietorID= base64_decode($x);
// ************************** update query ***********************************
if (isset($_POST['submit1'])) {
    //$proprietorTableID = $_POST['proprietorID'];
    $prop_father_name = $_POST['prop_father_name'];
    $prop_motherName = $_POST['prop_motherName'];
    $prop_spouseName = $_POST['prop_spouseName'];
    $prop_occupation = $_POST['prop_occupation'];
    $prop_religion = $_POST['prop_religion'];
    $prop_natonality = $_POST['prop_natonality'];
    $prop_nationalID_no = $_POST['prop_nationalID_no'];
    $prop_passportID_no = $_POST['prop_passportID_no'];
    $prop_birth_certificate_no = $_POST['prop_birth_certificate_no'];
    $dob_day = $_POST['date'];
    $dob_month = $_POST['month'];
    $dob_year = $_POST['year'];
    $dob = $dob_year . "-" . $dob_month . "-" . $dob_day;
    // picture, sign, finger print
    $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
    $extension = end(explode(".", $_FILES["image"]["name"]));
    $image_name = "picture" . "_" . $_FILES["image"]["name"];
    $image_path = "pic/" . $image_name;
    if (($_FILES["image"]["size"] < 999999999999) && in_array($extension, $allowedExts)) {
        move_uploaded_file($_FILES["image"]["tmp_name"], "pic/" . $image_name);
    } else {
        echo "Invalid file format.";
    }

    $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
    $extension = end(explode(".", $_FILES["scanDoc_signature"]["name"]));
    $sign_name = "signature" . "_" . $_FILES["scanDoc_signature"]["name"];
    $sing_path = "sign/" . $sign_name;
    if (($_FILES["scanDoc_signature"]["size"] < 999999999999) && in_array($extension, $allowedExts)) {
        move_uploaded_file($_FILES["scanDoc_signature"]["tmp_name"], "sign/" . $sign_name);
    } else {
        echo "Invalid file format.";
    }

    $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
    $extension = end(explode(".", $_FILES["scanDoc_finger_print"]["name"]));
    $finger_name = "fingerprint" . "_" . $_FILES["scanDoc_finger_print"]["name"];
    $finger_path = "fingerprints/" . $finger_name;
    if (($_FILES["scanDoc_finger_print"]["size"] < 999999999999) && in_array($extension, $allowedExts)) {
        move_uploaded_file($_FILES["scanDoc_finger_print"]["tmp_name"], "fingerprints/" . $finger_name);
    } else {
        echo "Invalid file format.";
    }
    $sql_update_proprietor = mysql_query("UPDATE $dbname.proprietor_account SET prop_father_name='$prop_father_name', prop_motherName='$prop_motherName', prop_spouseName='$prop_spouseName', 
                                                        prop_occupation='$prop_occupation', prop_religion='$prop_religion', prop_natonality='$prop_natonality', prop_nationalID_no='$prop_nationalID_no', 
                                                        prop_passportID_no='$prop_passportID_no', prop_date_of_birth='$dob', prop_birth_certificate_no='$prop_birth_certificate_no',  
                                                        prop_scanDoc_picture='$image_path', prop_scanDoc_signature='$sing_path',  prop_scanDoc_finger_print='$finger_path'
                                                        WHERE idpropaccount = $proprietorID");
      
    //proprietor's Current Address Infromation
    $p_Village_idVillage = $_POST['village_id1'];
    $p_Post_idPost = $_POST['post_id1'];
    $p_Thana_idThana = $_POST['thana_id1'];
    $p_house = $_POST['p_house'];
    $p_house_no = $_POST['p_house_no'];
    $p_road = $_POST['p_road'];
    $p_post_code = $_POST['p_post_code'];
    //proprietor's Permanent Address information
    $pp_Village_idVillage = $_POST['village_id2'];
    $pp_Post_idPost = $_POST['post_id2'];
    $pp_Thana_idThana = $_POST['thana_id2'];
    $pp_house = $_POST['pp_house'];
    $pp_house_no = $_POST['pp_house_no'];
    $pp_road = $_POST['pp_road'];
    $pp_post_code = $_POST['pp_post_code'];    
   //address_type=Present
    $sql_p_insert_current_address = mysql_query("UPDATE $dbname.address 
                                    SET house='$p_house', house_no='$p_house_no', road='$p_road', post_code='$p_post_code',Thana_idThana='$p_Thana_idThana', post_idpost='$p_Post_idPost', village_idvillage='$p_Village_idVillage'  WHERE adrs_cepng_id= AND address_whom='pwr' AND address_type='Present' ");
    //address_type=Permanent
    $sql_pp_insert_permanent_address = mysql_query("UPDATE $dbname.address 
                                    SET house='$p_house', house_no='$p_house_no', road='$p_road', post_code='$p_post_code',Thana_idThana='$p_Thana_idThana', post_idpost='$p_Post_idPost', village_idvillage='$p_Village_idVillage'  WHERE adrs_cepng_id= AND address_whom='pwr' AND address_type='Permanent ");

    if ($sql_update_proprietor && $sql_p_insert_current_address && $sql_pp_insert_permanent_address) {
        $msg = "তথ্য সংরক্ষিত হয়েছে";
    } else {
        $msg = "ভুল হয়েছে";
    }
}elseif (isset($_POST['submit2'])) {
    $nominee_name = $_POST['nominee_name'];
    $nominee_age = $_POST['nominee_age'];
    $nominee_relation = $_POST['nominee_relation'];
    $nominee_mobile = $_POST['nominee_mobile'];
    $nominee_email = $_POST['nominee_email'];
    $nominee_national_ID = $_POST['nominee_national_ID'];
    $nominee_passport_ID = $_POST['nominee_passport_ID'];
    //Insert Into Nominee table
    $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
    $extension = end(explode(".", $_FILES["nominee_picture"]["name"]));
    $image_name = "picture" . "_" . $_FILES["nominee_picture"]["name"];
    $image_path = "pic/" . $image_name;
    if (($_FILES["nominee_picture"]["size"] < 999999999999) && in_array($extension, $allowedExts)) {
        move_uploaded_file($_FILES["nominee_picture"]["tmp_name"], "pic/" . $image_name);
    } else {
        echo "Invalid file format.";
    }

    $sql_nominee = mysql_query("INSERT INTO $dbname.nominee(nominee_name, nominee_relation, nominee_mobile,
                                       nominee_email, nominee_national_ID, nominee_age, nominee_passport_ID, nominee_picture,cep_type, cep_nominee_id) 
                                       VALUES('$nominee_name','$nominee_relation','$nominee_mobile','$nominee_email','$nominee_national_ID',
                                       '$nominee_age','$nominee_passport_ID','$image_path','pwr','$proprietorID')");
    //Current Address Infromation
    $n_Village_idVillage = $_POST['village_id5'];
    $n_Post_idPost = $_POST['post_id5'];
    $n_Thana_idThana = $_POST['thana_id5'];
    $n_house = $_POST['n_house'];
    $n_house_no = $_POST['n_house_no'];
    $n_village = $_POST['n_village'];
    $n_road = $_POST['n_road'];
    $n_post = $_POST['n_post'];
    $n_post_code = $_POST['n_post_code'];
    //Permanent Address information
    $np_Village_idVillage = $_POST['village_id6'];
    $np_Post_idPost = $_POST['post_id6'];
    $np_Thana_idThana = $_POST['thana_id6'];
    $np_house = $_POST['np_house'];
    $np_house_no = $_POST['np_house_no'];
    $np_village = $_POST['np_village'];
    $np_road = $_POST['np_road'];
    $np_post = $_POST['np_post'];
    $np_post_code = $_POST['np_post_code'];
    //nominee address_type=Present
    $sql_n_insert_current_address = mysql_query("INSERT INTO $dbname.address 
                                    (address_type, house, house_no,road, address_whom, post_code,Thana_idThana,  post_idpost, village_idvillage ,adrs_cepng_id)
                                     VALUES ('Present', '$n_house', '$n_house_no', '$n_road', 'nmn', '$n_post_code', '$n_Thana_idThana', '$n_Post_idPost', '$n_Village_idVillage','$proprietorID')");
    //nominee address_type=Permanent
    $sql_np_insert_permanent_address = mysql_query("INSERT INTO $dbname.address 
                                    (address_type, house, house_no, road, address_whom,post_code,Thana_idThana,  post_idpost, village_idvillage ,adrs_cepng_id)
                                     VALUES ('Permanent', '$np_house', '$np_house_no','$np_road', 'nmn',  '$np_post_code','$np_Thana_idThana','$np_Post_idPost', '$np_Village_idVillage','$proprietorID')");

    if ($sql_nominee || $sql_n_insert_current_address || $sql_np_insert_permanent_address) {
        $msg = "তথ্য সংরক্ষিত হয়েছে";
    } else {
        $msg = "ভুল হয়েছে";
    }
} elseif (isset($_POST['submit3'])) {
    //customer education
    $e_ex_name = $_POST['e_ex_name'];
    $e_pass_year = $_POST['e_pass_year'];
    $e_institute = $_POST['e_institute'];
    $e_board = $_POST['e_board'];
    $e_gpa = $_POST['e_gpa'];
    $a = count($e_ex_name);
    for ($i = 0; $i < $a; $i++) {
        $sql_insert_emp_edu = "INSERT INTO " . $dbname . ".`education` ( `exam_name` ,`passing_year` ,`institute_name`,`board`,`gpa`,`education_type`,`cepn_id`) VALUES ('$e_ex_name[$i]', '$e_pass_year[$i]','$e_institute[$i]','$e_board[$i]','$e_gpa[$i]','pwr','$proprietorID');";
        $emp_edu = mysql_query($sql_insert_emp_edu) or exit('query failed: ' . mysql_error());
    }
    //nominee education
    $result = mysql_query("SELECT * FROM $dbname.nominee WHERE cep_type = 'pwr' AND cep_nominee_id=$proprietorID ");
    $nomrow = mysql_fetch_array($result);
    $nomineeID = $nomrow['idNominee'];
    $n_ex_name = $_POST['n_ex_name'];
    $n_pass_year = $_POST['n_pass_year'];
    $n_institute = $_POST['n_institute'];
    $n_board = $_POST['n_board'];
    $n_gpa = $_POST['n_gpa'];
    $b = count($n_ex_name);
    for ($i = 0; $i < $b; $i++) {
        $sql_insert_nom_edu = "INSERT INTO " . $dbname . ".`education` ( `exam_name` ,`passing_year` ,`institute_name`,`board`,`gpa`,`education_type`,`cepn_id`) VALUES ('$n_ex_name[$i]', '$n_pass_year[$i]','$n_institute[$i]','$n_board[$i]','$n_gpa[$i]','nmn','$nomineeID');";
        $nom_edu = mysql_query($sql_insert_nom_edu) or exit('query failed: ' . mysql_error());
    }
    if ($emp_edu || $nom_edu) {
        $msg = "তথ্য সংরক্ষিত হয়েছে";
    } else {
        $msg = "ভুল হয়েছে";
    }
}elseif (isset($_POST['submit4'])) {
    $pathArray = array();
    for ($i = 1; $i < 12; $i++) {
        $scan_document = "";
        $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG", "pdf"); //File Type
        $scanDoc = "scanDoc" . $i;
        $files_sequence = array(1 => "ssc", "nationalID", "hsc", "birth_certificate", "onars", "chairman_cert", "masters", "other");
        $file_name = $files_sequence[$i];
        $t = time();
        $extension = end(explode(".", $_FILES[$scanDoc]['name']));
        $scan_doc_name = $account_number . "_" . $file_name . "_" . $t . "_" . $_FILES[$scanDoc]['name'];
        $scan_doc_path_temp = "images/scan_documents/" . $scan_doc_name;
        if (($_FILES[$scanDoc]['size'] < 999999999999) && in_array($extension, $allowedExts)) {
            move_uploaded_file($_FILES[$scanDoc]['tmp_name'], $scan_doc_path_temp);
            $scan_document = $scan_doc_path_temp;
            $pathArray[$i] = $scan_document;
        } elseif ($_FILES[$scanDoc]['size'] == 0) {
            $pathArray[$i] = NULL;
        } else {
            echo "Invalid file format.</br>";
        }
    }
    $sql_images_scan_doc = mysql_query("INSERT INTO $dbname.ep_certificate_scandoc_extra
                                 (emplo_scanDoc_national_id, emplo_scanDoc_birth_certificate, emplo_scanDoc_chairman_certificate, scanDoc_ssc, scanDoc_hsc, scanDoc_onars, scanDoc_masters, scanDoc_other, emp_type, emp_id)
                                 VALUES('$pathArray[2]', '$pathArray[4]', '$pathArray[6]', '$pathArray[1]', '$pathArray[3]', 
                                 '$pathArray[5]',  '$pathArray[7]', '$pathArray[8]', 'pwr','$proprietorID')");
    if ($sql_images_scan_doc) {
        $msg = "তথ্য সংরক্ষিত হয়েছে";
    } else {
        $msg = "ভুল হয়েছে";
    }
}
elseif (isset($_POST['submit5'])) {
  $p_name = $_POST['name'];
   $p_email = $_POST['email'];
    $p_mobile = $_POST['mobile'];
   $p_cfsid = $_POST['cfsid'];

  $sql_update_cfs = mysql_query("UPDATE cfs_user SET account_name='$p_name', email='$p_email', mobile='$p_mobile' WHERE idUser=$p_cfsid ");
    if ($sql_update_cfs) {
        $msg = "তথ্য সংরক্ষিত হয়েছে";
    } else {
        $msg = "ভুল হয়েছে";
    }
}
?>
<!--######################## select query for show ################################## -->
<?php
     $sql_proprie_sel = mysql_query("SELECT * FROM proprietor_account,cfs_user WHERE idUser=cfs_user_idUser AND  idpropaccount= $proprietorID ");
     $proprietorrow = mysql_fetch_assoc($sql_proprie_sel);
     $db_cfsuserid = $proprietorrow['cfs_user_idUser'];
     $db_proprietorName = $proprietorrow['account_name'];
     $db_proprietorAcc = $proprietorrow['account_number'];
     $db_proprietorMail = $proprietorrow['email'];
     $db_proprietorMob = $proprietorrow['mobile'];
     $db_proprietorFather = $proprietorrow['prop_father_name'];
     $db_proprietorMother = $proprietorrow['prop_motherName'];
     $db_proprietorSpouse = $proprietorrow['prop_spouseName'];
     $db_proprietorOccu = $proprietorrow['prop_occupation'];
     $db_proprietorRel = $proprietorrow['prop_religion'];
     $db_proprietorNation = $proprietorrow['prop_natonality'];
     $db_proprietorNID = $proprietorrow['prop_nationalID_no'];
     $db_proprietorPID = $proprietorrow['prop_passportID_no'];
     $db_proprietorDOB = $proprietorrow['prop_date_of_birth'];
     $db_proprietorDOBID = $proprietorrow['prop_birth_certificate_no'];
     $db_proprietorSig = $proprietorrow['prop_scanDoc_signature'];
     $db_proprietorPic = $proprietorrow['prop_scanDoc_picture'];
     $db_proprietorFP = $proprietorrow['prop_scanDoc_finger_print'];
     
     $sql_proprie_adrs_sel = mysql_query("SELECT * FROM address, division, district, thana, post_office, village WHERE address_whom='pwr' AND adrs_cepng_id=$proprietorID AND address_type='Present'
                                                                    AND village_idvillage=idvillage AND post_idpost=idPost_office AND idDivision = Division_idDivision AND idDistrict= District_idDistrict AND idThana=address.Thana_idThana");
     $presentAddrow = mysql_fetch_assoc($sql_proprie_adrs_sel);
     $preHouse = $presentAddrow['house'];
     $preHouseNo = $presentAddrow['house_no'];
     $preRode = $presentAddrow['road'];
     $prePostCode = $presentAddrow['post_code'];
     $prePostID = $presentAddrow['idPost_office'];
     $prePostName = $presentAddrow['post_offc_name'];
     $preVilID = $presentAddrow['idvillage'];
     $preVilName = $presentAddrow['village_name'];
     $preThanaID = $presentAddrow['idThana'];
     $preThanaName = $presentAddrow['thana_name'];
     $preDisID = $presentAddrow['idDistrict'];
     $preDisName = $presentAddrow['district_name'];
     $preDivID = $presentAddrow['idDivision'];
     $preDivName= $presentAddrow['division_name'];
     
     $sql_proprie_Padrs_sel = mysql_query("SELECT * FROM address, division, district, thana, post_office, village WHERE address_whom='pwr' AND adrs_cepng_id=6 AND address_type='Permanent'
                                                                    AND village_idvillage=idvillage AND post_idpost=idPost_office AND idDivision = Division_idDivision AND idDistrict= District_idDistrict AND idThana=address.Thana_idThana");
     $permenentAddrow = mysql_fetch_assoc($sql_proprie_Padrs_sel);
     $perHouse = $permenentAddrow['house'];
     $perHouseNo = $permenentAddrow['house_no'];
     $perRode = $permenentAddrow['road'];
     $perPostCode = $permenentAddrow['post_code'];
     $perPostID = $permenentAddrow['idPost_office'];
     $perPostName = $permenentAddrow['post_offc_name'];
     $perVilID = $permenentAddrow['idvillage'];
     $perVilName = $permenentAddrow['village_name'];
     $perThanaID = $permenentAddrow['idThana'];
     $perThanaName = $permenentAddrow['thana_name'];
     $perDisID = $permenentAddrow['idDistrict'];
     $perDisName = $permenentAddrow['district_name'];
     $perDivID = $permenentAddrow['idDivision'];
     $perDivName= $permenentAddrow['division_name'];
?>
<title>প্রোপ্রাইটার অ্যাকাউন্ট</title>
<style type="text/css">@import "css/bush.css";</style>
<script type="text/javascript" src="javascripts/division_district_thana.js"></script>
<script type="text/javascript" src="javascripts/jquery-1.4.3.min.js"></script>
<script>
function goBack()
    {
        window.history.go(-1);
    }
</script>
</script>
<script type="text/javascript">    
    $('.del2').live('click',function(){
        $(this).parent().parent().remove();
    });
    $('.add2').live('click',function()
    {var count3 = 2;
        if(count3<6){
            var appendTxt= "<tr> <td><input class='textfield'  name='e_ex_name[]' type='text' /></td><td><input class='box5'  name='e_pass_year[]' type='text' /></td><td><input class='textfield'  name='e_institute[]' type='text' /></td><td><input class='textfield'  name='e_board[]' type='text' /></td><td><input class='box5' name='e_gpa[]' type='text' /></td><td style='padding-right: 3px;'><input type='button' class='del2' /></td><td>&nbsp;<input type='button' class='add2' /></td></tr>";
            $("#container_others32:last").after(appendTxt);          
        }  
        count3 = count3 + 1;        
    })
          
    $('.del3').live('click',function(){
        $(this).parent().parent().remove();
    });
    $('.add3').live('click',function()
    {var count4 = 2;
        if(count4<6){
            var appendTxt= "<tr> <td><input class='textfield'  name='n_ex_name[]' type='text' /></td><td><input class='box5'  name='n_pass_year[]' type='text' /></td><td><input class='textfield'  name='n_institute[]' type='text' /></td><td><input class='textfield'  name='n_board[]' type='text' /></td><td><input class='box5' name='n_gpa[]' type='text' /></td><td style='padding-right: 3px;'><input type='button' class='del3' /></td><td>&nbsp;<input type='button' class='add3' /></td></tr>";
            $("#container_others33:last").after(appendTxt);           
        }  
        count4 = count4 + 1;        
    })    
</script>

<div class="column6">
    <div class="main_text_box">
        <div style="padding-left: 110px;"><a onclick="goBack();" style="cursor: pointer;"><b><u>ফিরে যান</u></b></a></div>
        <div class="domtab">
            <ul class="domtabs">
                <li class="current"><a href="#01">মূল তথ্য</a></li><li class="current"><a href="#02">পারিবারিক তথ্য</a></li><li class="current"><a href="#03">নমিনির তথ্য</a></li><li class="current"><a href="#04">শিক্ষাগত যোগ্যতা</a></li><li class="current"><a href="#05">প্রয়োজনীয় ডকুমেন্টস</a></li>
            </ul>
        </div>
        
         <div>
            <h2><a name="01" id="01"></a></h2><br/>
            <form method="POST" onsubmit="" style=" padding-right: 70px;" enctype="multipart/form-data" action="" id="emp_form1" name="emp_form1">	
                <table  class="formstyle">     
                    <tr><th colspan="4" style="text-align: center" colspan="2"><h1>প্রোপ্রাইটারের ব্যক্তিগত তথ্য</h1></th></tr>
                    <tr><td colspan="4" ></td>
                        <?php
                        if ($msg != "") {
                            echo '<tr> <td colspan="2" style="text-allign: center; color: green; font-size: 15px"><b>' . $msg . '</b></td></tr>';
                        }
                        ?>
                    </tr>
                   <tr>
                        <td>প্রোপ্রাইটারের নাম</td>
                        <td>:   <input class='box' type='text' id='name' name='name' value="<?php echo $db_proprietorName;?>"/>
                            <input type='hidden' name='cfsid' value="<?php echo $db_cfsuserid;?>"/></td>			
                    </tr>
                    <tr>
                        <td >একাউন্ট নাম্বার</td>
                        <td>:   <input class='box' type='text' id='acc_num' name='acc_num' readonly value="<?php echo $db_proprietorAcc;?>"/></td>			
                    </tr>
                    <tr>
                        <td >ই মেইল</td>
                       <td>:   <input class='box' type='text' id='email' name='email' onblur='check(this.value)' value="<?php echo $db_proprietorMail;?>" /> <em>ইংরেজিতে লিখুন</em> <span id='error_msg' style='margin-left: 5px'></span></td>			
                    </tr>
                    <tr>
                        <td >মোবাইল</td>
                        <td>:   <input class='box' type='text' id='mobile' name='mobile' onkeypress=' return numbersonly(event)' value="<?php echo $db_proprietorMob;?>" /> <em>ইংরেজিতে লিখুন</em></td>		
                    </tr>
                    <tr>                    
                        <td colspan="4" style="padding-top: 10px; padding-left: 250px;padding-bottom: 5px; " ><input class="btn" style =" font-size: 12px; " type="submit" name="submit5" value="সেভ করুন" />
                            <input class="btn" style =" font-size: 12px" type="reset" name="reset" value="রিসেট করুন" />
                        </td>                           
                    </tr>
                </table>
                </fieldset>
            </form>
        </div>
        
        <div>
            <h2><a name="02" id="02"></a></h2><br/>
            <form method="POST" onsubmit="" enctype="multipart/form-data" action="" id="prop_form" name="prop_form">	
                <table  class="formstyle">  
                    <tr><th colspan="4" style="text-align: center" colspan="2"><h1>প্রোপ্রাইটারের পারিবারিক তথ্য</h1></th></tr>
                    <tr><td colspan="4" ></td></tr>
                    <?php
                    if ($msg != "") {
                        echo '<tr><td ></td><td colspan="4" style="text-allign: center; color: red; font-size: 15px"><blink>' . $msg . '</blink></td></tr>';
                    }
                    ?>
                    <tr>
                        <td>বাবার নাম </td>
                        <td>:  <input class="box" type="text" id="prop_father_name" name="prop_father_name" value="<?php echo $db_proprietorFather;?>"/></td>	
                        <td>ছবি : </td>
                        <td><img src="<?php echo $db_proprietorPic;?>" width="80px" height="80px"/>&nbsp;<input class="box" type="file" id="image" name="image" style="font-size:10px;"/></td>
                    </tr>
                    <tr>
                        <td >মায়ের নাম </td>
                        <td>:  <input class="box" type="text" id="prop_motherName" name="prop_motherName" value="<?php echo $db_proprietorMother;?>"/></td>
                        <td >স্বাক্ষর: </td>
                        <td><img src="<?php echo $db_proprietorSig;?>" width="80px" height="80px"/>&nbsp;<input class="box" type="file" id="scanDoc_signature" name="scanDoc_signature" style="font-size:10px;"/></td> 
                    </tr>
                    <tr>
                        <td >দম্পতির নাম  </td>
                        <td>:  <input class="box" type="text" id="prop_spouseName" name="prop_spouseName" value="<?php echo $db_proprietorSpouse;?>"/> </td>			
                        <td >টিপসই: </td>
                        <td><img src="<?php echo $db_proprietorFP;?>" width="80px" height="80px"/>&nbsp;<input class="box" type="file" id="scanDoc_finger_print" name="scanDoc_finger_print" style="font-size:10px;"/></td> 
                    </tr>
                    <tr>
                        <td >পেশা</td>
                        <td>:  <input class="box" type="text" id="prop_occupation" name="prop_occupation" value="<?php echo $db_proprietorOccu;?>"/></td>                         
                    </tr>
                    <tr>
                        <td>ধর্ম </td>
                        <td>:  <input  class="box" type="text" id="prop_religion" name="prop_religion" value="<?php echo $db_proprietorRel;?>"/></td>	                             
                    </tr>
                    <tr>
                        <td >জাতীয়তা</td>
                        <td>:  <input class="box" type="text" id="prop_natonality" name="prop_natonality" value="<?php echo $db_proprietorNation;?>"/> </td>			
                    </tr>
                    <tr>
                        <td>জন্মতারিখ</td>
                        <td >:   <input class="box" type="date" name ="dob" value="<?php echo $db_proprietorDOB;?>"/></td>			
                    </tr>
                    <tr>
                    <td >জাতীয় পরিচয়পত্র নং</td>
                    <td>:  <input class="box" type="text" id="prop_nationalID_no" name="prop_nationalID_no" value="<?php echo $db_proprietorNID;?>"/></td>			
                    </tr>
                    <tr>
                        <td >পাসপোর্ট আইডি নং</td>
                        <td>:  <input class="box" type="text" id="prop_passportID_no" name="prop_passportID_no" value="<?php echo $db_proprietorPID;?>"/></td>			
                    </tr>
                    <tr>
                        <td >জন্ম সনদ নং</td>
                        <td>:  <input class="box" type="text" id="prop_birth_certificate_no" name="prop_birth_certificate_no" value="<?php echo $db_proprietorDOBID;?>" /></td>			
                    </tr>   
                    <tr>
                        <td colspan="4" ><hr /></td>
                    </tr>
                    <tr>
                        <td  colspan="2" style =" font-size: 14px"><b>বর্তমান ঠিকানা </b></td>                            
                        <td colspan="2" style =" font-size: 14px"><b> স্থায়ী ঠিকানা   </b></td>
                    </tr>         
                    <tr>
                        <td  >বাড়ির নাম / ফ্ল্যাট নং</td>
                        <td >:   <input class="box" type="text" id="p_house" name="p_house" value="<?php echo $preHouse;?>" /></td>
                        <td  >বাড়ির নাম / ফ্ল্যাট নং</td>
                        <td >:   <input class="box" type="text" id="pp_house" name="pp_house" value="<?php echo $perHouse;?>" /></td>
                    </tr>
                    <tr>
                        <td  >বাড়ি নং</td>
                        <td >:   <input class="box" type="text" id="p_house_no" name="p_house_no" value="<?php echo $preHouseNo;?>" /></td>
                        <td >বাড়ি নং</td>
                        <td>:   <input class="box" type="text" id="pp_house_no" name="pp_house_no" value="<?php echo $perHouseNo;?>" /></td>
                    </tr>
                    <tr>
                        <td >রোড নং</td>
                        <td>:   <input class="box" type="text" id="p_road" name="p_road" value="<?php echo $preRode;?>"/> </td>
                        <td >রোড নং</td>
                        <td>:   <input class="box" type="text" id="pp_road" name="pp_road" value="<?php echo $perRode;?>"/></td>
                    </tr>
                    <tr>
                        <td >পোষ্ট কোড</td>
                        <td>:   <input class="box" type="text" id="p_post_code" name="p_post_code" value="<?php echo $prePostCode;?>"/></td>
                        <td >পোষ্ট কোড</td>
                        <td>:   <input class="box" type="text" id="pp_post_code" name="pp_post_code" value="<?php echo $perPostCode;?>"/></td>
                    </tr> 
                    <tr>
                        <td >বিভাগ</td>
                        <td>:  <input class="box2" value="<?php echo $preDivName;?>"/></br><select class="box2" type="text" id="division_id_1" name="c_division_name" onChange="getDistrict1()" />
                            <option value=1>-বিভাগ-</option>
                            <?php
                            $division_sql = mysql_query("SELECT * FROM " . $dbname . ".division ORDER BY division_name ASC");
                            while ($division_rows = mysql_fetch_array($division_sql)) {
                                $db_division_id = $division_rows['idDivision'];
                                $db_division_name = $division_rows['division_name'];
                                echo'<option style="width: 96%" value=' . $db_division_id . '>' . $db_division_name . '</option>';
                            }
                            ?>
                            </select></td>                                
                        <td >বিভাগ</td>
                        <td>:  <input class="box2" value="<?php echo $perDivName;?>"/></br><select class="box2" type="text" id="division_id_2" name="p_division_name" onChange="getDistrict2()" />
                            <option value=1>-বিভাগ-</option>
                            <?php
                            $division_sql = mysql_query("SELECT * FROM " . $dbname . ".division ORDER BY division_name ASC");
                            while ($division_rows = mysql_fetch_array($division_sql)) {
                                $db_division_id = $division_rows['idDivision'];
                                $db_division_name = $division_rows['division_name'];
                                echo'<option style="width: 96%" value=' . $db_division_id . '>' . $db_division_name . '</option>';
                            }
                            ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td >জেলা</td>
                        <td>: <input class="box2" value="<?php echo $preDisName;?>"/></br><span id="did"></span></td>
                        <td >জেলা</td>
                        <td>: <input class="box2" value="<?php echo $perDisName;?>"/></br><span id="did2"></span></td>
                    </tr>                        
                    <tr>
                        <td>উপজেলা / থানা</td>
                        <td>: <input class="box2" value="<?php echo $preThanaName;?>"/><input class="box2" type="hidden" name="thana_id1" value="<?php echo $preThanaID;?>"/></br><span id="tidd"></span></td>      
                        <td>উপজেলা / থানা</td>
                        <td>: <input class="box2"  value="<?php echo $perThanaName;?>"/><input class="box2" type="hidden" name="thana_id2" value="<?php echo $perThanaID;?>"/></br><span id="tidd2"></span></td>
                    </tr>
                    <tr>
                        <td >পোষ্ট অফিস</td>
                        <td>: <input class="box2"  value="<?php echo $prePostName;?>"/><input class="box2" type="hidden" name="post_id1" value="<?php echo $prePostID;?>"/></br><span id="pidd"></span></td> 
                        <td >পোষ্ট অফিস</td>
                        <td>: <input class="box2" value="<?php echo $perPostName;?>"/><input class="box2" type="hidden" name="post_id2" value="<?php echo $perPostID;?>"/></br><span id="pidd2"></span></td> 
                    </tr>
                    <tr>
                        <td  >গ্রাম</td>
                        <td>: <input class="box2" value="<?php echo $preVilName;?>"/><input class="box2" type="hidden" name="village_id1" value="<?php echo $preVilID;?>"/></br><span id="vidd"></span></td> 
                        <td >গ্রাম </td>
                        <td>: <input class="box2" value="<?php echo $perVilName;?>"/><input class="box2" type="hidden" name="village_id2" value="<?php echo $perVilID;?>"/></br><span id="vidd2"></span></td> 
                    </tr>
                    <tr>                    
                        <td colspan="4" style="padding-left: 250px; " ><input class="btn" style =" font-size: 12px; " type="submit" name="submit1" value="সেভ করুন" />
                            <input class="btn" style =" font-size: 12px" type="reset" name="reset" value="রিসেট করুন" /></td>                           
                    </tr>
                </table>
                </fieldset>
            </form>
        </div>

        <div>
            <h2><a name="03" id="03"></a></h2><br/>
            <form method="POST" onsubmit="" style=" padding-right: 70px;" enctype="multipart/form-data" action="" id="emp_form1" name="emp_form1">	
                <table  class="formstyle">     
                    <tr><th colspan="4" style="text-align: center" colspan="2"><h1>প্রোপ্রাইটারের নমিনির তথ্য</h1></th></tr>
                    <tr><td colspan="4" ></td>
                        <?php
                        if ($msg != "") {
                            echo '<tr> <td colspan="2" style="text-allign: center; color: green; font-size: 15px"><b>' . $msg . '</b></td></tr>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td >নমিনির নাম</td>
                        <td>:  <input class="box" type="text" id="nominee_name" name="nominee_name" /></td>	
                        <td  font-weight="bold" >পাসপোর্ট ছবি </td>
                        <td >:  <input class="box1" type="file" id="nominee_picture" name="nominee_picture" style="font-size:10px;"/></td>
                    </tr>     
                    <tr>
                        <td >বয়স</td>
                        <td>:  <input class="box" type="text" id="nominee_age" name="nominee_age" /></td>
                    </tr>     
                    <tr>
                        <td >সম্পর্ক </td>
                        <td>:  <input class="box" type="text" id="nominee_relation" name="nominee_relation" /> </td>			
                    </tr>
                    <tr>
                        <td >মোবাইল নং</td>
                        <td>:  <input class="box" type="text" id="nominee_mobile" name="nominee_mobile" /></td>			
                    </tr>
                    <tr>
                        <td >ইমেইল</td>
                        <td>:  <input class="box" type="text" id="nominee_email" name="nominee_email" /></td>			
                    </tr>
                    <tr>
                        <td >জাতীয় পরিচয়পত্র নং</td>
                        <td>:  <input class="box" type="text" id="nominee_national_ID" name="nominee_national_ID" /></td>			
                    </tr>
                    <tr>
                        <td >পাসপোর্ট আইডি নং</td>
                        <td>:  <input class="box" type="text" id="nominee_passport_ID" name="nominee_passport_ID" /></td>			
                    </tr> 
                    <tr>
                        <td colspan="4" ><hr /></td>
                    </tr>
                    <tr>	
                        <td  colspan="2" style =" font-size: 14px"><b>বর্তমান ঠিকানা </b></td>                            
                        <td colspan="2" style =" font-size: 14px"><b> স্থায়ী ঠিকানা   </b></td>
                    </tr>
                    <tr>
                        <td  >বাড়ির নাম / ফ্ল্যাট নং</td>
                        <td >:   <input class="box" type="text" id="n_house" name="n_house" /></td>
                        <td  >বাড়ির নাম / ফ্ল্যাট নং</td>
                        <td >:   <input class="box" type="text" id="np_house" name="np_house" /></td>
                    </tr>
                    <tr>
                        <td  >বাড়ি নং</td>
                        <td >:   <input class="box" type="text" id="n_house_no" name="n_house_no" /></td>
                        <td >বাড়ি নং</td>
                        <td>:   <input class="box" type="text" id="np_house_no" name="np_house_no" /></td>
                    </tr>
                    <tr>
                        <td >রোড নং</td>
                        <td>:   <input class="box" type="text" id="n_road" name="n_road" /> </td>
                        <td >রোড নং</td>
                        <td>:   <input class="box" type="text" id="np_road" name="np_road" /></td>
                    </tr>
                    <tr>
                        <td >পোষ্ট কোড</td>
                        <td>:   <input class="box" type="text" id="n_post_code" name="n_post_code" /></td>
                        <td >পোষ্ট কোড</td>
                        <td>:   <input class="box" type="text" id="np_post_code" name="np_post_code" /></td>
                    </tr>
                    <tr>
                        <td >বিভাগ</td>
                        <td>:  <select class="box2" type="text" id="division_id_5" name="n_division_name" onChange="getDistrict5()" />
                    <option value=1>-বিভাগ-</option>
                    <?php
                    $division_sql = mysql_query("SELECT * FROM " . $dbname . ".division ORDER BY division_name ASC");
                    while ($division_rows = mysql_fetch_array($division_sql)) {
                        $db_division_id = $division_rows['idDivision'];
                        $db_division_name = $division_rows['division_name'];
                        echo'<option style="width: 96%" value=' . $db_division_id . '>' . $db_division_name . '</option>';
                    }
                    ?>
                    </select></td>                                
                    <td >বিভাগ</td>
                    <td>:  <select class="box2" type="text" id="division_id_6" name="np_division_name" onChange="getDistrict6()" />
                    <option value=1>-বিভাগ-</option>
                    <?php
                    $division_sql = mysql_query("SELECT * FROM " . $dbname . ".division ORDER BY division_name ASC");
                    while ($division_rows = mysql_fetch_array($division_sql)) {
                        $db_division_id = $division_rows['idDivision'];
                        $db_division_name = $division_rows['division_name'];
                        echo'<option style="width: 96%" value=' . $db_division_id . '>' . $db_division_name . '</option>';
                    }
                    ?>
                    </select></td>
                    </tr>
                    <tr>
                        <td >জেলা</td>
                        <td>: <span id="did5"></span></td>
                        <td >জেলা</td>
                        <td>: <span id="did6"></span></td>
                    </tr>                        
                    <tr>
                        <td>উপজেলা / থানা</td>
                        <td>: <span id="tidd5"></span></td>      
                        <td>উপজেলা / থানা</td>
                        <td>: <span id="tidd6"></span></td>
                    </tr>
                    <tr>
                        <td >পোষ্ট অফিস</td>
                        <td>: <span id="pidd5"></span></td> 
                        <td >পোষ্ট অফিস</td>
                        <td>: <span id="pidd6"></span></td> 
                    </tr>
                    <tr>
                        <td  >গ্রাম</td>
                        <td>: <span id="vidd5"></span></td> 
                        <td >গ্রাম </td>
                        <td>: <span id="vidd6"></span></td> 
                    </tr>
                    <tr>                    
                        <td colspan="4" style="padding-top: 10px; padding-left: 250px;padding-bottom: 5px; " ><input class="btn" style =" font-size: 12px; " type="submit" name="submit2" value="সেভ করুন" />
                            <input class="btn" style =" font-size: 12px" type="reset" name="reset" value="রিসেট করুন" />
                        </td>                           
                    </tr>
                </table>
                </fieldset>
            </form>
        </div>

         <div>
            <h2><a name="04" id="04"></a></h2><br/>
            <form method="POST" onsubmit="">	
                <table  class="formstyle">          
                    <tr><th colspan="4" style="text-align: center" colspan="2"><h1>প্রোপ্রাইটারের প্রয়োজনীয় তথ্য</h1></th></tr>
                    <tr><td colspan="4" ></td>
                        <?php
                        if ($msg != "") {
                            echo '<tr> <td colspan="2" style="text-allign: center; color: green; font-size: 15px"><b>' . $msg . '</b></td></tr>';
                        }
                        ?>
                    </tr>   
                    <tr>
                        <td colspan="2" > 
                    </tr>
                    <tr>
                        <td colspan="2" >
                            <table width="100%">
                                <tr>	
                                    <td  colspan="2"   style =" font-size: 14px"><b>প্রোপ্রাইটারের শিক্ষাগত যোগ্যতা</b></td>                                                
                                </tr>
                                <tr>                      
                                    <td>
                                        <table id="container_others32">
                                            <tr>
                                                <td>পরীক্ষার নাম / ডিগ্রী</td>
                                                <td>পাশের সাল</td>
                                                <td>প্রতিষ্ঠানের নাম </td>
                                                <td>বোর্ড / বিশ্ববিদ্যালয়</td>
                                                <td>জি.পি.এ / বিভাগ</td>      
                                            </tr>
                                            <tr>
                                                <td><input class="textfield"  name="e_ex_name[]" type="text" /></td>
                                                <td><input class="box5"  name="e_pass_year[]" type="text" /></td>
                                                <td><input class="textfield" name="e_institute[]" type="text" /></td>
                                                <td><input class="textfield"  name="e_board[]" type="text" /></td>
                                                <td style="padding-right: 45px;"><input class="box5"  name="e_gpa[]" type="text" /></td>                                             
                                                <td  ><input type="button" class="add2" /></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>         
                    <tr>
                        <td colspan="4" ><hr /></td>
                    </tr>
                    <tr>
                        <td colspan="2" >
                            <table width="100%">
                                <tr>	
                                    <td  colspan="2"   style =" font-size: 14px"><b>প্রোপ্রাইটারের নমিনির শিক্ষাগত যোগ্যতা</b></td>                                                
                                </tr>
                                <tr>                         
                                    <td>
                                        <table id="container_others33">
                                            <tr>
                                                <td>পরীক্ষার নাম / ডিগ্রী</td>
                                                <td>পাশের সাল</td>
                                                <td>প্রতিষ্ঠানের নাম </td>
                                                <td>বোর্ড / বিশ্ববিদ্যালয়</td>
                                                <td>জি.পি.এ / বিভাগ</td>      
                                            </tr>
                                            <tr>
                                                <td><input class="textfield"  name="n_ex_name[]" type="text" /></td>
                                                <td><input class="box5"  name="n_pass_year[]" type="text" /></td>
                                                <td><input class="textfield"  name="n_institute[]" type="text" /></td>
                                                <td><input class="textfield"  name="n_board[]" type="text" /></td>
                                                <td style="padding-right: 45px;"><input class="box5"  name="n_gpa[]" type="text" /></td>                                             
                                                <td ><input type="button" class="add3" /></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>                    
                        <td colspan="4" style="padding-top: 10px; padding-left: 250px;padding-bottom: 5px; " ><input class="btn" style =" font-size: 12px; " type="submit" name="submit3" value="সেভ করুন" />
                            <input class="btn" style =" font-size: 12px" type="reset" name="reset" value="রিসেট করুন" />
                        </td>                           
                    </tr>
                </table>
            </form>
        </div>

         <div>
            <h2><a name="05" id="05"></a></h2><br/>
            <form name="scanDoc_form" method="POST" enctype="multipart/form-data" onsubmit="">	
                <table  class="formstyle">     
                    <tr><th colspan="4" style="text-align: center" colspan="2"><h1>প্রোপ্রাইটারের প্রয়োজনীয় তথ্য</h1></th></tr>
                    <tr><td colspan="4" ></td>
                        <?php
                        if ($msg != "") {
                            echo '<tr> <td colspan="2" style="text-allign: center; color: green; font-size: 15px"><b>' . $msg . '</b></td></tr>';
                        }
                        ?>
                    </tr>                  
                    <tr>	
                        <td  style="width: 110px;" font-weight="bold" > এস.এস.সির সার্টিফিকেট</td>
                        <td>:  <input class="box" type="file" id="scanDoc1" name="scanDoc1" style="font-size:10px;"/></td>
                        <td  font-weight="bold" > জাতীয় পরিচয়পত্র</td>
                        <td>:  <input class="box" type="file" id="scanDoc2" name="scanDoc2" style="font-size:10px;"/></td>
                    </tr>
                    <tr>	
                        <td  font-weight="bold"  style="width: 112px;">এইচ.এস.সির সার্টিফিকেট</td>
                        <td>:  <input class="box" type="file" id="scanDoc3" name="scanDoc3" style="font-size:10px;"/></td>
                        <td  font-weight="bold" >জন্ম সনদ</td>
                        <td>:  <input class="box" type="file" id="scanDoc4" name="scanDoc4" style="font-size:10px;"/></td>
                    </tr>
                    <tr>	
                        <td  font-weight="bold" >অনার্সের সার্টিফিকেট</td>
                        <td>:  <input class="box" type="file" id="scanDoc5" name="scanDoc5" style="font-size:10px;"/></td>
                        <td  font-weight="bold" >চারিত্রিক সনদ</td>
                        <td>:  <input class="box" type="file" id="scanDoc6" name="scanDoc6" style="font-size:10px;"/></td>
                    </tr>
                    <tr>	
                        <td  font-weight="bold" >মাস্টার্সের  সার্টিফিকেট</td>
                        <td>:  <input class="box" type="file" id="scanDoc7" name="scanDoc7" style="font-size:10px;"/></td>
                        <td  font-weight="bold" >অন্যান্য </td>
                        <td>:  <input class="box" type="file" id="scanDoc8" name="scanDoc8" style="font-size:10px;"/></td>
                    </tr>
                    <tr>                    
                        <td colspan="4" style="padding-top: 10px; padding-left: 250px;padding-bottom: 5px; " ><input class="btn" style =" font-size: 12px; " type="submit" name="submit4" value="সেভ করুন" />
                            <input class="btn" style =" font-size: 12px" type="reset" name="reset" value="রিসেট করুন" />
                        </td>                           
                    </tr>
                </table>
            </form>
        </div>
        </div> 
    </div>         
    <?php include_once 'includes/footer.php'; ?>