<!DOCTYPE html>
<html lang="en">
	
<?php require_once('partials/head.html'); ?>

<body>
	<?php require_once('partials/header.html'); ?>

	<div class="content members">
		<div class="table-wrap">
			<table class="members"></table>
		</div>
	</div>

	<?php require_once('partials/footer.html'); ?>

	<script src="./assets/js/libs/jquery.min.js"></script>
	<script src="./assets/js/menuToggle.js"></script>
	<script src="./assets/js/libs/datatables.min.js"></script>
	<script src="./assets/js/services/members.js"></script>
	<script>
        function handleMembersData(data) {
            let arrTable = [];

            data.forEach(member => {
                let isPro = member.pro == 1 ? 'Sim' : 'Não';

                arrTable.push({ 
                    team: 
                        '<div class="shield-wrap">' + 
                            '<img src="' + member.shield + '" />' + 
                            '<span>' + member.team + '</span>' +
                        '</div>',
                    name: '<div class="team">' + member.name + '</div>', 
                    firstYear: member.first_year, 
                    pro: isPro,
                    memberId: member.id_cartola
                });
            });

            setMembersTable(arrTable);
        }

        function setMembersTable(data) {
            $('table.members').DataTable({
                data: data,
                bInfo: false,
                order: [1, 'asc'],
                paging: false,
				responsive: {
					details: {
						type: 'column',
						target: 'tr'
					}
				},
                columns: [
                    {data: 'team',      title: 'Time' },
                    {data: 'name',      title: 'Nome' },
                    {data: 'firstYear', title: 'Cartoleiro Desde' },
                    {data: 'pro',       title: 'Pró' },
                    {data: 'memberId',  title: '' }
				],
				columnDefs: [
					// { responsivePriority: 1, targets: 0 },
					{
						targets: 4,
						data: 'memberId',
						orderable: false,
    					render: function(data, type, row, meta) {
							return '<a href="memberDetails.php?memberId=' + data + '">Detalhes</a>';
						}
					}
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