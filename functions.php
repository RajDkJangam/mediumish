<?php
/**
 * Created by PhpStorm.
 * User: tblisi
 * Date: 7/12/18
 * Time: 3:04 PM
 */
function load_css(){
    wp_enqueue_style('mediumish_stylesheet',get_stylesheet_uri());
    wp_enqueue_style('mediumish_font-awesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('mediumish_gfonts','https://fonts.googleapis.com/css?family=Righteous');

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
            <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if ( isset ( $featured['meta-checkbox'] ) ) checked( $featured['meta-checkbox'][0], 'yes' ); ?> />
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
    if( isset( $_POST[ 'meta-checkbox' ] ) ) {
        update_post_meta( $post_id, 'meta-checkbox', 'yes' );
    } else {
        update_post_meta( $post_id, 'meta-checkbox', '' );
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