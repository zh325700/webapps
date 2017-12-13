<?php

class addfacility_model extends CI_Model {

    public function get_facility($ID_facility = FALSE) {
        if ($ID_facility === FALSE) {
            $this->db->order_by('Facility.ID_facility', 'DESC'); // order by ID Descending 
            $query = $this->db->get('Facility'); // get every data in the Facility tabel into the query
            return $query->result_array();
        }
        $query = $this->db->get_where('Facility', array('ID_facility' => $ID_facility));
        return $query->row_array();
    }

    public function create_facility() {
         //$this->db->where('ID_facility', $ID_facility);
        $data = array(
            'Name' => $this->input->post('Name'),
            'City' => $this->input->post('City'),
            'Postcode' => $this->input->post('Postcode'),
            'Street' => $this->input->post('Street'),
            'Number' => $this->input->post('Number')         
        );
        
         //$this->db->where('ID_facility', $ID_facility);
         return $this->db->insert('Facility', $data);
         
    }

    public function delete_facility($ID_facility) {
        $this->db->where('ID_facility', $ID_facility);
        $this->db->delete('Facility');
        return true;
    }

    public function update_facility() {
        $ID_facility = $this->input->post('ID_facility');     //post('name of the input ') 

        $data = array(
            'Name' => $this->input->post('Name'),
//            'description' => $this->input->post('description')
        );

        $this->db->where('ID_facility', $ID_facility);
        return $this->db->update('ID_facility', $data);
    }


}
