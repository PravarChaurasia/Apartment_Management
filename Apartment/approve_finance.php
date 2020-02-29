<?php

if(isset($_GET['request']))
{
  $Id = $_GET['request'];
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
  

  $sql = "UPDATE fundrequest SET Status='Approved' WHERE RequestId='$Id' ";
  if ($conn->query($sql) === TRUE) 
  {
    echo "Letter Approved successfully";
    header("Location: http://localhost/society1/president.php#ApprovePayments");
  } 
  else 
  {
    echo "Error updating record: " . $conn->error;
  }

  $conn->close();
}








?>