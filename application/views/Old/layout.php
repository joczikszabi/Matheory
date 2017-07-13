<html>
<head>
<title>Expression Collection</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/styles.css'?>">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.1.1.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/default.js'?>"></script>
</head>
<body>
	<div class="container">
		<div class="search-area primary-search">
			<header>
				<div class="row">
					<div class="col-md-12">
						<form id="search" action="#" method="GET">
							<input id="input-search" class="form-control" type="text" name="e" placeholder="Enter what you want to solve" />
						</form>
					</div>
				</div>
			</header>
		</div>
		<?php
		echo $topics; 
		?>
	</div>
</body>
</html>