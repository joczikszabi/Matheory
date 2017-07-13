<?php
Class Polynomials_Helper {

	public function gcd ($x, $y) {

		if ($x == 0 || $y == 0) {
			return False;
		}

		if ($x == $y) {
			return abs($x);
		}

		if ($y > $x) {
			$helper = $y;
			$y = $x;
			$x = $helper;
		}


		$quotient = floor ($x / $y);
		$remainder = $remainder = $x - ($quotient * $y);


		while ($remainder != 0) {

			$quotient = floor ($x / $y);
			$remainder = $x - ($quotient * $y);
			$x = $y;

			if ($remainder != 0) {
				$y = $remainder;
			}
		}
		return abs($y);
	}


	public function lcm ($x, $y) {

		$gcd = $this->gcd($x, $y);

		if ($gcd != False) {
			return abs(($x * $y) / (gcd ($x, $y)));
		}
	}

	public function addition ($x, $y) {

		$solution = [];

		$this->comparePolynomials($x, $y); 

		for ($i=0; $i <= (sizeof($x)-1); $i++) { 
			$solution[$i] = $x[$i] + $y[$i];
		}
		$this->removeZeros($solution);

		return $solution;
	}


	public function substraction ($x, $y) {

		$solution = [];

		$y = $this->product ([-1], $y);
		return ($this->addition($x, $y));
	}


	public function product ($x, $y) {

		$solution = [];

		$degree = sizeof($x) + sizeof($y) -2;
		$this->comparePolynomials ($x, $y);

		for ($k=0; $k <= $degree; $k++) {
			for ($i=0; $i <= $k; $i++) { 
				if ($i <= sizeof($x)-1 && $i <= sizeof($y)-1 && $k-$i <= sizeof($y)-1) {
					if (empty($solution[$k])) {
						$solution[$k] = $x[$i] * $y[$k-$i];
					} else {
						$solution[$k] = $solution[$k] + ($x[$i] * $y[$k-$i]);
					}
				}
			}
		}
		return $solution;
	}


	public function power ($x, $power) {

		$solution = [1];

		for ($i=0; $i < $power; $i++) { 
			$solution = $this->product($solution, $x);
		}
		return $solution;
	}


	public function lagrangeInterpolation ($x, $y) {

		$solution[0] = [];
		$solution[1] = [];

		$x = array_map("convert", $x);
		$y = array_map("convert", $y);

		for ($i=0; $i < sizeof($x); $i++) { 
			for ($j=0; $j < sizeof($x); $j++) {

				if ($i != $j) {
						$top = $this->substraction ([0,1], $x[$j]);
						$bottom = $this->substraction ($x[$i], $x[$j]);

					if (empty($solution[1])) {
						$solution[1] = $top;
						$divisor = $bottom;

					} else {
						$solution[1] = $this->product($solution[1], $top);
						$divisor = $this->product($divisor, $bottom);
					}
				}
			}

			if ($y[$i][0] != 0) {	
				$gcd = $this->convert($this->gcd ($divisor[0], $y[$i][0]));
				$divisor = $this->convert($divisor[0] / $gcd[0]);

				$solution[1] = $this->product($solution[1], $this->convert($y[$i][0] / $gcd[0]));
			} else {
				$solution[1] = [0];
				$divisor = [1];
			}
			

			if ($i == 0) {
				$solution[0] = $solution[1];
				$dividedBy = $divisor;
			} else {
				$lcm = $this->convert($this->lcm($dividedBy[0], $divisor[0]));
				$solution[0] = $this->product($solution[0], $this->convert($lcm[0] / $dividedBy[0]));
				$solution[1] = $this->product($solution[1], $this->convert($lcm[0] / $divisor[0]));
				$dividedBy = $lcm;
				$solution[0] = $this->addition($solution[0], $solution[1]);
			}

			unset($solution[1]);
			unset($divisor);
		}

		return([$solution[0], $dividedBy]);
	}


	public function convert ($c) {
		return [$c];
	}


	public function constantInverse ($c) {
		$c[0] = pow($c[0], -1);
		return $c;
	}


	public function avoidIrrational ($x) {
		if (strlen((string)$x) > 10) {
			return  round($x, 2);
		} else {
			return $x;
		}
	}


	public function comparePolynomials (&$x, &$y) {

		if (sizeof($x) < sizeof($y)) {
			$this->extendPolynomial ($x, sizeof($y));
		} elseif (sizeof($x) > sizeof($y)) {
			$this->extendPolynomial ($y, sizeof($x));
		}
	}


	public function extendPolynomial (&$polynomial, $size) {

		while (sizeof($polynomial) < $size) {
			array_push($polynomial, 0);
		}
	}


	public function removeZeros (&$polynomial) {

		$size = sizeof($polynomial);

		if ($size != 1 && ($polynomial[$size-1] == 0 || empty($polynomial[$size-1]))) {
			array_pop($polynomial);
			$this->removeZeros($polynomial);
		}
	}


	public function removeBlank (&$polynomial) {

		$size = sizeof($polynomial);

		if ($size > 0 && $polynomial[$size-1] != "0" && empty($polynomial[$size-1])) {
			array_pop($polynomial);
			$this->removeBlank($polynomial);
		}
	}

	public function functionToImage ($f, $r) {
		ob_start();

		$degree = sizeof($f)-1;

		if ($degree == 0 && $f[0] == 0) {
			echo "0";
		}

		for ($i=$degree; $i >= 0; $i--) { 
			
			$gcd = $this->gcd ($f[$i], $r);
			
			if ($f[$i] != 0) {

				if ($i == $degree && $i > 1) {


					if (($f[$i] == 1 && $r == 1) || $f[$i] / $r == 1) {
						echo "x^{".$i."}";

					} elseif ($f[$i] == 1 && $r != 1 && $r != -1) {
						echo "1/".$r."x^{".$i."}";

					} elseif (($f[$i] == -1 && $r == 1) || ($f[$i] == 1 && $r == -1) || ($f[$i] / $r == -1)) {
						echo "- x^{".$i."}";

					} elseif ($f[$i] == -1 && $r == -1) {
						echo "x^{".$i."}";

					} elseif ($f[$i] == -1 && $r != 1 && $r != -1) {
						echo "-1/".$r."x^{".$i."}";

					} else {

						if ($f[$i] > 0) {

							if (($r / $gcd) == 1) {
								echo ($f[$i] / $gcd)."x^{".$i."}";

							} elseif (($r / $gcd) == -1) {
								echo (($f[$i] / $gcd) * -1)."x^{".$i."}";

							} else {

								if ($r < 0) {
									echo "-".($f[$i] / $gcd)."/".(($r / $gcd)*-1)."x^{".$i."}";
									
								} else {
									echo ($f[$i] / $gcd)."/".($r / $gcd)."x^{".$i."}";
								}
							}

						} elseif ($f[$i] < 0) {

							if (($r / $gcd) == 1) {
								echo ($f[$i] / $gcd)."x^{".$i."}";

							} elseif (($r / $gcd) == -1) {
								echo (($f[$i] / $gcd) * -1)."x^{".$i."}";

							} else {

								if ($r < 0) {
									echo "-".($f[$i] / $gcd)."/".(($r / $gcd)*-1)."x^{".$i."}";
									
								} else {
									echo " - ".(($f[$i] / $gcd)*-1)."/".($r / $gcd)."x^{".$i."}";
								}
							}
						}
					}


				} elseif ($i == $degree && $i == 1) {

					if ($f[$i] == 1 && $r == 1 || $f[$i] / $r == 1) {
						echo "x";

					} elseif ($f[$i] == 1 && $r != 1 && $r != -1) {
						echo "1/".$r."x";

					} elseif (($f[$i] == -1 && $r == 1) || ($f[$i] == 1 && $r == -1) || ($f[$i] / $r == -1)) {
						echo "- x";

					} elseif ($f[$i] == -1 && $r == -1) {
						echo "x";

					} elseif ($f[$i] == -1 && $r != 1 && $r != -1) {
						echo "-1/".$r."x";

					} else {

						if ($f[$i] > 0) {

							if (($r / $gcd) == 1) {
								echo ($f[$i] / $gcd)."x";

							} elseif (($r / $gcd) == -1) {
								echo (($f[$i] / $gcd) * -1)."x";

							} else {

								if ($r < 0) {
									echo "-".($f[$i] / $gcd)."/".(($r / $gcd)*-1)."x";
									
								} else {
									echo ($f[$i] / $gcd)."/".($r / $gcd)."x";
								}
							}

						} elseif ($f[$i] < 0) {

							if (($r / $gcd) == 1) {
								echo ($f[$i] / $gcd)."x";

							} elseif (($r / $gcd) == -1) {
								echo (($f[$i] / $gcd) * -1)."x";

							} else {

								if ($r < 0) {
									echo "-".($f[$i] / $gcd)."/".(($r / $gcd)*-1)."x";
									
								} else {
									echo " + ".($f[$i] / $gcd)."/".($r / $gcd)."x";
								}
							}
						}
					}


				} elseif ($i == $degree && $i == 0) {

					if (($f[$i] == 1 && $r == 1) || ($f[$i] == -1 && $r == -1) && $f[$i] / $r == 1) {
						echo "1";

					} elseif (($f[$i] == -1 && $r == 1) || ($f[$i] == 1 && $r == -1) || ($f[$i] / $r == -1)) {
						echo "-1";

					} else {

						if ($f[$i] > 0) {

							if (($r / $gcd) == 1) {
								echo ($f[$i] / $gcd);

							} elseif (($r / $gcd) == -1) {
								echo "-".($f[$i] / $gcd);

							} else {

								if ($r < 0) {
									echo "-".($f[$i] / $gcd)."/".(($r / $gcd)*-1);
									
								} else {
									echo ($f[$i] / $gcd)."/".($r / $gcd);
								}
							}

						} elseif ($f[$i] < 0) {

							if (($r / $gcd) == 1) {
								echo ($f[$i] / $gcd);

							} elseif (($r / $gcd) == -1) {
								echo (($f[$i] / $gcd) * -1);

							} else {

								if ($r < 0) {
									echo (($f[$i] / $gcd) * -1)."/".(($r / $gcd) * -1);
									
								} else {
									echo ($f[$i] / $gcd)."/".($r / $gcd);
								}
							}
						}
					}


				} elseif ($i != $degree && $i > 1) {

					if ($f[$i] == 1 && $r == 1 || $f[$i] / $r == 1) {
						echo "+ x^{".$i."}";

					} elseif ($f[$i] == 1 && $r != 1 && $r != -1) {
						echo "+ 1/".$r."x^{".$i."}";

					} elseif (($f[$i] == -1 && $r == 1) || ($f[$i] == 1 && $r == -1) || ($f[$i] / $r == -1)) {
						echo "- x^{".$i."}";

					} elseif ($f[$i] == -1 && $r == -1) {
						echo "+ x^{".$i."}";

					} elseif ($f[$i] == -1 && $r != 1 && $r != -1) {
						echo "-1/".$r."x^{".$i."}";

					} else {

						if ($f[$i] > 0) {

							if (($r / $gcd) == 1) {
								echo " + ".($f[$i] / $gcd)."x^{".$i."}";

							} elseif (($r / $gcd) == -1) {
								echo " + ".(($f[$i] / $gcd) * -1)."x^{".$i."}";

							} else {

								if ($r < 0) {
									echo "-".($f[$i] / $gcd)."/".(($r / $gcd)*-1)."x^{".$i."}";
									
								} else {
									echo " + ".($f[$i] / $gcd)."/".($r / $gcd)."x^{".$i."}";
								}
							}

						} elseif ($f[$i] < 0) {

							if (($r / $gcd) == 1) {
								echo " - ".(($f[$i] / $gcd) * -1)."x^{".$i."}";

							} elseif (($r / $gcd) == -1) {
								echo " + ".(($f[$i] / $gcd) * -1)."x^{".$i."}";

							} else {

								if ($r < 0) {
									echo " + ".(($f[$i] / $gcd) * -1)."/".(($r / $gcd) * -1)."x^{".$i."}";
									
								} else {
									echo " - ".(($f[$i] / $gcd) * -1)."/".($r / $gcd)."x^{".$i."}";
								}
							}
						}
					}


				} elseif ($i != $degree && $i == 1) {

					if ($f[$i] == 1 && $r == 1 || $f[$i] / $r == 1) {
						echo "+ x";

					} elseif ($f[$i] == 1 && $r != 1 && $r != -1) {
						echo "+ 1/".$r."x";

					} elseif (($f[$i] == -1 && $r == 1) || ($f[$i] == 1 && $r == -1) || ($f[$i] / $r == -1)) {
						echo "- x";

					} elseif ($f[$i] == -1 && $r == -1) {
						echo "+ x";

					} elseif ($f[$i] == -1 && $r != 1 && $r != -1) {
						echo "-1/".$r."x";

					} else {

						if ($f[$i] > 0) {

							if (($r / $gcd) == 1) {
								echo " + ".($f[$i] / $gcd)."x";

							} elseif (($r / $gcd) == -1) {
								echo " + ".(($f[$i] / $gcd) * -1)."x";

							} else {

								if ($r < 0) {
									echo "-".($f[$i] / $gcd)."/".(($r / $gcd)*-1)."x";
									
								} else {
									echo " + ".($f[$i] / $gcd)."/".($r / $gcd)."x";
								}
							}

						} elseif ($f[$i] < 0) {

							if (($r / $gcd) == 1) {
								echo " - ".(($f[$i] / $gcd) * -1)."x";

							} elseif (($r / $gcd) == -1) {
								echo " + ".(($f[$i] / $gcd) * -1)."x";

							} else {

								if ($r < 0) {
									echo " + ".(($f[$i] / $gcd) * -1)."/".(($r / $gcd) * -1)."x";
									
								} else {
									echo " - ".(($f[$i] / $gcd) * -1)."/".($r / $gcd)."x";
								}
							}
						}
					}


				} elseif ($i != $degree && $i == 0) {

					if (($f[$i] == 1 && $r == 1) || ($f[$i] == -1 && $r == -1) || ($f[$i] / $r == 1)) {
						echo " + 1";

					} elseif (($f[$i] == -1 && $r == 1) || ($f[$i] == 1 && $r == -1) || ($f[$i] / $r == -1)) {
						echo "- 1";

					} else {

						if ($f[$i] > 0) {

							if (($r / $gcd) == 1) {
								echo " + ".($f[$i] / $gcd);

							} elseif (($r / $gcd) == -1) {
								echo " - ".($f[$i] / $gcd);

							} else {

								if ($r < 0) {
									echo " - ".($f[$i] / $gcd)."/".(($r / $gcd)*-1);
									
								} else {
									echo " + ".($f[$i] / $gcd)."/".($r / $gcd);
								}
							}

						} elseif ($f[$i] < 0) {

							if (($r / $gcd) == 1) {
								echo " - ".(($f[$i] / $gcd) * -1);

							} elseif (($r / $gcd) == -1) {
								echo " + ".(($f[$i] / $gcd) * -1);

							} else {

								if ($r < 0) {
									echo " + ".(($f[$i] / $gcd) * -1)."/".(($r / $gcd) * -1);
									
								} else {
									echo " - ".(($f[$i] / $gcd) * -1)."/".($r / $gcd);
								}
							}
						}
					}
				}
			}
		}
	}
}
?>	