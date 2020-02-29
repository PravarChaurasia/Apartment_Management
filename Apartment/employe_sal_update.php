<?php

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
  
  $sql = "SELECT EmpID,Designation,Salary FROM `employee`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>

    <table width="100%">
      <tbody>
        <tr>
          <td><?php echo $row["EmpID"]; ?></td>
          <td><?php echo $row["Designation"]; ?></td>
          <!-- <td><?php echo $row["Salary"]; ?></td> -->
          <td><input type="text" name="updated_salary" id=updated_salary></td>

          <?php 
          session_start(); 
          // $updated_sal= updated_salary;
          $_SESSION['updated_sal']='$updated_salary'; ?>

          <td><a href="emp_update_sal_set.php?request=<?php echo $row["EmpID"]; ?>">submit</a></td>
          
        </tr>
      </tbody>
    </table>
    
    <?php

    }
} else {
    echo "No pending Requests";
}
$conn->close();


?>

