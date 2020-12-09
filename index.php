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

	<div class="content index">
        <div class="info">
            <div class="count">
				<h1></h1>
				<span>membros na liga</span>
			</div>
            <div class="average-points">
				<h1></h1>
				<span>é a média de pontos da liga</span>
			</div>
			<div class="average-patrimony">
				<h1></h1>
				<span>é a média de patrimônio da liga</span>
			</div>
		</div>
		<div class="info">
            <div class="highest-score">
				<h1>Maior Pontuação</h1>
				<span></span>
            </div>
            <div class="lowest-score">
				<h1>Menor Pontuação</h1>
				<span></span>
            </div>
            
        </div>
	</div>

	<?php require_once('partials/footer.html'); ?>

	<script src="./assets/js/libs/jquery.min.js"></script>
    <script src="./assets/js/services/members.js"></script>
    <script>
        function setBoxMembersCount(count) {
			$('.info .count h1').append(count);
		}

		function setBoxMembersAveragePoints(average) {
			console.log(average);
			$('.info .average-points h1').append(average.replace('.', ','));
        }

		function setBoxMembersAveragePatrimony(average) {
			$('.info .average-patrimony h1').append(average.replace('.', ','));
        }

        function setBoxMembersHighestScore(data) {
			$('.info .highest-score span').append(
				'<strong>' + data.team + '</strong> (' + data.name + ') ' + 
				'fez <strong>' + data.points.replace('.', ',') + '</strong> pontos ' +
				'na rodada <strong>' + data.id_round + '</strong>'
			);
        }

		function setBoxMembersLowestScore(data) {
			$('.info .lowest-score span').append(
				'<strong>' + data.team + '</strong> (' + data.name + ') ' + 
				'fez <strong>' + data.points.replace('.', ',') + '</strong> pontos ' +
				'na rodada <strong>' + data.id_round + '</strong>'
			);
		}
        
        getMembersCount()
			.then(function(res) {
				setBoxMembersCount(res.count);
			})
			.catch(function(err) {
				console.log('Something went wrong.');
				// console.log(err);
			});
			
		getMembersAveragePatrimony()
			.then(function(res) {
				setBoxMembersAveragePatrimony(res.average);
			})
			.catch(function(err) {
				console.log('Something went wrong.');
				// console.log(err);
			});
			
		getMembersAveragePoints()
			.then(function(res) {
				setBoxMembersAveragePoints(res.average);
			})
			.catch(function(err) {
				console.log('Something went wrong.');
				// console.log(err);
			});
        
		getMembersHighestScore()
			.then(function(res) {
				setBoxMembersHighestScore(res);
			})
			.catch(function(err) {
				console.log('Something went wrong.');
				// console.log(err);
            });
        
		getMembersLowestScore()
			.then(function(res) {
				setBoxMembersLowestScore(res);
			})
			.catch(function(err) {
				console.log('Something went wrong.');
				// console.log(err);
			});
    </script>
</body>

</html>