

var counter = 1;
var questions = [];
var category;
var all_questions_array;
var answers = [];
var total_question_count;
var id;
var offset;

function loadQuestions(all_questions, this_category, id_elder){
    calculateOffset(this_category);
    id = id_elder;
    all_questions_array = JSON.parse(all_questions);
    console.log(this_category);
    for (var question in all_questions_array){
        var obj = all_questions_array[question];
        console.log(obj.Type_en);
        if(obj.Type_en === this_category){
            questions.push(obj);
        }
    }
    total_question_count = questions.length;
    var question = questions[0];
    document.getElementById("question_number").innerHTML = counter + "/" + total_question_count;
    document.getElementById("question_content").innerHTML = question.Question_nl;
    console.log(questions);
}



function getQuestion(score) {
    var answer = {ID_Question:counter + offset, ID_Elder:id, Score:score};
    answers.push(answer);
    counter++;
    if(counter > Object.keys(questions).length){
        document.location.href = '../../index.php/ResidentQuestion/insertScore/?answers='+JSON.stringify(answers);
    } else {
        var question = questions[counter - 1];
        document.getElementById("question_number").innerHTML = counter + "/" + total_question_count;
        document.getElementById("question_content").innerHTML = question.Question_nl;
        document.getElementById("previousBtn").innerHTML = "Vorige vraag";
        console.log(answers);
    }
}

function previous(){
    //load previous question and remove previous answer from database
    answers.pop();
    counter--;
    if(counter >= 1){
        var question = questions[counter - 1];
        document.getElementById("question_number").innerHTML = counter + "/" + total_question_count;
        document.getElementById("question_content").innerHTML = question.Question_nl;
        console.log(counter);
        if (counter === 1){
            document.getElementById("previousBtn").innerHTML = "Ga terug";
        }
    } else if (counter === 0){
        document.location.href = '../../index.php/Welcome/Resident/categories';
    }
}

function calculateOffset(category){
    switch (category){
        case "Privacy":
            offset = 0;
            break;
        case "FoodAndMeals":
            offset = 2;
            break;
        case "SafetyAndSecurity":
            offset = 7;
            break;
        case "Comfort":
            offset = 10;
            break;
        case "Autonomy":
            offset = 15;
            break;
        case "RespectByStaff":
            offset = 22;
            break;
        case "StaffResponsiveness":
            offset = 26;
            break;
        case "StaffResidentBonding":
            offset = 33;
            break;
        case "Activities":
            offset = 39;
            break;
        case "PersonalRelationships":
            offset = 45;
    }
}