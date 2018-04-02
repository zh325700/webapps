var date = "";
var counter = 0;
var idelder;
var idfacility;
var firstname;
var lastname;
var division;
var picture;
var language;

function setDate(d, idE, idF, first, last, div, pic, lang) {
    date = d;
    idelder = idE;
    idfacility = idF;
    firstname = first;
    lastname = last;
    division = div;
    picture = pic;
    language = lang;
}

function addNumber(element) {
    if (element === "delete") {
        document.getElementById('date').value = document.getElementById('date').value.slice(0, -1);
        if (counter > 0) {
            counter--;
        }
        if (counter === 5 || counter === 2) {
            document.getElementById('date').value = document.getElementById('date').value.slice(0, -1);
            counter--;
        }
    } else if (element === "clear") {
        document.getElementById('date').value = "";
        counter = 0;
    } else {
        document.getElementById('date').value =
                document.getElementById('date').value + element;
        counter++;
        if (counter === 2 || counter === 5) {
            document.getElementById('date').value =
                    document.getElementById('date').value + "/";
            counter++;

        }
    }

    if (counter === 10) {
        validateDate();
    }
}

function validateDate() {
    var input = document.getElementById('date').value;
    var regExp = document.getElementById('date').pattern;
    var match = input.match(regExp);
    if (match) {
        if (input === date) {
            var userData = {ID_Elder: idelder, ID_facility: idfacility,
                Firstname: firstname, Lastname: lastname, Division: division, Picture: picture};
            document.location.href = '../../index.php/ResidentLogin/startSession/?userData=' + JSON.stringify(userData);
            //loadPage('Welcome', 'Resident/menu');
        } else {

            console.log(language);
            if (language === 'Dutch') {
                alert("Dit is niet de geboortedatum van " + firstname + " " + lastname);
            } else {
                alert("This is not the birthdate of " + firstname + " " + lastname);
            }

        }
    } else {
        if (language === 'Dutch') {
            alert("Gelieve de datum in volgend formaat in te vullen: dd/mm/yyyy.\n\
                                                Bv: 07/03/1932");
        } else {
            alert("Please use following format: dd/mm/yyyy.\n\
                                                For example: 07/03/1932");
        }
    }
}


