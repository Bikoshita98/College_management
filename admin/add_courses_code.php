<?php
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
													<div class="alert alert-danger col-lg-6 col-lg-push-3">
													<strong style="...">Course already exists</strong> 
													</div>
													
													<?php }
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