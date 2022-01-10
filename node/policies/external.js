const fs = require('fs');
const path = require('path');

var express        =         require("express");
var bodyParser     =         require("body-parser");
var app            =         express();

// var accessFromFile = function(req, res, next) {
//   let raw;
//   let access = '';
//   raw = fs.readFileSync(path.join(__dirname, 'access_option.json'));
//   access = JSON.parse(raw);
//
//   res.append('Access-Control-Allow-Origin', access['ACAO']);
//   res.append('Access-Control-Allow-Headers', access['ACEH']);
//   next();
// }

// var accessAllOrigins = function(req, res, next) {
//   delete res.removeHeader('Access-Control-Allow-Origin');
//   res.append('Access-Control-Allow-Origin', ["*"]);
//   next();
// }

app.use(express.static(path.join(__dirname, '/public')));
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

app.get('/api', function(req, res) {
  res.status(200).json( 'Api o obcym źródle zostało z powodzeniem zapytane.');
});

app.get('/file', function(req, res) {
  let date_ob = new Date();
  let date = ("0" + date_ob.getDate()).slice(-2);
  let month = ("0" + (date_ob.getMonth() + 1)).slice(-2);
  let year = date_ob.getFullYear();
  let hours = date_ob.getHours();
  let minutes = date_ob.getMinutes();
  let seconds = date_ob.getSeconds();
  let fullDate = year + "-" + month + "-" + date + " " + hours + ":" + minutes + ":" + seconds;

  fs.writeFile(path.join(__dirname, '/public/date_file.txt'), "File was saved: " + fullDate);
  res.status(200).send();
});

app.use(function(req, res, next){
  if (req.is('text/*')) {
    req.text = '';
    req.setEncoding('utf8');
    req.on('data', function(chunk){ req.text += chunk });
    req.on('end', next);
  } else {
    next();
  }
});

app.post('/saveAccess', function(req) {
  fs.writeFile(path.join(__dirname, '/access_option.json'), req.text, function(err) {
  });
});

var accessFromFile = function(req, res, next) {
  let raw;
  let access = '';
  raw = fs.readFileSync(path.join(__dirname, 'access_option.json'));
  access = JSON.parse(raw);

  res.append('Access-Control-Allow-Origin', access['ACAO']);
  res.append('Access-Control-Allow-Headers', access['ACEH']);
  next();
}

app.use(accessFromFile);

app.post('/cors_request', function(req, res, next) {
  fs.writeFile(path.join(__dirname, '/request_headers.json'), JSON.stringify(req.headers), function(err) {
  });
  res.send( "Jestem treścią odpowiedzi z obcego źródła.");
});

let accessAllOrigins = function(req, res, next) {
  delete res.removeHeader('Access-Control-Allow-Origin');
  res.append('Access-Control-Allow-Origin', ["*"]);
  next();
}

app.use(accessAllOrigins);

app.get('/cors_request_headers', function(
    req,
    res) {
  let raw;
  raw = fs.readFileSync(path.join(__dirname, '/request_headers.json'));
  res.send(raw);
});

app.get('/evil-logout-without-crsf', function (
    req,
    res) {
  res.sendFile(path.join(__dirname, '/evil-logout-without-crsf.html'));
});

app.get('/evil-logout-with-crsf', function (
    req,
    res) {
  res.sendFile(path.join(__dirname, '/evil-logout-with-crsf.html'));
});

app.listen(8082);