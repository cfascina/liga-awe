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
            <div class="shield first-place">
				<h1>Líder</h1>
				<div class="wrap">
					<img class="shield" />
				</div>
				<span></span>
            </div>
            <div class="shield last-place">
				<h1>Lanterninha</h1>
				<div class="wrap">
					<img class="shield" />
				</div>
				<span></span>
            </div>
            <div class="shield highest-score">
				<h1>Maior Mitada</h1>
				<div class="wrap">
					<img class="shield" />
				</div>
				<span></span>
            </div>
            <div class="shield lowest-score">
				<h1>Maior Mitada</h1>
				<div class="wrap">
					<img class="shield" />
				</div>
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
			$('.info .average-points h1').append(average.replace('.', ','));
        }

		function setBoxMembersAveragePatrimony(average) {
			$('.info .average-patrimony h1').append(average.replace('.', ','));
		}

		function setBoxMembersFirstPlace(data) {
			let proStamp = data.pro == 1 ? '<img src="./assets/images/pro.svg" class="pro" />' : '';
			
			$('.info .shield.first-place .wrap img.shield').attr('src', data.shield);
			$('.info .shield.first-place .wrap img.shield').after(proStamp);
			$('.info .shield.first-place span').append(
				'<a href="memberDetails.php?memberId=' + data.id_member + '">' + data.team + '</a> ' +
				'com <strong>' + data.total.replace('.', ',') + '</strong> pontos ' +
				'em <strong>' + data.id_round + ' rodadas</strong>'
			);
		}

		function setBoxMembersLastPlace(data) {
			let proStamp = data.pro == 1 ? '<img src="./assets/images/pro.svg" class="pro" />' : '';
			
			$('.info .shield.last-place .wrap img.shield').attr('src', data.shield);
			$('.info .shield.last-place .wrap img.shield').after(proStamp);
			$('.info .shield.last-place span').append(
				'<a href="memberDetails.php?memberId=' + data.id_member + '">' + data.team + '</a> ' +
				'com <strong>' + data.total.replace('.', ',') + '</strong> pontos ' +
				'em <strong>' + data.id_round + ' rodadas</strong>'
			);
		}

        function setBoxMembersHighestScore(data) {
			let proStamp = data.pro == 1 ? '<img src="./assets/images/pro.svg" class="pro" />' : '';

			$('.info .shield.highest-score .wrap img.shield').attr('src', data.shield);
			$('.info .shield.highest-score .wrap img.shield').after(proStamp);
			$('.info .shield.highest-score span').append(
				'<a href="memberDetails.php?memberId=' + data.id_member + '">' + data.team + '</a> ' +
				'fez <strong>' + data.points.replace('.', ',') + '</strong> pontos ' +
				'na rodada <strong>' + data.id_round + '</strong>'
			);
        }
		
		function setBoxMembersLowestScore(data) {
			let proStamp = data.pro == 1 ? '<img src="./assets/images/pro.svg" class="pro" />' : '';

			$('.info .shield.lowest-score .wrap img.shield').attr('src', data.shield);
			$('.info .shield.lowest-score .wrap img.shield').after(proStamp);
			$('.info .shield.lowest-score span').append(
				'<a href="memberDetails.php?memberId=' + data.id_member + '">' + data.team + '</a> ' +
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
		getMembersFirstPlace()
			.then(function(res) {
				setBoxMembersFirstPlace(res);
			})
			.catch(function(err) {
				console.log('Something went wrong.');
				// console.log(err);
			});
		getMembersLastPlace()
			.then(function(res) {
				setBoxMembersLastPlace(res);
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