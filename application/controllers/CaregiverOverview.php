<?php
    //This class is made as controller of the view page of the caregivers
    class CaregiverOverview extends CI_Controller{
	
        /* 
         *Fuction:action that will be called as the general button is clicked
         *Output:the parsed Tab_template with the data provided.   */
        public function eventGeneral(){
            //load in the models
            $this->load->model('Language_model');
            $this->load->model('Overview_Model');
            //Asking the data from the database-model for this controller
            $results=$this->Overview_Model->getScores($this->session->userdata('language'));
            $row['scores']=$results["avg_scores"];
            $results2=$this->Overview_Model->getElderScore();
            $row['elder']=$results2["avg_scores"];
            //Let the model do a conversion of the score from int to a image(smiley)
            $row['scores']=$this->Overview_Model->convert($row['scores']);
            $row['elder']=$this->Overview_Model->convert($row['elder']);
            //construct the array of data for parsing
            $data= array(
                //asks the right langauge values for the text
                "Division"=>"",
                "text"=>$this->Language_model->getData($this->session->userdata('language'),'general',-1),
                //parse the data from the databases into the right templates
                "content_qes"=>$this->parser->parse('pages_caregiver/Question_score',$row,TRUE),
                "content_res"=>$this->parser->parse('pages_caregiver/Elder_Score',$row,TRUE));
            $this->parser->parse('pages_caregiver/Tab_template',$data);
        }
        
        /*
         * Function: The action that will happen when the division button is pressed:
         *          showing the score of that division
         * Input:division: the division of which the scores are asked
         * Output: A parsed template with the data provided
         */
        public function eventDivision(){
            //loading in the input and the models
            $this->load->model('Language_model');
            $division=$this->input->get('division');
            $this->load->model('Overview_Model');
            //asking the data from the databasemodel
            $results=$this->Overview_Model->getQuestionScoreDivision($division,$this->session->userdata('language'));
            $row['scores']=$results["avg_scores"];
            $results2=$this->Overview_Model->getElderScoreDivision($division);
            $row['elder']=$results2["avg_scores"];
            //asks the model to change the int scores into images
            $row['scores']=$this->Overview_Model->convert($row['scores']);
            $row['elder']=$this->Overview_Model->convert($row['elder']);
            //prepare the data array for the parsing
            $data= array(
                //put the right link for the language placeholders
                "Division"=>$division,
                "text"=>$this->Language_model->getData($this->session->userdata('language'),'overdiv',-1),
                //parse the data from the databasemodel into the templates
                "content_qes"=>$this->parser->parse('pages_caregiver/Question_score',$row,TRUE),
                "content_res"=>$this->parser->parse('pages_caregiver/Elder_Score',$row,TRUE));
            $this->parser->parse('pages_caregiver/Tab_template',$data);
        }
        
        /*
         * Function: the action that will happen when the fill-in time of a division is asked
         * Input:division: the division of which the data will be asked
         * Output:The parsed tabtemplate with the data
         */
        public function eventTime(){
            //loading in the needed models and input variables
            $division=$this->input->get('division');
            $this->load->model('Language_model');
            $this->load->model('Overview_Model');
            //asked the data from the datbasemodel
            $results=$this->Overview_Model->getTimestampElders($division);
            $row['elder']=$results['timestamps'];
            //prepare the array for parsing
            $data= array(
                "Division"=>$division,
                "text"=>$this->Language_model->getData($this->session->userdata('language'),'overtime',-1),
                //parses the separete data into the different tabpanels
                "content_res"=>$this->parser->parse('pages_caregiver/Time_Score_temp',$row,TRUE));
            $this->parser->parse('pages_caregiver/Tab_time_template', $data);
            
        }
        
        /*
         * Function: loads the different divisions from one facility into a dropdown menu
         * Input: facility ID
         * Output: The parsed dropdownmenu filled in with the right data 
         */
        public function getDropdownDivisions($facility=1){
            //load in the needed models
            if($this->session->userdata('language')==='Dutch'){
                $this->lang->load('Dutch_lang','dutch');
            }
            else{
                $this->lang->load('english_lang','english');
            }
            $this->load->model('Overview_Model');
            //asks the databasemodel for the data about the different divisions in a facility
            $results=$this->Overview_Model->getDivisions($facility);
            $row['thedivisions']=$results['divisions'];
            //prepare the data array for parsing
            $data= array(
                "content_title"=>$this->lang->line('divisions'),
                //parses the data into different dropdown items
                "content_div"=>$this->parser->parse('pages_caregiver/divisions_temp',$row,TRUE));
            $this->parser->parse('pages_caregiver/dropdown_temp', $data);
        }
        
        /*
         * Function: loads the different divisions from one facility into a dropdown menu
         * Input: facility ID
         * Output: The parsed dropdownmenu filled in with the right data 
         */
        public function getTimeDivisions($facility=1){
            //load in the needed models
           if($this->session->userdata('language')==='dutch'){
                $this->lang->load('Dutch_lang','dutch');
            }
            else{
                $this->lang->load('english_lang','english');
            }
            $this->load->model('Overview_Model');
             //asks the databasemodel for the data about the different divisions in a facility
            $results=$this->Overview_Model->getDivisions($facility);
            $row['thedivisions']=$results['divisions'];
             //prepare the data array for parsing
            $data= array(
                "content_title"=>$this->lang->line('divisions'),
                //parses the data into different dropdown items
                "content_div"=>$this->parser->parse('pages_caregiver/divisions_time_temp',$row,TRUE));
            $this->parser->parse('pages_caregiver/dropdown_temp', $data);
        }
        
         /*
         * Function: makes the view of the data of the elderly
         * Input:ID_elder
         * Output; the parsed view of the elderly with the data
         */
        public function getChartElder(){
            //load in the needed models and inuts
            $this->load->model('Language_model');
            $data=$this->Language_model->getData($this->session->userdata('language'),'elderchart');
            $ID_elder=$this->input->get('ID_elder');
            $this->load->model('Overview_Model');
            //asks the data(the different topics and the info about the elderly) from the databasemodel
            $data['topics']=$this->Overview_Model->getTypes($this->session->userdata('language'));
            $data['info']=$this->Overview_Model->getElderInfo($ID_elder);
            $data['question']=$this->Overview_Model->getElderQuestionInfo($ID_elder,$this->session->userdata('language'));
            $data['worsttopic']=$this->Overview_Model->getElderWorstTopicInfo($ID_elder,$this->session->userdata('language'));
            $data['besttopic']=$this->Overview_Model->getElderBestTopicInfo($ID_elder,$this->session->userdata('language'));
            //asks the average scores and timestamps for each topic seperatly
            for($i=0;$i<sizeof($data['topics']);$i++){
                $data['score'][$data['topics'][$i]->Type]=$this->Overview_Model->getScoreType($data['topics'][$i]->Type,$ID_elder,$this->session->userdata('language'));
            }
            $this->parser->parse('pages_caregiver/chartView', $data);
        }
        
        /*
         * Function: makes the view of the data of the question
         * Input:ID_question
         * Output: the parsed view of the question  with the data
         */
        public function getChartTopic(){
            //loads in the models and the input
            $this->load->model('Language_model');
            $data=$this->Language_model->getData($this->session->userdata('language'),'topicchart');
            $topic=$this->input->get('topic');
            $this->load->model('Overview_Model');
           //asks the data(the different divisions and the info about the questions) from the databasemodel
            $data['info']=$this->Overview_Model->getTopicInfo($topic,$this->session->userdata('language'));
            $this->parser->parse('pages_caregiver/chartViewQes', $data);
        }
        
        /**
         * Function:load the intro page in the view
         * output: the intro page
         */
        public function getIntro(){
            //loads in the models and the input
            if($this->session->userdata('language')==='Dutch'){
                $this->lang->load('Dutch_lang','dutch');
            }
            else{
                $this->lang->load('english_lang','english');
            }
            $data['Alert_box']=$this->lang->line('Alert_box');
            $data['Callendar']=$this->lang->line('Callendar');
            $this->parser->parse('pages_caregiver/overviewIntro',$data);
        }
        
        /*
         * Function:get the language set in the session
         * output: the language of this session
         */
        public function getLanguage(){
            echo($this->session->userdata('language'));
        }
        
        /*
         * Function: Calls the databasemodel and send back the different types
         * Output:a string of the array of different Types
         */
        public function getTypes(){
            //Load in the databasemodel
            $this->load->model('Overview_Model');
            $results=$this->Overview_Model->getTypes($this->session->userdata('language'));
            echo(json_encode($results));
        }
        
        /*
         * Function get the data from the data about the score for a specific topic in a specific division
         * Input: Topic: the specific topic
         *        Division: the specific Division
         * Output:a encode array of the data(string) 
         */
        public function getTopicScores(){
            //load in the input values and the database model
            $topic=$this->input->get('topic');
            $division=$this->input->get('Division');
            $this->load->model('Overview_Model');
            //ask the data from the model and then returns it as an encoded sting
            $results=$this->Overview_Model->getTopicScores($topic,$division);
            $row=$results;
            echo(json_encode($row));
        }
        
        /*
         * Function: Calls the databasemodel and send back the different Divisions
         * Input:ID_facility:the ID of the facility the divisions are asked
         * Output:a string of the array of different divisions
         */
        public function getDivisions($ID_facility=1){
            //Load in the databasemodel
            $this->load->model('Overview_Model');
            //ask the model for the data
            $results=$this->Overview_Model->getDivisions($ID_facility);
            //return the data as a string
            echo(json_encode($results["divisions"]));
        }
        
        /*
         * Function: Normal: ask the score from the databasmodel and send them back
         * Input: Type: The type of which the question belong too
         *        ID_elder: The ID of the elder the score should come from
         * Output: a string of an array in whivh there are always two value,
         *        one is the score and the other one is the timestamp of one answer
         */
        public function getElderScores(){
            //load in the input parameters and the databasemodel
            $type=$this->input->get('type');
            $ID_elder=$this->input->get('ID_elder');
            $this->load->model('Overview_Model');
            //ask and retrieve the data from the databasemodel
            $results=$this->Overview_Model->getScoreType($type,$ID_elder,$this->session->userdata('language'));
            $row['scores']=$results;
            echo(json_encode($row));
        }
        
        /*
         * Function: Normal: asks the dtat from the databasemodel and sends it back
         * Input:division: the division of which the scores are asked
         *       ID_Question: the ID of the question of which the scores are asked
         * Output: a sting of the array of the data excisting out of two parts
         *          One is the average score and the other is the timestamp of an answers
         */
        public function getQuestionScore(){
            //load the inputs and the databasemodel
            $division=$this->input->get('division');
            $ID_question=$this->input->get('ID_question');
            $this->load->model('Overview_Model');
            //ask and retrieve the data from the databasemodel
            $results=$this->Overview_Model->getScoreType($division,$ID_question);
            $row['scores']=$results["avg_Scores"];
            echo(json_encode($row));
        }
        
        /*
         * Function:get the scores of one division
         * Input: the specific division
         * Output: an encode array of the data(string)
         */
        public function getDivisionScore(){
            //loads the input variables and the database model
            $division=$this->input->get('division');
            $this->load->model('Overview_Model');
            //asks the data from the model and returns it as an encoded array
            $result=$this->Overview_Model->getDivisionScore($division);
            $row=$result;
            echo(json_encode($row));
        }
        
        /*
         * Function: check for alerts in the facility
         * output: an encoded array with data about every alert in it's categorie
         */
        public function getAlert(){
            //load in the helper and model
            $this->load->helper('date');
            $this->load->model('Overview_Model');
            //take the current time as a timestamp and make a second reference timestamp from one month ago
            date_default_timezone_set('Europe/Brussels');
            $timestamp=date('Y-m-d H:i:s');
            $datetime=new DateTime($timestamp);
            $date=$datetime->modify('-1 month');
            //asks the databasemodel to check for the different alert each depended on the datestamp
            $data["division"]=$this->Overview_Model->getAlertDivision($date->format('Y-m-d H:i:s'),$this->session->userdata('language'));
            $data["resident"]=$this->Overview_Model->getAlertResident($date->format('Y-m-d H:i:s'),$this->session->userdata('language'));
            $data["question"]=$this->Overview_Model->getAlertQuestion($date->format('Y-m-d H:i:s'),$this->session->userdata('language'));
            $data["time"]=$this->Overview_Model->getAlertTime($date->format('Y-m-d H:i:s'));
            //returns the data as an encoded array
            echo(json_encode($data));
        }
        
        /*
         * Function: check for alerts for a specific elder
         * Input: the elder ID
         * output:an encoded array with data about every alert in it's categorie
         */
        public function getAlertElder(){
            //load in the helper and model
            $ID_elder=$this->input->get('ID_elder');
            $this->load->model('Overview_Model');
            //take the current time as a timestamp and make a second reference timestamp from one month ago
            date_default_timezone_set('Europe/Brussels');
            $timestamp=date('Y-m-d H:i:s');
            $datetime=new DateTime($timestamp);
            $date=$datetime->modify('-1 month');
            //asks the databasemodel to check for the different alert each depended on the datestamp
            $data["question"]=$this->Overview_Model->getAlertResidentElder($date->format('Y-m-d H:i:s'),$ID_elder,$this->session->userdata('language'));
            $data["time"]=$this->Overview_Model->getAlertTimeElder($date->format('Y-m-d H:i:s'),$ID_elder);
            //returns the data as an encoded array
            echo(json_encode($data));
        }   

       
        
        /*
         * Function get the topic question score
         * input: the specific topic
         * output: an encoded array of the data(string)
         */
        public function getTopicQuestions(){
            //load the models and input
            $topic=$this->input->get('topic');
            $this->load->model('Overview_Model');
            //ask the data from the model and return it as an ecoded array
            $data=$this->Overview_Model->getTopicQuestions($topic,$this->session->userdata('language'));
            echo(json_encode($data));
        }
        
    }
?>
