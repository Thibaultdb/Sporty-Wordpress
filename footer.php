<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>

<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" role="contentinfo">
		<div class='row w-100'>
			<div class="col-sm-1 col-0"></div>
			<div class='col-sm-7 col-12 foot1'>
				
				<h4 class='header4'>Contactgegevens</h4>
					<div class="line">
							<h6>Tel: 0477/778899</h6>
							<p>Bereikbaar van 09 tot 18h <br> uitgezonderd zon- en feestdagen</p>
							<h6>E-mail: <br/>Spordy@gmail.com</h6>
							<p>Bereikbaar 24/7</p>
							<h6>Adres: <br/>Graaf Karel de Goedelaan<br> 8500 Kortrijk</h6>
							<p>Weekdagen van 09h tot 18h</p>
					</div>
			</div>
			<div class='col-sm-3 col-12 foot3'>
			<img src='<?php echo get_stylesheet_directory_uri();?>/media/spordy-transparant.png' class="pt-5"alt="logo spordy" name='logo spordy'>
				<ul class="pl-0 text-center">
					<li><i class="fab fa-facebook-f"></i></li>
					<li><i class="fab fa-twitter"></i></li>
					<li><i class="fab fa-instagram"></i></li>
				</ul>
			</div>
			<div class="col-sm-1 col-0"></div>
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
