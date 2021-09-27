<?php require_once "include/header.php";
	require_once "include/db.php";

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
                                <h2>Return Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                               <form name="form1" action="" method="post">
							   
							   <table class="table table-bordered">
								   <tr>
										<td>
										<select name="user" class="form-control">
										<?php
										
										$res=mysqli_query($connection,"select username from issue_books where return_date=''");
										while($row=mysqli_fetch_array($res))
										{
											echo "<option>";
											echo $row["username"];
											echo "</option>";
										}
										?>
										
										
										</select>
										</td>
										
									</tr>
							   </table>
							   <input type="submit" name="submit1" value="Search" class="btn btn-primary">
							   </form><br>
							   <?php
							   if(isset($_POST["submit1"])){
								  
							   $res=mysqli_query($connection,"select * from issue_books where username='$_POST[user]'");
							    echo "<table class='table table-bordered'>";
								echo "<tr>";
								echo "<th>";	echo "Student Id ";	echo "</th>";
								echo "<th>";	echo "Name";	echo "</th>";
								
								echo "<th>";	echo "Semester";	echo "</th>";
								echo "<th>";	echo "Contact";	echo "</th>";
								echo "<th>";	echo "Email";	echo "</th>";
								echo "<th>";	echo "Roll No";	echo "</th>";
								echo "<th>";	echo "Book Name";	echo "</th>";
								echo "<th>";	echo "Book Issue Date";	echo "</th>";
								echo "<th>";	echo "Return Book";	echo "</th>";
								echo "</tr>";
								while($row=mysqli_fetch_array($res))
								{
								echo "<tr>";
								echo "<td>"; 	echo $row["username"];	echo "</td>";
								echo "<td>";	echo $row["name"];	echo "</td>";
								
								echo "<td>";	echo $row["sem"];	echo "</td>";
								echo "<td>";	echo $row["contact"];	echo "</td>";
								echo "<td>";	echo $row["email"];	echo "</td>";
								echo "<td>";	echo $row["roll"];	echo "</td>";
								echo "<td>";	echo $row["book_name"];	echo "</td>";
								echo "<td>";	echo $row["date"];	echo "</td>";
								echo "<td>";?> <a href="return.php?id=<?php echo $row["id"];?>">Return</a> <?php echo "</td>";
								
								
								echo "</tr>";
								}
								echo "</table>";
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