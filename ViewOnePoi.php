<?php
include 'connect.php';

$Location = $_POST['Location'];
?>

 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="/resources/demos/style.css">
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script>
   $( function() {
     $(".datepicker" ).datepicker({
       showOn: "button",
       buttonImage: "images/calendar.gif",
       buttonImageOnly: true,
       buttonText: "Select date",
       dateFormat: "yy-mm-dd"
     });
    // $("input.datepicker").on("keyup change", function(){
    //     var a = prompt("Enter the time as hh-mm-ss", "00-00-00");
    //     var date = $(this).val();
    //     $("input").val(date + " " + a)
    // });
   });
   </script>

 </head>



<form action="ShowOnePoiTable.php" method="POST">
<h2 style="text-align: center;"><span style="color: #0000ff;"><strong>POI Detail</strong></span></h2>

<center>
    <div class="form-group" style="text-align: center;"><label class="col-md-4 control-label" for="Type">Type: </label>
            <select id="Type" class="form-control" name="Type">
                <option value="Choose Here">Choose here</option>
                <option value="1">Mold</option>
                <option value="2">Air Quality</option>
            </select>
        </div>
    <br>

    <div class="form-group" style="text-align: center;"><label class="control-label" for="DataValueMin">Data Value: </label>
        <div class="yo" style="text-align: center;"><input id="DataValueMin" class="form-control input-md" name="DataValueMin" type="number" placeholder="Type here" /></div>
    </div>to

    <div class="form-group" style="text-align: center;"><label class="control-label" for="DataValueMax"> </label>
        <div class="yo" style="text-align: center;"><input id="DataValueMax" class="form-control input-md" name="DataValueMax" type="number" placeholder="Type here" /></div>
    </div><br>

    <div class="form-group" style="text-align: center;"><label class="col-md-4 control-label" for="DATETIME">Date Flagged? </label>
        <select name="DATETIME">
            <option value="Choose Here">Choose here</option>
                <?php
                include 'connect.php';
                //echo 'location: ' $Location;
                mysql_select_db("cs4400_62", $conn);
                $query = mysql_query("SELECT DISTINCT DATETIME FROM `POI` NATURAL JOIN `DATAPOINT` WHERE POI_LOCATION='$Location'", $conn);
                    if (mysql_num_rows($query)) {
                        $select= '<select name=\"DATETIME\">';
                        while ($result = mysql_fetch_array($query)) {
                            echo '<option value="'.$result['DATETIME'].'">'.$result['DATETIME'].'</option>';
                        }
                    }
                ?>
            <!-- <option selected enabled>Choose here</option> -->
            <!-- <option value="DateFlagged"></option> -->
        </select>
    </div><br>

    <p style="text-align: center;"><input type="submit" value="Apply Filter" /> </p>
</form>

<form action="ViewOnePoi.php" method="POST">
    <p style="text-align: center;"><input type="submit" value="Reset Filter" /> </p>
</form>
