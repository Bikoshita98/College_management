<?php require_once "include/faculty_header.php";
require_once "include/db.php";

 ?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>View Marks of Students</h3>
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
                                <h2>View Marks</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
							<form action="view_marks.php" method="post">
                                <select style="float:left; height:30px;"class="col-lg-3" name="course">
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
								<select style="height:30px;" class="col-lg-3" name="sem">
											
											<option>---Select Semester---</option>
											<option value="1st">1st	</option>
											<option value="2nd">2nd	</option>
											<option value="3rd">3rd</option>
											<option value="4th">4th	</option>
											<option value="5th">5th	</option>
											<option value="6th">6th	</option>
										
								</select>
								
								<select style="height:30px;" class="col-lg-3" name="subject">
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
								
								<select style="float:right; height:30px;" class="col-lg-3" name="exam">
											<option>---Select Exam---</option>
												
													
													<option value="1st term ">	1st Term	</option>
													<option value="2nd term ">	2nd Term	</option>
													<option value="Final term ">	Final	</option>
													
												
											
											
								</select>	
								<input type="Submit" value="Submit" name="submit"  class="btn btn-primary" style="float:right; margin-top:30px;">
							</form>	
							
							
							<?php
							
							if(isset($_POST['submit']))
							{
								$Course=mysqli_real_escape_string($connection,$_POST["course"]);
								$Sem=mysqli_real_escape_string($connection,$_POST["sem"]);
								$Subject=mysqli_real_escape_string($connection,$_POST["subject"]);
								$Exam=mysqli_real_escape_string($connection,$_POST["exam"]);?>
							<table class="table table-bordered">
								<th>	Sl No		</th>
								<th>	Name	</th>
								<th>	Roll no	</th>
								<th>	Course	</th>
								<th>	Sem</th>
								<th>	Subject</th>
								<th>	Exam</th>
								<th>	Marks</th>
								<th>	Added By</th>
							<?php	
								$query=mysqli_query($connection,"select * from marks where course='$Course' && sem='$Sem' && sub='$Subject' && exam='$Exam'");
								$SrNo=1;
								while($row=mysqli_fetch_array($query))
								{
								
							?>
							
							
							
							
								<tr>
											<td><?php echo $SrNo++; ?>		</td>
											<td><?php echo $row['stu_name']; ?>	
											<!--<input type="hidden" value="<?php echo $row["stu_name"];?>" name="stu_name">-->
											</td>
											<td><?php echo $row['roll_no']; ?>
											<!--<input type="hidden" value="<?php echo $row["roll_no"];?>" name="roll_no">-->
											</td>
											<td><?php echo $row['course']; ?>
											<!--<input type="hidden" value="<?php echo $row["course"];?>" name="course">-->
											</td>
											<td><?php echo $row['sem']; ?>	
											<!--<input type="hidden" value="<?php echo $row["sem"];?>" name="sem">-->
											</td>
											
											<td><?php echo $row['sub']; ?>	</td>
											<td><?php echo $row['exam']; ?>	</td>
											<td><?php echo $row['marks']; ?>	</td>
											
											<td><?php echo $row['sign']; ?>	</td>
											
											
											
											
											
											
								</tr>
							
							
							
							<?php
								}
							}
							
							?>
							</table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


       <?php require_once "include/footer.php"?>