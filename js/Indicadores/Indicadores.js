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
});