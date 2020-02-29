<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';
  require  'dompdf/autoload.inc.php';

?>
<?php
 session_start();
 if(isset($_SESSION["doorno"]))
{

//index.php

$message = '';
$doorno = $_SESSION["doorno"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "society";
//$output = "";
$connect = mysqli_connect("localhost", "root", "", "society");  
function fetch_customer_data($connect)
{
      $output = ''; 
      $doorno= $_SESSION["doorno"];
      $_SESSION["lastdue"] = $_SESSION["lastdue"] - $_SESSION["fine"];
      $sql = "SELECT * FROM transaction WHERE DoorNo='$doorno'";  
      $result = mysqli_query($connect, $sql);  

       $output = '

 <div class="table-responsive" align="center" >
  <table class="table table-striped table-bordered">
  <tr>
    <th>Door ID</th><th>'.$doorno.'</th>
  </tr>
  <tr>
    <th>Transaction ID</th><th>'.$_SESSION["TransactionId"].'</th>
  </tr>
   <tr>
    <th>Late fine</th><th>'.$_SESSION["fine"].'</th>
  </tr>
  <tr>
    <th>Previous Dues </th><th>'.$_SESSION["lastdue"].'</th>
  </tr>
  <tr>
    <th>Monthly Maintaince Charge </th><th>'.$_SESSION["mmc"].'</th>
  </tr>
  <tr>
    <th>Amount to be Paid</th><th>'.$_SESSION["totaldue"].'</th>
  </tr>
  <tr>
    <th>Total paid</th><th>'.$_SESSION["paid"].'</th>
  </tr>
  <tr>
    <th>Next Due Amount</th><th>'.$_SESSION["newdue"].'</th>
  </tr>
  </table>
  Thank You 
 </div><br></br>
 ';
 /*foreach($result as $row)
 {
  $output .= '
   <tr>
    <td>'.$_SESSION["fine"].'</td>
    <td>'.$_SESSION["lastdue"].'</td>
    <td>'.$_SESSION["totaldue"].'</td>
    <td>'.$_SESSION["paid"].'</td>
   </tr>
  ';
 }*/
 //$output .= 
 return $output;
}

if(isset($_POST["action"]))
{
 include('pdf.php');
 $file_name = md5(rand()) . '.pdf';
 $html_code = '<link rel="stylesheet" href="bootstrap.min.css">';
 $html_code .= fetch_customer_data($connect);
 $pdf = new Pdf();
 $pdf->load_html($html_code);
 $pdf->render();
 $file = $pdf->output();
 file_put_contents($file_name, $file);
 
 $sql = "SELECT * FROM member WHERE doorno='$doorno'";  
  $result = mysqli_query($connect, $sql);
  $row = mysqli_fetch_assoc($result);
  $email = $row["email"];

 $mail = new PHPMailer;
 $mail->IsSMTP();        //Sets Mailer to send message using SMTP
 $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true; 
        $mail->SMTPAutoTLS = false;                 // Enable SMTP authentication
        $mail->Username   = 'Alpharecon2345@gmail.com';                     // SMTP username
        $mail->Password   = '';                               // SMTP password enter ur password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;                                    // TCP port to connect to
        $mail->SMTPOptions = array(
          'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
          )  
        );

        //Adds a "To" address
        $mail->setFrom('lordbuchu@gmail.com', 'Mailer');
        $mail->addAddress($email);
 $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
 $mail->IsHTML(true);       //Sets message type to HTML    
 $mail->AddAttachment($file_name);         //Adds an attachment from a path on the filesystem
 $mail->Subject = 'Payment Details';   //Sets the Subject of the message
 $mail->Body = 'Please Find Payment details in attach PDF File.';    //An HTML or plain text message body
 if($mail->Send())        //Send an Email. Return true on success or false on error
 {
  $message = '<label class="text-success">Payment Details has been send successfully...</label>';
  ?><script type="text/javascript">alert("<?php echo "Payment Details has been send successfully"; ?>");</script>
  <?php
  header("Location:userpage.php");
 }
 unlink($file_name);
}
?>
<html>
 <head>
  <title>Create Dynamic PDF Send As Attachment with Email in PHP</title>
  <script src="jquery.min.js"></script>
  <link rel="stylesheet" href="bootstrap.min.css" />
  <script src="bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container" >
   <h3 align="center">Payment Details</h3>
   <br />

   <form method="post" align="center">
    <input type="submit" name="action" class="btn btn-danger" value="PDF Send" /><?php echo $message; ?>
   </form>
   <br />
   <?php
   echo fetch_customer_data($connect);
   ?>   
  </div>
  <br />
  <br />
 </body>
</html>
<?php
} else
{
  header("Location: http://localhost/society1/login.php");
}
?>