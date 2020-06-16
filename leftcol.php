<div id="left-col-container">
	<a href="newinvitation2.php">
	<div  style="cursor: pointer;" class="whiteback">
		<p align="center">
			Create New Invitation
		</p>
	</div>
</a>
		<?php
			require_once ("connection.php");
			 $q="SELECT * FROM feedback WHERE sender_name='".$_SESSION['username']."' ORDER BY date_time DESC ";
			$r=mysqli_query($con,$q);
			while ($row = mysqli_fetch_assoc($r))
			{
				$sender_name=$row['sender_name'];
				$receiver_name = $row['receiver_name'];
				$status = $row['status'];
				?>
				<div  style="cursor: pointer;" class="greyback">
						<p align="center">
						 <?php
						    echo $receiver_name." has ".$status."ed your invitation";
						 ?>
						</p>
					</div>

					<?php
			}
			?>
         
		</div>
