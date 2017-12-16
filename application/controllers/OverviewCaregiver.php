<?php
    class OverviewCaregiver extends CI_Controller{
		
        public function event_general(){
            $this->lang->load('Dutch_lang','dutch');
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
        public function test(){
            $Type=$this->input->get('type');
            $ID_elder=$this->input->get('ID_elder');
            //$this->load->model('Overview_Model');
            //$results=$this->Overview_Model->get_score_type($Type,$ID_elder);
            //$row['thescores']=$results["avg_Scores"];
            $row['thescores']=array( array("Timestamp" => "Last_Three_Week",
                                "AvgScore" => 10),
                            array("Timestamp" => "last_two_Week",
                                "AvgScore" => 30),
                            array("Timestamp" => "last_Week",
                                "AvgScore" => 20));
            echo json_encode($row);
        }

        public function event_division(){
            $this->lang->load('Dutch_lang','dutch');
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
                "title_tab1"=>$this->lang->line('title_division'),
                "title_tab2"=>$this->lang->line('title_division2'),
                "content_qes"=>$this->parser->parse('pages_caregiver/Question_score',$row,TRUE),
                "content_res"=>$this->parser->parse('pages_caregiver/Elder_Score',$row,TRUE));
            $this->parser->parse('pages_caregiver/Tab_template',$data);
        }
        
        public function get_divisions($facility=1){      
            $this->lang->load('Dutch_lang','dutch');
            $this->load->model('Overview_Model');
            $results=$this->Overview_Model->get_divisions($facility);
            $row['thedivisions']=$results['divisions'];
            $data= array(
                "content_title"=>$this->lang->line('divisions'),
                "content_div"=>$this->parser->parse('pages_caregiver/divisions_temp',$row,TRUE));
            $this->parser->parse('pages_caregiver/dropdown_temp', $data);
        }
               
        public function event_time(){
            $this->lang->load('Dutch_lang','dutch');
            $division=$this->input->get('division');
            $this->load->model('Overview_Model');
            $results=$this->Overview_Model->get_timestamp_elders($division);
            $row['theelder']=$results['timestamps'];
            $data= array(
                "title_tab1"=>$this->lang->line('title_time'),
                "title_tab2"=>" No information to show",
                "content_qes"=>"empty",
                "content_res"=>$this->parser->parse('pages_caregiver/Time_Score_temp',$row,TRUE));
            $this->parser->parse('pages_caregiver/Tab_template', $data);
            
        }
        
        public function getChartElder(){
            $this->lang->load('Dutch_lang','dutch');
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
            $this->lang->load('Dutch_lang','dutch');
            $this->load->model('Language_model');
            $data=$this->Language_model->DataOverview();
            $ID_Question=$this->input->get('ID_Question');
            $this->load->model('Overview_Model');
            $data['divisions']=$this->Overview_Model->get_divisions('1');
            $data['info']=$this->Overview_Model->get_questioninfo($ID_Question);
            for($i=0;$i<sizeof($data['divisions']['divisions']);$i++){
                $data['score'][$i]=$this->Overview_Model->get_score_division($data['divisions']['divisions'][$i]->divisions,$ID_Question);
            }
            $this->parser->parse('pages_caregiver/chartViewQes', $data);
        }
        
    }
?>
