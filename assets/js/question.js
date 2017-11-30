

var counter = 1;
var questions;
var answers = [];
function loadQuestions(all_questions){
   questions = JSON.parse(all_questions);
//   console.log(all_questions);
}

function getQuestionByCategory(){
    
}

function getQuestion(score) {
    var answer = {ID_Question:counter, ID_Elder:1, Score:score};
    answers.push(answer);
    counter++;
    if(counter > Object.keys(questions).length){
        document.location.href = '../../index.php/Question/insertScore/?answers='+JSON.stringify(answers);
    }
    var question = questions[counter - 1];
    document.getElementById("question_number").innerHTML = "Question "+counter;
    document.getElementById("question_content").innerHTML = question.Question_en;
    console.log(answers);
}

function previous(){
    //load previous question and remove previous answer from database
    answers.pop();
    counter--;
    if(counter >= 1){
        var question = questions[counter - 1];
        document.getElementById("question_number").innerHTML = "Question "+counter;
        document.getElementById("question_content").innerHTML = question.Question_en;
        console.log(counter);
    }
}
