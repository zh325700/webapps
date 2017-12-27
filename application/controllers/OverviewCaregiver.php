<?php
    //This class is made as controller of the view page of the caregivers
    class OverviewCaregiver extends CI_Controller{
	
        /*event_general 
         *Fuction:action that will be called as the general button is clicked
         *Input:none
         *Output:the parsed Tab_template with the data provided.   */
        public function event_general(){
            if($this->session->userdata('language')=='dutch'){
                $this->lang->load('Dutch_lang','dutch');
            }
            else{
                $this->lang->load('english_lang','english');
            }
            $this->load->model('Overview_Model');
            $this->lang->load('Dutch_lang','dutch');
            //Asking the data from the database-model for this controller
            $results=$this->Overview_Model->get_scores();
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
                "FirstName"=>$this->lang->line('FirstName'),
                "LastName"=>$this->lang->line('LastName'),
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
            $row['thescores']=array( 
                            array("Timestamp" => "vorig jaar",
                                "AvgScore" => mt_rand(0, 5)),
                            array("Timestamp" => "zes maanden geleden",
                                "AvgScore" => mt_rand(0, 5)),
                            array("Timestamp" => "twee maanden geleden",
                                "AvgScore" => mt_rand(0, 5)),
                            array("Timestamp" => "vorige maand",
                                "AvgScore" => mt_rand(0, 5)),
                            array("Timestamp" => "deze maand",
                                "AvgScore" => mt_rand(0, 5)),
                            array("Timestamp" => "vorige week",
                                "AvgScore" => mt_rand(0, 5)),
                            array("Timestamp" => "deze week",
                                "AvgScore" => mt_rand(0, 5)));
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
            //generate a array of random data
           /* $row['thescores']=array( 
                            array("Timestamp" => "vorig jaar",
                                "AvgScore" => mt_rand(0, 5)),
                            array("Timestamp" => "zes maanden geleden",
                                "AvgScore" => mt_rand(0, 5)),
                            array("Timestamp" => "twee maanden geleden",
                                "AvgScore" => mt_rand(0, 5)),
                            array("Timestamp" => "vorige maand",
                                "AvgScore" => mt_rand(0, 5)),
                            array("Timestamp" => "deze maand",
                                "AvgScore" => mt_rand(0, 5)),
                            array("Timestamp" => "vorige week",
                                "AvgScore" => mt_rand(0, 5)),
                            array("Timestamp" => "deze week",
                                "AvgScore" => mt_rand(0, 5)));*/
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
            $row['thescores']=array( 
                            array("Timestamp" => "vorig jaar",
                                "AvgScore" => mt_rand(1, 5)),
                            array("Timestamp" => "zes maanden geleden",
                                "AvgScore" => mt_rand(1, 5)),
                            array("Timestamp" => "twee maanden geleden",
                                "AvgScore" => mt_rand(1, 5)),
                            array("Timestamp" => "vorige maand",
                                "AvgScore" => mt_rand(1, 5)),
                            array("Timestamp" => "deze maand",
                                "AvgScore" => mt_rand(1, 5)),
                            array("Timestamp" => "vorige week",
                                "AvgScore" => mt_rand(1, 5)),
                            array("Timestamp" => "deze week",
                                "AvgScore" => mt_rand(1, 5)));
            echo(json_encode($row));
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
            $results=$this->Overview_Model->get_question_score_division($division);
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
                "FirstName"=>$this->lang->line('FirstName'),
                "LastName"=>$this->lang->line('LastName'),
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
                "FirstName"=>$this->lang->line('FirstName'),
                "LastName"=>$this->lang->line('LastName'),
                "Score"=>$this->lang->line('Score_Time'),
                "title_tab1"=>$this->lang->line('title_time'),
                "title_tab2"=>" No information to show",
                "content_qes"=>"empty",
                //parses the separete data into the different tabpanels
                "content_res"=>$this->parser->parse('pages_caregiver/Time_Score_temp',$row,TRUE));
            $this->parser->parse('pages_caregiver/Tab_template', $data);
            
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
            $data=$this->Language_model->DataOverview();
            $ID_Elder=$this->input->get('ID_Elder');
            $this->load->model('Overview_Model');
            //asks the data(the different topics and the info about the elderly) from the databasemodel
            $data['Topics']=$this->Overview_Model->get_Types();
            $data['info']=$this->Overview_Model->get_elderinfo($ID_Elder);
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
        public function getChartQuestion(){
            //loads in the models and the input
            if($this->session->userdata('language')=='Dutch'){
                $this->lang->load('Dutch_lang','dutch');
            }
            else{
                $this->lang->load('english_lang','english');
            }
            $this->load->model('Language_model');
            $data=$this->Language_model->DataOverview();
            $ID_Question=$this->input->get('ID_Question');
            $this->load->model('Overview_Model');
           //asks the data(the different divisions and the info about the questions) from the databasemodel
            $data['divisions']=$this->Overview_Model->get_divisions('1');
            $data['info']=$this->Overview_Model->get_questioninfo($ID_Question);
            //asks the average scores and timestamps for each division seperatly
            for($i=0;$i<sizeof($data['divisions']['divisions']);$i++){
               // $data['score'][$i]=$this->Overview_Model->get_score_division($data['divisions']['divisions'][$i]->Type,$ID_Question);
            }
            $this->parser->parse('pages_caregiver/chartViewQes', $data);
        }
        
    }
?>
