<?php
include_once 'psl-config.php';

$mysqli = new mysqli(HOST, USER, PASSWORD);
if ($mysqli->connect_error) {
    header("Location: ../error.php?err=Unable to connect to MySQL");
    exit();
}

$query_DataBase = (" CREATE DATABASE IF NOT EXISTS $dbname;");
$query_Facility = ("	DROP TABLE IF EXISTS Facility;
						CREATE TABLE Facility (ID_facility INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
												Name VARCHAR(100) NOT NULL,
												City VARCHAR(50),
												Postcode VARCHAR(10),
												Street VARCHAR(50),
												Number VARCHAR(10));");
$query_Caregiver = ("	DROP TABLE IF EXISTS Caregiver;
						CREATE TABLE Caregiver (ID_Caregiver INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
												email VARCHAR(50) NOT NULL,
												password VARCHAR(128) NOT NULL,
												salt VARCHAR(128) NOT NULL,
												username VARCHAR(100) NOT NULL,
												permission tinyint(1) NOT NULL,
												ID_facility INT UNSIGNED NOT NULL);");
$query_login_attempts = ("	DROP TABLE IF EXISTS login_attempts;
							CREATE TABLE login_attempts (ID_Caregiver INT UNSIGNED NOT NULL,
														time VARCHAR(30) NOT NULL);");
$query_LOG = ("	DROP TABLE IF EXISTS LOG;
				CREATE TABLE LOG (ID_log INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
									ID_Caregiver INT UNSIGNED NOT NULL,
												Message TEXT NOT NULL);");
$query_Answers = ("	DROP TABLE IF EXISTS Answers;
					CREATE TABLE Answers (ID_Answer INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
											ID_Question INT UNSIGNED NOT NULL,
											ID_Elder INT UNSIGNED NOT NULL,
											Score INT NOT NULL,
											DateStamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP);");
$query_Elder = ("	DROP TABLE IF EXISTS Elder;
					CREATE TABLE Elder(	ID_Elder INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
										ID_Facility INT UNSIGNED NOT NULL,
										FirstName VARCHAR(30) NOT NULL,
										LastName VARCHAR(30) NOT NULL,
										Sex VARCHAR(1) NOT NULL,
										RoomNumber INT UNSIGNED NOT NULL,
										Birthday DATE NOT NULL,
										Member_Since TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
										Picture VARCHAR(30),
										division VARCHAR(30));");
$query_Questions = ("	DROP TABLE IF EXISTS Questions;
						CREATE TABLE Questions(	ID_Question INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
												Type_en VARCHAR(30) NOT NULL,
												Question_en TEXT NOT NULL,
												Type_nl VARCHAR(30),
												Question_nl TEXT);
						INSERT INTO Questions(Type_en, Question_en) VALUES('Privacy', 'I can be alone when I wish.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Privacy', 'My privacy is respected when people care for me.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Food and Meals', 'I get my favorite foods here.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Food and Meals', 'I can eat when I want.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Food and Meals', 'I have enough variety in my meals.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Food and Meals', 'I enjoy mealtimes.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Food and Meals', 'Food is the right temperature when I get to eat it.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Safety and Security', 'If I need help right away, I can get it.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Safety and Security', 'I feel my possessions are secure.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Safety and Security', 'I feel safe when I am alone.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Comfort', 'I get the services I need.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Comfort', 'I would recommend this site or organization to others.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Comfort', 'This place feels like home to me.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Comfort', 'I can easily go outdoors if I want.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Comfort', 'I am bothered by the noise here');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Autonomy', 'I can have a bath or shower as often as I want.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Autonomy', 'I decide when to get up.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Autonomy', 'I decide when to go to bed.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Autonomy', 'I can go where I want on the “spur of the moment.”');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Autonomy', 'I control who comes into my room.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Autonomy', 'I decide which clothes to wear.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Autonomy', 'I decide how to spend my time.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Respect by Staff', 'I am treated with respect by staff.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Respect by Staff', 'Staff pay attention to me.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Respect by Staff', 'I can express my opinion without fear of consequences.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Respect by Staff', 'Staff respect what I like and dislike.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Staff Responsiveness', 'The care and support I get help me live my life the way I want.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Staff Responsiveness', 'Staff respond quickly when I ask for assistance.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Staff Responsiveness', 'The staff respond to my suggestions.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Staff Responsiveness', 'I get the health services I need.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Staff Responsiveness', 'Staff have enough time for me.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Staff Responsiveness', 'Staff know what they are doing.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Staff Responsiveness', 'My services are delivered when I want them.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Staff-Resident Bonding', 'Some of the staff know the story of my life.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Staff-Resident Bonding', 'I consider a staff member my friend.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Staff-Resident Bonding', 'I have a special relationship with a staff member.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Staff-Resident Bonding', 'Staff take the time to have a friendly conversation with me.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Staff-Resident Bonding', 'Staff ask how my needs can be met.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Staff-Resident Bonding', '.I have the same nurse assistant on most weekdays.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Activities', 'I have enjoyable things to do here on weekends.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Activities', 'I have enjoyable things to do here in the evenings.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Activities', 'I participate in meaningful activities.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Activities', 'If I want, I can participate in religious activities that have meaning to me.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Activities', 'I have opportunities to spend time with other like-minded residents.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Activities', 'I have the opportunity to explore new skills and interests.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Personal Relationships', 'Another resident here is my close friend.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Personal Relationships', 'People ask for my help or advice.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Personal Relationships', 'I have opportunities for affection or romance.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Personal Relationships', 'It is easy to make friends here.');
						INSERT INTO Questions(Type_en, Question_en) VALUES('Personal Relationships', 'I have people who want to do things together with me.');");
						
$query_TestData = ("	INSERT INTO Facility(Name, City, Postcode, Street, Number) VALUES('Remy', 'Leuven', '3000', 'Blijde inkomststraat', '5 ofzo');
						INSERT INTO Caregiver(email, password, salt, username, permission, ID_facility) VALUES('remy@leuven.be', 'c3d48e73883fe272b125919bd0bed9e459e11f5ee7d38d5359f7a3d67ecff293a4b348153be6ad29309994d0322b4f9b889b262c1e87eaf87750b655502b922e', '4aa49ad51ef623ce845c1c3e6046850beb5741a641a9ccf9b54ba06f94b30c531745954ee87846f9133aa69fb906f858bd041c2984ee711ad886a8d4ada72e0d', 'Remy', '1', '1');
						INSERT INTO Elder(ID_Facility, FirstName, LastName, Sex, RoomNumber, Birthday, division) VALUES('1', 'Marie', 'Nagels', 'F', '225', '1995-09-04', 'paveljoen');
						INSERT INTO Elder(ID_Facility, FirstName, LastName, Sex, RoomNumber, Birthday, division) VALUES('1', 'Joske', 'Tielemans', 'M', '325', '1923-04-21', 'paveljoen');
						INSERT INTO Elder(ID_Facility, FirstName, LastName, Sex, RoomNumber, Birthday, division) VALUES('1', 'Willie', 'Marien', 'M', '112', '1964-02-17', 'paveljoen');
						INSERT INTO Elder(ID_Facility, FirstName, LastName, Sex, RoomNumber, Birthday, division) VALUES('1', 'Lore', 'Donneeeee', 'F', '143', '1995-05-20', 'paveljoen');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('5', '2', '3');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('36', '4', '5');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('24', '1', '1');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('49', '4', '1');");

$result = mysqli_query($mysqli, $query_DataBase);
	if ( false===$result ){printf("error making database: %s\n", mysqli_error($mysqli));}
$result = mysqli_select_db($mysqli, $dbname);
	if ( false===$result ){printf("error selecting database: %s\n", mysqli_error($mysqli));}
$result = mysqli_multi_query($mysqli, $query_Facility);
	while(mysqli_next_result($mysqli)){;}
	if ( false===$result ){printf("error making Facility: %s\n", mysqli_error($mysqli));}
$result = mysqli_multi_query($mysqli, $query_Caregiver);
	while(mysqli_next_result($mysqli)){;}
	if ( false===$result ){printf("error making Caregiver: %s\n", mysqli_error($mysqli));}
$result = mysqli_multi_query($mysqli, $query_login_attempts);
	while(mysqli_next_result($mysqli)){;}
	if ( false===$result ){printf("error making login_attempts: %s\n", mysqli_error($mysqli));}
$result = mysqli_multi_query($mysqli, $query_LOG);
	while(mysqli_next_result($mysqli)){;}
	if ( false===$result ){printf("error making LOG: %s\n", mysqli_error($mysqli));}
$result = mysqli_multi_query($mysqli, $query_Answers);
	while(mysqli_next_result($mysqli)){;}
	if ( false===$result ){printf("error making Answers: %s\n", mysqli_error($mysqli));}
$result = mysqli_multi_query($mysqli, $query_Elder);
	while(mysqli_next_result($mysqli)){;}
	if ( false===$result ){printf("error making Elder: %s\n", mysqli_error($mysqli));}
$result = mysqli_multi_query($mysqli, $query_Questions);
	while(mysqli_next_result($mysqli)){;}
	if ( false===$result ){printf("error making Questions: %s\n", mysqli_error($mysqli));}
$result = mysqli_multi_query($mysqli, $query_TestData);
	while(mysqli_next_result($mysqli)){;}
	if ( false===$result ){printf("error making TestData: %s\n", mysqli_error($mysqli));}

mysqli_close($mysqli);

