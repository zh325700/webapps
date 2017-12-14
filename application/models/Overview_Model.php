<?php
    Class Overview_Model extends CI_Model{

        public function get_scores(){
            $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score, Questions.Question_en Question ');
            $this->db->join('Questions','Questions.ID_Question=Answers.ID_Question');
            $this->db->group_by('Answers.ID_Question');
            $this->db->order_by('Score',"desc");
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['avg_Scores']=$query->result();
            return $data;
        }
        
        public function get_elder_score(){
            $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score, Elder.FirstName FirstName, Elder.LastName LastName, Elder.RoomNumber RoomNumber ');
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->group_by('Answers.ID_Elder');
            $this->db->order_by('Score',"desc");
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['avg_Scores']=$query->result();
            return $data;
        }
        
        public function get_elder_score_division($division){
            $this->db->select('AVG(Answers.Score) avg_Score, Elder.FirstName FirstName, Elder.LastName LastName, Elder.RoomNumber RoomNumber ');
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->where('Elder.Division',$division);
            $this->db->group_by('Answers.ID_Elder');
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['avg_Scores']=$query->result();
            return $data;
        }
        
        public function get_question_score_division($division){
             $this->db->select('AVG(Answers.Score) avg_Score, Questions.Question_en Question ');
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->join('Questions','Questions.ID_Question=Answers.ID_Question');
            $this->db->where('Division',$division);
            $this->db->group_by('Answers.ID_Question');
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['avg_Scores']=$query->result();
            return $data;
        }
        
        public function get_elder_score_question($ID_elder){
            $this->db->select('AVG(Answers.Score) avg_Score, Questions.Question Question ');
            $this->db->join('Questions','Questions.ID_Question=Answers.ID_Question');
            $this->db->where('Answers.ID_Elder',$ID_elder);
            $this->db->group_by('Answers.ID_Question');
            $this->db->order_by('Answers.ID_Question');
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['avg_Scores']=$query->result();
            return $data;
        }
        
        public function get_elder_score_records($ID_elder){
            $this->db->select('AVG(Answers.Score) avg_Score, Questions.Question Question ');
            $this->db->join('Questions','Questions.ID_Question=Answers.ID_Question');
            $this->db->where('Answers.ID_Elder',$ID_elder);
            $this->db->order_by('Answers.DateStamp');
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['avg_Scores']=$query->result();
            return $data;
        }
        
        public function get_question_score_elders($ID_question){
            $this->db->select('AVG(Answers.Score) avg_Score, Elder.FirstName FirstName, Elder.LastName LastName, Elder.RoomNumber RoomNumber ');
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->where('Answers.ID_Question',$ID_question);
            $this->db->group_by('Answers.ID_Elder');
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['avg_Scores']=$query->result();
            return $data;
        }
        public function get_question_score_records($ID_question){
            $this->db->select('AVG(Answers.Score) avg_Score, Elder.FirstName FirstName, Elder.LastName LastName, Elder.RoomNumber RoomNumber ');
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->where('Answers.ID_Question',$ID_question);
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['avg_Scores']=$query->result();
            return $data;
        }
        
         public function get_timestamp_elders(){
            $this->db->select('MAX(Answers.DateStamp) avg_Score, Elder.FirstName FirstName, Elder.LastName LastName, Elder.RoomNumber RoomNumber ');
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->group_by('Answers.ID_Elder');
            $this->db->order_by('Answers.DateStamp',"asc");
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['timestamps']=$query->result();
            return $data;
        }
        
        public function get_divisions($ID_facility){
            $this->db->select('DISTINCT(division) divisions');
            $this->db->where('ID_Facility',$ID_facility);
            $this->db->from('Elder');
            $query=$this->db->get();
            $data['divisions']=$query->result();
            return $data;
        }
        
        public function get_elderinfo($ID_elder){
            $this->db->select('FirstName FirstName,LastName Lastname,Sex Gender,RoomNumber RoomNumber,division, Division,Picture Picture');
            $this->db->where('ID_Elder',$ID_elder);
            $this->db->from("Elder");
            $query=$this->db->get();
            $data['info']=$query->result();
            return $data;
        }
        
        public function get_score_type($Type){
            $this->db->select('AVG(Answer.Score) avg_Score,Answers.DateStamp DateStamp,Question.Question_nl question');
            $this->db->where('Type_en',$Type);
            $this->db->join('Questions','Questions.ID_Question=Answers.ID_Question');
            $this->db->groupby('Answers.DateStamp');
            $this->db->from("Answers");
            $query=$this->db->get();
            $data[$Type]=$query->result();
            return $data;
        }
        
        public function get_Types(){
            $this->db->select('DISTINCT(Type_en) Type');
            $this->db->from('Answers');
            $query=$this->db->get();
            $data['Topics']=$query->result();
            return $data;
        }
        public function convert($scores){
            $i=0;
            foreach($scores as $var){
                $value=$scores[$i]->avg_Score;
                if($value>4){
                    $scores[$i]->avg_Score='image/pictograms/smiley5.jpg';
                }elseif($value>3){
                    $scores[$i]->avg_Score="image\pictograms\smiley4.jpg";
                }elseif($value>2){
                    $scores[$i]->avg_Score="image\pictograms\smiley3.jpg";
                }elseif($value>1){
                   $scores[$i]->avg_Score="image\pictograms\smiley2.jpg";
                }else{
                    $scores[$i]->avg_Score='image\pictograms\smiley1.jpg';
                }
                $i=$i+1;
            }
            return $scores;
        }
    }

