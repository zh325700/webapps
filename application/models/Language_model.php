<?php
    class Language_model extends CI_Model{
        
        /*getData
         * Function:depending on the input calls the right function 
         *          which get the lines from the language files and put them into an array
         *          and send this array back to the controller
         * Input:language: the selected language
         *       page: the page that will be shown, 
         *              so this decides the placeholders that should be filled in
         *       elder: if is send, the ID of the elderly
         * Output: the language data to be filled in into the placeholders
         */
        public function getData($language,$page,$elder=Null){
            $this->load->helper('form');
            //$elder=$this->session->userdata('item');
            if(isset($elder)){
                $language=$this->getLanguage($elder);
            }
            if($language=='English'){
               $this->lang->load('english_lang','English');
            }
            elseif($language=='Dutch'){
                $this->lang->load('Dutch_lang','dutch');
            } 
            if($page == 'login'){
                $data=$this->DataLogin();
            }
            elseif($page== 'newOverView'){
                $data=$this->DataOverview();
            }
            elseif($page== 'findres'){
                $data=$this->DataFindRes();
            }
            elseif($page=='addres'){
                $data=$this->DataAddRes();
            }
            elseif($page=='editres'){
                $data=$this->DataEditRes();
            }
            elseif ($page=='findfac') {
                $data=$this->DataFindFac();
            }
            elseif ($page=='addfac') {
                $data=$this->DataAddFac();
            }
            elseif ($page=='categories') {
                $data=$this->DataCat();
            }
            elseif ($page=='menu') {
                $data=$this->DataMen();
            }
            elseif ($page=='fontsizechoose') {
                $data=$this->DataFont();
            }
            elseif ($page=='question') {
                $data=$this->DataQes();
            }
            elseif($page=='viewres'){
                $data=$this->DataViewRes();
            }
            elseif($page=='general'){
                $data=$this->getDataGeneral();
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
            $data['Add_Caregiver']=$this->lang->line('Add_Caregiver');
            $data['Division_Timestamp']=$this->lang->line('Division_Timestamp');
            return $data;
        }
        
        public function DataElderChart(){
            $data['Name']=$this->lang->line('Name');
            $data['Number_filled']=$this->lang->line('Number_filled');
            $data['Average_Score']=$this->lang->line('Average_Score');
            $data['RoomNumber']=$this->lang->line('RoomNumber');
            $data['Worst_Topic']=$this->lang->line('Worst_Topic');
            $data['Best_Topic']=$this->lang->line('Best_Topic');
            $data['alert_box']=$this->lang->line('alert_box');
            return $data;
        }
        
        public function DataTopicChart(){
            $data['Score']=$this->lang->line('Score');
            $data['Number_filled']=$this->lang->line('Number_filled');
            $data['Average_Score']=$this->lang->line('Average_Score');
            $data['Question']=$this->lang->line('Question');
            $data['Topic']=$this->lang->line('Topic');
            return $data;
        }
        
        public function DataFindRes(){
            $data['Find_Residents']=$this->lang->line('Find_Resident');
            $data['FirstName']=$this->lang->line('FirstName');
            $data['LastName']=$this->lang->line('LastName');
            $data['Gender']=$this->lang->line('Gender');
            $data['RoomNumber']=$this->lang->line('RoomNumber');
            $data['Facility']=$this->lang->line('Facility');
            $data['Select_Facility']=$this->lang->line('Select_Facility');
            $data['FIND']=$this->lang->line('FIND');  
            return $data;
        }
        
          public function DataAddRes(){
            $data['Add_Resident']=$this->lang->line('Add_Resident');
            $data['FirstName']=$this->lang->line('FirstName');
            $data['LastName']=$this->lang->line('LastName');
            $data['Gender']=$this->lang->line('Gender');
            $data['Birthday']=$this->lang->line('Birthday');
            $data['RoomNumber']=$this->lang->line('RoomNumber');
            $data['Facility']=$this->lang->line('Facility');
            $data['Add_FirstName']=$this->lang->line('Add_FirstName');
            $data['Add_LastName']=$this->lang->line('Add_LastName');
            $data['Select_Facility']=$this->lang->line('Select_Facility');
            $data['Add_Roomnumber']=$this->lang->line('Add_Roomnumber');
            $data['Upload_Image']=$this->lang->line('Upload_Image');  
            return $data;
        }
        
        public function DataViewRes(){
            $data['FirstName']=$this->lang->line('FirstName');
            $data['LastName']=$this->lang->line('LastName');
            $data['Gender']=$this->lang->line('Gender');
            $data['Birthday']=$this->lang->line('Birthday');
            $data['RoomNumber']=$this->lang->line('RoomNumber');
            $data['Facility']=$this->lang->line('Facility');
            $data['MemberSince']=$this->lang->line('Member_Since');
            return $data;
        }
                
        
        public function DataEditRes(){
            $data['Add_Resident']=$this->lang->line('Add_Resident');
            $data['FirstName']=$this->lang->line('FirstName');
            $data['LastName']=$this->lang->line('LastName');
            $data['Gender']=$this->lang->line('Gender');
            $data['Birthday']=$this->lang->line('Birthday');
            $data['RoomNumber']=$this->lang->line('RoomNumber');
            $data['Facility']=$this->lang->line('Facility');
            $data['Add_FirstName']=$this->lang->line('Add_FirstName');
            $data['Add_LastName']=$this->lang->line('Add_LastName');
            $data['Select_Facility']=$this->lang->line('Select_Facility');
            $data['Add_Roomnumber']=$this->lang->line('Add_Roomnumber');
            $data['Upload_Image']=$this->lang->line('Upload_Image'); 
            $data['Edit_Residents']=$this->lang->line('Edit_Residents');
            $data['Edit_Resident']=$this->lang->line('Edit_Residents');
            return $data;
        }
        
        public function DataFindFac(){
            $data['City']=$this->lang->line('City');
            $data['Postcode']=$this->lang->line('Postcode');
            $data['Street']=$this->lang->line('Street');
            $data['Number']=$this->lang->line('Number');
            $data['Read_More']=$this->lang->line('Read_More');
            return $data;
        }
         public function DataAddFac(){
            $data['Facility_Name']=$this->lang->line('Facility_Name');
            $data['City']=$this->lang->line('City');
            $data['Post']=$this->lang->line('Postcode');
            $data['Street']=$this->lang->line('Street');
            $data['Number']=$this->lang->line('Number');
            $data['Add_New_Facility']=$this->lang->line('Add_New_Facility');
            $data['Add_Name']=$this->lang->line('Add_Name');
            $data['Add_City']=$this->lang->line('Add_City');
            $data['Add_Postcode']=$this->lang->line('Add_Postcode');
            $data['Add_Street']=$this->lang->line('Add_Street');
            $data['Add_number']=$this->lang->line('Add_number');
            $data['Add_Facility']=$this->lang->line('Add_Facility'); 
            return $data;
        }
        
        public function DataCat(){
            $data['Please_category']=$this->lang->line('Please_category');
            $data['Privacy']=$this->lang->line('Privacy');
            $data['Food']=$this->lang->line('Food');
            $data['and']=$this->lang->line('and');
            $data['Meals']=$this->lang->line('Meals');
            $data['Comfort']=$this->lang->line('Comfort');
            $data['Activities']=$this->lang->line('Activities');
            $data['Personal']=$this->lang->line('Personal');
            $data['relations']=$this->lang->line('relations');
            $data['Daily']=$this->lang->line('Daily');
            $data['decisions']=$this->lang->line('decisions');
            $data['Respect']=$this->lang->line('Respect'); 
            $data['by']=$this->lang->line('by');
            $data['Staff']=$this->lang->line('Staff'); 
            $data['resident']=$this->lang->line('resident');
            $data['bonding']=$this->lang->line('bonding'); 
            $data['responsiveness']=$this->lang->line('responsiveness');
            $data['Safety']=$this->lang->line('Safety'); 
            $data['Security']=$this->lang->line('Security');
            return $data;
        }
        public function DataMen(){
          $data['Weather_report']=$this->lang->line('Weather_report');
          $data['Family']=$this->lang->line('Family');
          $data['Questionnaire']=$this->lang->line('Questionnaire');
          $data['Activities']=$this->lang->line('Activities');
          $data['Log_out']=$this->lang->line('Log_out');
          return $data;
      }
      
       public function DataFont(){
          $data['Can_message']=$this->lang->line('Can_message');
          $data['maximum_font']=$this->lang->line('maximum_font');
          $data['Text_Message']=$this->lang->line('Text_Message');
          $data['Confirm']=$this->lang->line('Confirm');
          return $data;
      }
      
      public function DataQes(){
          $data['Previous']=$this->lang->line('Previous');
          $data['Question']=$this->lang->line('Question');
          $data['Never']=$this->lang->line('Never');
          $data['Rarely']=$this->lang->line('Rarely');
          $data['Sometimes']=$this->lang->line('Sometimes');
          $data['Most_time']=$this->lang->line('Most_time');
          $data['Always']=$this->lang->line('Always');
          return $data;
      }
      
      public function getLanguage($ID_elder){
        $this->db->select('Language language');
        $this->db->where('ID_Elder',$ID_elder);
        $this->db->from('Elder');
        $query= $this->db->get();
        $data=$query->result();
        return $data;
      }
      
        public function getDataGeneral(){
            $data["More_Info"]="Meer informatie";
            $data['division']="";
            $data["RoomNumber"]=$this->lang->line('RoomNumber');
            $data["FirstName"]=$this->lang->line('FirstName');
            $data["LastName"]=$this->lang->line('LastName');
            $data["Score"]=$this->lang->line('Score');
            $data["Question"]=$this->lang->line('Question');
            $data["avg_Score"]=$this->lang->line('avg_Score');
            $data["title_tab1"]=$this->lang->line('title_general1');
            $data["title_tab2"]=$this->lang->line('title_general2');
            return $data;
        }
    }

?>
