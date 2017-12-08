<?php

class Admin_Model extends CI_Model {

    public function register_cgto_db($username, $email, $password, $random_salt, $admin,$ID_facility) {

        $data = array(
            'username' => $this->input->post('username'), // this three should from the input area with name="username,admin,email"
            'admin' => $this->input->post('admin'),
            'email' => $this->input->post('email'),
            'salt' => $random_salt, //this three variable are generated
            'password' => $password,
            'ID_facility' => $ID_facility
        );
        //posts is the table name and the data array is called "data"
        return $this->db->insert('Caregiver', $data);
    }

    public function select_caregiverID_By_Email($email) {
        $query = $this->db->get_where('Caregiver', array('email' => $email));
        return $query->row_array();
    }

}
