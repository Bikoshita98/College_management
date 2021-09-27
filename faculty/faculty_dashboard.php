<?php require_once "include/faculty_header.php";
require_once "include/db.php"; 

		$Name_Error="";
		$Subject_Error="";
		

			if(isset($_POST["submit1"]))
			{
				$query=mysqli_query($connection,"select * from faculty_profile where f_id='$ProfileName'");
				if(mysqli_num_rows($query)>0)
							
							
							{?>
								<div  class="alert alert-danger col-lg-3 col-lg-push-3">
								<strong>Profile already exists</strong> 
								</div>
							<?php }
								
				else{				
				$Name=mysqli_real_escape_string($connection,$_POST["name"]);
				$Sub1=mysqli_real_escape_string($connection,$_POST["sub1"]);
				$Sub2=mysqli_real_escape_string($connection,$_POST["sub2"]);
				$Sub3=mysqli_real_escape_string($connection,$_POST["sub3"]);
				$Sub4=mysqli_real_escape_string($connection,$_POST["sub4"]);
				$Sub5=mysqli_real_escape_string($connection,$_POST["sub5"]);
				$Sub6=mysqli_real_escape_string($connection,$_POST["sub6"]);
				$Sub7=mysqli_real_escape_string($connection,$_POST["sub7"]);
				$Image=mysqli_real_escape_string($connection,$_POST["pic"]);
				
				if(!preg_match("/^[A-Za-z .]*$/",$Name))
							{
								 $Name_Error="Only letters and white spaces are allowed";
							}
							
				else if(!preg_match("/^[A-Za-z& .]*$/",$Sub1))
							{
								 $Subject_Error="Invalid Subject format";
							}
				else if(!preg_match("/^[A-Za-z& .]*$/",$Sub2))
							{
								 $Subject_Error="Invalid Subject format";
							}
							
				else if(!preg_match("/^[A-Za-z& .]*$/",$Sub3))
							{
								 $Subject_Error="Invalid Subject format";
							}
								
				else if(!preg_match("/^[A-Za-z& .]*$/",$Sub4))
							{
								 $Subject_Error="Invalid Subject format";
							}
				else if(!preg_match("/^[A-Za-z& .]*$/",$Sub5))
							{
								 $Subject_Error="Invalid Subject format";
							}
				else if(!preg_match("/^[A-Za-z& .]*$/",$Sub6))
							{
								 $Subject_Error="Invalid Subject format";
							}
							
				else if(!preg_match("/^[A-Za-z& .]*$/",$Sub7))
							{
								 $Subject_Error="Invalid Subject format";
							}			
					

					else{
							$res=mysqli_query($connection,"insert into faculty_profile values('','$Name','$ProfileName','$Sub1','$Sub2','$Sub3','$Sub4','$Sub5','$Sub6','$Sub7','$Image')");
									
							if($res)
								{
									echo "success";
								}
							else
								{
										echo "error";
				
								}			
								
						}		
					
					}
			}




?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        
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
                <div class="row" style="min-height:600px;">
                    <div class="col-sm-6">
                        <div class="x_panel" >
                            <div class="x_title">
                                <h2>Create Your Profile</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                               <form action="faculty_dashboard.php" method="post" type="enctype/form-data">
								<input type="text" class="form-control" name="name" placeholder="Your Name" required=""/><br>
								<span style="color:red;"> <?php echo $Name_Error; ?>	</span><br><br>
								
								
								
								<label>Insert atleast one subject	</label>
								<input type="text" class="form-control" name="sub1" placeholder="Subject 1" required=""/>
								<span style="color:red;"> <?php echo $Subject_Error; ?>	</span><br>
								
								<input type="text" class="form-control" name="sub2" placeholder="Subject 2" >
								<span style="color:red;"> <?php echo $Subject_Error; ?>	</span><br>
								
								<input type="text" class="form-control" name="sub3" placeholder="Subject 3" >
								<span style="color:red;"> <?php echo $Subject_Error; ?>	</span><br>
								
								<input type="text" class="form-control" name="sub4" placeholder="Subject 4" >
								<span style="color:red;"> <?php echo $Subject_Error; ?>	</span><br>
								
								<input type="text" class="form-control" name="sub5" placeholder="Subject 5" >
								<span style="color:red;"> <?php echo $Subject_Error; ?>	</span><br>
								
								<input type="text" class="form-control" name="sub6" placeholder="Subject 6" >
								<span style="color:red;"> <?php echo $Subject_Error; ?>	</span><br>
								
								<input type="text" class="form-control" name="sub7" placeholder="Subject 7" ><br>
								<span style="color:red;"> <?php echo $Subject_Error; ?>	</span><br>
								
								<label>Your Profile picture</label>
								<input type="file" class="form-control" name="pic" required=""/><br>
								
								<input type="submit" name="submit1" value="Submit Your Details" class="btn btn-success">
							   </form>
                            </div>
							
                        </div>
                    </div>
					
					<div class="col-sm-6" style="float:right;">
                        <div class="x_panel" >
                            <div class="x_title">
                                <h2>Your Profile</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                    <div class="table-responsive">
						<table class="table table-striped table-hover">
							
							<?php
						
									$ViewQuery=("SELECT * FROM faculty_profile where f_id='$ProfileName'");
									$Execute=mysqli_query($connection,$ViewQuery);
									
							
								while($Datarows=mysqli_fetch_array($Execute)){
									$Id=$Datarows["id"];
									$FId=$Datarows["f_id"];
									$Name2=$Datarows["name"];
									$Image2=$Datarows["img"];
									$Subject1=$Datarows["sub1"];
									$Subject2=$Datarows["sub2"];
									$Subject3=$Datarows["sub3"];
									$Subject4=$Datarows["sub4"];
									$Subject5=$Datarows["sub5"];
									$Subject6=$Datarows["sub6"];
									$Subject7=$Datarows["sub7"];
								
								
		
		
			
							?>	
							
								<tr><img src="upload/<?php echo $Image2; ?>" width="130px" height="130px" style="margin-left:40%;" ></tr><br><br><br>
								<tr><h4><b>	Faculty Id:&nbsp </b><?php echo $FId; ?> </h4>	</tr>
								<tr><h4><b>	Name: &nbsp </b><?php echo $Name2; ?>	</h4></tr>
								
								<tr><h4><b>	Your Subjects: &nbsp </b><br><br><?php echo $Subject1; ?><br><br>
								<?php echo $Subject2; ?><br><br>
								<?php echo $Subject3; ?><br><br>
								<?php echo $Subject4; ?><br><br>
								<?php echo $Subject5; ?><br><br>
								<?php echo $Subject6; ?><br><br>
								<?php echo $Subject7; ?><br><br>


								</h4></tr>
								
								
							
						<?php } ?>

		
						</table>
					<a href="delete_fal_profile.php?id=<?php echo $Id;  ?>">
					<span class="btn btn-danger">Delete Profile</span> </a> 
					
					
					</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


       <?php require_once "include/footer.php"?>