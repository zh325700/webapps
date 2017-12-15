<?php

/**
 * Description of Questionnaire_model
 *
 * @author Pieter-Jan
 */
class Questionnaire_model extends CI_Model{
    function getQuestions(){
        $query = $this->db->get('Questions');
        return json_encode($query->result_array());
    }
    
    function getFirstQuestion(){
        $query = $this->db->query("SELECT * FROM Questions WHERE ID_Question = 1");
        $value = $query->row();
        return $value->Question_en;
    }
    
    function insertScore($data){
        $this->db->insert('Answers', $data);
    }
}
