<?php
echo "<font size = '10' color = 'black'  face = 'times new roman'>";
echo  "LOGIN PORTAL FOR CS377:"; 
echo "</font>";
echo "<font size = '6' color ='red' face = 'times new roman'>";
echo "<br>*PLEASE VERFIY YOUR DREXEL UNIVERISTY ID BELOW*</br></br>";
echo "</font>";
?>

<html>
<head> 
 <link rel="stylesheet" href="spacing.css">
<meta http:equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>LOGIN Page </title>
</head>

<body>

<form action = "calculate.php" method = "post">
<label for="Drexel ID"><B>DREXEL ID:</label> <input name ="id" value ="<?php echo $_POST["student_id2"] .""; ?>" readonly="readonly"/><BR>
<label for="user"><B> USERNAME:</label>	<input name = "user" required/><BR>
<label for="password">PASSWORD:</label> <input name = "password" required/><BR>
<label for="submit">SUBMIT:</b></label> 	<input type = "submit" style ="height: 20; width: 120px" /><BR>
</form>
</body>

</html>

