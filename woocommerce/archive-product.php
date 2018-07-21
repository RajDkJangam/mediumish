<?php
/**
 * Created by Bravo Gidi.
 * User: bravogidi@gmail.com.
 * Github: https://github.com/bravoh
 * Date: 7/21/18
 * Time: 10:30 AM
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>

<?php
global $product, $post;
?>

<!-- begin post -->
<div <?php post_class('vl-product-standard cbp-item'); ?> id="post-<?php the_ID(); ?>">
    <div class="card">
        <div class="row">
            <div class="col-md-5 wrapthumbnail" style="overflow: hidden">
                <a href="<?php the_permalink(); ?>">
                    <?php if(has_post_thumbnail()): ?>
                        <div class="thumbnail" style="background:url(<?php the_post_thumbnail_url() ?>); background-position: center"></div>
                    <?php endif; ?>
                </a>
            </div>
            <div class="col-md-7">
                <div class="card-block">
                    <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <h4 class="card-text"><?php echo woocommerce_template_loop_price(); ?></h4>
                    <div class="metafooter">
                        <div class="wrapfooter">
                            <?php if ( ! empty( $show_rating ) ) : ?>
                                <?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
                            <?php endif; ?>
                            <?php echo woocommerce_show_product_sale_flash(); ?>
                            <span class="post-read-more">
                                <a href="<?php the_permalink(); ?>" title="View Product">
                                    <svg class="svgIcon-use" width="25" height="25" viewBox="0 0 25 25">
                                        <path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path></svg>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end post -->