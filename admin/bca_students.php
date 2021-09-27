<?php require_once "include/demo_header.php";

require_once "include/db.php";

 ?>

        <!-- page content area main -->
        <div class="right_col" role="main" style="width:120%">
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

                <div class="clearfix" ></div>
                <div class="row" style="min-height:500px; width:100%">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>BCA 2nd SEM STUDENTS</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
							
                                <table class="table table-bordered">
								<tr>
									<th>	Sl No		</th>
									<th>	Name		</th>
									<th>	Father's Name		</th>
									<th>	Mother's Name	</th>
									<th>	Add		</th>
									<th>	DOB		</th>
									<th>	Gender		</th>
									<th>	Cont	</th>
									<th>	Email		</th>
									<th>	10th %	</th>
									<th>	School		</th>
									<th>	12th %	</th>
									<th>	College		</th>
									<th>	10th Board		</th>
									<th>	12th Board		</th>
									<th>	Grad %	</th>
									<th>	Grad College</th>
									<th>	Img		</th>
									<th>	Note		</th>
									<th>	Date of Admission		</th>
									
								</tr>
								<tr>
							<?php
							$res=mysqli_query($connection,"select * from admission where course='BCA' && sem='2nd'");
							$SrNo=1;
							
								while($row=mysqli_fetch_array($res))
							{?>
								<td>  <?php echo $SrNo++;?>	</td>
								<td>  <?php echo $row["stu_name"];?>	</td>
								<td>  <?php echo $row["f_name"];?>	</td>
								<td>  <?php echo $row["m_name"];?>	</td>
								<td>  <?php echo $row["address"];?>	</td>
								<td>  <?php echo $row["dob"];?>	</td>
								<td>  <?php echo $row["gender"];?>	</td>
								<td>  <?php echo $row["contact"];?>	</td>
								<td>  <?php echo $row["email"];?>	</td>
								<td>  <?php echo $row["10_percent"];?>	</td>
								<td>  <?php echo $row["school"];?>	</td>
								<td>  <?php echo $row["12_percent"];?>	</td>
								<td>  <?php echo $row["college"];?>	</td>
								<td>  <?php echo $row["10_board"];?>	</td>
								<td>  <?php echo $row["12_board"];?>	</td>
								<td>  <?php echo $row["grad_per"];?>	</td>
								<td>  <?php echo $row["grad_clg"];?>	</td>
								<td>  <?php echo $row["image"];?>	</td>
								<td>  <?php echo $row["note"];?>	</td>
								<td>  <?php echo $row["type"];?>	</td>
								
							</tr>	
							<?php
							
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