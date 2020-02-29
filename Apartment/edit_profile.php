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
            
        }
          

    if(isset($_POST['form_edit']))
    {
        $mobile=$_POST['mobile'];
        $email=$_POST['email'];
        $npaddress=$_POST['npaddress'];
        $caddress=$_POST['caddress'];
        $sqlpb="UPDATE member SET phone='$mobile', email='$email',permanentaddress='$npaddress', contactaddress='$caddress' WHERE doorno='$doorno'";
        if(mysqli_query($conn,$sqlpb))
        {
          header("Location:userpagesec.php");
        }
        else
        {
          echo conn.error;
        }
  }

?>

    <div class='chart' style="margin-top: 2vh;margin-bottom: 2vh;">
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
        <label for="fathername">Mobile Number </label>
        <input type="text" class="form-control" id="nfather" name="mobile" value="<?php echo $phone; ?>" required>
        </div>
        <div class="form-group">
        <label for="mothername">Email Id</label>
        <input type="text" class="form-control" id="nmother" name="email" value="<?php echo $email; ?>" required>
        </div>
        <div class="form-group">
        <label for="permanentaddress">permanent address</label>
        <input type="text" class="form-control" id="npaddress" name="npaddress" value="<?php echo $permanentaddress; ?>" required>
        </div>
        <div class="form-group">
        <label for="contactaddress">Contact address</label>
        <input type="text" class="form-control" id="caddress" name="caddress" value="<?php echo $contactaddress; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary" name="form_edit"><i class="far fa-paper-plane"></i>&nbsp;Submit</button>
    </form>
    </div>
<?php
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
                //$design=$row['Designation'];
                $salary=$row['Salary'];
                        
            }
     
        }

        if(isset($_POST['employee_edit']))
        {
            $mobile=$_POST['mobile'];
            $email=$_POST['email'];
            $dept=$_POST['dept'];
            $salary=$_POST['salary'];
            $sqlpb="UPDATE employee SET MobileNumber='$mobile', Email='$email',Designation='$dept', Salary='$salary' WHERE EmpID='$empid'";
            if(mysqli_query($conn,$sqlpb))
            {
                echo "<meta http-equiv='refresh' content='0'>";
            }
            else
            {
                echo conn.error;
            }
        }

    ?>

        <div class="main1" style="display:block;" id="Skills">
        <div class='chart'>
      <h2>Edit Profile</h2>
        <form action="" method="POST" name="eform">
        <div class="form-group">
        <label for="empid">Employee Id</label>
        <input type="text" class="form-control" name="empid" value="<?php echo $empid; ?>" readonly>
        </div>
        <div class="form-group">
        <label for="Username">Name</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $name; ?>" readonly>
        </div>
        <div class="form-group">
        <label for="fathername">Mobile Number </label>
        <input type="text" class="form-control" id="nfather" name="mobile" value="<?php echo $phone; ?>" required>
        </div>
        <div class="form-group">
        <label for="mothername">Email Id</label>
        <input type="text" class="form-control" id="nmother" name="email" value="<?php echo $email; ?>" required>
        </div>
        <div class="form-group">
        <label for="permanentaddress">Department</label>
        <input type="text" class="form-control" id="npaddress" name="dept" value="<?php echo $dept; ?>" required>
        </div>
        <div class="form-group">
        <label for="contactaddress">Contact address</label>
        <input type="text" class="form-control" id="caddress" name="salary" value="<?php echo $salary; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary" name="employee_edit"><i class="far fa-paper-plane"></i>&nbsp;Submit</button>
    </form>
    </div>
  </div>

<?php
    }
?>



  </body>
</html>

