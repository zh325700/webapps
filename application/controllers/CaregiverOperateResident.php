<?php

class CaregiverOperateResident extends CI_Controller {

    public function find() {
        $this->load->model('Language_model');
        $data=$this->Language_model->getData($this->session->userdata('language'),'findres');
        $data['title'] = 'Overview of residents';
        $data['facilities'] = $this->Residents_model->get_facilities();
        $data['residents'] = $this->Residents_model->get_residents();
        $this->load->view('pages_generalised/header');
        $this->parser->parse('pages_generalised/caregiver',$data['header']);
        $this->parser->parse('pages_caregiver/findResident', $data);
        $this->parser->parse('pages_generalised/footer',$data['footer']);
    }

    public function view($ID_Elder = NULL) {
        $this->load->model('Language_model');
        $data=$this->Language_model->getData($this->session->userdata('language'),'viewres');
        $data['residents'] = $this->Residents_model->get_residents($ID_Elder); // use post_model to get the data in the database
        $data['fac_name'] = $this->Residents_model->get_FacilityName_by_ElderID($ID_Elder);
        if (empty($data['residents'])) {
            show_404();
        }
        $data['$ID_Elder'] = $data['residents']['ID_Elder'];
        $this->load->view('pages_generalised/header');
        $this->parser->parse('pages_generalised/caregiver',$data['header']);
        $this->parser->parse('pages_caregiver/viewResident', $data);
        $this->parser->parse('pages_generalised/footer',$data['footer']);
    }

    public function create() {
        $this->load->model('Language_model');
        $data=$this->Language_model->getData($this->session->userdata('language'),'addres');
        $data['title'] = 'Create Residents';
        $data['facilities'] = $this->Residents_model->get_facilities();   // gte the names of facility
        $this->form_validation->set_rules('LastName', 'LastName', 'required');
        $this->form_validation->set_rules('FirstName', 'FirstName', 'required');
        $this->form_validation->set_rules('Sex', 'Sex', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('pages_generalised/header');
            $this->parser->parse('pages_generalised/caregiver',$data['header']);
            $this->parser->parse('pages_caregiver/createResident', $data);
            $this->parser->parse('pages_generalised/footer',$data['footer']);
        } else {
            //upload image

            $config['upload_path'] = './image/photos/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['overwrite'] = TRUE;
            $config['max_size'] = '20480'; //20MB
            $config['max_width'] = '3000';
            $config['max_height'] = '3000';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('userfile')) {
                $errors = array('error' => $this->upload->display_errors());
                $post_image = 'noimage.png';
            } else {
                $zdata = array('upload_data' => $this->upload->data()); // get data
                $zfile = $zdata['upload_data']['full_path']; // get file path
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
                chmod($zfile . $post_image, 0755); // CHMOD file to be rwxr
            }

            $this->Residents_model->create_resident($post_image);

            redirect('CaregiverOperateResident/find');
        }
    }

    public function delete($ID_Elder) {
        $this->Residents_model->delete_resident($ID_Elder);
        redirect('CaregiverOperateResident/find'); // after click delete button you redirect to post page
    }

    public function edit($ID_Elder) {
        $this->load->model('Language_model');
        $data=$this->Language_model->getData($this->session->userdata('language'),'editres');
        $data['resident'] = $this->Residents_model->get_residents($ID_Elder); // use post_model to get the data in the database
        $data['facilities'] = $this->Residents_model->get_facilities();
        if (empty($data['resident'])) {
            show_404();
        }
        $this->load->view('pages_generalised/header');
        $this->parser->parse('pages_generalised/caregiver',$data['header']);
        $this->parser->parse('pages_caregiver/editResident', $data);
        $this->parser->parse('pages_generalised/footer',$data['footer']);
    }

    public function update() {
        $this->load->model('Language_model');
        $data=$this->Language_model->getData($this->session->userdata('language'),'editres');
        $data['facilities'] = $this->Residents_model->get_facilities();
//        $data['resident'] = $this->Residents_model->get_residents($_POST("ID_Elder"));
        //upload image
        $this->form_validation->set_rules('LastName', 'LastName', 'required');
        $this->form_validation->set_rules('FirstName', 'FirstName', 'required');
        $this->form_validation->set_rules('Sex', 'Sex', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('pages_generalised/header');
            $this->parser->parse('pages_generalised/caregiver',$data['header']);
            $this->parser->parse('pages_caregiver/editResident', $data);
            $this->parser->parse('pages_generalised/footer',$data['footer']);
        } else {
            $config['upload_path'] = './image/photos/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['overwrite'] = TRUE;
            $config['max_size'] = '20480'; //20MB
            $config['max_width'] = '3000';
            $config['max_height'] = '3000';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('userfile')) {
                $errors = array('error' => $this->upload->display_errors());
                $post_image = 'noimage.png';
            } else {
                $zdata = array('upload_data' => $this->upload->data()); // get data
                $zfile = $zdata['upload_data']['full_path']; // get file path
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
                chmod($zfile . $post_image, 0755); // CHMOD file to be rwxr
            }

            $this->Residents_model->update_resident($post_image);

            redirect('CaregiverOperateResident/find');
        }
    }

}
