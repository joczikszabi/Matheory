<section class="prime_factorization">
	<header class="section-name">
		<h2>Prime Factorization</h2>
	</header>
	<div class="description">
		<span>If R is an 
			<span class="highlight-blue">Euclidean ring</span>, then every element in R is either a unit in R or can be written as the product of a finite number of 
			<span class="highlight-blue">prime </span>elements in R. 
		</span>
	</div>
	<div class="example">
		<button class="btn btn-link prime_factorization-example-btn example-btn" type="button">Example </button>
		<div class="prime_factorization-example-text example-text">
			<span>`84 = 2^2 * 3 * 7` where 
				<span class="highlight-orange">2 </span>, 
				<span class="highlight-orange">3 </span>, 
				<span class="highlight-orange">7 </span> are prime numbers.</span>
		</div>
	</div>
	<div class="section-ending test">
		<div class="test-header">
			<p class="test-header-text highlight-orange">Try it! </p>
		</div>
		<div class="test-form">
			<form action="<?php echo base_url('index.php/Numbertheory/prime_factorization')?>" method="GET">
				<input class="form-control prime_factorization-input test-input" type="text" name="input-prime_factorization" value="<?php echo (isset($_GET['input-prime_factorization'])) ? $_GET['input-prime_factorization'] : '';?>" placeholder="Give us a number!" maxlength="15">
				<button class="btn btn-default prime_factorization-submit test-submit" type="submit"> </button>
			</form>
		</div>
		<?php 
			if (isset($factors)) {
				if ($factors != False) {

					$size = sizeof($factors);
					$counter = 1;

					echo "<div class=\"prime_factorization-solution test-solution\">";
					echo "<span>".$_GET['input-prime_factorization']." = <span class=\"highlight-orange\">";
					foreach ($factors as $prime => $power) {
						if ($counter != $size) {
							if ($power != 1) {
								echo "`".$prime."^".$power."*`";                
								$counter++;
							} else {
								echo "`".$prime."*`";                
								$counter++;
							}
							
						} else {
							if ($power != 1) {
								echo "`".$prime."^".$power."`";
							} else {
								echo "`".$prime."`";
							}
							
						}
					}
					echo "</span></span></div>";
				} else {
					echo "<div class=\"prime_factorization-solution test-solution\"><span>Incorrect input.</span></div>";
				}
			}
		?>
	</div>
</section>
<section class="canonical-representation">
	<header class="section-name">
		<h2>Canonical representation </h2>
	</header>
	<div class="description">
		<span>Every positive integer `n &#62; 1` can be represented in exactly one way as a product of prime powers: `n = p_1^{alpha_i}*p_2^{alpha_2} \ cdots \ \ p_k^{alpha_k} = prod_{\ i \ = \ 1}^k p^{alpha_i}` where `p_1&#60;p_2 &#60; cdots &#60; p_k` are primes and the `alpha_i` are positive integers.</span>
	</div>
	<div class="section-ending usage">
		<div class="usage-header">
			<span>Usage </span>
		</div>
		<div class="usage-list">
			<ul class="list-unstyled">
				<li>- Find all the divisors of a certain number. </li>
				<li>- Find the greatest common divisor for two numbers. (GCD) </li>
				<li>- Find the least common multiple for two numbers. (LCM) </li>
			</ul>
		</div>
	</div>
