<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Numbertheory extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		header('Location: '.base_url('index.php/Numbertheory/factorization'));
	}

	public function factorization()
	{
		$data['section'] = $this->load->view('number_theory/nt_factorization.php', '', True);
		$this->load->view('content', $data);
	}

	public function modulo()
	{
		$data['section'] = $this->load->view('number_theory/nt_modulo.php', '', True);
		$this->load->view('content', $data);
	}

	public function euclidean_algorithm()
	{
		$data['section'] = $this->load->view('number_theory/nt_euclidean_algorithm.php', '', True);
		$this->load->view('content', $data);
	}

	public function diophante_equation()
	{
		$data['section'] = $this->load->view('number_theory/nt_diophante_equation.php', '', True);
		$this->load->view('content', $data);
	}

	public function prime_factorization() {

		if (isset($_GET['input-prime_factorization']) && !empty($_GET['input-prime_factorization'])) {
			$x = $_GET['input-prime_factorization'];

			$this->load->helper('math/number_theory_helper');
			$prime_factorization = new Number_Theory_Helper();

			$solution['factors'] = $prime_factorization->prime_factorization($x);

			if (isset($_GET['js-on'])) {

				$size = count($solution['factors']);
				$counter = 1;

				$primeResp = "<div class=\"prime_factorization-solution test-solution\">";
				$primeResp .= "<span class=\"prime_factorization-expression\">$$".$x." = \ $$<span class=\"highlight-orange\">$$ ";

				foreach ($solution['factors'] as $prime => $power) {
				    if ($counter != $size) {
				        if ($power != 1) {
				            $primeResp .= $prime."^".$power."\cdot";                
				            $counter++;
				        } else {
				            $primeResp .= $prime."\cdot";                
				            $counter++;
				        }
				        
				    } else {
				        if ($power != 1) {
				            $primeResp .= $prime."^".$power;
				        } else {
				            $primeResp .= $prime;
				        }
				        
				    }
				}

				$primeResp .= "$$</span></span></div>";

				echo json_encode(array('prime_factorization'=>$primeResp));

			} else {
				$data['section'] = $this->load->view('number_theory/nt_factorization.php', $solution, True);
				$this->load->view('content', $data);
			}

		} else {
			header('Location: '.base_url('index.php/Numbertheory'));
		}
	}

	public function divisors() {

		if (isset($_GET['input-divisors']) && !empty($_GET['input-divisors'])) {

			$x = $_GET['input-divisors'];

			$this->load->helper('math/number_theory_helper');
			$divisors = new Number_Theory_Helper();

			$solution['divisors'] = $divisors->divisors($x);


			if (isset($_GET['js-on'])) {

	   			$size = count($solution['divisors']);
				$counter = 1;

				$divisorsResp = '<div class=\'divisors-solution test-solution\'>';
				$divisorsResp .= '<span>The number of divisors is <span class=\'highlight-orange\'>'.$size.'</span>.<br />';
	   			$divisorsResp .= 'The divisors are ';

	   			foreach ($solution['divisors'] as $d) {
	                if ($counter < $size) {
	                    $divisorsResp .= '<span class=\'highlight-orange\'>'.$d.'</span>, ';
	                    $counter++;
	                } else {
	                    $divisorsResp .= '<span class=\'highlight-orange\'>'.$d.'</span>.';
	                }
	            }
	            $divisorsResp .= '</span></div>';

				echo json_encode(array('divisors'=>$divisorsResp));

			} else {
				$data['section'] = $this->load->view('number_theory/nt_factorization.php', $solution, True);
				$this->load->view('content', $data);
			}

 		} else {
 			header('Location: '.base_url('index.php/Numbertheory'));
 		}
	}

	public function gcd () {

		if (isset($_GET['input-gcd']) && !empty($_GET['input-gcd'])) {
			
			$values = explode(" ", $_GET['input-gcd']);

			if (count($values) == 2) {

				$x = $values[0];
				$y = $values[1];

				$this->load->helper('math/number_theory_helper');
				$gcd = new Number_Theory_Helper();

				$solution['gcd'] = $gcd->gcd($x,$y);

				if (isset($_GET['js-on'])) {
					$gcdResp = "<div class=\"gcd-solution test-solution\">";
					$gcdResp .= "<span>The greatest common divisor of ".$values[0]." and ".$values[1]." is <span class=\"highlight-orange\">".$solution['gcd']."</span>.</span></div>";
					echo json_encode(array('gcd'=>$gcdResp));
					
				} else {
					$solution['values'] = $values;
					$data['section'] = $this->load->view('number_theory/nt_factorization.php', $solution, True);
					$this->load->view('content', $data);
				}

			} else {

				if (isset($_GET['js-on'])) {
					$gcdResp = "<div class=\"gcd-solution test-solution\"><span>Not enough numbers!</span><a href=\"#\" class=\"help_popup\">Help</a></div>";
					//$gcdResp .= "<p class=\"help_popup\">If you need help click <a class=\"highlight-blue\">here</a>.</p>";
					echo json_encode(array('gcd'=>$gcdResp));
					
				} else {
					$solution['gcd'] = False;
					$data['section'] = $this->load->view('number_theory/nt_factorization.php', $solution, True);
					$this->load->view('content', $data);
				}
			}

		} else {
			header('Location: '.base_url('index.php/Numbertheory'));
		}
	}


	public function lcm () {

		if (isset($_GET['input-lcm']) && !empty($_GET['input-lcm'])) {

		
			$values = explode(" ", $_GET['input-lcm']);

			if (count($values) == 2) {

				$x = $values[0];
				$y = $values[1];

				$this->load->helper('math/number_theory_helper');

				$lcm = new Number_Theory_Helper();
				$solution['lcm'] = $lcm->lcm($x,$y);

				if (isset($_GET['js-on'])) {
					$lcmResp = "<div class=\"lcm-solution test-solution\">";
					$lcmResp .= "<span>The least common multiple of ".$values[0]." and ".$values[1]." is <span class=\"highlight-orange\">".$solution['lcm']."</span>.</span></div>";
					echo json_encode(array('lcm'=>$lcmResp));
					
				} else {
					$solution['values'] = $values;
					$data['section'] = $this->load->view('number_theory/nt_factorization.php', $solution, True);
					$this->load->view('content', $data);
				}

			} else {
				$solution['lcm'] = False;
				$data['section'] = $this->load->view('number_theory/nt_factorization.php', $solution, True);
				$this->load->view('content', $data);
			}

		} else {
			header('Location: '.base_url('index.php/Numbertheory'));
		}
	}
}
