<?php require_once "include/admin_header.php";

require_once "include/db.php";

			$Course_Error="";
			$Id_Error="";
			$HOD_Error="";
			
	if(isset($_POST["Submit"]))
												{
													$Course=mysqli_real_escape_string($connection,$_POST["Course"]);
													$Course_id=mysqli_real_escape_string($connection,$_POST["course_number"]);
													$HOD=mysqli_real_escape_string($connection,$_POST["HOD"]);
													
													date_default_timezone_set("Asia/Kolkata");
													$CurrentTime=time();
													$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
													
													$Image=$_FILES["hod_pic"]["name"];
													$Target="upload/".basename($_FILES["hod_pic"]["name"]);
													move_uploaded_file($_FILES["hod_pic"]["tmp_name"],$Target);
													
													
													
													$query=mysqli_query($connection,"select * from courses where course_id='$Course_id'");
													if(mysqli_num_rows($query)>0)
													{
														?>
													<script type="text/javascript">
																			alert("Course already exists");
																			window.location="add_courses.php";
																			
													</script>
													
													<?php }
													
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
															$Query="INSERT INTO courses(datetime,course_name,hod,hod_img,course_id)
															VALUES('$DateTime','$Course','$HOD','$Image','$Course_id')";
															$Execute=mysqli_query($connection,$Query);
															if($Execute){?>
																
																
																<script type="text/javascript">
																	alert("Course added successfully");
																	window.location="add_courses.php";
																	
																</script>
															<?php }
															else{
																?>
																		<script type="text/javascript">
																			alert("Error");
																			window.location="add_courses.php";
																			
																		</script>
																
															<?php }
															
														
														}
														
													
													
												}					
			

 ?>
<!DOCTYPE html>

<head>
<title> Add Courses	</title>
</head>

<body>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Add New Courses</h3>
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
                                <h2> Add Courses</h2>
								

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                             
								<form action="add_courses.php" method="post" enctype="multipart/form-data">
									<fieldset>
										<div class="form-group">
										<label for="coursename">Course Name </label>
										<input class="form-control" type="text" name="Course" id="coursename" placeholder="Name of the course(in capital letters)" required>
										</div>
											<div style="color:red">
												<?php echo $Course_Error; ?>
											</div><br>
										<div class="form-group">
										<label for="course_no">Course Id </label>
										<input class="form-control" type="text" name="course_number" id="course_no" placeholder="Course Id" required>
										</div>
											<div style="color:red">
												<?php echo $Id_Error; ?>
											</div><br>	
										<div class="form-group">
										<label for="hodname">Head of the Department </label>
										<input class="form-control" type="text" name="HOD" id="hodname" placeholder="Name of the HOD" required>
										
										</div>
											<div style="color:red">
												<?php echo $HOD_Error; ?>
											</div><br>	
										<div class="form-group">
										<label for="hodimg">Image of HOD </label>
										<input class="form-control" type="file" name="hod_pic" id="hodimg" required>
									
										</div><br>
										
										<!--<div class="form-group">
										<label for="sem">Semesters </label>
										<input class="form-control" type="text" name="sem1" id="sem" placeholder="1st" required>
										<input class="form-control" type="text" name="sem2" id="sem" placeholder="2nd" required>
										<input class="form-control" type="text" name="sem3" id="sem" placeholder="3rd" >
										<input class="form-control" type="text" name="sem4" id="sem" placeholder="4th" >
										<input class="form-control" type="text" name="sem5" id="sem" placeholder="5th" >
										<input class="form-control" type="text" name="sem6" id="sem" placeholder="6th" >
										
										</div>-->
										
										
										
										
										<input class="btn btn-success btn-block" type="Submit" name="Submit" value="Add New Course">
									</fieldset>
									<br>
								</form>
								
								<?php
												
								?>
								
								
								
							
							
							<?php
							   $res=mysqli_query($connection,"select * from courses");
							   echo "<table class='table table-bordered'>";
							   echo "<tr>";
							   echo "<th>";  echo "Sl No"; echo "</th>";
							   echo "<th>";  echo "Course Id"; echo "</th>";
							   echo "<th>"; echo "Course Name"; echo "</th>";
							   echo "<th>"; echo "HOD"; echo "</th>";
							    echo "<th>"; echo "HOD Image"; echo "</th>";
								//echo "<th>"; echo "No of Semesters"; echo "</th>";
								echo "<th>"; echo "Added on"; echo "</th>";
								echo "<th>"; echo "Action"; echo "</th>";
								
							  
							   echo "</tr>";
							   
							   $SrNo=0;
							   while($row=mysqli_fetch_array($res))
							   {
								   $Id=$row["id"]; 
								   $SrNo=$SrNo+1;
								 echo "<tr>";
									echo "<td>";	echo $SrNo ;	echo "</td>";
									echo "<td>";	echo $row["course_id"];	echo "</td>";
									echo "<td>";	echo $row["course_name"];	echo "</td>";
									echo "<td>";	echo $row["hod"];	echo "</td>";
									echo "<td>";?> <img src="Upload/<?php echo $row["hod_img"]; ?>"  width="110px" ;>		<?php echo "</td>";
									
									
									echo "<td>";	echo $row["datetime"];	echo "</td>";
									echo "<td>";?> 	<a href="Edit_courses.php?Edit=<?php echo $Id;  ?>">
													<span class="btn btn-warning">Edit</span> </a>  <br>	
													
										<a href="Delete_course.php?Delete=<?php echo $Id;  ?>">
													<span class="btn btn-danger">Delete</span> </a>  <?php	echo "</td>";						
															
															
									
								  echo "</tr>";  
							   }
							   
							   echo "</table>";
							   ?>
							</div>
								
									
								
								
								
						
						
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

</body>
       <?php require_once "include/footer.php"?>