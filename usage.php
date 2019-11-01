<?php
include 'connection.php';
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/responsive-slider.css" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">
    <title>Pest Management</title>

    <style>
      body {
      font-family: 'Nunito', sans-serif;
    }
    </style>
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
	<div style="margin-top: 5px;">
		<h3 style="padding-top: 10px; text-align: center;">Pesticide Usage</h3>
	</div>
	<div style="margin-top:20px; margin-bottom: 15px;">
	<hr style="width: 50%;">
		<form>
			<input type="text" placeholder="SEARCH" id="searchtable" onkeyup="searchfun()" style="width: 100%; height: 50px;">
		</form>
	</div>

<?php
echo "<div style=\" margin-top:20px;\">";
echo "<table class=\"table table-striped\" id=\"mytable\">
 <thead class=\"thead-dark\">
<tr>
<th>Pesticide_name</th>
<br>
<th>Crops</th>
<th>Dosage</th>
</thead>
</tr>
<br>";

$sql="select product_name,crops,dosage from product_detail pd, pesticide_usage pu WHERE pd.product_id=pu.product_id;";
$result=mysqli_query($con,$sql);
#$check=mysqli_num_rows($result);

	while($c=mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>".$c['product_name']."</td>";
		echo "<td>".$c['crops']."</td>";
		echo "<td>".$c['dosage']."</td>";
		echo "</tr>";


	}
	echo "</table>";

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

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
	$(document).ready(function() {
    $('#mytable').DataTable();
} );
</script>

<script>
function  searchfun(){
	 let filter=document.getElementById('searchtable').value.toUpperCase();
	 let myTable=document.getElementById('mytable');
	 let tr=myTable.getElementsByTagName('tr');
     //document.write(tr.length);
	 for(var i=0;i<tr.length;i++)
	 {
	 	let td=tr[i].getElementsByTagName('td')[0];
	 	if(td)
	 	{
	 		let textvalue=td.textContent || td.innerHTML;
	 		if(textvalue.toUpperCase().indexOf(filter)>-1)
	 		{
	 			tr[i].style.display="";

	 		}
	 		else
	 		{
	 			tr[i].style.display="none";
	 		}
	 	}
	 }
}
</script>

</body>
</html>