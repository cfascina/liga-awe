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

	<div class="content team-details">
		<h1></h1>
	</div>


	<script src="./assets/js/libs/jquery.min.js"></script>
	<script src="./assets/js/services/members.js"></script>
	<script>
		$.urlParam = function(paramName) {
			let paramValue = new RegExp('[\?&]' + paramName + '=([^&#]*)').exec(window.location.href);

			return paramValue[1] || 0;
		}

		getMember($.urlParam('id'))
			.then(function(res) {
				console.log(res);
				// setMembersTable(res);
			})
			.catch(function(err) {
				console.log('Something went wrong.');
				// console.log(err);
			});

		getMostUsedScheme($.urlParam('id'))
			.then(function(res) {
				console.log(res);
				// setMembersTable(res);
			})
			.catch(function(err) {
				console.log('Something went wrong.');
				// console.log(err);
			});

		// function setMembersTable(arrMembers) {
		// 	arrMembers.forEach(member => {
		// 		let isProStamp = member.pro == 1 ? '<img src="./assets/images/pro.svg" class="pro" />' : '';

		// 		$('.list').append(
		// 			'<a href="memberDetails.php?id=' + member.id + '">' +
		// 				'<img src="' + member.shield + '" class="shield" />' +
		// 				'<span class="team">' + member.team + '</span>' +
		// 				'<span class="name">(' + member.name + ')</span>' +
		// 				isProStamp +
		// 			'</a>'
		// 		);
		// 	});
		// }
	</script>
</body>

</html>