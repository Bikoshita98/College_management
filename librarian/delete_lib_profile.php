<?php
	include "include/db.php";
	$id=$_GET["id"];
	mysqli_query($connection,"delete from librarian_profile where id=$id");
	
?>

<script type="text/javascript">
	alert("Profile Deleted" );
	window.location="lib_dashboard.php";

</script>