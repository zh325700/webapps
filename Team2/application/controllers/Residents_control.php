<?php

class Residents_control extends CI_Controller {

    public function index() {
        $data['title'] = 'Latest Posts';

        $data['residents'] = $this->Residents_model->get_residents();

        $this->load->view('templates_residents/header');
        $this->load->view('pages_care/index', $data);
        $this->load->view('templates_residents/footer');
    }

    public function view($id_elder = NULL) {
        $data['residents'] = $this->Residents_model->get_residents($id_elder); // use post_model to get the data in the database

        if (empty($data['residents'])) {
            show_404();
        }
        $data['id_elder'] = $data['residents']['id_elder'];
        $this->load->view('templates_residents/header');
        $this->load->view('pages_care/view', $data);
        $this->load->view('templates_residents/footer');
    }

    public function create() {
        $data['title'] = 'Create Residents';
        
        $this->form_validation->set_rules('lastname', 'Lastname', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates_residents/header');
            $this->load->view('pages_care/create', $data);
            $this->load->view('templates_residents/footer');
        } else {
            //upload image
            $config['upload_path'] = './images/icons';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '1000';
            $config['max_height'] = '1000';
            
            $this->load->library('upload',$config);
            
            if(!$this->upload->do_upload()){
                $errors = array('error' => $this->upload->display_errors());
                $post_image = 'noimage.png';
            }else{
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }
            
            $this->Residents_model->create_resident($post_image);
            redirect('Residents_control');
        }
    }

    public function delete($id_elder) {
        $this->Residents_model->delete_resident($id_elder);
        redirect('Residents_control'); // after click delete button you redirect to post page
    }

    public function edit($id_elder) {
        $data['resident'] = $this->Residents_model->get_residents($id_elder); // use post_model to get the data in the database
//        $data['categories'] = $this->post_model->get_categories();
        if (empty($data['resident'])) {
            show_404();
        }
        $data['title'] = 'Edit Resident';
        $this->load->view('templates_residents/header');
        $this->load->view('pages_care/edit', $data);
        $this->load->view('templates_residents/footer');
    }

    public function update() {
        $this->Residents_model->update_resident();
        redirect('Residents_control');
    }

}
