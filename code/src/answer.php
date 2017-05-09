<?php

if(strtoupper($_SERVER["REQUEST_METHOD"]) === "POST"){

		if(!empty($_POST['question'])){
			echo "<font size = '14' color = 'red' face = 'times new roman'>ANSWER IS: </font>";
			echo "ACK" . sha1($_POST['question']);
		}
		else
			echo "GO BACK and TRY AGAIN";
}
else
	echo "NO HTTP POST METHOD; CHECK YOUR CONNECTION";

?>
