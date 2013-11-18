<?php
error_reporting(0);
$CryptFunction = "md5";
$message = '';

function CryptPass($Password) 
        {
        global $CryptFunction;
        if ($CryptFunction == 'sha1') return sha1($Password);
        elseif ($CryptFunction == 'md5') return md5($Password);
        else return $Password;
        }
        
if (isset($_POST['submit'])) 
        {
        if (!isset($AllowAnyone))  // only do security checks if AllowAnyone is not true 
                {//echo "if Condition in Anyone";
                include_once 'includes/UserLogin.php'; // Login checking and setup 
                $p_password = md5($_POST['Password']);
                $rc = userLogin($_POST['UserNameEntryField'], $p_password);

                switch ($rc) 
                    {
                    case UL_OK;
                        echo "<meta http-equiv='refresh' content='0; URL=index.php'>";
                        exit();
                    case UL_SHOWLOGIN:
                        //include($PathPrefix . 'Login.php');
                        //---------echo "UL_ShowLogin Case";
                        $message = 'ভুল তথ্য, আবার চেষ্টা করুন';
                        //exit();
                        break;
                    case UL_BLOCKED:
                        // die(include($PathPrefix . 'includes/FailedLogin.php'));
                        //--------echo "BLOCKED case";
                        $message = 'আপনার একাউন্টটি ব্লক করা হয়েছে, পুনরায় চালু করতে এডমিনের সাথে যোগাযোগ করুন';
                        //exit();
                        break;
                    case UL_CONFIGERR:
                        //$title = _('Account Error Report');
                        //include($PathPrefix . 'includes/header.inc');
                        //echo '<br /><br /><br />';
                        //prnMsg(_('Your user role does not have any access defined for webERP. There is an error in the security setup for this user account'),'error');
                        //include($PathPrefix . 'includes/footer.inc');
                        //------echo "ConfigError case";
                        $message = 'দুঃখিত, আপনার এই সাইটে ঢোকার অনুমতি নেই';
                        //exit();
                        break;
                    case UL_NOTVALID:
                        //$demo_text = '<font size="3" color="red"><b>' .  _('incorrect password') . '</b></font><br /><b>' . _('The user/password combination') . '<br />' . _('is not a valid user of the system') . '</b>';
                        //die(include($PathPrefix . 'login.php'));
                        //------echo "NotValid case";
                        $message = 'ভুল তথ্য, আবার চেষ্টা করুন';
                        //break;
                        //exit();
                        break;
                    case UL_MAINTENANCE:
                        // $demo_text = '<font size="3" color="red"><b>' . _('system maintenance') . '</b></font><br /><b>' . _('webERP is not available right now') . '<br />' . _('during maintenance of the system') . '</b>';
                        //die(include($PathPrefix . 'login.php'));
                        //----echo "\nMaintaina case";
                        $message = 'দুঃখিত, বর্তমানে সাইটটিতে কাজ চলছে';
                        //exit();
                        break;
                    }
            } //only do security checks if AllowAnyone is not true 

        }

?>

<div style="margin-top: 10%; margin-left: 40%;margin-bottom: 10%;">

    <div class="left_box">
        <div class="top_left_box"></div>
        <div class="center_left_box">
            <div class="box_title">
                <span>লগইন</span> করুন
            </div>
            <?php 
            echo "<h2 align = 'center' style =\"color:red\"><blink>".$message."</blink></h2>";
            ?>

            <div class="form">
                <form method ="post" onsubmit="">
                   <!-- <input type =" hidden" name =" FormID" value =" <?php echo $_SESSION['FormID'] ?>" /> -->

                    <div class="form_row">
                        <label class="left">ইউজারনেমঃ </label><input type="text"
                                                                     class="form_input" name ="UserNameEntryField"/>
                    </div>
                    <div class="form_row">
                        <label class="left">পাসওয়ার্ডঃ </label><input type="password"
                                                                      class="form_input" name ="Password" />
                    </div>

                    <div style="float: right; padding: 10px 25px 0 0;">
                        <input type="submit" name ="submit" value ="লগ ইন"/>
                        <div class="form_row_register">
                            <a href="?apps=REG">রেজিস্টার</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="bottom_left_box"></div>
    </div>
</div>