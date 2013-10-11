<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="icon" type="image/png" href="images/favicon.png" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
      <script type="text/javascript" src="javascripts/domtab.js"></script>	
      <script type="text/javascript" src="javascripts/jquery.js"></script>
 
        <script type="text/javascript">	
            var count = 0;
            $(function(){
	$('p#add_field').click(function(){
		count += 1;
		$('#container').append(
				'<strong>Link #' + count + '</strong><br />' 
				+ '<input id="field_' + count + '" name="fields[]' + '" type="text" /><br />' );
	
	});
});
    </script>


    </head>
    <body>
        <div id="main_container">


            <div id="header">

                <a href="index.php"><div id="logo"></div></a>

                <div class="banner_adds"></div>
                <div class="banner_sub_adds"></div>
                    <div class="menu">

                    <ul>
                        <li><a href="index.php">এবাউট কোম্পানি</a></li>
                        <li><a href="#">প্রোডাক্ট<!--[if IE 7]><!--></a> 
                 <!--<![endif]--> <!--[if lte IE 6]><table><tr><td><![endif]-->
                            <ul>
                                <li><a href="#" title="">প্রোডাক্ট ইনফরমেশন</a></li>
                                <li><a href="masterChart.php" title="">মাস্টার চার্ট</a></li>
                            </ul> <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                        </li>
                        <li><a href="#">কন্টাক্ট<!--[if IE 7]><!-->
                        </a> <!--<![endif]--> <!--[if lte IE 6]><table><tr><td><![endif]-->
                            <ul>
                                <li><a href="officeNcontact.php">অফিস এন্ড কন্টাক্ট</a></li>
                                <li><a href="salesStoreAndContact.php" title="">সেল্‌স স্টোর এন্ড কন্টাক্ট</a></li>
                                <li><a href="#" title="">অফিস ডে অ্যান্ড অফ ডে</a></li>
                            </ul> <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                        </li>
                        <li><a href="#">নিউজ<!--[if IE 7]><!-->
                        </a> <!--<![endif]--> <!--[if lte IE 6]><table><tr><td><![endif]-->
                            <ul>
                                <li><a href="awards.php" title="">অ্যাওয়ার্ড</a></li>
                                <li><a href="#" title="">নোটিস বোর্ড</a>
                                    <ul>
                                        <li><a href="program.php" title="">প্রোগ্রাম</a></li>
                                        <li><a href="presentation.php" title="">প্রেজেন্টেশন</a></li>
                                        <li><a href="program.php" title="">ট্রেইনিং</a></li>
                                        <li><a href="presentation.php" title="">ট্রাভেল</a></li>
                                    </ul> <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                                </li>
                            </ul> <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                        </li>
                        <li><a href="patent.php">প্যাটেন্ট</a></li>
                        <li><a href="programProfile.php">প্রোগ্রাম প্রোফাইল</a></li>
                        <li><a href="makeapplication.php">মেইক এপ্লিকেশন</a></li>
                        <li><a href="logout.php">সাইন আউট</a> </li>
                    </ul>
                </div>
            </div>

            <div id="main_content">