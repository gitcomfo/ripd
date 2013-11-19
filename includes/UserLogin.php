<?php

session_start();

define('UL_OK', 0);  /* User verified, session initialised */
define('UL_NOTVALID', 1); /* User/password do not agree */
define('UL_BLOCKED', 2); /* Account locked, too many failed logins */
define('UL_CONFIGERR', 3); /* Configuration error in webERP or server */
define('UL_SHOWLOGIN', 4);
define('UL_MAINTENANCE', 5);

function userLogin($Name, $Password) 
        {
        if (!isset($_SESSION['AccessLevel']) OR $_SESSION['AccessLevel'] == '' OR (isset($Name) AND $Name != '')) 
                {
                include_once 'selectQueryPDO.php';
                include_once 'updateQueryPDO.php';
                $_SESSION['AccessLevel'] = '';
                //$_SESSION['CustomerID'] = '';
                $_SESSION['Module'] = '';
                $_SESSION['AttemptsCounter']++;
                if (!isset($Name) or $Name == '') return UL_SHOWLOGIN;
                $sql_select_login->execute(array($Name, $Password));
                $num_rows = $sql_select_login->rowCount();
                $ErrMsg = _(' Could not retrieve user details on login because');
                if($num_rows>0) 
                        {
                        echo "enter in OK";
                        $login_array = $sql_select_login->fetchAll();
                        foreach ($login_array as $la_key) 
                                {
                                $db_idUser = $la_key['idUser'];
                                $db_blocked = $la_key['blocked'];
                                $db_account_name = $la_key['account_name'];
                                $db_account_status = $la_key['cfs_account_status'];
                                $db_user_type = $la_key['user_type'];
                                }
                        $_SESSION['success'] = "done";
                        $_SESSION['userIDUser'] = $db_idUser;
                        $_SESSION['systemUser'] = "ripdSystem";
                        $_SESSION['userType'] = $db_user_type;
                        //$_SESSION['overallAccess'] = explode(",", $myrow['overall_access']);
                        $_SESSION['AttemptsCounter'] = 0;
                        //$_SESSION['AccessLevel'] = $myrow['fullaccess'];
                        //$_SESSION['CustomerID'] = $myrow['customerid'];
                        //$_SESSION['ModulesEnabled'] = explode(",", $myrow['modulesallowed']);
                        $_SESSION['UsersRealName'] = $db_account_name;
                        if ($db_blocked == 1) return UL_BLOCKED;
                        else return UL_OK;
                        }
                else 
                        {// Incorrect password
                        if (!isset($_SESSION['AttemptsCounter'])) $_SESSION['AttemptsCounter'] = 0;
                        // 5 login attempts, show failed login screen
                        elseif ($_SESSION['AttemptsCounter'] >= 5 AND isset($Name)) 
                                {
                                /* User blocked from future accesses until sysadmin releases */
                                $sql_update_account_block->execute(array($Name));
                                return UL_BLOCKED;
                                }
                        return UL_NOTVALID;
                        }
                }
        }

?>