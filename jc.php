<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>

        <title>RIPD Email System</title>
        <script type="text/javascript" src="javascripts/jquery.js"></script>
        <script type='text/javascript' src='javascripts/jquery.autocomplete.js'></script>


        <link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css" />

        <?php
        //error_reporting(0);
        $dbhost = "localhost";
        $dbname = "ripd_db_comfosys";
        $dbuser = "root";
        $dbpass = "";
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
        $conn->exec("set names utf8");
        

                $name_row = array();
                $sql_query = $conn->prepare("SELECT * FROM cfs_user limit 1");
                $sql_query->execute();
                $row = $sql_query->fetchAll();
                foreach ($row as $k)
                        {
                        $name_temp = $k["account_name"];
                        $account_temp = $k["account_number"];
                        $str_total_email = "{name: '$name_temp', to: '$account_temp'}";
                        $name_row[] = $str_total_email;
                        }
                $json_object .=  implode(",", $name_row);
                $json_object = "[$json_object]";
                
               // echo $json_object;

        
        ?>

        <script type="text/javascript">
            var emails = <?php echo $json_object;?>;
            $().ready(function() {

                $("#email_sugg").autocomplete(emails, {
                    minChars: 0,
                    width: 310,
                    matchContains: "word",
                    multiple: true,
                    mustMatch: true,
                    autoFill: true,
                    formatItem: function(row, i, max) {
                        return i + "/" + max + ": \"" + row.name + "\" [" + row.to + "]";
                    },
                    formatMatch: function(row, i, max) {
                        return row.name + " " + row.to;
                    },
                    formatResult: function(row) {
                        return row.to;
                    }
                });

                $("#suggest_name").autocomplete(cities_ift, {
                    multiple: true,
                    mustMatch: true,
                    autoFill: true
                });

            });

        </script>

    </head>

    <body>

        <h1 id="banner">Email for RIPD</h1>

        <div id="content">

            <form autocomplete="off" action="" method="POST">
                <table>
                    <tr>
                    <td>Subject:</td>
                    <td><input type="text" id="suggest13" name="subject"/></td>
                    </tr>
                    <tr>
                    <td>Email Id (multiple):</td>
                    <td><input type="text" name="email_address" id='email_sugg' style="width: 337px;"/></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: text-top;">Write the message:</td>
                        <td><textarea name="email_text" cols="40" rows="6"></textarea></td>
                    </tr>
                </table>
                <input type="submit" name="submit_email" value="Submit" />
        </form>


        </div>

    </body>
</html>
