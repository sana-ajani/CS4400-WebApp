<?php

include 'connect.php';



$Location = $_POST['POI'];
$Date = $_POST['Date'];
$Time = $_POST['Time'];
$DataType = $_POST['DataType'];
$DataValue = $_POST['DataValue'];



if ($DataType==1) {
    $DataType = "MOLD";
} else if ($DataType==2) {
    $DataType = "AIR QUALITY";
}



mysql_select_db("cs4400_62", $conn);
$query = mysql_query("INSERT INTO `DATAPOINT`(`DATETIME`, `Accepted`, `Data_Value`, `POI_LOCATION`, `DATA_TYPE`) VALUES ('$Time', NULL, '$DataValue', '$Location','$DataType')", $conn) or trigger_error(mysql_error()." ".$query);

header("Location:http://localhost/SubmittedDataPoint.php");
exit;





 ?>
