<?php

include 'connect.php';



$Location = $_POST['Location'];
// $City = $_POST['City'];
// $State = $_POST['State'];
// $ZipCode = $_POST['Zipcode'];

mysql_select_db("cs4400_62", $conn);
$query = mysql_query("SELECT * FROM `DATAPOINT` WHERE POI_LOCATION='$Location'", $conn) or trigger_error(mysql_error()." ".$query);

    if (mysql_num_rows($query) != 0) {
        echo("exists");
        exit;
    }

?>
