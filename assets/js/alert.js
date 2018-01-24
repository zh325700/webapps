function makeAlert(data){
    alerts=[];
    makeDivisionAlert(data["division"],alerts);
    makeResidentAlert(data["resident"],alerts);
    makeQuestionAlert(data["question"],alerts);
    makeTimeAlert(data["time"],alerts);
    //console.log(alerts);
    for(text=0;text<10;text++){
        if(typeof alerts[text] !== 'undefined'){
            var parent=document.getElementById("alertList");
            var child=document.createElement("li");
            var span=document.createElement("span");
            var button=document.createElement("button");
            var row=document.createElement("div");
            row.setAttribute('class','row');
            var column1=document.createElement("div");
            column1.setAttribute('class','col-sm-4');
            var column2=document.createElement("div");
            column2.setAttribute('class','col-sm-8');
            button.setAttribute('id',text);
            button.appendChild(document.createTextNode("delete"));
            button.setAttribute('class','badge');
            button.addEventListener("click",deleteAlert);
            child.setAttribute('id',parent.value);
            child.setAttribute('class',"list-group-item");
            span.appendChild(document.createTextNode(alerts[text]));
            column2.appendChild(span);
            row.appendChild(column2);
            column1.appendChild(button);
            row.appendChild(column1);
            child.appendChild(row);
            parent.appendChild(child);
        }
    }
}

function deleteAlert(){
    var id=event.target.id;
    var parent=event.target.parentElement.parentElement.parentElement.parentElement;
    parent.removeChild(event.target.parentElement.parentElement.parentElement);
    delete alerts[id];
    var parent=document.getElementById("alertList");
    if(typeof alerts[9] !== 'undefined'){
        var child=document.createElement("li");
        var span=document.createElement("span");
        var button=document.createElement("button");
        button.setAttribute('id',text);
        button.appendChild(document.createTextNode("delete"));
        button.addEventListener("click",deleteAlert);
        child.setAttribute('id',parent.value);
        child.setAttribute('class',"list-group-item");
        span.appendChild(document.createTextNode(alerts[9]));
        child.appendChild(span);
        child.appendChild(button);
        parent.appendChild(child);
    }
}

function makeDivisionAlert(data,alerts){
    for(var value in data){
        if(language==="Dutch"){
            var text="Afdeling "+ data[value]['division']+" heeft een gemidelde score van "+data[value]['avg_Score']+" op de categorie "+data[value]['type'];
        }
        else{
            var text="Division "+ data[value]['division']+" scored an average score of "+data[value]['avg_Score']+" on the topic of "+data[value]['type'];
        }
        alerts.push(text);
    }
}

function makeResidentAlert(data,alerts){
    for(var value in data){
        if(language==="Dutch"){
            var text=data[value]['FirstName']+" "+data[value]['LastName']+" heeft de vraag "+data[value]['question']+" met een score van "+data[value]['avg_Score']+" beantwoord";
        }
        else{
            var text=data[value]['FirstName']+" "+data[value]['LastName']+" has answered the question "+data[value]['question']+" with a score of "+data[value]['avg_Score'];
        }
        alerts.push(text);
    }
}

function makeQuestionAlert(data,alerts){
    for(var value in data){
        if(language==="Dutch"){
            var text=data[value]['count']+" aantal bewoners hebben de vraag "+data[value]['question']+" met een lage score beantwoord";
        }
        else{
            var text=data[value]['count']+" amount of residents has answered the question "+data[value]['question']+" with a low score";
        }
        alerts.push(text);
    }
}

function makeTimeAlert(data,alerts){
    for(var value in data){
        if(language==="Dutch"){
             var text=data[value]['FirstName']+" "+data[value]['LastName']+" heeft de vragenlijst niet beantwoord sinds "+data[value]['Datestamp'];
        }
        else{
             var text=data[value]['FirstName']+" "+data[value]['LastName']+" has not filled in her questions since "+data[value]['Datestamp'];
        }
        alerts.push(text);
    }
}
function makeElderAlert(data){
    alerts=[]; 
    makeQuestionAlertElder(data["question"],alerts);
    makeTimeAlertElder(data["time"],alerts);
    console.log(alerts);
    for(text=0;text<10;text++){
        if(typeof alerts[text] !== 'undefined'){
            var parent=document.getElementById("alertElderList");
            var child=document.createElement("li");
            var span=document.createElement("span");
            child.setAttribute('id',parent.value);
            child.setAttribute('class',"list-group-item");
            span.appendChild(document.createTextNode(alerts[text]));
            child.appendChild(span);
            parent.appendChild(child);
        }
    }
}
  
function makeQuestionAlertElder(data,alerts){
    for(var value in data){
        if(language==="Dutch"){
            var text=data[value]["type"]+": "+data[value]["question"]+" heeft een score van "+data[value]["avg_Score"];
        }
        else{
            var text=data[value]["type"]+": "+data[value]["question"]+" has a score of "+data[value]["avg_Score"];
        }
        alerts.push(text);
    }
}

function makeTimeAlertElder(data,alerts){
    for(var value in data){
        if(language==="Dutch"){
            var text=" heeft de vragenlijst niet ingevuld sinds "+data[value]['Datestamp'];
        }
        else{
            var text=" has not filled in her questions since "+data[value]['Datestamp'];
        }
        alerts.push(text);
    }
}

