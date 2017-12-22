@extends('layouts.admin')
@section('contenido')
    <html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Year', 'Sales', 'Expenses'],
                    ['2013',  1000,      400],
                    ['2014',  1170,      460],
                    ['2015',  660,       1120],
                    ['2016',  1030,      540]
                ]);

                var options = {
                    title: 'Company Performance',
                    hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
                    vAxis: {minValue: 0}
                };

                var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
    </body>
    </html>

    <html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawSeriesChart);

            function drawSeriesChart() {

                var data = google.visualization.arrayToDataTable([
                    ['ID', 'Life Expectancy', 'Fertility Rate', 'Region',     'Population'],
                    ['CAN',    80.66,              1.67,      'North America',  33739900],
                    ['DEU',    79.84,              1.36,      'Europe',         81902307],
                    ['DNK',    78.6,               1.84,      'Europe',         5523095],
                    ['EGY',    72.73,              2.78,      'Middle East',    79716203],
                    ['GBR',    80.05,              2,         'Europe',         61801570],
                    ['IRN',    72.49,              1.7,       'Middle East',    73137148],
                    ['IRQ',    68.09,              4.77,      'Middle East',    31090763],
                    ['ISR',    81.55,              2.96,      'Middle East',    7485600],
                    ['RUS',    68.6,               1.54,      'Europe',         141850000],
                    ['USA',    78.09,              2.05,      'North America',  307007000]
                ]);

                var options = {
                    title: 'Correlation between life expectancy, fertility rate ' +
                    'and population of some world countries (2010)',
                    hAxis: {title: 'Life Expectancy'},
                    vAxis: {title: 'Fertility Rate'},
                    bubble: {textStyle: {fontSize: 11}}
                };

                var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
    <div id="series_chart_div" style="width: 900px; height: 500px;"></div>
    </body>
    </html>

    <html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['ID', 'X', 'Y', 'Temperature'],
                    ['',   80,  167,      120],
                    ['',   79,  136,      130],
                    ['',   78,  184,      50],
                    ['',   72,  278,      230],
                    ['',   81,  200,      210],
                    ['',   72,  170,      100],
                    ['',   68,  477,      80]
                ]);

                var options = {
                    colorAxis: {colors: ['yellow', 'red']}
                };

                var chart = new google.visualization.BubbleChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
    </body>
    </html>

    <html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawVisualization);

            function drawVisualization() {
                // Some raw data (not necessarily accurate)
                var data = google.visualization.arrayToDataTable([
                    ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
                    ['2004/05',  165,      938,         522,             998,           450,      614.6],
                    ['2005/06',  135,      1120,        599,             1268,          288,      682],
                    ['2006/07',  157,      1167,        587,             807,           397,      623],
                    ['2007/08',  139,      1110,        615,             968,           215,      609.4],
                    ['2008/09',  136,      691,         629,             1026,          366,      569.6]
                ]);

                var options = {
                    title : 'Monthly Coffee Production by Country',
                    vAxis: {title: 'Cups'},
                    hAxis: {title: 'Month'},
                    seriesType: 'bars',
                    series: {5: {type: 'line'}}
                };

                var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
    </body>
    </html>

    <html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Work',     11],
                    ['Eat',      2],
                    ['Commute',  2],
                    ['Watch TV', 2],
                    ['Sleep',    7]
                ]);

                var options = {
                    title: 'My Daily Activities',
                    pieHole: 0.4,
                };

                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
    <div id="donutchart" style="width: 900px; height: 500px;"></div>
    </body>
    </html>

    <html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Vistas publicas', 'Porcentaje de visitas'],

                    ['administrativo', {{$administrativo}}],
                    ['curriculum',{{$curriculum}} ],
                    ['datosportal', {{$datosportal}}],
                    ['docente', {{$docente}}],
                    ['logros', {{$logros}}],
                    ['normas', {{$normas}}],
                    ['noticias', {{$noticias}}],
                    ['persona', {{$persona}}],
                    ['planestudio', {{$planestudio}}],
                    ['reglamento', {{$reglamento}}]
                ]);

                var options = {
                    title: 'Vistas al indice y Porcentaje de visitas',
                    legend: 'none',
                    pieSliceText: 'label',
                    slices: {  4: {offset: 0.2},
                        12: {offset: 0.3},
                        14: {offset: 0.4},
                        15: {offset: 0.5},
                    },
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }

        </script>
    </head>
    <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    </body>
    </html>

    <html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Director (Year)',  'Rotten Tomatoes', 'IMDB'],
                    ['Alfred Hitchcock (1935)', 8.4,         7.9],
                    ['Ralph Thomas (1959)',     6.9,         6.5],
                    ['Don Sharp (1978)',        6.5,         6.4],
                    ['James Hawes (2008)',      4.4,         6.2]
                ]);

                var options = {
                    title: 'The decline of \'The 39 Steps\'',
                    vAxis: {title: 'Accumulated Rating'},
                    isStacked: true
                };

                var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_div'));

                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
    </body>
    </html>


@endsection