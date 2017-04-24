<form action="UpdatePendingDataPoints.php" method="POST">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pending Data Points</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
</head>
<body>
     <table id="table_format" class="table table-bordered table-striped table-hover table-list-search">
        <thead>
            <tr>
                <th>Select</th>
                <th>POI Location</th>
                <th>Data type</th>
                <th>Data value</th>
                <th>Time and Date of Data Reading</th>
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
                    $sql = "SELECT * FROM `DATAPOINT` WHERE Accepted IS NULL";

                        session_start();

                    $result = mysql_query($sql, $conn) or trigger_error(mysql_error()." ".$query);
                    if (mysql_num_rows($result) > 0){
                    // output data of each row
                    while($rows = mysql_fetch_array($result)){ ?>
                        <td align="center">
                            <p style="text-align: center;"> <input name="Selected[]" type="checkbox" value="<?php echo $rows['POI_LOCATION'] ; ?>" /> </p>
                            <p style="text-align: center;"> <input name="Selected2[]" type="checkbox" value="<?php echo $rows['DATETIME'] ; ?>" /> </p>
                        </form></td>

                        <td><?php echo $rows['POI_LOCATION']; ?></td>
                        <td><?php echo $rows['DATA_TYPE']; ?></td>
                        <td><?php echo $rows['Data_Value']; ?></td>
                        <td><?php echo $rows['DATETIME']; ?></td>





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


    <p style="text-align: center;"><input type="submit" name="accept" value="Accept" /> </p>
    <p style="text-align: center;"><input type="submit" value="Reject" /> </p>
</form>

<form action="AdminPage.php" method="POST">
    <p style="text-align: center;"><input type="submit" value="Back" /> </p>
</form>
