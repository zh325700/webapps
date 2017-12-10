<?php
    class Language_model extends CI_Model{
        
        public function getData($language,$page){
             $this->load->helper('form');
            if($language=='English'){
               $this->lang->load('english_lang','English');
            }
            elseif($language=='Dutch'){
                $this->lang->load('Dutch_lang','dutch');
            } 
            if($page == 'login'){
                $data=$this->DataLogin();
            }
            elseif($page== 'overview'){
                $data=$this->DataOverview();
            }
            return $data;
        }
        
        public function DataLogin() {
            $data['Username/e-mail']=$this->lang->line('username/email');
            $data['password']=$this->lang->line('password');
            $data['login']=$this->lang->line('login');
            return $data;
        }
       
        public function DataOverview(){
            $data['general']=$this->lang->line('general');
            $data['Find_Resident']=$this->lang->line('Find_Resident');
            $data['Add_Resident']=$this->lang->line('Add_Resident');
            $data['Login_Resident']=$this->lang->line('Login_Resident');
            $data['Add_Facility']=$this->lang->line('Add_Facility');
            $data['Find_Facility']=$this->lang->line('Find_Facility');
            return $data;
        }
    }

?>