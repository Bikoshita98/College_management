<?php require_once "include/sessions.php"; ?>
<?php require_once "include/header.php" ?>
<?php require_once "include/db.php" ?>
<?php require_once "include/functions.php";	?>




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
                                <h2>Edit Books</h2>	
									
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
							
						<div>
						
							<?php
							$SearchQueryParameter=$_GET['Edit'];
							$Query="SELECT * FROM add_books WHERE id='$SearchQueryParameter'";
							$Execute=mysqli_query($connection,$Query);
							while($Datarows=mysqli_fetch_array($Execute)){
								$ImageToBeUpdated=$Datarows['book_img'];
								$TitleToBeUpdated=$Datarows['book_name'];
								$AuthorToBeUpdated=$Datarows['author'];
								$PublicationToBeUpdated=$Datarows['publication'];
								$DateToBeUpdated=$Datarows['purchase_date'];
								$PriceToBeUpdated=$Datarows['price'];
								$TotalToBeUpdated=$Datarows['quantity_bought'];
								
								
								
								
								
							}
								
								
								
								
							?>




						
							<form action="Edit_book_info.php?Edit=<?php echo $SearchQueryParameter; ?>" method="post" enctype="multipart/form-data">
								<fieldset>
								
									<div class="form-group">
									<span class="field-info"> Existing Image <span>
									<img src="Upload/<?php echo $ImageToBeUpdated; ?>" width=200px><br>
									<label for="imageselect"> Select New Image:</label>
									<input type="File" class="form-control" name="BookPic" id="imageselect">
									</div>
									
									<div class="form-group">
										<label for="bookname">Book Name: </label>
										<input class="form-control" type="text" name="BookName" id="bookname" placeholder="Name of the book" value="<?php echo $TitleToBeUpdated ?>">
									</div><br>
									
									
									
									<div class="form-group">
										<label for="author">Author's Name:</label>
										<input class="form-control" type="text" name="Author" id="author" placeholder="Name of the Author" value="<?php echo $AuthorToBeUpdated ?>">
									</div><br>
									
									<div class="form-group">
										<label for="publication">Publication House:</label>
										<input class="form-control" type="text" name="Publication" id="publication" placeholder="Name of the Publication House" value="<?php echo $PublicationToBeUpdated ?>">
									</div><br>
									
									<div class="form-group">
										<label for="date">Purchase Date:</label>
										<input class="form-control" type="date" name="Date" id="date" value="<?php echo $DateToBeUpdated ?>" >
									</div><br>
									
									<div class="form-group">
										<label for="price">Price:</label>
										<input class="form-control" type="rupees" name="Price" id="price" placeholder="Price of the book" value="<?php echo $PriceToBeUpdated ?>">
									</div><br>
									
									
									
									<div class="form-group">
										<label for="total">Total Quantity:</label>
										<input class="form-control" type="text" name="Total" id="total" placeholder="Total number of books purchased" value="<?php echo $TotalToBeUpdated ?>" >
									</div><br>
									
									
									
									<input class="btn btn-success btn-block" type="submit" name="submit1" value="Edit Book Details">
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
			
			$Username=$_SESSION['username'];
			
			
			
	
			
			
				
				$query="update add_books set datetime='$DateTime',book_img='$Image',book_name='$Title',author='$Author',publication='$Publication',purchase_date='$PurchaseDate',price='$Price',quantity_bought='$TotalBought',librarian='$_SESSION[librarian]'where id='$SearchQueryParameter'";
				$Execute=mysqli_query($connection,$query);
				
				if($Execute){?>
				
					<script type="text/javascript">
					
					alert("edited");
					window.location="all_books.php";
			
					</script>
					
					
				<?php }
				
				
				else{ ?>
					<script type="text/javascript">
					alert("not edited");
					window.location="all_books.php";
			
					</script>
					
					
			<?php	}
				
				
				
			
			
		}?>
			
							
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


       <?php require_once "include/footer.php"?>