<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchEngine extends CI_Controller {

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
		$this->validation();
	}

	public function validation() {

		if (isset($_GET['expression']) && !empty($_GET['expression'])) {
			$exp = $_GET['expression'];

			$this->load->helper('test_search_engine_helper');
			$obj = new Polynomial_Manage_Helper();
			
			$data['solution'] = $obj->validation($exp);
			/*foreach ($data['solution'] as $key => $value) {
                if ($key == 'validation') {
                    echo $value.'<br/>';
                }

                if ($key == 'before') {
                    echo 'Before: '.$value.'<br/>';
                }
                if ($key == 'after') {
                    echo 'After: '.$value.'<br/>';
                }
                if ($key == 'path') {
                    echo "Path: ";
                    foreach ($value as $index => $state) {
                        echo "".$state.' ';
                    }
                    echo "<br/>";
                }
                if ($key == 'parentheses') {
                    echo "<br/>Parentheses:<br/>";
                    foreach ($value as $index1 => $level) {
                        foreach ($level as $index2 => $value1) {
                            echo " P[$index1][$index2]: ".$value1."<br/>";
                        }
                    }
                    echo '<br/>';
                }
                if ($key == 'answer') {
                    echo "<h1 style=\"text-align:center\">";
                    $poly->functionToImage($value,1);
                    echo "</h1>";
                }
            }*/

			if (isset($data['solution']['answer'])) {
           		$this->load->helper('math/polynomials');
				$poly = new Polynomials_Helper();

				ob_start();
	            $poly->functionToImage($data['solution']['answer'],1);
	           	$data['solution']['answer'] = ob_get_contents();
	           	ob_end_clean();
			}

			$this->load->view('search_result.php', $data);
		}

	}

}
