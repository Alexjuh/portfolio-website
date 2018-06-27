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
        <div class="outer_content row">
          <div class="inner_content home">
            <?php
                $section1 = new WP_Query( 'pagename=home' );
                while ( $section1->have_posts() ) : $section1->the_post();?>
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
                <?php endwhile;
                wp_reset_postdata();
            ?>
          </div><!-- inner_content -->
          <div class="inner_content about">
            <?php
                $section1 = new WP_Query( 'pagename=over mij' );
                while ( $section1->have_posts() ) : $section1->the_post();?>
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
                <?php endwhile;
                wp_reset_postdata();
            ?>
          </div><!-- inner_content -->
          <div class="inner_content news">
            <h1>Nieuws</h1>
            <?php
                $section1 = new WP_Query( 'pagename=nieuws' );
                while ( $section1->have_posts() ) : $section1->the_post();?>
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
                <?php endwhile;
                wp_reset_postdata();
            ?>
          </div><!-- inner_content -->
        </div><!-- outer_content -->

        <?php get_footer(); ?>
