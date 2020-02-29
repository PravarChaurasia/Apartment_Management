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
  
  <link href="css/user1.css" rel="stylesheet" type="text/css">

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
  #pmsg, #nowner1, #nowner2
  {
    display: none;
  }
  
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}


  </style>
</head>
<?php
 //session_start();
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
          $sqlc="SELECT * FROM complaint";
          if($resultc=mysqli_query($conn,$sqlc))
          {
            $rowcount_comp=mysqli_num_rows($resultc);
          }
          $sqld="SELECT * FROM transaction WHERE doorno='$doorno'";
          if($resultd=mysqli_query($conn,$sqld))
          {
            $rowcount_t=mysqli_num_rows($resultd);
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
        $sql_notice="SELECT * FROM notice";
          if($result_notice=mysqli_query($conn,$sql_notice))
          {
            $rowcount_notice=mysqli_num_rows($result_notice);
          }
          $sql_letter="SELECT * FROM letter";
          if($result_letter=mysqli_query($conn,$sql_letter))
          {
            $rowcount_letter=mysqli_num_rows($result_letter);
          } 
    } 
  }

  
            $msg = "";
            if(isset($_POST['createemp'])){
                $empid=$_POST["empid"];
                $email=$_POST["email"];
                $mno=$_POST["mno"];
                $Department=$_POST["Department"];
                $Designation=$_POST["Designation"];
                $Salary=$_POST["Salary"];
                $name = $_POST['name'];
                if($empid!="" && $email!="" && $mno!=""&& $Department!="" && $Salary!="" && $name != ""){
                  $sql = "INSERT INTO employee (EmpID, Department,  MobileNumber,  Email, Salary, Name) VALUES ('$empid','$Department','$mno','$email', '$Salary', '$name')";
                  if ($conn->query($sql) === TRUE) {
                    $msg = "New employee registered successfully";
                  } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }
                }
            }
         
            
            if(isset($_POST['updateemp'])){
                $empid=$_POST["empid"];
                $email=$_POST["email"];
                $mno=$_POST["mno"];
                $Department=$_POST["Department"];
                $Designation=$_POST["Designation"];
                $Salary=$_POST["Salary"];
                $sqlu = "SELECT * FROM employee WHERE EmpID='$empid'";
                $result=mysqli_query($conn,$sql);
                $rowcount=mysqli_num_rows($result);
                if($rowcount == 1 ){
                  $sql = "UPDATE employee SET Department='$Department', MobileNumber='$mno', Email='$email', Designation='$Designation', Salary='$Salary' WHERE EmpID='$empid'";
                  if ($conn->query($sql) === TRUE) {
                    $msg = "Profile Updated successfully";
                  } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }
                }
            }
    
            
            if(isset($_POST['Deleteemp'])){
                $empid=$_POST["EmpID"];
                $sqlu = "SELECT * FROM employee WHERE EmpID='$empid'";
                $result=mysqli_query($conn,$sql);
                $rowcount=mysqli_num_rows($result);
                if($rowcount == 1 ){
                  $sql = "DELETE FROM employee WHERE EmpID='$empid'";
                  if ($conn->query($sql) === TRUE) {
                    $msg = "Profile deleted successfully";
                  } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
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

<div class="sidenav">
  <img src="<?php echo $profile; ?>" class="i-circle" alt="Cinque Terre" width="130px" height="130px">
  <p class="name"><?php echo $name; ?></p>
  <a href="#About"><i class="fas fa-user-tie"></i>&nbsp;Profile</a>
  <a href="#Skills"><i class="fas fa-keyboard"></i>&nbsp;Edit Profile </a>
  <a href="#Education"><i class="fas fa-pen-fancy"></i>&nbsp;Complaints</a>
  <a href="#manage"><i class="fas fa-rupee-sign"></i>&nbsp;Manage Employee </a>
  <a href="#Projects"><i class="fas fa-key"></i>&nbsp;Change Password</a>
  <a href="#Contact"><i class="fas fa-bed"></i>&nbsp;Tenant's Details</a>
  <a href="aregister.php"><i class="fas fa-user-plus"></i></i>&nbsp;New Owner</a>
  <a href="#view_owner"><i class="fas fa-street-view"></i>&nbsp;View Owner</a>
  <a href="#Notice"><i class="fas fa-exclamation-triangle"></i>&nbsp;Notices</a>
  <a href="#Letter"><i class="fas fa-plus-square"></i>&nbsp;Letter</a>

</div>

  <!-- ABOUT -->

  <div class="main1" style="padding: 2vw;margin-top: 5vh;" id="About">
      <div class="chart" style="color:black;">
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

<!-- Maintenance -->  
  <div class="main1" style="display:block;" id="Maintenance">
    <div class='chart' >
      <h2 style="margin-bottom: 3vh;">Maintenance Payement
      </h2>
      <div class="tab">
        <button class="tab_links" id="maintenance_pay_link" onclick="openCity1(event, 'Maintanace_payement')"><i class="fas fa-scroll"></i>&nbsp;Maintanace summary</button>
        <button class="tab_links"  onclick="openCity1(event, 'transaction_summ')"><i class="fas fa-bolt"></i>&nbsp;Transaction summary</button>
      </div>
      <div id="Maintanace_payement" class="tab_content">
        <h3>Maintanance Summary</h3>
         
      </div>
     <div id="transaction_summ" class="tab_content">
        <h3>Transaction Summary</h3>
        <?php if($rowcount_t>0)
         {
          ?>
        <table class="table table-hover" style="text-align: left;">
          <thead>
            <tr>
              <th>Transaction-id</th>
              <th>Transaction-date</th>
              <th>Transaction-time</th>
              <th>Transaction-type</th>
              <th>Amount paid</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row_comp = mysqli_fetch_assoc($resultd)) { ?>
            <tr>
              <td><?php  echo $row_comp['transaction_id'];  ?></td>
              <td><?php  echo $row_comp['transaction_date']; ?></td>
              <td><?php  echo $row_comp['transaction_time']; ?></td>
              <td><?php  echo $row_comp['transaction_type']; ?></td>
              <td><?php  echo $row_comp['amount_paid']; ?></td>
            </tr>
          </tbody>
        <?php } ?>
        </table>
        <?php
          }
          else
           {
            ?><p>NO Transaction made</p><?php
           } 
          ?> 
    </div>
    </div>
  </div>
<!-- manage employee -->
   <div class="main1" style="display: block;"  id="manage">
    <div class='chart' style="overflow:auto;height:90vh;" >
    <h2 >Manage Employee
      </h2>
      <div class="tab">
        <button class="tablinks" id="manage_employee" onclick="openCity(event, 'Add_employee')"><i class="fas fa-scroll"></i>&nbsp;Add Employee</button>
        <button class="tablinks" onclick="openCity(event, 'View_employee')"><i class="fas fa-bolt"></i>&nbsp;View Employee</button>
      </div>

      <div id="Add_employee" class="tabcontent">
        <h3>Add Employee</h3>
        <form action="" method="POST" >
          <div class="form-group">
          <label for="Name">Employee Name</label>
          <input type="text" class="form-control" id="opassword" name="e_name" required>
          </div>
          <div class="form-group">
          <label for="Mobile Number">Contact Number</label>
          <input type="text" class="form-control" id="npassword" name="e_number" required>
          </div>
          <div class="form-group">
          <label for="email_id">Email Id</label>
          <input type="email" class="form-control" id="cpassword" name="e_email" required>
          </div>
          <div class="form-group">
          <label for="department">Department</label>
          <input type="text" class="form-control" id="cpassword" name="e_dept" required>
          </div>
          <div class="form-group">
          <label for="department">Designation</label>
          <input type="text" class="form-control" id="cpassword" name="e_design" required>
          </div>
          <div class="form-group">
          <label for="Salary">Salary</label>
          <input type="text" class="form-control" id="cpassword" name="e_salary" required>
          </div>
          <button type="submit" class="btn btn-primary" name="emp_submitted"><i class="far fa-paper-plane"></i>&nbsp;Submit</button>
          <div  id="pmsg">
            <p> Employee Add Successfully</p>
          </div>
        </form>
    </div>

    <div id="View_employee" class="tabcontent">
        <h3>View Employee</h3>
        <table class="table table-hover" style="text-align: left;">
        <thead>
          <tr>
            <th>Employee Id</th>
            <th>Employee Name</th>
            <th>View Profile</th>
            <th>Update Profile</th>
            <th>Delete Profile</th>
            
          </tr>
        </thead>
      <tbody>
        <?php 
          $sqlemp="SELECT * FROM employee";
          if($resultemp=mysqli_query($conn,$sqlemp))
          {
           // echo "prabhat";
            $rowcount_emp=mysqli_num_rows($resultemp);
            if($rowcount_emp>0)
            {
              //echo "arya";
              while($row_emp = mysqli_fetch_assoc($resultemp)) {
                $empid = $row_emp['EmpID'];
                $e_Name = $row_emp['Name'];
                $e_Salary = $row_emp['Salary'];
                $e_Email = $row_emp['Email'];
                $e_MobileNumber = $row_emp['MobileNumber'];
                $e_Department = $row_emp['Department'];
                ?>
                  <tr>
                    <td><?php  echo $empid;  ?></td>
                    <td><?php  echo $e_Name; ?></td>
                    <td> <a href = "view_profile.php?empid=<?php echo $empid;?>" > View Profile </a> </td>
                    <td> <a href = "edit_profile.php?empid=<?php echo $empid;?>" > Update Profile </a> </td>
                    <td> <a href = "delete_profile.php?empid=<?php echo $empid;?>" > Delete Profile </a> </td>
                  </tr>
          </tbody>
              <?php } ?>
        </table>
        <?php
        } else
           {
            ?><p>NO Employee Records</p><?php
           } 
          
        }
          ?> 
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
     <h2 style="margin-bottom: 0;margin-top: 0">
        Tenants Details
      </h2>
      <?php
      if($flatstatus=="tenant")
      {
      ?>
      <div>
        <div class="tab">
        <button class="tab_links_tenant" id="tenant_summary" onclick="openCity2(event, 'tenant_details')"><i class="fas fa-scroll"></i>&nbsp;Tenant Details</button>
        <button class="tab_links_tenant"  onclick="openCity2(event, 'tenant_update')"><i class="fas fa-pencil-alt"></i>&nbsp;Update Tenant data</button>
        </div>
        <div id="tenant_details" class="tab_content_tenant">
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
          <tr>
            <td colspan="2">
            <form method="POST" action="" name="tenantdel_form">
              <button type="submit" class="btn btn-danger" name="tenant_del"><i class="fas fa-trash"></i>&nbsp;Remove Tenant</button>
            </form>
          </td>
          </tr>
        </table>
      </div>
        <div id="tenant_update" class="tab_content_tenant">
          <form action="" method="POST" name="tenant_update_form">
              <div class="form-group">
              <label for="Username">name</label>
              <input type="text" class="form-control" id="tenant_name_up" name="tenant_name_up" value="<?php echo $tenant_name; ?>" required>
              </div>
              <div class="form-group">
              <label for="tenantemail">Email</label>
              <input type="text" class="form-control" id="tenant_email_up" name="tenant_email_up" value="<?php echo $tenant_email; ?>" required>
              </div>
              <div class="form-group">
              <label for="tenant_phone">Phone</label>
              <input type="text" class="form-control" id="tenant_phone_up" name="tenant_phone_up" value="<?php echo $tenant_phone; ?>" required>
              </div>
              <div class="form-group">
              <label for="tenant_fathername">father name</label>
              <input type="text" class="form-control" id="tenant_fathername_up" name="tenant_fathername_up" value="<?php echo $tenant_fathername; ?>" required>
              </div>
              <div class="form-group">
              <label for="tenant_mothername">Mother name</label>
              <input type="text" class="form-control" id="tenant_mothername_up"  name="tenant_mothername_up" value="<?php echo $tenant_mothername; ?>" required>
              </div>
              <div class="form-group">
              <label for="tenant_occupation">occupation</label>
              <input type="text" class="form-control" id="tenant_occupation_up" name="tenant_occupation_up" value="<?php echo $tenant_occupation; ?>" required>
              </div>
              <button type="submit" class="btn btn-primary" name="tenant_update_submit"><i class="far fa-paper-plane"></i>&nbsp;Submit</button>
          </form>
        </div>
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

<!-- Responsibilty -->
<div class="main1" style="display:block;" id="view_owner">
    <div class='chart' style="height: 90vh;overflow:auto;" >
      <h2 style="margin-bottom: 3vh;">Flat Owners </h2>
      
      <div style="overflow-y:auto;">
          <table class="table table-hover" style="text-align: left; overflow-y:scroll">
            <thead>
              <tr>
                <th>Door Number </th>
                <th>Name </th>
                <th>View Profile </th>
                <th>Update Profile </th>
                <th>Delete Profile </th>
                <th> Total Dues </th>
              </tr>
            </thead>
          <?php 
            $sqlc="SELECT * FROM member";
        if($resultc=mysqli_query($conn,$sqlc))
        {
          $rowcount_comp=mysqli_num_rows($resultc);
          if($rowcount_comp>0)
          {
          ?>
            <tbody>
              <?php while($row_comp = mysqli_fetch_assoc($resultc)) {
              $door_no1 = $row_comp['doorno'];
              $sqlc1="SELECT * FROM transactionhistory where DoorNo = '$door_no1'";
              $resultc1=mysqli_query($conn,$sqlc1);
              $rowcount_comp1=mysqli_num_rows($resultc1);
              if($rowcount_comp1>0)
              {
                $row_comp1 = mysqli_fetch_assoc($resultc1);
                $last1 = $row_comp1['last_payment'];
                $dueamount1=$row_comp1['DueAmount'];
                $transdate11 = date('m-d-Y', time());
                $d11 = date_parse_from_format("m-d-y",$transdate11);
                $curr1 = $d11["month"];
                $diff1 = $curr1 - $last1;
                //echo $fine."  ".$diff."  ".$curr;
                $mmc1 = $row_comp1['MMC'];
                
                if ($diff1 > 0)
                  $fine1 = ($diff1 - 1) * 1000;
                else 
                  $fine1 = 0;

                $dueamount11 = $dueamount1 + $fine1 + $mmc1 * ($diff1 - 1);
                //$view_dues = $dueamount11 
              } else {
                $dueamount11 = 50000;
              }
              ?>
              <tr>
                <td><?php  echo $row_comp['doorno'];  ?></td>
                <td><?php  echo $row_comp['name']; ?></td>
                <td> <a href = "view_profile.php?door_no=<?php echo $row_comp['doorno'];?>" > View Profile </a> </td>
                <td> <a href = "edit_profile.php?door_no=<?php echo $row_comp['doorno'];?>" > Update Profile </a> </td>
                <td> <a href = "delete_profile.php?door_no=<?php echo $row_comp['doorno'];?>" > Delete Profile </a> </td>
                <td> <?php echo $dueamount11; ?> </td>
              </tr>
            </tbody>
          <?php } ?>
          </table>
          <?php
          }
            else
              {
              ?><p>NO User registered</p><?php
              } 
          }
          ?> 
    </div>

    </div>
  </div>

<!-- notice page -->
  <div class="main1" style="display:block;" id="Notice">
    <div class="chart" style="height: 90vh;overflow: auto;">
      <h2>Notice board</h2>
      <div class="tab">
        <button class="tab_links_notice" id="notice_tab_link" onclick="openCity4(event, 'notice_summary')"><i class="fas fa-scroll"></i>&nbsp;Previous letter</button>
        <button class="tab_links_notice"  onclick="openCity4(event, 'create_notice')"><i class="fas fa-pencil-alt"></i>&nbsp;Create Notice</button>
      </div>
      <div id="notice_summary" class="tab_content_notice">
      <h2>Notice Board</h2>
      <?php if($rowcount_notice>0)
         {
          ?>
        <table class="table table-hover" style="text-align: left;">
          <thead>
            <tr>
              <th>Notice-id</th>
              <th>Generated By</th>
              <th>Date</th>
              <th>Subject</th>
              <th>Link</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row_comp = mysqli_fetch_assoc($result_notice)) { ?>
            <tr>
              <td><?php  echo $row_comp['Id'];  ?></td>
              <td><?php  echo $row_comp['DoorNo']; ?></td>
              <td><?php  echo $row_comp['Date']; ?></td>
              <td><?php  echo $row_comp['Subject']; ?></td>
              <td><a href="<?php  echo $row_comp['File']; ?>"  target="_blank"><button type="button" class="btn btn-success">click to view</button></a></td>
            </tr>
          </tbody>
        <?php } ?>
        </table>
        <?php
          }
          else
           {
            ?><p>NO Notice</p><?php
           } 
          ?>
      </div>
      <div id="create_notice" class="tab_content_notice">
        <form action="" method="POST" name="new_notice_form" enctype="multipart/form-data" >
              <div class="form-group">
              <label for="subject_notice">Subject</label>
              <input type="text" class="form-control" id="letter_subject" name="notice_subject" required>
              </div>
              
              <div class="form-group">
              <label for="body_notice">Upload Letter</label>
              <input type="file" name="notice_upload"  id="letter_upload" required>
              </div> 
              <button type="submit" class="btn btn-primary" name="notice_submit"><i class="far fa-paper-plane"></i>&nbsp;Submit</button>
          </form>
      </div>
    </div>
  </div> 
  
  <!-- Letter page -->
  <div class="main1" style="display:block;" id="Letter">
    <div class="chart" style="height: 90vh;overflow: auto;">
      <h2>Letter Board</h2>
      <div class="tab">
        <button class="tab_links_letter" id="letter_tab_link" onclick="openCity3(event, 'letter_summary')"><i class="fas fa-scroll"></i>&nbsp;Previous letter</button>
        <button class="tab_links_letter"  onclick="openCity3(event, 'create_letter')"><i class="fas fa-pencil-alt"></i>&nbsp;Create Letter</button>
      </div>
      <div id="letter_summary" class="tab_content_letter">
        <?php
        if($rowcount_letter>0)
        {
        ?>
        <table class="table table-hover" style="text-align: left;">
          <thead>
            <tr>
              <th>Refrence-id</th>
              <th>Date</th>
              <th>Subject</th>
              <th>Link</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row_comp = mysqli_fetch_assoc($result_letter)) { ?>
            <tr>
              <td><?php  echo $row_comp['id'];  ?></td>
              <td><?php  echo $row_comp['date']; ?></td>
              <td><?php  echo $row_comp['subject']; ?></td>
              <td><a href="<?php  echo $row_comp['File']; ?>"  target="_blank"><button type="button" class="btn btn-success">click to view</button></a></td>
            </tr>
          </tbody>
          <?php } ?>
        </table>
        <?php
         }
         else
         {
          ?><h3>No Letters Send </h3><?php
         }
         ?>
      </div>
      <div id="create_letter" class="tab_content_letter">
        <form action="" method="POST" name="new_letter_form" enctype="multipart/form-data" >
              <div class="form-group">
              <label for="from_letter">From</label>
              <input type="text" class="form-control" id="from_doorno" name="from_doorno" value="<?php echo $doorno; ?>" required readonly>
              </div>
              <label for="to_letter">TO Memeber &nbsp;&nbsp;</label>
              <label class="radio-inline"><input type="radio" name="letter_to" value="0" onclick="show(this.value)" checked>All Society</label>
              <label class="radio-inline"><input type="radio" name="letter_to" value="1" onclick="show(this.value)">Door no</label>
              <div class="form-group" id="reciever_door" style="display: none;">
              <label for="door_rec">Enter reciever door number</label>
              <input type="text" class="form-control" id="rec_door" name="rec_door" >
              </div>
              <div class="form-group">
              <label for="subject_letter">Subject</label>
              <input type="text" class="form-control" id="letter_subject" name="letter_subject" required>
              </div>
              
              <div class="form-group">
              <label for="body_letter">Upload Letter</label>
              <input type="file" name="letter_upload"  id="letter_upload" required>
              </div> 
              <button type="submit" class="btn btn-primary" name="letter_submit"><i class="far fa-paper-plane"></i>&nbsp;Submit</button>
          </form>
      </div>
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
  tabcontent = document.getElementsByClassName("tab_content");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tabcontent = document.getElementsByClassName("tab_content_tenant");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tabcontent = document.getElementsByClassName("tab_content_letter");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tabcontent = document.getElementsByClassName("tab_content_notice");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tabcontent = document.getElementsByClassName("tab_content_notice");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  document.getElementById("Compalintstatus").style.display="block";
  document.getElementById("Add_employee").style.display="block";
  document.getElementById("Maintanace_payement").style.display="block";
  document.getElementById("letter_summary").style.display="block";
  document.getElementById("notice_summary").style.display="block";
  document.getElementById("letter_summary").style.display="block";
  document.getElementById("status").className += " active";
  document.getElementById("manage_employee").className += " active";
  document.getElementById("maintenance_pay_link").className += " active";
  document.getElementById("letter_tab_link").className += " active";
  document.getElementById("notice_tab_link").className += " active";
  document.getElementById("letter_tab_link").className += " active";
}

