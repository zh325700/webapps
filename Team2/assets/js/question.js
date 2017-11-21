console.log('it works');


$("#newButton").click(previous);
$("#smiley").click(getQuestion);

var counter = 1;
function getQuestion() {
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState === XMLHttpRequest.DONE){
            document.getElementById("question_content").innerHTML = xmlhttp.responseText;
            document.getElementById("question_number").innerHTML = "Question "+(counter - 1);
        }
    };
    xmlhttp.open("GET", "get_question_by_id.php?id_question="+counter, true);
    xmlhttp.send();
    counter++;
}

function previous(){
    //load previous question and remove previous answer from database
    console.log("you clicked me");
}
