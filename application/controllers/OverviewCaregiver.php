<?php
    //This class is made as controller of the view page of the caregivers
    class OverviewCaregiver extends CI_Controller{
	
        /*event_general 
         *Fuction:action that will be called as the general button is clicked
         *Input:none
         *Output:the parsed Tab_template with the data provided.   */
        public function event_general(){
            if($this->session->userdata('language')==='dutch'){
                $this->lang->load('Dutch_lang','dutch');
            }
            else{
                $this->lang->load('english_lang','english');
            }
            $this->load->model('Overview_Model');
            //Asking the data from the database-model for this controller
            $results=$this->Overview_Model->get_scores($this->session->userdata('language'));
            $row['thescores']=$results["avg_Scores"];
            $results2=$this->Overview_Model->get_elder_score();
            $row['theelder']=$results2["avg_Scores"];
            //Let the model do a conversion of the score from int to a image(smiley)
            $row['thescores']=$this->Overview_Model->convert($row['thescores']);
            $row['theelder']=$this->Overview_Model->convert($row['theelder']);
            //construct the array of data for parsing
            $data= array(
                //Ask the language model for the right values of the keywords
                "More_Info"=>"Meer informatie",
                'division'=>"",
                "RoomNumber"=>$this->lang->line('RoomNumber'),
                "Name"=>$this->lang->line('Name'),
                "Score"=>$this->lang->line('Score'),
                "Question"=>$this->lang->line('Question'),
                "avg_Score"=>$this->lang->line('avg_Score'),
                "title_tab1"=>$this->lang->line('title_general1'),
                "title_tab2"=>$this->lang->line('title_general2'),
                //parse the data from the databases into the right templates
                "content_qes"=>$this->parser->parse('pages_caregiver/Question_score',$row,TRUE),
                "content_res"=>$this->parser->parse('pages_caregiver/Elder_Score',$row,TRUE));
            $this->parser->parse('pages_caregiver/Tab_template',$data);
        }
        
        public function getIntro(){
            $this->load->view('pages_caregiver/overviewIntro');
        }
        
        public function getLanguage(){
            echo($this->session->userdata('language'));
        }
        /*getTypes
         * Function: Calls the databasemodel and send back the different types
         * Input:None
         * Output:a string of the array of different Types
         */
        public function getTypes(){
            //Load in the databasemodel
            $this->load->model('Overview_Model');
            $results=$this->Overview_Model->get_Types();
            echo(json_encode($results));
        }
        
        public function getQestionScore(){
            $division=$this->input->get('division');
            $ID_Question=$this->input->get('ID_Question');
            $this->load->model('Overview_Model');
            //$results=$this->Overview_Model->get_score_type($Type,$ID_elder);
            //$row['thescores']=$results["avg_Scores"];
            echo(json_encode($row));
        }
        
        public function getTopicScores(){
            $Topic=$this->input->get('Topic');
            $division=$this->input->get('Division');
            $this->load->model('Overview_Model');
            $results=$this->Overview_Model->get_topic_scores($Topic,$division);
            $row=$results;
            echo(json_encode($row));
        }
        /*getDivisions
         * Function: Calls the databasemodel and send back the different Divisions
         * Input:ID_facility:the ID of the facility the divisions are asked
         * Output:a string of the array of different divisions
         */
        public function getDivisions($ID_facility=1){
            //Load in the databasemodel
            $this->load->model('Overview_Model');
            //ask the model for the data
            $results=$this->Overview_Model->get_divisions($ID_facility);
            //return the data as a string
            echo(json_encode($results["divisions"]));
        }
        
        /*test
         * Function: Normal: ask the score from the databasmodel and send them back
         *          Now: generate random data and send it through
         * Input: Type: The type of which the question belong too
         *        ID_elder: The ID of the elder the score should come from
         * Output: a string of an array in whivh there are always two value,
         *        one is the score and the other one is the timestamp of one answer
         */
        public function test(){
            //load in the input parameters and the databasemodel
            $Type=$this->input->get('type');
            $ID_elder=$this->input->get('ID_elder');
            $this->load->model('Overview_Model');
            //ask and retrieve the data from the databasemodel
            $results=$this->Overview_Model->get_score_type($Type,$ID_elder);
            $row['thescores']=$results;
            echo(json_encode($row));
        }
        
        /*getQuestionScore
         * Function: Normal: asks the dtat from the databasemodel and sends it back
         *          Now: generating random data
         * Input:division: the division of which the scores are asked
         *       ID_Question: the ID of the question of which the scores are asked
         * Output: a sting of the array of the data excisting out of two parts
         *          One is the average score and the other is the timestamp of an answers
         */
        public function getQuestionScore(){
            //load the inputs and the databasemodel
            $division=$this->input->get('division');
            $ID_Question=$this->input->get('ID_Question');
            $this->load->model('Overview_Model');
            //ask and retrieve the data from the databasemodel
            //$results=$this->Overview_Model->get_score_type($Type,$ID_elder);
            //$row['thescores']=$results["avg_Scores"];
            //generate the random data
            echo(json_encode($row));
        }
        
        public function getDivisionScore(){
            $division=$this->input->get('division');
            $this->load->model('Overview_Model');
            $result=$this->Overview_Model->get_division_score($division);
            $row=$result;
            echo(json_encode($row));
        }
        
        public function getAlert(){
            $this->load->helper('date');
            $this->load->model('Overview_Model');
            $timestamp=date('Y-m-d H:i:s');
            $dateTime=new DateTime($timestamp);
            $date=$dateTime->modify('-1 month');
            $data["division"]=$this->Overview_Model->get_alert_division($date->format('Y-m-d H:i:s'));
            $data["resident"]=$this->Overview_Model->get_alert_resident($date->format('Y-m-d H:i:s'));
            $data["question"]=$this->Overview_Model->get_alert_question($date->format('Y-m-d H:i:s'));
            $data["time"]=$this->Overview_Model->get_alert_time($date->format('Y-m-d H:i:s'));
            //$data["residentquestion"]=$this->Overview_Model->get_alert_residentquestion();
            echo(json_encode($data));
        }
        
        public function getAlertElder(){
            $ID_elder=$this->input->get('ID_Elder');
            $this->load->model('Overview_Model');
            $timestamp=date('Y-m-d H:i:s');
            $dateTime=new DateTime($timestamp);
            $date=$dateTime->modify('-1 month');
            $data["question"]=$this->Overview_Model->get_alert_resident_elder($date->format('Y-m-d H:i:s'),$ID_elder);
            $data["time"]=$this->Overview_Model->get_alert_time_elder($date->format('Y-m-d H:i:s'),$ID_elder);
            echo(json_encode($data));
        }
        /*event_division
         * Function: The action that will happen when the division button is pressed:
         *          showing the score of that division
         * Input:division: the division of which the scores are asked
         * Output: A parsed template with the data provided
         */
        public function event_division(){
            //loading in the input and the models
           if($this->session->userdata('language')=='Dutch'){
                $this->lang->load('Dutch_lang','dutch');
            }
            else{
                $this->lang->load('english_lang','english');
            }
            $division=$this->input->get('division');
            $this->load->model('Overview_Model');
            //asking the data from the databasemodel
            $results=$this->Overview_Model->get_question_score_division($division,$this->session->userdata('language'));
            $row['thescores']=$results["avg_Scores"];
            $results2=$this->Overview_Model->get_elder_score_division($division);
            $row['theelder']=$results2["avg_Scores"];
            //asks the model to change the int scores into images
            $row['thescores']=$this->Overview_Model->convert($row['thescores']);
            $row['theelder']=$this->Overview_Model->convert($row['theelder']);
            //prepare the data array for the parsing
            $data= array(
                //put the right link for the language placeholders
                "division"=>$division,
                "RoomNumber"=>$this->lang->line('RoomNumber'),
                "Name"=>$this->lang->line('Name'),
                "Score"=>$this->lang->line('Score'),
                "Question"=>$this->lang->line('Question'),
                "avg_Score"=>$this->lang->line('avg_Score'),
                "title_tab1"=>$this->lang->line('title_division'),
                "title_tab2"=>$this->lang->line('title_division2'),
                //parse the data from the databasemodel into the templates
                "content_qes"=>$this->parser->parse('pages_caregiver/Question_score',$row,TRUE),
                "content_res"=>$this->parser->parse('pages_caregiver/Elder_Score',$row,TRUE));
            $this->parser->parse('pages_caregiver/Tab_template',$data);
        }
        

        /*get_divisions
         * Function: loads the different divisions from one facility into a dropdown menu
         * Input: facility ID
         * Output: The parsed dropdownmenu filled in with the right data 
         */
        public function get_divisions($facility=1){
            //load in the needed models
            if($this->session->userdata('language')=='Dutch'){
                $this->lang->load('Dutch_lang','dutch');
            }
            else{
                $this->lang->load('english_lang','english');
            }
            $this->load->model('Overview_Model');
            //asks the databasemodel for the data about the different divisions in a facility
            $results=$this->Overview_Model->get_divisions($facility);
            $row['thedivisions']=$results['divisions'];
            //prepare the data array for parsing
            $data= array(
                "content_title"=>$this->lang->line('divisions'),
                //parses the data into different dropdown items
                "content_div"=>$this->parser->parse('pages_caregiver/divisions_temp',$row,TRUE));
            $this->parser->parse('pages_caregiver/dropdown_temp', $data);
        }
        
        /*get_time_divisions
         * Function: loads the different divisions from one facility into a dropdown menu
         * Input: facility ID
         * Output: The parsed dropdownmenu filled in with the right data 
         */
        public function get_time_divisions($facility=1){
            //load in the needed models
           if($this->session->userdata('language')=='dutch'){
                $this->lang->load('Dutch_lang','dutch');
            }
            else{
                $this->lang->load('english_lang','english');
            };
            $this->load->model('Overview_Model');
             //asks the databasemodel for the data about the different divisions in a facility
            $results=$this->Overview_Model->get_divisions($facility);
            $row['thedivisions']=$results['divisions'];
             //prepare the data array for parsing
            $data= array(
                "content_title"=>$this->lang->line('divisions'),
                //parses the data into different dropdown items
                "content_div"=>$this->parser->parse('pages_caregiver/divisions_time_temp',$row,TRUE));
            $this->parser->parse('pages_caregiver/dropdown_temp', $data);
        }
        
        /*event_time
         * Function: the action that will happen when the fill-in time of a division is asked
         * Input:division: the division of which the data will be asked
         * Output:The parsed tabtemplate with the data
         */
        public function event_time(){
            //loading in the needed models and input variables
           if($this->session->userdata('language')=='Dutch'){
                $this->lang->load('Dutch_lang','dutch');
            }
            else{
                $this->lang->load('english_lang','english');
            }
            $division=$this->input->get('division');
            $this->load->model('Overview_Model');
            //asked the data from the datbasemodel
            $results=$this->Overview_Model->get_timestamp_elders($division);
            $row['theelder']=$results['timestamps'];
            //prepare the array for parsing
            $data= array(
                 "division"=>$division,
                "RoomNumber"=>$this->lang->line('RoomNumber'),
                "Name"=>$this->lang->line('Name'),
                "Score"=>$this->lang->line('Score_Time'),
                "title_tab1"=>$this->lang->line('title_time'),
                //parses the separete data into the different tabpanels
                "content_res"=>$this->parser->parse('pages_caregiver/Time_Score_temp',$row,TRUE));
            $this->parser->parse('pages_caregiver/Tab_time_template', $data);
            
        }

        /*getChartElder
         * Function: makes the view of the data of the elderly
         * Input:ID_elder
         * Output; the parsed view of the elderly with the data
         */
        public function getChartElder(){
            //load in the needed models and inuts
           if($this->session->userdata('language')=='Dutch'){
                $this->lang->load('Dutch_lang','dutch');
            }
            else{
                $this->lang->load('english_lang','english');
            }
            $this->load->model('Language_model');
            $data=$this->Language_model->DataElderChart();
            $ID_Elder=$this->input->get('ID_Elder');
            $this->load->model('Overview_Model');
            //asks the data(the different topics and the info about the elderly) from the databasemodel
            $data['Topics']=$this->Overview_Model->get_Types();
            $data['info']=$this->Overview_Model->get_elderinfo($ID_Elder);
            $data['question']=$this->Overview_Model->get_elderquestioninfo($ID_Elder);
            $data['worsttopic']=$this->Overview_Model->get_elderworsttopicinfo($ID_Elder);
            $data['besttopic']=$this->Overview_Model->get_elderbesttopicinfo($ID_Elder);
            //asks the average scores and timestamps for each topic seperatly
            for($i=0;$i<sizeof($data['Topics']);$i++){
                $data['score'][$data['Topics'][$i]->Type]=$this->Overview_Model->get_score_type($data['Topics'][$i]->Type,$ID_Elder);
            }
            $this->parser->parse('pages_caregiver/chartView', $data);
        }
        
        /*getChatQuestion
         * Function: makes the view of the data of the question
         * Input:ID_question
         * Output: the parsed view of the question  with the data
         */
        public function getChartTopic(){
            //loads in the models and the input
            if($this->session->userdata('language')=='Dutch'){
                $this->lang->load('Dutch_lang','dutch');
            }
            else{
                $this->lang->load('english_lang','english');
            }
            $this->load->model('Language_model');
            $data=$this->Language_model->DataTopicChart();
            $Topic=$this->input->get('Topic');
            $this->load->model('Overview_Model');
           //asks the data(the different divisions and the info about the questions) from the databasemodel
            $data['info']=$this->Overview_Model->get_topicinfo($Topic);
            $this->parser->parse('pages_caregiver/chartViewQes', $data);
        }
        
        public function getTopicQuestions(){
            $Topic=$this->input->get('Topic');
            $this->load->model('Overview_Model');
            $data=$this->Overview_Model->get_topicquestions($Topic);
            echo(json_encode($data));
        }
        
    }
?>
