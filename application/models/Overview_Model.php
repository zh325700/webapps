<?php
    Class Overview_Model extends CI_Model{
        
        /*
         * Function:makes and sql query and execute it
         *          collect all the scores and info of it in the database
         * Input: the selected language
         * Output: the data collected from the database
         */
        public function getScores($language){
            if($language==='Dutch'){
                $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score, Questions.Type_nl Topic');
            }
            else{
                $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score, Questions.Type_en Topic');
            }
            $this->db->where("Answers.Score !=",-1);
            $this->db->join('Questions','Questions.ID_Question=Answers.ID_Question');
            $this->db->group_by('Questions.Type_en');
            $this->db->order_by('AVG(Answers.Score)',"asc");
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['avg_scores']=$query->result();
            return $data;
        }
        
        /*
         * Function:makes and sql query and execute it
         *          collect all the scores and info of it in the database
         * Input: the selected language
         * Output: the data collected from the database
         */
        public function getElderScore(){
            $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score, Elder.FirstName FirstName, Elder.LastName LastName, Elder.RoomNumber RoomNumber, Elder.ID_Elder Elder_ID ');
            $this->db->where("Answers.Score !=",-1);
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->group_by('Answers.ID_Elder');
            $this->db->order_by('AVG(Answers.Score)',"asc");
            $this->db->limit(10);
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['avg_scores']=$query->result();
            return $data;
        }
        
        public function getElderScoreDivision($division){
            $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score, Elder.FirstName FirstName, Elder.LastName LastName, Elder.RoomNumber RoomNumber, Elder.ID_Elder Elder_ID ');
            $this->db->where("Answers.Score !=",-1);
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->where('Elder.Division',$division);
            $this->db->group_by('Answers.ID_Elder');
            $this->db->order_by('AVG(Answers.Score)',"asc");
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['avg_scores']=$query->result();
            return $data;
        }
        
        public function getQuestionScoreDivision($division,$language){
            if($language==='Dutch'){
                $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score, Questions.Type_nl Topic, Questions.Type_nl Topictest');  
            }
            else{
                $this->db->select('AVG(Answers.Score) avg_Score, Questions.Type_en Topic, Questions.Type_en Topictest');  
            }
            $this->db->where("Answers.Score !=",-1);
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->join('Questions','Questions.ID_Question=Answers.ID_Question');
            $this->db->where('Division',$division);
            $this->db->group_by('Questions.Type_en');
            $this->db->order_by('AVG(Answers.Score)',"asc");
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['avg_scores']=$query->result();
            return $data;
        }
        
        public function getElderScoreQuestion($ID_elder){
            $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score, Questions.Question Question Answers.ID_Elder ID_Elder ');
            $this->db->where("Answers.Score !=",-1);
            $this->db->join('Questions','Questions.ID_Question=Answers.ID_Question');
            $this->db->where('Answers.ID_Elder',$ID_elder);
            $this->db->group_by('Answers.ID_Question');
            $this->db->order_by('Answers.ID_Question');
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['avg_scores']=$query->result();
            return $data;
        }
        
        public function getElderScoreRecords($ID_elder){
            $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score, Questions.Question Question ');
            $this->db->where("Answers.Score !=",-1);
            $this->db->join('Questions','Questions.ID_Question=Answers.ID_Question');
            $this->db->where('Answers.ID_Elder',$ID_elder);
            $this->db->order_by('Answers.DateStamp');
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['avg_scores']=$query->result();
            return $data;
        }
        
        public function getQuestionScoreElders($ID_question){
            $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score, Elder.FirstName FirstName, Elder.LastName LastName, Elder.RoomNumber RoomNumber ');
            $this->db->where("Answers.Score !=",-1);
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->where('Answers.ID_Question',$ID_question);
            $this->db->group_by('Answers.ID_Elder');
            $this->db->order_by('AVG(Answers.avg_Score)',"desc");
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['avg_scores']=$query->result();
            return $data;
        }
        public function getQuestionScoreRecords($ID_question){
            $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score, Elder.FirstName FirstName, Elder.LastName LastName, Elder.RoomNumber RoomNumber ');
            $this->db->where("Answers.Score !=",-1);
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->where('Answers.ID_Question',$ID_question);
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['avg_scores']=$query->result();
            return $data;
        }
        
         public function getTimestampElders($division){
            $this->db->select('MAX(Answers.DateStamp) avg_Score, Elder.FirstName FirstName, Elder.LastName LastName, Elder.RoomNumber RoomNumber ');
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->where('Elder.division',$division);
            $this->db->group_by('Answers.ID_Elder');
            $this->db->order_by('Answers.DateStamp',"asc");
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['timestamps']=$query->result();
            return $data;
        }
        
        public function getDivisions($ID_facility){
            $this->db->select('DISTINCT(division) divisions');
            $this->db->where('ID_Facility',$ID_facility);
            $this->db->order_by('division');
            $this->db->from('Elder');
            $query=$this->db->get();
            $data['divisions']=$query->result();
            return $data;
        }
        
        public function getElderinfo($ID_elder){
            $this->db->select('FirstName FirstName,LastName LastName,RoomNumber RoomNumber,Picture Picture');
            $this->db->where('ID_Elder',$ID_elder);
            $this->db->from("Elder");
            $query=$this->db->get();
            $data['info']=$query->result();
            return $data;
        }
        
        public function getElderquestioninfo($ID_elder){
            $this->db->select('AVG(Score) avgScore,COUNT(Score) numberFilled');
            $this->db->where("Answers.Score !=",-1);
            $this->db->where('ID_Elder',$ID_elder);
            $this->db->from("Answers");
            $query=$this->db->get();
            $data['question']=$query->result();
            return $data;       
        }
        
        public function getElderWorstTopicInfo($ID_elder,$language){
            if($language==='Dutch'){
                $this->db->select('ROUND(AVG(Answers.Score),2) WorstScore,Questions.Type_nl WorstTopic');
            }
            else{
                $this->db->select('ROUND(AVG(Answers.Score),2) WorstScore,Questions.Type_en WorstTopic');
            }
            $this->db->where("Answers.Score !=",-1);
            $this->db->where('ID_Elder',$ID_elder);
            $this->db->join('Questions','Answers.ID_Question=Questions.ID_Question');
            $this->db->group_by('Questions.Type_en');
            $this->db->order_by('AVG(Answers.Score)','ASC');
            $this->db->limit(1);
            $this->db->from("Answers");
            $query=$this->db->get();
            $data['worsttopic']=$query->result();
            return $data;       
        }
        
        public function getElderBestTopicInfo($ID_elder,$language){
            if($language==='Dutch'){
                $this->db->select('ROUND(AVG(Answers.Score),2) avg_ScoreBest,Questions.Type_nl typeBest');
            }
            else{
                $this->db->select('ROUND(AVG(Answers.Score),2) avg_ScoreBest,Questions.Type_en typeBest');
            }
            $this->db->where("Answers.Score !=",-1);
            $this->db->where('ID_Elder',$ID_elder);
            $this->db->join('Questions','Answers.ID_Question=Questions.ID_Question');
            $this->db->group_by('Questions.Type_en');
            $this->db->order_by('AVG(Answers.Score)','DESC');
            $this->db->limit(1);
            $this->db->from("Answers");
            $query=$this->db->get();
            $data['besttopic']=$query->result();
            return $data;       
        }
        
        public function getScoreType($type,$ID_elder,$language){
            if($language==='Dutch'){
               $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score,Answers.DateStamp DateStamp,Questions.Question_nl question');
            }
            else{
                $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score,Answers.DateStamp DateStamp,Questions.Question_en question');
            }
            $this->db->where("Answers.Score !=",-1);
            $this->db->where('Questions.Type_en',$type);
            $this->db->or_where('Questions.Type_nl',$type);
            $this->db->where('Answers.ID_elder',$ID_elder);
            $this->db->join('Questions','Questions.ID_Question=Answers.ID_Question');
            $this->db->group_by('Answers.DateStamp');
            $this->db->from("Answers");
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function getTypes($language){
            if($language==='Dutch'){
                $this->db->select('DISTINCT(Type_nl) Type');
            }
            else{
                $this->db->select('DISTINCT(Type_en) Type');
            }
            $this->db->from('Questions');
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function getTopicInfo($topic,$language){
            if($language==='Dutch'){
                $this->db->select('COUNT(Answers.Score) NumberAnswers,Questions.Type_nl Topic, ROUND(AVG(Answers.Score),2) avg_score');
            }
            else{
                $this->db->select('COUNT(Answers.Score) NumberAnswers,Questions.Type_en Topic, ROUND(AVG(Answers.Score),2) avg_score');
            }
            $this->db->where("Answers.Score !=",-1);
            $this->db->where('Questions.Type_en',$topic);
            $this->db->or_where('Questions.Type_nl',$topic);
            $this->db->join('Answers','Questions.ID_Question=Answers.ID_Question');
            $this->db->from('Questions');
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function getTopicScores($topic,$division){
            $this->db->select('Answers.Score avg_Score,Answers.DateStamp DateStamp');
            $this->db->where("Answers.Score !=",-1);
            $this->db->where('Questions.Type_en',$topic);
            $this->db->or_where('Questions.Type_nl',$topic);
            $this->db->where('Elder.division',$division);
            $this->db->join('Answers','Questions.ID_Question=Answers.ID_Question');
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->from('Questions');
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function getTopicQuestions($topic,$language){
            if($language==='Dutch'){
                $this->db->select('Answers.Score Avg_Score,Questions.Question_nl Question,Questions.ID_Question ID_Question');
            }
            else{
                $this->db->select('Answers.Score Avg_Score,Questions.Question_en Question,Questions.ID_Question ID_Question');
            }
            $this->db->where("Answers.Score !=",-1);
            $this->db->where('Questions.Type_en',$topic);
            $this->db->or_where('Questions.Type_nl',$topic);
            $this->db->join('Answers','Questions.ID_Question=Answers.ID_Question');
            $this->db->group_by('Questions.ID_Question');
            $this->db->from('Questions');
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function getScoreDivision($division,$ID_question){
            $this->db->select('AVG(Answers.Score) avg_Score, Answers.DateStamp DateStamp,Elder.division division');
            $this->db->where("Answers.Score !=",-1);
            $this->db->where('Answers.ID_Question',$ID_question);
            $this->db->where('Elder.division',$division);
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->group_by('Answers.DateStamp');
            $this->db->from('Answers');
            $query=$this->db->get();
            $data['Score']=$query->result();
            return $data;
        }
        
        public function getDivisionScore($division){
            $this->db->select('AVG(Answers.Score) avg_Score, Answers.DateStamp DateStamp');
            $this->db->where("Answers.Score !=",-1);
            $this->db->where('Elder.Division',$division);
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->group_by('Answers.DateStamp');
            $this->db->from('Answers');
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function getAlertDivision($datestamp,$language){
            if($language==='Dutch'){
                $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score,Questions.Type_nl type, Elder.division division');
            }
            else{
                $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score,Questions.Type_en type, Elder.division division');
            }
            $this->db->where("Answers.Score !=",-1);
            $this->db->where('Answers.Datestamp >',$datestamp);
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->join('Questions','Questions.ID_Question=Answers.ID_Question');
            $this->db->group_by('Questions.Type_en');
            $this->db->having('AVG(Answers.Score) <',2);
            $this->db->from('Answers');
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function getAlertResident($datestamp,$language){
            if($language==='Dutch'){
                $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score, Questions.Question_nl question,Questions.Type_nl type, Elder.FirstName FirstName, Elder.LastName LastName');
            }
            else{
                 $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score, Questions.Question_en question,Questions.Type_en type, Elder.FirstName FirstName, Elder.LastName LastName');
            }
            $this->db->where("Answers.Score !=",-1);
            $this->db->where('Answers.Datestamp >',$datestamp);
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->join('Questions','Questions.ID_Question=Answers.ID_Question');
            $this->db->group_by('Questions.ID_Question');
            $this->db->having('AVG(Answers.Score) <',2);
            $this->db->from('Answers');
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function getAlertResidentElder($datestamp,$elder,$language){
            if($language==='Dutch'){
                $this->db->select('Answers.Score avg_Score, Questions.Question_nl question,Questions.Type_nl type');
            }
            else{
                $this->db->select('Answers.Score avg_Score, Questions.Question_en question,Questions.Type_en type');
            }
            $this->db->where('Answers.Datestamp >',$datestamp);
            $this->db->where('Elder.ID_Elder',$elder);
            $this->db->where("Answers.Score !=",-1);
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->join('Questions','Questions.ID_Question=Answers.ID_Question');
            $this->db->group_by('Questions.ID_Question');
            $this->db->having('Answers.Score <',2);
            $this->db->from('Answers');
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function getAlertQuestion($datestamp,$language){
            if($language==='Dutch'){
                $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score, Questions.Question_nl question,Questions.Type_nl type, Count(Answers.Score) count');
            }
            else{
                $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score, Questions.Question_en question,Questions.Type_en type, Count(Answers.Score) count');
            }
            $this->db->where('Answers.Datestamp >',$datestamp);
            $this->db->where("Answers.Score !=",-1);
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->join('Questions','Questions.ID_Question=Answers.ID_Question');
            $this->db->group_by('Elder.ID_Elder');
            $this->db->having('AVG(Answers.Score) <',2);
            $this->db->from('Answers');
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function getAlertTime($datestamp){
            $this->db->select('MIN(Answers.DateStamp) Datestamp,Elder.FirstName FirstName, Elder.LastName LastName');
            $this->db->where("Answers.Score !=",-1);
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->group_by('Elder.ID_Elder');
            $this->db->having('MIN(Answers.DateStamp) <',$datestamp);
            $this->db->from('Answers');
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function getAlertTimeElder($datestamp,$elder){
            $this->db->select('MIN(Answers.DateStamp) Datestamp');
            $this->db->where("Answers.Score !=",-1);
            $this->db->where('Elder.ID_Elder',$elder);
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->group_by('Elder.ID_Elder');
            $this->db->having('MIN(Answers.DateStamp) <',$datestamp);
            $this->db->from('Answers');
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function convert($scores){
            $i=0;
            foreach($scores as $var){
                $value=$scores[$i]->avg_Score;
                if($value>4){
                    $scores[$i]->avg_Score='image/pictograms/smiley5.png';
                }elseif($value>3){
                    $scores[$i]->avg_Score="image/pictograms/smiley4.png";
                }elseif($value>2){
                    $scores[$i]->avg_Score="image/pictograms/smiley3.png";
                }elseif($value>1){
                   $scores[$i]->avg_Score="image/pictograms/smiley2.png";
                }else{
                    $scores[$i]->avg_Score='image/pictograms/smiley1.png';
                }
                $i=$i+1;
            }
            return $scores;
        }
    }

