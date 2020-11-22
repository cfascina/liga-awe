<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liga AWE</title>
	<!-- <link rel="stylesheet" href="./assets/css/libs/chart.min.css"> -->
	<link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>
	<h1>Liga AWE</h1>
	<h2>Membros - Detalhes</h2>

	<div class="content member-details">
		Gráfico de pontuação
		<div class="graph-points">
			<canvas id="myChart" width="400" height="400"></canvas>
		</div>
	</div>


	<script src="./assets/js/libs/jquery.min.js"></script>
	<script src="./assets/js/libs/chart.min.js"></script>
	<script src="./assets/js/services/members.js"></script>
	<script>
		var ctx = $('#myChart');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38],
				datasets: [{
					data: [59.61, 33.97, 60.73, 24.34, 7.76, 42.48, 86.51, 57.87, 36.13, 5.84, 23.55, 46.15, 64.20, 54.59, 71.81, 28.70, 43.79, 71.05, 51.81, 45.91],
					fill: false,
					borderColor: 'blue',
					borderWidth: 2,
					lineTension: 0,
					pointBackgroundColor: 'green',
					pointBorderColor: 'green',
					
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
						// if(!tooltip) return;
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
	</script>

	<script>
		$.urlParam = function(paramName) {
			let paramValue = new RegExp('[\?&]' + paramName + '=([^&#]*)').exec(window.location.href);

			return paramValue[1] || 0;
		}

		// getMember($.urlParam('id'))
		// 	.then(function(res) {
		// 		console.log(res);
		// 		// Área de informações do membro;
		// 	})
		// 	.catch(function(err) {
		// 		console.log('Something went wrong.');
		// 		// console.log(err);
		// 	});

		// getMostUsedScheme($.urlParam('id'))
		// 	.then(function(res) {
		// 		// console.log(res);
		// 		// Box de Esquemas Táticos;
		// 	})
		// 	.catch(function(err) {
		// 		console.log('Something went wrong.');
		// 		// console.log(err);
		// 	});


		function setMembersTable(arrMembers) {
			// arrMembers.forEach(member => {
			// 	let isProStamp = member.pro == 1 ? '<img src="./assets/images/pro.svg" class="pro" />' : '';

			// 	$('.list').append(
			// 		'<a href="memberDetails.php?id=' + member.id + '">' +
			// 			'<img src="' + member.shield + '" class="shield" />' +
			// 			'<span class="team">' + member.team + '</span>' +
			// 			'<span class="name">(' + member.name + ')</span>' +
			// 			isProStamp +
			// 		'</a>'
			// 	);
			// });
		}
	</script>
</body>

</html>