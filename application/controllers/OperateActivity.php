<?php

class OperateActivity extends CI_Controller {

    public function addActivity() {
        $this->load->model('Language_model');
        $data = $this->Language_model->getData($this->session->userdata('language'), 'addres');
        $data = $this->Language_model->getData('Dutch', 'addres');
        $data['title'] = 'Create Activity';
        $data['facilities'] = $this->Residents_model->get_facilities();   // gte the names of facility
        $this->form_validation->set_rules('Title', 'Title', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->parser->parse('pages_caregiver/createActivity', $data);
            $this->load->view('pages_generalised/footer');
        } else {
            $this->Activity_Model->create_activity();
            $uri = base_url()."index.php/Welcome/Overview/newOverView";
            echo "<script>javascript:alert('successfully add new activity'); window.location = '".$uri."'</script>";

        }
    }

}
