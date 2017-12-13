<?php

class AdminRegister extends CI_Controller {

    public function register_caregiver() {

        $data['facilities'] = $this->Residents_model->get_facilities();   // gte the names of facility

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email Address', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('ID_Facility', 'ID Facility', 'required');
        $this->form_validation->set_rules('Admin_Level', 'Admin Level', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('pages_admin/registerCaregiver', $data);
        } else {

            $ID_facility = $_POST['ID_Facility'];            // in the database you have ID_facility, So I hardcode it for now to insert ID_facility in the database

            $error_msg = "";

            if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['Admin_Level'])) {
                // Sanitize and validate the data passed in
                $admin = filter_input(INPUT_POST, 'Admin_Level', FILTER_SANITIZE_NUMBER_FLOAT);
                $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    // Not a valid email
                    $error_msg .= '<p class="error">The email address you entered is not valid</p>';
                }

                $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
                if (strlen($password) != 128) {
                    // The hashed pwd should be 128 characters long.
                    // If it's not, something really odd has happened
                    $error_msg .= '<p class="error">Invalid password configuration.</p>';
                }

                // Username validity and password validity have been checked client side.
                // This should should be adequate as nobody gains any advantage from
                // breaking these rules.
                //
            if ($this->Admin_Model->select_caregiverID_By_Email()) {
                    $error_msg .= '<p class="error">A user with this email address already exists.</p>';
                }
                if (empty($error_msg)) {
                    // Create a random salt
                    $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));

                    // Create salted password 
                    $password = hash('sha512', $password . $random_salt);

                    // Insert the new user into the database 
                    if (!$this->Admin_Model->register_cgto_db($username, $email, $password, $random_salt, $admin, $ID_facility)) { // if insert fails
                        header('Location: ./error.php?err=Registration failure: INSERT');
//                exit();
                    }
                    header('Location: ./delete.php');
//            exit();
                }
            }
            
            redirect('Welcome/index/login');
        }
    }

}
