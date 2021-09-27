<?php require_once "include/faculty_header.php";
		require_once "include/db.php";
 ?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Maintain Marks Record</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <!--<div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>-->
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add Marks</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
							<form action="add_marks.php" method="post">
							
							
							
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
								
								<select style="float:right; height:30px;" class="col-lg-5" name="sem">
											
											<option>---Select Semester---</option>
											<option value="1st">1st	</option>
											<option value="2nd">2nd	</option>
											<option value="3rd">3rd</option>
											<option value="4th">4th	</option>
											<option value="5th">5th	</option>
											<option value="6th">6th	</option>
										
								</select>
								
                                
								<input type="Submit" value="View" name="submit1"  style="float:right; margin-top:30px;">
								
								<?php 
								$Course="";
								$Sem="";
								if(isset($_POST['submit1']))
								{
								$Course=$_POST['course'];
									$Sem=$_POST['sem'];
								
								
								?>
								<table class="table table-bordered" width="90%">
								<th>	Sl No		</th>
								<th>	Name	</th>
								<th>	Roll no	</th>
								<th>	Course	</th>
								<th>	Sem</th>
								
								<th>	Marks</th>
								
								
								<?php 
								
								$query=mysqli_query($connection,"select * from admission where course='$Course' && sem='$Sem'");
								$SrNo=1;
								while($row=mysqli_fetch_array($query))
								{
									?>
										<tr>
											<td><?php echo $SrNo++; ?>		</td>
											<td><?php echo $row['stu_name']; ?>	
											<input type="hidden" value="<?php echo $row["stu_name"];?>" name="stu_name[]">
											</td>
											<td><?php echo $row['roll_no']; ?>
											<input type="hidden" value="<?php echo $row["roll_no"];?>" name="roll_no[]">
											</td>
											<td><?php echo $row['course']; ?>
											<input type="hidden" value="<?php echo $row["course"];?>" name="course[]">
											</td>
											<td><?php echo $row['sem']; ?>	
											<input type="hidden" value="<?php echo $row["sem"];?>" name="sem[]">
											</td>
											
											
											
											<td><input type="text" name="marks[]"  style="width:50px"></td>
											
										</tr>
								
								
								<?php }
								
								} ?>
								
								
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

										<select style="float:left; height:30px;" class="col-lg-4" name="exam">
											<option>---Select Exam---</option>
												
													
													<option value="1st term ">	1st Term	</option>
													<option value="2nd term ">	2nd Term	</option>
													<option value="Final term ">	Final	</option>
													
												
											
											
										</select>								
								<input type="Submit" value="Submit" name="submit2"  style="float:right; margin-top:30px;">
							</form>	
							<?php 
							if(isset($_POST['submit2']))
								{	
							
										$Name=$_POST['stu_name'];
										$Roll=$_POST['roll_no'];
										$Course=$_POST['course'];
										$Sem=$_POST['sem'];
										$Subject=$_POST['subject'];
										
										$Marks = $_POST['marks'];
										
										$Exam=mysqli_real_escape_string($connection,$_POST['exam']);
										
										/*
										echo "<prev>";
										print_r($_POST);
										echo "</prev>";
										
									*/
										
										
										//echo '<br>aaaa : '.$_POST['marks'].'<br>';
										
										$num= count ($_POST['stu_name']);
										
										
										
										
									
									foreach($_POST['stu_name'] as $id=>$num)
									{
										$course=$_POST['course'][$id];
										$sem=$_POST['sem'][$id];
										
										$stu_name=$_POST['stu_name'][$id];
										$roll_no=$_POST['roll_no'][$id];
										
										$Marks = $_POST['marks'][$id];
										
										//$date=date("Y-m-d");										
										
									//$query=mysqli_query($connection,"insert into attendance(course,sem,name,roll_no,status,date) values('$course','$sem','$stu_name','$roll_no','$attendance','$date')");
									
									$sql="INSERT INTO `marks`(`stu_name`, `roll_no`, `course`, `sem`, `sub`, `marks`, `exam`, `sign`) 
										VALUES('$stu_name','$roll_no','$course','$sem','$Subject','$Marks','$Exam','$ProfileName')";
									$query=mysqli_query($connection, $sql);
									
									//echo "<br>Subjece : ".$sub;
									//echo "<br>".$sql;
									
									}
											
											if($query){
												echo "success";
												
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