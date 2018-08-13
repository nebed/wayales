var App = (function() {
    'use strict';

    App.ChartJs = function(opp) {
        var days = [];
        var sessions = [];
        var connections = [];
        var age_count = [];
        var age_type = [];
        var gender_count = [];
        var gender_type = [];
        var device_count = [];
        var device_type = [];
        var browser_count = [];
        var browser_type = [];
        var os_count = [];
        var os_type = [];
        var all_count = [];
        var obj = opp[0];
        var obj1 = opp[1];
        var obj2 = opp[2];
        var obj3 = opp[3];
        var obj4 = opp[4];
        var obj5 = opp[5];
        var obj6 = opp[6];
        var obj7 = opp[7];
        var obj8 = opp[8];
        for (var i in obj) {
            days.push(obj[i].day);
            sessions.push(obj[i].sessions);
        }
        for (var i in obj1) {
            connections.push(obj1[i].connections);
        }
        for (var i in obj2) {
            age_count.push(obj2[i].count);
            age_type.push(obj2[i].age);
        }
        for (var i in obj3) {
            gender_count.push(obj3[i].count);
            gender_type.push(obj3[i].gender);
        }
        for (var i in obj4) {
            device_count.push(obj4[i].count);
            device_type.push(obj4[i].devicetype);
        }
        for (var i in obj5) {
            browser_count.push(obj5[i].count);
            browser_type.push(obj5[i].browser);
        }
        for (var i in obj6) {
            os_count.push(obj6[i].count);
            os_type.push(obj6[i].ostype);
        }
        for (var i in obj7) {
            all_count.push(obj7[i].returning_users);
        }
        for (var i in obj8) {
            all_count.push(obj8[i].new_users);
        }



        function lineChart() {

            //Get the canvas element
            $('#line-chart').remove(); // this is my <canvas> element
            $('#line-chart-container').append('<canvas id="line-chart" height="180"><canvas>');
            var ctx = document.getElementById("line-chart");

            var lineChartData = {
                labels: days,
                tooltips: {
                    enabled: true,
                    position: 'average'
                },
                datasets: [{
                    label: "Sessions Per Day",
                    borderColor: '#2196F3',
                    backgroundColor: '#1976D2CC',
                    data: sessions
                }, {
                    label: "Connections Per Day",
                    borderColor: '#FF5722',
                    backgroundColor: '#E64A19CC',
                    data: connections
                }]
            };

            var line = new Chart(ctx, {
                type: 'line',
                data: lineChartData
            });
        }







        function pieChart1() {
            //Set the chart colors

            //Get the canvas element
            $('#return-pie-chart').remove(); // this is my <canvas> element
            $('#return-chart-container').append('<canvas id="return-pie-chart" height="180"><canvas>');
            var ctx = document.getElementById("return-pie-chart");

            var data = {
                labels: ["Returning Users", "New Users"],
                datasets: [{
                    data: all_count,
                    backgroundColor: [
                        '#1976D2',
                        '#E64A19'
                    ],
                    hoverBackgroundColor: [
                        '#1976D2',
                        '#E64A19'
                    ]
                }]
            };

            var pie = new Chart(ctx, {
                type: 'pie',
                data: data
            });
        }


        function donutChart1() {
            //Get the canvas element
            $('#age-donut-chart').remove(); // this is my <canvas> element
            $('#age-chart-container').append('<canvas id="age-donut-chart" height="180"><canvas>');
            var ctx = document.getElementById("age-donut-chart");

            var data = {
                labels: age_type,
                datasets: [{
                    data: age_count,
                    backgroundColor: [
                        '#0b0c10',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#66fcf1'
                    ],
                    hoverBackgroundColor: [
                        '#0b0c10',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#66fcf1'
                    ]
                }]
            };

            var pie = new Chart(ctx, {
                type: 'doughnut',
                data: data
            });
        }

        function pieChart2() {
            //Set the chart colors

            //Get the canvas element
            $('#gender-pie-chart').remove(); // this is my <canvas> element
            $('#gender-chart-container').append('<canvas id="gender-pie-chart" height="180"><canvas>');
            var ctx = document.getElementById("gender-pie-chart");

            var data = {
                labels: gender_type,
                datasets: [{
                    data: gender_count,
                    backgroundColor: [
                        '#0b0c10',
                        '#1976D2',
                        '#E64A19'
                    ],
                    hoverBackgroundColor: [
                        '#0b0c10',
                        '#1976D2',
                        '#E64A19'
                    ]
                }]
            };

            var pie = new Chart(ctx, {
                type: 'pie',
                data: data
            });
        }

        function donutChart2() {
            //Get the canvas element
            $('#os-donut-chart').remove(); // this is my <canvas> element
            $('#os-chart-container').append('<canvas id="os-donut-chart" height="180"><canvas>');
            var ctx = document.getElementById("os-donut-chart");

            var data = {
                labels: os_type,
                datasets: [{
                    data: os_count,
                    backgroundColor: [
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#0b0c10'
                    ],
                    hoverBackgroundColor: [
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#0b0c10'
                    ]
                }]
            };

            var pie = new Chart(ctx, {
                type: 'doughnut',
                data: data
            });
        }

        function donutChart3() {

            //Get the canvas element
            $('#device-donut-chart').remove(); // this is my <canvas> element
            $('#device-chart-container').append('<canvas id="device-donut-chart" height="180"><canvas>');
            var ctx = document.getElementById("device-donut-chart");

            var data = {
                labels: device_type,
                datasets: [{
                    data: device_count,
                    backgroundColor: [
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#0b0c10',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#0b0c10',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#0b0c10',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#0b0c10',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#0b0c10',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#0b0c10',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A'
                    ],
                    hoverBackgroundColor: [
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#0b0c10',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#0b0c10',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#0b0c10',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#0b0c10',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#0b0c10',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#0b0c10',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A'
                    ]
                }]
            };

            var pie = new Chart(ctx, {
                type: 'doughnut',
                data: data
            });
        }

        function pieChart3() {
            //Set the chart colors

            //Get the canvas element
            $('#browser-pie-chart').remove(); // this is my <canvas> element
            $('#browser-chart-container').append('<canvas id="browser-pie-chart" height="180"><canvas>');
            var ctx = document.getElementById("browser-pie-chart");

            var data = {
                labels: browser_type,
                datasets: [{
                    data: browser_count,
                    backgroundColor: [
                        '#0b0c10',
                        '#1976D2',
                        '#E64A19',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#1976D2',
                        '#E64A19'
                    ],
                    hoverBackgroundColor: [
                        '#0b0c10',
                        '#1976D2',
                        '#E64A19',
                        '#1976D2',
                        '#E64A19',
                        '#9C27B0',
                        '#8BC34A',
                        '#1976D2',
                        '#E64A19'
                    ]
                }]
            };

            var pie = new Chart(ctx, {
                type: 'pie',
                data: data
            });
        }
        lineChart();
        pieChart1();
        donutChart1();
        pieChart2();
        donutChart2();
        donutChart3();
        pieChart3();
    };

    return App;
})(App || {});
