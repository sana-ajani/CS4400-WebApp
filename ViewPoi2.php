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
                            <th>#
                            </th>
                            <th>Location</th>
                            <th>City</th>
                            <th>Married

							</th>
                        </tr>
                    </thead>
                    <tbody  id="myTable">
                        <tr class="content">
                            <?php
                            include "connect.php";
                            mysql_select_db("cs4400_62", $conn);
                            $sql = "SELECT * FROM `POI`";
$result = mysql_query($sql, $conn);
            if($result > 0){
                // output data of each row
                while($rows = mysql_fetch_array($result)){ ?>
                    <tr>

                        <td><?php echo $rows['Location']; ?></td>
                        <td><?php echo $rows['CS_City']; ?></td>
                        <td><?php echo $rows['CS_State']; ?></td>
                        <td align="center"><a href="ViewOnePoi.php?id=<?php echo $rows['id']; ?>">View</a></td>
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
