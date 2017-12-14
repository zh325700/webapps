<?php

class AdminRegister extends CI_Controller {

    public function register_caregiver($error = null) {
        if($error){
            $new = str_replace( '%20',' ', $error);
            echo "<script type='text/javascript'>alert(\"$new\");</script>";
        }
        $data['facilities'] = $this->Residents_model->get_facilities();   // gte the names of facility

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email Address', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('ID_Facility', 'ID Facility', 'required');
        $this->form_validation->set_rules('permission', 'Permission Level', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('pages_admin/registerCaregiver', $data);
        } else {
            $email = $_POST["email"];
            $error_msg = "";
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
//            if (strlen($password) != 128) {
//                // The hashed pwd should be 128 characters long.
//                // If it's not, something really odd has happened
//                $error_msg .= '<p class="error">Invalid password configuration.</p>';
//            }
            if ($this->Admin_Model->select_caregiverID_By_Email($email)) {
                $error_msg .= 'A user with this email address already exists';
                header("location:register_caregiver/$error_msg");
            }
            if (empty($error_msg)) {
                // Create a random salt
                $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
                // Create salted password 
                $password = hash('sha512', $password . $random_salt);
                $this->Admin_Model->register_cgto_db($password, $random_salt);
                redirect('Welcome/index/login');
            }
            // Insert the new user into the database 
//                if (!$this->Admin_Model->register_cgto_db($password, $admin, $random_salt)) { // if insert fails
//                    header('Location: ./error.php?err=Registration failure: INSERT');
////                exit();
//                }
//                header('Location: ./delete.php');
////            exit();
//            }
        }
    }

}
