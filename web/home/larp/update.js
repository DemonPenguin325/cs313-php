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

function addEditFields(kind){
    var fieldArea = document.getElementById("editFields");

    if (kind == "race"){
        
    }
}