<?php
include "connection.php";
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

 <!-- The insert Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        	<h3>MY Pesticides</h3>
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <form action="inserting.php" method="POST">
        <div class="modal-body">
        	
          	<div class="form-group">
 				<label for="pestname">Enter pesticide name: </label>
 				<input type="text" name="pname" id="pestname">
 			</div>
 			<div class="form-group">
 				<label for="cropname">Applied on: </label>
 				<br>
 				<input type="text" name="cname" id="cropname">
 			</div>
 			<div class="form-group">
 				<label for="company">Product company:</label>
 				<input type="text" name="comp" id="company">
 			</div>
 				
 			
        </div>
        
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" name="insertdata" class="btn btn-dark">Submit</button>
        </div>
        </form>
        
      </div>
    </div>
  </div>
<!-- ########################################################################################################-->
<!-- The edit Modal -->
  <div class="modal fade" id="editmodal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        	<h3>Edit Pesticides</h3>
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <form action="updatedata.php" method="POST">
        <div class="modal-body">
        	
          	<div class="form-group">
 				<label>Pesticide name: </label>
 				<input type="text" name="pname" id="pestid">
 			</div>
 			<div class="form-group">
 				<label>Crops: </label>
 				<br>
 				<input type="text" name="cname" id="cropid">
 			</div>
 			<div class="form-group">
 				<label >Product company:</label>
 				<input type="text" name="comp" id="compid">
 			</div>
 				
 			
        </div>
        
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" name="updatedata" class="btn btn-secondary">Save Changes</button>
        </div>
        </form>
        
      </div>
    </div>
  </div>

  <!--############################################################################################################-->

<!-- ########################################################################################################-->
<!-- The delete Modal -->
  <div class="modal fade" id="deletemodal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        	<h3>Delete Pesticides</h3>
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <form action="deleteuser.php" method="POST">
        <div class="modal-body">
        	<h4>Do you want to delete this data???</h4>
        	
          	<div class="form-group">
 				
 				<input type="hidden" name="pname" id="pestusn">
 			</div>
 			<div class="form-group">
 				
 				<br>
 				<input type="hidden" name="cname" id="cropusn">
 			</div>
 			<div class="form-group">
 				
 				<input type="hidden" name="comp" id="compusn">
 			</div>
 				
 			
        </div>
        
        
        <!-- Modal footer -->
        <div class="modal-footer">
         <button type="button" name="updatedata" class="btn btn-secondary" data-dismiss="modal">No</button> 
           <button type="submit" name="deletedata" class="btn btn-primary" >Yes</button>
        </div>
        </form>
        
      </div>
    </div>
  </div>

 <div style="background-color: #6D9C91;">
 <div style="padding-top: 20px;">
 	<h2 style="text-align: center;">Used Pesticides</h2>
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-dark glyphicon glyphicon-plus" data-toggle="modal" data-target="#myModal" style="margin-left: 1200px; margin-bottom: 10px;">
    New
  </button>
</div>
</div>



 <?php
$b="Update";
$m="Delete";


 echo "<table class=\"table table-striped\">
 <thead>
 <tr>
 <th>Pesticide name</th>
 <th>Crops</th>
 <th>Company name </th>
 <th>Date</th>
 <th>Update</th>
 <th>Delete</th>
 </tr>
 </thead>";

 echo "<tbody>";
$sql1="SELECT * FROM my_pest";
	$result1=mysqli_query($con,$sql1);
	$check=mysqli_num_rows($result1);
	if($check>0)
	{

    
	while($c=mysqli_fetch_array($result1))
	{
		echo "<tr>";
		echo "<td>".$c['pestname']."</td>";
		echo "<td>".$c['crops']."</td>";
		echo "<td>".$c['company']."</td>";
		echo "<td>".$c['boughtdate']."</td>";
		#echo "<td>"."<input type=\"submit\" value=\"Edit\" class=\"editbtn\">"."</td>";
         echo "<td>"."<button type=\"button\" class=\"btn btn-primary editbtn\">".$b."</button>"."</td>";
         echo "<td>"."<button type=\"button\" class=\"btn btn-danger deletebtn\">".$m."</button>"."</td>";      
		
		echo "</tr>";


	}
	
}
echo "</tbody>";

echo "</tabel>";

?>

  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
	$(document).ready(function(){
		$('.deletebtn').on('click',function(){

			$('#deletemodal').modal('show');
			$tr=$(this).closest('tr');
			var data=$tr.children("td").map(function(){

				return $(this).text();
			}).get();
			console.log(data);
			$('#pestusn').val(data[0]);
			$('#cropusn').val(data[1]);
			$('#compusn').val(data[2]);
		
        });
	});
</script>


<script>
	$(document).ready(function(){
		$('.editbtn').on('click',function(){

			$('#editmodal').modal('show');
			$tr=$(this).closest('tr');
			var data=$tr.children("td").map(function(){

				return $(this).text();
			}).get();
			console.log(data);
			$('#pestid').val(data[0]);
			$('#cropid').val(data[1]);
			$('#compid').val(data[2]);
		
        });
	});
</script>

	
</body>

</html>