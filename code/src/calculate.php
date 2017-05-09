<?php

//CONFIGURATION PARAMETERS
$servername = "localhost";
$username = "client";
$password = "cs377@Client";
$dbname = "";

//CHECK IF POST METHOD HAS BEEN CALLED
if(strtoupper($_SERVER["REQUEST_METHOD"]) == "POST"){

	//CHECK IF ID IS NOT EMPTY
	if(!empty($_POST['id'])){
		$dbname = "Application" . $_POST['id'];
		}
	else
		echo "YOUR STUDENT ID IS EMPTY; PLEASE GO BACK AND ENTER THE CORRECT STUDENT ID<BR>";	
}
else
	echo "NO HTTP POST RECEIVED; CHECK YOUR CONNECTION";
		

//CREATE CONNECTION
$conn = new mysqli($servername, $username, $password, $dbname);

//CHECK CONNECTION

if ($conn->connect_error){

         die("Connection failed:" . $conn->connect_error . ":	PLEASE ENTER A VALID STUDENT ID");
}

//CHECK IF POST METHOD HAS BEEN CALLED
if(strtoupper($_SERVER["REQUEST_METHOD"]) === "POST"){

	//CHECK IS USER FIELD IS NOT EMPTY
        if(!empty($_POST['user'])){

                        $user = $_POST['user'];
                        $query = "SELECT * FROM Users WHERE user = '$user'";
                        $result = mysqli_query($conn, $query);

			//QUERY IS INVALID: INTERNAL CODE ERROR
                        if(!$result){

                                die('Invalid query: ' .mysql_error());
                        }

			//QUERY EXECUTED
                        else{
				//USERNAME IS CORRECT
                            	if(mysqli_num_rows($result) > 0){

                                $row = mysqli_fetch_array($result);

				$password = $_POST['password'];

				//PASSWORD IS CORRECT
                                	if($row['user'] == $user && $row['password'] == sha1($password)){
						echo "<font size = '10' color = 'black'  face = 'times new roman'>";
						echo "WELCOME USER 'ME', YOU CAN PASTE YOUR QUESTION IN THE BOX!<br><br>";
						echo "</font>";
						//SUBMIT FORM
						echo "<html>";
						echo "<head>";
						echo "<link rel='stylesheet' href='spacing.css'><meta http:equiv='Content-Type' content='text/html; charset=utf-8'/>";

						echo "<body>";
						echo "<form action='answer.php' method='post'>";
						echo "	<label for='question'><B>QUESTION:</label>  <input name = 'question' size = 100/><BR>";
					        echo "  <label for='submit'><B>ENTER:</label>	<input type = 'submit' style ='height: 20; width: 120px' /><BR>";
						echo "</form>";
						echo "</body></html>";
					}

				//PASSWORD IS INCORRECT
                                	else
                                        	echo "PASSWORD INCORRECT PLEASE GO BACK AND TRY AGAIN";
                           	}

				//USERNAME IS INCORRECT
				else
					echo "USERNAME IS INCORRECT";
                           }

        	}
        else  //USERNAME IS EMPTY 
                echo "YOUR USERNAME IS EMPTY; PLEASE GO BACK AND TYPE THE CORRECT USERNAME";
}
//NO HTTP POST
else
        echo "NO HTTP POST RECEIVED : CHECK YOUR CONNECTION";

?>



