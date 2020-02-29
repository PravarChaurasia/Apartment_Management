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
  <form class="upd_sal_form" method="POST" action="emp_update_sal_set.php" >
    <table width="100%">
      <tbody>
        <tr>
          <td><input type="text" name="EmpID" id="EmpID" value="<?php echo $row["EmpID"]; ?>" readonly>  </td>
          <td><?php echo $row["Designation"]; ?></td>
          <td><?php echo $row["Salary"]; ?></td>
          <td><input type="text" name="updated_salary" id="updated_salary" value=""></td>
          <td><input type="submit" name="submit"></td>

          

          <!-- <td><a href="emp_update_sal_set.php?request=<?php echo $row["EmpID"]; ?>">submit</a></td> -->
          
        </tr>
      </tbody>
    </table>
  </form> 
    <?php

    }
} else {
    echo "No pending Requests";
}
$conn->close();


?>

