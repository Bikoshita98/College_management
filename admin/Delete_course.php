<?php
	include "include/db.php";
	$DeleteFromURL=$_GET['Delete'];
	$query="DELETE FROM courses WHERE id='$DeleteFromURL'";
	$Execute=mysqli_query($connection,$query);
	
	/*$id=$_GET["id"];
	mysqli_query($connection,"delete from add_books where id=$id");*/
	
?>

<script type="text/javascript">
	alert("Course removed from college");
	window.location="add_courses.php"

</script>