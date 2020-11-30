<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liga AWE</title>
    <!-- REALIZAR ESTILIZAÇÃO PRÓRIA -->
	<!-- <link rel="stylesheet" href="./assets/css/libs/datatables.min.css"> -->
	<link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>
	<header>
		<h1>Liga AWE</h1>
		<span class="sep">|</span>
		<span class="current">Classificação</span>
	</header>

	<div class="content classification">
        <table id="classification" class="display" width="100%"></table>
	</div>

	<footer>
		Desenvolvido por <a href="http://www.caiofascina.com.br/" target="_blank">Caio Fascina</a>
	</footer>

	<script src="./assets/js/libs/jquery.min.js"></script>
	<script src="./assets/js/libs/datatables.min.js"></script>
	<script src="./assets/js/services/classification.js"></script>
	<script>
        function setClassificationTable(data) {
			$('#classification').DataTable({
                data: data,
                'bInfo': false,
                'paging': false,
                columns: [
                    {data: 'team',   title: 'Time'   },
                    {data: 'points', title: 'Pontos' },
                    {data: 'total',  title: 'Total'  }
                ]
            });
        }

        function handleClassificationData(data) {
            console.log('handleClassificationData');
            arrTable = [];

            data.forEach(member => {
                arrTable.push({
                    team: 
                        '<img src="' + member.shield + '" class="shield" />' + 
                        member.team + 
                        ' (' + member.name + ')',
                    points: member.points,
                    total: member.total
                });
            });

            setClassificationTable(arrTable);
        }

		getClassification(1)
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