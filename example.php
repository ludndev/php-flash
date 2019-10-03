<?php 

require ('flash.php');

flash::message("Hello world");




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Flash IT</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.11.4/css/alertify.min.css" integrity="sha256-HyknUQX006D7lC1CzL2BQqMMjX7cQV7unnkuNrYUDgM=" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.11.4/css/themes/bootstrap.min.css" integrity="sha256-tWRKenfvuraOz4u9wNIkJVrUFbRN712r9WtYhGUPirg=" crossorigin="anonymous" />
</head>
<body>



	<div class="container">
		

		<div class="jumbotron" style="height: 100%;">
			
			<h1 class="text-center">Simple flash lib with AlertifyJS.</h1>
			<p> Feel free to modify, adapt the code to your project ;) </p>

		</div>


	</div>





	<script type="text/javascript">
		<?= $flash->display() ?>
	</script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.11.4/alertify.min.js"></script>
</body>
</html>