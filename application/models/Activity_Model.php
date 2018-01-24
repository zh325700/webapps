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

    public function get_Activity($ID_Activity = FALSE) {
        if ($ID_Activity === FALSE) {
            $this->db->order_by('Activity.ID_Activity', 'DESC'); // order by ID Descending 
            $query = $this->db->get('Activity'); // get every data in the elder tabel into the query
            return $query->result_array();
        }
        $query = $this->db->get_where('Activity', array('ID_Activity' => $ID_Activity));
        return $query->row_array();
    }

    public function delete_activity($ID_Activity) {
        $this->db->where('ID_Activity', $ID_Activity);
        $this->db->delete('ActivityLink');
        $this->db->where('ID_Activity', $ID_Activity);
        $this->db->delete('Activity');
        return true;
    }

    public function get_numOfParticipants($ID_Activity) {
        $this->db->select('*');
        $this->db->from('ActivityLink');
        $this->db->where('ID_Activity', $ID_Activity);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_fewActivities($Num_Activity = 1) {
        $this->db->order_by('Activity.ID_Activity', 'DESC'); // order by ID Descending 
        $query = $this->db->get('Activity'); // get every data in the elder tabel into the query
        $allArray = $query->result_array();
        $newArray = array();
        foreach ($allArray as $oneActivity) {
            $time = strtotime($oneActivity['Time']);
            $curtime = time();
            if (($curtime - $time) < 0 && $Num_Activity> sizeof($newArray)) {   
                $newArray[] = $oneActivity;
            }
        }
        return $newArray;
    }

}
