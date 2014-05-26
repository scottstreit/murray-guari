				<div id="sidebar1" class="sidebar fourcol last clearfix" role="complementary">

					<div class="callout">
						<?php get_snippet('Contact'); ?>
					</div>
					<div class="callout">
						<?php get_snippet('Videos'); ?>
					</div>

					<div class="callout">
						<div id="recent-posts-2" class="widget widget_recent_entries">
							<h4 class="widgettitle">Latest News</h4>
							<ul class="sidebar-news">
								<?php
									$args = array('post_category' => 'blog-posts', 'posts_per_page' => 1);
									$loop = new WP_Query($args);
									while ($loop->have_posts()) : $loop->the_post();
								?>
									<li class="NewsBlog">
										<?php the_time('F jS, Y'); ?><br><br>
										<a href="<?php the_permalink() ?>">
											<?php the_title(); ?>
										</a>
										<span class="icon">Blog</span>
									</li>
								<?php endwhile; ?>
								<?php
									$args = array('cat=6', 'posts_per_page' => 2);
									$my_query = new WP_Query($args);
									if ($my_query->have_posts()) {
										while ($my_query->have_posts() ) {
											$my_query -> the_post();

											?>

											<li class="NewsPress">
												<?php the_time('F jS, Y'); ?><br><br>
												<a href="<?php the_permalink() ?>">
													<?php the_title(); ?>
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
									<li class="NewsFacebook">
										<a href="<?php echo $N['link'];?>" target="_blank"><?php echo date('F j, Y', strtotime($N['updated_time']));?></a>
										<p><?php echo $N['message'];?></p>
										<span class="icon"><a href="<?php echo $N['link'];?>" target="_blank">FACEBOOK</a></span>
									</li>
							</ul>



						</div>
						<?php //if ( is_active_sidebar( 'sidebar1' ) ) : ?>

							<?php //dynamic_sidebar( 'sidebar1' ); ?>

						<?php //endif; ?>

					</div>
				</div>
