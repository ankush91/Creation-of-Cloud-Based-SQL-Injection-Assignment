
                                                                                             
<?php

//DB CONNECTION
$servername = "localhost";
$username = "client";
$password = "cs377@Client";
$dbname = "";

//CHECK IF POST METHOD HAS BEEN CALLED
if(strtoupper($_SERVER["REQUEST_METHOD"]) == "POST"){

	//CHECK IF ID IS NOT EMPTY
	if(!empty($_POST['student_id1'])){
		$dbname = "Application" . $_POST['student_id1'];
		}
	else
		echo "YOUR STUDENT ID IS EMPTY; PLEASE GO BACK AND ENTER THE CORRECT STUDENT ID <BR>";
}
else
	echo "NO HTTP POST RECEIVED; CHECK YOUR CONNECTION";

//CREATE CONNECTION
$conn = new mysqli($servername, $username, $password, $dbname);

//CHECK CONNECTION

if ($conn->connect_error){

         die("Connection failed:" . $conn->connect_error . ":	PLEASE ENTER A VALID STUDENT ID");
}

//CHECK IF METHOD POST IS RECEIVED
if(strtoupper($_SERVER["REQUEST_METHOD"]) === "POST"){

	//CHECK FOR COURSE NO.
	if(!empty($_POST['course_no'])){
		
		//-->if(is_numeric($_POST['course_no'])){

			//EXECUTE QUERY

			$course = $_POST['course_no'];
			$query = "SELECT * FROM RoomAssignments WHERE Course = $course";		
		
			//CHECK FOR ERRONEOUS RESULT
			if(!mysqli_multi_query($conn, $query)){
			
				die('Invalid query: ' .mysql_error());
			}
			

			//PRINT OUTPUT
			else{

			    if($result = mysqli_store_result($conn) ){

				$row = mysqli_fetch_row($result);
				echo "<table border = 1>";
				echo "<tr>";

				echo "<th>COURSE NUMBER</th>";
				echo "<th>COURSE ROOM LOCATION</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>CS " . $row[0] . "</td>";
                		echo "<td>" . $row[1] . "</td>";
				echo "</tr>";

				echo "</table><br><br>";
				if(mysqli_more_results($conn) && mysqli_next_result($conn))
					echo "THERE IS MORE THAN 1 RESULT RETURNED: YOUR SQL UPDATE MIGHT HAVE BEEN SUCCESSFUL HERE";
				}
			     else
				echo "NO SUCH COURSE EXISTS IN THE DATABASE!";
			}
		//}
		//else
			//echo "NO SQL INJECTION SMARTY!"; 
	}
	else
		echo "NOTHING TO PROCESS!";
}
else
	echo "NO HTTP POST METHOD RECEIVED, CHECK YOUR CONNECTION/CODE";

mysqli_close($conn);
?>





