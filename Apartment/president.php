<!DOCTYPE html>
<?php
 session_start();
 if(isset($_SESSION["doorno"]) && !empty($_SESSION["doorno"]))
{
?>
<html>
<head>
  <title>Mohammad rahil</title>
<!-- online style links for the bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!-- font awesome script -->
  <script src="https://kit.fontawesome.com/49f472c2b6.js"></script>
  
  <link href="css/user.css" rel="stylesheet" type="text/css">

  <!-- for font family -->
  <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">


  <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1.0">

  <!-- script for the type writing effect -->
  <script >
  var TxtType = function(el, toRotate, period) {
  this.toRotate = toRotate;
  this.el = el;
  this.loopNum = 0;
  this.period = parseInt(period, 10) || 2000;
  this.txt = '';
  this.tick();
  this.isDeleting = false;
  };

  TxtType.prototype.tick = function() {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
    this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
    this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

    var that = this;
    var delta = 200 - Math.random() * 100;

    if (this.isDeleting) { delta /= 2; }

    if (!this.isDeleting && this.txt === fullTxt) {
    delta = this.period;
    this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
    this.isDeleting = false;
    this.loopNum++;
    delta = 500;
    }

    setTimeout(function() {
    that.tick();
    }, delta);
  };

  window.onload = function() {
    var elements = document.getElementsByClassName('typewrite');
    for (var i=0; i<elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-type');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
          new TxtType(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
    document.body.appendChild(css);
  };
  </script>
  <style>
  table, td {
  padding:0.7vh;
  }
  #pmsg
  {
    display: none;
  }
  .chart
  {
    height: 90vh;
    overflow: auto;
  }
  </style>
</head>
<?php
 session_start();
 if(isset($_SESSION["doorno"]) && !empty($_SESSION["doorno"]))
  {
    $doorno=$_SESSION["doorno"];
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
      $sql = "SELECT * FROM member WHERE doorno='$doorno'";
      if ($result=mysqli_query($conn,$sql)) 
      {
        $rowcount=mysqli_num_rows($result);
          if($rowcount==1)
            {
              $row = mysqli_fetch_assoc($result);
              $name=$row['name'];
              $profile=$row['profilepic'];
              $phone=$row['phone'];
              $email=$row['email'];
              $fathername=$row['fathername'];
              $mothername=$row['mothername'];
              $occupation=$row['occupation'];  
              $contactaddress=$row['contactaddress'];
              $permanentaddress=$row['permanentaddress'];
              $flatstatus=$row['flatstatus'];
              $adhar=$row['adharcard'];
              $addressproof=$row['addressproof'];
              $saledeed=$row['saledeed'];        
            }
          $sqlc="SELECT * FROM complaint WHERE doorno='$doorno'";
          if($resultc=mysqli_query($conn,$sqlc))
          {
            $rowcount_comp=mysqli_num_rows($resultc);
          }
          if($flatstatus=="tenant")
          {
            $sqla = "SELECT * FROM tenant WHERE doorno='$doorno'";
            if ($resulta=mysqli_query($conn,$sqla)) 
                {
                  $rowcounta=mysqli_num_rows($resulta);
                  if($rowcounta==1)
                    {
                      $rowa = mysqli_fetch_assoc($resulta);
                      $tenant_name=$rowa['name'];
                      $tenant_phone=$rowa['phone'];
                      $tenant_email=$rowa['email'];
                      $tenant_fathername=$rowa['fathername'];
                      $tenant_mothername=$rowa['mothername'];
                      $tenant_occupation=$rowa['occupation'];
                      $tenant_profile=$rowa['profilepic'];
                      $tenant_adhar=$rowa['adharcard'];
                      $tenant_address=$rowa['addressproof'];
                    }
                }     

          } 
      }
         
    } 
  }
?>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" style="margin-bottom:0;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand " href="index.html">Galaxy Apartments</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="apartment.html">Apartment Info</a></li>
      <li><a href="committee.html">Committee information</a></li>
      <li><a href="contact.html">contact us</a></li>
    </ul>
  <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a></li>
    </ul>
  </div>
</nav>
<!-- side navigation bar -->

<div class="sidenav" style="padding-top: 1vh;">
  <img src="<?php echo $profile; ?>" class="i-circle" alt="Cinque Terre" width="130px" height="130px">
  <p class="name"><?php echo $name; ?></p>
  <a href="#About"><i class="fas fa-user-tie"></i>&nbsp;Profile</a>
  <a href="#Skills"><i class="fas fa-keyboard"></i>&nbsp;Edit Profile </a>
  <a href="#Education"><i class="fas fa-pen-fancy"></i>&nbsp;Complaints</a>
  <a href="#Maintenance"><i class="fas fa-rupee-sign"></i>&nbsp;Maintenance Payement</a>
  <a href="#Projects"><i class="fas fa-key"></i>&nbsp;Change Password</a>
  <a href="#Contact"><i class="fas fa-bed"></i>&nbsp;Tenant's Details</a>
  <a href="#ViewComplain"><i class="fas fa-pen-fancy"></i>&nbsp;View Complaints</a>
  <a href="#ViewMembers"><i class="fas fa-user-tie"></i>&nbsp;View Members</a>
  <a href="#ApproveMembers"><i class="fas fa-keyboard"></i>&nbsp;Approve Members</a>
  <a href="#ViewApproveDocument"><i class="fas fa-keyboard"></i>&nbsp;View/Approve Document</a>
  <a href="#FinancialStatus"><i class="fas fa-rupee-sign"></i>&nbsp;FinancialStatus</a>
  <a href="#ApprovePayments"><i class="fas fa-rupee-sign"></i>&nbsp;Approve Payments</a>

</div>
  <!-- View Complaint -->

  <div class="main1" style="padding: 2vw;" id="ViewComplain">
      <div class="chart" style="color:black">
        <h2>
        Complains
        </h2>
        <table width="100%" id="customers">
      
        <tr>
          <th>Door No</th>
          <th>Date</th>
          <th>Type</th>
          <th>Problem</th>
          

        </tr>
        
      
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
  
  $sql = "SELECT doorno,date,complaintid,type,problem FROM `complaint` WHERE status='filed'";
$result = $conn->query($sql);
if(isset($_POST['submit']))
{
  $var = $_POST['type'];
   
  $sql = "SELECT doorno,date,complaintid,type,problem FROM `complaint` WHERE status='filed' AND type = '$var'   ";
  $result = $conn->query($sql);
}

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      ?>
        <style type="text/css">#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}</style>
    
      

        <tr>
          <td><?php echo $row["doorno"]; ?></td>
          <td><?php echo $row["date"]; ?></td>
          <td><?php echo $row["type"]; ?></td>
          <td><?php echo $row["problem"]; ?></td>
          
        </tr>
      
    
        
        <?php
    }
} else {
    echo "0 results";
}
$conn->close();


