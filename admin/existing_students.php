<?php require_once "include/admin_header.php";
		require_once "include/db.php";
 ?>

        <!-- page content area main -->
        <div class="right_col" role="main" style="width:120%">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Existing Students</h3>
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
                <div class="row" style="min-height:500px; width:100%">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>View Existing Students</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
							
								<form method="post" action="">
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
										<input type="Submit" value="Submit" name="submit1"  style="float:right; margin-top:30px;">
								</form>	<br>
								
								
									<?php 
									
									if(isset($_POST["submit1"]))
									{
										$Course=$_POST['course'];
										$Sem=$_POST['sem'];
									?>
									<table class="table table-bordered" width="90%">
												
										<tr>
											<th>	Sl No		</th>
											<th>	Name		</th>
											<th>	Course		</th>
											<th>	Semester		</th>
											<th>	Roll No		</th>
											
											<th>	Father's Name		</th>
											<!--<th>	Mother's Name	</th>-->
											<th>	Add		</th>
											<th>	DOB		</th>
											<th>	Gender		</th>
											<th>	Cont	</th>
											<th>	Email		</th>
											<!--<th>	10th %	</th>
											<th>	School		</th>
											<th>	12th %	</th>
											<th>	College		</th>
											<th>	10th Board		</th>
											<th>	12th Board		</th>-->
											<th>	Qualifying Exam	</th>
											<th>	Percentage</th>
											<th>	Img		</th>
											
											<th>	Date of Admission		</th>
											<th>	DateTime	</th>
											<th>	Action			</th>
											
										</tr>
										<tr>
										<?php
										$res=mysqli_query($connection,"select * from admission where course='$Course' && sem='$Sem'");
										$SrNo=1;$Id="";
										
											while($row=mysqli_fetch_array($res))
										{		$Id=$row["id"];?>
											
											<td>  <?php echo $SrNo++;?>	</td>
											<td style="color:red; ">  <?php echo $row["stu_name"];?>	</td>
											<td>  <?php echo $row["course"];?>	</td>
											<td>  <?php echo $row["sem"];?>	</td>
											<td>  <?php echo $row["roll_no"];?>	</td>
											<td>  <?php echo $row["f_name"];?>	</td>
											<!--<td>  <?php echo $row["m_name"];?>	</td>-->
											<td>  <?php echo $row["address"];?>	</td>
											<td>  <?php echo $row["dob"];?>	</td>
											<td>  <?php echo $row["gender"];?>	</td>
											<td>  <?php echo $row["contact"];?>	</td>
											<td>  <?php echo $row["email"];?>	</td>
											<!--<td>  <?php echo $row["10_percent"];?>	</td>
											<td>  <?php echo $row["school"];?>	</td>
											<td>  <?php echo $row["12_percent"];?>	</td>
											<td>  <?php echo $row["college"];?>	</td>
											<td>  <?php echo $row["10_board"];?>	</td>
											<td>  <?php echo $row["12_board"];?>	</td>-->
											<td>  <?php echo $row["exam"];?>	</td>
											<td>  <?php echo $row["percent"];?>	</td>
											<td><img src="upload/<?php echo $row["image"];?>" width="130px" height="130px"> 	</td>
											
											<td>  <?php echo $row["doa"];?>	</td>
											<td>  <?php echo $row["datetime"];?>	</td>
											
											
											<td>  	<a href="Edit_students.php?Edit=<?php echo $Id;  ?>">
													<span class="btn btn-warning">Edit</span> </a>  <br>
												
												<a href="Delete_existing_students.php?Delete=<?php echo $Id;  ?>">
													<span class="btn btn-danger">Delete</span> </a> <br> 
													
													<a href="promote.php?Promote=<?php echo $Id;  ?>&se=<?php echo $Sem;  ?>">
													<span class="btn btn-primary">Promote</span> </a>
											</td>
											
										
											
										</tr>
										
										
										<?php }?>
									</table>	
									<?php 
									}
									?>	
							</div>
										
								
									
									
							
                        </div>
						
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


       <?php require_once "include/footer.php";?>