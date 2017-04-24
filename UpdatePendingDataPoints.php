<?php
include "connect.php";//print_r($_POST);
if (isset($_POST["accept"])) {
if(gettype($_POST['Selected'])=="array" && gettype($_POST['Selected2'])=="array"){
    $a=array();
    $b=array();
foreach($_POST['Selected'] as $val){

 $id=$val;
 array_push($a,$id);

 //$query="update table set status='Active' where id='".$id_c."'";
}

foreach($_POST['Selected2'] as $val2){

 $id2=$val2;
 array_push($b, $id2);
 //$query="update table set status='Active' where id='".$id_c."'";
}

}


for ($i = 0; $i < count($a); $i++) {


    mysql_select_db("cs4400_62", $conn);
    $sql = "UPDATE `DATAPOINT` SET Accepted='1' WHERE Username=$a[$i] AND DATETIME=$b[$i] ";

    $email=mysql_query($sql, $conn);

}

} else {
    for ($i = 0; $i < count($a); $i++) {


        mysql_select_db("cs4400_62", $conn);
        $sql = "UPDATE `DATAPOINT` SET Accepted='0' WHERE Username='$a[$i]' AND `DATETIME`=$b[$i] ";
        $email=mysql_query($sql, $conn) ;

    }
}

?>
