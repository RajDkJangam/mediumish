<?php
/**
 * Created by Bravo Gidi.
 * User: bravogidi@gmail.com.
 * Github: https://github.com/bravoh
 * Date: 7/19/18
 * Time: 7:44 PM
 */
get_header() ?>
<!-- Begin Site Title
================================================== -->
<div class="container">
    <?php if (!is_singular()){ ?>
        <div style="margin-top: 5%" class="section-title">
            <h2><span>Shop</span></h2>
        </div>
    <?php }else{ ?>
        <div style="margin-top: 5%" class="section-title">
            <h2><span>Product Details</span></h2>
        </div>
    <?php } ?>
    <section class="featured-posts">
        <div class="card-columns listfeaturedtag">
            <?php
            if(is_singular()): ?>
                <?php //get_template_part('templates/page-title/vinero-pagetitle-hero', 'shop'); ?>
                <?php get_template_part('woocommerce/single', 'product'); ?>
            <?php else: ?>
                <?php
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                    get_template_part('woocommerce/archive', 'product');
                endwhile;
                endif;
            endif;
            ?>
        </div>
    </section>
    <?php get_footer() ?>
</div>
<!-- /.container -->