?>
</table>
</br></br>
<form name="Type_filter" method="Post" action="">
Filer By:
<select name="type">
  <option value="electric">electric</option>
  <option value="civil">civil</option>
  <option value="plumbing">plumbing</option>
  <option value="facility">facility</option>
  <option value="miscellaneous">miscellaneous</option>
</select>
<input type="submit" name="submit" class="btn btn-success" value="Filter" >
</form>



      </div>
  </div>



<!-- Approve Paymets -->
<div class="main1" style="padding: 2vw;" id="ApprovePayments">
      <div class="chart" style="color:black">
        <h2>
          Approve Payments
        </h2>
    <table width="100%" id="customers">
          <tr>
          
          <th>Department</th>
          <th>Reason</th>
          <th>Amount</th>
          <th>Approve</th>
        </tr>
        
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
  
 $sql = "SELECT Department,EmployeeId,Reason,Amount,RequestID  FROM `fundrequest` WHERE Status='pending'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>
     <style type="text/css">#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}</style>  
    
        
        <tr>
          <td><?php echo $row["Department"]; ?></td>
          <td><?php echo $row["Reason"]; ?></td>
          <td><?php echo $row["Amount"]; ?></td>
          
          <td><a href="approve_finance.php?request=<?php echo $row["RequestID"]; ?>">Approve Fund</a></td>
          
        </tr>
      

    
    <?php

    }
} else {
    echo "No pending Requests";
}
 



$conn->close();


?>
    </table>
      </div>
</div>        



