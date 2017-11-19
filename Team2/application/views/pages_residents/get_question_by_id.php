<?php
	$servername = "localhost";//"studev.groept.be";
	$username = "root";//"a17_webapps02";
	$password = "root";//"wk9yzu0z";
	$dbname = "hci";//"a17_webapps02";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$id_question = $_GET['id_question'];
	
	if($query = $conn->prepare("SELECT Question, Type FROM hci.Questions WHERE ID_Question = ?;")){
			$query->bind_param("i", $id_question);
			$query->bind_result($question_str, $type);
			$query->execute();
			while($query->fetch()){
				$question = array(
					'question' => array(
						'question_str' => $question_str,
						'type' => $type
					)
				);
				echo $question_str;
			}
			$query->close();
	}
?>