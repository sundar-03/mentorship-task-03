<?php
require_once ("connection.php");
?>
<style>
	#header
	{
		width: 60px;
		height: 40px;
		text-align:center;
		word-wrap:break-word;
		vertical-align:middle;
		line-height:90px;
	}
	#middle
	{
		width: 60px;
		height: 60px;
		text-align:center;
         word-wrap:break-word;
         font-size: 7px;

	}
	#footer
	{
		width: 60px;
		height: 40px;
		word-wrap:break-word;
		vertical-align:middle;
		line-height:90px;
	}
</style>
<div id="right-col-container">
			
				<?php

				$no_message=false;
				if(isset($_GET['user']))
				{
					$_GET['user']=$_GET['user'];
				}
				else
				{
                      $q='SELECT 'sender_name', 'receiver_name' FROM 'messages' WHERE 'sender_name'="'.$_SESSION['username'].'"
                       OR 'receiver_name' "'.$_SESSION['username'].'" ORDER BY 'date_time' DESC LIMIT 1  ';
                       $r = mysqli_query($con,$q);
                       if($r)
                       {
                               if(mysqli_num_rows($r)>0)
                               {
                                     while($row=mysqli_fetch_assoc($r))
                                     {
                                     	$sender_name=$row['sender_name'];
                                     	$receiver_name=$row['receiver_name'];
                                     	if($_SESSION['username']==$sender_name)
                                     	{
                                     		$_GET['user']=$receiver_name;
                                     	}
                                     	else{
                                     		$_GET['user']=$sender_name;
                                     	}
                                     }
                               }
                               else
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
                           $q='SELECT * FROM 'messages' WHERE 'sender_name'="'.$_SESSION['username'].'" AND 'receiver_name'="'.$_GET['user'].'"        
                       OR 
                       'sender_name'="'.$_GET['user'].'" AND 'receiver_name'="'.$_SESSION['username'].'" ';
                       $r=mysqli_query($con,$q);
                       if($r)
                       {
                           while ($row = mysqli_fetch_assoc($r)) {
                           	$sender_name=$row['sender_name'];
                           	$receiver_name=$row['receiver_name'];
                           	$footertext=$row['footertext'];
							   $middletext=$row['middletext'];
							   $headertext=$row['headertext'];
							   $headercolor=$row['color1'];
							   $middlecolor=$row['color2'];
							   $footercolor=$row['color3'];
							   

                           	if ($sender_name == $_SESSION['username']) {
                           		?>
                           		<div class="grey-invitation">
					                   <a href="#">
						             Me
					              </a>
					              <script type="text/javascript">
					              	var headercolor="<?php echo $headercolor ?>";
					              	document.getElementById("header").style.backgroundColor = headercolor;
					              	var middlecolor="<?php echo $headercolor ?>";
					              	document.getElementById("middle").style.backgroundColor = middlecolor;
					              	var footercolor="<?php echo $footercolor ?>";
					              	document.getElementById("footer").style.backgroundColor = footercolor;
					              </script>
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
				                </div>
                           		<?php
                           	  }
                           	  else{
                           		?>
                           	                    <div class="white-invitation">
					                         <a href="#">
						                  <?php echo $sender_name;    ?>
					                </a>
					                <script type="text/javascript">
					              	var headercolor="<?php echo $headercolor ?>";
					              	document.getElementById("header").style.backgroundColor = headercolor;
					              	var middlecolor="<?php echo $headercolor ?>";
					              	document.getElementById("middle").style.backgroundColor = middlecolor;
					              	var footercolor="<?php echo $footercolor ?>";
					              	document.getElementById("footer").style.backgroundColor = footercolor;
					              </script>
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
				                    </div>
			                        
                                 }
                           }
                       }
                       else
                       {
                       	echo "query problem";
                       }
                   }
				?>
				
			</div>
