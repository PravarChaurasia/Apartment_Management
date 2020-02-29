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
  
  $sql = "SELECT DoorNo,TransactionId,MMC,DueAmount,Fine,TotalAmount FROM `transactionhistory`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>
       
    <table width="100%">
      <tbody>
        <tr>
          <th>DoorNo</th>
          <th>TransactionID</th>
          <th>MMC</th>
          <th>DueAmount</th>
          <th>Fine</th>
          <th>TotalAmount</th>
        </tr>
        <tr>
          <td><?php echo $row["DoorNo"]; ?></td>
          <td><?php echo $row["TransactionId"]; ?></td>
          <td><?php echo $row["MMC"]; ?></td>
          <td><?php echo $row["DueAmount"]; ?></td>
          <td><?php echo $row["Fine"]; ?></td>
          <td><?php echo $row["TotalAmount"]; ?></td>
         
          
          <!-- <td><a href="employee_sal_update.php?request=<?php echo $row["EmpID"]; ?>">update</a></td> -->
          
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

