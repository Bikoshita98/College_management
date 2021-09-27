
<?php require_once "include/header.php" ?>
<?php require_once "include/db.php" ?>
<?php require_once "include/functions.php";	

	$Title_Error=""; $Author_Error=""; $Publication_Error=""; $Price_Error=""; $Total_Error=""; $Available_Error="";
?>




        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Page</h3>
						
                    </div>

                   <!-- <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" name="Search" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default"  type="button">Go!</button>
					  
					  
                    </span>
                            </div>
                        </div>
                    </div>-->
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add Books to the Library</h2>	
									
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
							
						<div> 
							<form action="add_books.php" method="post" enctype="multipart/form-data">
								<fieldset>
								
									<div class="form-group">
										<label for="bookpic">Cover of the Book : </label>
										<input class="form-control" type="file" name="BookPic" id="bookpic">
									</div><br>
									
									<div class="form-group">
										<label for="bookname">Book Name: </label>
										<input class="form-control" type="text" name="BookName" id="bookname" placeholder="Name of the book">
										
									</div><br>
									<div style="color:red">
												<?php echo $Title_Error; ?>
										</div><br>
									
									
									<div class="form-group">
										<label for="author">Author's Name:</label>
										<input class="form-control" type="text" name="Author" id="author" placeholder="Name of the Author">
										
									</div><br>
									<div style="color:red">
												<?php echo $Author_Error; ?>
										</div><br>
									
									<div class="form-group">
										<label for="publication">Publication House:</label>
										<input class="form-control" type="text" name="Publication" id="publication" placeholder="Name of the Publication House">
									</div><br>
										<div style="color:red">
												<?php echo $Publication_Error; ?>
										</div><br>
									
									
									<div class="form-group">
										<label for="date">Purchase Date:</label>
										<input class="form-control" type="date" name="Date" id="date" >
									</div><br>
									
									<div class="form-group">
										<label for="price">Price:</label>
										<input class="form-control" type="rupees" name="Price" id="price" placeholder="Price of the book" >
									</div><br>
										<div style="color:red">
												<?php echo $Price_Error; ?>
										</div><br>
									
									
									
									<div class="form-group">
										<label for="total">Total Quantity:</label>
										<input class="form-control" type="text" name="Total" id="total" placeholder="Total number of books purchased" >
									</div><br>
									<div style="color:red">
												<?php echo $Total_Error; ?>
										</div><br>
									
									<div class="form-group">
										<label for="available">Available Quantity:</label>
										<input class="form-control" type="text" name="Available" id="available" placeholder="Available right now" >
									</div><br>
									
									<div style="color:red">
												<?php echo $Available_Error; ?>
										</div><br>
									
									<input class="btn btn-success btn-block" type="submit" name="submit1" value="Add Book Details">
								</fieldset>
								<br>
							
								
								
							</form>
							
							<?php
	
		if(isset($_POST["submit1"]))
		{
			
			date_default_timezone_set("Asia/Kolkata");
			$CurrentTime=time();
			$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
			$DateTime;
			
			$Image=$_FILES["BookPic"]["name"];
			$Target="Upload/".basename($_FILES["BookPic"]["name"]);
			move_uploaded_file($_FILES["BookPic"]["tmp_name"],$Target);
			
			$Title=mysqli_real_escape_string($connection,$_POST["BookName"]);
			$Author=mysqli_real_escape_string($connection,$_POST["Author"]);
			
			$Publication=mysqli_real_escape_string($connection,$_POST["Publication"]);
			$PurchaseDate=mysqli_real_escape_string($connection,$_POST["Date"]);
			$Price=mysqli_real_escape_string($connection,$_POST["Price"]);
			$TotalBought=mysqli_real_escape_string($connection,$_POST["Total"]);
			$Available=mysqli_real_escape_string($connection,$_POST["Available"]);
			//$Username=$_SESSION['Username'];
			
			if(!preg_match("/^[a-zA-Z0-9'\s\.\-\,]+$/",$Title))
				{
					$Title_Error="Only letters,numbers and white spaces are allowed for book title";
				}
				
			elseif(!preg_match("/^[A-Za-z .]*$/",$Author))
				{
					$Author_Error="Only letters and white spaces are allowed for author";
				}	
			
			elseif(!preg_match("/^[a-zA-Z0-9'\s\.\-\,]+$/",$Publication))
				{
					$Publication_Error="Only letters,numbers and white spaces are allowed for publication";
				}
				
			elseif(!preg_match("/^(?:0|[1-9]\d*)(?:\.(?!.*000)\d+)?$/",$Price))
				{
					$Price_Error="Invalid Price format";
				}	

			elseif(!preg_match("/^[0-9]+$/",$TotalBought))
				{
					$Total_Error="Only numbers are allowed";
				}
				
			elseif(!preg_match("/^[0-9]+$/",$Available))
				{
					$Available_Error="Only numbers are allowed";
				}	
			
	
			else{
			
				
				$query="INSERT INTO add_books VALUES('','$DateTime','$Image','$Title','$Author','$Publication','$PurchaseDate','$Price','$TotalBought','$Available','$_SESSION[librarian]')";
				$Execute=mysqli_query($connection,$query);
				
				if($Execute){?>
				
					<script type="text/javascript">
					
					alert("Book added to library");
					window.location="add_books.php";
			
					</script>
					
					
				<?php }
				else{ ?>
					<script type="text/javascript">
					alert("not added");
					window.location="add_books.php";
			
					</script>
					
					
			<?php	}
				
				
				
			}
			
		}?>
			
							
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


       <?php require_once "include/footer.php"?>