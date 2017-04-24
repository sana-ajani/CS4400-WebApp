<?php
//print_r($_POST);
include "connect.php";
if (isset($_POST["accept"])) {
    if(gettype($_POST['Selected'])=="array"){
        $a=array();
    foreach($_POST['Selected'] as $val){

     $id_c=$val;
     //array_push($a,$id_c);
     //$query="update table set status='Active' where id='".$id_c."'";
     mysql_select_db("cs4400_62", $conn);
     $sql = "UPDATE `CITYOFFICIAL` SET Approved='1' WHERE Username='$id_c' ";
     $email=mysql_query($sql, $conn) or trigger_error(mysql_error()." ".$query);
    }
    //print_r($a);
    }

} else {
    if(gettype($_POST['Selected'])=="array"){
        $a=array();
    foreach($_POST['Selected'] as $val){

     $id_c=$val;
     //array_push($a,$id_c);
     //$query="update table set status='Active' where id='".$id_c."'";
     mysql_select_db("cs4400_62", $conn);
     $sql = "UPDATE `CITYOFFICIAL` SET Approved='0' WHERE Username='$id_c' ";
     $email=mysql_query($sql, $conn) or trigger_error(mysql_error()." ".$query);
    }
    //print_r($a);
    }
}







?>
