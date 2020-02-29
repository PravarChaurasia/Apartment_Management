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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
          
  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';
$doorno=$_GET['doorno'];
?>
<body>
<div class="chart" style="width:50vw;margin-left: 22vw;margin-top: 15vh;">
  <h2>Account verification</h2>
      <form action="" method="POST">
        <div class="form-group">
        <label for="pwd">Door No</label>
        <input type="text" class="form-control" name="doorno" value="<?php echo $doorno; ?>" readonly>
        </div>
        <div class="form-group">
        <label for="otp">Enter OTP</label>
        <input type="text" class="form-control" id="otp" name="otp" required>
        </div>
        <button type="submit" class="btn btn-primary" name="acc_submitted">Submit</button>
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
      <p>please check your mail box for further instruction.</p>
      <p><a href="http://localhost/society/login.php"><button type="button" class="btn btn-primary"><i class="fab fa-telegram-plane"></i>&nbsp;Login</button></a></p>
    </div>
    <div class="modal-footer">
      <br>
    </div>
  </div>

</div>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <h2>Galaxy appartment</h2>
    </div>
    <div class="modal-body">
      <p>check ur mail box for changing password</p>
      <p><a href="http://localhost/society1/index.html"><button type="button" class="btn btn-primary"><i class="fab fa-telegram-plane"></i>&nbsp;Login</button></a></p>
    </div>
    <div class="modal-footer">
      <br>
    </div>
  </div>

</div>
<?php
if(isset($_POST['acc_submitted']))
 {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="society";
    $doorno=$_POST['doorno'];
    $otp=$_POST['otp'];
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);
    // Check connection
    if ($conn->connect_error) 
      { 
        die("Connection failed: " . $conn->connect_error);
      }
    else
      { 
        
        $sql = "SELECT * FROM member WHERE doorno='$doorno' AND password='$otp'";
          if ($result=mysqli_query($conn,$sql)) 
          {
              $rowcount=mysqli_num_rows($result);
              if($rowcount==1)
                {
                  $sqla="SELECT email FROM member WHERE doorno='$doorno' AND password='$otp'";
                  if ($result=mysqli_query($conn,$sqla)) 
                      {
                        $rowcounta=mysqli_num_rows($result);
                        if($rowcounta==1)
                          {
                            $row =mysqli_fetch_assoc($result);
                            $email=$row['email'];
                            try{
                                $mail=new PHPMailer(true);
                                $mail->isSMTP();
                                $mail->SMTPAuth=true;
                                $mail->SMTPSecure='ssl';
                                $mail->Host='smtp.gmail.com';
                                $mail->Port='465';
                                $mail->isHTML(true);
                                $mail->Username='Alpharecon2345@gmail.com';
                                $mail->Password='alpha@recon@2';
                                $mail->SetFrom('Alpharecon2345@gmail.com');
                                $mail->Subject='Galaxy Account Password Set';
                                $mail->Body='<body>
                                        <div align="center">
                                          <h3>Please set your account password</h3>
                                        </div>
                                        <p>dear member residing at door no '.$doorno.' please change your password by clicking on the link below<br>
                                        http://localhost/society1/setpassword.php?doorno='.$doorno.'</p>
                                      </body>';
                                $mail->AltBody='This is the body in plain text for non-html clients';
                                $mail->AddAddress($email);
                                
                                $mail->Send();
                                ?><script type="text/javascript">alert("please check your mail-box for further instruction")</script> <?php
                            }
                          catch(Exception $e)
                            {
                                echo "Message could not be sent. Mailer Error:{$mail->ErrorInfo}";
                            }
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