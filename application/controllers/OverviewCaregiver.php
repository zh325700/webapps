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
        
        
    }
?>
