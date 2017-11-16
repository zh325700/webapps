<?php

class Residents_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_residents($id_elder = FALSE) {
        if ($id_elder === FALSE) {
            $this->db->order_by('elder.id_elder', 'DESC'); // order by ID Descending 
//            $this->db->join('categories','categories.id = posts.category_id');   // so you can get acess to the data in the table categories
            $query = $this->db->get('elder'); // get every data in the elder tabel into the query
            return $query->result_array();
        }
        $query = $this->db->get_where('elder', array('id_elder' => $id_elder));
        return $query->row_array();
    }

    public function create_resident($post_image) {
        $id_elder = $this->input->post('id_elder'); //url_title will automatically replace space with '-'

        $data = array(
            'lastname' => $this->input->post('lastname'),
//            'slug' => $slug,
            'description' => $this->input->post('description'),
//            'category_id' => $this->input->post('category_id'),
            'picture' => $post_image
        );
        //posts is the table name and the data array is called "data"
        return $this->db->insert('elder', $data);
    }

    public function delete_resident($id) {
        $this->db->where('id_elder', $id);
        $this->db->delete('elder');
        return true;
    }

    public function update_resident() {
        $id_elder = $this->input->post('id_elder');

        $data = array(
            'lastname' => $this->input->post('lastname'),
            'description' => $this->input->post('description')
        );

        $this->db->where('id_elder', $this->input->post('id_elder'));
        return $this->db->update('elder', $data);
    }


}
