<?php

class Residents_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_residents($ID_Elder = FALSE) {
        if ($ID_Elder === FALSE) {
            $this->db->order_by('Elder.ID_Elder', 'DESC'); // order by ID Descending 
            $query = $this->db->get('Elder'); // get every data in the elder tabel into the query
            return $query->result_array();
        }
        $query = $this->db->get_where('Elder', array('ID_Elder' => $ID_Elder));
        return $query->row_array();
    }

    public function create_resident($post_image) {
        $Id_Elder = $this->input->post('ID_Elder'); //url_title will automatically replace space with '-'

        $data = array(
            'LastName' => $this->input->post('LastName'),
            'picture' => $post_image
        );
        //posts is the table name and the data array is called "data"
        return $this->db->insert('Elder', $data);
    }

    public function delete_resident($ID_Elder) {
        $this->db->where('ID_Elder', $ID_Elder);
        $this->db->delete('Elder');
        return true;
    }

    public function update_resident() {
        $ID_Elder = $this->input->post('ID_Elder');

        $data = array(
            'LastName' => $this->input->post('LastName'),
//            'description' => $this->input->post('description')
        );

        $this->db->where('ID_Elder', $this->input->post('ID_Elder'));
        return $this->db->update('Elder', $data);
    }


}
