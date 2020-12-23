<!DOCTYPE html>
<html lang="en">
	
<?php require_once('partials/head.html'); ?>

<body>
	<?php require_once('partials/header.html'); ?>

	<div class="content members">
		test
	</div>

	<?php require_once('partials/footer.html'); ?>

	<script src="./assets/js/libs/jquery.min.js"></script>
	<script src="./assets/js/menuToggle.js"></script>
	<script>
        function getMembers() {
            return $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'api/members/getMembers.php'
            });
        }
 
        getMembers().done(function(response) {
            console.log('response');
            console.log(response);
        }).fail(function(jqXHR,textStatus,errorThrown) {
            console.log(jqXHR)
            console.log(textStatus)
            console.log(errorThrown)
        });
	</script>
</body>

</html>