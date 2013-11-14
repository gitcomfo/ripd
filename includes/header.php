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
                        <li><a href="index.php">হোম</a></li>
                        <li><a href="#">মাস্টার চার্ট</a></li>
                        <li><a href="#">কন্টাক্ট</a>
                            <ul>
                                <li><a href="#">অফিস এন্ড কন্টাক্ট</a></li>
                                <li><a href="#" title="">সেল্‌স স্টোর এন্ড কন্টাক্ট</a></li>
                                <li><a href="#" title="">অফিস ডে অ্যান্ড অফ ডে</a></li>
                            </ul>
                        </li>
                        <li><a href="#">প্যাটেন্ট</a></li>
                        <li><a href="#">এওয়ার্ড</a></li>
                        <li><a href="#">নোটিস বোর্ড</a>
                        <ul>
                            <li><a href="#" title="">প্রোগ্রাম</a></li>
                            <li><a href="#" title="">প্রেজেন্টেশন</a></li>
                            <li><a href="#" title="">ট্রেইনিং</a></li>
                            <li><a href="#" title="">ট্রাভেল</a></li>
                        </ul>
                        </li>
                        <li><a href="logout.php">সাইন আউট</a> </li>
                    </ul>
                </div>
            </div>

            <div id="main_content">