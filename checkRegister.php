<?php

include 'connect.php';



$Username = $_POST['Username'];
$Email = $_POST['EmailAddress'];
$Password = $_POST['Password'];
$ConfirmPassword = $_POST['ConfirmPassword'];
$UserType = $_POST['UserType'];
$City = $_POST['City'];

$State = $_POST['State'];
$Title = $_POST['Title'];


if ($Password != $ConfirmPassword) {
        header("Location:http://localhost/PasswordMismatch.php");
        exit;
}

mysql_select_db("cs4400_62", $conn);
$query = mysql_query("SELECT * FROM `USER` WHERE Username='$Username'", $conn) or trigger_error(mysql_error()." ".$query);

    if (mysql_num_rows($query) != 0) {
        header("Location:http://localhost/RegisterUserExists.php");
        exit;
    }

mysql_select_db("cs4400_62", $conn);
$query = mysql_query("SELECT Email FROM `USER` WHERE Email='$Email'", $conn) or trigger_error(mysql_error()." ".$query);

    if (mysql_num_rows($query) != 0) {
          header("Location:http://localhost/RegisterEmailExists.php");
          exit;
    }

//insert user into User Table and City Official Table if user is city Official
//insert into just user table if user is city scientist

    if ($UserType == "City Scientist") {
        mysql_select_db("cs4400_62", $conn);
        $query = mysql_query("INSERT INTO `USER` VALUES ('$Username', '$Email', '$Password', '$UserType')", $conn) or trigger_error(mysql_error()." ".$query);
         header("Location:http://localhost/AddDataPoint.php");
         exit;
    } else if ($UserType == "City Official"){
        mysql_select_db("cs4400_62", $conn);
        $sql = mysql_query("SELECT * FROM `CITYSTATE` WHERE City='$City' AND State='$State'", $conn);

        if (mysql_num_rows($sql) > 0) {
            $query = mysql_query("INSERT INTO `USER` VALUES ('$Username', '$Email', '$Password', '$UserType')", $conn) or trigger_error(mysql_error()." ".$query);
            $query = mysql_query("INSERT INTO `CITYOFFICIAL`(`Username`, `Title`, `Approved`, `CS_City`, `CS_State`) VALUES ('$Username', '$Title', NULL, '$City', '$State')", $conn) or trigger_error(mysql_error()." ".$query);
            header("Location:http://localhost/CityOfficial.php");
            exit;
        } else {

             header("Location:http://localhost/WrongCityState.php");
            exit;
        }
    } else {
        header("Location:http://localhost/Empty.php");
       exit;
    }

 ?>
