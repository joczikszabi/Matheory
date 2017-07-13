<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>number_theory</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/resethtml.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.css" integrity="sha384-wITovz90syo1dJWVh32uuETPVEtGigN07tkttEqPv+uR2SE/mbQcG7ATL28aI9H0" crossorigin="anonymous">
    <link rel="icon" href="<?php echo base_url().'favicon.ico'?>"/>
</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 hidden-sm hidden-xs col-language">
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle language-button" data-toggle="dropdown" aria-expanded="false" type="button">Select a language<i class="glyphicon glyphicon-chevron-down language-icon"></i></button>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="#">Magyar </a></li>
                            <li role="presentation"><a href="#">English </a></li>
                            <li role="presentation"><a href="#">中文 </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-6 hidden-sm hidden-xs col-help">
                    <div class="dropdown dropdown-account dropdown-login" id="dropdown-login">
					    <button class="btn btn-link dropdown-toggle btn-login" data-toggle="dropdown" aria-expanded="true" type="button">Log in </button>
					    <form class="form-login dropdown-menu" role="menu" >
					        <div class="form-group form-login-username">
					            <input id="login-usr" class="login-username form-control" type="text" placeholder="Username" >
					        </div>
					        <div class="form-group form-login-password">
					            <input id="login-pwd" class="login-password form-control" type="password" placeholder="Password">
					        </div>
					        <div class="form-group form-login-submit">
					            <input id="login-sbt" class="login-submit form-control" type="submit" value="Log in" placeholder="Password">
					        </div>
					        <div class="div-lost-pwd">
					            <button class="btn btn-link lost-pwd" type="button" >Lost your password?</button>
					        </div>
					        
					        <div class="checkbox form-login-rm">
					            <label><input type="checkbox" value="">Remember me</label>
					        </div>
					    </form>
					</div>
                    <div class="dropdown dropdown-account dropdown-signup" id="dropdown-signup">
    <button class="btn btn-link dropdown-toggle btn-signup" data-toggle="dropdown" aria-expanded="false" type="button">Sign up </button>
    <form class="form-signup dropdown-menu" role="menu" >
        <div class="form-group form-signup-username">
            <input id="signup-usr" class="signup-username form-control" type="text" placeholder="Username" >
        </div>
        <div class="form-group form-signup-email">
            <input id="signup-email" class="signup-email form-control" type="text" placeholder="E-mail" >
        </div>
        <div class="form-group form-signup-password1">
            <input id="signup-pwd1" class="signup-password1 form-control" type="password" placeholder="Password">
        </div>
        <div class="form-group form-signup-password2">
            <input id="signup-pwd2" class="signup-password2 form-control" type="password" placeholder="Password again">
        </div>
        <div class="form-group form-signup-submit">
            <input id="signup-sbt" class="signup-submit form-control" type="submit" value="Sign up">
        </div>
    </form>
</div><a class="hidden-sm hidden-xs link-help" href="#">Help </a></div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12hidden-md hidden-lg">
                    <nav class="navbar navbar-default hidden-md hidden-lg responsive-menu-homepage">
    <div class="container-fluid">
        <div class="navbar-header">
            <button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggle collapsed resp-menu-home-btn"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav resp-menu-home-dropd">
                <li role="presentation"><a href="#">First Item</a></li>
                <li role="presentation"><a href="#">Second Item</a></li>
                <li role="presentation"><a href="#">Third Item</a></li>
            </ul>
        </div>
    </div>
