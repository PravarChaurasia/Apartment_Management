<?php

if(isset($_GET['door_no']))
{
  $Id = $_GET['door_no'];
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


  $sql = "UPDATE letter SET status='-1' WHERE Id='$Id' ";
  if ($conn->query($sql) === TRUE) 
  {
    echo "Letter Approved successfully";
    header("Location: http://localhost/society1/president.php#ViewApproveDocument");
  } 
  else 
  {
    echo "Error updating record: " . $conn->error;
  }

  $conn->close();
}








?>