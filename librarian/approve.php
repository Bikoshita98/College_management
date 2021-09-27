<?php
	include "include/db.php";
	$id=$_GET["id"];
	mysqli_query($connection,"update registration set status='yes' where id=$id");
	
?>

<script type="text/javascript">
	window.location="lib_main.php"

</script>