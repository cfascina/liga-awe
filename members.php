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
	<?php require_once('partials/header.html'); ?>

	<div class="content members">
		<table class="members"></table>
	</div>

	<?php require_once('partials/footer.html'); ?>

	<script src="./assets/js/libs/jquery.min.js"></script>
	<script src="./assets/js/libs/datatables.min.js"></script>
	<script src="./assets/js/services/members.js"></script>
	<script>
        function handleMembersData(data) {
            let arrTable = [];

            data.forEach(member => {
                let isPro = member.pro == 1 ? 'Sim' : 'Não';

                arrTable.push({
                    id_member: '<span class="id-member">' + member.id_cartola + '</span>', 
                    team: 
                        '<div class="shield-wrap">' + 
                            '<img src="' + member.shield + '" />' + 
                            '<span>' + member.team + '</span>' +
                        '</div>',
                    name: '<div class="team">' + member.name + '</div>', 
                    first_year: member.first_year, 
                    pro: isPro
                });
            });

            setClassificationTable(arrTable);
        }

        function setClassificationTable(data) {
            $('table.members').DataTable({
                data: data,
                'bInfo': false,
                'order': [1, 'asc'],
                paging: false,
                columns: [
                    {data: 'team',       title: 'Time' },
                    {data: 'name',       title: 'Nome' },
                    {data: 'first_year', title: 'Cartoleiro Desde' },
                    {data: 'pro',        title: 'Pró' }
                ]
            });
        }

		getMembers()
			.then(function(res) {
				handleMembersData(res);
			})
			.catch(function(err) {
				console.log('Something went wrong.');
				// console.log(err);
			});
	</script>
</body>

</html>