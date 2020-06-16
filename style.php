html,body
	{
		height: 100%;
		overflow: hidden;
		padding: 0px;
		margin: 0px;
	}
a,p
	{
		font-size: 12px;
		font-family:helvetica;
	}
#container
{
	box-shadow: 2px 2px 2px #000000;
	width: 1200px;
	height: 90%;
	margin: 2% auto;
	border-radius: 1%;
	overflow: hidden;
}
#menu
{
	background: #233070;
	color: white;
	padding: 1%;
	font-size: 30px;
}
#left-col, #right-col
{
	
	float: left;
   height: 90%;

}
#left-col
{
	width: 30%;
}
#right-col
{
	width: 69%;
	border: 1px solid #efefef;
}
#left-col-container ,#right-col-container
{
	width: 100%;
	height: 100%;
	margin: 0px auto;
	height: 100%;
	overflow: auto;
	border: 1px solid #efefef;
}
.greyback , .whiteback
{
	border: 1px solid black;
	padding: 5px;
	margin: 0px auto;
	margin-top: 2px;
	overflow:auto;
}
.greyback
{
	background: #efefef;
}
.whiteback
{
	background: white;
}
 .white-invitation,.grey-invitation
{
border: 1px solid black;
width: 96%;
padding: 5px;
margin: 0px auto;
margin-top: 2px;
overflow: auto;
}
.white-invitation
{
	background:white;
}
.grey-invitation
{
  background: #efefef;
}
#new-invitation
{
		display: none;
		box-shadow: 2px 10px 30px #000000;
		width: 500px;
		position: fixed;
		top: 10%;
		background: white;
		z-index: 2;
		left: 50%;
		transform: translate(-50%,0);
		border-radius: 5px;
		overflow: auto;
}
.invit-header,.invit-footer
{
		background: #233070;
		margin: 0px;
		color: white;
		padding: 5px;
}
.invit-header
{
font-size: 20px;
text-align: center;
}
.invit-body
{
padding: 5px;

}
.invit-input
{
	width: 96%;

}
