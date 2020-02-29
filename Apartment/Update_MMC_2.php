<?php
  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname="society";

$mmc = $_POST["set_mmc"];

$conn = new mysqli($servername, $username, $password,$dbname);
  // Check connection
  if ($conn->connect_error) 
  {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "UPDATE transactionhistory SET MMC='$mmc' ";
  if ($conn->query($sql) === TRUE) 
  {
    echo "MMC Updated successfully";
    header("Location: http://localhost/society1/treasurer.php#UpdateMMC");
  } 
  else 
  {
    echo "Error updating record: " . $conn->error;
  }

  $conn->close();

  ?>