<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liga AWE</title>
	<link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>
	<?php require_once('partials/header.html'); ?>

	<div class="content member-details">
		<div class="profile">
			<div class="shield-wrap">
				<img class="shield" />
			</div>
			<div class="team"></div>
			<div class="name"></div>
		</div>

		<div class="info">
			<div class="points">
				<h1></h1>
				<span>pontos</span>
			</div>
			<div class="average">
				<h1></h1>
				<span>pontos por rodada</span>
			</div>
			<div class="patrimony">
				<h1></h1>
				<span>cartoletas</span>
			</div>
		</div>

		<div class="info">
			<div class="times-leader">
				<h1></h1>
				<span>rodada(s) na liderança</span>
			</div>
			<div class="times-last">
				<h1></h1>
				<span>rodada(s) na lanterna</span>
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

	<?php require_once('partials/footer.html'); ?>
	
	<script src="./assets/js/libs/jquery.min.js"></script>
	<script src="./assets/js/libs/chart.min.js"></script>
	<script src="./assets/js/services/members.js"></script>
	<script src="./assets/js/memberCharts.js"></script>
	<script>
		$.urlParam = function(paramName) {
			let paramValue = new RegExp('[\?&]' + paramName + '=([^&#]*)').exec(window.location.href);

			return paramValue[1] || 0;
		}

		function setProfile(data) {
			let proStamp = data.pro == 1 ? '<img src="./assets/images/pro.svg" class="pro" />' : '';
			
			$('.profile .shield-wrap img.shield').attr('src', data.shield);
			$('.profile .shield-wrap img.shield').after(proStamp);
			$('.profile .team').append(data.team);
			$('.profile .name').append(data.name + ' (Cartoleiro desde ' + data.first_year + ')');
		}

		function setBoxMemberPoints(points, rounds) {
			$('.info .points h1').append(points.replace('.', ','));
		}
		
		function setBoxMemberAverage(average) {
			$('.info .average h1').append(average.replace('.', ','));
		}

		function setBoxMemberPatrimony(average) {
			$('.info .patrimony h1').append(average.replace('.', ','));
		}

		function setBoxMemberTimesLeader(times) {
			$('.info .times-leader h1').append(times);
		}

		function setBoxMemberTimesLast(times) {
			$('.info .times-last h1').append(times);
		}
		
		getMember($.urlParam('memberId'))
			.then(function(res) {
				setProfile(res);
			})
			.catch(function(err) {
				console.log('Algo de errado não está certo!');
				// console.log(err);
			});

		getMemberPoints($.urlParam('memberId'))
			.then(function(res) {
				console.log(res);
				setBoxMemberPoints(res.points)
			})
			.catch(function(err) {
				console.log('Algo de errado não está certo!');
				// console.log(err);
			});

		getMemberAverage($.urlParam('memberId'))
			.then(function(res) {
				setBoxMemberAverage(res.average)
			})
			.catch(function(err) {
				console.log('Algo de errado não está certo!');
				// console.log(err);
			});

		getMemberPatrimony($.urlParam('memberId'))
			.then(function(res) {
				setBoxMemberPatrimony(res.patrimony)
			})
			.catch(function(err) {
				console.log('Algo de errado não está certo!');
				// console.log(err);
			});

		getMemberTimesLeader($.urlParam('memberId'))
			.then(function(res) {
				setBoxMemberTimesLeader(res.times)
			})
			.catch(function(err) {
				console.log('Algo de errado não está certo!');
				// console.log(err);
			});
		getMemberTimesLast($.urlParam('memberId'))
			.then(function(res) {
				setBoxMemberTimesLast(res.times)
			})
			.catch(function(err) {
				console.log('Algo de errado não está certo!');
				// console.log(err);
			});

		getMemberChartData($.urlParam('memberId'))
			.then(function(res) {
				splitChartData(res);
			})
			.catch(function(err) {
				console.log('Algo de errado não está certo!');
				// console.log(err);
			});
	</script>
</body>

</html>