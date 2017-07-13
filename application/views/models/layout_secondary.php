<html>
<head>
<title>Expression Collection</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/styles.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.offcanvas.min.css'?>">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.1.1.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/default.js'?>"></script>
	
</head>

<body class="body-offcanvas">
	<div class="container">
		<div class="topbar">
			<header>
				<div class="row header-row">
					<div class="col-xs-10 col-sm-12 col-md-12 col-lg-12 search-col">
						<div class="search-area secondary-search">
							<form id="search" action="#" method="GET">
								<input id="input-search" class="form-control" type="text" name="e" placeholder="Enter what you want to solve" />
							</form>
						</div>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 responsive-menu">
						<button type="button" id="responsive-button" class="navbar-toggle offcanvas-toggle" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
				</div>
				<nav class="navbar navbar-default navbar-offcanvas navbar-offcanvas-touch navbar-topics" role="navigation" id="js-bootstrap-offcanvas">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<a class="navbar-brand" href="#">Topics</a>
							<div class="navbar-header-menu">
								<ul class="nav navbar-nav">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Number theory <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="#">Factorization</a></li>
											<li><a href="#">Modulo</a></li>
											<li><a href="#">Euclidean algorithm</a></li>
											<li><a href="#">Diophantine equation</a></li>
										</ul>
									</li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Linear algebra <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="#">Vectors</a></li>
											<li><a href="#">Matrices</a></li>
											<li><a href="#">Determinant</a></li>
											<li><a href="#">Linear equations</a></li>
										</ul>
									</li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Polynomials <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="#">General operations</a></li>
											<li><a href="#">Factorization</a></li>
											<li><a href="#">Find roots</a></li>
											<li><a href="#">Lagrange interpolation</a></li>
										</ul>
									</li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Code theory <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="#">Entropy</a></li>
											<li><a href="#">Source coding</a></li>
											<li><a href="#">Channel coding</a></li>
											<li><a href="#">Linear codes</a></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div><!-- /.container-fluid -->
				</nav>
			</header>
		</div>
		<div class="row">
			<div class="side-menu col-xs-12 col-sm-3 col-md-3 col-lg-3">
				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
						<div class="panel-heading side-menu-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseNt">
								<h4 class="panel-title">Number theory</h4>
							</a>
						</div>
						<div id="collapseNt" class="panel-collapse collapse in side-menu-panel">
							<ul class="list-group">
								<a href="#"><li class="list-group-item">Factorization</li></a>
								<a href="#"><li class="list-group-item">Modulo</li></a>
								<a href="#"><li class="list-group-item">Euclidean algorithm</li></a>
								<a href="#"><li class="list-group-item">Diophantine equation<span class="badge">42</span></li></a>
							</ul>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading side-menu-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseLa">
								<h4 class="panel-title">Linear algebra</h4>
							</a>
						</div>
						<div id="collapseLa" class="panel-collapse collapse side-menu-panel">
							<ul class="list-group">
								<a href="#"><li class="list-group-item">Vectors</li></a>
								<a href="#"><li class="list-group-item">Matrices</li></a>
								<a href="#"><li class="list-group-item">Determinant</li></a>
								<a href="#"><li class="list-group-item">Linear equations</li></a>
							</ul>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading side-menu-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapsePo">
								<h4 class="panel-title">Polynomials</h4>
							</a>
						</div>
						<div id="collapsePo" class="panel-collapse collapse side-menu-panel">
							<ul class="list-group">
								<a href="#"><li class="list-group-item">Basic operations</li></a>
								<a href="#"><li class="list-group-item">Factorization</li></a>
								<a href="#"><li class="list-group-item">Find roots</li></a>
								<a href="#"><li class="list-group-item">Lagrange interpolation</li></a>
							</ul>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading side-menu-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseCt">
								<h4 class="panel-title">Code theory</h4>
							</a>
						</div>
						<div id="collapseCt" class="panel-collapse collapse side-menu-panel">
							<ul class="list-group">
								<a href="#"><li class="list-group-item">Entropy</li></a>
								<a href="#"><li class="list-group-item">Source coding</li></a>
								<a href="#"><li class="list-group-item">Channel coding</li></a>
								<a href="#"><li class="list-group-item">Linear codes</li></a>
							</ul>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseTest">Test</a>
							</h4>
						</div>
						<div id="collapseTest" class="panel-collapse collapse">
							<div class="list-group">
								<a href="#" class="list-group-item">
									<h4 class="list-group-item-heading">List group item heading</h4>
									<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
								</a>
							</div>
							<div class="list-group">
								<a href="#" class="list-group-item active">
									<h4 class="list-group-item-heading">List group item heading</h4>
									<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
								</a>
							</div>
							<div class="list-group">
								<a href="#" class="list-group-item">
									<h4 class="list-group-item-heading">List group item heading</h4>
									<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
				<div class="mid-page">
					<div class="content">
						<p> B </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>