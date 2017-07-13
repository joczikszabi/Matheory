<?php
Class Polynomial_Manage_Helper {

	public $q0 = array(
		'number' => 'q1',
		'(' => 'q7',
		'+' => 'q2',
		'-' => 'q2',
		'variable' => 'q9'
	);

	public $q1 = array(
		'number' => 'q1',
		'+' => 'q2',
		'-' => 'q2',
		'*' => 'q4',
		'/' => 'q4',
		'.' => 'q5',
		',' => 'q5',
		'(' => 'q7',
		')' => 'q8',
		'variable' => 'q9',
		'^' => 'q10'
	);

	public $q2 = array(
		'number' => 'q1',
		'+' => 'q3',
		'-' => 'q3',
		'(' => 'q7',
		'variable' => 'q9'
	);

	public $q3 = array(
		'number' => 'q1',
		'(' => 'q7',
		'variable' => 'q9'
	);

	public $q4 = array(
		'number' => 'q1',
		'+' => 'q2',
		'-' => 'q2',
		'(' => 'q7',
		'variable' => 'q9'
	);

	public $q5 = array(
		'number' => 'q6'
	);

	public $q6 = array(
		'+' => 'q2',
		'-' => 'q2',
		'*' => 'q4',
		'/' => 'q4',
		'number' => 'q6',
		'(' => 'q7',
		')' => 'q8',
		'variable' => 'q9',
		'^' => 'q10'
	);

	public $q7 = array(
		'number' => 'q1',
		'+' => 'q2',
		'-' => 'q2',
		'(' => 'q7',
		'variable' => 'q9'
	);

	public $q8 = array(
		'number' => 'q1',
		'+' => 'q2',
		'-' => 'q2',
		'*' => 'q4',
		'/' => 'q4',
		'(' => 'q7',
		')' => 'q8',
		'variable' => 'q9',
		'^' => 'q10'
	);

	public $q9 = array(
		'+' => 'q2',
		'-' => 'q2',
		'*' => 'q4',
		'/' => 'q4',
		'(' => 'q7',
		')' => 'q8',
		'variable' => 'q9',
		'number' => 'q9',
		'^' => 'q10'
	);

	public $q10 = array(
		'number' => 'q1',
		'+' => 'q2',
		'-' => 'q2',
		'(' => 'q7',
		'variable' => 'q9',
		'^' => 'q11'
	);

	public $q11 = array(
		'number' => 'q1',
		'+' => 'q2',
		'-' => 'q2',
		'(' => 'q7',
		'variable' => 'q9'
	);

	public $operations = array(

		'*' => array(
			'precedence' => '2',
			'assoc' => 'left'
		),

		'/' => array(
			'precedence' => '2',
			'assoc' => 'left'
		), 

		'+' => array(
			'precedence' => '1',
			'assoc' => 'left'
		), 

		'-' => array(
			'precedence' => '1',
			'assoc' => 'left'
		), 

	);

	/*
	$polynomial = 
	[
		0 => int,
		1 => 
			[
				x => int,
				y => int
			] 
		2 =>
			[
				x => int,
				y => int,
				z => int
			] 
		 .
		 .
		 .
		n =>

	]

	*/

	private $polynomial = array();

	public function setValue ($val, $index) {

		$this->polynomial[$index] = $val;
	}

	public function validation ($exp) {

		// Initializing
        $before = $exp;
		$exp = $this->preparation($exp);
		$split_exp = str_split($exp);
		$state = $this->q0;
		$acceptedStates = array($this->q1, $this->q6, $this->q8, $this->q9);
		$length = sizeof($split_exp );
		$i = 0;
		$isValid = True;
		$opening = 0;
		$closing = 0;
		$path = array();
		$path[0] = 'q0';

		foreach ($split_exp  as $key => $value) {

			if ($isValid) {

				$i++;
				
				if (is_numeric($value)) {
					$currentChar = 'number';
				} elseif (ctype_alpha($value)) {
					$currentChar = 'variable';

				} else {
					$currentChar = $value;

					if ($currentChar == '(') {
						$opening++;
					}

					if ($currentChar == ')') {
						if ($opening <= $closing) {
							$isValid = False;
							$solution['validation'] = 'Incorrect use of brackets';
						} else {
							$closing++;
						}
					}
				}

				if (array_key_exists($currentChar, $state)) {
					$path[] = $state[$currentChar];
					$state = $this->{$state[$currentChar]};
				} else {
					$isValid = False;
					$solution['validation'] = 'Unrecognisable character: Character number '.(sizeof($path)-1).' ('.$currentChar.').';
				}
			}
		}

		if ($isValid && ($opening == $closing) && in_array($state, $acceptedStates)) {

			$solution['validation'] = 'Correct';
            $solution['before'] = $before;
			$exp = $this->editing($exp);
			$solution['after'] = $exp;

			$parentheses = $this->parentheses($exp);

			$solution['path'] = $path;
			$solution['parentheses'] = $parentheses;

			$depth = sizeof($parentheses);
			for ($i=$depth-1; $i >= 0; $i--) {
				foreach ($parentheses[$i] as $key => $value) {
					while (preg_match('/\(p\[(\d+)\]\[(\d+)\]\)/', $value)) {
						$value = preg_replace_callback('/\(p\[(\d+)\]\[(\d+)\]\)/', function($m) use($parentheses) { return $parentheses[$m[1]][$m[2]]; }, $value);
					}
					$result = $this->precedence($value);

					if (!is_array($result)) {
						$parentheses[$i][$key] = $result;
					} else {
						$parentheses[0][0] = $result['error'];
						break(2);
					}
				}
			}
			//print_r($parentheses);
			$end_poly_index = substr($parentheses[0][0], 5, -1);
			$end_poly = $this->polynomial[$end_poly_index];
			$solution['answer'] = $end_poly;

		} else {

			if (!(isset($solution['validation']) || empty($solution['validation']))) {
				if ($opening != $closing) {
					$solution['validation'] = "Incorrect use of brackets.";
				} else if (!in_array($state, $acceptedStates)) {
					$solution['validation'] = "Unexpected end of line";
				}
			} else {
					$solution['validation'] = '<h3 style=\'text-align:center\'>Not correct </h3><p style=\'text-align:center;color:#777;font-size:300px;margin-top: 250px;\'>:-(</p>';
			}
		}
		//print_r($this->polynomial);;
		return $solution;
	}

	public function preparation($exp) {

        $exp = str_replace(' ', '', $exp); // Remove whitespaces.

        $signs = array();
        $signs['substraction'] = array('−', '−');
        $signs['prod'] = array('⋅', '×', '·');

        $exp = str_replace($signs['substraction'], '-', $exp);
		$exp = str_replace($signs['prod'], '*', $exp);
		return $exp;
	}

	public function editing ($exp) {
		$exp = preg_replace('/(\d),(\d)/', "$1.$2", $exp); // Change ',' to '.'
		$exp = preg_replace('/^--/', "", $exp); // Removes negative signs from the beginning of the expression if there are two of them.
		$exp = preg_replace('/([\+-])-(\d+\.?\d*|[a-z]+\.?[a-z]+)/', "$1(-$2)", $exp); // Puts negative values in brackets
		$exp = preg_replace('/(\+-|-\+)(\d+\.?\d*|[a-z]+\.?[a-z]+)/', "-$2", $exp); // Replaces '+-' or '-+' with '-';
		$exp = preg_replace('/(--|\+\+)(\d+\.?\d*|[a-z]+\.?[a-z]+)/', "+$2", $exp); // Replaces '--' or '++' with '+';
		$exp = preg_replace('/^\+{1,2}/', "", $exp);  // Remove starting signs in case of '+', '++'.
		$exp = preg_replace('/\(\+{1,2}/', "(", $exp);  // Remove '+' sign after opening of parentheses.
		$exp = preg_replace('/\^\^/', "^", $exp);  // Remove duplicates of '^'.
		$exp = preg_replace('/\^\((.*)\)/', "^{(\$1)}", $exp); // Formalize exponents.
		while (preg_match('/\^([\da-z\.\^]+)/', $exp)) {
			$exp = preg_replace('/\^([\da-z\.\^]+)/', "^{(\$1)}", $exp); // Formalize exponents.
		}  
		$exp = preg_replace('/([0-9])([a-z])/', "$1*$2", $exp); // Put the product sign between a scalar and a variable.
		$exp = preg_replace('/([a-z])([0-9])/', "$1*$2", $exp); // Put the product sign between a variable and a scalar.
		$exp = preg_replace('/\-([\(a-z])/', "-1*$1", $exp); // If there is a '-' sign in front of a parentheses, then replace '-' with '-1*'.
		$exp = preg_replace('/([0-9]|\)|[a-z])\(/', "$1*(", $exp);  // Add missing product sign if the bracket is on the right or two brackets meet.
		$exp = preg_replace('/\)([0-9]+|\(|[a-z])/', ")*$1", $exp); // Add missing product sign if the bracket is on the left.
		return $exp;
	}

	public function editPrecedence ($exp) {

		$exp = preg_replace('/^--/', "", $exp);
		$exp = preg_replace('/\+\+|--/', "+", $exp);
		//$exp = preg_replace('/([^\da-z])\+-|-\+/', "$1-", $exp);
		$exp = preg_replace('/([\da-z\)])\-([\da-z\)])/', "$1+-$2", $exp);
		return $exp;
	}

	public function parentheses ($exp) {

		$split_exp = str_split($exp);
		$state = $this->q0;
		$depth = array();
		$depth_i = 0;
		$newOpening = False;
		$i = 0;

		foreach ($split_exp as $key => $value) {

			$i++;
			
			if (is_numeric($value)) {
				$currentChar = 'number';

			} else {

				$currentChar = $value;

				if ($currentChar == '(') {
					$depth_i++;
					$newOpening = True;
				}

				if ($currentChar == ')') {
					$depth_i--;
				}
			}

			if ($newOpening) {

				if ($value != '(') {

					if (isset($depth[$depth_i])) {
						$depth[$depth_i][(sizeof($depth[$depth_i]))] = $value;
					} else {
						$depth[$depth_i][0] = $value;
					}

					$newOpening = False;

				} else {

					if (isset($depth[$depth_i])) {

						if (isset($depth[$depth_i-1])) {
							$depth[$depth_i-1][sizeof($depth[$depth_i-1])-1] .= '(p['.$depth_i.']['.sizeof($depth[$depth_i]).'])';
						} else {
							$depth[$depth_i-1][0] = '(p['.$depth_i.']['.sizeof($depth[$depth_i]).'])';
						}
						
					} else {

						if (isset($depth[$depth_i-1])) {
							$depth[$depth_i-1][sizeof($depth[$depth_i-1])-1] .= '(p['.$depth_i.'][0])';
						} else {
							$depth[$depth_i-1][0] = '(p['.$depth_i.'][0])';
						}
					}
				}

			} else {

				if ($value != ')') {

					if (isset($depth[$depth_i])) {
						$depth[$depth_i][(sizeof($depth[$depth_i]))-1] .= $value;
					} else {
						$depth[$depth_i][0] = $value;
					}
				}
			}

			if (array_key_exists($currentChar, $state)) {
				$path[] = $state[$currentChar];
				$state = $this->{$state[$currentChar]};
			} 
		}

		return $depth;

	}

	public function precedence ($exp) {
		$exp = $this->editPrecedence($exp);

		$bug_counter = 0;
		$result = array();
		$function;

		do {
			$prev = $exp;
			$max_precedence = -1;

			if (preg_match_all('/[\da-z\)\#]([\+\*\/-])/', $exp, $match)) {
				foreach ($match[1] as $key => $value) {

					if (array_key_exists($value, $this->operations) && $this->operations[$value]['precedence'] > $max_precedence) {
						$max_precedence = $this->operations[$value]['precedence'];
						$function = $value;
					}
				}

				$exp = preg_replace_callback("/(\-?\d+\.?\d*|#poly\d+#|[a-z]+)\\".$function."(\-?\+?\d+\.?\d*|#poly\d+#|[a-z]+)/", function($m) use($exp, $function) { 
                    //echo "</br>$exp _______________ $m[1] $function $m[2] _______________ ";
                    
					$arr = array(0 => $m[1], 1 => $m[2], 2 => $function);
					$this->manage($arr);
                    $poly; 

					if (substr($arr[1],0,5) == '#poly') {
						$poly = $arr[1];
						return $poly;
					} elseif (substr($arr[0],0,5) == '#poly') {
						$poly = $arr[0];
						return $poly;
					} else {
						$poly = "#poly".(sizeof($this->polynomial)-1)."#";
						return $poly;
					}

				}, $exp);

			}
			if ($prev == $exp) {
				if ($bug_counter >= 2) {
					$result['error'] = 'Error: Infinite loop';
					return $result;
				} else {
					$bug_counter++;
				}
			}

			
		} while ($max_precedence != -1);
		return $exp;
	}

	public function manage($arr) {
		$key=array();
		$key['a'] = $this->getKey($arr[0]);
		$key['b'] = $this->getKey($arr[1]);

		$a = $this->convert($arr[0]);
		$b = $this->convert($arr[1]);
		$operator = $arr[2];

		if ($key['a'] == 'poly' || $key['b'] == 'poly') {
			$index = $this->getIndex($arr[0], $arr[1]);
		} else {
			$index = sizeof($this->polynomial);
		}

		$this->callFunction($a, $b, $operator, $index);
        /*print_r($this->polynomial);
        echo "</br>";*/
		return ;

	}

	public function callFunction($a, $b, $operator, $index, $newPoly = True) {

		$instanceName =& get_instance();
		$instanceName->load->helper('math/polynomials');
		$obj = new Polynomials_Helper();

		if ($operator == '*') {
			$this->setValue(($obj->product($a, $b)), $index);
		}

		/*if ($operator == '/') {
			return $a/$b;
		}*/

		if ($operator == '+') {

			$this->setValue(($obj->addition($a, $b)), $index);
		}

		if ($operator == '-') {

			$this->setValue(($obj->substraction($a, $b)), $index);
		}
	}

	public function getKey($x) {

		if (substr($x,1,4) == 'poly') {
			return('poly');
		}
		if (is_numeric($x)) {
			return('cons');
		}
		if (ctype_alpha($x)) {
			return($x);
		}

	}

	public function getIndex($x, $y) {

		if (substr($y,0,4) == '#pol') {
			$index = substr($y,5,-1);
			return $index;
		} 
		if (substr($x,0,4) == '#pol') {
			$index = substr($x,5,-1);
			return $index;
		}
	}

	public function convert($x) {

		if (substr($x,0,1) == '#') {
			$x = preg_replace('/#poly(\d+)#/', '$1', $x);
			return($this->polynomial[$x]);
		}

		if (is_numeric($x)) {
			return([$x]);
		}

		if (ctype_alpha($x)) {
			return([0,1]);
		}
	}
}

?>