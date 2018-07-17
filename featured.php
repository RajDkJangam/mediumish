<?php
/**
 * Created by PhpStorm.
 * User: tblisi
 * Date: 7/12/18
 * Time: 9:39 PM
 */



$args = array(
    'posts_per_page' => 5,
    'meta_key' => 'meta-checkbox',
    'meta_value' => 'yes'
);

$featured = new WP_Query($args);
?>

<!-- Begin Featured
================================================== -->
<section class="featured-posts">
    <div class="section-title">
        <h2><span>Featured</span></h2>
    </div>
    <div class="card-columns listfeaturedtag">
        <?php if ($featured->have_posts()): while($featured->have_posts()): $featured->the_post(); ?>
            <!-- begin post -->
            <div class="card">
                <div class="row">
                    <div class="col-md-5 wrapthumbnail">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <div class="thumbnail" style="background-image:url(<?php the_post_thumbnail_url() ?>);">
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-7">
                        <div class="card-block">
                            <h2 class="card-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <h4 class="card-text">
                                <?php echo substr(get_the_excerpt(), 0,120);  ?>
                            </h4>
                            <div class="metafooter">
                                <div class="wrapfooter">
								<span class="meta-footer-thumb">
								<a href="<?php the_author_posts() ?>">
                                    <img class="author-thumb" src="<?php echo get_avatar_url( get_the_author_meta( 'ID' )); ?>" alt="<?php the_author() ?>">
                                </a>
								</span>
                                    <span class="author-meta">
								<span class="post-name">
                                    <a href="<?php the_author_posts() ?>">
                                        <?php the_author(); ?>
                                    </a>
                                </span><br/>
								<span class="post-date"><?php echo get_the_date('F j, Y'); ?></span>
                                        <span class="dot"></span>
                                        <span class="post-read">
                                           In <?php the_category(', '); ?>
                                        </span>
								</span>
                                    <span class="post-read-more">
                                        <a href="<?php the_permalink(); ?>" title="Read Story">
                                            <svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25">
                                                <path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd">
                                                </path>
                                            </svg>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end post -->
            <?php
        endwhile; else:
        endif;
        ?>
    </div>
</section>
<!-- End Featured
================================================== -->