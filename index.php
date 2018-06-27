<?php get_header();
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package Portfolio
 */

 ?>
 <?php
   if (have_posts()) :
     while (have_posts()) : the_post(); ?>
        <div class="outer_content row">
          <div class="inner_content col">
            <h1><?php the_title() ?></h1>
            <p><?php echo the_content('post_content', $post->ID) ?></p>
          </div><!-- inner_content -->
        </div><!-- outer_content -->
          <?php endwhile;
            else: echo '<p>no content fount</p>';
              endif;
          ?>
          <?php get_footer(); ?>
