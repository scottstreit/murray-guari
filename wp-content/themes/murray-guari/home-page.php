<?php
/*
Template Name: Custom Home Page
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<nav class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							<?php bones_main_nav(); ?>
							<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span> 
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
					</nav>


					<div id="slides" class="twlevecol first clearfix">

					<?php
						$args = array('post_type' => 'slide', 'posts_per_page' => 5, 'orderby' => 'title', 'order'=>'ASC');
						$loop = new WP_Query($args);
						while ($loop->have_posts()) : $loop->the_post();
					?>
						<div class="slide">
							<?php	the_post_thumbnail('bones-slide'); ?>
							<div>
								<?php the_content(); ?>
							</div>
						</div>
					<?php endwhile; ?>
					</div>



					<div class="home-content">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

							<section class="entry-content clearfix">
								<?php the_content(); ?>
							</section>

						</article>

							<?php endwhile; ?>
						<?php endif; ?>
						
						<div class="fourcol first callout">
							<h1><a href="<?php bloginfo('siteurl'); ?>/Practice_Areas" title="Practice Areas" target="_self">Practice Areas</a></h1>
							<img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/Stryker-Hip-Implants.jpg">
							<ul>
								<li><a href="<?php bloginfo('siteurl'); ?>/Auto_Accidents" title="Auto Accidents" target="_self">Auto Accidents</a>></li>
								<li><a href="<?php bloginfo('siteurl'); ?>/Automotive_Product_Liability" title="Automotive Product Liability" target="_self">Auto Product Liability</a>&nbsp;&gt;</li>
								<li><a href="<?php bloginfo('siteurl'); ?>/Premises_Liability" title="Premises Liability" target="_self">Premises Liability</a>></li>
								<li><a href="<?php bloginfo('siteurl'); ?>/Stryker_Hip_Implant" title="Stryker Hip Implants" target="_self">Stryker Hip Implants</a>></li>
								<li><a href="<?php bloginfo('siteurl'); ?>/Practice_Areas" title="More" target="_self">More</a></li>
							</ul>
						</div>

						<div class="fourcol callout">
							<h1><a href="<?php bloginfo('siteurl'); ?>/Videos" title="Videos" target="_self">Videos</a>, <a href="/Brochures" title="Brochures" target="_self">Brochures</a><span>&nbsp;</span></h1>
							<a href="<?php bloginfo('siteurl'); ?>/Videos" title="Videos" target=""><img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/VidThumb-home.png"></a>
						
							<a href="<?php bloginfo('siteurl'); ?>/Brochures" title="Brochures" target=""><img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/VidThumb-Brochure.png"></a>
						
						</div>

						<div class="fourcol callout">
							<h1><a href="<?php bloginfo('siteurl'); ?>/Contact_US" title="Contact Us" target="_self">Contact Us</a><span>&nbsp;</span></h1>
							
<!--
							<div class="SocialIcons"><a href="<?php bloginfo('siteurl'); ?>/News/RSS" target="_blank"><img src="/images/IconRSS.png"></a>
								<a href="http://www.linkedin.com/pub/scott-murray/2/759/165" target="_new"><img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/IconLinkedIn.png"></a>
								<a href="http://www.facebook.com/MurrayGuariTrialAttorneys" target="_new"><img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/IconFacebook.png"></a>
								<a href="https://plus.google.com/s/Murray%20&amp;%20Guari" target="_new"><img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/g-plus-icon.png"></a>
								<a href="http://pinterest.com/murrayguari/" target="_new"><img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/pinterest-icon.png"></a>
								<a href="http://www.youtube.com/murrayguari" target="_new"><img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/IconYouTube.png"></a>
						</div>
-->
							<img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/MG-MapThumb.png">
							<p class="small-type"><b>MURRAY &amp; GUARI</b><br>
							1525 N. Flagler Drive, Suite 100<br>
							West Palm Beach, FL 33401<br>
							<a href="http://maps.google.com/maps?q=1525+N+Flagler+Dr,+West+Palm+Beach,+FL+33401&amp;hl=en&amp;sll=37.0625,-95.677068&amp;sspn=51.887315,107.138672&amp;t=h&amp;z=17" title="Map" target="_blank">View On Google Maps</a>
							</p>
							<a href="<?php bloginfo('siteurl'); ?>/Newsleter_Subscribe" target="_self"><img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/ButtonNewsletter.png" vspace="50"></a>
							<a href="<?php bloginfo('siteurl'); ?>/Contact_Us" target="_self"><img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/ButtonContactUs.png" vspace="50" style="float:right"></a>
							<p style="text-align: center"><b>CALL US AT: (561) 366-9099</b></p>
						</div>
						
						
						<div class="latest-news twelvecol first">
							<h1>Latest News
								<span>&nbsp;</span>
								<a href="<?php bloginfo('siteurl'); ?>/news">View All News</a>
							</h1>
							<ul>
								<?php
									$args = array('post_type' => 'post', 'posts_per_page' => 4);
									$loop = new WP_Query($args);
									while ($loop->have_posts()) : $loop->the_post();
								?>
									<li class="NewsBlog threecol no-gutter">
										<a href="<?php the_permalink() ?>"><?php the_time('F jS, Y') ?></a>
										<?php the_excerpt(); ?>
									</li>
								<?php endwhile; ?>
							</ul>
						</div>
					</div>

						<?php // get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
