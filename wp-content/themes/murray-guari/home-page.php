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
									$args = array('post_type' => 'post', 'posts_per_page' => 3);
									$loop = new WP_Query($args);
									while ($loop->have_posts()) : $loop->the_post();
								?>
									<li class="NewsBlog threecol no-gutter">
										<a href="<?php the_permalink() ?>"><?php the_time('F jS, Y'); ?></a>
										<?php the_excerpt(); ?>
									</li>
								<?php endwhile; ?>

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
										<div><a href="<?php echo $N['link'];?>" target="_blank">FACEBOOK</a></div>
									</li>



							</ul>
						</div>
					</div>

						<?php // get_sidebar(); ?>

				</div>
				<?php wp_list_categories('show_count=1&title_li=<h2>Categories</h2>'); ?>

			</div>
<?php get_footer(); ?>
