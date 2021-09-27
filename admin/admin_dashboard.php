<?php require_once "include/admin_header.php" ?>
<!DOCTYPE html>

<head>

<title>Admin Dashboard</title>	

</head>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Admin Dashboard</h3>
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
                <div class="row" style="min-height:600px; width=100%">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
						
							<div class="container" style="margin-top:30px; margin-left:80px; margin-bottom:70px; width:80%;">
								<div>
									<div class="col-sm-4" style="float:left">
										<div class="card text-center">
											<div class="card-block">
											<img src="images/stumain.png" class="img-fluid"><br>
												<div class="card-title">
												<h4>Students	</h4>
												</div>
												<div class="card-text">
												<?php $query=mysqli_query($connection,"select * from admission");
												$Total=mysqli_num_rows($query);
												
												$queryA=mysqli_query($connection,"select * from registration where status='yes'");
												$TotalA=mysqli_num_rows($queryA);
												
												$queryD=mysqli_query($connection,"select * from registration where status='no'");
												$TotalD=mysqli_num_rows($queryD);
												?>
												<!--Total Students: <?php echo $Total;?><br>-->
												Approved:<?php echo $TotalA;?><br>
												Not-Approved:<?php echo $TotalD;?><br>
												</div>
											</div>
										</div>
									</div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									
									<div class="col-sm-4" >
										<div class="card text-center">
											<div class="card-block">
											<img src="images/faculty1.png" class="img-fluid">
												<div class="card-title">
												<h4>Faculty	</h4>
												</div>
												<div class="card-text">
												<?php $query=mysqli_query($connection,"select * from faculty");
												$TotalF=mysqli_num_rows($query);
												
												$FA=mysqli_query($connection,"select * from faculty_reg where status='yes'");
												$TotalFA=mysqli_num_rows($FA);
												
												$FD=mysqli_query($connection,"select * from faculty_reg where status='no'");
												$TotalFD=mysqli_num_rows($FD);
												?>
												<!--Total Faculty: <?php echo $TotalF;?><br>-->
												Approved:<?php echo $TotalFA;?><br>
												Not-Approved:<?php echo $TotalFD;?><br>
												</div>
											</div>
										</div>
									</div>
									
									<div class="col-sm-4" style="float:right;">
										<div class="card text-center">
											<div class="card-block">
											<img src="images/library1.png" class="img-fluid">
												<div class="card-title">
												<h4>Librarian	</h4>
												</div>
												<div class="card-text">
												<?php $query=mysqli_query($connection,"select * from librarian_reg");
												$TotalL=mysqli_num_rows($query);
												
												$LA=mysqli_query($connection,"select * from librarian_reg where status='yes'");
												$TotalLA=mysqli_num_rows($LA);
												
												$LD=mysqli_query($connection,"select * from librarian_reg where status='no'");
												$TotalLD=mysqli_num_rows($LD);
												?>
												<!--Total Librarian: <?php echo $TotalL;?><br>-->
												Approved:<?php echo $TotalLA;?><br>
												Not-Approved:<?php echo $TotalLD;?><br>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
                            <div class="x_title">
                                <h3 style="color:red;">Manage Students</h3>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
							
							
                                <div class="table-responsive">
									<table class="table table-striped table-hover">
										<tr>
											<th>Sl No	</th>
											<th>Course	</th>
											<th>Name	</th>
											<th>Image	</th>
											<th>Student Id</th>
											<th>Email	</th>
											<th>Contact	</th>
											<th>Sem	</th>
											<th>Roll_No	</th>
											<th>Status	</th>
											<th>Action </th>
											
						
										</tr>
										<?php
						
											$ViewQuery=("SELECT * FROM registration order by id desc");
											$Execute=mysqli_query($connection,$ViewQuery);
											$SrNo=0;
									
										while($Datarows=mysqli_fetch_array($Execute)){
											$Id=$Datarows["id"];
											$Course=$Datarows["course"];
											$Name=$Datarows["name"];
											$Image=$Datarows["img"];
											$Username=$Datarows["username"];
											$Email=$Datarows["email"];
											$Contact=$Datarows["contact"];
											$Sem=$Datarows["sem"];
											$Roll=$Datarows["enrollment"];
											$Status=$Datarows["status"];
											$SrNo++; 
										
										?>
										
									<tr>
											
												<td>	<h5><?php echo $SrNo; ?></h5>	</td>
												<td>	<h5><?php echo $Course; ?></h5>	</td>
												<td style="color:red;">	<h5><?php echo $Name; ?></h5>	</td>
												<td><img src="upload/<?php echo $Image;?>" width="130px" height="130px"> 	</td>
												<td style="color:green;">	<h5><?php echo $Username; ?></h5>	</td>
												<td>	<h5><?php echo $Email; ?></h5>	</td>
												<td>	<h5><?php echo $Contact; ?>	</h5></td>
												<td>	<h5><?php echo $Sem; ?></h5>	</td>
												<td>	<h5><?php echo $Roll; ?></h5>	</td>
												<td style="color:red;">	<h4><?php echo $Status; ?></h4>	</td>
												
												
												<td> <a href="approve.php?id=<?php echo $Id;   ?>" >
													<span class="btn btn-success">Approve</span> </a> <br>
													
													<a href="disapprove.php?id=<?php echo $Id;  ?>">
													<span class="btn btn-warning">Dis Approve</span> </a>  <br>
													
													<a href="delete_student.php?id=<?php echo $Id;  ?>">
													<span class="btn btn-danger">Delete</span> </a>  </td>	
									</tr>	
										<?php } ?>
											
										
										
									</table>
								</div><br><br><br><br><br>
								
								<h3 style="color:red;">Manage Faculties</h3><br>
								
								<div class="table-responsive">
									<table class="table table-striped table-hover">
										<tr>
											<th>Sl No	</th>
											<th>Dept	</th>
											<th>Faculty Name	</th>
											<th>Image	</th>
											<th>Faculty Id</th>
											<th>Email	</th>
											<th>Contact	</th>
											<th>Date of Appointment	</th>
											
											<th>Status	</th>
											<th>Action	</th>
											
						
										</tr>
										<?php
						
											$ViewQuery=("SELECT * FROM faculty_reg order by id desc");
											$Execute=mysqli_query($connection,$ViewQuery);
											$SrNo=0;
									
										while($Datarows=mysqli_fetch_array($Execute)){
											$Id=$Datarows["id"];
											$Dept=$Datarows["dept"];
											$Name=$Datarows["name"];
											$Image=$Datarows["img"];
											$Username=$Datarows["username"];
											$Email=$Datarows["email"];
											$Contact=$Datarows["contact"];
											$DOA=$Datarows["doa"];
											
											$Status=$Datarows["status"];
											$SrNo++; 
										
										?>
										
									<tr>
											
												<td>	<h5><?php echo $SrNo; ?></h5>	</td>
												<td>	<h5><?php echo $Dept; ?></h5>	</td>
												<td>	<h5 style="color:red;"><?php echo $Name; ?></h5>	</td>
												<td><img src="upload/<?php echo $Image;?>" width="130px" height="130px"> 	</td>
												<td>	<h5 style="color:green;"><?php echo $Username; ?></h5>	</td>
												<td>	<h5><?php echo $Email; ?></h5>	</td>
												<td>	<h5><?php echo $Contact; ?>	</h5></td>
												<td>	<h5><?php echo $DOA; ?>	</h5></td>
												
												<td>	<h4 style="color:red;"><?php echo $Status; ?></h4>	</td>
												
												
												<td> <a href="approvefaculty.php?id=<?php echo $Id;   ?>" >
													<span class="btn btn-success">Approve</span> </a> <br>
													
													<a href="disapprovefaculty.php?id=<?php echo $Id;  ?>">
													<span class="btn btn-warning">Dis Approve</span> </a>  <br>
													
													<a href="delete_faculty.php?id=<?php echo $Id;  ?>">
													<span class="btn btn-danger">Delete</span> </a>  </td>	
													
													</td>	
									</tr>	
										<?php } ?>
											
										
										
									</table><br><br><br><br><br>
									
									<h3 style="color:red;">Manage Librarian</h3><br>
									
									<div class="table-responsive">
									<table class="table table-striped table-hover">
										<tr>
											<th>Sl No	</th>
											
											<th>Librarian Name	</th>
											<th>Image	</th>
											<th>Librarian Id</th>
											<th>Email	</th>
											<th>Contact	</th>
											<th>Date of Appointment	</th>
											
											<th>Status	</th>
											<th>Action	</th>
											
						
										</tr>
										<?php
						
											$ViewQuery=("SELECT * FROM librarian_reg order by id desc");
											$Execute=mysqli_query($connection,$ViewQuery);
											$SrNo=0;
									
										while($Datarows=mysqli_fetch_array($Execute)){
											$Id=$Datarows["id"];
											
											$Name=$Datarows["name"];
											$Image=$Datarows["img"];
											
											$Username=$Datarows["username"];
											$Email=$Datarows["email"];
											$Contact=$Datarows["contact"];
											$DOA=$Datarows["doa"];
											
											$Status=$Datarows["status"];
											$SrNo++; 
										
										?>
										
									<tr>
											
												<td>	<h5><?php echo $SrNo; ?></h5>	</td>
												
												<td>	<h5 style="color:red;"><?php echo $Name; ?></h5>	</td>
												<td><img src="upload/<?php echo $Image;?>" width="130px" height="130px"> 	</td>
												<td>	<h5 style="color:green;"><?php echo $Username; ?></h5>	</td>
												<td>	<h5><?php echo $Email; ?></h5>	</td>
												<td>	<h5><?php echo $Contact; ?>	</h5></td>
												<td>	<h5><?php echo $DOA; ?>	</h5></td>
												
												<td>	<h4 style="color:red;"><?php echo $Status; ?></h4>	</td>
												
												
												<td> <a href="approve_librarian.php?id=<?php echo $Id;   ?>" >
													<span class="btn btn-success">Approve</span> </a> <br>
													
													<a href="disapprove_librarian.php?id=<?php echo $Id;  ?>">
													<span class="btn btn-warning">Dis Approve</span> </a>  <br>
													
													<a href="delete_librarian.php?id=<?php echo $Id;  ?>">
													<span class="btn btn-danger">Delete</span> </a>  </td>	
													
													</td>	
									</tr>	
										<?php } ?>
									</table>	
									
									
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


       <?php require_once "include/footer.php"?>