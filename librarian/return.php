<?php
	require_once "include/db.php";
	$id=$_GET["id"];
	date_default_timezone_set("Asia/Kolkata");
	$CurrentTime=time();
	$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
	$DateTime;
	$res=mysqli_query($connection,"update issue_books set return_date='$DateTime' where id='$id'");
	
	$book_name="";
	$res=mysqli_query($connection,"select * from issue_books where id='$id'");
	while($row=mysqli_fetch_array($res))
	{
		$book_name=$row["book_name"];
	}
	$res=mysqli_query($connection,"update add_books set quantity_available=quantity_available+1 where book_name='$book_name'");
?>
<script type="text/javascript">
alert("Book returned successfully");
window.location="return_books.php";
</script>