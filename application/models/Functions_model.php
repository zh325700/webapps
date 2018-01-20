<?php
class Functions_model extends CI_Model{
    
    function checkbrute($user_id){
        // Get timestamp of current time 
        $now = time();
        
        // All login attempts are counted from the past 2 hours. 
        $valid_attempts = $now - (2 * 60 * 60);
        
        $sql = "SELECT time FROM login_attempts WHERE ID_Caregiver = ? AND time > '$valid_attempts'";
        $query = $this->db->query($sql, array($user_id));
        
        if($query->num_rows > 5){
            return true;
        } else {
            return false;
        }
    }
    
    function login_check(){
        // Check if all session variables are set 
        if(isset($this->session->user_id, $this->session->username, $this->session->login_string)){
            $user_id = $this->session->user_id;
            $login_string = $this->session->login_string;
            $username = $this->session->username;
            
            // Get the user-agent string of the user.
            $user_browser = $this->input->server('HTTP_USER_AGENT');
            
            $sql = "SELECT password FROM Caregiver WHERE ID_Caregiver = ? LIMIT 1";
            $query = $this->db->query($sql, array($user_id));
            
            if($query->num_rows == 1){
                // If the user exists get variables from result.
                $password = $query->password;
                $login_check = hash('sha512', $password . $user_browser);
                
                if($login_check == $login_string){
                    // Logged In!!!!
                    return true;
                } else {
                    // Not logged in 
                    return false;
                }
            } else {
                // Not logged in 
                return false;
            }
        }
    }

	function esc_url($url) {
		if ('' == $url){
			return $url;
		}
		
		$url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
		
		$strip = array('%0d', '%0a', '%0D', '%0A');
		$url = (string) $url;
		
		$count = 1;
		while ($count) {
			$url = str_replace($strip, '', $url, $count);
		}
		
		$url = str_replace(';//', '://', $url);
		
		$url = htmlentities($url);
		
		$url = str_replace('&amp;', '&#038;', $url);
		$url = str_replace("'", '&#039;', $url);

		if ($url[0] !== '/') {
			// We're only interested in relative links from $_SERVER['PHP_SELF']
			return '';
		} else {
			return $url;
		}
	} 
		
	function login($email, $password,$language){
		//getting the information of the account that is about to login
		$this->db->select('ID_Caregiver, username, password, salt, permission');
		$this->db->where('email', $email);
		$query = $this->db->get('Caregiver');
		
		//get variables from result
		$row = $query->row();
		if (isset($row)){
			//set variables
			$user_id = $row->ID_Caregiver;
			$username = $row->username;
			$db_password = $row->password;
			$salt = $row->salt;
			$permission = $row->permission;
			
			// hash the password with the unique salt.
			$password = hash('sha512', $password . $salt);
			
			// If the user exists we check if the account is locked
			// from too many login attempts 
			if ($this->checkbrute($user_id) == true){
				// Account is locked 
				// Send an email to user saying their account is locked 
				return false;
			} else {
				// Check if the password in the database matches
				// the password the user submitted.
				if ($db_password == $password){
					// Password is correct!
					// Get the user-agent string of the user.
					$user_browser = $this->input->server('HTTP_USER_AGENT');
					$login_string = hash('sha512', $password . $user_browser);
					
					$this->session->set_userdata('user_id', $user_id);
					$this->session->set_userdata('username', $username);
					$this->session->set_userdata('login_string', $login_string);
					$this->session->set_userdata('permission', $permission);
					$this->session->set_userdata('language',$language);
					//login succesful
					return true;
					
				} else {
					// Password is not correct
					// We record this attempt in the database
					$now = time();
					$data = array(
						'ID_Caregiver' => $user_id,
						'time' => $now
					);
					if(!($this->db->insert('login_attempts', $data))){
						echo "failed to submit to database";
						exit();
					}
					
					return false;
				}
			}
		} else {
			//user does not exist or failed to get information
			echo "database error: failed to fetch information from database or user does not exist";
			return false;
		}	
	}
}
