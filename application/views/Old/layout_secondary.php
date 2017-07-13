<html>
<head>
<title>Expression Collection</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/number_theory/lagrange.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.offcanvas.min.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/sidemenu-desktop.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/sidemenu-mobile.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/styles.css'?>">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.1.1.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.offcanvas.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/default.js'?>"></script>
	
</head>

<body class="body-offcanvas secondaryPage">
	<header>
		<div class="header-container container">
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
			<nav class="navbar navbar-default navbar-offcanvas navbar-offcanvas-touch navbar-phone" role="navigation" id="js-bootstrap-offcanvas">
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
		</div>
	</header>
	<section class="main">
		<div class="container">
			<div class="row affix-row">
				<div class="col-sm-3 col-md-3 col-lg-3 affix-sidebar sidebar-col">
					<div class="navbar navbar-default sidebar-desktop" role="navigation">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<span class="visible-xs navbar-brand">Sidebar menu</span>
						</div>
						<div class="navbar-collapse collapse sidebar-navbar-collapse mynavbar-collapse">
							<ul class="nav navbar-nav primary-list" id="sidenav01">
								<li>
									<a href="#" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="sidemenu-li collapsed">
										Number theory <span class="glyphicon glyphicon-triangle-bottom pull-right"></span>
									</a>
									<div class="collapse dropdown-menu-area" id="toggleDemo" style="height: 0px;">
										<ul class="nav nav-list secondary-list">
											<li><a href="#">Factorization</a></li>
											<li><a href="#">Modulo</a></li>
											<li><a href="#">Euclidean algorithm</a></li>
											<li><a href="#">Diophantine equation</a></li>
										</ul>
									</div>
								</li>
								<li>
									<a href="#" data-toggle="collapse" data-target="#toggleDemo1" data-parent="#sidenav01" class="sidemenu-li collapsed">
										Linear Algebra <span class="glyphicon glyphicon-triangle-bottom pull-right"></span>
									</a>
									<div class="collapse dropdown-menu-area" id="toggleDemo1" style="height: 0px;">
										<ul class="nav nav-list secondary-list">
											<li><a href="#">Vectors</a></li>
											<li><a href="#">Matrices</a></li>
											<li><a href="#">Determinant</a></li>
											<li><a href="#">Linear equations</a></li>
										</ul>
									</div>
								</li>
								<li>
									<a href="#" data-toggle="collapse" data-target="#toggleDemo2" data-parent="#sidenav01" class="sidemenu-li collapsed">
										Polynomials <span class="glyphicon glyphicon-triangle-bottom pull-right"></span>
									</a>
									<div class="collapse dropdown-menu-area" id="toggleDemo2" style="height: 0px;">
										<ul class="nav nav-list secondary-list">
											<li><a href="#">Basic operations</a></li>
											<li><a href="#">Factorization</a></li>
											<li><a href="#">Find roots</a></li>
											<li><a href="#">Lagrange</a></li>
										</ul>
									</div>
								</li>
								<li>
									<a href="#" data-toggle="collapse" data-target="#toggleDemo3" data-parent="#sidenav01" class="sidemenu-li collapsed">
										Code theory <span class="glyphicon glyphicon-triangle-bottom pull-right"></span>
									</a>
									<div class="collapse dropdown-menu-area" id="toggleDemo3" style="height: 0px;">
										<ul class="nav nav-list secondary-list">
											<li><a href="#">Entropy</a></li>
											<li><a href="#">Source coding</a></li>
											<li><a href="#">Channel coding</a></li>
											<li><a href="#">Linear codes</a></li>
										</ul>
									</div>
								</li>
								<!--<li><a href="#"><span class="glyphicon glyphicon-lock"></span> Normalmenu</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-calendar"></span> WithBadges <span class="badge pull-right">42</span></a></li>
								<li><a href=""><span class="glyphicon glyphicon-cog"></span> PreferencesMenu</a></li>-->
							</ul>
						</div><!--/.nav-collapse -->
					</div>
				</div>
				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 affix-content content-div">
					<div class="content-section">
						<!--<?php// if (isset ($content)) {echo $content;} else {echo "Error";}?>-->
						<!-- $content az adott tárgy html (view) fileja amiben van egy $title -> Title és egy $description -> Description.
							 Az ezalatti rész az egyedi view fileokban lesz -->
						<div class="page-header">
							<h1><?php if (isset ($title)) {echo $title;} else {echo "Lagrange interpolation";}?></h1>
						</div>
						<div class="page-description">
							<h2><?php if (isset ($description)) {echo $description;} else {echo "Tool to find the equation of a function. Lagrange Interpolating Polynomial is a method for finding the equation corresponding to a curve having some dots coordinates of it.";}?> </h2>
						</div>
						<div class="content">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 function-values">
								<form id="tableForValues" action=<?php echo base_url()."index.php/polynomials/lagrange"?> method="GET">
									<div class="function-values">
										<table class="table table-hover mainTable">
											<thead>
												<tr>
													<th>X</th>
													<th>Y</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><input type="text" id="x-value" name="input-x[]" /></td>
													<td><input type="text" id="y-value" name="input-y[]" /></td>
												</tr>
												<tr>
													<td><input type="text" id="x-value" name="input-x[]" /></td>
													<td><input type="text" id="y-value" name="input-y[]" /></td>
												</tr>
												<tr>
													<td><input type="text" id="x-value" name="input-x[]" /></td>
													<td><input type="text" id="y-value" name="input-y[]" /></td>
												</tr>
												<tr>
													<td><input type="text" id="x-value" name="input-x[]" /></td>
													<td><input type="text" id="y-value" name="input-y[]" /></td>
												</tr>
												<tr>
													<td><input type="button" id="newRow" class="btn btn-success" name="new-row" value="Add more values!" /></td>
													<td><input type="submit" class="btn btn-primary" name="submit" value="Find f(x)!" /></td>
												</tr>
											</tbody>
										</table>
									</div>
								</form>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-7 function">
								<?php 
								if (isset($function)) {
									print_r($function);
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>