<?php
$username = $_GET['u'];
$password = $_GET['p'];
$sender = $_GET['sen'];
$message_get = $_GET['msg'];
$mobile = $_GET['m'];
//$phoneNumber = "8801711376660"; //it will get value from another page
//$message_get = "medicine names plzz\nno need to check next line...with change time"; //it will get value from another page
$message_url = urlencode($message_get);
$message_final = substr($message_url, 0, 159) ;

//fixed parameter
$host = "121.241.242.114";
$port = "8080";
//$username = "mfn-demo";
//$password = "demo321";
//$sender = "COMFOSYS"; // it will be RIPD
//$mobile = $phoneNumber;
$msgtype = "0";
$dlr ="1";
//
$live_url = "http://$host:$port/bulksms/bulksms?username=$username&password=$password&type=$msgtype&dlr=$dlr&destination=$mobile&source=$sender&message=$message_final";
////$link = "http://121.241.242.114:8080/bulksms/bulksms?username=mfn-demo&password=demo321&type=0&dlr=1&destination=8801727208714&source=COMFOSYS&message=This+is+test";


$parse_url=file_get_contents($live_url);
echo $parse_url;
?>


