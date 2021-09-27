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
                                <h2>Search Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
							
							<form name="form1" action="" method="post">
							<table class="table">
							<tr>
								<td>
								<input type="text" name="t1" placeholder="Enter Book Name" class="form-control" required>
								
								</td>
								
								<td>
								<input type="submit" name="submit1" value="Search Books" class="form-control btn-primary">
								</td>
							</tr>
							</table>
							
							</form>
                                <?php
								if(isset($_POST["submit1"]))
								{
									$res=mysqli_query($connection,"select * from add_books where book_name like('%$_POST[t1]%')");
								echo "<table class='table table-bordered'>";
								echo "<tr>";
								while($row=mysqli_fetch_array($res))
								{
									echo "<td>"
									?>
									<img src="../librarian/upload/<?php echo $row["book_img"] ?>" height="100" width="100"> 
									
									<?php
									echo "&nbsp&nbsp";?>
									Book Name: <?php echo "<b>".$row["book_name"] ."</b>";?>

									Available Quantity:<?php echo "<b>".$row["quantity_available"] ."</b>";
									echo "</td>";
								}
								echo "</tr>";
								echo "</table>";
								}
								else
								{
									$res=mysqli_query($connection,"select * from add_books");
								echo "<table class='table table-bordered'>";
								echo "<tr>";
								while($row=mysqli_fetch_array($res))
								{
									echo "<td>"
									?>
									<img src="../librarian/upload/<?php echo $row["book_img"] ?>" height="100" width="100"> 
									
									<?php
									echo "&nbsp&nbsp";?>
									Book Name: <?php echo "<b>".$row["book_name"] ."</b>";?>

									Available Quantity:<?php echo "<b>".$row["quantity_available"] ."</b>";
									echo "</td>";
								}
								echo "</tr>";
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