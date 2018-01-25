<?php

class CaregiverFacility extends CI_Controller {

    public function find() {
        $this->load->model('Language_model');
        $data['text']=$this->Language_model->getData($this->session->userdata('language'),'findfac');
        $data['facility'] = $this->Addfacility_model->get_facility();

        $this->load->view('pages_generalised/header');
        $this->parser->parse('pages_generalised/caregiver',$data['text']['header']);
        $this->parser->parse('pages_caregiver/viewFacility', $data);
        $this->parser->parse('pages_generalised/footer',$data['text']['footer']);
    }
    
    public function view($ID_facility = NULL) {
        $this->load->model('Language_model');
        $data=$this->Language_model->getData($this->session->userdata('language'),'addfac');
        $data['facility'] = $this->Addfacility_model->get_facility($ID_facility); // use post_model to get the data in the database

        if (empty($data['facility'])) {
            show_404();
        }
        $data['$ID_facility'] = $data['facility']['ID_facility'];
        $this->load->view('pages_generalised/header');
        $this->parser->view('pages_generalised/caregiver',$data['header']);
        $this->parser->parse('pages_caregiver/viewFacility', $data);
        $this->parse->view('pages_generalised/footer',$data['footer']);
    }
       
    public function addfacility() {
        //$data['title'] = 'Add Facility';
        $this->load->model('Language_model');
        $data=$this->Language_model->getData($this->session->userdata('language'),'addfac');
        $data['title'] = 'Add Facility';
        $this->form_validation->set_rules('Name', 'Name', 'required');
        $this->form_validation->set_rules('City', 'City', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('pages_generalised/header');
            $this->parser->parse('pages_generalised/caregiver',$data['header']);
            $this->parser->parse('pages_caregiver/addFacility',$data);
            $this->parser->parse('pages_generalised/footer',$data['footer']);
        } else {
                       
            $this->Addfacility_model->create_facility();
            redirect('addfacility_control/find');
        }
    }

    public function delete($ID_facility) {
        $this->Addfacility_model->delete_facility($ID_facility);
        redirect('addfacility_control/find'); // after click delete button you redirect to post page
    }

    public function edit($ID_facility = 1) {
        $data['facility'] = $this->Addfacility_model->get_facility($ID_facility); // use post_model to get the data in the database
        $this->load->model('Language_model');
        $data=$this->Language_model->getData($this->session->userdata('language'),'addfac');
        if (empty($data['facility'])) {
            show_404();
        }
            $data['title'] = 'Edit Facility';
            $this->load->view('pages_generalised/header');
            $this->parser->parse('pages_generalised/caregiver',$data['header']);
            $this->parser->parse('pages_caregiver/editFacility', $data);
            $this->parser->parse('pages_generalised/footer',$data['footer']);
    }

    public function update($ID_facility) {
        $data['facility'] = $this->Addfacility_model->get_facility($ID_facility);
        
        $this->form_validation->set_rules('Name', 'Name', 'required');
        $this->form_validation->set_rules('City', 'City', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('pages_generalised/header');
            $this->load->view('pages_generalised/caregiver');
            $this->load->view('pages_caregiver/editFacility',$data);
            $this->load->view('pages_generalised/footer');
        } else {
                       
            $this->Addfacility_model->update_facility();
            redirect('CaregiverFacility/find'); //redirects
           
        }
    }
        
 }


