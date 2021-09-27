<?php include "include/admin_header.php";
include "include/db.php";

$Rollno_Error="";	$Name_Error="";	$Fname_Error="";	$Add_Error="";	$Contact_Error="";
$Email_Error="";	$Exam_Error=""; $Percent_Error="";

if(isset($_POST["submit1"]))
							   {	
									
									$SrNo=1;
								   $Course=mysqli_real_escape_string($connection,$_POST["course"]);
								   $Sem=mysqli_real_escape_string($connection,$_POST["sem"]);
								   $DOA=mysqli_real_escape_string($connection,$_POST["doa"]);
								   $Name=mysqli_real_escape_string($connection,$_POST["stu_name"]);
								   $Fname=mysqli_real_escape_string($connection,$_POST["fname"]);
								  
								   $Add=mysqli_real_escape_string($connection,$_POST["add"]);
								   $DOB=mysqli_real_escape_string($connection,$_POST["dob"]);
								   $Gender=mysqli_real_escape_string($connection,$_POST["gender"]);
								   $Contact=mysqli_real_escape_string($connection,$_POST["ph_no"]);
								   $Email=mysqli_real_escape_string($connection,$_POST["email"]);
								   
								  $Exam=mysqli_real_escape_string($connection,$_POST["exam"]);
								   $Percent=mysqli_real_escape_string($connection,$_POST["percent"]);
								   $Image=mysqli_real_escape_string($connection,$_POST["app_pic"]);
								  
								   $Rollno=mysqli_real_escape_string($connection,$_POST["rollno"]);
								   date_default_timezone_set("Asia/Kolkata");
													$CurrentTime=time();
													$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
													
													/*$Image=$_FILES["app_pic"]["name"];
													$Target="upload/".basename($_FILES["app_pic"]["name"]);
													move_uploaded_file($_FILES["app_pic"]["tmp_name"],$Target);*/
								   
								   if(!preg_match("/^[0-9]*$/",$Rollno))
										{
											$Rollno_Error="Only numbers are allowed";
										}
								   
									elseif(!preg_match("/^[A-Za-z .]*$/",$Name))
										{
											$Name_Error="Only letters and white spaces are allowed";
										}
										
									elseif(!preg_match("/^[A-Za-z .]*$/",$Fname))
										{
											$Fname_Error="Only letters and white spaces are allowed";
										}
									
									
									
									elseif(!preg_match("/^[a-zA-Z0-9'\s\.\-\,]+$/",$Add))
										{
											$Add_Error="Only letters,numbers and white spaces are allowed for address";
										}
										
									elseif(!preg_match("/^((\+){1}91){1}[1-9]{1}[0-9]{9}$/",$Contact))	
										{
											$Contact_Error="Contact number to be preceeded by +91";
										}
									elseif(!preg_match("/[A-Za-z0-9._-]{3,}@[A-Za-z0-9._-]{3,}[.]{1}[A-Za-z0-9._-]{2,}/",$Email))
										{
											$Email_Error="Incorrect format for Email";
										}

									
									
									elseif(!preg_match("/^[a-zA-Z0-9'\s\.\-\,]+$/",$Exam))
										{
											$Exam_Error="Only letters,numbers and white spaces are allowed for exam";
										}
									elseif(!preg_match("/^(0*100{1,1}\.?((?<=\.)0*)?%?$)|(^0*\d{0,2}\.?((?<==\.)\d*)?%?)$/",$Percent))	
										{
											$Percent_Error="Invalid percentage format";
										}
								   else{
									$EditFromURL=$_GET['Edit'];
									
								   $query="UPDATE admission SET datetime='$DateTime',course='$Course',sem='$Sem',doa='$DOA',stu_name='$Name',
								   f_name='$Fname',address='$Add',dob='$DOB',gender='$Gender',contact='$Contact',email='$Email',exam='$Exam',
								   percent='$Percent',image='$Image',roll_no='$Rollno' WHERE id='$EditFromURL'";
								   
								   $Execute=mysqli_query($connection,$query);
								   
								   
							   
							   if($Execute){?>
															
															
															<script type="text/javascript">
																alert("Details updated successfully");
																window.location="existing_students.php";
																
															</script>
														<?php }
														else{
															?>
																	<script type="text/javascript">
																		alert("Error");
																		window.location="existing_students.php";
																		
																	</script>
															
														<?php }
														
													
								   }					
								}			