</section>
<section class="divisors">
	<header class="section-name">
		<h2>Divisors of a number</h2>
	</header>
	<div class="description">
		<span>If `n = p_1^{alpha_1} p_2^{alpha_2} \ cdots \ \ p_k^{alpha_k}` &nbsp;then `d &#62; 0` divides n if and only if `d = p_1^{beta_1} p_2^{beta_2} \ cdots \ \ p_k^{beta_k}` &nbsp;where `0 &#8804; beta_i &#8804; α_i,` `i = 1,2, \ cdots \ ,k`. We get the two trivial divisors (1 and n itself) if `beta_i = 0` or `beta_i = alpha_i` for all &nbsp;i. </span>
	</div>
	<div class="theorem">
		<div class="theorem-text">
			<span>The number of divisors of n is `d(n) = (alpha_1 + 1)(alpha_2 + 1) \ cdots \ (alpha_k + 1)`.</span>
			<button class="btn btn-link divisors-proof-btn proof-btn" type="button">Why? </button>
		</div>
		<div class="divisors-proof proof">
			<span>Using the definition above, we can get all the divisors of n if in the form `d = p_1^{alpha_1} p_2^{alpha_2} \ cdots \ \ p_k^{alpha_k}` we loop through all the `beta_1 , beta_2, \ cdots \ ,beta_k` powers of `p_i` independetly of each other where the possible values are `beta_1 = 1, 2, \ cdots \ &nbsp;,alpha_1, \ \ \ \ \ &nbsp;beta_2 = 1, 2, \ cdots \ ,alpha_2, \ \ cdots \ \ \ beta_k = 1, 2, \ cdots \ ,alpha_k`. In this case `beta_i` can have `(a_i + 1)` different kind of values. </span>
		</div>
	</div>
	<div class="section-ending test">
		<div class="test-header">
			<p class="test-header-text highlight-orange">Try it! </p>
		</div>
		<div class="test-form">
			<form action="<?php echo base_url('index.php/Numbertheory/divisors')?>" method="GET">
				<input class="form-control divisors-input test-input" type="text" name="input-divisors" value="<?php echo (isset($_GET['input-divisors'])) ? $_GET['input-divisors'] : '';?>" placeholder="Give us a number!" maxlength="30">
				<button class="btn btn-default divisors-submit test-submit" type="submit"> </button>
			</form>
		</div>
		<?php 
			if (isset($divisors)) {
				if ($divisors != False) {
					echo "<div class=\"divisors-solution test-solution\">";
					echo "<span>The number of divisors is <span class=\"highlight-orange\">".sizeof($divisors)."</span>.<br />";
					echo "The divisors are ";

					$k = 1;
					$size = sizeof($divisors);

					foreach ($divisors as $d) {
						if ($k < $size) {
							echo "<span class=\"highlight-orange\">".$d."</span>, ";
							$k++;
						} else {
							echo "<span class=\"highlight-orange\">".$d."</span>.";
						}
					}
					echo "</span></div>";
				} else {
					echo "<div class=\"divisors-solution test-solution\"><span>Incorrect input.</span></div>";
				}
			}
		?>
	</div>
</section>
<section class="gcd">
	<header class="section-name">
		<h2>Greates Common Divisor</h2>
	</header>
	<div class="description">
		<span>The greatest common divisor of two integers, when at least one of them is not zero, is the largest positive integer that is a divisor of both numbers.</span>
	</div>
	<div class="theorem">
		<div class="theorem-text">
			<span>If a and b are both positive integers and `a = p_1^{alpha_1} p_2^{alpha_2} \ cdots \ \ p_k^{alpha_k}`, `b = p_1^{beta_1} p_2^{beta_2} \ cdots \ \ p_k^{beta_k}` where `alpha_i, \ beta_i &#8804; 0` then their greatest common divisor is `d = p_1^{min(alpha_1, beta_1)} p_2^{min(alpha_2, beta_2)} \ cdots \ \ p_k^{min(alpha_k, beta_k)}`.</span>
		<button class="btn btn-link gcd-proof-btn proof-btn" type="button">Why? </button>
		</div>
		<div class="gcd-proof proof">
			<span>First we prove that d is indeed a divisor for a and b, then we prove that d is a multiple of all the other divisors. Since `min(alpha_i, beta_i) &#8804; alpha_i` and `min(alpha_i, beta_i) &#8804; beta_i`, therefore `d|a` and `d|b`. Let c be another common divisor for a and b. Then `c = p_1^{gamma_1} p_2^{gamma_2} \ cdots \ \ p_k^{gamma_k}` &nbsp;where `gamma_i &#8804; alpha_i` and `gamma_i &#8804; beta_i` so `gamma_i &#8804; min(alpha_i, beta_i)` for all `i = 1,2, \ cdots \ \ ,k`.</span>
		</div>
	</div>
	<div class="section-ending test">
		<div class="test-header">
			<p class="test-header-text highlight-orange">Try it! </p>
		</div>
		<div class="test-form">
			<form action="<?php echo base_url('index.php/Numbertheory/gcd')?>" method="GET">
				<input class="form-control gcd-input test-input" type="text" name="input-gcd" value="<?php echo (isset($_GET['input-gcd'])) ? $_GET['input-gcd'] : '';?>" placeholder="Give us a number!" maxlength="30">
				<button class="btn btn-default gcd-submit test-submit" type="submit"> </button>
			</form>
		</div>
			<?php 
				if (isset($gcd)) {
					if ($gcd != False) {
						echo "<div class=\"gcd-solution test-solution\">";
						echo "<span>The greatest common divisor of ".$values[0]." and ".$values[1]." is ";
						echo "<span class=\"highlight-orange\">".$gcd."</span>.</span></div>";
					} else {
						echo "<div class=\"gcd-solution test-solution\"><span>Incorrect input.</span></div>";
					}
				}
			?>
	</div>
