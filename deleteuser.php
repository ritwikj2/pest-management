<?php
include ("connection.php");


if(isset($_POST['deletedata']))
{
	$pname=$_POST['pname'];
	$cname=$_POST['cname'];
	$coname=$_POST['comp'];
	$fid="1";
	$query="DELETE from my_pest where  fid='$fid' and pestname='$pname' and company='$coname'";
	$result=mysqli_query($con,$query);
	if($result)
	{

			echo '<script> alert("Data deleted");</script>';
		header('Location:user.php');

	}
	else
	{
		echo '<script> alert("data not found");</script>';
	}
}
?>
