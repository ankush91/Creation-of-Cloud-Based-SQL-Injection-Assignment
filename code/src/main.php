
<?php
///WELCOME STATEMENT
echo "<font size = '18' color = 'white'  face = 'Arial'>";
echo  "-----------WELCOME--------- </br></br>";
$picture ="background";
//echo ":Your Basic VM Set Up is Complete, Please Wait for Further Instructions ";
echo "</font>";
?>

<?php
//HTML FORM TO TAKE IN COURSE NO VIA HTTP POST METHOD
?>

<html>
<head> 
<link rel="stylesheet" href="hyperlink.css">
<style type="text/css">
	body{
		background-image: url('<?php echo $picture;?>');
		background-size: cover;
		background-repeat: no-repeat;
	}

</style>
		
<meta http:equiv="Content-Type" content="text/html; charset=utf-8"/>

<script type="text/javascript">

function show(value_id){

if (value_id==""){
alert("STUDENT ID MUST BE INSERTED TO PROGRESS!");
}
else{
document.getElementById("f1").style.display="none";
document.getElementById("f2").style.display="block";
document.getElementById("f3").style.display="block";
document.getElementById("student_id1").value = value_id;
document.getElementById("student_id2").value = value_id;
}
}
</script>


<title> Main Page </title>
</head>

<body>

<font  size = "12" color = "white" face = "Arial">

<form id ="f1">
DREXEL STUDENT ID: <input type = "number" name = "student_id" style="width: 450;"  placeholder="ENTER YOUR DREXEL UNIVERSITY STUDENT ID HERE" required/><BR>
PRESS SUBMIT TO ENTER YOUR ASSIGNMENT PAGE:	<button type="button" onclick="show(this.form.student_id.value);"style="width: 300;">ENTER</button>
</form>

<form id ="f2" action = "retrieve.php" method = "post" style="display: none;">
<!--INPUT TYPE TEXT-->
<input type="hidden" name="student_id1" id="student_id1" readonly required/><BR>
COURSE NO : CS <input type = "text" name = "course_no" style ="width: 750px" /><BR>
PRESS SUBMIT TO OBTAIN COURSE LOCATION: <input type = "submit" style ="height: 40px; width: 120px" /><BR>
</form>

<hr>
<form id ="f3" action = "login.php" method = "post" style="display: none;">
<input type="hidden" name="student_id2" id="student_id2" readonly required/><BR>
<button type="submit" name="login" value="login" class="btn-link">LOGIN</button>
</font>
</body>

</html>