</section>
<section class="lcm">
	<header class="section-name">
		<h2>Least Common Multiple </h2>
	</header>
	<div class="description">
		<span>The least common multiple of two positive integers a and b is k if `a|k` and `b|k` and for every c such that `a|c` and `b|c`, then `k &#60; c`.</span>
	</div>
	<div class="theorem">
		<div class="theorem-text">
			<span>If a and b are both positive integers and `a = p_1^{alpha_1} p_2^{alpha_2} \ cdots \ \ p_k^{alpha_k}`, `b = p_1^{beta_1} p_2^{beta_2} \ cdots \ \ p_k^{beta_k}` where &nbsp;`alpha_i, beta_i &#62; 0`, then&nbsp;their least common multiple is `d = p_1^{max(alpha_1, beta_1)} p_2^{max(alpha_2, beta_2)} \ cdots \ \ p_k^{max(alpha_k, beta_k)}`. </span>
			<button class="btn btn-link lcm-proof-btn proof-btn" type="button">Why? </button>
		</div>
		<div class="lcm-proof proof">
			<span>A k positive integer is a common multiple of a and b if and only if `a|k` and `b|k`. Let `k = p_1^{gamma_1} p_2^{gamma_2} \ cdots \ \ p_k^{gamma_k}`. If k is a common multiple of a and b, then for every `γ_i`, `γ_i &#8805; alpha_i` and `γ_i &#8805; beta_i` where `i = 1,2,\ cdots \ \ ,k` which is equivalent to&nbsp;`γ_i = max(alpha_i, beta_i)`. The smallest number of these common multiples is the one where `γ_i = max(alpha_i, beta_i)`.</span>
		</div>
	</div>
	<div class="section-ending test">
		<div class="test-header">
			<p class="test-header-text highlight-orange">Try it! </p>
		</div>
		<div class="test-form">
			<form action="<?php echo base_url('index.php/Numbertheory/lcm')?>" method="GET">
				<input class="form-control lcm-input test-input" type="text" name="input-lcm" value="<?php echo (isset($_GET['input-lcm'])) ? $_GET['input-lcm'] : '';?>" placeholder="Give us a number!" maxlength="30">
				<button class="btn btn-default lcm-submit test-submit" type="submit"></button>
			</form>
		</div>
			<?php 
				if (isset($lcm)) {
					if ($lcm != False) {
						echo "<div class=\"lcm-solution test-solution\">";
						echo "<span>The least common multiple of ".$values[0]." and ".$values[1]." is ";
						echo "<span class=\"highlight-orange\">".$lcm."</span>.</span></div>";
					} else {
						echo "<div class=\"lcm-solution test-solution\"><span>Incorrect input.</span></div>";
					}
				}
			?>
	</div>
</section>