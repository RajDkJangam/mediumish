<?php
/**
 * Created by PhpStorm.
 * User: tblisi
 * Date: 7/12/18
 * Time: 3:04 PM
 */

function load_css(){
    wp_enqueue_style('mediumish_stylesheet',get_stylesheet_uri());
    wp_enqueue_style('mediumish_font-awesome',''.esc_url( get_template_directory_uri() ).'/css/font-awesome.min.css');
    wp_enqueue_style('mediumish_gfonts',''.esc_url( get_template_directory_uri() ).'/css/righteous.css');

    add_action('wp_enqueue_style','load_css');
}

add_theme_support( 'post-thumbnails' );

function theme_prefix_setup() {

    add_theme_support( 'custom-logo', array(
        'height'      => 40,
        'width'       => 39,
        'flex-width' => true,
    ) );

}

add_action( 'after_setup_theme', 'theme_prefix_setup' );

function theme_prefix_the_custom_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }

}

function sm_custom_meta() {
    add_meta_box( 'sm_meta', __( 'Feature Post', 'helsinki' ), 'sm_meta_callback', 'post' );
}

function sm_meta_callback( $post ) {
    $featured = get_post_meta( $post->ID );
    ?>
    <p>
    <div class="sm-row-content">
        <label for="meta-checkbox">
            <input type="checkbox" name="featured-post" id="meta-checkbox" value="yes" <?php if ( isset ( $featured['featured-post'] ) ) checked( $featured['featured-post'][0], 'yes' ); ?> />
            <?php _e( 'Feature this post', 'helsinki' )?>
        </label>

    </div>
    </p>
    <?php
}

add_action( 'add_meta_boxes', 'sm_custom_meta' );




/**
 * Saves the custom meta input
 */