?>


        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Edit Student's Info </h3>
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
                                <h2>Edit Student's Info</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
							
							<?php
							$SearchQueryParameter=$_GET['Edit'];
							$Query="SELECT * FROM admission WHERE id='$SearchQueryParameter'";
							$Execute=mysqli_query($connection,$Query);
							while($Datarows=mysqli_fetch_array($Execute)){
								$CourseToBeUpdated=$Datarows['course'];
								$SemToBeUpdated=$Datarows['sem'];
								$RollnoToBeUpdated=$Datarows['roll_no'];
								$DOAToBeUpdated=$Datarows['doa'];
								$NameToBeUpdated=$Datarows['stu_name'];
								$FnameToBeUpdated=$Datarows['f_name'];
								
								$AddressToBeUpdated=$Datarows['address'];
								$DOBToBeUpdated=$Datarows['dob'];
								$GenderToBeUpdated=$Datarows['gender'];
								$ContactToBeUpdated=$Datarows['contact'];
								$EmailToBeUpdated=$Datarows['email'];
								
								$ExamToBeUpdated=$Datarows['exam'];
								$PercentToBeUpdated=$Datarows['percent'];
								$ImageToBeUpdated=$Datarows['image'];
							}
								
								
								
								
							?>
                               <form name="form1" action="Edit_students.php?Edit=<?php echo $SearchQueryParameter; ?>" type="enctype/form-data" method="post">
						<table class="table table-bordered">
							<tr>
								<td>
								<label>Admission to course:</label>
								<select class="form-control" name="course">
								<?php
								$res=mysqli_query($connection,"select course_name from courses");
								while($row=mysqli_fetch_array($res))
								{	?>
									<option value="<?php echo $CourseToBeUpdated; ?>">
									<?php	echo $CourseToBeUpdated; ;?>
									</option>
								<?php }
								?>
								
								</td>
								
								
								
								</select>
								
								
								
								
							
								
									<tr>
										<td>
										<label>	Admission to Semester(1st in case of new applicants otherwise as per the existing student's record	</label>
										<select class="form-control" name="sem" value="<?php echo $SemToBeUpdated; ?>">
										
											
														
														<option value="1st">1st	</option>
														<option value="2nd">	2nd	</option>
														<option value="3rd">	3rd	</option>
														<option value="4th">	4th	</option>
														<option value="5th">	5th	</option>
														<option value="6th">	6th	</option>
														
													
										</select>
										</td>
									
									</tr>
								
								<tr>
									<td>
									<label>Roll Number	</label>
									<input type="text" class="form-control" name="rollno" value="<?php echo $RollnoToBeUpdated; ?>">
									</td>
								
								</tr>
								
								<tr>
									<td>
									<label>Date Of Admission	</label>
									<input type="date" class="form-control" name="doa" value="<?php echo $DOAToBeUpdated; ?>">
									</td>
								
								</tr>
								<tr>
								<td><h2>Personal Details</h2>	</td>
								</tr>
								<tr>
									<td>
									<label>Name of the Applicant </label>
									<input type="text" class="form-control" name="stu_name" value="<?php echo $NameToBeUpdated; ?>">
									</td>
								<td style="color:red;">	<?php echo $Name_Error;	?>	</td>	
									
								
								</tr>
								
								
								
								<tr>
									<td>
									<label>Father's Name </label>
									<input type="text" class="form-control" name="fname" value="<?php echo $FnameToBeUpdated; ?>">
									</td>
								<td style="color:red;">	<?php echo $Fname_Error;	?>	</td>	
								</tr>
								
								<!--<tr>
									<td>
									<label>Mother's Name </label>
									<input type="text" class="form-control" name="mname" value="<?php echo $MnameToBeUpdated; ?>">
									</td>
								<td style="color:red;">	<?php echo $Mname_Error;	?>	</td>	
								</tr>-->
								
								<tr>
									<td>
									<label>Address </label>
									<input type="text" class="form-control" name="add" value="<?php echo $AddressToBeUpdated; ?>">
									</td>
								<td style="color:red;">	<?php echo $Add_Error;	?>	</td>	
								</tr>
								
								<tr>
									<td>
									
									<label>Date Of Birth	</label>
									<input type="date" class="form-control" name="dob" placeholder="Date of Birth" value="<?php echo $DOBToBeUpdated; ?>">
									</td>
								
								</tr>
								
								<tr>
									<td>
									<label>Gender	</label><br>
									Male:&nbsp&nbsp<input type="radio" name="gender" value="<?php echo $GenderToBeUpdated; ?>"> &nbsp&nbsp Female:&nbsp&nbsp <input type="radio" name="gender" value="<?php echo $GenderToBeUpdated;?>" >	
									</td>
								
								</tr>
								
								
								
								<tr>
									<td>
									<label>Contact Number	</label>
									<input type="text" class="form-control" name="ph_no" placeholder="Contact Number(+91)" value="<?php echo $ContactToBeUpdated; ?>">
									</td>
								<td style="color:red;">	<?php echo $Contact_Error;	?>	</td>	
								</tr>
								
								<tr>
									<td>
									<label>Email Address	</label>
									<input type="text" class="form-control" name="email" placeholder="Email Address" value="<?php echo $EmailToBeUpdated; ?>">
									</td>
								<td style="color:red;">	<?php echo $Email_Error;	?>	</td>	
								</tr>
								
								<tr>
								<td><h2>Academic Details</h2>	</td>
								</tr>
								
								
								
								
								
								<tr>
								<td>
								<label>Last qualifying Exam	</label>
									<input type="text" class="form-control" name="exam" placeholder="Last qualifying exam " value="<?php echo $ExamToBeUpdated; ?>">
									</td>
								<td style="color:red;">	<?php echo $Exam_Error;	?>	</td>
								</tr>
								
								<tr>
								<td>
									<label>Percentage	</label>
									<input type="text" class="form-control" name="percent" placeholder="Percentage(Last qualifying exam)" value="<?php echo $PercentToBeUpdated; ?>">
									</td>
								<td style="color:red;">	<?php echo $Percent_Error;	?>	</td>
								</tr>
								
								<div class="form-group">
										<span class="field-info"> Existing Image <span>
										<img src="Upload/<?php echo $ImageToBeUpdated; ?>" width=100px><br><br>
										
										<label for="appimg"> Select Image:</label>
										<input type="File" class="form-control" name="app_pic" id="appimg">
									</div>		
								
								<!--<tr>
								
									<td>
									<label>Note	</label>
									<textarea class="form-control" name="note">
									
									</textarea>
									</td>
								
								</tr>-->
								
								<tr>
									<td>
									<input type="submit" name="submit1" class="btn btn-primary" value="Update">
									</td>
								</tr>
							
							</tr>
						</table>
							
								
							   </form>
							   
							   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


       <?php require_once "include/footer.php"?>