<!DOCTYPE html>
<html>
<head>
	<title>admin register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!-- font awesome script -->
  <script src="https://kit.fontawesome.com/49f472c2b6.js"></script>
  <script type="text/javascript">
  	function Address(f) {
  if(f.same_address.checked == true) {
    f.permanent_address.value = f.contact_address.value;
  }
}
function Checkdoor(y) 
{
  var x = document.getElementById(y);
  var z = y+"error";
  if (!x.checkValidity()) 
  {
  	document.getElementById(z).style.visibility="visible";
  	document.getElementById("submit_form").disabled =true;
  }
  else
  {
  	document.getElementById(z).style.visibility="hidden";
  	document.getElementById("submit_form").disabled =false;
  }
  
}
function show(y)
{
	if(y=="tenant")
	{
		<!--document.getElementById("tenant_info").style.visibility="visible";-->
		document.getElementById("tenant_info").style.display="block";
		 $('#tenant_username').prop('required', true);
		 $('#tenant_email').prop('required', true);
		 $('#tenant_occupation').prop('required', true);
		 $('#tenant_phonenumber').prop('required', true);
		 $('#tenant_username').prop('required', true);
		 $('#tenant_father_name').prop('required', true);
		 $('#tenant_mother_name').prop('required', true);
		 $('#tenant_adhar_card').prop('required', true);
		 $('#tenant_profile_photo').prop('required', true);
		 $('#tenant_adress_proof').prop('required', true);
	}
	else
	{	
		<!--document.getElementById("tenant_info").style.visibility="hidden";-->
				document.getElementById("tenant_info").style.display="none";
		$('#tenant_username').prop('required', false);
		$('#tenant_email').prop('required',false);
		 $('#tenant_occupation').prop('required', false);
		 $('#tenant_phonenumber').prop('required',false);
		 <!--$('#tenant_username').prop('required', false);-->
		 $('#tenant_father_name').prop('required',false);
		 $('#tenant_mother_name').prop('required', false);
		 $('#tenant_adhar_card').prop('required', false);
		 $('#tenant_profile_photo').prop('required', false);
		 $('#tenant_adress_proof').prop('required', false);
		 document.getElementById("tenant_emailerror").style.visibility="hidden";
		 document.getElementById("tenant_father_nameerror").style.visibility="hidden";
		 document.getElementById("tenant_mother_nameerror").style.visibility="hidden";
		 document.getElementById("tenant_occupationerror").style.visibility="hidden";
		 document.getElementById("tenant_phonenumbererror").style.visibility="hidden";
		 document.getElementById("tenant_usernameerror").style.visibility="hidden";
		 
	}
}
  </script>
  <?php
  function randomPassword()
	 {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
	}
 if(isset($_POST['submit_form']))
 {
  echo "once submitted";
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
   $doorno=$_POST['doorno'];
   $username=$_POST['username'];
   $email=$_POST['email'];
   $phone=$_POST['phonenumber'];
   $father_name=$_POST['father_name'];
   $mother_name=$_POST['mother_name'];
   $occupation=$_POST['occupation'];
   $permanent_address=$_POST['permanent_address'];
   $contact_address=$_POST['contact_address'];
   $flatstatus=$_POST['status'];
   $randompass=$doorno.randomPassword();
   if($_FILES['profile_photo']['name'] && $_FILES['adhar_card']['name'] && $_FILES['adress_proof']['name'] && $_FILES['sales_copy']['name'])
	  	{
	  		$dfname=substr($doorno, 0, 10);
			$dlname=substr($doorno, 11, 2);
			$dname=$dfname.'_'.$dlname;
		  	$filename = $_FILES['profile_photo']['name'];
		  	$filename_adhar= $_FILES['adhar_card']['name'];
		  	$filename_address= $_FILES['adress_proof']['name'];
		  	$filename_sales= $_FILES['sales_copy']['name'];
		   $target_dir = "image/";
		   $extension=end(explode(".", $filename));
		   $extension_adhar=end(explode(".", $filename_adhar));
		   $extension_address=end(explode(".", $filename_address));
		   $extension_sales=end(explode(".", $filename_sales));
		   $newfilename=$dname."_".pf.".".$extension;
		   $newfilename_adhar=$dname."_".adhar.".".$extension_adhar;
		   $newfilename_address=$dname."_".address.".".$extension_address;
		   $newfilename_sales=$dname."_".sales.".".$extension_sales;
		   $location=$target_dir.$newfilename;
		   $location_adhar=$target_dir.$newfilename_adhar;
		   $location_address=$target_dir.$newfilename_address;
		   $location_sales=$target_dir.$newfilename_sales;
		   $type="m";
		   $sql = "INSERT INTO member(doorno,name,phone,email,fathername,mothername,occupation,contactaddress,permanentaddress,flatstatus,profilepic,adharcard,addressproof,saledeed,password,type) VALUES('$doorno','$username','$phone','$email','$father_name','$mother_name','$occupation','$contact_address','$permanent_address','$flatstatus','$location','$location_adhar','$location_address','$location_sales','$randompass','$type')";
		    if ($conn->query($sql) === TRUE) 
		    {
		     //upload image
		    	if(move_uploaded_file($_FILES['profile_photo']['tmp_name'], $location) && move_uploaded_file($_FILES['adhar_card']['tmp_name'], $location_adhar) && move_uploaded_file($_FILES['adress_proof']['tmp_name'], $location_address) && move_uploaded_file($_FILES['sales_copy']['tmp_name'], $location_sales))
		    	{
		    		
		    		if($flatstatus=='tenant')
		    		{
		    			$tenant_username=$_POST['tenant_username'];
		    			$tenant_email=$_POST['tenant_email'];
		    			$tenant_phone=$_POST['tenant_phone'];
		    			$tenant_occupation=$_POST['tenant_occupation'];
		    			$tenant_father_name=$_POST['tenant_father_name'];
		    			$tenant_mother_name=$_POST['tenant_mother_name'];
		    			echo $tenant_phone;
		    			if($_FILES['tenant_profile_photo']['name'] && $_FILES['tenant_adhar_card']['name'] && $_FILES['tenant_adress_proof']['name'])
		    			{
		    				$tenant_filename = $_FILES['tenant_profile_photo']['name'];
						  	$tenant_filename_adhar= $_FILES['tenant_adhar_card']['name'];
						  	$tenant_filename_address= $_FILES['tenant_adress_proof']['name'];
						  	$target_dir = "image/";
						   $tenant_extension=end(explode(".", $tenant_filename));
						   $tenant_extension_adhar=end(explode(".", $tenant_filename_adhar));
						   $tenant_extension_address=end(explode(".", $tenant_filename_address));
						   $tenant_newfilename=$dname."_".tpf.".".$tenant_extension;
						   $tenant_newfilename_adhar=$dname."_".tadhar.".".$tenant_extension_adhar;
						   $tenant_newfilename_address=$dname."_".taddress.".".$tenant_extension_address;
						   $tenant_location=$target_dir.$tenant_newfilename;
						   $tenant_location_adhar=$target_dir.$tenant_newfilename_adhar;
						   $tenant_location_address=$target_dir.$tenant_newfilename_address;
						   $asql = "INSERT INTO tenant(doorno,name,phone,email,fathername,mothername,occupation,profilepic,adharcard,addressproof) VALUES('$doorno','$tenant_username','$tenant_phone','tenant_$email','$tenant_father_name','$tenant_mother_name','$tenant_occupation','$tenant_location','$tenant_location_adhar','$tenant_location_address')";
						   if ($conn->query($asql) === TRUE) 
						    {
						     //upload image
						    	if(move_uploaded_file($_FILES['tenant_profile_photo']['tmp_name'], $tenant_location) && move_uploaded_file($_FILES['tenant_adhar_card']['tmp_name'], $tenant_location_adhar) && move_uploaded_file($_FILES['tenant_adress_proof']['tmp_name'], $tenant_location_address))
						    	{
						    		
						    	}
						    	else
						    	{
						    		echo "not uploaded tenant info but registered";
						    	}	
						    }
						    else
						    {
						    	echo "error in tenant data".$conn->error;
						    }	
		    			}
		    			else
		    			{
		    				echo "error in tenant part";
		    			}
		    		}
		    	}
		    	else
		    	{
		    		echo "not uploaded";
		    	}
		    ?>
		    <script type="text/javascript"> alert("new data record created successfully")</script>
		    <?php
		    }
		    else 
		    {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		    } 
	  	}
	  	else
	  	{
	  		echo "error";
	  	} 
  $conn->close();
   } 
 }
