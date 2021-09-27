<?php require_once "include/header.php";
require_once "include/db.php";
mysqli_query($connection,"update messages set read1='yes' where dusername='$_SESSION[librarian]'");
 ?>

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
                                <h2>Your Messages</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-bordered">
								<tr>
								<th>Sender		</th>
								<th>Title		</th>
								<th>Message		</th>
								<th>Send On		</th>
								
								</tr>
								
								<?php
								$fullname='';
								$res=mysqli_query($connection,"select * from messages where dusername='$_SESSION[librarian]' order by id desc");
								while($row=mysqli_fetch_array($res))
								{
									/*$res1=mysqli_query($connection,"select * from admin where username='$row[susername]'");
									while($row1=mysqli_fetch_array($res1))
									{
										$fullname=$row1["username"];
									}*/
									
									echo "<tr>";
									echo "<td>";	echo $row['susername']; echo "</td>" ;
									echo "<td>";	echo $row["title"]; echo "</td>" ;
									echo "<td>";	echo $row["msg"]; echo "</td>" ;
									echo "<td>";	echo $row["datetime"]; echo "</td>" ;
									
										
									echo "</tr>";
									
									
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