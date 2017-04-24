<?php

include 'connect.php';

 ?>

<h1 style="text-align: center;"><span style="background-color: #ffffff;"><strong>Add a new location</strong></span></h1>

<form action="checklocation.php" method="POST">

    <div class="form-group" style="text-align: center;"><label class="control-label" for="Location">POI Location Name: </label>
        <div class="yo" style="text-align: center;"><input id="Location" class="form-control input-md" name="Location" required="" type="text" placeholder="" /></div>
    </div><br>



    <div class="form-group" style="text-align: center;"><label class="col-md-4 control-label" for="City">City: </label>
            <select id="DataType" class="form-control" name="City">
                <?php
                    include 'connect.php';
                    //trying to populate dropdown of cities and states
                    mysql_select_db("cs4400_62", $conn);
                    $query = mysql_query("SELECT DISTINCT City FROM `CITYSTATE`", $conn);
                        if (mysql_num_rows($query)) {
                            $select= '<select name=\"City\">';
                            while ($result = mysql_fetch_array($query)) {
                                echo '<option value="'.$result['City'].'">'.$result['City'] . '</option>';
                            }
                        }
                    ?>
            </select>
        </div>
    <br>
    <div class="form-group" style="text-align: center;"><label class="col-md-4 control-label" for="DataType">State: </label>
            <select id="DataType" class="form-control" name="State">
                <?php
                    include 'connect.php';
                    //trying to populate dropdown of cities and states
                    mysql_select_db("cs4400_62", $conn);
                    $query = mysql_query("SELECT DISTINCT State FROM `CITYSTATE`", $conn);
                        if (mysql_num_rows($query)) {
                            $select= '<select name=\"State\">';
                            while ($result = mysql_fetch_array($query)) {
                                echo '<option value="'.$result['State'].'">'.$result['State'] . '</option>';
                            }
                        }
                    ?>
            </select>
        </div>
    <br>
    <div class="form-group" name="Zipcode"style="text-align: center;">
        <p>Zip Code: </p>
        <input type="number" name="Zipcode" required="" class="form-group">


<p style="text-align: center;"><input type="submit"  value="Submit" /> </p>
    </form>



<form action="AddDataPoint.php" method="POST">
    <p style="text-align: center;"><input type="submit" value="Back" /> </p>
</form>
