<?php 

if (isset($_GET['door_no']) && !isset($_GET['empid']))
    {
        $doorno = $_GET['door_no'];
        //$doorno=$_SESSION["doorno"];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname="society";
    // Create connection
        $conn = new mysqli($servername, $username, $password,$dbname);
        $sql = "DELETE FROM member WHERE doorno='$doorno'";
        $result= mysqli_query($conn,$sql);
        
          echo "<meta http-equiv='refresh' content='0'>";
          header("Location: userpagesec.php");
        //}     
        
    }

    if (!isset($_GET['door_no']) && isset($_GET['empid']))
    {

        $empid = $_GET['empid'];
        //$doorno=$_SESSION["doorno"];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname="society";
    // Create connection
        $conn = new mysqli($servername, $username, $password,$dbname);
        $sql = "DELETE FROM employee WHERE EmpID='$empid'";
        $result= mysqli_query($conn,$sql);
        
          echo "<meta http-equiv='refresh' content='0'>";
          header("Location: userpagesec.php");
    }
?>
