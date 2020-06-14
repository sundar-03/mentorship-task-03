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
	Login Form
</h1>
<div id="container">
<form method="post" >
		<input type="text" name="user_name" placeholder="user name" onkeyup="check_user()" id="user_name" class="input" required><br><br>
	    <input type="password" name="password"  placeholder="password" id="password" class="input" required><br><br>
        <input type="submit" name="login" value="login">
        <a href="intro.php">
        	click to register
        </a>
	</form>
</div>
	<?php
	if(isset($_POST['login']))
{
	$user_name=$_POST['user_name'];
$password=$_POST['password'];
$q="SELECT * FROM 'users' WHERE user_name='".$user_name."' AND password='".$password."' ";
$r=mysqli_query($con,$q);
$count=mysqli_num_rows($r);
if($count == 1)
{
	$_SESSION['username']=$user_name;
	header("location:index.php");
}
else
{
	echo "your password and username do not match";
}
}
?>
</body>
</html>
