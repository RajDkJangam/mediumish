<?php
/**
 * Created by PhpStorm.
 * User: tblisi
 * Date: 7/18/18
 * Time: 9:43 AM
 */
$author = true;
?>
<?php get_header() ?>
<div class="container">
    <div class="row">
    <!--<div class="col-md-2"></div>-->
        <div class="col-md-12 col-md-offset-2">
            <div class="mainheading">
                <div class="row post-top-meta authorpage">
                    <div class="col-md-10 col-xs-12">
                        <h1>
                            <?php echo get_the_author_meta( 'display_name' ); ?>
                        </h1>
                        <span class="author-description">
                            <?php echo get_the_author_meta( 'description' ); ?>
                        </span>
                        <div class="sociallinks">
                            <a target="_blank" href="https://www.facebook.com/wowthemesnet/">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <span class="dot"></span>
                            <a target="_blank" href="https://plus.google.com/s/wowthemesnet/top">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                        <a target="_blank" href="https://twitter.com/wowthemesnet" class="btn follow">Follow</a>
                    </div>
                    <div class="col-md-2 col-xs-12">
                        <img class="author-thumb" src="<?php echo get_avatar_url( get_the_author_meta( 'ID' )); ?>" alt="<?php echo get_the_author_meta( 'display_name' ); ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <section class="featured-posts">
        <div class="section-title">
            <h2>
                <span><?php echo get_the_author_meta( 'display_name' ); ?>'s Posts</span>
            </h2>
        </div>
    </section>
    <?php get_template_part( 'category_posts', get_post_format() ); ?>
    <?php get_footer() ?>
</div>
<!-- /.container -->
