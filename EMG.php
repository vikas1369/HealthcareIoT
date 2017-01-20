<head>
  <!-- Plotly.js -->
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>

<body>

  <div id="myDiv1" style="width: 2000px; height: 400px;"><!-- Plotly chart will be drawn inside this DIV --></div>
  <div id="myDiv2" style="width: 2000px; height: 400px;"><!-- Plotly chart will be drawn inside this DIV --></div>
  <script>
function makeplot() {
    Plotly.d3.csv("https://storage.googleapis.com/healthcareiot/emg1.csv", function(data){ processData(data) } );

};

function processData(allRows) {

    console.log(allRows);
    var x1 = [], y1 = [],x2 = [], y2 = [], standard_deviation = [];
    for (var i=0; i<allRows.length; i++) {
        row = allRows[i];
        console.log(row);
        x1.push( i);
        y1.push( row['EMG 1'] );
        x2.push( i);
        y2.push( row['EMG 2'] );
    }
    console.log( 'X',x1, 'Y',y1, 'SD',standard_deviation );
    makePlotly( x1, y1, standard_deviation,1 );
    makePlotly( x2, y2, standard_deviation,2 );
}

function makePlotly( x, y, standard_deviation,val ){
    var plotDiv = document.getElementById("plot");
    var traces = [{
        x: x,
        y: y,
        maxpoints:50
    }];

    Plotly.newPlot('myDiv'+val, traces,
        {title: 'EMG Graph '+val});
};
  makeplot();
  </script>
</body>



