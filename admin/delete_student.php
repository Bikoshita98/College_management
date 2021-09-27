<?php
	include "include/db.php";
	$id=$_GET["id"];
	mysqli_query($connection,"delete from registration where id=$id");
	
?>

<script type="text/javascript">
	alert("Student Deleted" );
	window.location="admin_dashboard.php"

</script>