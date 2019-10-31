<html>

<head>


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet"  type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/userhome.css">
	<link rel="stylesheet" type="text/css" href="css/show_contest.css"> 
	<script
		src="https://code.jquery.com/jquery-3.3.1.js"
		integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
		crossorigin="anonymous">
	</script>
	<script> 
		$(function(){
			$("#header").load("header.html"); 
			$("#footer").load("footer.html"); 
		});
	</script> 


	<script>
		function edit(id){
			window.location.href = window.location.href.replace(/[^/]*$/, "")+"Edit_Questions.php?contestid="+id;
		}

		function editcontest(id){
			window.location.href = window.location.href.replace(/[^/]*$/, "")+"Edit_Contest.php?contestid="+id;
		}



	</script>

	<script type="text/javascript">
		function user(id){
            // $("#userform").submit();
            window.location.href = window.location.href.replace(/[^/]*$/, "")+"Contest_Users.php?contestid="+id;
       }
    </script>

</head>



<body>
	<div id="header"></div>

	<?php
	require_once("config.php");
	?>


	<div id="headnam" style="background : #f7f7f7;">
		<label  style="font-size:30px;
		color:black;
		font-family: 'Times New Roman', Times, serif;
		font-style: normal;
		font-weight:normal;
		margin-left:20px;
		margin-top:15px;
		margin-bottom:15px;">Contests</label>
	</div>	




	<div id="parent" >
		<div id="inside">
			<table>
				<tr>
					<th>Sr. No.</th>
					<th>Contest Name</th>
					<th>Start Date and Time</th>
					<th>End Date and Time</th>
					<th colspan="3">Edit</th>
				</tr>
				<?php
				$sql = "SELECT * FROM add_contest where rid=1";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
                // output data of each row
					$count=1;
					while($row = $result->fetch_assoc()) {
						?>
						<tr>
							<td><?php echo "$count."?></td>
							<td><?php echo $row["name"]?></td>
							<td><?php echo $row['start_datetime']?></td>
							<td><?php echo $row['end_datetime']?></td>
							<td>

								<i style="color: #034519;font-size:15px" onclick="edit(this.id)" id="<?php echo $row["id"] ?>" class="fa fa-edit"><br>Ques</i>

							</td>
							<td><i onclick="user(this.id)" style="color: #337687;font-size:15px" id="<?php echo $row["id"] ?>" class="fa fa-user"  ><br>Users</i>
							</td>
							<td><i onclick="editcontest(this.id)" style="color: #5c1c29;font-size:15px" id="<?php echo $row["id"] ?>" class="fa fa-pencil"  ><br>Contest</i>
							</td>	  
						</tr> 
						<?php
						$count++;
					}
				}
				else{
					?>	
				</table>		
				<label style="text-align:center;margin:10px;font-size:17px;"> You don't have any past contest. Please Add a Contest.</label>
				<?php
			}		
			?>

		</table>
	</div>	
</div>

<div style="margin-left:14%">
	<form action="Add_Contest.php" >
		<input type="submit" name="submit" id="submit" value="&nbsp;Add Contest&nbsp;" class="btn btn-success" />
	</form>
</div>

<footer>
	<div id="footer"></div>
</footer>


</body>

</html>
</html>