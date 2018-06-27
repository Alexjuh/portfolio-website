<?php
/**
* Portfolio functions and definitions
*
* Set up the theme and provides some helper functions, which are used in the
* theme as custom template tags. Others are attached to action and filter
* hooks in WordPress to change core functionality.
*
* @package Portfolio
*/

  if ( ! function_exists( 'Portfolio_setup' ) ) :
    function Portfolio_starter_setup() {
      load_theme_textdomain( 'Portfolio', get_template_directory() . '/languages' );
      add_theme_support( 'automatic-feed-links' );
      add_theme_support( 'title-tag' );
      add_theme_support( 'post-thumbnails' );
      register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'Portfolio' ),
        'secondary'  => __( 'Secondary Menu', 'Portfolio' ),
      ) );
      add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
      ) );
      add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
      ) );
      add_theme_support(  'customize-selective-refresh-widgets' );
      // add_theme_support('custom-logo', array(
      //   // 'flex-height' => true,
      //   // 'flex-width' => true,
      //   'padding' => 10,
      // ));
      function  Portfolio_add_editor_styles() {
        add_editor_style( 'custom-editor-style.css' );
      }
      add_action( 'after_setup_theme', 'Portfolio_starter_setup');
      add_action( 'admin_init', 'Portfolio_add_editor_styles' );
    }
    endif;
  add_action( 'after_setup_theme', 'Portfolio_starter_setup' );

  function Portfolio_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'Portfolio_content_width', 1170 );
  }
  add_action( 'after_setup_theme', 'Portfolio_content_width', 0 );

  // scripts laden
  function Portfolio_scripts() {
    //laden bootstrap
    //wp_enqueue_style( 'Portfolio-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css' );
    //laden eigen css
    wp_enqueue_style( 'Portfolio-css', get_template_directory_uri() . '/style.css' );
    // laden javascript
    wp_enqueue_script('Portfolio-jqueryjs', get_template_directory_uri() . '/js/jquery.min.js', array() );
    // laden global.js
    wp_enqueue_script('Portfolio-globaljs', get_template_directory_uri() . '/js/global.js', array() );
    // Remove WP Version From Styles
    add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
    // Remove WP Version From Scripts
    add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );
    // Function to remove version numbers
    function sdt_remove_ver_css_js( $src ) {
      if ( strpos( $src, 'ver=' ) )
      $src = remove_query_arg( 'ver', $src );
      return $src;
    }
    wp_enqueue_script('jquery');
    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/js/html5.js', array(), '3.7.0', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
    }
  }
  add_action( 'wp_enqueue_scripts', 'Portfolio_scripts' );

  function Portfolio_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <div class="d-block mb-3">' . __( "To view this protected post, enter the password below:", "Portfolio" ) . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __( "Password:", "Portfolio" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__( "Submit", "Portfolio" ) . '" class="btn btn-primary"/></div>
    </form>';
    return $o;
  }
  add_filter( 'the_password_form', 'Portfolio_password_form' );


?>
