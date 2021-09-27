<?php require_once "include/db.php";	?>

<?php require_once "include/functions.php";	?>



<?php
function Redirect_to($New_location){
	//header("Location:".$New_location );
	exit;
}
?>

<?php

		/*function Login_Attempt($Username,$Password){
			$Query="SELECT * FROM userinfotable WHERE username='$Username' AND password='$Password'";
			$Execute=mysqli_query($connection,$Query);
			if($admin=mysqli_fetch_assoc($Execute)){
				
				//if(mysqli_num_rows($Execute)>0){
				return $admin;
			}
			else{
				return null;
			}
		}*/
		
		function Login(){
			if(isset($_SESSION["Username"])){
				return true;
			}
		}
		function Confirm(){
			if(!Login()){
				Redirect_to("loginmainadmin.php");
			}
		}
		function Confirm2(){
			if(!Login()){
				Redirect_to("loginmain.php");
			}
		}
		
		
		?>