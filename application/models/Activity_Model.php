<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Activity_Model extends CI_Model {
        public function create_activity() {
//        $Id_Elder = $this->input->post('ID_Elder'); 
        $data = array(
            'Title' => $this->input->post('Title'),
            'Time' => $this->input->post('Time'),
            'Description' => $this->input->post('Description'),
        );
        //posts is the table name and the data array is called "data"
        return $this->db->insert('Activity', $data);
    }
}