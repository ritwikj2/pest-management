<?php

include('connection.php');


?>


<!DOCTYPE HTML>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/responsive-slider.css" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet">

</head>

<style>

.search-btn{
	background-color: #6D9C91;
	display:inline;
	padding: 20px;
	height: 60px;
	text-align: center;
	font-size: 25px;
	color:white;
	border-radius: 10px;
}
			
.search-btn:hover
{
  background-color: #a1e3d4;
  color: black;
}

</style>

<body>

<header>
    <div class="container">
      <div class="row">
        <nav class="navbar navbar-default" role="navigation">
          <div class="container-fluid">
            <div class="navbar-header">
              <div class="navbar-brand">
                <a href="/">
                  <h1>Pest Management</h1>
                </a>
              </div>
            </div>
            <div class="menu">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="index.html">Home</a></li>
                <li role="presentation"><a href="nearestdealer.html">Nearest Dealer</a></li>
                <li role="presentation"><a href="searchpesticide.html">Search Pesticide</a></li>
                <li role="presentation"><a href="mypesticide.html">My Pesticide</a></li>
                <li role="presentation"><a href="aboutus.html">About Us</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>
  
<div class="container text-center">

<form action="" method="POST">

<input type="text" placeholder="Enter crop name" name="crop" style="width: 50%; height: 50px;">
<input type="submit" name="boton" value="Search" class="search-btn" style="margin-left:50px;">

</form>


<?php
if(isset($_POST['boton']))
{
	$crop=$_POST['crop'];
	
    $sql="select product_name,quantity,company,price from product_detail pd,pesticide_usage pu where pd.product_id=pu.product_id and pu.crops like '%$crop%';";
    $temp=mysqli_query($con,$sql);
    $check=mysqli_num_rows($temp);
    if($check>0)
    {
    	$sql1="select product_name,quantity,company,price from product_detail pd,pesticide_usage pu where pd.product_id=pu.product_id and pu.crops like '%$crop%' union select product_name,quantity,company,price from product_detail pd,pesticide_usage pu where pd.product_id=pu.product_id and pu.crops like '%any_crops%';";
        $temp2=mysqli_query($con,$sql1);


 echo "<div style=\" margin-left:0px; \">";
echo "<table class=\"table table-striped\">
<thead class=\"thead-dark\">
<tr>
<th >Product Name</th>
<th>Quantity</th>
<th>Company</th>
<th >Price</th>
</thead>
</tr>";
}
else
{
	echo '<script> alert("data not found");</script>';
	exit();
}

$check1=mysqli_num_rows($temp2);
if($check1>0)

{
	while($b=mysqli_fetch_array($temp2))

	{
			
					//echo "<tr><td>".$a['product_name']."</tr><td>".$a['quantity']."</tr><td>".$a['company']."</tr><td>".$a['price']."</td></tr>";
			//echo  $a['product_name'] ;
	 	echo "<tr>";
		echo "<td>".$b['product_name']."</td>";
		echo "<td>".$b['quantity']."</td>";
		echo "<td>".$b['company']."</td>";
		echo "<td>".$b['price']."</td>";
		echo "</tr>";

	}
	echo "</table>";
}
echo "</div>";

}
?>

</div>

<footer>
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <ul class="social-network">
              <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-1x"></i></a></li>
              <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-1x"></i></a></li>
              <li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin fa-1x"></i></a></li>
              <li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest fa-1x"></i></a></li>
              <li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus fa-1x"></i></a></li>
            </ul>
          </div>
          <div class="col-lg-12">
            <div class="copyright">
              <div class="credits">
                <p style="color: white;"><strong>Designed by Jayesh, Ritwik and Dhanush</strong></p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </footer>

</body>
</html>