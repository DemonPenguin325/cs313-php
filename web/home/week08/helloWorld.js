var http = require('http');

http.createServer(onRequest).listen(8080);

function onRequest(req, res){
    res.writeHead(200, {'Content-Type': 'text/html'});
    if (req.url == "/home"){
        res.write('<h1>Welcome to the Home Page</h1>');
    }
    else if (req.url == "/getData"){
        res.write('{"name":"Tristan Fullmer","class":"CS 313"}');
    }
    else{
        res.write('<h1>ERROR: 404 Not found</h1>');
    }
    response.end();
}