</nav>
                </div>
            </div>
        </div>
    </header>
    <div class="searchbar">
        <div class="container">
            <div class="row row-search">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-search-text">
                    <p>Give us an expression or a name and <em>we’ll do the rest!</em> </p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-search">
                	<form class="search-form" action="<?php echo base_url('index.php/SearchEngine')?>" method="GET">
                    	<input class="input-search" type="text" name="expression">
                    </form>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-search-description">
                    <p class="text-right search-description">If you have any questions about our search engine, click <a href="#">here!</a> </p>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 hidden-xs hidden-sm menu">
                	<div>
                		<!--<ul class="sidemenu">
                			<li>
                				<a href="#">
                					<div class="symbol">
                						<div class="symbol-top"></div>
                						<div class="symbol-middle"></div>
                						<div class="symbol-bottom"></div>
                					</div>
                					<div class="list-item">
                						<span>Prime Factorization</span>
                					</div>
                				</a>
                			</li>
                			<li>
                				<a href="#">
                					<div class="symbol">
                						<div class="symbol-top"></div>
                						<div class="symbol-middle"></div>
                						<div class="symbol-bottom"></div>
                					</div>
                					<div class="list-item">
                						<span>Modulo</span>
                					</div>
                				</a>
                			</li>
                			<li>
                				<a href="#">
                					<div class="symbol">
                						<div class="symbol-top"></div>
                						<div class="symbol-middle"></div>
                						<div class="symbol-bottom"></div>
                					</div>
                					<div class="list-item">
                						<span>Euclidean algorithm</span>
                					</div>
                				</a>
                			</li>
                			<li>
                				<a href="#">
                					<div class="symbol">
                						<div class="symbol-top"></div>
                						<div class="symbol-middle"></div>
                						<div class="symbol-bottom"></div>
                					</div>
                					<div class="list-item">
                						<span>Diophante equation</span>
                					</div>
                				</a>
                			</li>
                		</ul>-->
                		<div class="sidemenu">
                			<div class="list-item list-item-factorization">
                				<div class="list-icon">
		                			<div class="list-icon-top"></div>
		                			<div class="list-icon-middle"></div>
		                			<div class="list-icon-bottom"></div>
		                		</div>
                				<div class="list-header">
		                			<a href="<?php echo base_url('index.php/Numbertheory/factorization')?>">
		                				<div class="list-name">
		                					<span>Factorization</span>
		                				</div>
		                			</a>
		                		</div>
	                			<div class="list-header inner-list">
	                				<a href="#">
		                				<div class="inner-list-icon">
		                					<div class="list-icon-left"></div>
		                				</div>
		                				<div class="list-name">
		                					<span>Prime Factorization</span>
		                				</div>
		                			</a>
		                			<a href="#">
		                				<div class="inner-list-icon">
		                					<div class="list-icon-left"></div>
		                				</div>
		                				<div class="list-name">
		                					<span>Canonical representation</span>
		                				</div>
		                			</a>
		                			<a href="#">
		                				<div class="inner-list-icon">
		                					<div class="list-icon-left"></div>
		                				</div>
		                				<div class="list-name">
		                					<span>Divisors of a number</span>
		                				</div>
		                			</a>
		                			<a href="#">
		                				<div class="inner-list-icon">
		                					<div class="list-icon-left"></div>
		                				</div>
		                				<div class="list-name">
		                					<span>Greates Common Divisor</span>
		                				</div>
		                			</a>
		                			<a href="#">
		                				<div class="inner-list-icon">
		                					<div class="list-icon-left"></div>
		                				</div>
		                				<div class="list-name">
		                					<span>Least Common Multiple</span>
		                				</div>
		                			</a>
								</div>
	                		</div>
	                		<div class="list-item list-item-modulo">
                				<div class="list-icon">
		                			<div class="list-icon-top"></div>
		                			<div class="list-icon-middle"></div>
		                			<div class="list-icon-bottom"></div>
		                		</div>
                				<div class="list-header">
		                			<a href="#">
		                				<div class="list-name">
		                					<span>Modulo</span>
		                				</div>
		                			</a>
		                		</div>
	                			<div class="list-header inner-list">
	                				<a href="#">
		                				<div class="inner-list-icon">
		                					<div class="list-icon-left"></div>
		                				</div>
		                				<div class="list-name">
		                					<span>Modulo1</span>
		                				</div>
		                			</a>
		                			<a href="#">
		                				<div class="inner-list-icon">
		                					<div class="list-icon-left"></div>
		                				</div>
		                				<div class="list-name">
		                					<span>Modulo2</span>
		                				</div>
		                			</a>
		                			<a href="#">
		                				<div class="inner-list-icon">
		                					<div class="list-icon-left"></div>
		                				</div>
		                				<div class="list-name">
		                					<span>Modulo3</span>
		                				</div>
		                			</a>
		                			<a href="#">
		                				<div class="inner-list-icon">
		                					<div class="list-icon-left"></div>
		                				</div>
		                				<div class="list-name">
		                					<span>Modulo4</span>
		                				</div>
		                			</a>
								</div>
	                		</div>
	                		<div class="list-item list-item-euclidean-algorithm">
                				<div class="list-icon">
		                			<div class="list-icon-top"></div>
		                			<div class="list-icon-middle"></div>
		                			<div class="list-icon-bottom"></div>
		                		</div>
                				<div class="list-header">
		                			<a href="<?php echo base_url('index.php/Numbertheory/euclidean_algorithm')?>">
		                				<div class="list-name">
		                					<span>Euclidean Algorithm</span>
		                				</div>
		                			</a>
		                		</div>
	                		</div>
	                		<div class="list-item list-item-diophante-equation">
                				<div class="list-icon">
		                			<div class="list-icon-top"></div>
		                			<div class="list-icon-middle"></div>
		                			<div class="list-icon-bottom"></div>
		                		</div>
                				<div class="list-header">
		                			<a href="#">
		                				<div class="list-name">
		                					<span>Diophante Equation</span>
		                				</div>
		                			</a>
		                		</div>
	                			<div class="list-header inner-list">
	                				<a href="#">
		                				<div class="inner-list-icon">
		                					<div class="list-icon-left"></div>
		                				</div>
		                				<div class="list-name">
		                					<span>Diophante Equation1</span>
		                				</div>
		                			</a>
		                			<a href="#">
		                				<div class="inner-list-icon">
		                					<div class="list-icon-left"></div>
		                				</div>
		                				<div class="list-name">
		                					<span>Diophante Equation2</span>
		                				</div>
		                			</a>
		                			<a href="#">
		                				<div class="inner-list-icon">
		                					<div class="list-icon-left"></div>
		                				</div>
		                				<div class="list-name">
		                					<span>Diophante Equation3</span>
		                				</div>
		                			</a>
		                			<a href="#">
		                				<div class="inner-list-icon">
		                					<div class="list-icon-left"></div>
		                				</div>
		                				<div class="list-name">
		                					<span>Diophante Equation4</span>
		                				</div>
		                			</a>
								</div>
	                		</div>
                		</div>
                	</div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 subject">
                    <article class="factorization">
                    <?php 
                        if (isset($section)) {
                            echo $section;
                        }
                    ?>
            </article>
        </div>
    </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.js" integrity="sha384-/y1Nn9+QQAipbNQWU65krzJralCnuOasHncUFXGkdwntGeSvQicrYkiUBwsgUqc1" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/contrib/auto-render.min.js" integrity="sha384-dq1/gEHSxPZQ7DdrM82ID4YVol9BYyU7GbWlIwnwyPzotpoc57wDw/guX8EaYGPx" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/js/number-theory.js') ?>"></script>
    <script>
    renderMathInElement(document.body);
    </script>
</body>

</html>