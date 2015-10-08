var express    = require('express');
var app        = express();
var morgan     = require('morgan');

app.use(morgan('dev'));
app.use('/js',express.static(__dirname + "/client/js"));
app.use('/css',express.static(__dirname + "/client/css"));
app.use('/img',express.static(__dirname + "/client/img"));

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
