<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liga AWE</title>
	<link rel="stylesheet" href="./assets/css/styles.css">
	<link rel="stylesheet" href="./assets/css/datatables.css">
</head>

<body>
	<header>
		<h1>Liga AWE</h1>
		<span class="sep">|</span>
		<span class="current">Classificação</span>
	</header>

	<div class="content classification">
        <table class="classification"></table>
	</div>

	<footer>
		Desenvolvido por <a href="http://www.caiofascina.com.br/" target="_blank">Caio Fascina</a>
	</footer>

	<script src="./assets/js/libs/jquery.min.js"></script>
	<script src="./assets/js/libs/datatables.min.js"></script>
	<script src="./assets/js/services/classification.js"></script>
	<script>
        function setClassificationTable(data) {
			$('table.classification').DataTable({
                data: data,
                'bInfo': false,
                'bFilter': false,
                'order': [0, 'asc'],
                'paging': false,
                columns: [
                    {data: 'position',            title: '#'           },
                    {data: 'team',                title: 'Time'        },
                    {data: 'points',              title: 'Pontos'      },
                    {data: 'total_round',         title: 'Pós Rodada'  },
                    {data: 'total_championship',  title: 'Total Geral' }
                ]
            });
        }

        function handleClassificationData(data) {
            arrTable = [];

            $.each(data, function(index, member) {
                arrTable.push({
                    position: '<span class="position">' + (index + 1) + '</span>',
                    team: 
                        '<img src="' + member.shield + '" class="shield" />' + 
                        '<span class="team">' + member.team + '</span>' +
                        '<span class="name"> (' + member.name + ')</span>',
                    points: member.points.replace('.', ','),
                    total_round: member.total_round.replace('.', ','),
                    total_championship: member.total_championship.replace('.', ',')
                });
            });

            setClassificationTable(arrTable);
        }

		getClassification(5)
			.then(function(res) {
                handleClassificationData(res);
			})
			.catch(function(err) {
				console.log('Something went wrong.');
				// console.log(err);
			});
	</script>
</body>

</html>