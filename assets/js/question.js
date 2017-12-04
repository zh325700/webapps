

var counter = 1;
var questions = [];
var category;
var all_questions_array;
var answers = [];
function loadQuestions(all_questions, this_category){
    all_questions_array = JSON.parse(all_questions);
    console.log(this_category);
    for (var question in all_questions_array){
        var obj = all_questions_array[question];
        console.log(obj.Type_en);
        if(obj.Type_en === this_category){
            questions.push(obj);
        }
    }
    console.log(questions);
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
