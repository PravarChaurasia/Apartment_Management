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
      <li><a href="registern.php"><i class="fas fa-user"></i>&nbsp;Sign Up</a></li>
      <li class="active"><a href="login.php"><i class="fas fa-sign-in-alt"></i>&nbsp;Login</a></li>
    </ul>
  </div>
</nav>
<div class="chart" style="width:50vw;margin-left: 22vw;margin-top: 18vh;">
  <h2>Login</h2>
      <form action="" method="POST">
        <div class="form-group">
        <label for="pwd">Door No</label>
        <input type="text" class="form-control" name="doorno" value="<?php if(isset($_POST['doorno'])){ echo $_POST['doorno']; } ?>" required  pattern="[0-9][-][NEWS][-][0-9]{2}[-][0-9]{3}[/][0-9]{2}">
        </div>
        <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary" name="form_submitted">Submit</button>
    </form>
    <em id="error" style="display:none;color: red;">password or username is not matching</em>
</div>
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
    $sql = "SELECT * FROM member WHERE doorno='$doorno' AND password='$password'";
    $result=$conn->query($sql);
    if ($result) 
    {
      if ($result->num_rows > 0) 
        {
          $row = $result -> fetch_assoc();
          if($row["type"]=="u")
          {
            session_start();
            $_SESSION["doorno"] = $doorno;
            header("Location: http://localhost/society1/userpage.php");
          }
          if($row["type"]=="s")
          {
            session_start();
            $_SESSION["doorno"] = $doorno;
            header("Location: http://localhost/society1/userpagesec.php");
          }
          if($row["type"]=="o")
          {
            session_start();
            $_SESSION["doorno"] = $doorno;
            header("Location: http://localhost/society1/officer.php");
          }
          if($row["type"]=="p")
          {
            session_start();
            $_SESSION["doorno"] = $doorno;
            header("Location: http://localhost/society1/president.php");
          }
          if($row["type"]=="t")
          {
            session_start();
            $_SESSION["doorno"] = $doorno;
            header("Location: http://localhost/society1/treasurer.php");
          }
        }
      else
       {
         ?><script type="text/javascript">
          document.getElementById("error").style.display="block";
         </script> <?php
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
</body>
</html>