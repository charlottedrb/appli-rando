const margin = {top: 50, right: 30, bottom: 30, left: 60},
    width = document.getElementById("container").offsetWidth * 0.95 - margin.left - margin.right,
    height = 400 - margin.top - margin.bottom;

const parseTime = d3.timeParse("%d/%m/%Y");
const dateFormat = d3.timeFormat("%d/%m/%Y");

const x = d3.scaleTime()
    .range([0, width]);

const y = d3.scaleLinear()
    .range([height, 0]);
    
const line = d3.line()
    .x(d => x(d.date))
    .y(d => y(d.close));

const area = d3.area()
    .x(d => x(d.date))
    .y0(height)
    .y1(d => y(d.close));

// Attention ici il faut que le body possède déjà un DIV dont l'ID est chart
const svg = d3.select("#chart").append("svg")
    .attr("id", "svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
    .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");