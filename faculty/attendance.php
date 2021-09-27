<?php require_once "include/faculty_header.php";
require_once "include/db.php"; 
	$flag=0;
	
	$Subject="";
	if(isset($_POST['submit2']))
	{
			$Subject=$_POST['subject'];
		
			foreach($_POST['attendance'] as $id=>$attendance)
			{
				
				$course=$_POST['course'][$id];
				$sem=$_POST['sem'][$id];
				//$subject=$_POST['subject'][$id];
				$stu_name=$_POST['stu_name'][$id];
				//$roll_no=$_POST['roll_no'][$id];
				$date=date("Y-m-d");
				
				$Execute=mysqli_query($connection,"insert into attendance(course,sem,name,status,date)
				values('$course','$sem','$stu_name','$attendance','$date')");
				if($Execute){
					$flag=1;
					
				}
			}
		$Execute2=mysqli_query($connection,"insert into attendance(subject) value='$Subject'");
			
	}
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
                                <h2>Plain Page</h2>
								<h3><div style="float:right">Date:<?php echo date("d-m-y")?>	</div>	</h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
							<?php if($flag) {	?>
							<div class="alert alert-success" style="width:50%;">Attendance recorded successfully	</div>
							<?php } ?>
							
							
							
							<form action="" method="post">
                                
								<div>
										<select style="float:left; height:30px;"class="col-lg-5" name="course">
											<option>---Select Course---</option>
												<?php
												$res=mysqli_query($connection,"select course_name from courses");
												while($row=mysqli_fetch_array($res))
												{	?>
													
													<option value="<?php echo $row["course_name"]?>">
													<?php  echo $row['course_name']?>
													</option>
												<?php }
												?>
										
										
										</select>
										
								</div>
								
								<div>
										<select style="float:right; height:30px;" class="col-lg-5" name="sem">
											
											<option>---Select Semester---</option>
											<option value="1st">1st	</option>
											<option value="2nd">2nd	</option>
											<option value="3rd">3rd</option>
											<option value="4th">4th	</option>
											<option value="5th">5th	</option>
											<option value="6th">6th	</option>
										
										</select><br>
										
								</div>
								<input type="Submit" value="View" name="submit1" class="btn btn-primary"  style="float:right; margin-top:30px;">
							
							
								<?php
								$Course="";
								$Sem="";
								if(isset($_POST['submit1']))
									$Course=$_POST['course'];
									$Sem=$_POST['sem'];	
								{
								?>
								<br>
								<table class="table table-bordered" width="90%">
										<tr>
											<th>	Sl No		</th>
											<th>	Course	</th>
											<th>	Semester	</th>
											
											<th>	Name		</th>
											
											<th>	Attendance	</th>
											<th>	Action	</th>
											
											
											
											
										</tr>
										<tr>
										<?php
										$res=mysqli_query($connection,"select * from admission where course='$Course' && sem='$Sem'");
										$SrNo=1;
										$Counter=0;
											while($row=mysqli_fetch_array($res))
										{?>
											<td>  <?php echo $SrNo++;?>	</td>
											
											<td>  <?php echo $row["course"];?>
											<input type="hidden" value="<?php echo $row["course"];?>" name="course[]">
											</td>
											<td>  <?php echo $row["sem"];?>
											<input type="hidden" value="<?php echo $row["sem"];?>" name="sem[]">
											</td>
											
											
											
											<td>  <?php echo $row["stu_name"];?>
											<input type="hidden" value="<?php echo $row["stu_name"];?>" name="stu_name[]">
											</td>
											
											
											
											<td>	
											
											<input type="radio" name="attendance[<?php echo $Counter;	?>]" value="Present">Present	
											<input type="radio" name="attendance[<?php echo $Counter;	?>]" value="Absent"> Absent
											
											</td>
											
											
										</tr>
										<?php 
										$Counter++;
										}?>
								</table>	
									
								<select style="float:left; height:30px;" class="col-lg-4" name="subject">
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
								
								<input type="Submit" value="Mark Attendance" name="submit2"  class="btn btn-success" style="float:right; margin-top:30px;">
								
								
								<?php
									
								} ?>
							</form>	
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


       <?php require_once "include/footer.php"?>