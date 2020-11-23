<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liga AWE</title>
	<link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>
	<header>
		<h1>Liga AWE</h1>
		<span class="sep">|</span>
		<a href="members.php">Membros</a>
		<span class="sep">></span>
		<span class="current">Detalhes</span>
	</header>

	<div class="content member-details">
		<h1>Informações Gerais</h1>
		<div class="info">
			<div class="wrap">
				<div class="box">
					<img src="" class="shield" />
					<span class="team"></span>
					<img src="./assets/images/pro.svg" class="pro" />
				</div>
				<div class="box">
					<img src="" class="avatar" />
					<span class="name"></span>
				</div>
				<div class="box">
					<img src="" class="shirt" />
					<span class="first_year"></span>	
				</div>
			</div>
		</div>

		<h1>Gráfico de Pontuação</h1>
		<div class="chart points">
			<canvas id="ctx-points"></canvas>
		</div>

		<h1>Gráfico de Patrimônio</h1>
		<div class="chart patrimony">
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
				console.log('Algo de errado não está certo!');
				// console.log(err);
			});

		getMember($.urlParam('id'))
			.then(function(res) {
				setMemberInfo(res[0]);
			})
			.catch(function(err) {
				console.log('Algo de errado não está certo!');
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

		function setMemberInfo(arrMember) {
			$('.info .box img.shield').attr('src', arrMember.shield);
			$('.info .box img.avatar').attr('src', arrMember.avatar);
			$('.info .box img.shirt').attr('src', arrMember.shirt);

			$('.info .box span.team').append(arrMember.team);
			$('.info .box span.name').append(arrMember.name);
			$('.info .box span.first_year').append('Cartoleiro desde ' + arrMember.first_year);

			console.log(arrMember);
			// console.log(arrMember.team);
			// console.log(arrMember.name);
			// console.log(arrMember.first_year);
		}

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