<?php

include 'connect.php';

$Username = $_POST['Username'];
$Password = $_POST['Password'];

if ($Username == "" || $Password == "") {
    header("Location:http://localhost/InvalidLoginCredentials.php");
    exit;
}
//check if the user exists
mysql_select_db("cs4400_62", $conn);
$query = mysql_query("SELECT * FROM `USER` WHERE Username='$Username'", $conn) or trigger_error(mysql_error()." ".$query);


  if (mysql_num_rows($query) == 0)
  {
        header("Location:http://localhost:81/NoUserExists.php");
        exit;
  }

  else
  {
      //check if user and password match
      mysql_select_db("cs4400_62", $conn);
      $query = mysql_query("SELECT * FROM `USER` WHERE Username='$Username' AND Password='$Password'", $conn) or trigger_error(mysql_error()." ".$query);
      if (mysql_num_rows($query) > 0) {
          //the username and password matches so login is successful. now check the usertype to know which GUI to redirect to

          //check if user is admin
            mysql_select_db("cs4400_62", $conn);
            $query = mysql_query("SELECT * FROM `USER` WHERE Username='$Username' AND Password='$Password' AND UserType='Admin'", $conn) or trigger_error(mysql_error()." ".$query);
            if (mysql_num_rows($query) > 0) {
                //the password matches so login is successful. now check the usertype to know which GUI to redirect to
                header("Location:http://localhost/AdminPage.php");
                exit;
            }

            //check if user is city scientist. if so, redirect to add data point page
              mysql_select_db("cs4400_62", $conn);
              $query = mysql_query("SELECT * FROM `USER` WHERE Username='$Username' AND Password='$Password' AND UserType='City Scientist'", $conn) or trigger_error(mysql_error()." ".$query);
              if (mysql_num_rows($query) > 0) {
                  //the password matches so login is successful. now check the usertype to know which GUI to redirect to
                  header("Location:http://localhost/AddDataPoint.php");
                  exit;
              }

              //check if user is city scientist. if so, redirect to add data point page
                mysql_select_db("cs4400_62", $conn);
                $query = mysql_query("SELECT * FROM `USER` WHERE Username='$Username' AND Password='$Password' AND UserType='City Official'", $conn) or trigger_error(mysql_error()." ".$query);
                if (mysql_num_rows($query) > 0) {
                    //the password matches so login is successful. now check the usertype to know which GUI to redirect to
                    header("Location:http://localhost/CityOfficial.php");
                    exit;
                }


      } else {
          header("Location:http://localhost/WrongPass.php");
          exit;
      }





  }

  //enter a query to check the type of the User and redirect to appropriate page


 ?>
