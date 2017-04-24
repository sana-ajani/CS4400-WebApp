
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>POI Report</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
</head>
<body>
     <table id="table_format" class="table table-bordered table-striped table-hover table-list-search">
        <thead>
            <tr>
                <th>POI Location</th>
                <th>City</th>
                <th>State</th>
                <th>Mold Min</th>
                <th>Mold Avg</th>
                <th>Mold Max</th>
                <th>AQ Min</th>
                <th>AQ Avg</th>
                <th>AQ Max</th>
                <th># of Data Points</th>
                <th>Flagged?</th>
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
                    $sql = "SELECT * FROM `POI` GROUP BY Location ";



                    $result = mysql_query($sql, $conn) or trigger_error(mysql_error()." ".$query);
                    if (mysql_num_rows($result) > 0){
                    // output data of each row
                    while($rows = mysql_fetch_array($result)){ ?>
                        <td><?php echo $rows['Location']; ?></td>
                        <td><?php echo $rows['CS_City']; ?></td>
                        <td><?php echo $rows['CS_State']; ?></td>
                        <?php
                        mysql_select_db("cs4400_62", $conn);
                        $sql = "SELECT MIN(Data_Value) FROM `DATAPOINT` WHERE DATA_TYPE='MOLD' AND Accepted='1' AND POI_Location='".$rows['Location']."' ";
                        $aa=mysql_query($sql, $conn) or die($sql."<br/><br/>".mysql_error());
                        $values = mysql_fetch_array($aa);
                        ?>
                        <td><?php echo $values[0]; ?></td>


                        <?php
                        mysql_select_db("cs4400_62", $conn);
                        $sql = "SELECT AVG(Data_Value) FROM `DATAPOINT` WHERE DATA_TYPE='MOLD' AND Accepted='1' AND POI_Location='".$rows['Location']."' ";
                        $aa=mysql_query($sql, $conn) or die($sql."<br/><br/>".mysql_error());
                        $values = mysql_fetch_array($aa);
                        ?>
                        <td><?php echo $values[0]; ?></td>

                        <?php
                        mysql_select_db("cs4400_62", $conn);
                        $sql = "SELECT MAX(Data_Value) FROM `DATAPOINT` WHERE DATA_TYPE='MOLD'  AND Accepted='1' AND POI_Location='".$rows['Location']."' ";
                        $aa=mysql_query($sql, $conn) or die($sql."<br/><br/>".mysql_error());
                        $values = mysql_fetch_array($aa);
                        ?>
                        <td><?php echo $values[0]; ?></td>


                        <?php
                        mysql_select_db("cs4400_62", $conn);
                        $sql = "SELECT MIN(Data_Value) FROM `DATAPOINT` WHERE DATA_TYPE='AIR QUALITY' AND Accepted='1' AND POI_Location='".$rows['Location']."' ";
                        $aa=mysql_query($sql, $conn) or die($sql."<br/><br/>".mysql_error());
                        $values = mysql_fetch_array($aa);
                        ?>
                        <td><?php echo $values[0]; ?></td>

                        <?php
                        mysql_select_db("cs4400_62", $conn);
                        $sql = "SELECT AVG(Data_Value) FROM `DATAPOINT` WHERE DATA_TYPE='AIR QUALITY' AND Accepted='1' AND POI_Location='".$rows['Location']."' ";
                        $aa=mysql_query($sql, $conn) or die($sql."<br/><br/>".mysql_error());
                        $values = mysql_fetch_array($aa);
                        ?>
                        <td><?php echo $values[0]; ?></td>

                        <?php
                        mysql_select_db("cs4400_62", $conn);
                        $sql = "SELECT MAX(Data_Value) FROM `DATAPOINT` WHERE DATA_TYPE='AIR QUALITY' AND Accepted='1' AND POI_Location='".$rows['Location']."' ";
                        $aa=mysql_query($sql, $conn) or die($sql."<br/><br/>".mysql_error());
                        $values = mysql_fetch_array($aa);
                        ?>
                        <td><?php echo $values[0]; ?></td>

                        <?php
                        mysql_select_db("cs4400_62", $conn);
                        $sql = "SELECT COUNT(Data_Value) FROM `DATAPOINT` WHERE  POI_Location='".$rows['Location']."' ";
                        $aa=mysql_query($sql, $conn) or die($sql."<br/><br/>".mysql_error());
                        $values = mysql_fetch_array($aa);
                        ?>
                        <td><?php echo $values[0]; ?></td>

                        <?php
                        mysql_select_db("cs4400_62", $conn);
                        $sql = "SELECT Flag FROM `POI`";
                        $aa=mysql_query($sql, $conn) or die($sql."<br/><br/>".mysql_error());
                        $values = mysql_fetch_array($aa);
                        ?>
                        <td><?php echo $values[0]; ?></td>


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




<form action="CityOfficial.php" method="POST">
    <p style="text-align: center;"><input type="submit" value="Back" /> </p>
</form>
