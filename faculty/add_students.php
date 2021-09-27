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
                <div class="row" style="min-height:500px;>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add Students</h2>
								

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
							
								<form method="post" action="add_students.php">
								
										<div>
											<select style="float:left; height:30px;"class="col-lg-4" name="course" required>
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
											<select style="float:left; height:30px;"class="col-lg-4" name="subject">
											<option>---Select Subject---</option>
												<?php
												$res=mysqli_query($connection,"select * from faculty_profile where f_id='$ProfileName'");
												while($row=mysqli_fetch_array($res))
												{	?>
													
													<option value="<?php echo $row["sub1"]?>">	<?php  echo $row['sub1'];?>	</option>
													<option value="<?php echo $row["sub2"]?>">	<?php  echo $row['sub2'];?>	</option>
													<option value="<?php echo $row["sub3"]?>">	<?php  echo $row['sub3'];?>	</option>
													<option value="<?php echo $row["sub4"]?>">	<?php  echo $row['sub4'];?>	</option>
													<option value="<?php echo $row["sub5"]?>">	<?php  echo $row['sub5'];?>	</option>
													<option value="<?php echo $row["sub6"]?>">	<?php  echo $row['sub6'];?>	</option>
													<option value="<?php echo $row["sub7"]?>">	<?php  echo $row['sub7'];?>	</option>
												<?php }
												?>
											
											
											</select>
										
										</div>
										
										<div>
										<select style="float:right; height:30px;" class="col-lg-4" name="sem">
											
										<option>---Select Semester---</option>
										<option value="1st">1st	</option>
										<option value="2nd">2nd	</option>
										<option value="3rd">3rd</option>
										<option value="4th">4th	</option>
										<option value="5th">5th	</option>
										<option value="6th">6th	</option>
										
										</select><br><br><br><br>
										
										<input type="text" class="form-control" name="stu_name" placeholder="Student Name" required><br>
										<input type="text" class="form-control" name="rollno" placeholder="Student Roll No" required>
										</div>
										<input type="Submit" class="btn btn-primary" value="Add Student" name="submit1"  style="float:right; margin-top:30px;">
									<br>
								
								
									<?php 
									
									if(isset($_POST["submit1"]))
									{
											$Course=mysqli_real_escape_string($connection,$_POST['course']);
											$Subject=mysqli_real_escape_string($connection,$_POST['subject']);
											$Sem=mysqli_real_escape_string($connection,$_POST['sem']);
											$Name=mysqli_real_escape_string($connection,$_POST['stu_name']);
											$Roll_no=mysqli_real_escape_string($connection,$_POST['rollno']);	
											
										$query=mysqli_query($connection,"select * from stu_details where course='$Course' && subject='$Subject'&& sem='$Sem' && roll_no='$Roll_no'");
										if(mysqli_num_rows($query)>0)
										{
											?>
											<div class="alert alert-danger col-lg-6 col-lg-push-3">
											<strong style="...">Student already exists</strong> 
											</div>
											
										<?php }
										else{	
										
											
										
											
											$query_run=mysqli_query($connection,"insert into stu_details(course,subject,sem,stu_name,roll_no) values
											('$Course','$Subject','$Sem','$Name','$Roll_no')");
											
												if($query_run)
											{?>
											<div class="alert alert-success" style="width:50%;">Student Added Successfully	</div>	
												
											<?php
											
											}
										
											
										}
									}	
									?>
									
								</form>	
								
							</div>
										
								
									
									
							
                        </div>
						
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


       <?php require_once "include/footer.php";?>