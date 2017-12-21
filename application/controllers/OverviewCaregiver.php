<?php
    class OverviewCaregiver extends CI_Controller{
		
        public function event_general(){
            if($this->session->userdata('language')=='dutch'){
                $this->lang->load('Dutch_lang','dutch');
            }
            else{
                $this->lang->load('english_lang','english');
            }
            $this->load->model('Overview_Model');
            $results=$this->Overview_Model->get_scores();
            $row['thescores']=$results["avg_Scores"];
            $results2=$this->Overview_Model->get_elder_score();
            $row['theelder']=$results2["avg_Scores"];
            $row['thescores']=$this->Overview_Model->convert($row['thescores']);
            $row['theelder']=$this->Overview_Model->convert($row['theelder']);
            $data= array(
                "More_Info"=>"Meer informatie",
                "division"=>"",
                "RoomNumber"=>$this->lang->line('RoomNumber'),
                "FirstName"=>$this->lang->line('FirstName'),
                "LastName"=>$this->lang->line('LastName'),
                "Score"=>$this->lang->line('Score'),
                "Question"=>$this->lang->line('Question'),
                "avg_Score"=>$this->lang->line('avg_Score'),
                "title_tab1"=>$this->lang->line('title_general1'),
                "title_tab2"=>$this->lang->line('title_general2'),
                "content_qes"=>$this->parser->parse('pages_caregiver/Question_score',$row,TRUE),
                "content_res"=>$this->parser->parse('pages_caregiver/Elder_Score',$row,TRUE));
            $this->parser->parse('pages_caregiver/Tab_template',$data);
        }
        
        public function getTypes(){
            $this->load->model('Overview_Model');
            $results=$this->Overview_Model->get_Types();
            echo(json_encode($results));
        }
        
        public function getDivisions(){
            $this->load->model('Overview_Model');
            $results=$this->Overview_Model->get_divisions(1);
            echo(json_encode($results["divisions"]));
        }
        public function test(){
            $Type=$this->input->get('type');
            $ID_elder=$this->input->get('ID_elder');
            $this->load->model('Overview_Model');
            //$results=$this->Overview_Model->get_score_type($Type,$ID_elder);
            //$row['thescores']=$results["avg_Scores"];
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
        
        public function getQestionScore(){
            $division=$this->input->get('division');
            $ID_Question=$this->input->get('ID_Question');
            $this->load->model('Overview_Model');
            //$results=$this->Overview_Model->get_score_type($Type,$ID_elder);
            //$row['thescores']=$results["avg_Scores"];
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
        public function event_division(){
           if($this->session->userdata('language')=='dutch'){
                $this->lang->load('Dutch_lang','dutch');
            }
            else{
                $this->lang->load('english_lang','english');
            }
            $division=$this->input->get('division');
            $this->load->model('Overview_Model');
            $results=$this->Overview_Model->get_question_score_division($division);
            $row['thescores']=$results["avg_Scores"];
            $results2=$this->Overview_Model->get_elder_score_division($division);
            $row['theelder']=$results2["avg_Scores"];
            $row['thescores']=$this->Overview_Model->convert($row['thescores']);
            $row['theelder']=$this->Overview_Model->convert($row['theelder']);
            $data= array(
                "division"=>$division,
                "RoomNumber"=>$this->lang->line('RoomNumber'),
                "FirstName"=>$this->lang->line('FirstName'),
                "LastName"=>$this->lang->line('LastName'),
                "Score"=>$this->lang->line('Score'),
                "Question"=>$this->lang->line('Question'),
                "avg_Score"=>$this->lang->line('avg_Score'),
                "title_tab1"=>$this->lang->line('title_division'),
                "title_tab2"=>$this->lang->line('title_division2'),
                "content_qes"=>$this->parser->parse('pages_caregiver/Question_score',$row,TRUE),
                "content_res"=>$this->parser->parse('pages_caregiver/Elder_Score',$row,TRUE));
            $this->parser->parse('pages_caregiver/Tab_template',$data);
        }
        
        public function get_divisions($facility=1){      
            if($this->session->userdata('language')=='dutch'){
                $this->lang->load('Dutch_lang','dutch');
            }
            else{
                $this->lang->load('english_lang','english');
            }
            $this->load->model('Overview_Model');
            $results=$this->Overview_Model->get_divisions($facility);
            $row['thedivisions']=$results['divisions'];
            $data= array(
                "content_title"=>$this->lang->line('divisions'),
                "content_div"=>$this->parser->parse('pages_caregiver/divisions_temp',$row,TRUE));
            $this->parser->parse('pages_caregiver/dropdown_temp', $data);
        }
        
        public function get_time_divisions($facility=1){      
           if($this->session->userdata('language')=='dutch'){
                $this->lang->load('Dutch_lang','dutch');
            }
            else{
                $this->lang->load('english_lang','english');
            };
            $this->load->model('Overview_Model');
            $results=$this->Overview_Model->get_divisions($facility);
            $row['thedivisions']=$results['divisions'];
            $data= array(
                "content_title"=>$this->lang->line('divisions'),
                "content_div"=>$this->parser->parse('pages_caregiver/divisions_time_temp',$row,TRUE));
            $this->parser->parse('pages_caregiver/dropdown_temp', $data);
        }
               
        public function event_time(){
           if($this->session->userdata('language')=='dutch'){
                $this->lang->load('Dutch_lang','dutch');
            }
            else{
                $this->lang->load('english_lang','english');
            }
            $division=$this->input->get('division');
            $this->load->model('Overview_Model');
            $results=$this->Overview_Model->get_timestamp_elders($division);
            $row['theelder']=$results['timestamps'];
            $data= array(
                 "division"=>$division,
                "RoomNumber"=>$this->lang->line('RoomNumber'),
                "FirstName"=>$this->lang->line('FirstName'),
                "LastName"=>$this->lang->line('LastName'),
                "Score"=>$this->lang->line('Score_Time'),
                "title_tab1"=>$this->lang->line('title_time'),
                "title_tab2"=>" No information to show",
                "content_qes"=>"empty",
                "content_res"=>$this->parser->parse('pages_caregiver/Time_Score_temp',$row,TRUE));
            $this->parser->parse('pages_caregiver/Tab_template', $data);
            
        }
        
        public function getChartElder(){
           if($this->session->userdata('language')=='dutch'){
                $this->lang->load('Dutch_lang','dutch');
            }
            else{
                $this->lang->load('english_lang','english');
            }
            $this->load->model('Language_model');
            $data=$this->Language_model->DataOverview();
            $ID_Elder=$this->input->get('ID_Elder');
            $this->load->model('Overview_Model');
            $data['Topics']=$this->Overview_Model->get_Types();
            $data['info']=$this->Overview_Model->get_elderinfo($ID_Elder);
            for($i=0;$i<sizeof($data['Topics']);$i++){
                $data['score'][$data['Topics'][$i]->Type]=$this->Overview_Model->get_score_type($data['Topics'][$i]->Type,$ID_Elder);
            }
            $this->parser->parse('pages_caregiver/chartView', $data);
        }
        
        public function getChartQuestion(){
            if($this->session->userdata('language')=='dutch'){
                $this->lang->load('Dutch_lang','dutch');
            }
            else{
                $this->lang->load('english_lang','english');
            }
            $this->load->model('Language_model');
            $data=$this->Language_model->DataOverview();
            $ID_Question=$this->input->get('ID_Question');
            $this->load->model('Overview_Model');
            $data['divisions']=$this->Overview_Model->get_divisions('1');
            $data['info']=$this->Overview_Model->get_questioninfo($ID_Question);
            for($i=0;$i<sizeof($data['divisions']['divisions']);$i++){
               // $data['score'][$i]=$this->Overview_Model->get_score_division($data['divisions']['divisions'][$i]->Type,$ID_Question);
            }
            $this->parser->parse('pages_caregiver/chartViewQes', $data);
        }
        
    }
?>
