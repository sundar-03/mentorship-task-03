<?php
require_once ("connection.php");
session_start();

if(isset($_POST['send']))
{
   $sender_name=$_SESSION['username'];
   $a=$_POST['user_name'];
   $footertext=$_POST['footertext'];
   $middletext=$_POST['middletext'];
   $headertext=$_POST['headertext'];
   
   $date=date("Y-m-d h:i:sa");
   $q="INSERT INTO messages (sender_name,receiver_name,date_time,footertext,middletext,headertext)   
   VALUES ('$sender_name','$a','$date','$footertext','$middletext','$headertext')  ";
   $r=mysqli_query($con,$q);

   if($r)
   {
       header("location:hello2.php?user=".$receiver_name);
   }
   else
   {
      echo ("error reason".mysqli_error($con));
   }
}
?>

<html>
<head>
<style>
#preview1
{
width:500px;
height:100px;
background-color:#00FF7F;
text-align:center;
word-wrap:break-word;
vertical-align:middle;
line-height:90px;

}
#preview2
{
width:500px;
height:300px;
background-color:#00FF7F;
font-size:30px;
text-align:center;
word-wrap:break-word;
line-height:200%;
}
#preview3
{
width:500px;
height:100px;
background-color:#00FF7F;
text-align:center;
word-wrap:break-word;
vertical-align:middle;
line-height:90px;
}
</style>
<script type="text/javascript">
function headerchange(val)
{
var x=document.getElementById("preview1");
x.innerHTML=val;
}
function middlechange(val)
{
var x=document.getElementById("preview2");
x.innerHTML=val;
}
function footerchange(val)
{
var x=document.getElementById("preview3");
x.innerHTML=val;
}
</script>
</head>
<body>
<div id="preview">
<div id="preview1">
</div>
<div id="preview2">
</div>
<div id="preview3">
</div>
</div>
<form method="post" >
enter the header text in one line:
<input id="headertext" type="text" name="headertext" value ="write the header text" onchange="headerchange(this.value)" required>
<br />
Enter the middle text:
<textarea id="middletext" type="text" name="middletext" value ="write the middle text" onchange="middlechange(this.value)" rows="5" cols="30" style ="height:70px" required>
</textarea>
<br />
Enter the footer text in one line:
<input id="footertext" type="text" name="footertext" value ="write the header text" onchange="footerchange(this.value)" required>
<br>
Enter the user name:
<input type="text"  name="user_name" placeholder="user_name" required>
<br>

<input type="submit" name="send" value="send">
</form>

</body>
</html>
