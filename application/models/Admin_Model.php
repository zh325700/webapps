<?php

class Admin_Model extends CI_Model {

    public function register_cgto_db($password, $random_salt) {

        $data = array(
            'username' => $this->input->post('username'), // this three should from the input area with name="username,admin,email"
            'permission' => $this->input->post('permission'),
            'email' => $this->input->post('email'),
//            'salt' => $random_salt, //this three variable are generated
            'password' => $password,
            'salt' => $random_salt,
            'ID_facility' => $this->input->post('ID_Facility')
        );
        //posts is the table name and the data array is called "data"
        return $this->db->insert('Caregiver', $data);
    }

    public function select_caregiverID_By_Email($email) {
        $query = $this->db->get_where('Caregiver', array('email' => $email));
        return $query->row_array();
    }

}
