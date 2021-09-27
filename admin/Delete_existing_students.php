<?php
	include "include/db.php";
	$DeleteFromURL=$_GET['Delete'];
	$query="DELETE FROM admission WHERE id='$DeleteFromURL'";
	$Execute=mysqli_query($connection,$query);
	
	/*$id=$_GET["id"];
	mysqli_query($connection,"delete from add_books where id=$id");*/
	
?>

<script type="text/javascript">
	alert("Student removed from college");
	window.location="existing_students.php"

</script>