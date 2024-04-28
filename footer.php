<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp-theme-kaya
 */

?>

<!-- Start Footer Section -->
<footer class="footer-section">
	<div class="container relative">

		<div class="sofa-img">
			<img src="<?php echo get_template_directory_uri(); ?>/images/sofa.png" alt="Image" class="img-fluid">
		</div>

		<div class="row">
			<div class="col-lg-8">
				<div class="subscription-form">
					<h3 class="d-flex align-items-center">
						<span class="me-1">
							<img src="<?php echo get_template_directory_uri(); ?>/images/envelope-outline.svg" alt="Image" class="img-fluid">
						</span>
						<span>Subscribe to Newsletter</span>
					</h3>
					<form action="#" class="row g-3">
						<div class="col-auto">
							<input type="text" class="form-control" placeholder="Enter your name">
						</div>
						<div class="col-auto">
							<input type="email" class="form-control" placeholder="Enter your email">
						</div>
						<div class="col-auto">
							<button class="btn btn-primary">
								<span class="fa fa-paper-plane"></span>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="row g-5 mb-5">
			<div class="col-lg-4">
				<div class="mb-4 footer-logo-wrap"><a href="<?php echo home_url(); ?>" class="footer-logo">Furni<span>.</span></a></div>
				<p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>

				<ul class="list-unstyled custom-social">
					<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
					<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
					<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
					<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
				</ul>
			</div>

			<div class="col-lg-8">
				<div class="row links-wrap">
					<div class="col-6 col-sm-6 col-md-3">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'footer-col-1',
							'depth'          => 1,
							'container'      => 'div',
							'container_class' => '',
							'menu_class'     => 'list-unstyled',
							'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
							'walker'         => new wp_bootstrap_navwalker()
						));
						?>
					</div>

					<div class="col-6 col-sm-6 col-md-3">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'footer-col-2',
							'depth'          => 1,
							'container'      => 'div',
							'container_class' => '',
							'menu_class'     => 'list-unstyled',
							'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
							'walker'         => new wp_bootstrap_navwalker()
						));
						?>
					</div>

					<div class="col-6 col-sm-6 col-md-3">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'footer-col-3',
							'depth'          => 1,
							'container'      => 'div',
							'container_class' => '',
							'menu_class'     => 'list-unstyled',
							'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
							'walker'         => new wp_bootstrap_navwalker()
						));
						?>
					</div>

					<div class="col-6 col-sm-6 col-md-3">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'footer-col-4',
							'depth'          => 1,
							'container'      => 'div',
							'container_class' => '',
							'menu_class'     => 'list-unstyled',
							'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
							'walker'         => new wp_bootstrap_navwalker()
						));
						?>
					</div>
				</div>
			</div>
		</div>


		<div class="border-top copyright">
			<div class="row pt-4">
				<div class="col-lg-6">
					<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a hreff="https://themewagon.com">ThemeWagon</a> <!-- License information: https://untree.co/license/ -->
					</p>
				</div>

				<div class="col-lg-6 text-center text-lg-end">
					<ul class="list-unstyled d-inline-flex ms-auto">
						<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
						<li><a href="#">Privacy Policy</a></li>
					</ul>
				</div>

			</div>
		</div>

	</div>
</footer>
<!-- End Footer Section -->

<?php wp_footer(); ?>

</body>

</html>