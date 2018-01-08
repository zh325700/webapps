<?php
    Class Overview_Model extends CI_Model{
        public function get_scores($language){
            if($language=='dutch'){
                $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score, Questions.Type_nl Topic, Questions.Type_nl Topictest');
            }
            else{
                $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score, Questions.Type_en Topic, Questions.Type_en Topictest');
            }
            $this->db->join('Questions','Questions.ID_Question=Answers.ID_Question');
            $this->db->group_by('Questions.Type_en');
            $this->db->order_by('AVG(Answers.Score)',"asc");
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['avg_Scores']=$query->result();
            return $data;
        }
        
        public function get_elder_score(){
            $this->db->select('ROUND(AVG(Answers.Score),2) avg_Score, Elder.FirstName FirstName, Elder.LastName LastName, Elder.RoomNumber RoomNumber, Elder.ID_Elder Elder_ID ');
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->group_by('Answers.ID_Elder');
            $this->db->order_by('AVG(Answers.Score)',"asc");
            $this->db->limit(10);
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['avg_Scores']=$query->result();
            return $data;
        }
        
        public function get_elder_score_division($division){
            $this->db->select('AVG(Answers.Score) avg_Score, Elder.FirstName FirstName, Elder.LastName LastName, Elder.RoomNumber RoomNumber, Elder.ID_Elder Elder_ID ');
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->where('Elder.Division',$division);
            $this->db->group_by('Answers.ID_Elder');
            $this->db->order_by('AVG(Answers.Score)',"asc");
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['avg_Scores']=$query->result();
            return $data;
        }
        
        public function get_question_score_division($division,$language){
            if($language=='dutch'){
                $this->db->select('AVG(Answers.Score) avg_Score, Questions.Type_nl Topic, Questions.Type_nl Topictest');  
            }
            else{
                $this->db->select('AVG(Answers.Score) avg_Score, Questions.Type_en Topic, Questions.Type_en Topictest');  
            }
             
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->join('Questions','Questions.ID_Question=Answers.ID_Question');
            $this->db->where('Division',$division);
            $this->db->group_by('Questions.Type_en');
            $this->db->order_by('AVG(Answers.Score)',"asc");
            $this->db->from('Answers');
            $query= $this->db->get();
            $data['avg_Scores']=$query->result();
            return $data;
        }
        
        public function get_elder_score_question($ID_elder){
            $this->db->select('AVG(Answers.Score) avg_Score, Questions.Question Question Answers.ID_Elder ID_Elder ');
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
            $this->db->order_by('AVG(Answers.avg_Score)',"desc");
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
        
         public function get_timestamp_elders($division){
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
        
        public function get_divisions($ID_facility){
            $this->db->select('DISTINCT(division) divisions');
            $this->db->where('ID_Facility',$ID_facility);
            $this->db->order_by('division');
            $this->db->from('Elder');
            $query=$this->db->get();
            $data['divisions']=$query->result();
            return $data;
        }
        
        public function get_elderinfo($ID_elder){
            $this->db->select('FirstName FirstName,LastName LastName,RoomNumber RoomNumber,Picture Picture');
            $this->db->where('ID_Elder',$ID_elder);
            $this->db->from("Elder");
            $query=$this->db->get();
            $data['info']=$query->result();
            return $data;
        }
        
        public function get_elderquestioninfo($ID_elder){
            $this->db->select('AVG(Score) avgScore,COUNT(Score) numberFilled');
            $this->db->where('ID_Elder',$ID_elder);
            $this->db->from("Answers");
            $query=$this->db->get();
            $data['question']=$query->result();
            return $data;       
        }
        
        public function get_elderworsttopicinfo($ID_elder){
            $this->db->select('AVG(Answers.Score) WorstScore,Questions.Type_en WorstTopic');
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
        
        public function get_elderbesttopicinfo($ID_elder){
            $this->db->select('AVG(Answers.Score) avg_ScoreBest,Questions.Type_en typeBest');
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
        
        public function get_score_type($Type,$ID_elder){
            $this->db->select('AVG(Answers.Score) avg_Score,Answers.DateStamp DateStamp,Questions.Question_nl question');
            $this->db->where('Questions.Type_en',$Type);
            $this->db->where('Answers.ID_elder',$ID_elder);
            $this->db->join('Questions','Questions.ID_Question=Answers.ID_Question');
            $this->db->group_by('Answers.DateStamp');
            $this->db->from("Answers");
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function get_Types(){
            $this->db->select('DISTINCT(Type_en) Type');
            $this->db->from('Questions');
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function get_topicinfo($Topic){
            $this->db->select('COUNT(Answers.Score) NumberAnswers,Questions.Type_en Topic, AVG(Answers.Score) avg_score');
            $this->db->where('Questions.Type_en',$Topic);
            $this->db->join('Answers','Questions.ID_Question=Answers.ID_Question');
            $this->db->from('Questions');
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function get_topic_scores($Topic,$division){
            $this->db->select('Answers.Score avg_Score,Answers.DateStamp DateStamp');
            $this->db->where('Questions.Type_en',$Topic);
            $this->db->where('Elder.division',$division);
            $this->db->join('Answers','Questions.ID_Question=Answers.ID_Question');
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->from('Questions');
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function get_topicquestions($Topic){
            $this->db->select('Answers.Score Avg_Score,Questions.Question_en Question,Questions.ID_Question ID_Question');
            $this->db->where('Questions.Type_en',$Topic);
            $this->db->join('Answers','Questions.ID_Question=Answers.ID_Question');
            $this->db->group_by('Questions.ID_Question');
            $this->db->from('Questions');
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function get_score_division($Division,$ID_Question){
            $this->db->select('AVG(Answers.Score) avg_Score, Answers.DateStamp DateStamp,Elder.division division');
            $this->db->where('Answers.ID_Question',$ID_Question);
            $this->db->where('Elder.division',$Division);
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->group_by('Answers.DateStamp');
            $this->db->from('Answers');
            $query=$this->db->get();
            $data['Score']=$query->result();
            return $data;
        }
        
        public function get_division_score($Division){
            $this->db->select('AVG(Answers.Score) avg_Score, Answers.DateStamp DateStamp');
            $this->db->where('Elder.Division',$Division);
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->group_by('Answers.DateStamp');
            $this->db->from('Answers');
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function get_alert_division($Datestamp){
            $this->db->select('AVG(Answers.Score) avg_Score,Questions.Type_en type, Elder.division division');
            $this->db->where('Answers.Datestamp <',$Datestamp);
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->join('Questions','Questions.ID_Question=Answers.ID_Question');
            $this->db->group_by('Questions.Type_en');
            $this->db->having('AVG(Answers.Score) <',2);
            $this->db->from('Answers');
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function get_alert_resident($Datestamp){
            $this->db->select('AVG(Answers.Score) avg_Score, Questions.Question_en question,Questions.Type_en type, Elder.FirstName FirstName, Elder.LastName LastName');
            $this->db->where('Answers.Datestamp <',$Datestamp);
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->join('Questions','Questions.ID_Question=Answers.ID_Question');
            $this->db->group_by('Questions.ID_Question');
            $this->db->having('AVG(Answers.Score) <',2);
            $this->db->from('Answers');
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function get_alert_resident_elder($Datestamp,$Elder){
            $this->db->select('AVG(Answers.Score) avg_Score, Questions.Question_en question,Questions.Type_en type');
            $this->db->where('Answers.Datestamp <',$Datestamp);
            $this->db->where('Elder.ID_Elder',$Elder);
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->join('Questions','Questions.ID_Question=Answers.ID_Question');
            $this->db->group_by('Questions.ID_Question');
            $this->db->having('AVG(Answers.Score) <',2);
            $this->db->from('Answers');
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function get_alert_question($Datestamp){
            $this->db->select('AVG(Answers.Score) avg_Score, Questions.Question_en question,Questions.Type_en type, Count(Answers.Score) count');
            $this->db->where('Answers.Datestamp <',$Datestamp);
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->join('Questions','Questions.ID_Question=Answers.ID_Question');
            $this->db->group_by('Elder.ID_Elder');
            $this->db->having('AVG(Answers.Score) <',2);
            $this->db->from('Answers');
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function get_alert_time($Datestamp){
            $this->db->select('MIN(Answers.DateStamp) Datestamp,Elder.FirstName FirstName, Elder.LastName LastName');
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->group_by('Elder.ID_Elder');
            $this->db->having('MIN(Answers.DateStamp) >',$Datestamp);
            $this->db->from('Answers');
            $query=$this->db->get();
            $data=$query->result();
            return $data;
        }
        
        public function get_alert_time_elder($Datestamp,$Elder){
            $this->db->select('MIN(Answers.DateStamp) Datestamp');
            $this->db->where('Elder.ID_Elder',$Elder);
            $this->db->join('Elder','Elder.ID_Elder=Answers.ID_Elder');
            $this->db->group_by('Elder.ID_Elder');
            $this->db->having('MIN(Answers.DateStamp) >',$Datestamp);
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

