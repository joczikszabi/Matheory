<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matheory</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.min.css') ?>">
    <link rel="icon" href="<?php echo base_url().'favicon.ico'?>"/>
</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 hidden-xs col-language">
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle language-button" data-toggle="dropdown" aria-expanded="false" type="button">Select a language<i class="glyphicon glyphicon-chevron-down language-icon"></i></button>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="#">Magyar </a></li>
                            <li role="presentation"><a href="#">English </a></li>
                            <li role="presentation"><a href="#">中文 </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-6 hidden-xs col-help">
                    <div class="dropdown dropdown-account dropdown-login" id="dropdown-login">
                        <button class="btn btn-link dropdown-toggle btn-login" data-toggle="dropdown" aria-expanded="true" type="button">Log in </button>
                        <form class="form-login dropdown-menu" role="menu">
                            <div class="form-group form-login-username">
                                <input id="login-usr" class="login-username form-control" type="text" placeholder="Username">
                            </div>
                            <div class="form-group form-login-password">
                                <input id="login-pwd" class="login-password form-control" type="password" placeholder="Password">
                            </div>
                            <div class="form-group form-login-submit">
                                <input id="login-sbt" class="login-submit form-control" type="submit" value="Log in" placeholder="Password">
                            </div>
                            <div class="div-lost-pwd">
                                <button class="btn btn-link lost-pwd" type="button">Lost your password?</button>
                            </div>
                            
                            <div class="checkbox form-login-rm">
                                <label><input type="checkbox" value="">Remember me</label>
                            </div>
                        </form>
                    </div>
                    <div class="dropdown dropdown-account dropdown-signup" id="dropdown-signup">
                        <button class="btn btn-link dropdown-toggle btn-signup" data-toggle="dropdown" aria-expanded="false" type="button">Sign up </button>
                        <form class="form-signup dropdown-menu" role="menu">
                            <div class="form-group form-signup-username">
                                <input id="signup-usr" class="signup-username form-control" type="text" placeholder="Username">
                            </div>
                            <div class="form-group form-signup-email">
                                <input id="signup-email" class="signup-email form-control" type="text" placeholder="E-mail">
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
                    </div>
                    <a class="hidden-xs link-help" href="#">Help</a>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-md hidden-lg">
                    <nav class="navbar navbar-default hidden-sm hidden-md hidden-lg responsive-menu-homepage">
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
    <div class="topics">
        <div class="container">
            <div class="row row-slider-header">
                <div class="col-md-12 col-topic-header">
                    <p>Choose a topic you want to find out more about! </p>
                </div>
            </div>
            <div class="row row-slidermenu">
                <div class="hidden col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <ul class="list-inline ul-slider">
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <li class="col-arrow">
                <a href="#" class="arrow-left"><i class="glyphicon glyphicon-menu-left"></i></a>
            </li>
        </div>
        <div class="hidden col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <li class="topic-card numbertheory-card hidden">
                <div class="topic-name">
                    <p>Number Theory</p>
                </div>
                <div class="topic-fields">
                </div>
            </li>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <li class="topic-card polynomials-card">
                <div class="topic-name">
                    <p>Polynomials</p>
                </div>
                <div class="topic-fields">
                </div>
            </li>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <li class="topic-card linearalgebra-card">
                <div class="topic-name">
                    <p>Linear Algebra</p>
                </div>
                <div class="topic-fields">
                </div>
            </li>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <li class="topic-card codetheory-card">
                <div class="topic-name">
                    <p>Code Theory</p>
                </div>
                <div class="topic-fields">
                </div>
            </li>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <li class="col-arrow">
                <a href="#" class="arrow-right"> <i class="glyphicon glyphicon-menu-right"></i></a>
            </li>
        </div>
    </ul>
</div>
            </div>
        </div>
        <article class="slider-parent">
            <section class="card card-before-3 card-before">
                <div class="Geometry-card topic-card">
                    <p class="coming-soon">Coming soon</p>
                </div>
            </section>
            <section class="card card-before-2 card-before">
                <div class="grouptheory-card topic-card">
                    <p class="topic-name">Group Theory</p>
                    <p class="topic-description">In mathematics and abstract algebra, group theory studies the algebraic structures known as groups. </p>
                    <ul class="list-unstyled topic-fields">
                        <li>Isomorphism </li>
                        <li>Classes of groups</li>
                        <li>Permutation groups</li>
                        <li>Finte groups</li>
                    </ul><a href="#">Check out more </a></div>
            </section>
            <section class="card card-before-1 card-before">
                <div class="numbertheory-card topic-card">
                    <p class="topic-name">Number Theory</p>
                    <p class="topic-description">Number theory is concerned with the properties of integers, rational numbers, irrational numbers, and real numbers.. </p>
                    <ul class="list-unstyled topic-fields">
                        <li><a href="<?php echo base_url('index.php/Numbertheory/factorization')?>">Factorization</a></li>
                        <li><a href="<?php echo base_url('index.php/Numbertheory/modulo')?>">Modulo</a></li>
                        <li><a href="<?php echo base_url('index.php/Numbertheory/euclidean_algorithm')?>">Euclidian algorithm</a></li>
                        <li><a href="<?php echo base_url('index.php/Numbertheory/diophante_equation')?>">Diophantine equation</a></li>
                    </ul><a href="<?php echo base_url('index.php/Numbertheory/factorization')?>">Check out more</a></div>
            </section>
            <section class="card card-active">
                <div class="polynomials-card topic-card">
                    <p class="topic-name">Polynomials </p>
                    <p class="topic-description">Polynomials appear in a wide variety of areas of mathematics. They are used from elementary world problems to complicated problems in the sciences. </p>
                    <ul class="list-unstyled topic-fields">
                        <li>Basic operations</li>
                        <li>Factorization </li>
                        <li>Find roots</li>
                        <li>Lagrange interpolation</li>
                    </ul><a href="<?php echo base_url('index.php/Polynomials')?>">Check out more!</a></div>
            </section>
            <section class="card card-after-1 card-after">
                <div class="linearalgebra-card topic-card">
                    <p class="topic-name">Linear Algebra</p>
                    <p class="topic-description">Linear algebra deals with the theory of systems of linear equations, matrices, vector spaces, determinants, and linear transformations. </p>
                    <ul class="list-unstyled topic-fields">
                        <li>Vectors </li>
                        <li>Matrices </li>
                        <li>Determinant </li>
                        <li>Linear equations</li>
                    </ul><a href="#">Check out more </a></div>
            </section>
            <section class="card card-after-2 card-after">
                <div class="formallanguages-card topic-card">
                    <p class="topic-name">Formal languages</p>
                    <p class="topic-description">Formal language theory sprang out of linguistics, as a way of understanding the syntactic regularities of natural languages. </p>
                    <ul class="list-unstyled topic-fields">
                        <li>Normal forms</li>
                        <li>Automata </li>
                        <li>Algorithms </li>
                        <li>Linear equations</li>
                    </ul><a href="#">Check out more </a></div>
            </section>
            <section class="card card-after-3 card-after">
                <div class="something-card topic-card">
                    <p class="coming-soon">Coming soon</p>
                </div>
            </section>
            <div class="arrow arrow-right"><a href="#"><i class="glyphicon glyphicon-menu-right"></i></a></div>
            <div class="arrow arrow-left"><a href="#"><i class="glyphicon glyphicon-menu-left"></i></a></div>
        </article>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js/homepage.js')?>"></script>
</body>

</html>