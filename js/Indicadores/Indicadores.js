$(document).ready(function(){
    $.ajax({
        type: "POST",
        url: "../../includes/Indicadores/Instalaciones.php",
        data:'',
        dataType: 'json',
        success: function(response){
            console.log(response.uno);
            var ctx = document.getElementById("myChart").getContext('2d');
            ctx.canvas.width = 900;
            ctx.canvas.height = 500;
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: response.uno,
                    datasets: [{
                        label: 'Instalaciones Historicas',
                        data: response.dos,
                        backgroundColor: [
                            'rgba(40, 198, 115, 0.9)',
                            'rgba(75, 37, 37, 0.9)',
                            'rgba(75, 116, 37, 0.9)',
                            'rgba(170, 187, 37, 0.9)',
                            'rgba(153, 102, 255, 0.9)',
                            'rgba(226, 25, 64, 0.9)',
                            'rgba(54, 162, 235, 0.9)',
                            'rgba(255, 206, 86, 0.9)',
                            'rgba(75, 192, 192, 0.9)',
                            'rgba(153, 102, 255, 0.9)',
                            'rgba(122, 117, 145, 0.9)',
                            'rgba(122, 117, 46, 0.9)',
                            'rgba(71, 117, 145, 0.9)',
                            'rgba(79, 178, 115, 0.9)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                responsive: false,
                maintainAspectRatio: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        }
    });


    $.ajax({
        type: "POST",
        url: "../../includes/Indicadores/Factibilidades.php",
        data:'',
        dataType: 'json',
        success: function(response){
            console.log(response.uno);
            console.log(response.dos);
            var ctx = document.getElementById("myLine").getContext('2d');
            
            ctx.canvas.width = 900;
            ctx.canvas.height = 500;
            var myLine = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: response.uno,
                    datasets: [{
                        label: "Positivas",
                        fillColor: "rgba(79, 178, 115,1)",
                        borderColor: "rgba(79, 178, 115,1)",
                        backgroundColor: "rgba(79, 178, 115,0.2)",
                        strokeColor: "rgba(79, 178, 115,1)",
                        highlightFill: "rgba(79, 178, 115,1)",
                        highlightStroke: "rgba(79, 178, 115,1)",
                        showTooltip: false, //NEW OPTION DON"T NEED TO INCLUDE IT IF YOU WANT TO DISPLAY BUT WON"T HURT IF YOU DO
                        data: response.dos
                    }, {
                        label: "Negativas",
                        fillColor: "rgba(255, 99, 132,1)",
                        borderColor: "rgba(255, 99, 132,1)",
                        backgroundColor: "rgba(255, 99, 132,0.2)",
                        strokeColor: "rgba(255, 99, 132,1)",
                        highlightFill: "rgba(255, 99, 132,1)",
                        highlightStroke: "rgba(255, 99, 132,1)",
                        showTooltip: false, //NEW OPTION DON"T NEED TO INCLUDE IT IF YOU WANT TO DISPLAY BUT WON"T HURT IF YOU DO
                        data: response.tres
                    }, {
                        label: "Rechazadas",
                        fillColor: "rgba(255, 159, 64,1)",
                        borderColor: "rgba(255, 159, 64,1)",
                        backgroundColor: "rgba(255, 159, 64,0.2)",
                        strokeColor: "rgba(255, 159, 64,1)",
                        highlightFill: "rgba(255, 159, 64,1)",
                        highlightStroke: "rgba(255, 159, 64,1)",
                        data: response.cuatro
                    }, {
                        label: "Pendientes",
                        fillColor: "rgba(0,0,0,1)",
                        borderColor: "rgba(0,0,0,1)",
                        backgroundColor: "rgba(0, 0, 0,0.2)",
                        strokeColor: "rgba(0,0,0,1)",
                        highlightFill: "rgba(0,0,0,1)",
                        highlightStroke: "rgba(0,0,0,1)",
                        data: response.cinco
                    }
                    ]
                },
                options: {
                onClick: graphClickEvent,
                responsive: false,
                maintainAspectRatio: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
            function graphClickEvent(event, item){
                console.log ('legend onClick', event);
                console.log('legd item', item);
            }
        }
    });
});