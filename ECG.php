<head>
  <!-- Plotly.js -->
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>

<body>

  <div id="myDiv1" style="width: 2000px; height: 500px;"><!-- Plotly chart will be drawn inside this DIV --></div>
  <script>
function makeplot() {
    Plotly.d3.csv("https://storage.googleapis.com/healthcareiot/ecg7.csv", function(data){ processData(data) } );

};

function processData(allRows) {

    console.log(allRows);
    var x1 = [], y1 = [], standard_deviation = [];
    for (var i=0; i<allRows.length; i++) {
        row = allRows[i];
        console.log(row);
        x1.push( row['Time']);
        y1.push( row['ECG 1'] );
    }
    console.log( 'X',x1, 'Y',y1, 'SD',standard_deviation );
    makePlotly( x1, y1, standard_deviation,1 );
}

function makePlotly( x, y, standard_deviation,val ){
    var plotDiv = document.getElementById("plot");
    var traces = [{
        x: x,
        y: y
    }];

    Plotly.newPlot('myDiv'+val, traces,
        {title: 'ECG Graph '+val});
};
  makeplot();
  </script>
</body>