<!--FinancialStatus -->
<div class="main1" style="padding: 2vw;" id="FinancialStatus">
      <div class="chart" style="color:black">
        <h2>
          Financial Status
        </h2>
        <table width="100%" id="customers">
          <tr>
          <th>Request ID</th>
          <th>Department</th>
          <th>Reason</th>
          <th>Amount</th>

        </tr>
        
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
  
$sql = "SELECT Department,EmployeeId,Reason,Amount,RequestID  FROM `fundrequest` WHERE Status='Approved'";
$result = $conn->query($sql);
$final = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      ?>
      <style type="text/css">#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4CAF50;
  color: white;
}</style>  
    
        
        <tr>
          <td><?php echo $row["RequestID"]; ?></td>
          <td><?php echo $row["Department"]; ?></td>
          <td><?php echo $row["Reason"]; ?></td>
          <td><?php echo $row["Amount"]; ?></td>
          
          
          
          
        </tr>
      
    
    

        </br>
      </br>
        <?php
        $final = $final + $row["Amount"];
    }
    
} else {
    echo "No Expense Till Now";
}

$conn->close();


?>


</table>
<table width="100%" id="customers">
<tr>
  <th><?php echo "Total Expense Till Now   ". $final ?></th>
</tr>  
</table>
      </div>
</div>          




<!--Approve Document -->
<div class="main1" style="padding: 2vw;" id="ViewApproveDocument">
      <div class="chart" style="color:black">
        <h2>
        View/Approve Document
        </h2>
        <table width="100%" id="customers">
          <tr>
          <th>ID</th>
          <th>Subject</th>
          <th>File</th>
          <th>Receiver</th>
          <th>View</th>
          <th>Approve</th>
          <th>Reject</th>
        </tr>
        
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

$sql = "SELECT id,subject,File,reciever FROM `letter` WHERE status='0' ";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    ?>
    <style type="text/css">#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}</style>
    
      


        <tr>
          <td><?php echo $row["id"]; ?></td>
          <td><?php echo $row["subject"]; ?></td>
          <td><?php echo $row["File"]; ?></td>
          <td><?php 

            if($row["reciever"]=='0')
            {
              echo 'Broadcast';
            }
            else
            echo $row["reciever"]; ?></td>
          <td><a href="<?php echo $row["File"]; ?>" target="_blank">View Document</a></td>
          <td><a href="approve_doc.php?door_no=<?php echo $row["id"]; ?>">Approve Document</a></td>
          <td><a href="reject_doc.php?door_no=<?php echo $row["id"]; ?>">Reject Document</a></td>
        </tr>
      
    
    
    <?php    
    }
} 

else {
    echo "No Pending Document !!!";
}





$conn->close();


?>
</table>
      </div>
</div>        

<!-- Approve Members -->
<div class="main1" style="padding: 2vw;" id="ApproveMembers">
      <div class="chart" style="color:black">
        <h2>
        Approve Members
        </h2>
        <table id="customers">
          <tr>
          <th>Door NO</th>
          <th>Name</th>
          <th>View </th>
          <th>Approve</th>
          <th>Reject</th>

        </tr>
        
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

$sql = "SELECT doorno,name,phone,email,flatstatus FROM `member` WHERE type='m' ";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    ?><style type="text/css">#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}</style>
    
      
                
        <tr>
          <td><?php echo $row["doorno"]; ?></td>
          <td><?php echo $row["name"]; ?></td>
           <td><a href="view_profile.php?door_no=<?php echo $row["doorno"]; ?>" target="_blank">View Profile</a></td>
          <td><a href="approve_profile.php?door_no=<?php echo $row["doorno"]; ?>">Approve Profile</a></td>
          <td><a href="reject_profile.php?door_no=<?php echo $row["doorno"]; ?>">Reject Profile</a></td>
        </tr>
      
    
    
    <?php    
    }
} 

else {
    echo "Every Profile is approved";
}
$conn->close();
?>
</table>
      </div>  
</div>



  <!-- View Members -->

<div class="main1" style="padding: 2vw;" id="ViewMembers">
      <div class="chart" style="color:black">
        <h2>
        Members
        </h2>
        <table width="100%" id="customers">
          <tr>
          <th>Door No</th>
          <th>Name</th>
          <th>View</th>
          

        </tr>
        
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
  
  $sql = "SELECT doorno,name,phone,email,flatstatus FROM `member` ";
  $result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      ?>
        <style type="text/css">#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}</style>
    
      
        
        <tr>
          <td><?php echo $row["doorno"]; ?></td>
          <td><?php echo $row["name"]; ?></td>
          <td><a href="view_profile.php?door_no=<?php echo $row["doorno"]; ?>" target="_blank">View Profile</a></td>
          
        </tr>
      
    
    <?php
    }
    
} else {
    echo "0 results";
}
$conn->close();


