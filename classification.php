<!DOCTYPE html>
<html lang="en">
	
<?php require_once('partials/head.html'); ?>

<body>
	<?php require_once('partials/header.html'); ?>

	<div class="content classification">
        <div class="select-wrap">
            <label class="rounds">Selecione a rodada</label>
            <select class="slt-round"></select>
        </div>

        <div class="selected-round">Rodada selecionada: <span></span></div>
        <div class="clear"></div>

		<div class="table-wrap">
            <table class="classification"></table>
        </div>
	</div>

	<?php require_once('partials/footer.html'); ?>

	<script src="./assets/js/libs/jquery.min.js"></script>
	<script src="./assets/js/menuToggle.js"></script>
	<script src="./assets/js/libs/datatables.min.js"></script>
    <script src="./assets/js/services/rounds.js"></script>
	<script src="./assets/js/services/classification.js"></script>
	<script>
        function setRoundsSelect(quantity) {
            for(let roundId = 1; roundId <= quantity; roundId++) {
                $('.slt-round').append('<option value="' + roundId + '">' + roundId + '</option>')
            }
        }
        
        function changeRound(roundId) {
            if(roundId != 0) {
                getClassification(roundId)
                    .then(function(res) {
                        handleClassificationData(res);
                    })
                    .catch(function(err) {
                        console.log('Something went wrong.');
                        // console.log(err);
                    });

                setSelectedRound(roundId);
            }
        }

        function handleClassificationData(data) {
            let arrTable = [];

            $.each(data, function(index, member) {
                arrTable.push({
                    position: '<span class="position">' + (index + 1) + '</span>',
                    team: 
                        '<div class="shield-wrap">' + 
                            '<img src="' + member.shield + '" />' + 
                            '<span class="team">' + member.team + '</span>' +
                            '<span class="name">(' + member.team + ')</span>' +
                        '</div>',
                    points: member.points.replace('.', ','),
                    total_round: member.total_round.replace('.', ','),
                    total_championship: member.total_championship.replace('.', ',')
                });
            });

            setClassificationTable(arrTable);
        }

        function setClassificationTable(data) {
            $('table.classification').DataTable({
                destroy: true,
                data: data,
                'bInfo': false,
                'bFilter': false,
                'order': [0, 'asc'],
                paging: false,
                columns: [
                    {data: 'position',            title: '#'           },
                    {data: 'team',                title: 'Time'        },
                    {data: 'points',              title: 'Pontos'      },
                    {data: 'total_round',         title: 'Pós Rodada'  },
                    {data: 'total_championship',  title: 'Total Geral' }
                ]
            });
        }

        function setSelectedRound(idRound) {
            $('.selected-round span').empty().append(idRound);
        }

        $('.slt-round').on('change', function() {
            changeRound(this.value);
        });

        getRoundsQuantity()
			.then(function(res) {
				setRoundsSelect(res.quantity);
			})
			.catch(function(err) {
				console.log('Something went wrong.');
				// console.log(err);
			});

        changeRound(1);
	</script>
</body>

</html>