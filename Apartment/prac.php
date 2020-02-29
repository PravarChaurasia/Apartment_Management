<?php
$date=date("Y-m-d");
echo $date;
echo "<meta http-equiv='refresh' content='0'>";
?>
<html>
<head>
</head>
<body>
<a href="image/1-N-12-799_29_pf.JPG"  target="_blank"><button type="button" class="btn btn-success">Success</button></a>
</body>
</html>
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