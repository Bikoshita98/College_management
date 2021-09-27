<?php require_once "include/db.php" ?>
<?php require_once "include/student_header.php" ?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Welcome to SCC</h3>
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
                </div><br><br><br><br>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-sm-6" style="float:center;">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Your Profile</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
								
								<?php if(isset($_POST['submit1']))
								{
									$Name=mysqli_real_escape_string($connection,$_POST["name"]);
									$S_id=mysqli_real_escape_string($connection,$_POST["username"]);
									$Image=mysqli_real_escape_string($connection,$_POST["img"]);
									$DOA=mysqli_real_escape_string($connection,$_POST["doa"]);
									
									$res=mysqli_query($connection,"insert into librarian_profile(name,l_id,image,doa) values('$Name','$L_id','$Image','$DOA')");
									
									if($res)?>
									
									<script type="text/javascript">
						
										alert("Details Added Successfully");
										window.location="lib_dashboard.php";
								
										</script>
									
									
									<?php
									
									
								}
								
								?>
								
								<div class="table-responsive">
									<table class="table table-striped table-hover">
							
							<?php
						
									$ViewQuery=("SELECT * FROM registration where username='$ProfileName'");
									$Execute=mysqli_query($connection,$ViewQuery);
									
							
								while($Datarows=mysqli_fetch_array($Execute)){
									$Id=$Datarows["id"];
									$Username=$Datarows["username"];
									$Name2=$Datarows["name"];
									$Image2=$Datarows["img"];
									$Course=$Datarows["course"];
									$Sem=$Datarows["sem"];
									$Roll_no=$Datarows["enrollment"];
									
									
								
								
		
		
			
							?>	
							
								<tr><img src="Upload/<?php echo $Image2; ?>" width="130px" height="130px" style="margin-left:40%;" ></tr><br><br><br>
								<tr><h4><b>	Username:&nbsp </b><?php echo $Username; ?> </h4>	</tr>
								<tr><h4><b>	Name: &nbsp </b><?php echo $Name2; ?>	</h4></tr>
								<tr><h4><b>	Course: &nbsp </b><?php echo $Course; ?>	</h4></tr>
								<tr><h4><b>	Sem: &nbsp </b><?php echo $Sem; ?>	</h4></tr>
								<tr><h4><b>	Roll No: &nbsp </b><?php echo $Roll_no; ?>	</h4></tr>
								
								
								
								
							
						<?php } ?>

		
						</table>
						<!--<a href="Edit_stu_profile.php?id=<?php echo $Id;  ?>">
						<span class="btn btn-primary">Edit Profile</span> </a> -->
					
					
					</div>
							</div>
                        </div>
                    </div>
					
					
                </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


       <?php require_once "include/footer.php"?>