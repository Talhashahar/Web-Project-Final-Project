/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction(id) {
    document.getElementById(id).classList.toggle("show");
}



var main = $('main').css('padding-top', '20px');

var allparts = $('<div class="card-deck">');

var parts = data.parts;

var base = data.base;

var additives = data.Additives;

function choose() {
    $("#orderList").css("display", "block");
    var element = $(this).siblings().get(0);
    var text = $(element).text();
    console.log('you choose', text);
    var img = $('<img class="roundeed mx-auto d-block" width="40px" height="40px" style="float: left">')
        .attr('src', `images/${text}.png`);
    $("#orderList").append(img);
}

function addToShake(id, pic) {
    console.log('you choose', id);
    var img = $('<img class="roundeed mx-auto d-block" width="40px" height="40px" style="float: left">')
        .attr('src', pic).attr('id', id);
    $("#orderList").append(img);
}

function getArray() {
    var data = localStorage["item_key"];
    console.log(data[0]);
    return data[0];

}

function chooseParts() {
    var objects = document.getElementById("orderList").children;
    var partsArray = new Array();
    for(var i=2; i< objects.length; ++i){
        partsArray.push(objects[i].id);
    }
    var parts = {
        "parts": partsArray
    };




    var sendData = function() {
        localStorage["item_key"]= partsArray;
        $.post('script.php', {
            data: partsArray
    }, function(response) {
            // window.location.href = 'shake_results.php';
            var table = "<div id=\"ftable\">\n" +
                "    <table id=shakeTable\" style=\"width:80%\">\n" +
                "        <tr>\n" +
                "            <th>Name</th>\n" +
                "            <th>Calorie</th>\n" +
                "            <th>Protein</th>\n" +
                "            <th>Carbo</th>\n" +
                "            <th>Fat</th>\n" +
                "            <th>Vit A</th>\n" +
                "            <th>Vit B</th>\n" +
                "            <th>Iron</th>\n" +
                "        </tr>\n"
            console.log(response);
            document.getElementById("components").style.display = "none";
            document.getElementById("topline").style.display = "none";
            document.getElementById("result").innerHTML = table + response + "</table>";
            document.getElementById("saveShakeToDb").style.display = "block";

        });
    };
    sendData();
    console.log("adding parts to: " + partsArray);
}

function showBase() {
    var Buttombace = document.getElementById("base");
    var buttonFruts = document.getElementById("ingredients");
    var buttonExtra = document.getElementById("extras");
    Buttombace.style.backgroundColor = "#777";
    buttonFruts.style.backgroundColor = "#ffffff";
    buttonExtra.style.backgroundColor = "#ffffff";
    var divbace = document.getElementById("partsBase");
    divbace.style.display = "block";
    var divfruts = document.getElementById("partsFruts");
    divfruts.style.display = "none";
    var divxstra = document.getElementById("partsExtra");
    divxstra.style.display = "none";
}

function showFruts() {
    var Buttombace = document.getElementById("base");
    var buttonFruts = document.getElementById("ingredients");
    var buttonExtra = document.getElementById("extras");
    Buttombace.style.backgroundColor = "#ffffff";
    buttonFruts.style.backgroundColor = "#777";
    buttonExtra.style.backgroundColor = "#ffffff";
    var divbace = document.getElementById("partsBase");
    divbace.style.display = "none";
    var divfruts = document.getElementById("partsFruts");
    divfruts.style.display = "block";
    var divExtra = document.getElementById("partsExtra");
    divExtra.style.display = "none";
}

function showExtra() {
    var Buttombace = document.getElementById("base");
    var buttonFruts = document.getElementById("ingredients");
    var buttonExtra = document.getElementById("extras");
    Buttombace.style.backgroundColor = "#ffffff";
    buttonFruts.style.backgroundColor = "#ffffff";
    buttonExtra.style.backgroundColor = "#777";
    var divbace = document.getElementById("partsBase");
    divbace.style.display = "none";
    var divfruts = document.getElementById("partsFruts");
    divfruts.style.display = "none";
    var divExtra = document.getElementById("partsExtra");
    divExtra.style.display = "block";
}


/*
showDrinks(parts);
showDrinks(base);
showDrinks(additives);
*/