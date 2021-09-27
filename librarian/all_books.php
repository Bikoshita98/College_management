
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

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Details of All Books</h2>	
									
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
								<!--<div class="input-group">
									<input type="text"  name="t1" class="form-control" placeholder="Search for..."><br><br>
									<input type="submit" name="submit1"  value="Search">
                    
								</div>-->
					
						
			
						
							
                                <div class="table-responsive">
									<table class="table table-striped table-hover">
										<tr>
											<th>Sl No	</th>
											<th>Date & Time	</th>
											<th>Book Image	</th>
											<th>Book Name	</th>
											<th>Author	</th>
											<th>Publication	</th>
											
											<th>Price	</th>
											<th>Purchase Date	</th>
											<th>Quantity Bought	</th>
											<th>Quantity Available	</th>
											<th>Librarian's Username	</th>
											<th>Action	</th>
											<th>Details	</th>
											
											
						
										</tr>
										
										<?php
										
										if(isset($_POST['submit1'])){
											$Search=$_POST["t1"];
											$ViewQuery="SELECT * FROM add_books WHERE book_name LIKE '%$Search%'";
											
											
											$Execute=mysqli_query($connection,$ViewQuery);
											$SrNo=0;
									
											while($Datarows=mysqli_fetch_array($Execute)){
												$Id=$Datarows["id"];
												$DateTime=$Datarows["datetime"];
												$Image=$Datarows["book_img"];
												$Title=$Datarows["book_name"];
												$Author=$Datarows["author"];
												$Publication=$Datarows["publication"];
												$Price=$Datarows["price"];
												$Date=$Datarows["purchase_date"];
												$TotalBought=$Datarows["quantity_bought"];
												$Available=$Datarows["quantity_available"];
												$Username=$Datarows["librarian"];
												$SrNo++; 
										
											?>
										
										<tr>
											
												<td>	<?php echo $SrNo; ?>	</td>
												<td>	<?php echo $DateTime; ?>	</td>
												<td><img src="Upload/<?php echo $Image; ?>" height="150px" width="150px";></td>
												<td>	<?php echo $Title; ?>	</td>
												<td>	<?php echo $Author; ?>	</td>
												<td>	<?php echo $Publication; ?>	</td>
												<td>	<?php echo $Price; ?>	</td>
												<td>	<?php echo $Date; ?>	</td>
												<td>	<?php echo $TotalBought; ?>	</td>
												<td>	<?php echo $Available; ?>	</td>
												<td>	<?php echo $Username; ?>	</td>
												
												<td>
													<a href="Edit_book_info.php?Edit=<?php echo $Id;  ?>">
													<span class="btn btn-warning">Edit</span> </a>  
								
								
													<a href="remove_book.php?Delete=<?php echo $Id;  ?>"><br><br>
													<span class="btn btn-danger">Remove</span> </a>  
													
												</td>
												
												<td>
												<a href="all_students_with_this_book">Students with this book	</a>
												</td>
												
												
										</tr>	
										<?php } 
										
										}
											
										
											
											else{
											$ViewQuery=("SELECT * FROM add_books order by id desc");
											$Execute=mysqli_query($connection,$ViewQuery);
											$SrNo=0;
									
										while($Datarows=mysqli_fetch_array($Execute)){
											$Id=$Datarows["id"];
											$DateTime=$Datarows["datetime"];
											$Image=$Datarows["book_img"];
											$Title=$Datarows["book_name"];
											$Author=$Datarows["author"];
											$Publication=$Datarows["publication"];
											$Price=$Datarows["price"];
											$Date=$Datarows["purchase_date"];
											$TotalBought=$Datarows["quantity_bought"];
											$Available=$Datarows["quantity_available"];
											$Username=$Datarows["librarian"];
											$SrNo++; 
										
										?>
										
										<tr>
											
												<td>	<?php echo $SrNo; ?>	</td>
												<td>	<?php echo $DateTime; ?>	</td>
												<td><img src="Upload/<?php echo $Image; ?>" width="100px" height="100px" ;></td>
												<td>	<?php echo $Title; ?>	</td>
												<td>	<?php echo $Author; ?>	</td>
												<td>	<?php echo $Publication; ?>	</td>
												<td>	<?php echo $Price; ?>	</td>
												<td>	<?php echo $Date; ?>	</td>
												<td>	<?php echo $TotalBought; ?>	</td>
												<td>	<?php echo $Available; ?>	</td>
												<td>	<?php echo $Username; ?>	</td>
												
												<td>
													<a href="Edit_book_info.php?Edit=<?php echo $Id;  ?>">
													<span class="btn btn-warning">Edit</span> </a>  
								
								
													<a href="remove_book.php?Delete=<?php echo $Id;  ?>"><br><br>
													<span class="btn btn-danger">Remove</span> </a>  
													
												</td>

												<td>
												<a href="all_students_with_this_book.php?book_name=<?php echo $Datarows["book_name"]; ?>">Students with this book	</a>
												</td>
												
												
										</tr>	
										<?php } ?>
										
										<?php } ?>
										
											
										
										
									</table>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


       <?php require_once "include/footer.php"?>