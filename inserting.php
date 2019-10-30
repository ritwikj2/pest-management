<?php
include "connection.php";
if(isset(($_POST['insertdata'])))
{
 $pest_name=$_POST['pname'];
 $crop_name=$_POST['cname'];
 $comp_name=$_POST['comp'];

 $cuur_date=date("y-m-d");

$sql ="insert into my_pest values(1,'$pest_name','$crop_name','$comp_name','$cuur_date')";
 #$sql="insert into my_pest values(1,'$pest_name','$crop_name',$comp_name','$cuur_date')";
 #$sql="insert into my_pest values(1,'wert','qazxcv','poiuytf','2019-11-11')";
 $result=mysqli_query($con,$sql);
 if($result)
 {
 	echo '<script> alert("data saved");</script>';
    header('Location:user.php');
 }
 else
 {
 	echo '<script> alert("data not saved");</script>';
 }
 
}
?>