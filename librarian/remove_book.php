<?php
	include "include/db.php";
	$DeleteFromURL=$_GET['Delete'];
	$query="DELETE FROM add_books WHERE id='$DeleteFromURL'";
	$Execute=mysqli_query($connection,$query);
	
	/*$id=$_GET["id"];
	mysqli_query($connection,"delete from add_books where id=$id");*/
	
?>

<script type="text/javascript">
	alert("Book removed from library");
	window.location="all_books.php"

</script>