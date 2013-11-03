<?php
$phoneNumber = "8801727208714"; //it will get value from another page
//$message_get = "new message\ngo for next line to test...\nmedicine names plzz"; //it will get value from another page
//$message_url = urlencode($message_get);
//$message_final = substr($message_url, 0, 159) ;
$msssg = "Hello Boss, how r u?javascript prob solved";
//fixed parameter
$host = "121.241.242.114";
$port = "8080";
$username = "mfn-demo";
$password = "demo321";
$sender = "COMFOSYS"; // it will be RIPD
$mobile = $phoneNumber;
$msgtype = "0";
$dlr ="1";

//$live_url = "http://$host:$port/bulksms/bulksms?username=$username&password=$password&type=$msgtype&dlr=$dlr&destination=$mobile&source=$sender&message=$message_final";
?>

<script type="text/javascript">
    function sendsms(u,p,m,sen,msg)
    {
  
        var xmlhttp;
        if (window.XMLHttpRequest) xmlhttp=new XMLHttpRequest();
        else xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)       
        document.getElementById('response').innerHTML=xmlhttp.responseText;
        }
        xmlhttp.open("GET", "sms_php.php?u="+u+"&p="+p+"&sen="+sen+"&msg="+msg+"&m="+m, true);
        xmlhttp.send();
    }
</script>

<body>
    <p id="response"></p>
    <script type="text/javascript">
sendsms('<?php echo $username;?>','<?php echo $password;?>','<?php echo $mobile;?>','<?php echo $sender;?>','<?php echo $msssg;?>');
</script>
</body>
                

