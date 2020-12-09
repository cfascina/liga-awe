function splitChartData(chartData) {
    let arrRounds = [];
    let arrPoints = [];
    let arrPatrimony = [];
    
    chartData.forEach(roundData => {
        arrRounds.push(roundData.id_round);
        arrPoints.push(roundData.points);
        arrPatrimony.push(roundData.patrimony);
    });

    setMemberChartPoints(arrRounds, arrPoints);
    setMemberChartPatrimony(arrRounds, arrPatrimony);
}

function setMemberChartPoints(arrRounds, arrPoints) {
    var ctx = new Chart($('#ctx-points'), {
        type: 'line',
        data: {
            labels: arrRounds,
            datasets: [{
                data: arrPoints,
                fill: false,
                borderColor: '#FF5700',
                borderWidth: 2,
                lineTension: 0,
                pointBackgroundColor: '#692705',
                pointBorderColor: '#692705'
            }]
        },
        options: {
            legend: {
                display: false
            },
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: '#692705',
                bodyAlign: 'center',
                bodyFontColor: '#FFEEE4',
                bodyFontStyle: 'bold',
                intersect: false,
                mode: 'index',
                titleAlign: 'center',
                titleFontColor: '#FFEEE4',
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
                        fontColor: '#692705',
                        fontSize: 14,
                        fontStyle: 'bold',
                        labelString: 'Rodadas'
                    },
                    ticks: {
                        fontColor: '#692705'
                    },
                    gridLines: {
                        color: '#E5C7BC',
                        zeroLineColor: '#E5C7BC'
                    }
                }],
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        fontColor: '#692705',
                        fontSize: 14,
                        fontStyle: 'bold',
                        labelString: 'Pontuação'
                    },
                    ticks: {
                        fontColor: '#692705'
                    },
                    gridLines: {
                        color: '#E5C7BC',
                        zeroLineColor: '#E5C7BC'
                    }
                }]                
            }  
        }
    });
}

function setMemberChartPatrimony(arrRounds, arrPatrimony) {
    var ctx = new Chart($('#ctx-patrimony'), {
        type: 'line',
        data: {
            labels: arrRounds,
            datasets: [{
                data: arrPatrimony,
                fill: false,
                borderColor: '#FF5700',
                borderWidth: 2,
                lineTension: 0,
                pointBackgroundColor: '#692705',
                pointBorderColor: '#692705'
            }]
        },
        options: {
            legend: {
                display: false
            },
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: '#692705',
                bodyAlign: 'center',
                bodyFontColor: '#FFEEE4',
                bodyFontStyle: 'bold',
                intersect: false,
                mode: 'index',
                titleAlign: 'center',
                titleFontColor: '#FFEEE4',
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
                        fontColor: '#692705',
                        fontSize: 14,
                        fontStyle: 'bold',
                        labelString: 'Rodadas'
                    },
                    ticks: {
                        fontColor: '#692705'
                    },
                    gridLines: {
                        color: '#E5C7BC',
                        zeroLineColor: '#E5C7BC'
                    }
                }],
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        fontColor: '#692705',
                        fontSize: 14,
                        fontStyle: 'bold',
                        labelString: 'Patrimônio'
                    },
                    ticks: {
                        // GET FROM DB
                        // max: 400,
                        // min: 100,
                        fontColor: '#692705'
                    },
                    gridLines: {
                        color: '#E5C7BC',
                        zeroLineColor: '#E5C7BC'
                    }
                }]                
            }  
        }
    });
}