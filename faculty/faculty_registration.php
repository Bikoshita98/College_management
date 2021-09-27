	<?php require_once "include/db.php"; 
	require_once "include/sessions.php";
	require_once "include/functions.php";
		
		$Dept_Error="";
		$Name_Error="";
		$Username_Error="";
		$Email_Error="";
		$Contact_Error="";
		
					if(isset($_POST['submit1']))
					{
						
						$Name=mysqli_real_escape_string($connection,$_POST["name"]);
						$Department=mysqli_real_escape_string($connection,$_POST["dept"]);
						$Username=mysqli_real_escape_string($connection,$_POST["Username"]);
						$Password=mysqli_real_escape_string($connection,$_POST["Password"]);
						$Email=mysqli_real_escape_string($connection,$_POST["email"]);
						$Contact=mysqli_real_escape_string($connection,$_POST["contact"]);
						
						$DOA=mysqli_real_escape_string($connection,$_POST["doa"]);
						
						$Image=$_FILES["fal_pic"]["name"];
						$Target="upload/".basename($_FILES["fal_pic"]["name"]);
						move_uploaded_file($_FILES["fal_pic"]["tmp_name"],$Target);
						
						if(!preg_match("/^[A-Za-z0-9%*#& .]*$/",$Department))
							{
								 $Dept_Error="Invalid dept format";
							}
						
						else if(!preg_match("/^[A-Za-z .]*$/",$Name))
							{
								 $Name_Error="Only letters and white spaces are allowed";
							}
							
						else if(!preg_match("/^CSM[A-Za-z0-9._-]*$/",$Username))
						{
							$Username_Error="Invalid Username";
						}

						else if(!preg_match("/[A-Za-z0-9._-]{3,}@[A-Za-z0-9._-]{3,}[.]{1}[A-Za-z0-9._-]{2,}/",$Email))
							{
								$Email_Error="Invalid email format";
							}
							
						else if(!preg_match("/^[0-9]*$/",$Contact))	
							{
								$Contact_Error="Invalid phone number format..to be preceeded by country code";
							}
							
						
						else{
								$query="insert into faculty_reg(id,dept,name,username,password,email,contact,doa,status,img)
								VALUES ('','$Department','$Name','$Username','$Password','$Email','$Contact','$DOA','NO','$Image')";
								$query_run= mysqli_query($connection,$query);
							
									if($query_run)
									{
										$_SESSION["SuccessMessage"]="Faculty registered..you will be able to login when your account is approved by the admin ";
										header('location:faculty_registration.php');
										exit;
									}
							
									else
									{
										$_SESSION["ErrorMessage"]="Error";
										header("Location:faculty_registration.php");
										exit;
									}
										
							
							}
						
						
					}
					


?>
	
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<!-- Meta, title, CSS, favicons, etc. -->
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<title>Faculty Registration Form | CMS </title>

			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="css/animate.min.css" rel="stylesheet">
			<link href="css/custom.min.css" rel="stylesheet">
		</head>

		<br>

		<div class="col-lg-12 text-center ">
			<h1 style="font-family:Lucida Console">College Management System</h1>
		</div>


		<body class="login" style="margin-top: -20px; ">





			<div class="login_wrapper">

					<section class="login_content" style="margin-top: -40px;">
					
					<div> 
						<?php echo Message();?>		
						<?php echo SuccessMessage();?></div>
						<form name="form1" action="faculty_registration.php" method="post" enctype="multipart/form-data">
							<h2>Faculty Registration Form</h2><br>

							<div>
								<input type="text" class="form-control" placeholder="Department" name="dept" required=""/>
								<span style="color:red;"> <?php echo $Dept_Error; ?>	</span>
							</div>


							<div>
								<input type="text" class="form-control" placeholder="Name" name="name" required=""/>
								<span style="color:red;"> <?php echo $Name_Error; ?>	</span>
							</div>
							

							<div>
								<input type="text" class="form-control" placeholder="Username ( Your faculty Id)" name="Username" required=""/>
								<span style="color:red;"> <?php echo $Username_Error; ?>	</span>
							</div>
							<div>
								<input type="password" class="form-control" placeholder="Password" name="Password" required=""/>
							</div>
							<div>
								<input type="text" class="form-control" placeholder="email" name="email" required=""/>
								<span style="color:red;"> <?php echo $Email_Error; ?>	</span>
							</div>
							<div>
								<input type="text" class="form-control" placeholder="contact" name="contact" required=""/>
								<span style="color:red;"> <?php echo $Contact_Error; ?>	</span>
							</div>
							
							<div>
								<label>Date of Appointment	</label>
								<input type="date" class="form-control" placeholder="Date of Appointment" name="doa" required=""/>
							</div><br>
							
							<div>
							<input class="form-control" type="file" name="fal_pic" required>
							</div><br>	
							<div class="col-lg-12  col-lg-push-3">
								<input class="btn btn-default submit " type="submit" name="submit1" value="Register">
								
							</div>
							<button><a href="../librarian/login_main.php">Back	</a></button>
						</form>
					</section>
				


			</div>

			<!--<div class="alert alert-success col-lg-6 col-lg-push-3">
				Registration successfully, You will get email when your account is approved
			</div>-->


		</body>
		</html>
