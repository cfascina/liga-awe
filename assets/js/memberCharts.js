function splitChartData(chartData) {
    let arrRounds = [];
    let arrPoints = [];
    let arrPatrimony = [];
    
    chartData.forEach(roundData => {
        arrRounds.push(roundData.id_round);
        arrPoints.push(roundData.points);
        arrPatrimony.push(roundData.patrimony);
    });

    setChartPoints(arrRounds, arrPoints);
    setChartPatrimony(arrRounds, arrPatrimony);
}

function setChartPoints(arrRounds, arrPoints) {
    var ctx = new Chart($('#ctx-points'), {
        type: 'line',
        data: {
            labels: arrRounds,
            datasets: [{
                data: arrPoints,
                fill: false,
                borderColor: '#2B7A78',
                borderWidth: 2,
                lineTension: 0,
                pointBackgroundColor: '#17252A',
                pointBorderColor: '#17252A'
            }]
        },
        options: {
            legend: {
                display: false
            },
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: '#2B7A78',
                bodyAlign: 'center',
                bodyFontColor: '#FEFFFF',
                bodyFontStyle: 'bold',
                intersect: false,
                mode: 'index',
                titleAlign: 'center',
                titleFontColor: '#FEFFFF',
                custom: function(tooltip) {
                    tooltip.displayColors = false;
                },
                callbacks: {
                    title: function(tooltipItem, data) {
                        return 'Rodada ' + tooltipItem[0].xLabel;
                    },
                    label: function(tooltipItem, data) {
                        return 'Pontuação: ' + tooltipItem.yLabel.toFixed(2);
                    }
                }
            },
            scales: {
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        fontColor: '#2B7A78',
                        fontSize: 14,
                        fontStyle: 'bold',
                        labelString: 'Rodadas'
                    },
                    ticks: {
                        fontColor: '#2B7A78'
                    },
                    gridLines: {
                        // color: 'red'
                    }
                }],
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        fontColor: '#2B7A78',
                        fontSize: 14,
                        fontStyle: 'bold',
                        labelString: 'Pontuação'
                    },
                    ticks: {
                        beginAtZero: true,
                        fontColor: '#2B7A78'
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
                borderColor: '#2B7A78',
                borderWidth: 2,
                lineTension: 0,
                pointBackgroundColor: '#17252A',
                pointBorderColor: '#17252A'
            }]
        },
        options: {
            legend: {
                display: false
            },
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: '#2B7A78',
                bodyAlign: 'center',
                bodyFontColor: '#FEFFFF',
                bodyFontStyle: 'bold',
                intersect: false,
                mode: 'index',
                titleAlign: 'center',
                titleFontColor: '#FEFFFF',
                custom: function(tooltip) {
                    tooltip.displayColors = false;
                },
                callbacks: {
                    title: function(tooltipItem, data) {
                        return 'Rodada ' + tooltipItem[0].xLabel;
                    },
                    label: function(tooltipItem, data) {
                        return 'Patrimônio: ' + tooltipItem.yLabel.toFixed(2);
                    }
                }
            },
            scales: {
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        fontColor: '#2B7A78',
                        fontSize: 14,
                        fontStyle: 'bold',
                        labelString: 'Rodadas'
                    },
                    ticks: {
                        fontColor: '#2B7A78'
                    }
                }],
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        fontColor: '#2B7A78',
                        fontSize: 14,
                        fontStyle: 'bold',
                        labelString: 'Patrimônio'
                    },
                    ticks: {
                        fontColor: '#2B7A78'
                    }
                }]
            } 
        }
    });
}