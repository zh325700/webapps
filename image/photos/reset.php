<?php
define("HOST", "studev.groept.be"); 			// The host you want to connect to. 
define("USER", "a17_webapps02"); 				// The database username. 
define("PASSWORD", "wk9yzu0z"); 				// The database password.
define("DATABASE", "a17_webapps02");			// The database name.
//~ define("HOST", "localhost"); 				// The host you want to connect to. 
//~ define("USER", "root"); 					// The database username. 
//~ define("PASSWORD", "fun"); 					// The database password. Oorspronkelijk =  4Fa98xkHVd2XmnfK
//~ define("DATABASE", "hci");					// The database name.


echo "start\n"; 

$mysqli = new mysqli(HOST, USER, PASSWORD);
$dbname = DATABASE;
if ($mysqli->connect_error) {
    echo "failed to connect to server\n";
    exit();
}else{

echo "started making querrys\n"; 

$query_DataBase = (" 	CREATE DATABASE IF NOT EXISTS $dbname;
						");
$query_DropTables = (" 	
						SET FOREIGN_KEY_CHECKS=0;
						DROP TABLE IF EXISTS Answers;
						DROP TABLE IF EXISTS Questions;
						DROP TABLE IF EXISTS ActivityLink;
						DROP TABLE IF EXISTS Activity;
						DROP TABLE IF EXISTS Elder;
						DROP TABLE IF EXISTS LOG;
						DROP TABLE IF EXISTS login_attempts;
						DROP TABLE IF EXISTS Caregiver;
						DROP TABLE IF EXISTS Facility;
						SET FOREIGN_KEY_CHECKS=1;
						");

$query_Facility = ("	CREATE TABLE Facility (				ID_facility INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
															Name VARCHAR(100) NOT NULL,
															City VARCHAR(50),
															Postcode VARCHAR(10),
															Street VARCHAR(50),
															Number VARCHAR(10));");

$query_Caregiver = ("	CREATE TABLE Caregiver (			ID_Caregiver INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
															email VARCHAR(50) NOT NULL,
															password VARCHAR(128) NOT NULL,
															salt VARCHAR(128) NOT NULL,
															username VARCHAR(100) NOT NULL,
															permission tinyint(1) NOT NULL,
															ID_facility INT UNSIGNED,
															FOREIGN KEY (ID_facility) REFERENCES Facility(ID_facility));");

$query_login_attempts = ("	CREATE TABLE login_attempts (	ID_Caregiver INT UNSIGNED,
															FOREIGN KEY (ID_Caregiver) REFERENCES Caregiver(ID_Caregiver),
															time VARCHAR(30) NOT NULL);");

$query_LOG = ("	CREATE TABLE LOG (							ID_log INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
															ID_Caregiver INT UNSIGNED,
															FOREIGN KEY (ID_Caregiver) REFERENCES Caregiver(ID_Caregiver),
															Message TEXT NOT NULL);");

$query_Answers = ("	CREATE TABLE Answers (					ID_Answer INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
															ID_Question INT UNSIGNED,
															FOREIGN KEY (ID_Question) REFERENCES Questions(ID_Question),
															ID_Elder INT UNSIGNED,
															FOREIGN KEY (ID_Elder) REFERENCES Elder(ID_Elder),
															Score INT NOT NULL,
															DateStamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP);");

$query_Elder = ("	CREATE TABLE Elder(						ID_Elder INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
															ID_facility INT UNSIGNED,
															FOREIGN KEY (ID_facility) REFERENCES Facility(ID_facility),
															FirstName VARCHAR(30) NOT NULL,
															LastName VARCHAR(30) NOT NULL,
															Sex VARCHAR(1) NOT NULL,
															RoomNumber INT UNSIGNED NOT NULL,
															Birthday VARCHAR(12) NOT NULL,
															Member_Since TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
															Picture VARCHAR(30),
															FontSize INT,
															Division VARCHAR(30),
															Language VARCHAR(30) DEFAULT 'Dutch');");
															
$query_Activity = ("	CREATE TABLE Activity(				ID_Activity INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
															ID_facility INT UNSIGNED NOT NULL,
															FOREIGN KEY (ID_facility) REFERENCES Facility(ID_facility),
															Title VARCHAR(30) NOT NULL,
															Description text NOT NULL,
															Time TIMESTAMP NOT NULL
															);");
													
$query_ActivityLink = ("	CREATE TABLE ActivityLink(		ID_ActivityLink INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
															ID_Activity INT UNSIGNED NOT NULL,
															FOREIGN KEY (ID_Activity) REFERENCES Activity(ID_Activity),
															ID_Elder INT UNSIGNED NOT NULL,
															FOREIGN KEY (ID_Elder) REFERENCES Elder(ID_Elder)
															);");

$query_Questions = ("	CREATE TABLE Questions(				ID_Question INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
															Type_en VARCHAR(30) NOT NULL,
															Question_en TEXT NOT NULL,
															Type_nl VARCHAR(30),
															Question_nl TEXT);
															
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('Privacy'				, 'I can be alone when I wish.'														, 'Privacy'								, 'Ik kan alleen zijn als ik dat wil.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('Privacy'				, 'My privacy is respected when people care for me.'								, 'Privacy'								, 'Als ik zorg krijg, gebeurt dit met respect voor mijn privacy.');
						
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('FoodAndMeals'			, 'I get my favorite foods here.'													, 'HetEten'								, 'Ik krijg hier lekker eten.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('FoodAndMeals'			, 'I can eat when I want.'															, 'HetEten'								, 'Ik kan eten wanneer ik wil.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('FoodAndMeals'			, 'I have enough variety in my meals.'												, 'HetEten'								, 'Ik vind mijn maaltijden voldoende afwisselend.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('FoodAndMeals'			, 'I enjoy mealtimes.'																, 'HetEten'								, 'Ik geniet van de maaltijden.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('FoodAndMeals'			, 'Food is the right temperature when I get to eat it.'								, 'HetEten'								, 'Het eten is op de juiste temperatuur wanneer ik het krijg.');
						
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('SafetyAndSecurity'	, 'If I need help right away, I can get it.'										, 'Veiligheid'							, 'Ik kan zo nodig direct hulp krijgen.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('SafetyAndSecurity'	, 'I feel my possessions are secure.'												, 'Veiligheid'							, 'Ik denk dat mijn spullen hier veilig zijn.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('SafetyAndSecurity'	, 'I feel safe when I am alone.'													, 'Veiligheid'							, 'Ik voel me veilig alleen.');
						
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('Comfort'				, 'I get the services I need.'														, 'ZichPrettigVoelen'					, 'Ik krijg de zorg die ik nodig heb.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('Comfort'				, 'I would recommend this site or organization to others.'							, 'ZichPrettigVoelen'					, 'Ik zou dit woonzorgcentrum aan anderen aanbevelen.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('Comfort'				, 'This place feels like home to me.'												, 'ZichPrettigVoelen'					, 'Ik voel me hier thuis.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('Comfort'				, 'I can easily go outdoors if I want.'												, 'ZichPrettigVoelen'					, 'Ik kan naar buiten als ik wil.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('Comfort'				, 'I am bothered by the noise here'													, 'ZichPrettigVoelen'					, 'Ik heb last van lawaai hier.');
						
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('Autonomy'				, 'I can have a bath or shower as often as I want.'									, 'DagelijksKiezen'						, 'Ik kan zo vaak in bad of douchen als ik wil.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('Autonomy'				, 'I decide when to get up.'														, 'DagelijksKiezen'						, 'Ik bepaal zelf wanneer ik opsta.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('Autonomy'				, 'I decide when to go to bed.'														, 'DagelijksKiezen'						, 'ik bepaal zelf wanneer ik naar bed ga.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('Autonomy'				, 'I can go where I want on the “spur of the moment.”'								, 'DagelijksKiezen'						, 'Ik kan gaan en staan waar en wanneer ik wil.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('Autonomy'				, 'I control who comes into my room.'												, 'DagelijksKiezen'						, 'Ik bepaal wie er in mijn kamer komt.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('Autonomy'				, 'I decide which clothes to wear.'													, 'DagelijksKiezen'						, 'Ik kies zelf welke kleding ik aandoe.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('Autonomy'				, 'I decide how to spend my time.'													, 'DagelijksKiezen'						, 'Ik beslis zelf hoe ik mijn tijd doorbreng.');
						
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('RespectByStaff'		, 'I am treated with respect by staff.'												, 'Respect'								, 'Medewerkers die me verzorgen en helpen laten me in mijn waarde.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('RespectByStaff'		, 'Staff pay attention to me.'														, 'Respect'								, 'Medewerkers hebben aandacht voor me.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('RespectByStaff'		, 'I can express my opinion without fear of consequences.'							, 'Respect'								, 'Ik kan zonder bang te zijn mijn mening geven.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('RespectByStaff'		, 'Staff respect what I like and dislike.'											, 'Respect'								, 'Medewerkers respecteren waar ik van houd of een hekel aan heb.');
						
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('StaffResponsiveness'	, 'The care and support I get help me live my life the way I want.'					, 'ReagerenDoorMedewerkresOpVragen'		, 'De zorg en steun die ik krijg helpen me te leven zoals ik wil.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('StaffResponsiveness'	, 'Staff respond quickly when I ask for assistance.'								, 'ReagerenDoorMedewerkresOpVragen'		, 'Medewerkers reageren snel als ik om hulp vraag.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('StaffResponsiveness'	, 'The staff respond to my suggestions.'											, 'ReagerenDoorMedewerkresOpVragen'		, 'Medewerkers reageren op mijn suggesties.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('StaffResponsiveness'	, 'I get the health services I need.'												, 'ReagerenDoorMedewerkresOpVragen'		, 'Ik kan de benodigde hulp voor mijn gezondheid krijgen.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('StaffResponsiveness'	, 'Staff have enough time for me.'													, 'ReagerenDoorMedewerkresOpVragen'		, 'Medewerkers hebben genoeg tijd voor me.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('StaffResponsiveness'	, 'Staff know what they are doing.'													, 'ReagerenDoorMedewerkresOpVragen'		, 'Medewerkers weten wat ze doen.');
						
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('StaffResidentBonding'	, 'Some of the staff know the story of my life.'									, 'EenBandVoelenMetWieHierWerkt'		, 'Er zijn medewerkers die mijn levensverhaal kennen.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('StaffResidentBonding'	, 'I consider a staff member my friend.'											, 'EenBandVoelenMetWieHierWerkt'		, 'Ik voel me bevriend met iemand die hier werkt. ');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('StaffResidentBonding'	, 'Staff take the time to have a friendly conversation with me.'					, 'EenBandVoelenMetWieHierWerkt'		, 'Medewerkers nemen de tijd voor een vriendelijk praatje met me.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('StaffResidentBonding'	, 'Staff ask how my needs can be met.'												, 'EenBandVoelenMetWieHierWerkt'		, 'Medewerkers vragen me wat ze voor me kunnen doen.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('StaffResidentBonding'	, '.I have the same nurse assistant on most weekdays.'								, 'EenBandVoelenMetWieHierWerkt'		, 'Ik heb tijdens de week op de meeste dagen dezelfde verzorgende.');
						
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('Activities'			, 'I have enjoyable things to do here on weekends.'									, 'Activiteiten'						, 'Ik heb hier in het weekend leuke dingen te doen.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('Activities'			, 'I participate in meaningful activities.'											, 'Activiteiten'						, 'Ik nam de afgelopen week deel aan zinvolle activiteiten.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('Activities'			, 'If I want, I can participate in religious activities that have meaning to me.'	, 'Activiteiten'						, 'Als ik wil kan ik aan voor mij belangrijke religieuze activiteiten deelnemen.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('Activities'			, 'I have opportunities to spend time with other like-minded residents.'			, 'Activiteiten'						, 'Ik kan met gelijkgestemde bewoners tijd doorbrengen.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('Activities'			, 'I have the opportunity to explore new skills and interests.'						, 'Activiteiten'						, 'Ik kan me in nieuwe dingen en interesses verdiepen.');
						
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('PersonalRelationships', 'Another resident here is my close friend.'										, 'PersoonlijkeOmgang'					, 'Er is een bewoner die een goede vriend/vriendin van me is.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('PersonalRelationships', 'People ask for my help or advice.'												, 'PersoonlijkeOmgang'					, 'Mensen vragen me om hulp of om raad.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('PersonalRelationships', 'I have opportunities for affection or romance.'									, 'PersoonlijkeOmgang'					, 'Ik heb mogenlijkheden tot genegenheid of romantiek.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('PersonalRelationships', 'It is easy to make friends here.'												, 'PersoonlijkeOmgang'					, 'Je kunt hier gemakkelijk vrienden maken.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('PersonalRelationships', 'I have people who want to do things together with me.'							, 'PersoonlijkeOmgang'					, 'Ik heb mensen die samen met mij dingen willen doen.');
						
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('InformationOfTheHome', 'I get information about the inhabitants of the home.'								, 'InformatieVanuitHetWoonzorgcentrum'	, 'Ik krijg informatie over de leefgewoonten in het woonzorgcentrum.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('InformationOfTheHome', 'I get information about the care that I can receive.'								, 'InformatieVanuitHetWoonzorgcentrum'	, 'Ik krijg informatie over de zorg die ik hier krijg of kan krijgen.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('InformationOfTheHome', 'I get information about the activities that I can participate in.'				, 'InformatieVanuitHetWoonzorgcentrum'	, 'Ik krijg informatie over de activiteiten die ik hier kan doen.');
						INSERT INTO Questions(Type_en, Question_en, Type_nl, Question_nl) VALUES('InformationOfTheHome', 'I can talk to a caregiver about what I want when I die.'							, 'InformatieVanuitHetWoonzorgcentrum'	, 'Ik kan met een medewerker praten over wat ik graag wil op het einde van het leven.');
						");
						
$query_TestData = ("	INSERT INTO Facility(Name, City, Postcode, Street, Number) VALUES('Edouard Remy', 'Leuven', '3000', 'Andreas Vesaliusstraat', '10');
						
						INSERT INTO Caregiver(email, password, salt, username, permission, ID_facility) VALUES('remy1@leuven.be', 'c3d48e73883fe272b125919bd0bed9e459e11f5ee7d38d5359f7a3d67ecff293a4b348153be6ad29309994d0322b4f9b889b262c1e87eaf87750b655502b922e', '4aa49ad51ef623ce845c1c3e6046850beb5741a641a9ccf9b54ba06f94b30c531745954ee87846f9133aa69fb906f858bd041c2984ee711ad886a8d4ada72e0d', 'Remy', '1', '1');
						INSERT INTO Caregiver(email, password, salt, username, permission, ID_facility) VALUES('remy3@leuven.be', 'c3d48e73883fe272b125919bd0bed9e459e11f5ee7d38d5359f7a3d67ecff293a4b348153be6ad29309994d0322b4f9b889b262c1e87eaf87750b655502b922e', '4aa49ad51ef623ce845c1c3e6046850beb5741a641a9ccf9b54ba06f94b30c531745954ee87846f9133aa69fb906f858bd041c2984ee711ad886a8d4ada72e0d', 'Remy', '3', '1');
						
						INSERT INTO Elder(ID_Facility, FirstName, LastName, Sex, RoomNumber, Birthday, division, Picture) VALUES('1', 'Marie'		, 'Nagels'		, 'F', '102', '14/09/1944', '1', 'marienagels.png');
						INSERT INTO Elder(ID_Facility, FirstName, LastName, Sex, RoomNumber, Birthday, division, Picture) VALUES('1', 'Jose'		, 'Tielemans'	, 'F', '308', '06/06/1959', '3', 'josetielemans.png');
						INSERT INTO Elder(ID_Facility, FirstName, LastName, Sex, RoomNumber, Birthday, division, Picture) VALUES('1', 'Juliet'		, 'Helem'		, 'F', '238', '21/04/1935', '2', 'juliethelem.png');
						INSERT INTO Elder(ID_Facility, FirstName, LastName, Sex, RoomNumber, Birthday, division, Picture) VALUES('1', 'Antoinette'	, 'Marien'		, 'F', '225', '15/11/1945', '2', 'antoinettemarien.png');
						INSERT INTO Elder(ID_Facility, FirstName, LastName, Sex, RoomNumber, Birthday, division, Picture) VALUES('1', 'Clementine'	, 'Jansens'		, 'F', '007', '16/03/1932', '0', 'clementinejansens.png');
						INSERT INTO Elder(ID_Facility, FirstName, LastName, Sex, RoomNumber, Birthday, division, Picture) VALUES('1', 'Georgette'	, 'Peters'		, 'F', '063', '25/08/1922', '0', 'georgettepeters.png');
						INSERT INTO Elder(ID_Facility, FirstName, LastName, Sex, RoomNumber, Birthday, division, Picture) VALUES('1', 'Ivette'		, 'De Putter'	, 'F', '322', '14/07/1922', '3', 'ivettedeputter.png');
						INSERT INTO Elder(ID_Facility, FirstName, LastName, Sex, RoomNumber, Birthday, division, Picture) VALUES('1', 'Lutgarde'	, 'Klechtermans', 'F', '234', '09/12/1943', '2', 'lutgardeklechtermans.png');
						
						INSERT INTO Elder(ID_Facility, FirstName, LastName, Sex, RoomNumber, Birthday, division, Picture) VALUES('1', 'Joske'		, 'Nagels'		, 'M', '325', '01/12/1923', '3', 'joskenagels.png');
						INSERT INTO Elder(ID_Facility, FirstName, LastName, Sex, RoomNumber, Birthday, division, Picture) VALUES('1', 'Pol'			, 'Tielemans'	, 'M', '008', '05/01/1947', '0', 'poltielemans.png');
						INSERT INTO Elder(ID_Facility, FirstName, LastName, Sex, RoomNumber, Birthday, division, Picture) VALUES('1', 'Louis'		, 'Helem'		, 'M', '212', '20/11/1935', '2', 'louishelem.png');
						INSERT INTO Elder(ID_Facility, FirstName, LastName, Sex, RoomNumber, Birthday, division, Picture) VALUES('1', 'Willie'		, 'Marien'		, 'M', '123', '14/10/1958', '1', 'williemarien.png');
						INSERT INTO Elder(ID_Facility, FirstName, LastName, Sex, RoomNumber, Birthday, division, Picture) VALUES('1', 'Jose'		, 'Jansens'		, 'M', '213', '24/04/1949', '2', 'josejansens.png');
						INSERT INTO Elder(ID_Facility, FirstName, LastName, Sex, RoomNumber, Birthday, division, Picture) VALUES('1', 'Frank'		, 'Peters'		, 'M', '389', '13/09/1945', '3', 'frankpeters.png');
						INSERT INTO Elder(ID_Facility, FirstName, LastName, Sex, RoomNumber, Birthday, division, Picture) VALUES('1', 'Maurice'		, 'De Putter'	, 'M', '364', '21/06/1964', '3', 'mauricedeputter.png');
						INSERT INTO Elder(ID_Facility, FirstName, LastName, Sex, RoomNumber, Birthday, division, Picture) VALUES('1', 'Frans'		, 'Klechtermans', 'M', '057', '02/07/1915', '0', 'fransklechtermans.png');
						
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('5'	, '2'	, '3');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('6'	, '4'	, '5');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('34'	, '1'	, '1');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('5'	, '9'	, '3');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('30'	, '8'	, '5');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('20'	, '8'	, '1');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('15'	, '8'	, '3');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('16'	, '8'	, '5');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('4'	, '7'	, '1');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('25'	, '7'	, '3');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('3'	, '7'	, '5');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('2'	, '7'	, '1');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('12'	, '3'	, '3');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('9'	, '3'	, '5');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('3'	, '3'	, '1');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('7'	, '3'	, '3');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('8'	, '3'	, '5');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('4'	, '11'	, '1');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('6'	, '11'	, '3');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('12'	, '11'	, '5');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('24'	, '11'	, '1');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('11'	, '6'	, '3');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('16'	, '6'	, '5');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('14'	, '6'	, '1');
						INSERT INTO Answers(ID_Question, ID_Elder, Score) VALUES('15'	, '6'	, '1');
						
						INSERT INTO Activity(ID_facility, Title, Description, Time) VALUES('1', 'BingoNight', 'We spelen bingo tot we er bij neervallen!', '2018-02-14 20:00:00');
						INSERT INTO Activity(ID_facility, Title, Description, Time) VALUES('1', 'Kaartspel', 'Verscheidenen kaartspelen ter uwer beschikking.', '2018-02-22 13:00:00');
						INSERT INTO Activity(ID_facility, Title, Description, Time) VALUES('1', 'Wandelen', 'Korte wandelling door Leuven.', '2018-02-08 10:00:00');
						INSERT INTO Activity(ID_facility, Title, Description, Time) VALUES('1', 'Nachtmis', 'Om middernacht gaan we naar de kerk.', '2018-02-16 23:59:59');
						INSERT INTO Activity(ID_facility, Title, Description, Time) VALUES('1', 'Kerkbezoek', 'We kijken achter de schermen naar hoe een kerk werkt.', '2018-02-28 16:00:00');
						INSERT INTO Activity(ID_facility, Title, Description, Time) VALUES('1', 'Aqua gym', 'We doen onze energie op in leuke water activiteiten.', '2018-02-01 15:00:00');
						
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('1', '1');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('1', '12');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('1', '13');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('1', '4');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('1', '15');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('1', '6');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('1', '7');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('1', '8');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('2', '9');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('2', '10');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('2', '11');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('2', '5');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('2', '4');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('2', '6');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('2', '15');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('3', '16');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('3', '8');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('3', '13');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('3', '5');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('3', '1');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('3', '3');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('3', '12');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('3', '16');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('4', '1');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('4', '12');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('4', '13');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('4', '4');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('4', '15');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('4', '6');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('4', '7');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('4', '8');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('5', '9');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('5', '10');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('5', '11');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('5', '5');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('5', '4');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('5', '6');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('5', '15');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('6', '16');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('6', '8');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('6', '13');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('6', '5');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('6', '1');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('6', '3');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('6', '12');
						INSERT INTO ActivityLink(ID_Activity, ID_Elder) VALUES('6', '16');
						
						");

echo "running querrys\n";	

$result = mysqli_multi_query($mysqli, $query_DataBase);
	if ( false===$result ){printf("error making database: %s\n", mysqli_error($mysqli));}

$result = mysqli_select_db($mysqli, $dbname);
	if ( false===$result ){printf("error selecting database: %s\n", mysqli_error($mysqli));}

$result = mysqli_multi_query($mysqli, $query_DropTables);
	while(mysqli_next_result($mysqli)){;}
	if ( false===$result ){printf("error dropping tables: %s\n", mysqli_error($mysqli));}

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

$result = mysqli_multi_query($mysqli, $query_Elder);
	while(mysqli_next_result($mysqli)){;}
	if ( false===$result ){printf("error making Elder: %s\n", mysqli_error($mysqli));}

$result = mysqli_multi_query($mysqli, $query_Activity);
	while(mysqli_next_result($mysqli)){;}
	if ( false===$result ){printf("error making Activity: %s\n", mysqli_error($mysqli));}

$result = mysqli_multi_query($mysqli, $query_ActivityLink);
	while(mysqli_next_result($mysqli)){;}
	if ( false===$result ){printf("error making ActivityLink: %s\n", mysqli_error($mysqli));}

$result = mysqli_multi_query($mysqli, $query_Questions);
	while(mysqli_next_result($mysqli)){;}
	if ( false===$result ){printf("error making Questions: %s\n", mysqli_error($mysqli));}

$result = mysqli_multi_query($mysqli, $query_Answers);
	while(mysqli_next_result($mysqli)){;}
	if ( false===$result ){printf("error making Answers: %s\n", mysqli_error($mysqli));}

$result = mysqli_multi_query($mysqli, $query_TestData);
	while(mysqli_next_result($mysqli)){;}
	if ( false===$result ){printf("error making TestData: %s\n", mysqli_error($mysqli));}

echo "closing connection\n";
mysqli_close($mysqli);

echo "end of script\n";

}
