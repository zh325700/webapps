<?php
    class Language_model extends CI_Model{
        
        /*
         * Function:depending on the input calls the right function 
         *          which get the lines from the language files and put them into an array
         *          and send this array back to the controller
         * Input:language: the selected language
         *       page: the page that will be shown, 
         *              so this decides the placeholders that should be filled in
         *       elder: if is send, the ID of the elderly
         * Output: the language data to be filled in into the placeholders
         */
        public function getData($language,$page,$elder=-1){
            //loads in the form and if there is an elder_id given it calls the function to determine the language of that person
            $this->load->helper('form');
            if($elder!=-1){$language=$this->getLanguage($elder)[0]->language;}
            //loads the right language file according to the selected language
            if($language==='Dutch'){$this->lang->load('Dutch_lang','Dutch');}
            else{$this->lang->load('english_lang','english');}
            //calls the right method according to the selected page
            if($page==='login'){$data=$this->getDataLogin();}
            elseif($page==='newOverView'){$data=$this->getDataOverview();}
            elseif($page==='findres'){$data=$this->getDataFindRes();}
            elseif($page==='addres'){ $data=$this->getDataAddRes();}
            elseif($page==='editres'){$data=$this->getDataEditRes();}
            elseif ($page==='findfac'){ $data=$this->getDataFindFac();}
            elseif ($page==='addfac'){$data=$this->getDataAddFac();}
            elseif ($page==='categories'){$data=$this->getDataCat();}
            elseif ($page==='menu'){$data=$this->getDataMen();}
            elseif ($page==='question'){$data=$this->getDataQes();}
            elseif($page==='viewres'){$data=$this->getDataViewRes();}
            elseif($page==='general'){$data=$this->getDataGeneral();}
            elseif($page==='overdiv'){$data=$this->getDataOverdiv();}
            elseif($page==='overtime'){$data=$this->getDataOvertime();}
            elseif($page==='addcar'){$data=$this->getDataAddCare();}
            elseif($page==='loginres'){$data=$this->getDataLoginres();}
            elseif($page==='loginverres'){$data=$this->getDataLoginverres();}
            elseif($page=='elderchart'){$data=$this->getDataElderChart();}
            elseif($page=='topicchart'){$data=$this->getDataTopicChart();}
            elseif($page==='editfac'){$data=$this->getDataEditFac();}
            elseif($page==='addact'){$data=$this->getDataAddAct();}
            elseif($page==='wieawect'){$data=$this->getDataViewAct();}
            $data['header']=$this->getDataHeader();
            $data['footer']=$this->getDataFooter();
            return $data;
        }
        
        /*
         * Output: the right values to the keys for the login screen
         */
        public function getDataLogin() {
            $data['Username/e-mail']=$this->lang->line('username/email');
            $data['password']=$this->lang->line('password');
            $data['login']=$this->lang->line('login');
            return $data;
        }
       
        /*
         * Output: the right values to the keys for the overview activities screen
         */
        public function getDataViewAct() {
            $data['Activity_information']=$this->lang->line('Activity_information');
            $data['Title']=$this->lang->line('Title');
            $data['Time']=$this->lang->line('Time');
            $data['Number_Of_Participants']=$this->lang->line('Number_Of_Participants');
            $data['Description']=$this->lang->line('Description');
            $data['EDIT']=$this->lang->line('EDIT');
            return $data;
        }
        
        /*
         * Output: the right values to the keys for the add activities screen
         */
        public function getDataAddAct() {
            $data['Add_Activity']=$this->lang->line('Add_Activity');
            $data['Title']=$this->lang->line('Title');
            $data['Time']=$this->lang->line('Time');
            $data['Number_Of_Participants']=$this->lang->line('Number_Of_Participants');
            $data['Description']=$this->lang->line('Description');
            $data['Add_Time']=$this->lang->line('Add_Time');
            $data['Add_Activity_Title']=$this->lang->line('Add_Activity_Title');
            $data['Add_Activity_description']=$this->lang->line('Add_Activity_description');
            return $data;
        }
        
        /*
         * Output: the right values to the keys for the Data overview screen
         */
        public function getDataOverview(){
            $data['general']=$this->lang->line('general');
            $data['Find_Resident']=$this->lang->line('Find_Resident');
            $data['Add_Resident']=$this->lang->line('Add_Resident');
            $data['Login_Resident']=$this->lang->line('Login_Resident');
            $data['Add_Facility']=$this->lang->line('Add_Facility');
            $data['Find_Facility']=$this->lang->line('Find_Facility');
            $data['Add_Caregiver']=$this->lang->line('Add_Caregiver');
            $data['Division_Timestamp']=$this->lang->line('Division_Timestamp');
            $data['Add_Activity']=$this->lang->line('Add_Activity');
            $data['Log_out']=$this->lang->line('Log_out');
            return $data;
        }
        
        /*
         * Output: the right values to the keys for the Elder chart screen
         */
        public function getDataElderChart(){
            $data['Name']=$this->lang->line('Name');
            $data['Number_filled']=$this->lang->line('Number_filled');
            $data['Average_Score']=$this->lang->line('Average_Score');
            $data['RoomNumber']=$this->lang->line('RoomNumber');
            $data['Worst_Topic']=$this->lang->line('Worst_Topic');
            $data['Best_Topic']=$this->lang->line('Best_Topic');
            $data['Alert_box']=$this->lang->line('Alert_box');
            $data['Back']=$this->lang->line('Back');
            $data['Resident_statistic']=$this->lang->line('Resident_statistic');
            return $data;
        }
        
        /*
         * Output: the right values to the keys for the topic chart screen
         */
        public function getDataTopicChart(){
            $data['Score']=$this->lang->line('Score');
            $data['Number_filled']=$this->lang->line('Number_filled');
            $data['Average_Score']=$this->lang->line('Average_Score');
            $data['Question']=$this->lang->line('Question');
            $data['Topic']=$this->lang->line('Topic');
            $data['Back']=$this->lang->line('Back');
            $data['Question_statistic']=$this->lang->line('Question_statistic');
            return $data;
        }
        
        /*
         * Output: the right values to the keys for the find residents screen
         */
        public function getDataFindRes(){
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
        
        /*
         * Output: the right values to the keys for the add residents screen
         */
        public function getDataAddRes(){
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
          $data['Day/Month/Year']=$this->lang->line('Day/Month/Year');
          return $data;
        }
        
        public function getDataEditFac(){
            $data['Facility_Name']=$this->lang->line('Facility_Name');
            $data['Name']=$this->lang->line('Name');
            $data['City']=$this->lang->line('City');
            $data['Postcode']=$this->lang->line('Postcode');
            $data['Street']=$this->lang->line('Street');
            $data['Number']=$this->lang->line('Number');
            $data['Edit_Facility']=$this->lang->line('Edit_Facility');
            $data['Add_Name']=$this->lang->line('Add_Name');
            $data['Add_City']=$this->lang->line('Add_City');
            $data['Add_Postcode']=$this->lang->line('Add_Postcode');
            $data['Add_Street']=$this->lang->line('Add_Street');
            $data['Add_Number']=$this->lang->line('Add_number');
            $data['Add_Facility']=$this->lang->line('Add_Facility'); 
            $data['EDIT']=$this->lang->line('EDIT');
        }


        /*
         * Output: the right values to the keys for the view residents screen
         */
        public function getDataViewRes(){
            $data['FirstName']=$this->lang->line('FirstName');
            $data['LastName']=$this->lang->line('LastName');
            $data['Gender']=$this->lang->line('Gender');
            $data['Birthday']=$this->lang->line('Birthday');
            $data['RoomNumber']=$this->lang->line('RoomNumber');
            $data['Facility']=$this->lang->line('Facility');
            $data['MemberSince']=$this->lang->line('Member_Since');
            $data['EDIT']=$this->lang->line('EDIT');
            $data['DELETE']=$this->lang->line('DELETE');
            $data['MemberSince']=$this->lang->line('Member_Since');
            $data['Information_resident']=$this->lang->line('Information_resident');
            return $data;
        }
                
        /*
         * Output: the right values to the keys for the edit residents screen
         */
        public function getDataEditRes(){
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
            $data['Day/Month/Year']=$this->lang->line('Day/Month/Year');
            $data['EDIT']=$this->lang->line('EDIT');
            return $data;
        }
        
        /*
         * Output: the right values to the keys for the find facility screen
         */
        public function getDataFindFac(){
            $data['City']=$this->lang->line('City');
            $data['Postcode']=$this->lang->line('Postcode');
            $data['Street']=$this->lang->line('Street');
            $data['Number']=$this->lang->line('Number');
            $data['Overview_Facility']=$this->lang->line('Overview_Facility');
            $data['EDIT']=$this->lang->line('EDIT');
            $data['DELETE']=$this->lang->line('DELETE');
            return $data;
        }
        
        /*
         * Output: the right values to the keys for the add facility screen
         */
        public function getDataAddFac(){
           $data['Facility_Name']=$this->lang->line('Facility_Name');
           $data['Name']=$this->lang->line('Name');
           $data['City']=$this->lang->line('City');
           $data['Postcode']=$this->lang->line('Postcode');
           $data['Street']=$this->lang->line('Street');
           $data['Number']=$this->lang->line('Number');
           $data['Add_New_Facility']=$this->lang->line('Add_New_Facility');
           $data['Add_Name']=$this->lang->line('Add_Name');
           $data['Add_City']=$this->lang->line('Add_City');
           $data['Add_Postcode']=$this->lang->line('Add_Postcode');
           $data['Add_Street']=$this->lang->line('Add_Street');
           $data['Add_Number']=$this->lang->line('Add_number');
           $data['Add_Facility']=$this->lang->line('Add_Facility'); 
           $data['EDIT']=$this->lang->line('EDIT');
           $data['DELETE']=$this->lang->line('DELETE');
           return $data;
        }
        
        /*
         * Output: the right values to the keys for the categories screen
         */
        public function getDataCat(){
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
            $data['the_caregivers']=$this->lang->line('the_caregivers');
            $data['Staff']=$this->lang->line('Staff'); 
            $data['resident']=$this->lang->line('resident');
            $data['bonding']=$this->lang->line('bonding'); 
            $data['responsiveness']=$this->lang->line('responsiveness');
            $data['Safety']=$this->lang->line('Safety'); 
            $data['Security']=$this->lang->line('Security');
            $data['Log_out']=$this->lang->line('Log_out');
            return $data;
        }
        
        /*
         * Output: the right values to the keys for the elder menu screen
         */
        public function getDataMen(){
            $data['Welcome']=$this->lang->line('Welcome');
            $data['Family']=$this->lang->line('Family');
            $data['Questionnaire']=$this->lang->line('Questionnaire');
            $data['Activities']=$this->lang->line('Activities');
            $data['Log_out']=$this->lang->line('Log_out');
            return $data;
        }
      
        /*
         * Output: the right values to the keys for the question screen
         */
        public function getDataQes(){
            $data['Previous']=$this->lang->line('Previous');
            $data['Question']=$this->lang->line('Question');
            $data['Never']=$this->lang->line('Never');
            $data['Rarely']=$this->lang->line('Rarely');
            $data['Sometimes']=$this->lang->line('Sometimes');
            $data['Most_time']=$this->lang->line('Most_time');
            $data['Always']=$this->lang->line('Always');
            $data['Ik_weet']=$this->lang->line('Ik_weet');
            $data['het_niet']=$this->lang->line('het_niet');
            $data['Ga_terug']=$this->lang->line('Ga_terug');
            return $data;
        }

        /*
         * Output: the right values to the keys for the general overview screen
         */
        public function getDataGeneral(){
            $data["More_Info"]="Meer informatie";
            $data['division']="";
            $data["RoomNumber"]=$this->lang->line('RoomNumber');
            $data["Name"]=$this->lang->line('Name');
            $data["Score"]=$this->lang->line('Score');
            $data["Question"]=$this->lang->line('Question');
            $data["avg_Score"]=$this->lang->line('avg_Score');
            $data["title_tab1"]=$this->lang->line('title_general1');
            $data["title_tab2"]=$this->lang->line('title_general2');
            return $data;
        }
        
        /*
         * Output: the right values to the keys for the division overview screen
         */
        public function getDataOverdiv(){
            $data["RoomNumber"]=$this->lang->line('RoomNumber');
            $data['division']="";
            $data["Name"]=$this->lang->line('Name');
            $data["Score"]=$this->lang->line('Score');
            $data["Question"]=$this->lang->line('Question');
            $data["avg_Score"]=$this->lang->line('avg_Score');
            $data["title_tab1"]=$this->lang->line('title_division');
            $data["title_tab2"]=$this->lang->line('title_division2');
            return $data;
        }
        
        /*
         * Output: the right values to the keys for the division timestamp overview screen
         */
        public function getDataOvertime(){
            $data["RoomNumber"]=$this->lang->line('RoomNumber');
            $data['division']="";
            $data["Name"]=$this->lang->line('Name');
            $data["Score"]=$this->lang->line('Score_Time');
            $data["title_tab1"]=$this->lang->line('title_time');
            return $data;
        }
        
        /*
         * Output: the right values to the keys for the login residents screen
         */
        public function getDataLoginres(){
            $data['Login_resident']=$this->lang->line('Login_resident');
            $data['Ik_ben_een']=$this->lang->line('Ik_ben_een');
            $data['Vrouw']=$this->lang->line('Vrouw');
            $data['Man']=$this->lang->line('Man');
            $data['Selecteer_foto']=$this->lang->line('Selecteer_foto');
            return $data;
        }
        
        /*
         * Output: the right values to the keys for the login resident verification screen
         */
        public function getDataLoginverres(){
            $data['Login_verificatie']=$this->lang->line('Login_verificatie');
            $data['Gelieve_geboortedag_vullen']=$this->lang->line('Gelieve_geboortedag_vullen');
            $data['ik_niet']=$this->lang->line('ik_niet');
            $data['Dit_ben']=$this->lang->line('Dit_ben');
            $data['Birthday']=$this->lang->line('Birthday');
            $data['delete']=$this->lang->line('delete');
            return $data;
        }
        
        /*
         * Output: the right values to the keys for the add caregiver screen
         */
        public function getDataAddCare(){
            $data['Facility']=$this->lang->line('Facility');
            $data['Select_Facility']=$this->lang->line('Select_Facility');
            $data['Register_Caregiver']=$this->lang->line('Register_Caregiver');
            $data['Add_Username']=$this->lang->line('Add_Username');
            $data['Username']=$this->lang->line('Username');
            $data['Add_password']=$this->lang->line('Add_password');
            $data['Username']=$this->lang->line('Username');
            $data['Email_address']=$this->lang->line('Email_address');
            $data['Add_Email']=$this->lang->line('Add_Email');
            $data['password']=$this->lang->line('password');
            $data['Confirm_Password']=$this->lang->line('Confirm_Password');
            $data['Type_Password_again']=$this->lang->line('Type_Password_again');
            $data['Permission_level']=$this->lang->line('Select_Adminlevel');
            $data['Select_Adminlevel']=$this->lang->line('Select_Adminlevel');
            $data['Caregiver']=$this->lang->line('Caregiver');
            $data['internship']=$this->lang->line('internship');
            $data['Boss']=$this->lang->line('Boss');
            $data['Create_Caregiver']=$this->lang->line('Create_Caregiver');
            return $data;
        }
        
        /*
        * Output: the right values to the keys for the header 
        */
        public function getDataHeader(){
            $data['HOME']=$this->lang->line('HOME');
            $data['Log_out']=$this->lang->line('Log_out');
            return $data;
        }
        
        /*
        * Output: the right values to the keys for the footer 
        */
        public function getDataFooter(){
            $data['Copyright']=$this->lang->line('Copyright');
            return $data;
        }
        
        /*  Function: looks in the database which language is selected for that elder
         * input: the elder_ID
         * Output: the language selected from the elder
         */
        public function getLanguage($ID_elder){
          $this->db->select('Language language');
          $this->db->where('ID_Elder',$ID_elder);
          $this->db->from('Elder');
          $query= $this->db->get();
          $data=$query->result();
          return $data;
        }
    }

?>
