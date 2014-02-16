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
							<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span> 
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

							<?php bones_main_nav(); ?>
						</div>
					</nav>


					<div id="slides" class="twlevecol first clearfix">

					<?php
						$args = array('post_type' => 'slide', 'posts_per_page' => 5);
						$loop = new WP_Query($args);
						while ($loop->have_posts()) : $loop->the_post();
					?>
						<div class="slide">
					<?php
						the_post_thumbnail('bones-slide');
						the_content();
					?>
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
						
						<div class="latest-news twelvecol first">
							<h1>Latest News
								<span>&nbsp;</span>
								<a href="<?php bloginfo('siteurl'); ?>/news">View All News</a>
							</h1>
							<ul>
								<li class="NewsBlog threecol first"><a href="/Blog/2014-02-14/51/Prevent_Medication_Errors">February 14, 2014</a><p>Prevent Medication Errors</p><div><a href="/Blog/2014-02-14/51/Prevent_Medication_Errors">BLOG</a></div></li>
								<li class="threecol"><a href="/News/2014-02-16/167/West_Palm_Beach_Personal_Injury_Law_Firm_Sponsors_“Serve_An_Ace_for_St._Jude’s_Research_Hospital”_Event">February 16, 2014</a><p>West Palm Beach Personal Injury Law Firm Sponsors “Serve An Ace for St. Jude’s Research Hospital” Event</p><div><a href="/News/2014-02-16/167/West_Palm_Beach_Personal_Injury_Law_Firm_Sponsors_“Serve_An_Ace_for_St._Jude’s_Research_Hospital”_Event">PRESS</a></div>
								</li>
								<li class="threecol"><a href="/News/2014-02-06/166/Trial_Attorney_Jason_Guari_Named_as_a_“Top_Lawyer”_in_2014_South_Florida_Legal_Guide">February 6, 2014</a><p>Trial Attorney Jason Guari Named as a “Top Lawyer” in 2014 South Florida Legal Guide</p><div><a href="/News/2014-02-06/166/Trial_Attorney_Jason_Guari_Named_as_a_“Top_Lawyer”_in_2014_South_Florida_Legal_Guide">PRESS</a></div>
								</li>
								<li class="NewsFacebook threecol"><a href="http://www.mypalmbeachpost.com/news/news/tracking-devices-pitch-driver-savings-but-bills-do/ndPpX/" target="_blank">February 16, 2014</a><p>The possibililty of #increasingrates and #privacy concerns complicate growing #insurance trend -use of #trackingdevices.</p><div><a href="http://www.mypalmbeachpost.com/news/news/tracking-devices-pitch-driver-savings-but-bills-do/ndPpX/" target="_blank">FACEBOOK</a></div>
								</li>
							</ul>
						</div>
					</div>

						<?php // get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
