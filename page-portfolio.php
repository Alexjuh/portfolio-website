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
          <div class="inner_content_port col">
            <h1><?php the_title() ?></h1>
            <div class="scnd_nav_blocks"><?php if(is_page('portfolio')){
              wp_nav_menu( array( 'theme_location' => 'secondary') );
              }?>
            </div>
          </div><!-- inner_content -->
          <div class="inner_content code">
            <?php
                $section1 = new WP_Query( 'pagename=code' );
                while ( $section1->have_posts() ) : $section1->the_post();?>
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
                <?php endwhile;
                wp_reset_postdata();
            ?>
          </div><!-- inner_content -->
        </div><!-- outer_content -->
          <?php endwhile;
            else: echo '<p>no content fount</p>';
              endif;
          ?>
          <?php get_footer(); ?>
