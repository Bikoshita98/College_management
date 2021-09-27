<!--<table class="table table-bordered" width="90%">
										<tr>
											<th>	Sl No		</th>
											<th>	Name		</th>
											<th>	Img		</th>
											<th>	Attendance	</th>
											
											
											
										</tr>
										<tr>
										<?php
										$res=mysqli_query($connection,"select * from admission where course='$Course' && sem='$Sem'");
										$SrNo=1;
										$Counter=0;
											while($row=mysqli_fetch_array($res))
										{?>
											<td>  <?php echo $SrNo++;?>	</td>
											
											<td>  <?php echo $row["stu_name"];?>
											<input type="hidden" value="<?php echo $row['stu_name'];?>"	name="stu_name[]">
											</td>
											
											<td>  <?php echo $row["image"];?>	
											<input type="hidden" value="<?php echo $row['image'];?>"	name="image[]">
											</td>
											
											<td>	
											
											<input type="radio" name="attendance[<?php echo $Counter;	?>]" value="Present">Present	
											<input type="radio" name="attendance[<?php echo $Counter;	?>]" value="Absent"> Absent
											
											</td>
											
											
										</tr>
										<?php 
										$Counter++;
										}?>
									</table>	
									<input type="Submit" value="Submit" name="submit2"  style="float:right; margin-top:30px;">-->
									
									
									
									
									
									
									
									<?php 
									}
									
									if(isset($_POST['submit2'])) 
									{
										
										
											$course=$_POST["course"];
											$subject=$_POST["subject"];
											$sem=$_POST["sem"];
											$stu_name=$_POST["stu_name"];
											$image=$_POST["image"];
											$date=date("Y-m-d H:i:s");
											$attendance=$_POST['attendance'];
											mysqli_query($connection,"insert into attendance(stu_name,course,subject,sem,status,date) values('$stu_name','$course','$subject','$sem','$attendance','$date')");
										
									}
									?>	