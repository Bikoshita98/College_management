<?php require_once "include/faculty_header.php";
		require_once "include/db.php";
 ?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>View Attendance Records</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <form action="" method="post">
                                <select style="float:left; height:30px;"class="col-lg-4" name="date">
											<option>---Select date---</option>
												<?php
												$res=mysqli_query($connection,"select distinct date from attendance");
												while($row=mysqli_fetch_array($res))
												{	?>
													
													<option value="<?php echo $row['date']?>">	<?php  echo $row['date']?>	</option>
													
												<?php }
												?>
											
											
								</select>
								
								<select style="float:left; height:30px;"class="col-lg-4" name="subject">
											<option>---Select Subject---</option>
												<?php
												$res=mysqli_query($connection,"select * from faculty_profile where f_id='$ProfileName'");
												while($row=mysqli_fetch_array($res))
												{	?>
													
													<option value="<?php echo $row['sub1']?>">	<?php  echo $row['sub1']?>	</option>
													<option value="<?php echo $row['sub2']?>">	<?php  echo $row['sub2']?>	</option>
													<option value="<?php echo $row['sub3']?>">	<?php  echo $row['sub3']?>	</option>
													<option value="<?php echo $row['sub4']?>">	<?php  echo $row['sub4']?>	</option>
													<option value="<?php echo $row['sub5']?>">	<?php  echo $row['sub5']?>	</option>
													<option value="<?php echo $row['sub6']?>">	<?php  echo $row['sub6']?>	</option>
													<option value="<?php echo $row['sub7']?>">	<?php  echo $row['sub7']?>	</option>
												<?php }
												?>
											
											
								</select>
								<input type="Submit" value="View" name="submit1"  style="float:right; margin-top:30px;">
							
							
								<?php
								$Subject="";
								$Date="";
								if(isset($_POST['submit1']))
								
								
									
									{
										
										$Date=$_POST['date'];
								$Subject=$_POST["subject"];	
								?>
								<table class="table table-bordered" width="90%">
										<tr>
											<th>	Sl No		</th>
											<th>	Date		</th>
											<th>	Course	</th>
											
											<th>	Semester	</th>
											<th>	Subject	</th>
											<th>	Name	</th>
											<th>	Roll no	</th>
											<th>	Status	</th>
											
											
											
											
											
										</tr>
										<tr>
										<?php
										$res=mysqli_query($connection,"select * from attendance where subject='$Subject' && date='$Date'");
										$SrNo=1;
										
											while($row=mysqli_fetch_array($res))
										{?>
											<td>  <?php echo $SrNo++;?>	</td>
											
											<td>  <?php echo $row['date'];?>	</td>
											<td>  <?php echo $row['course'];?>
											
											</td>
											<td>  <?php echo $row['sem'];?>
											
											</td>
											
											<td>  <?php echo $row['subject'];?>
											
											</td>
											
											<td>  <?php echo $row['name'];?>
											
											</td>
											
											<td>  <?php echo $row['roll_no'];?>	
											
											</td>
											
											<td>	
											<?php echo $row['status'];?>	
											
											
											</td>
											
											
										</tr>
										<?php 
										
										}?>
								</table>	
									
								
								
								
								
								<?php } ?>
								
							</form>	
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


       <?php require_once "include/footer.php"?>