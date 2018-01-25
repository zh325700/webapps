<?php
$category = "";

class ResidentQuestion extends CI_Controller{
    public function getQuestion(){
        $category = $_GET['category'];
        $this->load->model('Questionnaire_model');
        $this->load->model('Language_model');
        $this->lang->load('Dutch_lang','dutch');
        $data=$this->Language_model->getData('Dutch','question');
        $data['questions'] = $this->Questionnaire_model->getQuestions();
        $data['first_question'] = $this->Questionnaire_model->getFirstQuestion($category);
        $data['category'] = $category;
        $this->load->view('pages_generalised/header');
        $this->parser->parse('pages_generalised/residents',$data['header']);
        $this->parser->parse('pages_resident/question', $data);
        $this->parser->parse('pages_generalised/footer',$data['footer']);
    }
    
    public function insertScore(){
        $data = $_GET['answers'];
        $this->load->model('Questionnaire_model');
        //$this->Questionnaire_model->insertScore($answers);
        
        $this->db->trans_begin();
        foreach(json_decode($data) as $row){
            $filter_data = array(
                "ID_Question" => $row->ID_Question,
                "ID_Elder" => $row->ID_Elder,
                "Score" => $row->Score
            );
            $this->Questionnaire_model->insertScore($filter_data);
        }
        
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            echo json_encode("Failed to Save Data");
        } else {
            $this->db->trans_commit();
            $this->session->set_userdata($category, "Done");
            redirect('Welcome/LoadThankyou'); //TODO UPDATE TO ACTUAL CONTROLLER
        }
    }
}
