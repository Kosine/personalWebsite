require('dotenv').config();

var express = require('express'),
    bodyParser = require('body-parser'),
    nodemailer = require('nodemailer'),
    smtpTransporter = require('nodemailer-smtp-transport'),
    path = require('path');

var app = express();

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static(path.join(__dirname, 'public')));


var router = express.Router();

//listen for post
app.post('/', function(req, res, next) {
  var data = req.body;

  var transporter = nodemailer.createTransport(smtpTransporter({
    service: 'smtp-mail.outlook.com',,
    secureConnection: false,
    port: 587,
    auth: {
      user: process.env.EMAIL,
      pass: process.env.PASSWORD
    },
    tls: {
      ciphers: 'SSLv3'
    }
  }));

  transporter.sendMail({
    from: data.email,
    to: process.env.EMAIL,
    subject: data.subject,
    text: data.message,
    html: '<span>' + data.message + '</span>'
  }, function(err, response) {
    if(err) {
      res.redirect('/#contactSection?sent=false')
    } else {
      res.redirect('/#contactSection?sent=true');
    }
  });
});


app.listen(process.env.PORT || 3000, function() {
  console.log('Listening....');
});
