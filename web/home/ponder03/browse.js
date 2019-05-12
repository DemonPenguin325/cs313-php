function addCart(item, mode){
    var url = "addToCart.php?";
	url += "item=" + item;
	url += "&mode=" + mode;
	//console.log("Mode: " + mode);
	req = new XMLHttpRequest();
	req.onreadystatechange = function(){
		if (req.readyState == 4 && req.status == 200){
			console.log(req.responseText);
			var info = JSON.parse(req.responseText);
			document.getElementById("cartAmount").innerHTML = info.total;
			for (var i=0; i<info.items.length; i++){
				try{
				document.getElementById(i).innerHTML = "Amount: " + info.items[i];
				}
				catch{
					//console.log("Couldn't find an element with id " + i);
				}
			}
			//document.getElementById("item").innerHTML = json;
			console.log("Got a new cart total of: " + info.total);
		}
	}
    req.open("GET", url, true);
	req.send();
}