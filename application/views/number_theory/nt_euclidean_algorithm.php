<section id="border-yellow" class="gcd">
	<header class="section-name">
		<h2>Euclidean Algorithm</h2>
	</header>
	<div class="description">
		<span>The Euclidean algorithm is an algorithm for finding the greatest common divisor of two numbers $$a$$ and $$b$$. The algorithm can also be defined for more general rings than just the integers $$\mathbb{Z}$$.</span>
	</div>
	<div class="theorem">
		<div class="theorem-text">
			<span>The Euclidean algorithm proceeds in a series of steps such that the output of each step is used as an input for the next one. Thus, the algorithm can be written as a sequence of equations.<br/>
				<p class="math_expression">
					$$a=q_0b\ + r_0$$<br/>
					$$\ b=q_1r_0 + r_1$$<br/>
					$$r_0=q_2r_1 + r_2$$<br/>
					$$r_1=q_3r_2 + r_3$$<br/>
					$$\cdots$$<br/>
				</p>
				Since the remainders decrease with every step but can never be negative, a remainder $$r_N$$ must eventually equal zero, at which point the algorithm stops. The final nonzero remainder $$r_{N-1}$$ is the greatest common divisor of $$a$$ and $$b$$.&nbsp;&nbsp;&nbsp;<button class="btn btn-link euclidean-proof-btn proof-btn" type="button">Why?</button>
			</span>
		</div>
		<div class="euclidean-proof proof">
			<span>First we prove that $$d$$ is indeed a divisor for $$a$$ and $$b$$, then we prove that $$d$$ is a multiple of all the other divisors. <br/>Since $$min(\alpha_i, \beta_i) \leq \alpha_i$$ and $$min(\alpha_i, \beta_i) \leq \beta_i$$, therefore $$d \mid a$$ and $$d \mid b$$. Let $$c$$ be another common divisor for $$a$$ and $$b$$. Then $$c = p_1^{\gamma_1} p_2^{\gamma_2} \cdots \ p_k^{\gamma_k}$$ &nbsp;where $$\gamma_i \leq \alpha_i$$ and $$\gamma_i \leq \beta_i$$ so $$\gamma_i \leq min(\alpha_i, \beta_i).$$ If $$\gamma_i = min(\alpha_i, \beta_i)$$ for all $$i = 1,2, \cdots,k$$ then $$c = d$$ else $$c \mid d$$</span>
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