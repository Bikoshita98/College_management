<?php require_once "include/db.php" ?>
<?php require_once "include/sessions.php"; ?>

				<!DOCTYPE html>
				<html lang="en">
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
					<!-- Meta, title, CSS, favicons, etc. -->
					<meta charset="utf-8">
					<meta http-equiv="X-UA-Compatible" content="IE=edge">
					<meta name="viewport" content="width=device-width, initial-scale=1">

					<title> Login Form | CMS </title>

					<!-- Bootstrap -->
					<link href="css/bootstrap.min.css" rel="stylesheet">
					<link href="css/animate.min.css" rel="stylesheet">
					<link href="css/custom.min.css" rel="stylesheet">
				</head>

				<br>
				<div>
				
				<div class="col-lg-12 text-center ">
				
					<h1 style="font-family:Lucida Console">College Management System</h1>
				</div>

				<br>

				<body class="login" >


				<div class="login_wrapper">

					<section class="login_content">
						<form name="form1" action="" method="post">
							<h1>Login Form</h1>
							<div>
							<select name="designation" class="form-control">
							<option>Admin	</option>
							<option>Faculty	</option>
							<option>Librarian	</option>
							<option>Student	</option>
							</select><br>
							</div>
							<div>
								<input type="text" name="username" class="form-control" placeholder="Username" required=""/>
							</div>
							<div>
								<input type="password" name="password" class="form-control" placeholder="Password" required=""/>
							</div>
							<div>

								<input class="btn btn-default submit" type="submit" name="submit1" value="Login">
								<a class="reset_pass" href="#">Lost your password?</a>
							</div>

							<div class="clearfix"></div>

							<div class="separator">
								<p class="change_link">New to site?<br>
									<a href="../student/stu_registration.php"> Create New Student Account </a><br>
									<a href="../faculty/faculty_registration.php"> Create New Faculty Account </a><br>
									<a href="librarian_registration.php"> Create New Librarian Account </a><br>
								</p>

								<div class="clearfix"></div>
								<br/>


							</div>
						</form>
					</section>


				</div>

					<?php
					if(isset($_POST['submit1']))
					{
						$count=0;
						if($_POST['designation']=='Librarian')
						{
						$Username=mysqli_real_escape_string($connection,$_POST["username"]);
						$Password=mysqli_real_escape_string($connection,$_POST["password"]);
						$query="select * from librarian_reg where username='$Username' && password='$Password' && status='YES'";
						$query_run=mysqli_query($connection,$query);
						$count=mysqli_num_rows($query_run);
						
						if($count==0)
						{
							?>
							<div class="alert alert-danger col-lg-6 col-lg-push-3">
							<strong style="...">Invalid</strong> Username or Password
							</div>
							
						<?php	
						}
						else
						{
							$_SESSION["librarian"]=$_POST["username"]
						?>
							<script type="text/javascript">
							
							window.location="lib_dashboard.php"
							
							</script>
						<?php	
						}
						}
						
						
						else if($_POST['designation']=='Admin')
						{	
							$Username=mysqli_real_escape_string($connection,$_POST["username"]);
							$Password=mysqli_real_escape_string($connection,$_POST["password"]);
							$query="select * from admin where username='$Username' && password='$Password'";
							$query_run=mysqli_query($connection,$query);
							$count=mysqli_num_rows($query_run);
							
							if($count==0)
							{
								?>
								<div class="alert alert-danger col-lg-6 col-lg-push-3">
								<strong style="...">Invalid</strong> Username or Password
								</div>
								
							<?php	
							}
							else
							{
								$_SESSION["Username"]=$_POST["username"];
								$_SESSION["Password"]=$_POST["password"];
							?>
								<script type="text/javascript">
								
								window.location="../admin/admin_dashboard.php"
								
								</script>
							<?php	
							}
						}
						
						else if($_POST['designation']=='Student')
						{	
							$Username=mysqli_real_escape_string($connection,$_POST["username"]);
							$Password=mysqli_real_escape_string($connection,$_POST["password"]);
							$query="select * from registration where username='$Username' && password='$Password' && status='YES'";
							$query_run=mysqli_query($connection,$query);
							$count=mysqli_num_rows($query_run);
							
							if($count==0)
							{
								?>
								<div class="alert alert-danger col-lg-6 col-lg-push-3">
								<strong style="...">Invalid</strong> Username or Password
								</div>
								
							<?php	
							}
							else
							{
								
								
								$_SESSION["Username"]=$_POST["username"];
								
								$_SESSION["Password"]=$_POST["password"];
							?>
								<script type="text/javascript">
								
								window.location="../student/student_dashboard.php"
								
								</script>
								<?php	
							}
						}
						
						else if($_POST['designation']=='Faculty')
						{	
							$Username=mysqli_real_escape_string($connection,$_POST["username"]);
							$Password=mysqli_real_escape_string($connection,$_POST["password"]);
							$query="select * from faculty_reg where username='$Username' && password='$Password' && status='YES' ";
							$query_run=mysqli_query($connection,$query);
							$count=mysqli_num_rows($query_run);
							
							if($count==0)
							{
								?>
								<div class="alert alert-danger col-lg-6 col-lg-push-3">
								<strong style="...">Invalid</strong> Username or Password
								</div>
								
							<?php	
							}
							else
							{
								
								
								$_SESSION["Username"]=$_POST["username"];
								
								$_SESSION["Password"]=$_POST["password"];
							?>
								<script type="text/javascript">
								
								window.location="../faculty/faculty_dashboard.php"
								
								</script>
								<?php	
							}
						}
					}
					
					
					
					
					
					?>

				<!--<div class="alert alert-danger col-lg-6 col-lg-push-3">
					<strong style="color:white">Invalid</strong> Username Or Password.
				</div>-->

				</div>
				</body>
				</html>
