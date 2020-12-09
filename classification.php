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

	<div class="content classification">
        <div class="select-wrap">
            <label class="rounds">Selecione a rodada</label>
            <select class="slt-round">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
            </select>
        </div>

        <div class="selected-round">Rodada selecionada: <span></span></div>
        <div class="clear"></div>

        <table class="classification"></table>
	</div>

	<footer>
		Desenvolvido por <a href="http://www.caiofascina.com.br/" target="_blank">Caio Fascina</a>
	</footer>

	<script src="./assets/js/libs/jquery.min.js"></script>
	<script src="./assets/js/libs/datatables.min.js"></script>
	<script src="./assets/js/services/classification.js"></script>
	<script>
        $('.slt-round').on('change', function() {
            changeRound(this.value);
        });

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

        changeRound(1);
	</script>
</body>

</html>