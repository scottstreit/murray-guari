<?php
/*
Template Name: Custom Home Page
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol first clearfix" role="main">

							<div id="slides">

							<?php
								$args = array('post_type' => 'slide', 'posts_per_page' => 5);
								$loop = new WP_Query($args);
								while ($loop->have_posts()) : $loop->the_post(); ?>
								<div class="slide">
								<?php
//								the_post_thumbnail( 'bones-thumb-600');
								the_post_thumbnail();
								the_title();
								the_content(); ?>
								</div>
								<?php endwhile; ?>
							</div>

<!--
							<article id="post-not-found" class="hentry clearfix">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
								</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
								</section>
								<footer class="article-footer">
										<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
								</footer>
							</article>
-->


						</div>

						<?php // get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
