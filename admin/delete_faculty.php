<?php
	include "include/db.php";
	$id=$_GET["id"];
	mysqli_query($connection,"delete from faculty_reg where id=$id");
	
?>

<script type="text/javascript">
	alert("deleted" );
	window.location="admin_dashboard.php"

</script>