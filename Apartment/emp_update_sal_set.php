<?php
  
// if(isset($_GET['request']))
// {
  // $Id = $_GET['request'];
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname="society";

  $updated_sal= $_POST['updated_salary'];
  $EmpID= $_POST['EmpID'];
  

  // Create connection
  $conn = new mysqli($servername, $username, $password,$dbname);
  // Check connection
  if ($conn->connect_error) 
  {
    die("Connection failed: " . $conn->connect_error);
  }
  

  $sql = "UPDATE employee SET Salary=$updated_sal WHERE EmpID=$EmpID ";
  if ($conn->query($sql) === TRUE) 
  {
    echo "Salary Updated successfully";
    header("Location: http://localhost/society1/treasurer.php#ViewUpdateEmpSal");
  } 
  else 
  {
    echo "Error updating record: " . $conn->error;
  }

  $conn->close();
// }
?>