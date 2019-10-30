<?php
include 'connection.php'
?>
<!DOCKTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.php">
</head>
<body>

<?php
$type=$_GET['pesttype'];
//echo $type;
//$con=mysqli_connect("localhost","root","","pesticide");
$sql= 'select product_name,quantity,company,price from product_detail where product_type="'.$type.'";';
$result=mysqli_query($con,$sql);
//echo "$result";
echo "<table border='1'>
<tr height=50>
<th >Product Name</th>
<th>Quantity</th>
<th>Company</th>
<th width=50>Price</th>
</tr>";

$check=mysqli_num_rows($result);
if($check>0)

{
	while($a=mysqli_fetch_array($result))

	{
			
					//echo "<tr><td>".$a['product_name']."</tr><td>".$a['quantity']."</tr><td>".$a['company']."</tr><td>".$a['price']."</td></tr>";
			//echo  $a['product_name'] ;
		echo "<tr height=80>";
		echo "<td>".$a['product_name']."</td>";
		echo "<td>".$a['quantity']."</td>";
		echo "<td>".$a['company']."</td>";
		echo "<td>".$a['price']."</td>";
		echo "</tr>";

	}
	echo "</table>";
}



?>

</body>