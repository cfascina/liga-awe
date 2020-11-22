function setChartPoints(arrRounds, arrPoints) {
    var ctx = new Chart($('#ctx-points'), {
        type: 'line',
        data: {
            labels: arrRounds,
            datasets: [{
                data: arrPoints,
                fill: false,
                borderColor: 'blue',
                borderWidth: 2,
                lineTension: 0,
                pointBackgroundColor: 'green',
                pointBorderColor: 'green'
            }]
        },
        options: {
            legend: {
                display: false
            },
            maintainAspectRatio: false,
            tooltips: {
                mode: 'index',
                intersect: false,
                backgroundColor: 'green',
                custom: function(tooltip) {
                    tooltip.displayColors = false;
                },
                callbacks: {
                    title: function(tooltipItem, data) {
                        return 'Rodada ' + tooltipItem[0].xLabel;
                    },
                    label: function(tooltipItem, data) {
                        return 'Pontuação: ' + tooltipItem.yLabel;
                    }
                }
            },
            scales: {
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Rodadas'
                    }
                }],
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Pontuação'
                    }
                }]
            }  
        }
    });
}

function setChartPatrimony(arrRounds, arrPatrimony) {
    var ctx = new Chart($('#ctx-patrimony'), {
        type: 'line',
        data: {
            labels: arrRounds,
            datasets: [{
                data: arrPatrimony,
                fill: false,
                borderColor: 'blue',
                borderWidth: 2,
                lineTension: 0,
                pointBackgroundColor: 'green',
                pointBorderColor: 'green'
            }]
        },
        options: {
            legend: {
                display: false
            },
            maintainAspectRatio: false,
            tooltips: {
                mode: 'index',
                intersect: false,
                backgroundColor: 'green',
                custom: function(tooltip) {
                    tooltip.displayColors = false;
                },
                callbacks: {
                    title: function(tooltipItem, data) {
                        return 'Rodada ' + tooltipItem[0].xLabel;
                    },
                    label: function(tooltipItem, data) {
                        return 'Patrimônio: ' + tooltipItem.yLabel;
                    }
                }
            },
            scales: {
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Rodadas'
                    }
                }],
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Patrimônio'
                    }
                }]
            }  
        }
    });
}