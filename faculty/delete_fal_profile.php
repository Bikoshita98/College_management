<?php
	include "include/db.php";
	$id=$_GET["id"];
	mysqli_query($connection,"delete from faculty_profile where id=$id");
	
?>

<script type="text/javascript">
	alert("Profile Deleted" );
	window.location="faculty_dashboard.php";

</script>