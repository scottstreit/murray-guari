<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol first clearfix" role="main">
							<h1 class="archive-title"><?php single_cat_title(); ?></h1>

							<h2>A summary of major cases that Murray &amp; Guari successfully resolved for their clients.</h2>
							<p>With more than 35 years of combined experience, the trial attorneys at Murray &amp; Guari have handled a variety of cases - many of them quite challenging, and all of them different. But there is one thing that all of our cases have in common - which is our strong desire to see justice served and our client's case resolved to their benefit and satisfaction. Below we share a summary of some of our most challenging - and most rewarding.</p>
							<p>The accounts of recent trials, jury verdicts and settlements contained in this website are intended to illustrate the experience of the firm in a variety of litigation areas. Each case is unique, and the results in one case do not necessarily indicate the quality or value of another case.</p>

							<?php //if (have_posts()) : while (have_posts()) : the_post(); ?>






							<?php $descendants = get_categories( array('child_of' => '17')); ?>
							<?php foreach ( $descendants as $child ) { ?>
							<?php $catPosts = new WP_Query(); $catPosts->query("cat=$child->term_id"); ?>
							<h1><?php echo $child->cat_name . ' Cases'; ?></h1>
							<?php while ($catPosts->have_posts()) : $catPosts->the_post(); ?>


							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

								<header class="article-header">

									<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

								</header>

								<section class="entry-content clearfix">
									<?php foreach((get_the_category()) as $category) {
										echo ( $category->cat_name != 'Noteworthy Cases' ) ? $category->cat_name . ' ' : '';
									} ?>
									<?php the_excerpt(); ?>

								</section>

								<footer class="article-footer">

								</footer>

							</article>

							<?php endwhile; ?>

							<?php } ?>

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


						</div>

						<?php get_sidebar(); ?>

								</div>

			</div>

<?php get_footer(); ?>
