<?php
include ("connection.php");
if(isset($_POST['updatedata']))
{
	$pname=$_POST['pname'];
	$cname=$_POST['cname'];
	$coname=$_POST['comp'];
	$fid="1";
	$query="UPDATE my_pest set crops='$cname' where fid='$fid' and pestname='$pname' and company='$coname'";
	$result=mysqli_query($con,$query);
	if($result)
	{
		echo '<script> alert("Data updated");</script>';
		header('Location:user.php');

	}
	else
	{
		echo '<script> alert("data not found");</script>';
	}
}
?>