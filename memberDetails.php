<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liga AWE</title>
	<link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>
	<h1>Liga AWE</h1>
	<h2>Membros - Detalhes</h2>

	<div class="content member-details">
		<div class="chart points">
			<h1>Gráfico de Pontuação</h1>
			<canvas id="ctx-points"></canvas>
		</div>

		<div class="chart patrimony">
			<h1>Gráfico de Patrimônio</h1>
			<canvas id="ctx-patrimony"></canvas>
		</div>
	</div>


	<script src="./assets/js/libs/jquery.min.js"></script>
	<script src="./assets/js/libs/chart.min.js"></script>
	<script src="./assets/js/services/members.js"></script>
	<script src="./assets/js/memberCharts.js"></script>
	<script>
		$.urlParam = function(paramName) {
			let paramValue = new RegExp('[\?&]' + paramName + '=([^&#]*)').exec(window.location.href);

			return paramValue[1] || 0;
		}

		getChartData($.urlParam('id'))
			.then(function(res) {
				splitChartData(res);
			})
			.catch(function(err) {
				console.log('Something went wrong.');
				// console.log(err);
			});

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
	</script>
</body>

</html>