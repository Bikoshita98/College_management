
<?php require_once "include/header.php"; ?>
<?php require_once "include/db.php"; ?>


        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Issue Books</h3>
                    </div>

                    <!--<div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
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
                                <h2>Issue Books to Students</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="issue_books1.php" method="post">
								<table>
									<tr>
										<td>
										<select name="user" class="form-control">
											<?php
											$res=mysqli_query($connection,"select username from registration where status='yes'");
											while($row=mysqli_fetch_array($res))
											{
												?>
												
												<option value="<?php echo $row['username']?>">
												
												<?php echo $row['username'];?>
												</option>
											<?php }
											
											?>
										</select>
										</td>
										
										<td>
										&nbsp &nbsp <input type="submit" name="submit1" class="form-control btn btn-primary" style="margin-left:20px;" >
										</td>
									</tr>
								</table>
								
								
								<?php
								$Username='';
								$Name='';
							
								$sem='';
								$contact='';
								$email='';
								$Roll='';
								$Book='';
								$DateTime='';
								if(isset($_POST['submit1'])){
									
										
									$query=mysqli_query($connection,"select * from registration where username='$_POST[user]'");
									while($row=mysqli_fetch_array($query))
									{
										$Name=$row['name'];
										$Id=$row['username'];
										$sem=$row['sem'];
										$course=$row['course'];
										$contact=$row['contact'];
										$email=$row['email'];
										$Roll=$row['enrollment'];
										$_SESSION["username"]=$Username;
										
										date_default_timezone_set("Asia/Kolkata");
											$CurrentTime=time();
											$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
											$DateTime;
									}
									
								?>
								<table class="table table-bordered" width="30px">
									<th>
									<tr>
										<td>
										<label>Userame </label>
										
										<input type="text" name="username" class="form-control" value="<?php echo $Id ?>">
										</td>
									</tr>
									
									<tr>
										<td>
										<label>Name </label>
										<input type="text" name="name" class="form-control" value="<?php echo $Name;?>">
										</td>
									</tr>
									
									<tr>
										<td>
										<label>Course </label>
										<input type="text" name="sem" class="form-control"  value="<?php echo $course; ?>">
										</td>
									</tr>
									
									<tr>
										<td>
										<label>Semester </label>
										<input type="text" name="sem" class="form-control"  value="<?php echo $sem; ?>">
										</td>
									</tr>
									
									<tr>
										<td>
										<label>Contact </label>
										<input type="text" name="contact" class="form-control" value="<?php echo $contact ?>">
										</td>
									</tr>
									
									<tr>
										<td>
										<label>Email </label>
										<input type="text" name="email" class="form-control" value="<?php echo $email ?>">
										</td>
									</tr>
									
									<tr>
										<td>
										<label>Roll No </label>
										<input type="text" name="roll" class="form-control"  value="<?php echo $Roll ?>">
										</td>
									</tr>
									<tr>
										<td>
										<label>Book Name	</label>
											<select name="bookname" class="form-control selectpicker">
														
														<?php
														
														$Query="SELECT book_name FROM add_books";
														$Execute=mysqli_query($connection,$Query);
														while($Datarows=mysqli_fetch_array($Execute)){
														$Book=$Datarows['book_name'];
														echo "<option>";	
														echo "$Book";
														echo "</option>";												
														
														}
														
														
														?><br>
														
											</select>
										</td>		
									</tr>		
									
									
									<!--<tr>
										<td>
										<label>Issue Date </label>
										<input  name="date" class="form-control" value="<?php echo $DateTime ?>">
										</td>
									</tr>-->
									
									<tr>
										<td>
											<input type="submit" name="submit2" class="form-control btn btn-primary" value="Issue Books ">
										</td>	
									<tr>
								</table>
								
								
								
								<?php } ?>
								</form>
								
								<?php  
								$Id='';
								if(isset($_POST['submit2']))
								{	date_default_timezone_set("Asia/Kolkata");
											$CurrentTime=time();
											$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
											$DateTime;
											
									$qty=0;
									$res=mysqli_query($connection,"select * from add_books where book_name='$_POST[bookname]'");
									while($row=mysqli_fetch_array($res))
									{
										$qty=$row["quantity_available"];
									}
									
									if($qty==0)
									{?>
										<div class="alert alert-danger col-lg-6 col-lg-push-3">
										<strong style="...">This book is not available	</strong>
										</div>
									<?php }
									
									
									else{
										
										
									
									
									
										$query2="INSERT INTO issue_books(id,username,name,sem,contact,email,roll,book_name,date,return_date)
										VALUES('','$_POST[username]','$_POST[name]','$_POST[sem]','$_POST[contact]',
										'$_POST[email]','$_POST[roll]','$_POST[bookname]','$DateTime','')";
										
										$Execute=mysqli_query($connection,$query2);
										$res=mysqli_query($connection,"update add_books set quantity_available=quantity_available-1 where book_name='$_POST[bookname]'");
										
										
										if($query2)
										{?>
											<script type="text/javascript">
						
										alert("Book Issued Successfully");
										window.location="issue_books1.php";
								
										</script>
										<?php
										
										}
										else
										
										{?>
											<script type="text/javascript">
						
										alert("Error");
										window.location="issue_books1.php";
								
										</script>
										<?php
										
										}
									}			
									
								}
								?>
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


       <?php require_once "include/footer.php"?>