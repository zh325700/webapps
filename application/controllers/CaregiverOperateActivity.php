<?php

class CaregiverOperateActivity extends CI_Controller {

    public function addActivity() {
        $this->load->model('Language_model');
        $data = $this->Language_model->getData($this->session->userdata('language'), 'addact');
        $data['title'] = 'Create Activity';
        $data['facilities'] = $this->Residents_model->get_facilities();   // gte the names of facility
        $this->form_validation->set_rules('Title', 'Title', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('pages_generalised/header');
            $this->parser->parse('pages_caregiver/createActivity', $data);
            $this->parser->parse('pages_generalised/footer',$data['footer']);
        } else {
            $this->Activity_Model->create_activity();
            $uri = base_url() . "index.php/Welcome/Overview/newOverView";
            echo "<script>javascript:alert('successfully add new activity'); window.location = '" . $uri . "'</script>";
        }
    }

    public function viewActivity($ID_Activity = 2) {  // by default I make it 2 just to test
        $this->load->model('Language_model');
        $this->load->model('Activity_Model');
        $data=$this->Language_model->getData($this->session->userdata('language'),'viewact');
        $data['activity'] = $this->Activity_Model->get_Activity($ID_Activity); // use post_model to get the data in the database
        $data['count'] = $this->Activity_Model->get_numOfParticipants($ID_Activity);
        if (empty($data['activity'])) {
            show_404();
        }
        $data['$ID_Activity'] = $data['activity']['ID_Activity'];
        $this->load->view('pages_generalised/header');
        $this->parser->parse('pages_generalised/caregiver', $data['header']);
        $this->parser->parse('pages_caregiver/viewActivity', $data);
        $this->parser->parse('pages_generalised/footer', $data['footer']);
    }

    public function deleteActivity($ID_Activity) {
        $this->Activity_Model->delete_activity($ID_Activity);
        redirect('Welcome/Overview/newOverView'); // after click delete button you redirect to post page
    }
    
    public function getNewActivities(){
         $this->load->model('Activity_Model');
         $data = $this->Activity_Model->get_fewActivities(5);
         echo(json_encode($data));
    }

}
