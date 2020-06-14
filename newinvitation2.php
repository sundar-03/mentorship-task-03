<?php
require_once ("connection.php");
?>
<html>
<head>
<style>
#preview1
{
width:500px;
height:100px;
background-color:	#FFA07A;
text-align:center;
word-wrap:break-word;
vertical-align:middle;
line-height:90px;

}
#preview2
{
width:500px;
height:300px;
background-color:	#FFA07A;
font-size:30px;
text-align:center;
word-wrap:break-word;
line-height:200%;
}
#preview3
{
width:500px;
height:100px;
background-color:	#FFA07A;
text-align:center;
word-wrap:break-word;
vertical-align:middle;
line-height:90px;
}
</style>
<script type="text/javascript">
function changefunc1() {
  var selectBox = document.getElementById("color1");
 var selectedValue = selectBox.options[selectBox.selectedIndex].value; 
var x=document.getElementById("preview1");
x.style.backgroundColor=selectedValue;
 } 
 function changefunc2() {
  var selectBox = document.getElementById("color2");
 var selectedValue = selectBox.options[selectBox.selectedIndex].value; 
var x=document.getElementById("preview2");
x.style.backgroundColor=selectedValue;
 } 
function changefunc3() {
  var selectBox = document.getElementById("color3");
 var selectedValue = selectBox.options[selectBox.selectedIndex].value; 
var x=document.getElementById("preview3");
x.style.backgroundColor=selectedValue;
 } 
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
Choose the header color:
<select name="color1" id="color1" onchange ="changefunc1();">
     <option value="#FFA07A">Light salmon</option>
    <option value="#FA8072">Salmon</option>
<option value="#E9967A">Dark Salmon</option>
<option value="#CD5C5C">Indianred</option>
<option value="#B22222">Fire brick</option>
<option value="	#8B0000">Dark red</option>
<option value="#FFFFE0">Light yellow</option>
<option value="#FFFACD">Lemon chiffon</option>
<option value="#FFE4B5">mocassin</option>
<option value="#00FF7F">Spring green</option>
<option value="#00FA9A">Medium spring green</option>
<option value="#90EE90">Light green</option>
<option value="#20B2AA">Light sea green</option>
<option value="#008B8B">Dark cyan</option>
<option value="#008080">Teal</option>
<option value="#EE82EE">violet</option>
<option value="#FF00FF">fuchsia</option>
<option value="#DA70D6">orchild</option>
  </select>
<br />
Choose the middle color:
<select name="color2" id="color2" onchange ="changefunc2();">
     <option value="#FFA07A">Light salmon</option>
    <option value="#FA8072">Salmon</option>
<option value="#E9967A">Dark Salmon</option>
<option value="#CD5C5C">Indianred</option>
<option value="#B22222">Fire brick</option>
<option value="	#8B0000">Dark red</option>
<option value="#FFFFE0">Light yellow</option>
<option value="#FFFACD">Lemon chiffon</option>
<option value="#FFE4B5">mocassin</option>
<option value="#00FF7F">Spring green</option>
<option value="#00FA9A">Medium spring green</option>
<option value="#90EE90">Light green</option>
<option value="#20B2AA">Light sea green</option>
<option value="#008B8B">Dark cyan</option>
<option value="#008080">Teal</option>
<option value="#EE82EE">violet</option>
<option value="#FF00FF">fuchsia</option>
<option value="#DA70D6">orchild</option>
  </select>
<br />
Choose the footer color:
<select name="color3" id="color3" onchange ="changefunc3();">
     <option value="#FFA07A">Light salmon</option>
    <option value="#FA8072">Salmon</option>
<option value="#E9967A">Dark Salmon</option>
<option value="#CD5C5C">Indianred</option>
<option value="#B22222">Fire brick</option>
<option value="	#8B0000">Dark red</option>
<option value="#FFFFE0">Light yellow</option>
<option value="#FFFACD">Lemon chiffon</option>
<option value="#FFE4B5">mocassin</option>
<option value="#00FF7F">Spring green</option>
<option value="#00FA9A">Medium spring green</option>
<option value="#90EE90">Light green</option>
<option value="#20B2AA">Light sea green</option>
<option value="#008B8B">Dark cyan</option>
<option value="#008080">Teal</option>
<option value="#EE82EE">violet</option>
<option value="#FF00FF">fuchsia</option>
<option value="#DA70D6">orchild</option>
  </select>
<br />
enter the header text:
<input id="headertext" type="text" name="headertext" value ="write the header text" onchange="headerchange(this.value)">
<br />
Enter the middle text:
<textarea id="middletext" type="text" name="middletext" value ="write the middle text" onchange="middlechange(this.value)" rows="5" cols="30" style ="height:70px">
</textarea>
<br />
Enter the footer text:
<input id="footertext" type="text" name="footertext" value ="write the header text" onchange="footerchange(this.value)">
<br>
Enter the user name:
<input type="text"  name="user_name" placeholder="user_name">
<br>

<input type="submit" name="send" value="send">
</form>
<?php

if(isset($_POST['send']))
{
   $sender_name=$_SESSION['username'];
   $receiver_name=$_POST['user_name'];
   $footertext=$_POST['footertext'];
   $middletext=$_POST['middletext'];
   $headertext=$_POST['headertext'];
   $headercolor=$_POST['color1'];
   $middlecolor=$_POST['color2'];
   $footercolor=$_POST['color3'];
   $date=date("Y-m-d h:i:sa");
   $q='INSERT INTO 'messages' ('sender_name','receiver_name','date_time','footertext','middletext','headertext','headercolor','middlecolor','footercolor')   
   VALUES ('".$sender_name."','".$receiver_name."','".$date."','".$footertext."','".$middletext."','".$headertext."','".$headercolor."','".$middlecolor."','".$footercolor."')  ';
   $r=mysqli_query($con,$q);
   if($r)
   {
       header("location:index.php?user=".$receiver_name);
   }
   else
   {
      echo "connection failed"; 
   }
}
?>
</body>
</html>
