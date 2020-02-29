const doorno = document.getElementById('doorno');
const submit = document.getElementById('submit_form');

doorno.addEventListener('keyup', function (event) {
  isValidEmail = emailField.checkValidity();
  
  if ( isValidEmail ) {
    submit.disabled = false;
  } else {
    submit.disabled = true;
  }
});
//remove error reporting
 // Turn off all error reporting
error_reporting(0);

AIzaSyAmNduDRkMLxbTZT4DlF8Zfu5BCc6iEFzQ

https://api.maptiler.com/maps/streets/?key=ppEBj9QuSXhmCByPwzFh#1.8/65.98974/75.24724


<!DOCTYPE html>
<html>
<head>          
<title>Login</title>
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
    $password=$_POST['password'];
    $sql = "SELECT * FROM login WHERE doorno='$doorno' AND password='$password'";
    $result=$conn->query($sql);
    if ($result) 
    {
      if ($result->num_rows > 0) 
        {
          echo "user is present";
        }
      else
       {
         echo "user is not present";
       } 
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
    	<h2>Login</h2>
     	<form action="login.php" method="POST">
     		<div class="form-group">
	    	<label for="pwd">Door No</label>
	    	<input type="text" class="form-control" name="doorno" required required pattern="[0-9][-][NEWS][-][0-9]{2}[-][0-9]{3}">
	  		</div>
	  		<div class="form-group">
	    	<label for="password">Password</label>
	    	<input type="password" class="form-control" id="password" name="password" required>
	  		</div>
	  		<button type="submit" class="btn btn-primary" name="form_submitted">Submit</button>
		</form>
    </div>
	</div>
</body>
</html>



<body>
                      <div align="center">
                        <h3>Please set your account password</h3>
                      </div>
                      <p>dear member residing at door no '.$doorno.' please change your password by clicking on the link below<br>
                      http://localhost/society/setpassword.php?doorno='.$doorno.'&email='.$email.'</p>
                    </body>



                     $mail->Username   = 'Alpharecon2345@gmail.com';                     // SMTP username
                    $mail->Password   = 'alpha@recon';

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
   $sql = "SELECT * FROM member WHERE doorno='$doorno'";
    if ($result=mysqli_query($conn,$sql)) 
    {
      $rowcount=mysqli_num_rows($result);
      if($rowcount==1)
      {
        } 
    else 
    {
    echo "Error: " . $sql . "<br>" .mysqli_error($conn);
    }
  $conn->close();
   } 
 }