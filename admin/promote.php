<?php
	include "include/db.php";
	$PromoteFromURL=$_GET['Promote'];
	$sem=$_GET['se'];
	
	//echo $sem;
	
	//$res=mysqli_query($connection,"select sem from admission");
	if($sem == '1st')
	{
	$query1="update admission set sem='2nd' where id='$PromoteFromURL' && sem='1st'";
	$res1=mysqli_query($connection,$query1);
	//echo $query1;
	}
	else if($sem == '3rd')
	{
	$query1="update admission set sem='4th' where id='$PromoteFromURL' && sem='3rd'";
	$res1=mysqli_query($connection,$query1);
	//echo $query1;
	}
	
	
	
	
	
	
	
?>

<!--<script type="text/javascript">
	alert("Student promoted" );
	window.location="existing_students.php"

</script>-->