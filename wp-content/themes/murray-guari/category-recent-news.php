<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol first clearfix" role="main">

							<h1 class="archive-title"><?php single_cat_title(); ?></h1>


							<p>Welcome to Murray & Guari's News and Media Center. Here you will find our breaking news and announcements from our firm including case updates, legal updates and community involvement.</p>

							<p>
							To Download Firm Press Kit, <a href="<?php bloginfo('url'); ?>/images/MurrayGuari-PressKitC-020111-v1.pdf">Click Here</a></br>
							To view Cased Covered in Media, <a href="<?php bloginfo('url'); ?>/category/media-coverage">Click Here</a></br>
							To view our Newsletters, <a href="<?php bloginfo('url'); ?>/newsletters">Click Here</a></br>
							</p>

							<p>We welcome inquires from the media and thank you for your interest.  If you have any questions on any press release or case, please contact us.</p
							<hr />
							<?php $query = new WP_Query( 'category_name=recent-news,blog-posts,media-coverage' ); ?>
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

								<header class="article-header">

									<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

								</header>

								<section class="entry-content clearfix">
									<?php get_the_category(); ?>
									<?php single_cat_title( '', true ); ?>

									<?php the_excerpt(); ?>

								</section>

								<footer class="article-footer">

								</footer>

							</article>

							<?php endwhile; ?>

									<?php if ( function_exists( 'bones_page_navi' ) ) { ?>
										<?php bones_page_navi(); ?>
									<?php } else { ?>
										<nav class="wp-prev-next">
											<ul class="clearfix">
												<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
												<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
											</ul>
										</nav>
									<?php } ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

						<?php get_sidebar(); ?>

								</div>

			</div>

<?php get_footer(); ?>
