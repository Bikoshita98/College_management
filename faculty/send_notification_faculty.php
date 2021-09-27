<?php require_once "include/faculty_header.php";
require_once "include/db.php";
 ?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Send New Messages</h3>
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
                                <h2>Send Messages </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
							<form name="form1" action="send_notification_faculty.php" method="post" class="col-lg-7">
								<div>
									<br><h4><label>To Students	</label><h4>
									<table class="table table-bordered">
										<tr>
											<td>
											<select class="form-control" name="stu_username">
											<?php
											$res=mysqli_query($connection,"select * from registration where status='yes'");
											while($row=mysqli_fetch_array($res))
											{	?>
												<option value="<?php echo $row["username"]?>">
												<?php	echo $row["course"].' '.$row["sem"]. "(".$row["username"].")" ;?>
												</option>
											<?php }
											?>
											
											
											
											
											
											</select>
											
											</td>
											
											<tr>
												<td>
												<input type="text" class="form-control" name="title1" placeholder="Enter Title">
												</td>
											
											</tr>
											
											<tr>
											
												<td>
												<label>Message	</label>
												<textarea class="form-control" name="msg1">
												
												</textarea>
												</td>
											
											</tr>
											
											<tr>
												<td>
												<input type="submit" name="submit1" class="btn btn-primary" value="Send Message">
												</td>
											</tr>
										
									
										</tr>
									</table><br><br>
								</div>
								
								
								
								
							</form>
							
							<table class="table table-bordered">
							
								<tr>
									<th>	Sender	</th>
									<th>	Receiver	</th>
									<th>	Designation	</th>
									<th>	Title	</th>
									<th>	Message	</th>
									<th>	Date & Time	</th>
									<th>	Status	</th>
								</tr>
								<?php 
								$Sender="";
								$Receiver="";
								$Designation="";
								$Title="";
								$Message="";
								$DateTime="";
								$Status="";
								$query=mysqli_query($connection,"select * from messages where susername='$_SESSION[Username]' order by datetime desc");
								
								while($datarows=mysqli_fetch_array($query))
								{
									$Sender=$datarows['susername'];
									$Receiver=$datarows['dusername'];
									$Designation=$datarows['designation'];
									$Title=$datarows['title'];
									$Message=$datarows['msg'];
									$DateTime=$datarows['datetime'];
									$Status=$datarows['read1'];
									
								?>
								
								<tr>
									<td><?php echo $Sender; 	 ?>		</td>
									<td><?php	echo $Receiver;   ?>		</td>
									<td><?php	echo $Designation;   ?>		</td>
									<td><?php 	echo $Title; 	?>		</td>
									<td><?php	echo $Message;  ?>		</td>
									<td><?php	echo $DateTime;  ?>		</td>
									<td><?php	echo $Status;  ?>		</td>
								
								</tr>
								<?php  } ?>
							</table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
		
		<?php
		if(isset($_POST["submit1"]))
		{
			
			date_default_timezone_set("Asia/Kolkata");
			$CurrentTime=time();
			$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
			$DateTime;
			$query="INSERT INTO `messages`(`id`, `designation`, `susername`, `dusername`, `title`, `msg`, `datetime`, `read1`) 
			VALUES ('','student','$_SESSION[Username]','$_POST[stu_username]','$_POST[title1]','$_POST[msg1]','$DateTime','no')";
			$res=mysqli_query($connection,$query);
		
				if($res)
				{ ?>
				<script type="text/javascript">
					alert("Message send successfully to student");
					window.location="send_notification_faculty.php";
																			
				</script>
				
				<?php
				
				}
				
				else
				
				{?>
				<script type="text/javascript">
					alert("Error");
					window.location="send_notification_admin.php";
																			
				</script>
					
					
				<?php
				
				}
				
		}
		
		?>
		
		
				
		
		
		


       <?php require_once "include/footer.php"?>