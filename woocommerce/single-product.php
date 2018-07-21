<?php
/**
 * Created by Bravo Gidi.
 * User: bravogidi@gmail.com.
 * Github: https://github.com/bravoh
 * Date: 7/19/18
 * Time: 8:00 PM
 */
?>
<?php
global $product, $post;
?>
<!-- begin post -->
<div <?php post_class('vl-product-standard cbp-item'); ?> id="post-<?php the_ID(); ?>">
    <div class="row">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php wc_get_template_part( 'content', 'single-product' ); ?>
        <?php endwhile; // end of the loop. ?>
    </div>
</div>
<!-- end post -->