?>
</table>
      </div>
</div>      
  








    
  <!-- ABOUT -->

  <div class="main1" style="padding: 2vw;" id="About">
      <div class="chart" style="color:black">
        <h2>
        User Profile
        </h2>
        <table style="width:100%;font-size:1.5vw;">
          <tr>
            <td>Doorno</td>
            <td><?php echo $doorno; ?></td>
          </tr>
          <tr>
            <td>Name</td>
            <td><?php echo $name; ?></td>
          </tr>
          <tr>
            <td>Phone</td>
            <td><?php echo $phone; ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><?php echo $email; ?></td>
          </tr>
          <tr>
            <td>Father Name</td>
            <td><?php echo $fathername; ?></td>
          </tr>
          <tr>
            <td>Mother Name</td>
            <td><?php echo $mothername; ?></td>
          </tr>
          <tr>
            <td>Occupation</td>
            <td><?php echo $occupation; ?></td>
          </tr>
          <tr>
            <td>Contact Address</td>
            <td><?php echo $contactaddress ?></td>
          </tr>
          <tr>
            <td>Permanent Address</td>
            <td><?php echo $permanentaddress ?></td>
          </tr>
          <tr>
            <td>Flat status</td>
            <td><?php echo $flatstatus ?></td>
          </tr>
          <tr>
            <td>Adhar Info</td>
            <td><a href="<?php echo $adhar ?>"  target="_blank"><button type="button" class="btn btn-success">click to view</button></a></td>
          </tr>
          <tr>
            <td>Address Proof</td>
            <td><a href="<?php echo $addressproof ?>"  target="_blank"><button type="button" class="btn btn-success">click to view</button></a></td>
          </tr>
          <tr>
            <td>sales deed</td>
            <td><a href="<?php echo $saledeed ?>"  target="_blank"><button type="button" class="btn btn-success">click to view</button></a></td>
          </tr>
        </table>

      </div>
  </div>

  <!-- SKILLS -->

  <div class="main1" style="display:block;" id="Skills">
    <div class='chart'>
      <h2>Edit Profile</h2>
        <form action="" method="POST" name="eform">
        <div class="form-group">
        <label for="doorno">Doorno</label>
        <input type="text" class="form-control" name="doorno" value="<?php echo $doorno; ?>" readonly>
        </div>
        <div class="form-group">
        <label for="Username">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $name; ?>" readonly>
        </div>
        <div class="form-group">
        <label for="fathername">father name</label>
        <input type="text" class="form-control" id="nfather" name="nfather" required>
        </div>
        <div class="form-group">
        <label for="mothername">Mother name</label>
        <input type="text" class="form-control" id="nmother" name="nmother" required>
        </div>
        <div class="form-group">
        <label for="permanentaddress">permanent address</label>
        <input type="text" class="form-control" id="npaddress" name="npaddress" required>
        </div>
        <button type="submit" class="btn btn-primary" name="form_edit"><i class="far fa-paper-plane"></i>&nbsp;Submit</button>
    </form>
    </div>
  </div>
  
  <div class="main1" style="display: block;" id="Education">
    <div class='chart'>
      <h2>Complaints
      </h2>
      <div class="tab">
        <button class="tablinks" id="status" onclick="openCity(event, 'Compalintstatus')"><i class="fas fa-scroll"></i>&nbsp;Complaint Status</button>
        <button class="tablinks" onclick="openCity(event, 'Electric')"><i class="fas fa-bolt"></i>&nbsp;Electric</button>
        <button class="tablinks" onclick="openCity(event, 'Civil')"><i class="fas fa-house-damage"></i>&nbsp;Civil</button>
        <button class="tablinks" onclick="openCity(event, 'Plumbing')"><i class="fas fa-tools"></i>&nbsp;Plumbing</button>
        <button class="tablinks" onclick="openCity(event, 'Facility')"><i class="fas fa-universal-access"></i>&nbsp;Facility</button>
        <button class="tablinks" onclick="openCity(event, 'Miscellaneous')"><i class="fas fa-bullhorn"></i>&nbsp;Miscellaneous</button>
      </div>
      <div id="Compalintstatus" class="tabcontent">
        <h3>Compalint Status</h3>
        <?php if($rowcount_comp>0)
         {
          ?>
        <table class="table table-hover" style="text-align: left;">
          <thead>
            <tr>
              <th>complaint-id</th>
              <th>date</th>
              <th>type</th>
              <th>problem</th>
              <th>status</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row_comp = mysqli_fetch_assoc($resultc)) { ?>
            <tr>
              <td><?php  echo $row_comp['complaintid'];  ?></td>
              <td><?php  echo $row_comp['date']; ?></td>
              <td><?php  echo $row_comp['type']; ?></td>
              <td><?php  echo $row_comp['problem']; ?></td>
              <td><?php  echo $row_comp['status']; ?></td>
            </tr>
          </tbody>
        <?php } ?>
        </table>
        <?php
          }
          else
           {
            ?><p>NO Complaint registered</p><?php
           } 
          ?> 
    </div>
      <div id="Electric" class="tabcontent">
        <h3>File Electric Complaint</h3>
        <form action="" method="POST" name="electric_eform">
          <label for="comment">Description</label>
          <textarea class="form-control" rows="5" name="electric_dis"></textarea>
          <br>
          <button type="submit" class="btn btn-primary" name="electric_com"><i class="far fa-paper-plane"></i>&nbsp;Submit</button>
        </form> 
      </div>
      <div id="Civil" class="tabcontent">
        <h3>File Civil Complaint</h3>
        <form action="" method="POST" name="civil_eform">
          <label for="comment">Description</label>
          <textarea class="form-control" rows="5" name="civil_dis"></textarea>
          <br>
          <button type="submit" class="btn btn-primary" name="civil_com"><i class="far fa-paper-plane"></i>&nbsp;Submit</button>
        </form>
      </div>
      <div id="Plumbing" class="tabcontent">
        <h3>File Plumbing Complaint</h3>
        <form action="" method="POST" name="pumbing_eform">
          <label for="comment">Description</label>
          <textarea class="form-control" rows="5" name="plumbing_dis"></textarea>
          <br>
          <button type="submit" class="btn btn-primary" name="plumbing_com"><i class="far fa-paper-plane"></i>&nbsp;Submit</button>
        </form>
      </div>
      <div id="Facility" class="tabcontent">
        <h3>File Facility Complaint</h3>
        <form action="" method="POST" name="facility_eform">
          <label for="comment">Description</label>
          <textarea class="form-control" rows="5" name="facility_dis"></textarea>
          <br>
          <button type="submit" class="btn btn-primary" name="facility_com"><i class="far fa-paper-plane"></i>&nbsp;Submit</button>
        </form>
      </div>
      <div id="Miscellaneous" class="tabcontent">
        <h3>File Miscellaneous Complaint</h3>
        <form action="" method="POST" name="miscellaneous_eform">
          <label for="comment">Description</label>
          <textarea class="form-control" rows="5" name="miscellaneous_dis"></textarea>
          <br>
          <button type="submit" class="btn btn-primary" name="miscellaneous_com"><i class="far fa-paper-plane"></i>&nbsp;Submit</button>
        </form>
      </div>
    </div>
  </div>

  <!-- PROJECTS -->

  <div class="main1" style="display:block;" id="Projects">
    <div class='chart' >
      <h2 style="margin-bottom: 3vh;">Change Password
      </h2>
      <form action="" method="POST">
        <div class="form-group">
        <label for="password">Old Password</label>
        <input type="password" class="form-control" id="opassword" name="opassword" required>
        </div>
        <div class="form-group">
        <label for="password">New Password</label>
        <input type="password" class="form-control" id="npassword" name="npassword" required>
        </div>
        <div class="form-group">
        <label for="cpassword">Confirm New Password</label>
        <input type="password" class="form-control" id="cpassword" name="cpassword" required>
        </div>
        <input type="hidden" name="randompass" value="<?php echo $mpassword; ?>">
        <button type="submit" class="btn btn-primary" name="pass_submitted"><i class="far fa-paper-plane"></i>&nbsp;Submit</button>
        <div  id="pmsg">
          <p> password changed successfully</p>
        </div>
    </form>
    </div>
  </div>

  <!-- CONTACTS -->

  <div class="main1" style="display:block;" id="Contact">
    <div class="chart">
     <h2>
        Tenants Details
      </h2>
      <?php
      if($flatstatus=="tenant")
      {
      ?>
      <div>
        <img src="<?php echo $tenant_profile; ?>" class="i-circle" alt="Cinque Terre" width="130px" height="130px">
        <table style="width:100%;font-size:1.5vw;">
          <tr>
            <td>Name</td>
            <td><?php echo $tenant_name; ?></td>
          </tr>
          <tr>
            <td>Phone</td>
            <td><?php echo $tenant_phone; ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><?php echo $tenant_email; ?></td>
          </tr>
          <tr>
            <td>Father Name</td>
            <td><?php echo $tenant_fathername; ?></td>
          </tr>
          <tr>
            <td>Mother Name</td>
            <td><?php echo $tenant_mothername; ?></td>
          </tr>
          <tr>
            <td>Occupation</td>
            <td><?php echo $tenant_occupation; ?></td>
          </tr>
          <tr>
            <td>Adhar Info</td>
            <td><a href="<?php echo $tenant_adhar ?>"  target="_blank"><button type="button" class="btn btn-success">click to view</button></a></td>
          </tr>
          <tr>
            <td>Address Proof</td>
            <td><a href="<?php echo $tenant_address ?>"  target="_blank"><button type="button" class="btn btn-success">click to view</button></a></td>
          </tr>
        </table>
      </div>
      <?php
      }
      else
      {
      ?>
      <div>
        <p>No tenant's staying</p>
      </div>
      <?php
      }
      ?>
    </div> 
  </div>
