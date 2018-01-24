var date = "";
var counter = 0;
var idelder;
var idfacility;
var firstname;
var lastname;
var division;
var picture;

function setDate(d, idE, idF, first, last, div, pic) {
    date = d;
    idelder = idE;
    idfacility = idF;
    firstname = first;
    lastname = last;
    division = div;
    picture = pic;
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
            document.location.href = '../../index.php/Welcome/Resident/menu';
            //loadPage('Welcome', 'Resident/menu');
        } else {
            alert("Datum klopt niet.");

        }
    } else {
        alert("Gelieve de datum in volgend formaat in te vullen: dd/mm/yyyy.\n\
                                                Bv: 07/03/1932");
    }
}


