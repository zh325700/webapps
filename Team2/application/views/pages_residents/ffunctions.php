<?php
	include_once 'db_connect.php';
	
	function getQuestionOnId(){
            $id_question = "10";
		global $mysqli;
		global $dbname;
		
		if($query = $mysqli->prepare("SELECT Question, Type FROM $dbname.Questions WHERE ID_Question = ?;")){
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
	}

//getQuestionOnId('4');