<script>
window.onload = function() 
{
  var i, tabcontent;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  document.getElementById("Compalintstatus").style.display="block";
  document.getElementById("status").className += " active";
}

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

</body>
</html>
<?php
if(isset($_POST['pass_submitted']))
      {
        $opass=$_POST['opassword'];
        $npass=$_POST['npassword'];
        $cpass=$_POST['cpassword'];
        $sqlp = "SELECT * FROM member WHERE doorno='$doorno' AND password='$opass'";
          if ($resultp=mysqli_query($conn,$sqlp)) 
          {
              $rowcountp=mysqli_num_rows($resultp);
              if($rowcountp==1)
                {
                  if($npass==$cpass)
                    {
                      $sqlpa="UPDATE member SET password='$npass' WHERE doorno='$doorno'";
                       if(mysqli_query($conn,$sqlpa))
                        {
                          ?><script type="text/javascript">document.getElementById("pmsg").style.display="block"</script><?php
                         }
                    }
                }
          }                
      }
  if(isset($_POST['form_edit']))
  {
        $nfather=$_POST['nfather'];
        $nmother=$_POST['nmother'];
        $npaddress=$_POST['npaddress'];
        $sqlpb="UPDATE member SET fathername='$nfather', mothername='$nmother',permanentaddress='$npaddress' WHERE doorno='$doorno'";
        if(mysqli_query($conn,$sqlpb))
        {
          echo "<meta http-equiv='refresh' content='0'>";
        }
        else
        {
          echo conn.error;
        }
  }
  if(isset($_POST['electric_com']))
  {
        $problem=$_POST['electric_dis'];
        $date=date("Y-m-d");
        $sqlr="SELECT * FROM complaint WHERE doorno='$doorno'";
         if ($resultc=mysqli_query($conn,$sqlr)) 
          {
              $rowcountc=mysqli_num_rows($resultc);
              $rowcountc=$rowcountc+1;
              $complaintid=$doorno.'_'.$date.'_'.$rowcountc;
              $type="electric";
              $status="filed";
              ?><script type="text/javascript">alert("done this far");</script><?php
              $sqlca="INSERT INTO complaint VALUES('$doorno','$date','$complaintid','$type','$problem','$status')";
              if(mysqli_query($conn,$sqlca))
              {
                echo "<meta http-equiv='refresh' content='0'>";
              }
              else
              {
               ?><script type="text/javascript">alert("<?php echo "error in tenant data".$conn->error; ?>");</script><?php 
              }
          }    
        else
        {
          echo "error in tenant data".$conn->error;
        }
  }
