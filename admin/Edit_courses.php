<?php include "include/admin_header.php";
include "include/db.php";

$Course_Error="";
			$Id_Error="";
			$HOD_Error="";

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
                                <h2>Update Courses</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
							
							<?php
							$SearchQueryParameter=$_GET['Edit'];
							$Query="SELECT * FROM courses WHERE id='$SearchQueryParameter'";
							$Execute=mysqli_query($connection,$Query);
							while($Datarows=mysqli_fetch_array($Execute)){
								$IdToBeUpdated=$Datarows['course_id'];
								$CourseToBeUpdated=$Datarows['course_name'];
								$HODToBeUpdated=$Datarows['hod'];
								$ImageToBeUpdated=$Datarows['hod_img'];
								
								
							}
								
								
								
								
							?>
							
							
                               <form action="Edit_courses.php?Edit=<?php echo $SearchQueryParameter; ?>" method="post" enctype="multipart/form-data">
									<fieldset>
										<div class="form-group">
										<label for="coursename">Course Name </label>
										<input class="form-control" value="<?php echo $CourseToBeUpdated; ?>"  type="text" name="Course" id="coursename" placeholder="Name of the course(in capital letters)" required>
									
										</div><br>
										<div style="color:red">
												<?php echo $Course_Error; ?>
										</div><br>
										
										<div class="form-group">
										<label for="course_no">Course Id </label>
										<input class="form-control" value="<?php echo $IdToBeUpdated; ?>" type="text" name="course_number" id="course_no" placeholder="Course Id" required>
									
										</div><br>
										
										<div style="color:red">
												<?php echo $Id_Error; ?>
											</div><br>	
										
										<div class="form-group">
										<label for="hodname">Head of the Department </label>
										<input class="form-control"  value="<?php echo $HODToBeUpdated;?>" type="text" name="HOD" id="hodname" placeholder="Name of the HOD" required>
									
										</div><br>
										<div style="color:red">
												<?php echo $HOD_Error; ?>
											</div><br>	
										
										
										
									<div class="form-group">
										<span class="field-info"> Existing Image <span>
										<img src="Upload/<?php echo $ImageToBeUpdated; ?>" width=100px><br><br>
										
										<label for="hodimg"> Select Image:</label>
										<input type="File" class="form-control" name="hod_pic" id="hodimg">
									</div>
										
										<input class="btn btn-success btn-block" type="Submit" name="Submit" value="Update Details">
									</fieldset>
									<br>
								</form>
								
				<?php
	
							if(isset($_POST["Submit"]))
							{
								$Course_name=mysqli_real_escape_string($connection,$_POST["Course"]);
								$Course_Id=mysqli_real_escape_string($connection,$_POST["course_number"]);
								$HOD=mysqli_real_escape_string($connection,$_POST["HOD"]);
								
								$Image=$_FILES["hod_pic"]["name"];
								$Target="Upload/".basename($_FILES["hod_pic"]["name"]);
								move_uploaded_file($_FILES["hod_pic"]["tmp_name"],$Target);
								
								date_default_timezone_set("Asia/Kolkata");
								$CurrentTime=time();
								$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
								$DateTime;
								
								$query=mysqli_query($connection,"select * from courses where course_id='$Course_id'");
													if(mysqli_num_rows($query)>0)
													{?>
												
												<script type="text/javascript">
																			alert("Course already exists");
																			window.location="Edit_courses.php";
																			
													</script>
													
												<?php	}
												else if(!preg_match("/^[A-Za-z .-]*$/",$Course))
													{
														 $Course_Error="Only letters and white spaces are allowed";
													}
													
												/*else if(!preg_match("/^[A-Za-z0-9._-&]*$/",$Course_id))
												{
													$Id_Error="Invalid course id format";
												}*/
												
												else if(!preg_match("/^[A-Za-z .]*$/",$HOD))
												{
													$HOD_Error="Invalid name format";
												}
												
									else{			
								
									$EditFromURL=$_GET['Edit'];
									$query="UPDATE courses SET datetime='$DateTime',course_name='$Course_name',course_id='$Course_Id',hod='$HOD',hod_img='$Image'
									 WHERE id='$EditFromURL'";
									
									$Execute=mysqli_query($connection,$query);
									
									
									if($Execute){?>
									<script type="text/javascript">
											alert("Details Updated successfully");
											window.location="add_courses.php";
																
									</script>	
										
									
									<?php }
									else{
										?>
										<script>
										alert("Error");
											window.location="add_courses.php";
										
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