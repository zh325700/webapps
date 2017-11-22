<?php

class Residents_control extends CI_Controller {

    public function index() {
        $data['title'] = 'Overview of residents';

        $data['residents'] = $this->Residents_model->get_residents();

        $this->load->view('templates_residents/header');
        $this->load->view('pages_care/index', $data);
        $this->load->view('templates_residents/footer');
    }

    public function view($ID_Elder = NULL) {
        $data['residents'] = $this->Residents_model->get_residents($ID_Elder); // use post_model to get the data in the database

        if (empty($data['residents'])) {
            show_404();
        }
        $data['$ID_Elder'] = $data['residents']['ID_Elder'];
        $this->load->view('pages_care/view', $data);
    }

    public function create() {
        $data['title'] = 'Create Residents';

        $this->form_validation->set_rules('LastName', 'LastName', 'required');
        $this->form_validation->set_rules('FirstName', 'FirstName', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('pages_care/create', $data);
        } else {
            //upload image
            $config['upload_path'] = './images/icons';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '1000';
            $config['max_height'] = '1000';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $errors = array('error' => $this->upload->display_errors());
                $post_image = 'noimage.png';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }

            $this->Residents_model->create_resident($post_image);
            redirect('index.php/Residents_control');
        }
    }

    public function delete($ID_Elder) {
        $this->Residents_model->delete_resident($ID_Elder);
        redirect('index.php/Residents_control'); // after click delete button you redirect to post page
    }

    public function edit($ID_Elder) {
        $data['resident'] = $this->Residents_model->get_residents($ID_Elder); // use post_model to get the data in the database
        if (empty($data['resident'])) {
            show_404();
        }
        $this->load->view('pages_care/edit', $data);
    }

    public function update() {
            //upload image
            $config['upload_path'] = './images/icons';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '1000';
            $config['max_height'] = '1000';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $errors = array('error' => $this->upload->display_errors());
                $post_image = 'noimage.png';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }

            $this->Residents_model->update_resident($post_image);
            redirect('index.php/Residents_control');
//        }
    }

}
