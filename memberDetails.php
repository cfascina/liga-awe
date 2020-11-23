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
		<div class="info">
			<h1>Informações Gerais</h1>
			<div class="wrap">
				<div class="box">
					<img src="https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_181/escudo/c2/10/28/00ef471e0b-9abe-4da5-afa6-e775d705b2c220201103141028" class="shield" />
					<span class="team">Dupla Marques</span>
					<img src="./assets/images/pro.svg" class="pro" />
				</div>
				<div class="box">
					<img src="https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/placeholder/perfil.png" class="avatar" />
					<span>Myller e Matheus</span>
				</div>
				<div class="box">
					<img src="https://s3.glbimg.com/v1/AUTH_58d78b787ec34892b5aaa0c7a146155f/cartola_svg_181/camisa/c2/11/23/00ef471e0b-9abe-4da5-afa6-e775d705b2c220201103141123" class="shirt" />
					<span>Cartoleiro dede 2016</span>	
				</div>
			</div>
		</div>

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
			console.log(arrMember);
			// console.log(arrMember.team);
			// console.log(arrMember.name);
			// console.log(arrMember.first_year);
			// console.log(arrMember.avatar​​);
			// console.log(arrMember.pro);
			// console.log(arrMember.shield);
			// console.log(arrMember.shirt);
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