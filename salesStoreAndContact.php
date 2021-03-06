<?php
error_reporting(0);
include_once 'includes/ConnectDB.inc';
include 'includes/columnLeft.php';
?>
<script type="text/javascript" src="javascripts/area.js"></script>
        <script type="text/javascript" src="javascripts/external/mootools.js"></script>
        <script type="text/javascript" src="javascripts/dg-filter.js"></script>

<script type="text/javascript">
    function infoFromThana()
    {
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
        xmlhttp.open("GET","includes/infoSalesStoreFromThana.php?dsd="+district_id+"&dvd="+division_id+"&ttid="+thana_id,true);
        xmlhttp.send();
    }
</script>

<fieldset id="fieldset_style">

    <div id="table_header_style">
        <table border="0" style="width: 100%; height: 72%;font-size: 17px" align="center">
            <tr align="center">
                <td><b>সেলসস্টোর</b></td>
            </tr>
        </table>
    </div>

    <?php
    include_once 'includes/areaSearch.php';
    getArea("infoFromThana()");
    ?>

    <input type="hidden" id="method" value="infoFromThana()">

    সার্চ/খুঁজুন:  <input type="text" id="search_box_filter">

    <span id="office">
        <br /><br />
        <div>
            <table id="office_info_filter" border="1" align="center" width= 99%" cellpadding="5px" cellspacing="0px">
                <thead>
                    <tr align="left" id="table_row_odd">
                        <th><?php echo "সেলস স্টোর নং"; ?></th>
                        <th><?php echo "সেলস স্টোর নেইম"; ?></th>
                        <th><?php echo "সেলস স্টোর নম্বর"; ?></th>
                        <th><?php echo "একাউন্ট নম্বর"; ?></th>
                        <th><?php echo "ঠিকানা"; ?></th>
                        <th><?php echo "ই-মেইল"; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //officeTableHead();
                    $sql_salesStoreTable = "SELECT * from ".$dbname.".sales_store ORDER BY salesStore_name ASC";
                    $db_slNo = 0;
                    $rs = mysql_query($sql_salesStoreTable);

                    //echo mysql_num_rows($rs);
                    while ($row_officeNcontact = mysql_fetch_array($rs)) {
                        $db_slNo = $db_slNo + 1;
                        $db_salesStoreName = $row_officeNcontact['salesStore_name'];
                        $db_salesStoreNumber = $row_officeNcontact['salesStore_number'];
                        $db_salesStoreAN = $row_officeNcontact['account_number'];
                        $db_salesStoreAddress = $row_officeNcontact['salesStore_detailsAddress'];
                        $db_salesStoreEmail = $row_officeNcontact['salesStore_email'];
                        echo "<tr>";
                        echo "<td>$db_slNo</td>";
                        echo "<td>$db_salesStoreName</td>";
                        echo "<td>$db_salesStoreNumber</td>";
                        echo "<td>$db_salesStoreAN</td>";
                        echo "<td>$db_salesStoreAddress</td>";
                        echo "<td>$db_salesStoreEmail</td>";
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>                        
        </div>
    </span>          
</fieldset>

<script type="text/javascript">
    var filter = new DG.Filter({
        filterField : $('search_box_filter'),
        filterEl : $('office_info_filter')
    });
</script>
