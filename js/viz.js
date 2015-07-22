var margin = {top: 0, right: 0, bottom: 0, left: 0};

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
    library: 'd3',
    skill: 33,
    img: 'img/phishme/d3.png'
  },
  {
    library: 'Angular',
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
    })
    .on('mouseout',function(d){
      d3.select(this)
        .transition()
        .attr('d',arc);

      img
        .attr('xlink:href','img/phishme/js.png');
    });

function resize(){
  container = parseInt(d3.select('.letter-container').style('width'));
  width = container - margin.left - margin.right;
  height = container - margin.top - margin.bottom;
  radius = Math.min(width,height)/2;

  svg
    .attr('width',width+margin.left+margin.right)
    .attr('height',height+margin.top+margin.bottom);

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
