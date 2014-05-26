<?php
/*
Template Name: Custom Home Page
*/
?>

<?php get_header(); ?>

			<div id="content">
				<div id="inner-content" class="wrap clearfix">
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
							<?php get_snippet('Practice'); ?>
						</div>

						<div class="fourcol callout">
							<?php get_snippet('Videos'); ?>
						</div>

						<div class="fourcol callout">
							<?php get_snippet('Contact'); ?>
						</div>


						<div class="latest-news twelvecol first">
							<h6>Latest News
								<span>&nbsp;</span>
								<a href="<?php bloginfo('siteurl'); ?>/news">View All News</a>
							</h6>
							<ul>
								<?php
									$args = array('post_category' => 'blog-posts', 'posts_per_page' => 1);
									$loop = new WP_Query($args);
									while ($loop->have_posts()) : $loop->the_post();
								?>
									<li class="NewsBlog threecol no-gutter">
										<?php the_time('F jS, Y'); ?><br><br>
										<a href="<?php the_permalink() ?>">
											<?php the_title(); ?>
										</a>
										<span class="icon">Blog</span>
									</li>
								<?php endwhile; ?>
								<?php
									$args = array('cat' => 6, 'posts_per_page' => 2);
									$my_query = new WP_Query($args);
									if ($my_query->have_posts()) {
										while ($my_query->have_posts() ) {
											$my_query -> the_post();
											$theTitle = get_the_title();
											?>

											<li class="NewsPress threecol no-gutter">
												<?php the_time('F jS, Y'); ?><br><br>
												<a href="<?php the_permalink() ?>">
													<?php //the_title(); ?>
													<?php echo substr($theTitle, 0, 70) ?>
												</a>
												<span class="icon">Press</span>
											</li>

											<?php

										}
									}
								?>

								<?php
									require_once dirname(__FILE__).'/Facebook/OAuthFacebook.php';
									$FB = new OAuthFacebook;
									$Feed = $FB->GetFeed(102147855029);

									$N = $Feed['data'][0];

									if (strlen($N['message']) > 130) {
										$N['message'] = substr($N['message'],0,130).'...';
									}
									?>
									<li class="NewsFacebook threecol no-gutter">
										<a href="<?php echo $N['link'];?>" target="_blank"><?php echo date('F j, Y', strtotime($N['updated_time']));?></a>
										<p><?php echo $N['message'];?></p>
										<span class="icon"><a href="<?php echo $N['link'];?>" target="_blank">FACEBOOK</a></span>
									</li>



							</ul>
						</div>
					</div>

				</div>


			</div>
<?php get_footer(); ?>
