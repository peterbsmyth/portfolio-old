<?php include 'header.php' ?>
<section class="content-container">
	<div class="chart-title">
		<h3>Phone Checks / Day</h3>
		<p>As measured by <a href="http://www.checkyapp.com">Checky</a></p>
	</div>
	<div class="chart-container">
		<script src="http://d3js.org/d3.v3.min.js"></script>
		<svg class="chart"></svg>

		<script>
			var margin = {top: 20, right: 30, bottom: 30, left: 40},
			    width = 3000 - margin.left - margin.right,
			    height = 500 - margin.top - margin.bottom;

			var x = d3.scale.ordinal()
			    .rangeRoundBands([0, width], .1);

			var y = d3.scale.linear()
			    .range([height, 0]);

			var xAxis = d3.svg.axis()
			    .scale(x)
			    .orient("bottom");


			var yAxis = d3.svg.axis()
			    .scale(y)
			    .orient("left");

			var chart = d3.select(".chart")
			    .attr("width", width + margin.left + margin.right)
			    .attr("height", height + margin.top + margin.bottom)
			  .append("g")
			    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

			d3.tsv("data.tsv", type, function(error, data) {
			  x.domain(data.map(function(d) { return d.date; }));
			  y.domain([0, d3.max(data, function(d) { return d.checks; })]);

			  chart.append("g")
			      .attr("class", "x axis")
			      .attr("transform", "translate(0," + height + ")")
			      .call(xAxis);

			  chart.append("g")
			      .attr("class", "y axis")
			      .call(yAxis);

			  chart.selectAll(".bar")
			      .data(data)
			    .enter().append("rect")
			      .attr("class", "bar")
			      .attr("x", function(d) { return x(d.date); })
			      .attr("y", function(d) { return y(d.checks); })
			      .attr("height", function(d) { return height - y(d.checks); })
			      .attr("width", x.rangeBand());

			  chart.append("g")
			    .attr("class", "y axis")
			    .call(yAxis)
			  .append("text")
			    .attr("transform", "rotate(-90)")
			    .attr("y", 6)
			    .attr("dy", ".71em")
			    .style("text-anchor", "end")
			    .text("Checks"); 


		    var line100 = chart.append("line")
		    								.attr("x1",0)
		    								.attr("y1",346)
		    								.attr("x2",3000)
		    								.attr("y2",346)
		    								.attr("stroke","black")
		    								.attr("stroke-width",1);

				var line50 = chart.append("line")
			    								.attr("x1",0)
			    								.attr("y1",398)
			    								.attr("x2",3000)
			    								.attr("y2",398)
			    								.attr("stroke","red")
			    								.attr("stroke-width",1);

			});

			function type(d) {
			  d.checks = +d.checks; // coerce to number
			  return d;
			}
		</script>
	</div>
	<div class="chart-notes">
		<p><b>Note:</b> Data for 11/22 is missing.</p>
	</div>
</div>
<?php include '../footer.php' ?>