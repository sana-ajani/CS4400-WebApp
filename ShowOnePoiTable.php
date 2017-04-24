<?php
include 'connect.php';

$Type= $_POST['Type'];
$DataValueMin = $_POST['DataValueMin'];
$DataValueMax = $_POST['DataValueMax'];
$DateFlagged = $_POST['DATETIME'];
//$Location = $_POST['Location'];

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Filter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
</head>
<body>
     <table id="table_format" class="table table-bordered table-striped table-hover table-list-search">
        <thead>
            <tr>
                <th>Data Type</th>
                <th>Data Value</th>
                <th>Date of Reading</th>
            </tr>
        </thead>
        <tbody  id="myTable">
            <tr class="content">
                <?php
                    include "connect.php";
                    mysql_select_db("cs4400_62", $conn);
                    $first = True;
                    // $sql = "SELECT * FROM `POI` WHERE Location='$Location'";

                    // $sql = "SELECT * FROM `POI` WHERE Location='$Location' AND CS_City='$City'";
                    // echo $Location;
                    //
                    // echo $City;
                    // $sql = "SELECT * FROM `POI` NATURAL JOIN `DATAPOINT` WHERE POI_LOCATION='$Location'";
                    $sql = "SELECT * FROM `POI` NATURAL JOIN `DATAPOINT`";

                    if ($Type != "Choose Here") { //if selected
                        if ($Type == "1") {
                            $Type = "Mold";
                        } else {
                            $Type = "Air Quality";
                        }
                        if ($first) {
                            $first = False;
                            $sql .= " WHERE DATA_TYPE='$Type'";
                        } else {
                            $sql .= " AND DATA_TYPE='$Type'";
                        }
                    }

                    if ($DataValueMin != "" && $DataValueMax != "") { //if selected
                        if ($first) {
                            $first = False;
                            $sql .= " WHERE Data_Value BETWEEN '$DataValueMin' AND '$DataValueMax' ";
                        } else {
                            $sql .= " AND Data_Value BETWEEN '$DataValueMin' AND '$DataValueMax'";
                        }
                    }

                    if ($DateFlagged != "Choose Here") { //if selected
                        if ($first) {
                            $first = False;
                            $sql .= " WHERE DATETIME='$DateFlagged'";
                        } else {
                            $sql .= " AND DATETIME='$DateFlagged'";
                        }
                    }

                    $result = mysql_query($sql, $conn) or trigger_error(mysql_error()." ".$query);
                    if (mysql_num_rows($result) > 0){
                    // output data of each row
                    while($rows = mysql_fetch_array($result)){ ?>
                        <tr>
                        <td><?php echo $rows['DATA_TYPE']; ?></td>
                        <td><?php echo $rows['Data_Value']; ?></td>
                        <td><?php echo $rows['DATETIME']; ?></td>
                        <!-- <td align="center"><form action="ViewOnePoi.php" method="POST">
                            <p style="text-align: center;"><input type="submit" value="View" /> </p>
                        </form></td> -->
                        </tr>
                        <?php
                    }
                    }
                ?>
            </tr>
        </tbody>
                </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>

<form action="ViewPoi.php" method="POST">
    <p style="text-align: center;"><input type="submit" value="Reset Filter" /> </p>
</form>