if(isset($_POST['civil_com']))
  {
        $problem=$_POST['civil_dis'];
        $date=date("Y-m-d");
        $sqlr="SELECT * FROM complaint WHERE doorno='$doorno'";
         if ($resultc=mysqli_query($conn,$sqlr)) 
          {
              $rowcountc=mysqli_num_rows($resultc);
              $rowcountc=$rowcountc+1;
              $complaintid=$doorno.'_'.$date.'_'.$rowcountc;
              $type="civil";
              $status="filed";
              ?><script type="text/javascript">alert("done this far");</script><?php
              $sqlca="INSERT INTO complaint VALUES('$doorno','$date','$complaintid','$type','$problem','$status')";
              if(mysqli_query($conn,$sqlca))
              {
                echo "<meta http-equiv='refresh' content='0'>";
              }
              else
              {
               ?><script type="text/javascript">alert("<?php echo "error in tenant data".$conn->error; ?>");</script><?php 
              }
          }    
        else
        {
          echo "error in tenant data".$conn->error;
        }
  }
if(isset($_POST['plumbing_com']))
  {
        $problem=$_POST['plumbing_dis'];
        $date=date("Y-m-d");
        $sqlr="SELECT * FROM complaint WHERE doorno='$doorno'";
         if ($resultc=mysqli_query($conn,$sqlr)) 
          {
              $rowcountc=mysqli_num_rows($resultc);
              $rowcountc=$rowcountc+1;
              $complaintid=$doorno.'_'.$date.'_'.$rowcountc;
              $type="plumbing";
              $status="filed";
              ?><script type="text/javascript">alert("done this far");</script><?php
              $sqlca="INSERT INTO complaint VALUES('$doorno','$date','$complaintid','$type','$problem','$status')";
              if(mysqli_query($conn,$sqlca))
              {
                echo "<meta http-equiv='refresh' content='0'>";
              }
              else
              {
               ?><script type="text/javascript">alert("<?php echo "error in tenant data".$conn->error; ?>");</script><?php 
              }
          }    
        else
        {
          echo "error in tenant data".$conn->error;
        }
  }
  if(isset($_POST['facility_com']))
  {
        $problem=$_POST['facility_dis'];
        $date=date("Y-m-d");
        $sqlr="SELECT * FROM complaint WHERE doorno='$doorno'";
         if ($resultc=mysqli_query($conn,$sqlr)) 
          {
              $rowcountc=mysqli_num_rows($resultc);
              $rowcountc=$rowcountc+1;
              $complaintid=$doorno.'_'.$date.'_'.$rowcountc;
              $type="facility";
              $status="filed";
              ?><script type="text/javascript">alert("done this far");</script><?php
              $sqlca="INSERT INTO complaint VALUES('$doorno','$date','$complaintid','$type','$problem','$status')";
              if(mysqli_query($conn,$sqlca))
              {
                echo "<meta http-equiv='refresh' content='0'>";
              }
              else
              {
               ?><script type="text/javascript">alert("<?php echo "error in tenant data".$conn->error; ?>");</script><?php 
              }
          }    
        else
        {
          echo "error in tenant data".$conn->error;
        }
  }
  if(isset($_POST['miscellaneous_com']))
  {
        $problem=$_POST['miscellaneous_dis'];
        $date=date("Y-m-d");
        $sqlr="SELECT * FROM complaint WHERE doorno='$doorno'";
         if ($resultc=mysqli_query($conn,$sqlr)) 
          {
              $rowcountc=mysqli_num_rows($resultc);
              $rowcountc=$rowcountc+1;
              $complaintid=$doorno.'_'.$date.'_'.$rowcountc;
              $type="miscellaneous";
              $status="filed";
              ?><script type="text/javascript">alert("done this far");</script><?php
              $sqlca="INSERT INTO complaint VALUES('$doorno','$date','$complaintid','$type','$problem','$status')";
              if(mysqli_query($conn,$sqlca))
              {
                echo "<meta http-equiv='refresh' content='0'>";
              }
              else
              {
               ?><script type="text/javascript">alert("<?php echo "error in tenant data".$conn->error; ?>");</script><?php 
              }
          }    
        else
        {
          echo "error in tenant data".$conn->error;
        }
  }
  
}
else
{
  header("Location: http://localhost/society1/login.php");
}
?>