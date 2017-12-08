<?php

class addfacility_control extends CI_Controller {

    public function find() {
        $data['title'] = 'Overview of facility';
        $data['facility'] = $this->Addfacility_model->get_facility();

        //$this->load->view('pages_care/addfacility');
       $this->load->view('pages_generalised/header_caregiver');
        $this->parser->parse('pages_caregiver/viewfacility', $data);
        $this->load->view('pages_generalised/footer');
    }
     public function view($ID_facility = NULL) {
        $data['facility'] = $this->Addfacility_model->get_facility($ID_facility); // use post_model to get the data in the database

        if (empty($data['facility'])) {
            show_404();
        }
        $data['$ID_facility'] = $data['facility']['ID_facility'];
       $this->load->view('pages_generalised/header_caregiver');
        $this->parser->parse('pages_caregiver/viewfacility', $data);
         $this->load->view('pages_generalised/footer');
    }
       
    public function addfacility() {
        //$data['title'] = 'Add Facility';
        
        $this->form_validation->set_rules('Name', 'Name', 'required');
         $this->form_validation->set_rules('City', 'City', 'required');
        if ($this->form_validation->run() === FALSE) {
             $this->load->view('pages_generalised/header_caregiver');
            $this->load->view('pages_caregiver/addfacility');
             $this->load->view('pages_generalised/footer');
        } else {
                       
            $this->Addfacility_model->create_facility();
            redirect('addfacility_control/find');
        }
    }

    public function delete($ID_facility) {
        $this->Addfacility_model->delete_facility($ID_facility);
        redirect('addfacility_control/find'); // after click delete button you redirect to post page
    }

    public function edit($ID_facility) {
        $data['facility'] = $this->Addfacility_model->get_facility($ID_facility); // use post_model to get the data in the database
        if (empty($data['facility'])) {
            show_404();
        }
        $data['title'] = 'Edit Facility';
         $this->load->view('pages_generalised/header_caregiver');
        $this->load->view('pages_care/editfacility', $data);
        $this->load->view('pages_generalised/footer');
    }

    public function update() {
        $this->Addfacility_model->update_facility();
        redirect('addfacility_control');
    }

}
