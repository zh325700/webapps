<?php
    class Pages extends CI_Controller{
        public function view($page = 'home'){ /*searching for home if not provided*/
            if(!file_exists(APPPATH.'views/pages_residents/'.$page.'.php')){
                show_404();
            }
            $questions=array("How do you think of the caregiver Anna?","Are you okay with the food provided in the morning?");
            $count = 0;
            $data['title'] = ucfirst($page);/*title variable = page variable in this case we passing about then show about*/
            $data['qnum1']=$questions[0];
            $data['qnum2']=$questions[1];
            
            $this->load->view('templates_residents/header');
            $this->load->view('pages_residents/'.$page,$data);
            $this->load->view('templates_residents/footer');
        }
    }