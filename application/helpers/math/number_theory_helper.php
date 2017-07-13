<?php
Class Number_Theory_Helper {

	public function prime_factorization ($number) {

		if ($number <= 1) {
			return False;
		}

		$factors = array();

		while ($number % 2 == 0)
		{
			if (array_key_exists(2, $factors)) {
				$factors[2]++;
				$number /= 2;
			} else {
				$factors[2] = 1;
				$number /= 2;
			}

		}

		for ($i = 3; $i <= sqrt($number); $i += 2)
		{
			while ($number % $i == 0)
			{
				if (array_key_exists($i, $factors)) {
					$factors[$i]++;
					$number = (int)($number / $i);
				} else {
					$factors[$i] =  1;
					$number = (int)($number / $i);
				}
			}
		}

		if ($number > 2)
		{
			$factors[$number] = 1;
		}

		return $factors;
	}

	public function divisors ($x) {

		$factors = $this->prime_factorization($x);

		if ($factors == False) {
			return False;
		}

		foreach ($factors as $prime => $power) {
			unset($factors[$prime]);
			for ($i = 1; $i <= $power; $i++) {
				$factors[$prime][] = pow($prime, $i);
			}
		}

		$divisors = array(1);


		// Combination of all the primes product on possible powers.
		foreach ($factors as $mainPrime => $mainPrimeValue) {
			foreach ($mainPrimeValue as $main) {
				$divisors[] = $main;
				foreach ($factors as $secondaryPrime => $secondaryPrimeValue) {
					foreach ($secondaryPrimeValue as $secondary) {
						if ($mainPrime < $secondaryPrime) {
							$divisors[] = $main * $secondary;
						}
					}
				}
			}
		}

		sort($divisors);
		return $divisors;

	}

	public function gcd ($x, $y) {

		if ( ($x < 0 || $y < 0) || $x == 0 && $y == 0) {
			return false;
		}

		if ($x == $y) {
			return $x;
		}

		if ($y > $x) {
			$helper = $x;
			$x = $y;
			$y = $helper;
		}

		if ($x != 0 && $y==0) {
			return $x;
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

		if ($x <= 0 || $y <= 0) {
			return False;
		}

		$gcd = $this->gcd($x, $y);

		if ($gcd == False) {
			return False;
		} else {
			$lcm = ($x * $y) / ($gcd);
			return $lcm;
		}
	}
}

?>