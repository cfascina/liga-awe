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
		<span class="current">Membros</span>
	</header>

	<div class="content members">
		<div class="list"></div>
	</div>

	<footer>
		Desenvolvido por <a href="http://www.caiofascina.com.br/" target="_blank">Caio Fascina</a>
	</footer>

	<script src="./assets/js/libs/jquery.min.js"></script>
	<script src="./assets/js/services/members.js"></script>
	<script>
		getMembers()
			.then(function(res) {
				setMembersTable(res);
			})
			.catch(function(err) {
				console.log('Something went wrong.');
				// console.log(err);
			});

		function setMembersTable(arrMembers) {
			arrMembers.forEach(member => {
				let proStamp = member.pro == 1 ? '<img src="./assets/images/pro.svg" class="pro" />' : '';

				$('.list').append(
					'<a href="memberDetails.php?memberId=' + member.id_cartola + '">' +
						'<img src="' + member.shield + '" class="shield" />' +
						'<span class="team">' + member.team + '</span>' +
						'<span class="name">(' + member.name + ')</span>' +
						proStamp +
					'</a>'
				);
			});
		}
	</script>
</body>

</html>