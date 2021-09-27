		<?php require_once "include/db.php";
		require_once "include/sessions.php";
		require_once "include/functions.php";
		
						$Name_Error="";
						$Username_Error="";
						$Email_Error="";
						$Contact_Error="";
						$Roll_Error="";
						
		
		if(isset($_POST['submit1']))
					
					
					
			{
						
						$Name=mysqli_real_escape_string($connection,$_POST["name"]);
						$Username=mysqli_real_escape_string($connection,$_POST["Username"]);
						$Password=mysqli_real_escape_string($connection,$_POST["Password"]);
						
						$Email=mysqli_real_escape_string($connection,$_POST["email"]);
						$Contact=mysqli_real_escape_string($connection,$_POST["contact"]);
						$Course=mysqli_real_escape_string($connection,$_POST["course"]);
						
						
						$Sem=mysqli_real_escape_string($connection,$_POST["sem"]);
						$Enrollment=mysqli_real_escape_string($connection,$_POST["enrollmentno"]);
						
						$Image=$_FILES["stu_pic"]["name"];
						$Target="upload/".basename($_FILES["stu_pic"]["name"]);
						move_uploaded_file($_FILES["stu_pic"]["tmp_name"],$Target);
						

						
						
						if(!preg_match("/^[A-Za-z .]*$/",$Name))
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
							
							elseif(!preg_match("/^[0-9]+$/",$Contact))
							{
								$Contact_Error="Invalid phone number format";
							}
							
						else if(!preg_match("/^[0-9]{0,2}$/",$Enrollment))	
							{
								$Roll_Error="Invalid Roll Number format";
							}
						
						
							
							else
								
							{	
								$query="select * from registration where username='$_POST[Username]'";
								$res=mysqli_query($connection,$query);
								if(mysqli_num_rows($res)>1)
								{
									echo '<script type="text/javascript"> alert("User already exists..try another username") </script>';
								}
								
								else
								{
								$query="insert into registration(id,name,username,password,email,contact,course,sem,enrollment,status,img)
								VALUES ('','$Name','$Username','$Password','$Email','$Contact','$Course','$Sem','$Enrollment','NO','$Image')";
								$query_run= mysqli_query($connection,$query);
							
									if($query_run)
									{
										$_SESSION["SuccessMessage"]="User registered..you will be able to login when your account is approved by the admin ";
										header('location:stu_registration.php');
										exit;
									}
							
									else
									{
										$_SESSION["ErrorMessage"]="Error";
										header("Location:stu_registration.php");
										exit;
									}
										
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

			<title>Student Registration Form | LMS </title>

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
						
						<form name="form1" action="stu_registration.php" method="post" enctype="multipart/form-data">
							<h2>Student Registration Form</h2><br>

							<div>
								<input type="text" class="form-control" placeholder="Name" name="name"  required=""/>
								<span style="color:red"> <?php echo $Name_Error; ?>	</span>
							</div>
							

							<div>
								<input type="text" class="form-control" placeholder="Username( Your Student Id)" name="Username" required=""/>
								<span style="color:red"> <?php echo $Username_Error; ?>	</span>
							</div>
							<div>
								<input type="password" class="form-control" placeholder="Password" name="Password" required=""/>
							</div>
							
							
							<div>
								<input type="text" class="form-control" placeholder="email" name="email" required=""/>
								<span style="color:red"> <?php echo $Email_Error; ?>	</span>
							</div>
							<div>
								<input type="text" class="form-control" placeholder="contact" name="contact" required=""/>
								<span style="color:red"> <?php echo $Contact_Error; ?>	</span>
							</div>
							
							<div>
								<select class="form-control" name="course">
									<?php
									$res=mysqli_query($connection,"select course_name from courses");
									while($row=mysqli_fetch_array($res))
									{	?>
										
										<option value="<?php echo $row["course_name"]?>">
										<?php  echo $row['course_name']?>
										</option>
									<?php }
									?>
								
								
								</select><br>
							</div>
							
							
							
							
							
							<div>
								
								<select class="form-control" name="sem">
								<option>---Semester---</option>
								<option value="1st">1st	</option>
								<option value="2nd">2nd	</option>
								<option value="3rd">3rd</option>
								<option value="4th">4th	</option>
								<option value="5th">5th	</option>
								<option value="6th">6th	</option>
								</select><br>
							</div>
							<div>
								<input type="text" class="form-control" placeholder="Roll No" name="enrollmentno" required=""/>
								<span style="color:red"> <?php echo $Roll_Error; ?>	</span>
							</div>
							
							<div>
							<input class="form-control" type="file" name="stu_pic" required>
							</div>	
							<br>
							
							
							<div class="col-lg-12  col-lg-push-3">
								<input class="btn btn-default submit " type="submit" name="submit1"  value="Register">
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
