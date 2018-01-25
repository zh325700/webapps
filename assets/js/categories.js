
function setActive(category, isSet){
    if (isSet === "Done"){
        var btn = document.getElementById(category);
        btn.setActive();
    }
    
}