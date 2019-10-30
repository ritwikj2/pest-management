<?php
include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<!--<link rel="stylesheet" type="text/css" href="stylesheet.php">-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/responsive-slider.css" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet">
</head>
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
                <li role="presentation"><a href="dealer.php">Nearest Dealer</a></li>
                <li role="presentation"><a href="search1.php">Search Pesticide</a></li>
                <li role="presentation"><a href="user.php">My Pesticide</a></li>
                <li role="presentation"><a href="aboutus.html">About Us</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>

  <div class="container">
	<div class="text-center" style="background-color: #ccff99; margin-bottom:10px;">
		<h3 style="font-size: 30px; ">Search Dealer</h3> 
	</div>
	
	<?php 
	$sql="select distinct(city) from dealer_address";
	$result=mysqli_query($con,$sql);
	
    echo "<div style=\"margin-top:40px;margin-left:200px;  \">";
	echo "<form action='dealer.php' method='GET'>";
echo "<label for='city' style='font-size:20px;'>Select your city name:</label>";
echo "<select name='city' class=\"btn btn-danger dropdown-toggle\" >";
while($d=mysqli_fetch_array($result,MYSQLI_NUM))
{

	echo "<option class=\"dropdown-item\"  value=\"$d[0]\">".$d[0]."</option>";
	
}

echo "<div>";
echo "<input type=\"submit\" value=\"Search\" class=\"btn btn-primary\" style=\"margin-left:50px;\">";
echo "</div>";
echo "<br>";
echo ""."<br>"."</form>";
?>
<br>
<br>


<?php
if(isset($_GET['city']))
{


$cityname=$_GET['city'];
$sql='select dealer_name,shop_name,phone_no,city,landmark,zip_code,state from dealer_details dd,dealer_address da where dd.dealer_license=da.dealer_license && da.city="'.$cityname.'";';
$result=mysqli_query($con,$sql);
$check=mysqli_num_rows($result);
if($check>0)
{
	echo "<table class=\"table table-striped\">
	<thead class=\"thead-dark\">
<tr>
<th>Dealer_name</th>
<th>Shop_name</th>
<th>Phone_no</th>
<th>City</th>
<th>Landmark</th>
<th>Zip_code</th>
<th>State</th>
</thead>
</tr>";
}

	while($b=mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>".$b['dealer_name']."</td>";
		echo "<td>".$b['shop_name']."</td>";
		echo "<td>".$b['phone_no']."</td>";
		echo "<td>".$b['city']."</td>";
		echo "<td>".$b['landmark']."</td>";
		echo "<td>".$b['zip_code']."</td>";
		echo "<td>".$b['state']."</td>";
		echo "</tr>";
	}
	echo "</table>";
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