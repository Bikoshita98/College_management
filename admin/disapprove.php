<?php
	include "include/db.php";
	$id=$_GET["id"];
	mysqli_query($connection,"update registration set status='NO' where id=$id");
	
?>

<script type="text/javascript">
	alert("Status changed to NO" );
	window.location="admin_dashboard.php"

</script>