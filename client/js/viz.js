var captionLength = 0;
var caption = '';
var tempCaption = '';
var selected = true;


$(document).ready(function() {
    captionEl = $('#caption');
});

function testTypingEffect(val) {
    caption = val;
    type();
}

function type() {
    captionEl.html(caption.substr(0, captionLength++));
    if(captionLength < caption.length+1) {
        setTimeout('type()', 50);
    } else {
        captionLength = 0;
    }
}

function testErasingEffect() {
    caption = captionEl.html();
    captionLength = caption.length;
    if (captionLength>0) {
        erase();
    } else {
        $('#caption').html("You didn't write anything to erase, but that's ok!");
        setTimeout('testErasingEffect()', 1000);
    }
}

function erase() {
    captionEl.html(caption.substr(0, captionLength--));
    if(captionLength >= 0) {
        setTimeout('erase()', 50);
    } else {
        captionLength = 0;
        caption = '';
    }
}

//
//

var margin = {top: 10, right: 10, bottom: 10, left: 10};

var container = parseInt(d3.select('.letter-container').style('width'));

var width = container - margin.left - margin.right;
var height = container - margin.top - margin.bottom;
var radius = Math.min(width,height)/2;

var svg = d3.select('.chart').append('svg')
            .attr('width',width+margin.left+margin.right)
            .attr('height',height+margin.top+margin.bottom);


var chart = svg.append('g')
               .attr('transform','translate('+margin.left+','+margin.top+')');

var data = [
  {
    library: 'jQuery',
    skill: 33,
    img: 'img/phishme/jquery.png'
  },
  {
    library: 'D3.js',
    skill: 33,
    img: 'img/phishme/d3.png'
  },
  {
    library: 'Angular.js',
    skill: 33,
    img: 'img/phishme/angular.png'
  }
];

var arc = d3.svg.arc()
  .innerRadius(radius*0.5)
  .outerRadius(radius*0.9);

var selectedArc = d3.svg.arc()
  .innerRadius(radius*0.5)
  .outerRadius(radius*1.0);

var pie = d3.layout.pie().sort(null)
  .value(function(d){return d.skill;});

var color = d3.scale.ordinal()
  .range(['#b3d4fc','#f9a03c','#dd1144']);

var donut = chart.append('g')
  .attr('transform','translate('+width/2+','+height/2+')');

var arcs = donut.selectAll('path')
  .data(pie(data));

var img = chart.append('image')
            .attr('x',(width*0.33))
            .attr('y',(height*0.33))
            .attr('width',(width*0.33))
            .attr('height',(height*0.33))
            .attr('xlink:href','img/phishme/js.png');




arcs.enter()
  .append('path')
    .attr('fill',function(d,i){return color(i);})
    .attr('d',arc)
    .on('mouseover',function(d){
      d3.select(this)
        .transition()
        .attr('d',selectedArc);

      img.attr('xlink:href',d.data.img);
      img.style('display','initial');

      testTypingEffect(d.data.library);
      selected = true;
      console.log('in');

    })
    .on('mouseout',function(d){
      d3.select(this)
        .transition()
        .attr('d',arc);

      img
        .attr('xlink:href','img/phishme/js.png');

        selected = false;
    });


function resize(){
  container = parseInt(d3.select('.letter-left').style('width'));
  width = container - margin.left - margin.right;
  height = container - margin.top - margin.bottom;
  radius = Math.min(width,height)/2;

  svg
    .attr('width',width + margin.left + margin.right)
    .attr('height',height + margin.top + margin.bottom);

  arc
    .innerRadius(radius*0.5)
    .outerRadius(radius*0.9);

  selectedArc
    .innerRadius(radius*0.5)
    .outerRadius(radius*1.0);

  donut
    .attr('transform','translate('+width/2+','+height/2+')');

  img
    .attr('x',(width*0.33))
    .attr('y',(height*0.33))
    .attr('width',(width*0.33))
    .attr('height',(height*0.33));

  arcs.attr('d',arc);
}

d3.select(window).on('resize',resize);

setInterval(function(){
  if (!selected){
    testTypingEffect("JavaScript.");
    selected = !selected;
  }

},1000);

// Typing effect provided gratis, courtesy of Stathis
// Demo: http://codepen.io/stathisg/pen/Bkvhg
// Article: http://burnmind.com/tutorials/how-to-create-a-typing-effect-an-eraser-effect-and-a-blinking-cursor-using-jquery
