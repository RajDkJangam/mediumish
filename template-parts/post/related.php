<?php
/**
 * Created by PhpStorm.
 * User: tblisi
 * Date: 7/14/18
 * Time: 10:02 AM
 */
?>
<div class="hideshare"></div>

<!-- Begin Related
================================================== -->
<div class="graybg">
    <div class="container">
        <div class="row listrecent listrelated">

            <?php
            //for use in the loop, list 5 post titles related to first tag on current post
            $categories = get_the_category($post->ID);

            if (!empty($categories)){
                $category_ids = array();
                foreach ($categories as $category){
                    $category_ids[] = $category->term_id;
                }

                $args=array(
                    'category__in' => $category_ids,
                    'post__not_in' => array($post->ID),
                    'posts_per_page'=> 3,
                    'orderby' => 'rand',
                );

                $relatives = new wp_query($args);

                if($relatives->have_posts() ) {?>

                    <?php while($relatives->have_posts()): $relatives->the_post(); ?>
                    <!-- begin post -->
                    <div class="col-md-4">
                        <div class="card">
                            <a href="<?php the_permalink(); ?>">
                                <img class="img-fluid img-thumb" src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
                            </a>
                            <div class="card-block">
                                <h2 class="card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <div class="metafooter">
                                    <div class="wrapfooter">
                                        <span class="meta-footer-thumb">
                                            <a href="<?php echo the_author_posts()?>">
                                                <img class="author-thumb" src="<?php echo get_avatar_url( get_the_author_meta( 'ID' )); ?>" alt="<?php the_author() ?>">
                                            </a>
                                        </span>
                                        <span class="author-meta">
                                            <span class="post-name">
                                                <a href="<?php echo the_author_posts()?>">
                                                    <?php the_author()?>
                                                </a>
                                            </span><br/>
                                            <span class="post-date">
                                                <?php echo get_the_date('F j, Y'); ?>
                                            </span>
                                            <span class="dot"></span>
<!--                                            <span class="post-read">6 min read</span>-->
                                        </span>
                                        <span class="post-read-more">
                                            <a href="<?php the_permalink() ?>" title="Read Story">
                                                <svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end post -->
                    <?php
                    endwhile;
                }
            }
            ?>
        </div>
<!--        <hr/>-->
    </div>
</div>
<!-- End Related Posts
================================================== -->
