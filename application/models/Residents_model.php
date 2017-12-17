<?php

class Residents_model extends CI_Model {

    public function get_residents($ID_Elder = FALSE) {
        if ($ID_Elder === FALSE) {
            $this->db->order_by('Elder.ID_Elder', 'DESC'); // order by ID Descending 
            $query = $this->db->get('Elder'); // get every data in the elder tabel into the query
            return $query->result_array();
        }
        $query = $this->db->get_where('Elder', array('ID_Elder' => $ID_Elder));
        return $query->row_array();
    }
    
    public function get_residents_by_sex($Sex = FALSE){
        if ($Sex == FALSE){
            $query = $this->db->get('Elder');
            return $query->result_array();
        }
        $query = $this->db->get_where('Elder', array('Sex' => $Sex));
        return $query->result_array();
    }

    public function create_resident($post_image) {
//        $Id_Elder = $this->input->post('ID_Elder'); 

        $data = array(
            'LastName' => $this->input->post('LastName'),
            'FirstName' => $this->input->post('FirstName'),
            'Birthday' => $this->input->post('Birthday'),
            'Sex' => $this->input->post('Sex'),
            'RoomNumber' => $this->input->post('RoomNumber'),
            'ID_Facility' => $this->input->post('ID_Facility'),
            'Picture' => $post_image
        );
        //posts is the table name and the data array is called "data"
        return $this->db->insert('Elder', $data);
    }

    public function delete_resident($ID_Elder) {
        $this->db->where('ID_Elder', $ID_Elder);
        $this->db->delete('Elder');
        return true;
    }

    public function update_resident($post_image) {
        $ID_Elder = $this->input->post('ID_Elder');     //post('name of the input ') 

        $data = array(
            'LastName' => $this->input->post('LastName'),
            'FirstName' => $this->input->post('FirstName'),
            'Sex' => $this->input->post('Sex'),
            'Birthday' => $this->input->post('Birthday'),
            'RoomNumber' => $this->input->post('RoomNumber'),
            'ID_facility' => $this->input->post('ID_facility'),
            'Picture' => $post_image
        );

        $this->db->where('ID_Elder', $ID_Elder);
        return $this->db->update('Elder', $data);
    }

    public function get_facilities() {
        $this->db->order_by('Facility.ID_facility');
        $query = $this->db->get('Facility');
        return $query->result_array();
    }
    public function get_FacilityName_by_ElderID($ID_Elder) {
        $this->db->select('*');
        $this->db->from('Elder');
        $this->db->join('Facility', 'Elder.ID_Facility = Facility.ID_facility');
        $this->db->where('ID_Elder',$ID_Elder);
        $query = $this->db->get();
        return $query->row_array();
    }

     public function fontsize_resident($Fontsize,$ID_Elder) {
       // $query = $this->db->query("UPDATE Elder SET Fontsize = $fontSize WHERE ID_Elder = $ID_Elder"); 
         $data = array(
            'Fontsize' => $Fontsize,
        );
         $this->db->where('ID_Elder',$ID_Elder);
         $this->db->update('Elder',$data);  
    }
}
