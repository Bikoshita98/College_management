<?php 

require_once "include/header.php";
require_once "include/db.php";


 ?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
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
                                <h2>Send Message to Students</h2>
							<div class="col-sm-6" style="margin-left:30%"> 
								<?php echo Message();?>		
								<?php echo SuccessMessage();?>
						
							</div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <form name="form1" action="send_notification.php" method="post" class="col-lg-6">
								<table class="table table-bordered">
								<tr>
								<td>
								<select class="form-control" name="dusername">
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
									<input type="text" class="form-control" name="title" placeholder="Enter Title">
									</td>
								
								</tr>
								
								<tr>
								
									<td>
									<label>Message	</label>
									<textarea class="form-control" name="msg">
									
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
							
							</form>
							<table class="table table-bordered">
							
							<tr>
								<th>	Sender	</th>
								<th>	Receiver	</th>
								<th>	Title	</th>
								<th>	Message	</th>
								<th>	Date & Time	</th>
								<th>	Status	</th>
							</tr>
							<?php 
							$Sender="";
							$Receiver="";
							$Title="";
							$Message="";
							$DateTime="";
							$Status="";
							$query=mysqli_query($connection,"select * from messages where susername='$_SESSION[librarian]' order by datetime desc");
							
							while($datarows=mysqli_fetch_array($query))
							{
								$Sender=$datarows['susername'];
								$Receiver=$datarows['dusername'];
								$Title=$datarows['title'];
								$Message=$datarows['msg'];
								$DateTime=$datarows['datetime'];
								$Status=$datarows['read1'];
							?>
							
							<tr>
								<td><?php echo $Sender; 	 ?>		</td>
								<td><?php	echo $Receiver;   ?>		</td>
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
			$res=mysqli_query($connection,"insert into messages values('','student','$_SESSION[librarian]','$_POST[dusername]','$_POST[title]','$_POST[msg]','$DateTime','no')");
		
				if($res)
				{ ?>
				<script type="text/javascript">
					alert("Message send successfully");
					window.location="send_notification.php";
																			
				</script>
				
				<?php
				
				}
				
				else
				
				{?>
				<script type="text/javascript">
					alert("Error");
					window.location="send_notification.php";
																			
				</script>
					
					
				<?php
				
				}
		}
		
		?>

       <?php require_once "include/footer.php";?>