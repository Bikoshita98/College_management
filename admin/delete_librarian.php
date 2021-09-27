<?php
	include "include/db.php";
	$id=$_GET["id"];
	mysqli_query($connection,"delete from librarian_reg where id=$id");
	
?>

<script type="text/javascript">
	alert("Librarian Deleted" );
	window.location="admin_dashboard.php"

</script>