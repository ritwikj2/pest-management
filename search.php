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
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/responsive-slider.css" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">
    <title>Pest Management</title>
	<!--<link rel="stylesheet" type="text/css" href="stylesheet.php">-->
</head>
<!--<body class="center">
<form action="datasearch.php" method="GET">
<label >Which type of pesticide you need?</label>
<select name="pesttype">
	<option value="Insecticide">Insecticide</option>
	<option value="Alge">Algeacide</option>
	<option value="wetting">Wetting Agent</option>
	<option value="fungi">Fungicide</option>
	<option value="Bio Pesticide">Bio Pesticide</option>


</select>
<br>
<br>
<button class="search" type="submit" name="search" value="chin">Search</button>
</form>


</body>
-->

<style>

  body {
      font-family: 'Nunito', sans-serif;
    }
  .search-btn {
      padding: 10px 20px;
      font-size: 15px;
      background: #fff;
      color: #272727;
      border-radius: 0;
      text-transform: uppercase;
      border: 1px solid #6d9c91;
  }

  .search-btn:hover {
      color: #fff;
      border-color: #fff;
      background: #6d9c91;
      -webkit-transition: color 300ms, background-color 300ms;
      -moz-transition: color 300ms, background-color 300ms;
      -o-transition: color 300ms, background-color 300ms;
      transition: color 300ms, background-color 300ms;
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
  <center>
	<div style="background-color: #6d9c91; margin-bottom:20px; padding: 15px; width: 300px;">
  <h3 style="font-size: 30px; color: white;">Search Pesticide</h3> 
      </center>
	</div>
	
	
	<?php
	
	$sql="select distinct(product_type) from product_detail;";
	$result=mysqli_query($con,$sql);
	echo "<div style=\"margin-top:40px;margin-left:200px;  \">";
	echo "<form action='search.php' method=\"GET\">";
	echo "<label for='type' style='font-size:20px; '>Select the pesticide type </label>";
	echo "<select name='type' class=\"btn dropdown-toggle\" style=\"margin-left:10px;\">";
	echo "</div>";
	while($d=mysqli_fetch_array($result,MYSQLI_NUM))
{

	echo "<option class=\"dropdown-item\" value=\"$d[0]\" style='font-family:geneva'>".$d[0]."</option>";
	
}

?>
<div>

<br>

<?php
echo "<br>";
echo "<input type=\"submit\" value=\"Search\"class=\"search-btn\" style=\"margin-left:50px;\">";

echo "</div>";
echo ""."<br>"."</form>";
?>





<?php
if(isset($_GET['type']))
{
$type=$_GET['type'];


//echo $type;
//$con=mysqli_connect("localhost","root","","pesticide");
$sql= 'select product_name,quantity,company,price from product_detail where product_type="'.$type.'";';
$result=mysqli_query($con,$sql);

//echo "$result";
echo "<div style=\" margin-left:0px; \">";
echo "<table class=\"table table-striped\">
<thead class=\"thead-dark\">
<tr>
<th >Product Name</th>
<th>Quantity</th>
<th>Company</th>
<th width=50>Price</th>
</thead>
</tr>";
}
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
echo "</div>";


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








