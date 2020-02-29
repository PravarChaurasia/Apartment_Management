<?php

if(isset($_GET['door_no']))
{
  $doorno = $_GET['door_no'];
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


  $sql = "UPDATE member SET type='r' WHERE doorno='$doorno' ";
  if ($conn->query($sql) === TRUE) 
  {
    echo "Member Rejected successfully";
    header("Location: http://localhost/society1/president.php#ApproveMembers");
    
  } 
  else 
  {
    echo "Error updating record: " . $conn->error;
  }

  $conn->close();
}
