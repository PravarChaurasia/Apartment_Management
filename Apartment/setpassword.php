<html>
<head>
<title>galaxy</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!-- font awesome script -->
  <script src="https://kit.fontawesome.com/49f472c2b6.js"></script>
  
 <style>
 body
 {
  background-image: url("back3.jpg");
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  height:100%;
 }
 .chart{
  background-color: rgba(240, 240, 240,0.9);
  padding:2vw;
  border-radius: 1vw;
  text-align: center;
  width: auto;
}
.modal {
  display: none /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  -webkit-animation-name: fadeIn; /* Fade in the background */
  -webkit-animation-duration: 0.4s;
  animation-name: fadeIn;
  animation-duration: 0.4s
}

/* Modal Content */
.modal-content {
  position: fixed;
  bottom: 50vh;
  margin-left: 10vw;
  background-color: #fefefe;
  width: 80vw;
  -webkit-animation-name: slideIn;
  -webkit-animation-duration: 0.4s;
  animation-name: slideIn;
  animation-duration: 0.4s
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

/* Add Animation */
@-webkit-keyframes slideIn {
  from {bottom: -300px; opacity: 0} 
  to {bottom: 0; opacity: 1}
}

@keyframes slideIn {
  from {bottom: -300px; opacity: 0}
  to {bottom: 0; opacity: 1}
}

@-webkit-keyframes fadeIn {
  from {opacity: 0} 
  to {opacity: 1}
}

@keyframes fadeIn {
  from {opacity: 0} 
  to {opacity: 1}
}
 </style>
</head>
<?php
$doorno=$_GET['doorno'];
?>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand active"  href="index.html">Galaxy Apartment</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="apartment.html">Apartment Info</a></li>
      <li><a href="committee.html">Committee information</a></li>
      <li><a href="contact.html">contact us</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="registern.php"><i class="fas fa-user"></i>&nbsp;Sign Up</a></li>
      <li><a href="login.php"><i class="fas fa-sign-in-alt"></i>&nbsp;Login</a></li>
    </ul>
  </div>
</nav>
<div class="chart" style="width:50vw;margin-left: 22vw;margin-top: 15vh;">
  <h2>Set Account Password</h2>
      <form action="" method="POST">
        <div class="form-group">
        <label for="pwd">Door No</label>
        <input type="text" class="form-control" name="doorno" value="<?php echo $doorno; ?>" readonly>
        </div>
        <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
        <label for="cpassword">Confirm Password</label>
        <input type="password" class="form-control" id="cpassword" name="cpassword" required>
        </div>
        <input type="hidden" name="randompass" value="<?php echo $mpassword; ?>">
        <button type="submit" class="btn btn-primary" name="form_submitted">Submit</button>
    </form>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <h2>Galaxy appartment</h2>
    </div>
    <div class="modal-body">
      <p>Conrgratulation your password is set sucessfully, click below for login</p>
      <p><a href="http://localhost/society/login.php"><button type="button" class="btn btn-primary"><i class="fab fa-telegram-plane"></i>&nbsp;Login</button></a></p>
    </div>
    <div class="modal-footer">
      <br>
    </div>
  </div>

</div>
<?php
if(isset($_POST['form_submitted']))
 {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="society";
    $doorno=$_POST['doorno'];
    $mpassword=$_POST['randompass'];
    $npassword=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);
    // Check connection
    if ($conn->connect_error) 
      { 
        die("Connection failed: " . $conn->connect_error);
      }
    else
      { 
        
        $sql = "SELECT * FROM member WHERE doorno='$doorno'";
          if ($result=mysqli_query($conn,$sql)) 
          {
              $rowcount=mysqli_num_rows($result);
              if($rowcount==1)
                {
                  if($npassword==$cpassword)
                    {
                      $sqla="UPDATE member SET password='$npassword' WHERE doorno='$doorno'";
                       if(mysqli_query($conn,$sqla))
                        {
                           ?><script type="text/javascript">
                            document.getElementById("myModal").style.display="block";
                            </script><?php
                        }
                        else
                        {
                          echo "error";
                        }
                    }
                } 
          }      
         $conn->close();
      }
  }    
?>
</body>
</html>