<?php
    class OverviewCaregiver extends CI_Controller{
		
        public function event_general(){
            $this->load->model('Overview_Model');
            $results=$this->Overview_Model->get_scores();
            $row['thescores']=$results["avg_Scores"];
            $results2=$this->Overview_Model->get_elder_score();
            $row['theelder']=$results2["avg_Scores"];
            $data= array(
                "title_tab1"=>"Resident general overview",
                "title_tab2"=>"Question general overview",
                "content_qes"=>$this->parser->parse('pages_caregiver/Question_score',$row,TRUE),
                "content_res"=>$this->parser->parse('pages_caregiver/Elder_Score',$row,TRUE));
            $this->parser->parse('pages_caregiver/Tab_template',$data);
        }
        
        public function event_division($division="paveljoen"){
            $this->load->model('Overview_Model');
            $results=$this->Overview_Model->get_question_score_division($division);
            $row['thescores']=$results["avg_Scores"];
            $results2=$this->Overview_Model->get_elder_score_division($division);
            $row['theelder']=$results2["avg_Scores"];
            $data= array(
                "title_tab1"=>"Resident division overview ",
                "title_tab2"=>"Question division overview ",
                "content_qes"=>$this->parser->parse('pages_caregiver/Question_score',$row,TRUE),
                "content_res"=>$this->parser->parse('pages_caregiver/Elder_Score',$row,TRUE));
            $this->parser->parse('pages_caregiver/Tab_template',$data);
        }
        
        public function get_divisions($facility=1){
            $this->load->model('Overview_Model');
            $results=$this->Overview_Model->get_divisions($facility);
            $row['thedivisions']=$results['divisions'];
            $data= array(
                "content_title"=>"Divisions",
                "content_div"=>$this->parser->parse('pages_caregiver/divisions_temp',$row,TRUE));
            $this->parser->parse('pages_caregiver/dropdown_temp', $data);
        }
        
        public function init(){
            $data2=array(
                 "title_tab1"=>"announcements on residents",
                "title_tab2"=>" announcements on questions",
                "content_qes"=>"No announcements yet",
                "content_res"=>"No announcements yet");
           $this->parser->parse('pages_caregiver/Tab_template', $data2);
        }
        
        public function event_time(){
            $this->load->model('Overview_Model');
            $results=$this->Overview_Model->get_timestamp_elders();
            $row['theelder']=$results['timestamps'];
            $data= array(
                "title_tab1"=>"Resident timestamps ",
                "title_tab2"=>" No information to show",
                "content_qes"=>"empty",
                "content_res"=>$this->parser->parse('pages_caregiver/Elder_Score',$row,TRUE));
            $this->parser->parse('pages_caregiver/Tab_template', $data);
            
        }
        
        public function getChartElder(){
            $ID_Elder=$this->input->get('ID_Elder');
            $this->load->model('Overview_Model');
            $data['topics']=$this->Overview_Model->get_Types();
            $data['info']=$this->Overview_Model->get_elderinfo($ID_Elder);
            foreach($data['topics'] as $topic){
                $data[$topic]=$this->Overview_Model->get_score_type($type);
            }
            $this->parser->parse('chartTemp', $data);
        }
        
        public function getChartQuestion(){
            $ID_Question=$this->input->get('ID_Question');
            $this->load->model('Overview_Model');
            $data['divisions']=$this->Overview_Model->get_divisions('1');
            $data['info']=$this->Overview_Model->get_questioninfo($ID_Question);
            foreach($data['divisions'] as $div){
                $data[$div]=$this->Overview_Model->get_score_division($div);
            }
            $this->parser->parse('chartTemp', $data);
        }
    }
?>