?>
<style>
td,th{
	padding:5px;
}
.star {
    color: red;
	font-size: 70%;
}
table{
 
  
}

body{
font: 400 15px Lato, sans-serif;
font-size: 13px !important;
    line-height: 2;
    color: #818181;
	letter-spacing: 2px;
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
  margin-top: 2vh;
  margin-bottom: 2vh;
}
</style>
</head>
<body>
<center>
<div class="chart">
	<h2 style="color:black">Enter New User Details </h2>
<table align="center" style="width:800px;color:black;">
<form style="text-align: center;" name="form1" method="post" enctype="multipart/form-data" action="aregister.php">
	<tr><td width="200">Door Number<sup><span class="star">&#x2605;</span></sup></td>
	    <td><input type="text" name="doorno" id="doorno" placeholder="Door Number..." onchange="Checkdoor(this.id)" required pattern="[0-9][-][NEWS][-][0-9]{2}[-][0-9]{3}[/][0-9]{2}" ></td>
	    <td><em id="doornoerror" style="color: red;visibility: hidden;">please enter correct doorname</em><br></td>
	</tr>
	<tr>
	    <td>User Name<sup><span class="star">&#x2605;</span></sup></td>
		<td><input type="text" name="username" id="username" placeholder="username" onchange="Checkdoor(this.id)" required pattern="[a-zA-Z][a-zA-Z ]+"></td>
	    <td><em id="usernameerror" style="color: red;visibility: hidden;">please enter correct member's name</em><br></td>
	</tr>
	<tr>
	    <td>Phone Number<sup><span class="star">&#x2605;</span></sup></td>
		<td><input type="text" name="phonenumber" id="phonenumber" placeholder="phonenumber" onchange="Checkdoor(this.id)" required pattern="[789][0-9]{9}"></td>
	    <td><em id="phonenumbererror" style="color: red;visibility: hidden;">please enter correct phone number</em><br></td>
	</tr>
	<tr><td>Email<sup><span class="star">&#x2605;</span></sup></td>
	    <td><input type="email" name="email" id="email" placeholder="email" onchange="Checkdoor(this.id)" required></td>
	    <td><em id="emailerror" style="color: red;visibility: hidden;">please enter correct email-id</em><br></td>
	</tr>
	<tr><td>Father's Name<sup><span class="star">&#x2605;</span></sup></td>
	    <td><input type="text" name="father_name" id="father_name" placeholder="father's name" onchange="Checkdoor(this.id)" required pattern="[a-zA-Z][a-zA-Z ]+"></td>
	    <td><em id="father_nameerror" style="color: red;visibility: hidden;">please enter correct father name</em><br></td>
	</tr>
	<tr><td>Mother's Name<sup><span class="star">&#x2605;</span></sup></td>
	    <td><input type="text" name="mother_name" id="mother_name" placeholder="mother's name" onchange="Checkdoor(this.id)" required pattern="[a-zA-Z][a-zA-Z ]+"></td>
	    <td><em id="mother_nameerror" style="color: red;visibility: hidden;">please enter correct mother name</em><br></td>
	</tr>
	<tr><td>Occupation</td>
	    <td><input type="text" name="occupation" id="occupation" placeholder="occupation" onchange="Checkdoor(this.id)" required></td>
	    <td><em id="occupationerror" style="color: red;visibility: hidden;">please enter occupation</em><br></td>
	</tr>
	<tr><td>Contact Address<sup><span class="star">&#x2605;</span></sup></td> 
	     <td><textarea rows = "5" cols = "50" name = "contact_address" placeholder="contact address" required> </textarea></td>
    </tr>
    <br>
    <tr><td></td><td><input type="checkbox" name="same_address" onclick="Address(this.form)">
	       <em>Check this box if Contact Address and Permanent Address are the same.</em></td>
	</tr>
	<br>
	<tr><td>Permanent Address<sup><span class="star">&#x2605;</span></sup></td><td><textarea rows = "5" cols = "50" name = "permanent_address" placeholder="permanent address" required></textarea></td>
	</tr>
  
	<tr><td>Upload profile photo<sup><span class="star">&#x2605;</span></sup></td>
	    <td><input type="file"  name="profile_photo"  id="profile_photo" required></td>
	</tr>
	<tr><td>Upload adhar card<sup><span class="star">&#x2605;</span></sup></td>
	    <td><input type="file" name="adhar_card"  id="adhar_card" required><td>
    </tr>
	<tr><td>Upload address proof<sup><span class="star">&#x2605;</span></sup></td>
	    <td><input type="file" name="adress_proof"  id="profile_photo" required></td>
    </tr>
	<tr><td>Upload sale deed<sup><span class="star">&#x2605;</span></sup></td>
	    <td><input type="file" name="sales_copy"  id="sales_copy" required></td>
	</tr>
	<tr><td>flat occupation status<sup><span class="star">&#x2605;</span></sup><br></td>
	    <td>Staying <input type="radio" name="status" value="staying" checked="checked" onclick="show(this.value)">&nbsp;&nbsp;
	    Not staying <input type="radio" name="status" value="not staying" onclick="show(this.value)">&nbsp;&nbsp;
	    Tenant <input type="radio" name="status" value="tenant" onclick="show(this.value)"><br></td>
	</tr>
	<!--<div style="visibility: hidden;" id="tenant_info">-->
	</table>
	
	
	<table style="display:none;width:700px;cellpadding:20" id="tenant_info" align="center" >
	 <tr><td><h3>Tenant's Details</h3></td></tr>
	<tr><td width="200">Name<sup><span class="star">&#x2605;</span></sup></td><td><input type="text" name="tenant_username" id="tenant_username" placeholder="tenant username" onchange="Checkdoor(this.id)" pattern="[a-zA-Z][a-zA-Z ]+"></td>
	    <td><em id="tenant_usernameerror" style="color: red;visibility: hidden;">please enter correct tenant's name</em><br></td></tr>
	
	<tr><td>Phone Number<sup><span class="star">&#x2605;</span></sup></td><td><input type="text" name="tenant_phone" id="tenant_phonenumber" placeholder="tenant phonenumber" onchange="Checkdoor(this.id)" pattern="[789][0-9]{9}"></td>
	    <td><em id="tenant_phonenumbererror" style="color: red;visibility: hidden;">please enter correct tenant's phone number</em><br></td></tr>
	
	<tr><td>Email<sup><span class="star">&#x2605;</span></sup></td><td><input type="email" name="tenant_email" id="tenant_email" placeholder="tenant email" onchange="Checkdoor(this.id)" ></td>
	    <td><em id="tenant_emailerror" style="color: red;visibility: hidden;">please enter correct tenant's email-id</em><br></td></tr>
	
	<tr><td>Father's Name<sup><span class="star">&#x2605;</span></sup></td><td><input type="text" name="tenant_father_name" id="tenant_father_name" placeholder="tenant father's name" onchange="Checkdoor(this.id)" pattern="[a-zA-Z][a-zA-Z ]+"></td>
	    <td><em id="tenant_father_nameerror" style="color: red;visibility: hidden;">please enter correct tenant's father name</em><br></td></tr>
	
	<tr><td>Mother's Name<sup><span class="star">&#x2605;</span></sup></td><td><input type="text" name="tenant_mother_name" id="tenant_mother_name" placeholder="tenant mother's name" onchange="Checkdoor(this.id)" pattern="[a-zA-Z][a-zA-Z ]+" ></td>
	    <td><em id="tenant_mother_nameerror" style="color: red;visibility: hidden;">please enter correct tenant's mother name</em><br></td></tr>
	
	<tr><td>Occupation</td><td><input type="text" name="tenant_occupation" id="tenant_occupation" placeholder="tenant occupation" onchange="Checkdoor(this.id)"></td>
	    <td><em id="tenant_occupationerror" style="color: red;visibility: hidden;">please enter tenant's occupation</em><br></td></tr>
		
	<tr><td>Upload profile photo<sup><span class="star">&#x2605;</span></sup></td><td><input type="file"  name="tenant_profile_photo" style="margin:auto" id="tenant_profile_photo"></td></tr>
	
	<tr><td>Upload adhar card<sup><span class="star">&#x2605;</span></sup></td><td><input type="file" name="tenant_adhar_card" style="margin:auto" id="tenant_adhar_card"></td></tr>
	
	<tr><td>Upload address proof<sup><span class="star">&#x2605;</span></sup></td><td><input type="file" name="tenant_adress_proof" style="margin:auto" id="tenant_adress_proof"></td></tr>
	</table>
	<br>
	<tr><td></td><td><button type="submit" class="btn btn-primary" name="submit_form" id="submit_form"><i class="far fa-paper-plane"></i>&nbsp;Submit</button></td></tr>
</form>
</div>
</center>
</body>
</html>