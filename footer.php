<?php if( function_exists('restocore') ) { restocore_google_map(); } ?>
	<footer id="footer">
		<?php if(function_exists('restocore')) : ?>
			<div class="like-table reset">
				<?php if ( is_active_sidebar('footer_region') ) : ?>
					<?php dynamic_sidebar('footer_region'); ?>
				<?php else: ?>
					<div class="footer-widget widget_cristiano_contact">
						<div id="contact-us-block" class="block">
							<h2>
								<?php echo esc_html_e('Contact Us', 'cristiano'); ?>
							</h2>
                            <h3>Flavor of India Restaurant</h3>
							<?php get_template_part('template-parts/widget', 'contact'); ?>
						</div>
					</div>
                                        <div class="footer-widget announcement ">
						<div id="announce" class="block">
							<h2>
								Restaurant Hours:
							</h2>  
                   
							<h1>Sunday - Saturday:</h1>
<ul>       
<li>Lunch: 11:15am - 2:30pm</li>
<li>Dinner: 5:00 pm - 10:00 pm</li>
<li>Monday: Dinner Closed</li>
</ul>
						</div>
					</div>
					<div class="footer-widget">
						<div id="follow-us-block" class="block">
                        	<div class="footer-logo">
                            	<img src="http://kcflavorofindia.com/wp-content/uploads/2017/02/logo.png">
                            </div>
							<h2>
								<?php echo esc_html_e('Follow Us', 'cristiano'); ?>
							</h2>
							<p>
								<?php echo esc_html_e('Join us on social networks', 'cristiano'); ?>
							</p>
							<?php get_template_part('template-parts/widget', 'social'); ?>					
						</div>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<div id="bottom-bar">
			<div class="center">
				<p><a href="http://kcflavorofindia.com">Flavor of India</a> © 2017 . All rights Reserved.</p>
			</div>
		</div>	
	</footer>
<?php wp_footer(); ?>
</body>
</html>