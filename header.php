<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "col-" div.
 *
 * @package Portfolio
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title(''); echo ' | ';  bloginfo( 'name' ); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	   <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
  </head>

  <body>
    <div class="container">
      <div class="outer_nav row">
        <div class="top_nav row">
          <?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
          <div class="text">
            <p><?php echo get_bloginfo( 'description' ); ?></p>
          </div><!-- text -->
        </div> <!-- top_nav -->
        <div class="semc">
        </div>
        <div class="scnd_nav row">
          <?php if(is_page('portfolio')){
            wp_nav_menu( array( 'theme_location' => 'secondary') );
          }
           ?>
        </div><!-- bottom_nav -->
      </div> <!-- outer_nav -->
