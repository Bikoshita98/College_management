<?php	//session_start();	?>

<?php require_once "include/sessions.php"; ?>
<?php require_once "include/functions.php";	?>


				<?php 
					$_SESSION["Username"]=null;
					session_destroy();
					header('location:../librarian/login_main.php');
				
					?>
				
		