function sm_meta_save( $post_id ) {
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'sm_nonce' ] ) && wp_verify_nonce( $_POST[ 'sm_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    // Checks for input and saves
    if( isset( $_POST[ 'featured-post' ] ) ) {
        update_post_meta( $post_id, 'featured-post', 'yes' );
    } else {
        update_post_meta( $post_id, 'featured-post', '' );
    }

}

add_action( 'save_post', 'sm_meta_save' );

function custom_excerpt_length( $length ) {
    return 20;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_action( 'after_setup_theme', 'wpse_theme_setup' );
function wpse_theme_setup() {
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );
}

/*
 * Get post taxonomy
 *
 * */

function helsinki_post_taxonomy($post_id, $taxonomy, $delimiter = ', ', $get = 'name', $link = true) {
    $tags = wp_get_post_terms($post_id, $taxonomy);
    $list = '';
    foreach ($tags as $tag) {
        if ($link) {
            $list .= '<a href="' . get_category_link($tag->term_id) . '">' . $tag->$get . '</a>' . $delimiter;
        } else {
            $list .= $tag->$get . $delimiter;
        }
    }
    return substr($list, 0, strlen($delimiter) * (-1));
}


function social_share_menu_item()
{
    add_submenu_page("options-general.php", "Helsinki Theme Settings", "Helsinki Theme Settings", "manage_options", "social-share", "social_share_page");
}

add_action("admin_menu", "social_share_menu_item");

function social_share_page()
{
    ?>
    <div class="wrap">
        <h1>Helsinki Theme Settings</h1>
        <br/><h2>1. Social Share Settings</h2>
        <form method="post" action="options.php">
            <?php
            settings_fields("social_share_config_section");

            do_settings_sections("social-share");

            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function social_share_settings(){
    add_settings_section("social_share_config_section", "", null, "social-share");
    add_settings_field("social-share-disable", "Disable Social Share?", "helsinki_social_share_disable_checkbox", "social-share", "social_share_config_section");
    add_settings_field("social-share-facebook", "Do you want to display Facebook share button?", "social_share_facebook_checkbox", "social-share", "social_share_config_section");
    add_settings_field("social-share-twitter", "Do you want to display Twitter share button?", "social_share_twitter_checkbox", "social-share", "social_share_config_section");
    add_settings_field("social-share-linkedin", "Do you want to display LinkedIn share button?", "social_share_linkedin_checkbox", "social-share", "social_share_config_section");
    add_settings_field("social-share-reddit", "Do you want to display Reddit share button?", "social_share_reddit_checkbox", "social-share", "social_share_config_section");

    register_setting("social_share_config_section", "helsinki-social-share-enable");
    register_setting("social_share_config_section", "social-share-facebook");
    register_setting("social_share_config_section", "social-share-twitter");
    register_setting("social_share_config_section", "social-share-linkedin");
    register_setting("social_share_config_section", "social-share-reddit");
}

function helsinki_social_share_disable_checkbox()
{
    ?>
    <input type="checkbox" name="helsinki-social-share-disable" value="1" <?php checked(1, get_option('helsinki-social-share-disable'), true); ?> /> Check for Yes
    <?php
}

function social_share_facebook_checkbox()
{
    ?>
    <input type="checkbox" name="social-share-facebook" value="1" <?php checked(1, get_option('social-share-facebook'), true); ?> /> Check for Yes
    <?php
}

function social_share_twitter_checkbox()
{
    ?>
    <input type="checkbox" name="social-share-twitter" value="1" <?php checked(1, get_option('social-share-twitter'), true); ?> /> Check for Yes
    <?php
}


function social_share_linkedin_checkbox()
{
    ?>
    <input type="checkbox" name="social-share-linkedin" value="1" <?php checked(1, get_option('social-share-linkedin'), true); ?> /> Check for Yes
    <?php
}

function social_share_reddit_checkbox()
{
    ?>
    <input type="checkbox" name="social-share-reddit" value="1" <?php checked(1, get_option('social-share-reddit'), true); ?> /> Check for Yes
    <?php
}

add_action("admin_init", "social_share_settings");

//WOO
// Add new constant that returns true if WooCommerce is active
define( 'WPEX_WOOCOMMERCE_ACTIVE', class_exists( 'WooCommerce' ) );

// Checking if WooCommerce is active
if ( WPEX_WOOCOMMERCE_ACTIVE ) {

}

//Declare WooCommerce Support
add_action( 'after_setup_theme', function() {
    add_theme_support( 'woocommerce' );
} );

// Remove all Woo Styles
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

//function wpex_remove_woo_styles( $styles ) {
//    unset( $styles['woocommerce-general'] );
//    unset( $styles['woocommerce-layout'] );
//    unset( $styles['woocommerce-smallscreen'] );
//    return $styles;
//}
//add_filter( 'woocommerce_enqueue_styles', 'wpex_remove_woo_styles' );
//
////Enable WooCommerce Product Gallery, Zoom & Lightbox (v3.0+)
//add_theme_support( 'wc-product-gallery-slider' );
//add_theme_support( 'wc-product-gallery-zoom' );
//add_theme_support( 'wc-product-gallery-lightbox' );
//
////Remove The Shop Title
//add_filter( 'woocommerce_show_page_title', '__return_false' );

//Alter The Archive Title for The Shop
function wpex_woo_archive_title( $title ) {
    if ( is_shop() && $shop_id = wc_get_page_id( 'shop' ) ) {
        $title = get_the_title( $shop_id );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'wpex_woo_archive_title' );

// Alter WooCommerce shop posts per page
function wpex_woo_posts_per_page( $cols ) {
    return 12;
}
add_filter( 'loop_shop_per_page', 'wpex_woo_posts_per_page' );

//Change the number of columns displayed on the shop per row
// Alter shop columns
function wpex_woo_shop_columns( $columns ) {
    return 4;
}
add_filter( 'loop_shop_columns', 'wpex_woo_shop_columns' );

// Add correct body class for shop columns
function wpex_woo_shop_columns_body_class( $classes ) {
    if ( is_shop() || is_product_category() || is_product_tag() ) {
        $classes[] = 'columns-4';
    }
    return $classes;
}
add_filter( 'body_class', 'wpex_woo_shop_columns_body_class' );

//Change the Next & Previous Pagination Arrows
function wpex_woo_pagination_args( $args ) {
    $args['prev_text'] = '<i class="fa fa-angle-left"></i>';
    $args['next_text'] = '<i class="fa fa-angle-right"></i>';
    return $args;
}
add_filter( 'woocommerce_pagination_args', 'wpex_woo_pagination_args' );

//Change the OnSale Badge Text
function wpex_woo_sale_flash() {
    return '<span class="onsale">' . esc_html__( 'Sale', 'helsinki' ) . '</span>';
}
add_filter( 'woocommerce_sale_flash', 'wpex_woo_sale_flash' );

//Change Product Gallery thumbnails columns
function wpex_woo_product_thumbnails_columns() {
    return 4;
}
add_action( 'woocommerce_product_thumbnails_columns', 'wpex_woo_product_thumbnails_columns' );

//Alter the number of displayed related products
// Set related products to display 4 products
function wpex_woo_related_posts_per_page( $args ) {
    $args['posts_per_page'] = 4;
    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'wpex_woo_related_posts_per_page' );

//Change the number of columns per row for related & up-sells sections on products
// Filter up-sells columns
function wpex_woo_single_loops_columns( $columns ) {
    return 4;
}
add_filter( 'woocommerce_up_sells_columns', 'wpex_woo_single_loops_columns' );

// Filter related args
function wpex_woo_related_columns( $args ) {
    $args['columns'] = 4;
    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'wpex_woo_related_columns', 10 );

// Filter body classes to add column class
function wpex_woo_single_loops_columns_body_class( $classes ) {
    if ( is_singular( 'product' ) ) {
        $classes[] = 'columns-4';
    }
    return $classes;
}
add_filter( 'body_class', 'wpex_woo_single_loops_columns_body_class' );


//Add a dynamic cart link & cart cost to your menu
// Add the cart link to menu
function wpex_add_menu_cart_item_to_menus( $items, $args ) {

    // Make sure your change 'wpex_main' to your Menu location !!!!
    if ( $args->theme_location === 'wpex_main' ) {

        $css_class = 'menu-item menu-item-type-cart menu-item-type-woocommerce-cart';

        if ( is_cart() ) {
            $css_class .= ' current-menu-item';
        }

        $items .= '<li class="' . esc_attr( $css_class ) . '">';

        $items .= wpex_menu_cart_item();

        $items .= '</li>';

    }

    return $items;

}
add_filter( 'wp_nav_menu_items', 'wpex_add_menu_cart_item_to_menus', 10, 2 );

// Function returns the main menu cart link
function wpex_menu_cart_item() {

    $output = '';

    $cart_count = WC()->cart->cart_contents_count;

    $css_class = 'wpex-menu-cart-total wpex-cart-total-'. intval( $cart_count );

    if ( $cart_count ) {
        $url  = WC()->cart->get_cart_url();
    } else {
        $url  = wc_get_page_permalink( 'shop' );
    }

    $html = $cart_extra = WC()->cart->get_cart_total();
    $html = str_replace( 'amount', '', $html );

    $output .= '<a href="'. esc_url( $url ) .'" class="' . esc_attr( $css_class ) . '">';

    $output .= '<span class="fa fa-shopping-bag"></span>';

    $output .= wp_kses_post( $html );

    $output .= '</a>';

    return $output;
}

// Update cart link with AJAX
function wpex_main_menu_cart_link_fragments( $fragments ) {
    $fragments['.wpex-menu-cart-total'] = wpex_menu_cart_item();
    return $fragments;
}
add_filter( 'add_to_cart_fragments', 'wpex_main_menu_cart_link_fragments' );

add_action( 'widgets_init', 'theme_slug_widgets_init' );

function theme_slug_widgets_init() {
    register_sidebar(
        $args = array(
            'name'          => __( 'Sidebar name', 'helsinki' ),
            'id'            => 'unique-sidebar-id',
            'description'   => '',
            'class'         => '',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>' )
    );
}

//Content Width
if ( ! isset( $content_width ) ) {
    $content_width = 600;
}

function newborn_enqueue_comments_reply() {
    if( get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'comment_form_before', 'newborn_enqueue_comments_reply' );

add_theme_support('automatic-feed-links');

/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
add_theme_support( 'html5', array(
    'search-form',
) );
