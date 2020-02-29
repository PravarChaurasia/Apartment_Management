<!DOCTYPE html>

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

body
 {
  background-image: url("back3.jpg");
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  height:100%;
 }
 .chart{
  background-color: rgba(240, 240, 240,0.9);
  padding:2vw;
  border-radius: 1vw;
  text-align: center;
  margin-left: 5vw;
  margin-right: 5vw;
  width: auto;
}

  </style>
</head>

<body >

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

?>

      <div class="chart" style="color:black;margin-top: 2vh;margin-bottom: 2vh;">
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

    <div class="chart" style="margin-bottom:2vh;">
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


 <?php         
    } 

?>

<?php 

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
        $sql = "SELECT * FROM employee WHERE EmpID='$empid'";
        if ($result=mysqli_query($conn,$sql)) 
        {
            $rowcount=mysqli_num_rows($result);
            if($rowcount==1)
                {
                $row = mysqli_fetch_assoc($result);
                $name=$row['Name'];
                $dept=$row['Department'];
                $phone=$row['MobileNumber'];
                $email=$row['Email'];
                $design=$row['Designation'];
                $salary=$row['Salary'];
                        
            }
     
        }

        ?>


      <div class="chart" style="color:black;margin-top: 2vh;margin-bottom: 2vh;">
        <h2>
        employee Profile
        </h2>
        <table style="width:100%;font-size:1.5vw;">
          <tr>
            <td>Employee ID</td>
            <td><?php echo $empid; ?></td>
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
            <td>Designation</td>
            <td><?php echo $design; ?></td>
          </tr>
          <tr>
            <td>Salary</td>
            <td><?php echo $salary; ?></td>
          </tr>
          
          
        </table>

      </div>

  <?php 
        
         
    } 

?>



</body>
</html>