<?php include "include/admin_header.php";
include "include/db.php";

?>


        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Appoint New Faculty</h3>
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
                                <h2>Appoint New Faculty ( both new as well as for maintaining existing records )</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                               <form name="form1" action="" type="enctype/form-data" method="post">
								<table class="table table-bordered">
								<tr>
								<!--<td>
								<label>Appoint to course:</label>
								<select class="form-control" name="course">
								<?php
								$res=mysqli_query($connection,"select course_name from courses");
								while($row=mysqli_fetch_array($res))
								{	?>
									<option value="<?php echo $row["course_name"]?>">
									<?php	echo $row["course_name"] ;?>
									</option>
								<?php }
								?>
								
								
								
								
								
								</select>
								
								</td>-->
								
								
								
								<tr>
									<td>
									<label>Type of Appointment</label>
									<select name="type" class="form-control">
									<option>Permanent	</option>
									<option>Contactual</option>
									</select>
									</td>
								</tr>
								
								<tr>
									<td>
									<label>Date Of Appoinment	</label>
									<input type="date" class="form-control" name="doa">
									</td>
								
								</tr>
								
								<tr>
								<td><h2>Personal Details</h2>	</td>
								</tr>
								<tr>
									<td>
									<input type="text" class="form-control" name="fal_name" placeholder="Faculty's Name">
									</td>
								
								</tr>
								
								<tr>
									<td>
									<input type="text" class="form-control" name="c/o" placeholder="C/O">
									</td>
								
								</tr>
								
								
								
								<tr>
									<td>
									<input type="text" class="form-control" name="add" placeholder="Address">
									</td>
								
								</tr>
								
								<tr>
									<td>
									<label>Date Of Birth	</label>
									<input type="date" class="form-control" name="dob" placeholder="Date of Birth" placeholder="dob">
									</td>
								
								</tr>
								
								<tr>
									<td>
									<label>Gender	</label><br>
									Male:&nbsp&nbsp<input type="radio" name="gender" value="male" > &nbsp&nbsp Female:&nbsp&nbsp <input type="radio" name="gender" value="female" >	
									</td>
								
								</tr>
								
								
								
								<tr>
									<td>
									<input type="text" class="form-control" name="ph_no" placeholder="Contact Number">
									</td>
								
								</tr>
								
								<tr>
									<td>
									<input type="text" class="form-control" name="email" placeholder="Email Address">
									</td>
								
								</tr>
								
								<tr>
								<td><h2>Qualification</h2>	</td>
								</tr>
								
								
								
								<tr>
								<td>
									<input type="text" class="form-control" name="grad" placeholder="Graduation Percentage">
									</td>
								</tr>
								
								<tr>
								<td>
									<input type="text" class="form-control" name="gradclg" placeholder="Graduated From( College/University )">
									</td>
								</tr>
								
								<tr>
								<td>
									<input type="text" class="form-control" name="exam" placeholder="Last Competitive Examination Passed(if any)">
									</td>
								</tr>
								
								<tr>
								<td>
									<input type="text" class="form-control" name="degree" placeholder="Degrees Achieved">
									</td>
								</tr>
								
								<tr>
										<td>
										<label for="appimg">Image of the Faculty (Passport size) </label>
										<input class="form-control" type="file" name="fal_pic" id="falimg">
										</td>
								</tr>		
								
								<tr>
								
									<td>
									<label>Note	</label>
									<textarea class="form-control" name="note">
									
									</textarea>
									</td>
								
								</tr>
								
								<tr>
									<td>
									<input type="submit" name="submit1" class="btn btn-primary" value="Submit">
									</td>
								</tr>
							
							</tr>
							</table>
							
							   
							   </form>
							   
							   <?php
							   if(isset($_POST["submit1"]))
							   {
								   $Course=mysqli_real_escape_string($connection,$_POST["course"]);
								  
								   $Type=mysqli_real_escape_string($connection,$_POST["type"]);
								   $DOA=mysqli_real_escape_string($connection,$_POST["doa"]);
								   $Name=mysqli_real_escape_string($connection,$_POST["fal_name"]);
								   $C_O=mysqli_real_escape_string($connection,$_POST["c/o"]);
								  
								   $Add=mysqli_real_escape_string($connection,$_POST["add"]);
								   $DOB=mysqli_real_escape_string($connection,$_POST["dob"]);
								   $Gender=mysqli_real_escape_string($connection,$_POST["gender"]);
								   $Contact=mysqli_real_escape_string($connection,$_POST["ph_no"]);
								   $Email=mysqli_real_escape_string($connection,$_POST["email"]);
								   
								   $Grad_Per=mysqli_real_escape_string($connection,$_POST["grad"]);
								   $Grad_clg=mysqli_real_escape_string($connection,$_POST["gradclg"]);
								   $Exam=mysqli_real_escape_string($connection,$_POST["exam"]);
								   $Degree=mysqli_real_escape_string($connection,$_POST["degree"]);
								   $Image=mysqli_real_escape_string($connection,$_POST["fal_pic"]);
								   $Note=mysqli_real_escape_string($connection,$_POST["note"]);
								   
								   $res=mysqli_query($connection,"insert into faculty values('','$Course','$Type','$DOA','$Name','$C_O','$Add','$DOB','$Gender','$Contact','$Email','$Grad_Per','$Grad_clg','$Exam','$Degree','$Image','$Note')");
							   
							   
							   if($res){?>
															
															
															<script type="text/javascript">
																alert("Faculty added successfully");
																window.location="new_faculty.php";
																
															</script>
														<?php }
														else{
															?>
																	<script type="text/javascript">
																		alert("Error");
																		window.location="new_faculty.php";
																		
																	</script>
															
														<?php }
														
													
													
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