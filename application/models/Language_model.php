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
                $data=$this->DataLogin();
            return $data;
        }
        
        public function DataLogin() {
            $data['Username/e-mail']=$this->lang->line('username/email');
            $data['password']=$this->lang->line('password');
            $data['login']=$this->lang->line('login');
            return $data;
        }
       
    }

?>