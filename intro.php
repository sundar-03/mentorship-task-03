<?php
require_once ("connection.php");
?>
<!DOCTYPE html>
<html>
<style type="text/css">
	*{
		margin: 0px;
		padding: 0px;
	}
	#container
	{
		width: 300px;
		margin: 0px auto;
	}
    .input
    {
    	width: 92%;
    	padding: 2%;
    }
</style>
<body>
<h1 align="center">
	Registration Form
</h1>
<div id="container" >
	<form method="post" >
		<input type="text" name="user_name" placeholder="user name" onkeyup="check_user()" id="user_name" class="input" required><br><br>
	    <input type="password" name="password"  placeholder="password" id="password" class="input" required><br><br>
        <input type="submit" name="register" value="register" >
        <a href="login.php">
        	Click me for login        </a>
	</form>
</div>
<?php
if(isset($_POST['register']))
{
 $user_name=$_POST['user_name'];
  $password=$_POST['password'];
		  $q="INSERT INTO users(user_name,password)  VALUES ('$user_name','$password') ";
         $r=mysqli_query($con,$q);
          if($r){
	       header("location:login.php");
               }
		else
			{
	echo "registration is not successful";
			}
	}
    

?>
</body>
</html>
