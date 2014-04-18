<?php
/*
Template Name: Media Coverage Page Template
*/
?>

<?php get_header(); ?>

      <div id="content">

        <div id="inner-content" class="wrap clearfix">

            <div id="main" class="eightcol first clearfix" role="main">
              <h1>Media Coverage</h1>
               <?php query_posts('cat=7'); ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <section class="entry-content clearfix" itemprop="articleBody">
                  <h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                  <p class="byline vcard"><?php
                    printf(__( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>', 'bonestheme' ), get_the_time('Y-m-j'), get_the_time(__( 'F jS, Y', 'bonestheme' )), bones_get_the_author_posts_link(), get_the_category_list(', '));
                  ?></p>
                  <?php the_excerpt(); ?>
                </section>

              <?php endwhile; else : ?>

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

              <?php endif; ?>

              <?php get_snippet('Bottom'); ?>
            </div>
            <br><br>
            <?php get_sidebar(); ?>

        </div>

      </div>

<?php get_footer(); ?>
