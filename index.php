<?php
session_start();
if(isset($_SESSION['username']))
{
         echo '<a href="logout.php"> LogOut</a>'; 
}
?>
<!DOCTYPE html>
<html>
<style>
	<?php
   require_once ("style.php");
	?>
</style>
<body>
<div id="container">
	<div id="menu">
		<?php

        echo $_SESSION['username'];
       // echo "<a  id="xy" href="logout.php">Log Out</a>";
		?>
	</div>
	<div id="left-col">
		<?php
            require_once("leftcol.php");
		?>
	</div>
	<div id="right-col">
		<?php
       require_once ("rightcol.php");
		?>
	</div>
</div>
</body>
</html>
