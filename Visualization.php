<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Visualization</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/png">
    
    <!--====== Chart.js ======-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!-- Load Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            width: 50%;
            padding: 20px;
            vertical-align: top;
        }
    </style>
</head>

<body>
    <!--====== HEADER PART START ======-->
    <header class="header-area">
        <div class="navbar-area">
            <!-- Navbar content goes here -->
        </div>
        <div id="home" class="upload-hero">
            <h1>Visualization</h1>
            <table>
                <tr>
                    <td>
                        <h2>Pie Chart</h2>
                        <div id="piechart" style="width: 100%; height: 600px;"></div>
                    </td>
                    <td>
                        <h2>Scatter Chart</h2>
                        <canvas id="myChart" style="width:100%;max-width:600px;height: 500px"></canvas>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>Doughnut Chart</h2>
                        <canvas id="myDChart" style="width:100%;max-width:600px;height: 500px"></canvas>
                    </td>
                    <td>
                        <h2>Bar Chart</h2>
                        <canvas id="myBChart" style="width:100%;max-width:600px;height:500px;"></canvas>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <h2>Multiple Lines Chart</h2>
                        <center><canvas id="myMLChart" style="width:100%;max-width:1000px;height:500px;"></canvas></center>
                    </td>
                </tr>
            </table>
        </div>
    </header>

    <!--====== FOOTER PART START ======-->
    <footer id="footer" class="footer-area bg_cover" style="background-image: url(../assets/images/footer-bg.jpg)">
        <!-- Footer content goes here -->
    </footer>

    <!--====== Jquery js ======-->
    <script src="../assets/js/vendor/jquery-3.5.1.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="../assets/js/bootstrap.min.js"></script>

    <!--====== Main js ======-->
    <script src="../assets/js/main.js"></script>

    <script>
        // Load Google Charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Pie chart data
            var pieData = google.visualization.arrayToDataTable([
                ['Food Posioning in Industry', 'Food Contain Chemical Compostion.'],
                ['Chicken', 10],
                ['Spinach', 27],
                ['Beef', 12],
                ['Milk', 11],
                ['Other Food', 20]
            ]);

            var pieOptions = {
                title: 'Food Posioning in Industry,Food Contain Chemical Compostion.'
            };

            var pieChart = new google.visualization.PieChart(document.getElementById('piechart'));
            pieChart.draw(pieData, pieOptions);

            // Scatter chart data
            const xyValues = [
                {x:50, y:7},
                {x:60, y:8},
                {x:70, y:8},
                {x:80, y:9},
                {x:90, y:9},
                {x:100, y:9},
                {x:110, y:10},
                {x:120, y:11},
                {x:130, y:14},
                {x:140, y:14},
                {x:150, y:15}
            ];

            new Chart("myChart", {
                type: "scatter",
                data: {
                    datasets: [{
                        pointRadius: 4,
                        pointBackgroundColor: "rgb(0,0,255)",
                        data: xyValues
                    }]
                },
                options: {
                    legend: {display: false},
                    scales: {
                        xAxes: [{ticks: {min: 40, max:160}}],
                        yAxes: [{ticks: {min: 6, max:16}}]
                    }
                }
            });

            // Donut Chart
            const xValues = ["Nausea", "Abdominal pain", "Vomiting", "Diarrhea","Fever"];
            const yValues = [55, 49, 44, 24, 15];
            const barColors = ["#b91d47", "#00aba9", "#2b5797", "#e8c3b9", "#1e7145"];

            new Chart("myDChart", {
                type: "doughnut",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: "Symptoms	mostly occur"
                    }
                }
            });

            const xBarValues = ["Cook chicken thoroughly, avoid cross-contamination", "Wash thoroughly before consumption", "Cook beef to safe temperatures", "Store milk in the refrigerator"];
            const yBarValues = [55, 50, 45, 40];

            new Chart("myBChart", {
                type: "bar",
                data: {
                    labels: xBarValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yBarValues
                    }]
                },
                options: {
                    legend: {display: false},
                    title: {
                        display: true,
                        text: "Prevention that mostly takes"
                    }
                }
            });

            const xyLineValues = [100,200,300,400,500,600,700,800,900,1000];

            new Chart("myMLChart", {
                type: "line",
                data: {
                    labels: xyLineValues,
                    datasets: [{ 
                        data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
                        borderColor: "red",
                        fill: false
                    }, { 
                        data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
                        borderColor: "green",
                        fill: false
                    }, { 
                        data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
                        borderColor: "blue",
                        fill: false
                    }]
                },
                options: {
                    legend: {display: false}
                }
            });
        }
    </script>
</body>

</html>
