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
    <style type="text/css">
        .katex-display {
             display: inline-block !important;
             margin: 0.2em 0 !important;
        }
        .katex {
          font-family: 'Inconsolata, KaTeX_Main, Times New Roman, serif' !important;
        }
    </style>
</head>

<body>
    <div class="answer" style="font-size: 1.7em;line-height: 30px; margin-top: 50px; letter-spacing: 1px;">
    	<?php
    		if (isset($solution) && !empty($solution)) {
                /*foreach ($solution as $key => $value) {
                    if ($key == 'validation') {
                        echo $value.'<br/>';
                    }

                    if ($key == 'before') {
                        echo 'Before: $$'.$value.'$$<br/>';
                    }
                    if ($key == 'after') {
                        echo 'After: $$'.$value.'$$<br/>';
                    }
                    if ($key == 'path') {
                        echo "Path: ";
                        foreach ($value as $index => $state) {
                            echo "$$".$state.'$$ ';
                        }
                        echo "<br/>";
                    }
                    if ($key == 'parentheses') {
                        echo "<br/>Parentheses:<br/>";
                        foreach ($value as $index1 => $level) {
                            foreach ($level as $index2 => $value1) {
                                echo "$$ P[$index1][$index2]: ".$value1."$$<br/>";
                            }
                        }
                        echo '<br/>';
                    }
                    if ($key == 'answer') {
                        echo "<h1 style=\"text-align:center\">$$".$value."$$</h1>";
                    }
                }*/
                foreach ($solution as $key => $value) {
                    /*if ($key == 'validation') {
                        echo "<p style=\"font-size:1.8em; margin-bottom:40px;\">".$value."<p/>";
                    }

                    if ($key == 'before') {
                        echo "<p style=\"margin-bottom:10px;\">Before: ".$value."</p>";
                    }
                    if ($key == 'after') {
                        echo "<p style=\"margin-bottom:40px;\">After: ".$value."</p>";
                    }
                    if ($key == 'path') {
                        echo "<p style=\"margin-bottom:40px;\">Path:<br/> ";
                        foreach ($value as $index => $state) {
                            echo "".$state.' ';
                        }
                        echo "</p>";
                    }
                    if ($key == 'parentheses') {
                        echo "<p style=\"margin-bottom:40px;\">Parentheses:<br/> ";
                        foreach ($value as $index1 => $level) {
                            foreach ($level as $index2 => $value1) {
                                echo " P[$index1][$index2]: ".$value1."<br/>";
                            }
                        }
                        echo "</p>";
                    }*/
                    if ($key == 'answer') {
                        $solution['before'] = preg_replace('/([\d\)])\*([a-z])/', '$1$2', $solution['before']);
                        $solution['before'] = str_replace('*', ' \cdot ', $solution['before']);

                        $solution['answer'] = preg_replace('/([\d\)])\*([a-z])/', '$1$2', $solution['answer']);
                        $solution['answer'] = str_replace('*', ' \cdot ', $solution['answer']);
                        echo "<p style=\"font-size:1.8em; text-align:center; margin-top:100px;\">";
                        echo "$$".$solution['before']." = ".$value."$$</p>";
                        echo "</p>";
                    }
                }
            }
    	?>
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