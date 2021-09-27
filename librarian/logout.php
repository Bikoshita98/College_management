<?php 
					$_SESSION['Username']=null;
					session_destroy();
					header('location:index.php');
				
					?>