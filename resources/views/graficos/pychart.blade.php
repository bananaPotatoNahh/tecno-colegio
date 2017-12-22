@extends('layouts.admin')
@section('contenido')
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([

                ['Personas', 'Distribucion de personas registradas en el sistema'],

               [ 'alumnos',{{$persona}}] ,
                [ 'docente',{{$docente}}] ,
                [ 'administrativo',{{$administrativo}}]
            ]);

            var options = {
                title: 'Distribucion de personas registradas en el sistema',
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawBasic);
    function drawBasic() {

    var data = google.visualization.arrayToDataTable([
    ['City', '2010 Population',],
    ['New York City, NY', 8175000],
    ['Los Angeles, CA', 3792000],
    ['Chicago, IL', 2695000],
    ['Houston, TX', 2099000],
    ['Philadelphia, PA', 1526000]
    ]);

    var options = {
    title: 'Population of Largest U.S. Cities',
    chartArea: {width: '50%'},
    hAxis: {
    title: 'Total Population',
    minValue: 0
    },
    vAxis: {
    title: 'City'
    }
    };

    var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);}

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
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Personas', 'Distribucion de personas registradas en el sistema'],

                    [ 'alumnos',{{$persona}}] ,
                    [ 'docente',{{$docente}}] ,
                    [ 'administrativo',{{$administrativo}}]
                  /*  ['administrativo', ], ['curriculum',0 ],
                    ['datosportal', ],
                    ['docente', ], ['logros', ], ['materia', ],
                    ['normas', $normas], ['noticias', $noticias], ['persona', $persona],
                    ['planestudio', ], ['reglamento', ]*/
                ]);

                var options = {
                    title: 'Distribucion de personas registradas en el sistema',
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
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
                    ['Element', 'Density', { role: 'style' }],
                    ['alumno',{{$persona}}, '#b87333'],            // RGB value
                    ['docente', {{$docente}}, '#b87333'],            // English color name
                    ['administrativo', {{$administrativo}}, '#b87333']

                ]);

                var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
                chart.draw(data);
            }
        </script>
    </head>
    <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
    </body>
    </html>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <div id="chart_div"></div>
    <html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">

            // Load Charts and the corechart package.
            google.charts.load('current', {'packages':['corechart']});

            // Draw the pie chart for Sarah's pizza when Charts is loaded.
            google.charts.setOnLoadCallback(drawSarahChart);

            // Draw the pie chart for the Anthony's pizza when Charts is loaded.
            google.charts.setOnLoadCallback(drawAnthonyChart);

            // Callback that draws the pie chart for Sarah's pizza.
            function drawSarahChart() {

                // Create the data table for Sarah's pizza.
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Topping');
                data.addColumn('number', 'Slices');
                data.addRows([
                    ['Mushrooms', 1],
                    ['Onions', 1],
                    ['Olives', 2],
                    ['Zucchini', 2],
                    ['Pepperoni', 1]
                ]);

                // Set options for Sarah's pie chart.
                var options = {title:'How Much Pizza Sarah Ate Last Night',
                    width:400,
                    height:300};

                // Instantiate and draw the chart for Sarah's pizza.
                var chart = new google.visualization.PieChart(document.getElementById('Sarah_chart_div'));
                chart.draw(data, options);
            }

            // Callback that draws the pie chart for Anthony's pizza.
            function drawAnthonyChart() {

                // Create the data table for Anthony's pizza.
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Topping');
                data.addColumn('number', 'Slices');
                data.addRows([
                    ['Mushrooms', 2],
                    ['Onions', 2],
                    ['Olives', 2],
                    ['Zucchini', 0],
                    ['Pepperoni', 3]
                ]);

                // Set options for Anthony's pie chart.
                var options = {title:'How Much Pizza Anthony Ate Last Night',
                    width:400,
                    height:300};

                // Instantiate and draw the chart for Anthony's pizza.
                var chart = new google.visualization.PieChart(document.getElementById('Anthony_chart_div'));
                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
    <!--Table and divs that hold the pie charts-->
    <table class="columns">
        <tr>
            <td><div id="Sarah_chart_div" style="border: 1px solid #ccc"></div></td>
            <td><div id="Anthony_chart_div" style="border: 1px solid #ccc"></div></td>
        </tr>
    </table>
    </body>
    </html>
    <html>
    <head>
        <title>Mi primer ejemplo en Google Charts</title>
    </head>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script>
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(dibujarGrafico);
        function dibujarGrafico() {
            // Tabla de datos: valores y etiquetas de la gráfica
            var data = google.visualization.arrayToDataTable([
                ['Texto', 'Valor numérico'],
                ['alumno',{{$persona}}],            // RGB value
                ['docente', {{$docente}}],            // English color name
                ['administrativo', {{$administrativo}}]
            ]);
            var options = {
                title: 'Nuestro primer ejemplo con Google Charts'
            }
            // Dibujar el gráfico
            new google.visualization.ColumnChart(
                //ColumnChart sería el tipo de gráfico a dibujar
                document.getElementById('GraficoGoogleChart-ejemplo-1')
            ).draw(data, options);
        }
    </script>
    <body>
    Comenzando con Google Charts....
    <div id="GraficoGoogleChart-ejemplo-1" style="width: 800px; height: 600px">
    </div>
    </body>----------------------------------------------------------------------------------
    </html>
@endsection