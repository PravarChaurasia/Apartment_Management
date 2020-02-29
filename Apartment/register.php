<!DOCTYPE html>
<html>
<head>          
<title>Registeration</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!-- font awesome script -->
  <script src="https://kit.fontawesome.com/49f472c2b6.js"></script>

  <style>
  	.main1{
  text-align: center;
  padding:5vh 1vw;
  float: right;
  width:100vw;
  height: 100vh;
  display: block;
  /*background-color: rgb(0, 118, 222);*/
  background-image: url("back1.jpg");
  color:Black;
	}
.chart{
  background-color: rgba(240, 240, 240,0.9);
  padding:2vw;
  border-radius: 1vw;
  margin-left: 25vw;
  margin-top: 10vh;
  text-align: center;
  width: 50vw;
}
  </style>
</head>
 <?php
 if(isset($_POST['form_submitted']))
 {
  echo "once submitted";
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname="society";
  // Create connection
  $conn = new mysqli($servername, $username, $password,$dbname);
  // Check connection
  if ($conn->connect_error) 
  {
    die("Connection failed: " . $conn->connect_error);
  }
  else 
  {
   $doorno=$_POST['doorno'];
   $email=$_POST['email'];
   $phone=$_POST['phonenumber'];  
   $sql = "INSERT INTO register (doorno,email,phone) VALUES('$doorno','$email','$phone')";
    if ($conn->query($sql) === TRUE) 
    {
      echo "New record created successfully";
    } 
    else 
    {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
  $conn->close();
   } 
 }
?>
<body> 
    <div class="main1" id="Skills">
    <div class='chart'>
    	<h2>Registration</h2>
     	<form action="register.php" method="POST">
     		<div class="form-group">
	    	<label>Door No</label>
	    	<input type="text" class="form-control" id="door" name="doorno" required pattern="[0-9][-][NEWS][-][0-9]{2}[-][0-9]{3}[/][0-9]{2}">
	  		</div>
	  		<div class="form-group">
	    	<label for="email">Email address</label>
	    	<input type="email" class="form-control" id="email" name="email" required>
	  		</div>
        <div class="form-group">
        <label >Phone Number</label>
        <input type="tel" class="form-control" id="phone" name="phonenumber" required pattern="[789][0-9]{9}">
        </div>
	  		<button type="submit" class="btn btn-primary" name="form_submitted">Submit</button>
		</form>
    </div>
	</div>
</body>
</html>