function show(y)
{
  if(y==1)
  {
    document.getElementById("reciever_door").style.display="block";
  }
  else
  {
   document.getElementById("reciever_door").style.display="none"; 
  }
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

function openCity1(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tab_content");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tab_links");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
function openCity2(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tab_content_tenant");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tab_links_tenant");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
function openCity3(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tab_content_letter");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tab_links_letter");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

function openCity4(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tab_content_notice");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tab_links_notice");
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

if(isset($_POST['new_owner']))
      {
        $door_no =$_POST['door_no'];
        $email =$_POST['email'];
        $mobile =$_POST['mobile'];
        $father =$_POST['fname'];
        $mother = $_POST['mname'];
        $caddress =$_POST['caddress'];
        //$paddress =$_POST['paddress'];
        $mobile =$_POST['mobile'];
        $sqlp = "SELECT * FROM member WHERE doorno='$doorno'";

          if ($resultp=mysqli_query($conn,$sqlp)) 
          {
              $rowcountp=mysqli_num_rows($resultp);
              if($rowcountp == 0)
                {
                  $sqla = "insert into member (doorno,name,phone,email,fathername,mothername,contactaddress)
                            values ('$doorno','$name','$email','$mobile','$fname','$mname','$caddress')";
                  if(mysqli_query($conn,$sqlpa))
                  {
                    ?><script type="text/javascript">document.getElementById("nowner1").style.display="block"</script><?php
                  }?>

                <!--script type="text/javascript">document.getElementById("pmsg").style.display="block"</script> -->

              <?php
                } else {
                       
                   ?><script type="text/javascript">document.getElementById("nowner2").style.display="block"</script><?php
               }
          }                
      }

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
      if(isset($_POST['emp_submitted']))
      {
        $e_name=$_POST['e_name'];
        $e_Salary=$_POST['e_salary'];
        $e_dept=$_POST['e_dept'];
        $e_mobile=$_POST['e_number'];
        $e_email=$_POST['e_email'];
        $e_design=$_POST['e_design'];
        $sqlqq = "INSERT INTO employee (Department,MobileNumber,Email,Salary,Name,Designation) VALUES('$e_dept','$e_mobile','$e_email','$e_Salary','$e_name','$e_design')";
        //$sqlp = "SELECT * FROM member WHERE doorno='$doorno' AND password='$opass'";
          if ($resultp=mysqli_query($conn,$sqlqq)) 
          {
              $rowcountp=mysqli_num_rows($resultp);  
              if(mysqli_query($conn,$sqlpa))
              {
          ?>
               echo "<meta http-equiv='refresh' content='0'>";
               
                <?php
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
  if(isset($_POST['letter_submit']))
  {
    $dfname=substr($doorno, 0, 10);
    $dlname=substr($doorno, 11, 2);
    $dname=$dfname.'_'.$dlname;
    $date=date("Y-m-d");
    $r=$rowcount_letter+1;
    $reference=$dname.'_'.$date.'_'.$r;
    $letter_to=$_POST['letter_to'];
    $subject=$_POST['letter_subject'];
    $status=0;
    if($letter_to==0)
    {
      if($_FILES['letter_upload']['name'])
      {
        $target_dir = "letter/";
        $filename = $_FILES['letter_upload']['name'];
        $extension=end(explode(".", $filename));
        $newfilename=$reference.".".$extension;
        $location=$target_dir.$newfilename;
        $sql="INSERT INTO letter VALUES('$reference','$date','$letter_to','$subject','$location','$status')";
        if(mysqli_query($conn,$sql))
            {
              if(move_uploaded_file($_FILES['letter_upload']['tmp_name'], $location))
              {
                echo "<meta http-equiv='refresh' content='0'>";  
              }
              else
              {
                ?><script type="text/javascript">alert("error in uploading");</script><?php   
              }
              
            }
            else
            {
              ?><script type="text/javascript">alert("<?php echo "error in tenant data".$conn->error; ?>");</script><?php
            }

      }
    }
    else
    {
      $target_dir = "letter/";
        $filename = $_FILES['letter_upload']['name'];
        $extension=end(explode(".", $filename));
        $newfilename=$reference.".".$extension;
        $location=$target_dir.$newfilename;
      $letter_rec=$_POST['rec_door'];
       $sql="INSERT INTO letter VALUES('$reference','$date','$letter_rec','$subject','$location','$status')";
        if(mysqli_query($conn,$sql))
            {
              if(move_uploaded_file($_FILES['letter_upload']['tmp_name'], $location))
              {
                echo "<meta http-equiv='refresh' content='0'>";  
              }
              else
              {
                ?><script type="text/javascript">alert("error in uploading");</script><?php   
              }
            }
            else
            {
              ?><script type="text/javascript">alert("<?php echo "error in tenant data".$conn->error; ?>");</script><?php
            }
    }

  }

  if(isset($_POST['notice_submit']))
  {
    $dfname=substr($doorno, 0, 10);
    $dlname=substr($doorno, 11, 2);
    $dname=$dfname.'_'.$dlname;
    $date=date("Y-m-d");
    $r=$rowcount_letter+1;
    $reference=$dname.'_'.$date.'_'.$r;
    $subject=$_POST['notice_subject'];
    $type="regular";
      if($_FILES['notice_upload']['name'])
      {
        $target_dir = "notice/";
        $filename = $_FILES['notice_upload']['name'];
        $extension=end(explode(".", $filename));
        $newfilename=$reference.".".$extension;
        $location=$target_dir.$newfilename;
        $sql="INSERT INTO notice VALUES('$reference','$doorno','$subject','$type','$date','$location')";
        if(mysqli_query($conn,$sql))
            {
              if(move_uploaded_file($_FILES['notice_upload']['tmp_name'], $location))
              {
                echo "<meta http-equiv='refresh' content='0'>";  
              }
              else
              {
                ?><script type="text/javascript">alert("error in uploading");</script><?php   
              }
              
            }
            else
            {
              ?><script type="text/javascript">alert("<?php echo "error in tenant data".$conn->error; ?>");</script><?php
            }

      }

  }
  
}
else
{
  header("Location: http://localhost/society1/login.php");
}
?>