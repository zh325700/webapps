<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Activity_Model extends CI_Model {

    public function create_activity() {
//        $Id_Elder = $this->input->post('ID_Elder'); 
        $data = array(
            'Title' => $this->input->post('Title'),
            'Time' => $this->input->post('Time'),
            'Description' => $this->input->post('Description'),
            'ID_facility' => $this->session->userdata('facility')
        );
        //posts is the table name and the data array is called "data"
        return $this->db->insert('Activity', $data);
    }

    public function get_Activity($ID_Activity = FALSE) {
        if ($ID_Activity === FALSE) {
            $this->db->order_by('Activity.ID_Activity', 'DESC'); // order by ID Descending 
            $query = $this->db->get('Activity'); // get every data in the elder tabel into the query
            return $query->result_array();
        }
        $query = $this->db->get_where('Activity', array('ID_Activity' => $ID_Activity));
        return $query->row_array();
    }

    public function delete_activity($ID_Activity) {
        $this->db->where('ID_Activity', $ID_Activity);
        $this->db->delete('ActivityLink');
        $this->db->where('ID_Activity', $ID_Activity);
        $this->db->delete('Activity');
        return true;
    }

    public function get_numOfParticipants($ID_Activity) {
        $this->db->select('*');
        $this->db->from('ActivityLink');
        $this->db->where('ID_Activity', $ID_Activity);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function doesAnElderParticipate($ID_Activity) {
		//~ checks if an elder participates to an activity
		$array = array(
			'ID_Activity' => $ID_Activity, 
			'ID_Elder' => $this->session->userdata('ID_Elder')
		);
		
		//~ search in database
		$this->db->where($array);
		$result = $this->db->get('ActivityLink');
		
		if ($result->num_rows() > 0) {
			//~ elder participates
			return '1';
		} else {
			//~ elder does not participate
			return '0';
		}
    }

    public function get_fewActivities($Num_Activity = 1) {
        $this->db->order_by('Activity.ID_Activity', 'DESC'); // order by ID Descending 
        $query = $this->db->get('Activity'); // get every data in the elder tabel into the query
        $allArray = $query->result_array();
        $eventArray = array();
        $newEventArray = array();
        
        foreach ($allArray as $oneActivity) {
            $time = strtotime($oneActivity['Time']);
            $curtime = time();
            if (($curtime - $time) < 0) {
				//~ the event is still to come
				$id = $oneActivity['ID_Activity'];
				$oneActivity['participates'] = $this->doesAnElderParticipate($id);
				$newEventArray[] = $oneActivity;
            }
        }
        //~ now we have all upcoming events in an array
        
        foreach ($newEventArray as $key => $row) {
			$ID_Activity[$key]  = $row['ID_Activity'];
			$Title[$key] = $row['Title'];
			$Description[$key] = $row['Description'];
			$Time[$key] = $row['Time'];
		}
        array_multisort($Time, SORT_ASC, $newEventArray);
        //~ now we have a sorted list by date 
        
        while( $Num_Activity > sizeof($eventArray) && sizeof($newEventArray) > 0 ){
			$eventArray[] = array_shift($newEventArray);
		}
		//~ now we only have the asked amount of activities
		
        return $eventArray;
    }
    
	public function participate_activity($ID_Activity) {
		//~ If the elder already participates in the activity, the link will be deleted and he/she will no longer participate
		//~ If the elder does not participate in the activity, a link will be created and he/she will be participating
		$array = array(
			'ID_Activity' => $ID_Activity, 
			'ID_Elder' => $this->session->userdata('ID_Elder')
		);
		
		//~ search in database
		$this->db->where($array);
		$result = $this->db->get('ActivityLink');
		
		if ($result->num_rows() > 0) {
			//~ delete if already in database
			$this->db->where($array);
			$this->db->delete('ActivityLink');
			return false;
		} else {
			//~ join if not in database already
			$this->db->insert('ActivityLink', $array);
			return true;
		}
    }

}
