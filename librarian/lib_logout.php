<?php	//session_start();	?>

<?php require_once "include/sessions.php"; ?>
<?php require_once "include/functions.php";	?>


				<?php 
					$_SESSION['librarian']=null;
					session_destroy();
					header('location:login_main.php');
				
					?>
				
		