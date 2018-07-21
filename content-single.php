<?php
/**
 * Created by PhpStorm.
 * User: tblisi
 * Date: 7/13/18
 * Time: 6:16 PM
 */
?>
<!-- Begin Post -->
<div class="col-md-8 col-md-offset-2 col-xs-12">

    <div class="mainheading">

        <!-- Begin Top Meta -->
        <div class="row post-top-meta">
            <div class="col-md-2">
                <a href="<?php the_author_posts() ?>">
                    <img class="author-thumb" src="<?php echo get_avatar_url( get_the_author_meta( 'ID' )); ?>" alt="Sal">
                </a>
            </div>
            <div class="col-md-10">
                <a class="link-dark" href="<?php echo the_author_posts()?>">
                    <?php the_author(); ?>
                </a>
                <a href="#" class="btn follow">Follow</a>
                <span class="author-description">
                    <?php echo get_the_author_meta('description')?>
                </span>
                <span class="post-date">
                    <?php the_date(); ?>
                </span>
                <span class="dot"></span>
                <!-- <span class="post-read">6 min read</span> -->
            </div>
        </div>
        <!-- End Top Menta -->

        <h1 class="posttitle"><?php the_title(); ?></h1>

    </div>

    <!-- Begin Featured Image -->
    <img class="featured-image img-fluid" style="width: 100%; " src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
    <!-- End Featured Image -->

    <!-- Begin Post Content -->
    <div class="article-post">
        <?php the_content(); ?>
        <?php the_tags() ?>
    </div>
    <!-- End Post Content -->

    <!-- Begin Tags -->
    <div class="after-post-tags">
        <ul class="tags">
            <?php
            $categories = get_the_category();

            if ( ! empty( $categories ) ) {
                foreach ($categories as $category){
            ?>
                    <li><a href="<?php echo get_category_link() ?>"><?php echo esc_attr($category->name) ?></a></li>
            <?php
                }
            }
            ?>
        </ul>
    </div>
    <!-- End Tags -->

    <style>
        .prevnextlinks {
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
            margin-left: 0;
            margin-right: 0;
        }

        .mb-5 {
            margin-bottom: 3rem!important;
        }

        .prevnextlinks a {
            font-weight: 600;
        }

        .prevnextlinks .thepostlink {
            padding: 20px 0;
            font-size: 17px;
        }
        .prevnextlinks .rightborder {
            border-right: 1px solid #eee;
        }
    </style>

    <div class="row mb-5 prevnextlinks justify-content-center align-items-center">
        <div class="col-md-6 col-xs-12 rightborder pl-0">
            <div class="thepostlink">
                <?php
                $prev_post = get_adjacent_post(false, '', true);
                if(!empty($prev_post)) { ?>
                    « <a href="<?php echo get_permalink($prev_post->ID)?>" title="<?php echo esc_attr($prev_post->post_title)?>" rel="prev">
                        <?php echo esc_attr($prev_post->post_title) ?>
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-6 col-xs-12 text-right pr-0">
            <div class="thepostlink">
                <?php
                $next_post = get_adjacent_post(false, '', false);
                if(!empty($next_post)) { ?>
                    <a href="<?php echo get_permalink($next_post->ID) ?>" title="<?php echo esc_attr($next_post->post_title) ?>" rel="next">
                        <?php echo esc_attr($next_post->post_title) ?></a> »
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- End Post -->
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/scroll.js"></script>