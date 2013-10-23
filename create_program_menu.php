<?php
error_reporting(0);
include_once 'includes/';
?>
<style type="text/css">@import "css/domtab.css";</style>
<?php
include_once 'includes/columnLeft.php';
?>
<div class="columnSld">
    <form method="POST" onsubmit="">	
        <table class="formstyle"> 
            <tr><th style="text-align: center" colspan="2"><h1>প্রোগ্রাম সিডিউল</h1></th></tr>
            <tr>                                
                <td><a href="presentation_schdule.php?action=first&type=presentation">প্রেজেন্টেশন সিডিউল</a></td> 
                 <td><a href="presentation_schdule.php?action=first&type=program">প্রোগ্রাম সিডিউল</a></td> 
            </tr>
            <tr>                                
                <td><a href="presentation_schdule.php?action=first&type=training">ট্রেইনিং সিডিউল</a></td> 
                 <td><a href="presentation_schdule.php?action=first&type=travel">ট্র্যাভেল সিডিউল</a></td> 
            </tr>
            <tr>
                <td><a href="making_ticket.php">টিকেট মেইকিং</a></td>
                <td><a href="selling_ticket.php">টিকেট সেলিং</a></td>
            </tr>
        </table>
    </form>
</div>