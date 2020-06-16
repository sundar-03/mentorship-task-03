<?php
require_once ("connection.php");
if(isset($_POST['respond']))
{
     $x=$_POST['sended'];
     $y=$_SESSION['username'];
     $z=$_POST['feedback'];
     $date=date("Y-m-d h:i:sa");
       $q="INSERT INTO feedback(sender_name,receiver_name,status,date_time)  VALUES ('$x','$y','$z','$date') ";
       $r=mysqli_query($con,$q);
       if(!$r)
       {
       	echo ("Connection failed  ".mysqli_error($con));
       }
}
?>
<!DOCTYPE html>
<html>
<head>
	<style>
	#header
	{
		
		width: 180px;
		height: 90px;
		text-align:center;
		word-wrap:break-word;
		vertical-align:middle;
		line-height:90px;
		color: black;
		background-color:#00FF7F;
		padding: 0px;
	}
	#middle
	{
		position: relative;
		bottom: 12px;
		width: 180px;
		height: 90px;
		text-align:center;
	
         word-wrap:break-word;
         font-size: 7px;
         color: black;
         background-color:#00FF7F;

	}
	#footer
	{
		position: relative;
		bottom: 24px;
		background-color:#00FF7F;
		width: 180px;
		height: 90px;
		text-align:center;
		word-wrap:break-word;
		vertical-align:middle;
		line-height:90px;
		color: black;
	}
</style>
</head>
<body>
<div id="right-col-container">
			
				<?php

				$no_message=false;
				if(isset($_GET['user']))
				{
					 $_GET['user']=$_GET['user'];
				}
				else
				{
                      $q="SELECT sender_name, receiver_name FROM messages WHERE sender_name='".$_SESSION['username']."'
                       OR receiver_name ='".$_SESSION['username']."' ORDER BY date_time DESC LIMIT 1  ";
                       $r = mysqli_query($con,$q);
                       if($r)
                       {
                               if(mysqli_num_rows($r) == 0)
                               {
                                   echo "no invitation from you";
                               	$no_message = true;
                               }
                         
                       }
                       else
                       {
                       	echo "query failed";
                       }

				}
				if($no_message == false){
                           $q="SELECT * FROM messages WHERE sender_name='".$_SESSION['username']."'         
                       OR 
                        receiver_name='".$_SESSION['username']."' ORDER BY date_time DESC ";
                       $r=mysqli_query($con,$q);
                       if($r)
                       {
                           while ($row = mysqli_fetch_assoc($r)) {   
                           	$sender_name=$row['sender_name'];
                           	$receiver_name=$row['receiver_name'];
                           	$footertext=$row['footertext'];
							   $middletext=$row['middletext'];
							   $headertext=$row['headertext'];
							  
							   

                           	if ($sender_name == $_SESSION['username']) {
                           	         ?>
                           		<div class="grey-invitation">
					                   <a href="#">
						             Me
					              </a>
					             
					              <div id="header">
					              	<p>
					              		<?php echo $headertext;?>
					              	</p>
					              </div>
					              <div id="middle" >
					              	<p>
					              		<?php echo $middletext;?>
					              	</p>
					              </div>
					              <div id="footer">
					              	<p>
					              	<?php echo $footertext;?>
					              </p>
					              </div>

					              <?php
                                    echo "sended to ".$receiver_name;
					              ?>
				                </div>
                           		   <?php
                           	  
                           	  }
                           	  else {  ?>
                           	                    <div class="white-invitation">
					                         <a href="#">
						                  <?php echo $sender_name;    ?>
					                </a>
					                
					                <div id="header"  >
					              	<p>
					              		<?php echo $headertext;?>
					              	</p>
					              </div>
					              <div id="middle" >
					              	<p>
					              		<?php echo $middletext;?>
					              	</p>
					              </div>
					              <div id="footer" >
					              	<p>
					              	<?php echo $footertext;?>
					              </p>
					              </div>
					              
					             
					              
					              <form method="post" >
				                    	<select name="feedback">
									     <option value="accept">Accept</option>
									    <option value="reject">Reject</option>
				                    	</select>
				                    	<br>
				                    	<?php
                                          echo '<input type="text" name="sended" value="'.$sender_name.'" readonly />      ';
				                    	?>
				                    	<br>
				                    	<input type="submit"  name="respond" value="respond" >
				                    </form>
				                
				                    </div>

			                       <?php 
                                 }
                           }
                       }
                       else
                       {
                       	echo ("connectiom failed  ".mysqli_error($con));
                       }
                   }
				?>
				
			</div>

</body>
</html>
