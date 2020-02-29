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
  margin-left: 5vw;
  margin-right: 5vw;
  width: auto;
}
 </style>
</head>
<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
          
  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';
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
          $email=$_POST['email'];
          $phone=$_POST['phonenumber'];  
          $sql = "SELECT * FROM member WHERE doorno='$doorno' AND email='$email'";
          if ($result=mysqli_query($conn,$sql)) 
          {
              $rowcount=mysqli_num_rows($result);
              if($rowcount==1)
                {
                  $sqlc="SELECT password FROM member WHERE doorno='$doorno'";
                  $result = mysqli_query($conn, $sqlc);
                if (mysqli_num_rows($result) > 0) 
                  {
                    $row = mysqli_fetch_assoc($result); 
                      $random=$row["password"];
                  try{
                        $mail=new PHPMailer(true);
                        $mail->isSMTP();
                        $mail->SMTPAuth=true;
                        $mail->SMTPSecure='ssl';
                        $mail->Host='smtp.gmail.com';
                        $mail->Port='465';
                        $mail->isHTML(true);
                        $mail->Username='Alpharecon2345@gmail.com';
                        $mail->Password=''; //type ur password
                        $mail->SetFrom('Alpharecon2345@gmail.com');
                        $mail->Subject='Galaxy Account Password Set';
                        $mail->Body='<body>
                                        <div align="center">
                                          <h3>Please set your account password</h3>
                                        </div>
                                        <p>your OTP :'.$random.' <br>
                                        click on the link below for account verification<br>
                                        http://localhost/society1/otp.php?doorno='.$doorno.'
                                        </p>
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
          else
          {
            echo "Error: " . $sql . "<br>" .mysqli_error($conn);
          }
        $conn->close();    
      }        
  }                    

?>
<body >
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
      <li class="active"><a href="registern.php"><i class="fas fa-user"></i>&nbsp;Sign Up</a></li>
      <li><a href="login.php"><i class="fas fa-sign-in-alt"></i>&nbsp;Login</a></li>
    </ul>
  </div>
</nav>
<div class="chart" style="width:60vw;margin-left: 18vw;margin-top: 10vh;">
	<h2>Registration</h2>
      <form action="registern.php" method="POST">
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
</body>
</html>