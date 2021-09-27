<?php require_once "include/header.php";
require_once "include/db.php"; ?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
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
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Plain Page</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
							<table class="table table-bordered">
							<tr>
								<th>Username	</th>
								<th>Name	</th>
								
								<th>Sem	</th>
								<th>Contact		</th>
								<th>Email	</th>
								<th>Roll	</th>
								<th>Book Name	</th>
								<th>Issue Date	</th>
								<th>Return Date	</th></tr>
                                <?php 
								$query="select * from issue_books";
								$res=mysqli_query($connection,$query);
								while($row=mysqli_fetch_array($res))
								{
									$Username=$row['username'];
									$Name=$row['name'];
									$Sem=$row['sem'];
									$Contact=$row['contact'];
									$Email=$row['email'];
									$Roll=$row['roll'];
									$BookName=$row['book_name'];
									$IssueDate=$row['date'];
									$ReturnDate=$row['return_date'];
									
								?>
								
								
								<tr>
									<th><?php echo $Username;?>	</th>
									<th><?php echo $Name;?>	</th>
									<th><?php echo $Sem;?>	</th>
									<th><?php echo $Contact;?>	</th>
									<th><?php echo $Email;?>	</th>
									<th><?php echo $Roll;?>	</th>
									<th><?php echo $BookName;?>	</th>
									<th><?php echo $IssueDate;?>	</th>
									<th><?php echo $ReturnDate;?>	</th>
								
								
								</tr>
							<?php }?>	
							</table>
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


       <?php require_once "include/footer.php"?>