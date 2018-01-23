<?php

class AdminRegister extends CI_Controller {

    public function register_caregiver($error = null) {
        $this->load->model('Language_model');
        $data=$this->Language_model->getData($this->session->userdata('language'),'addcar');
        if($error){
            $new = str_replace( '%20',' ', $error);
            echo "<script type='text/javascript'>alert(\"$new\");</script>";
        }
        $data['facilities'] = $this->Residents_model->get_facilities();   // gte the names of facility

        $this->form_validation->set_rules('username', 'Username', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('pages_generalised/header');
            $this->parser->parse('pages_generalised/caregiver',$data['header']);
            $this->parser->parse('pages_admin/registerCaregiver', $data);
            $this->pasrer->parse('pages_generalised/footer',$data['footer']);
        } else {
            $email = $_POST["email"];
            $error_msg = "";
            $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
            if (strlen($password) != 128) {
                // The hashed pwd should be 128 characters long.
                // If it's not, something really odd has happened
                $error_msg.= $password;
                $error_msg .= 'Invalid password configuration';
                header("location:register_caregiver/$error_msg");
            }
            if ($this->Admin_Model->select_caregiverID_By_Email($email)) {
                $error_msg .= 'A user with this email address already exists';
                header("location:register_caregiver/$error_msg");
            }
            else if (empty($error_msg)) {
                // Create a random salt
                $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
                // Create salted password 
                $password = hash('sha512', $password . $random_salt);
                $this->Admin_Model->register_cgto_db($password, $random_salt);
                redirect('Welcome/index/login');
            }
        }
    }

}
