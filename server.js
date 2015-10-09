var express    = require('express');
var app        = express();
var morgan     = require('morgan');

app.use(morgan('dev'));
app.use(express.static(__dirname + "/client/"));


// set view engine to ejs
app.set('views', './server/views');
app.set('view engine', 'ejs');





app.get('/',function(req,res){
  res.render('index.ejs');
});

app.get('/:path',function(req,res){
  res.render(req.params.path + '.ejs');
});

app.listen(1028,'10.132.212.200',function(){
  console.log("Listening on Port: 1028");
});
