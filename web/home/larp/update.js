function addRace(name){
    var url = "update.php?";
	url += "race=" + name;
	//console.log("Mode: " + mode);
	req = new XMLHttpRequest();
	req.onreadystatechange = function(){
		if (req.readyState == 4 && req.status == 200){
            console.log(req.responseText);
            var info = JSON.parse(req.responseText);
            document.getElementById("race-info").innerHTML = info.race;
        }
    }
    req.open("GET", url, true);
	req.send();
}
function setClass(name){
    var url = "update.php?";
	url += "class=" + name;
	//console.log("Mode: " + mode);
	req = new XMLHttpRequest();
	req.onreadystatechange = function(){
		if (req.readyState == 4 && req.status == 200){
            console.log(req.responseText);
            var info = JSON.parse(req.responseText);
            document.getElementById("class-info").innerHTML = info.class;
        }
    }
    req.open("GET", url, true);
	req.send();
}

function addEditFields(){
    var fieldArea = document.getElementById("addFields");
    var kind = document.getElementById("addSelector").value;
    var output = "";
    if (kind == "race"){
        output += '<label>Name: </label><input type="text" name="name" required><br>';
        output += '<label>Base HP: </label><input type="number" name="hp"><br>';
        output += '<label>Special Rules: </label><input type="text" name="rules"><br>';
        output += '<label>Magic Rules: </label><input type="text" name="magic_rules"><br>';
        output += '<label>Description: </label><input type="text" name="description" required><br>';
    }
    else if (kind == "class"){
        output += '<label>Name: </label><input type="text" name="name" required><br>';
        output += '<label>Bounus HP: </label><input type="number" name="hp"><br>';
        output += '<label>Special Rules: </label><input type="text" name="rules"><br>';
        output += '<label>Type: </label><input type="text" name="type"><br>';
        output += '<label>Description: </label><input type="text" name="description" required><br>';
    }
    else{
        console.log(kind);
    }
    fieldArea.innerHTML = output;
}

function doubleCheck(){
    return confirm("Are you sure you want to DELETE \"" + document.getElementById().value + "\"? It will be gone forever! (A very long time)" );
}