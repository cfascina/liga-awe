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
		<div class="info">
			<div class="shield-wrap">
				<img class="shield" />
			</div>
			<div class="team"></div>
			<div class="name"></div>
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
		
		function setMemberInfo(arrMember) {
			let proStamp = arrMember.pro == 1 ? '<img src="./assets/images/pro.svg" class="pro" />' : '';
			
			$('.info .shield-wrap img.shield').attr('src', arrMember.shield);
			$('.info .shield-wrap img.shield').after(proStamp);
			$('.info .team').append(arrMember.team);
			$('.info .name').append(arrMember.name + ' (Cartoleiro desde ' + arrMember.first_year + ')');
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