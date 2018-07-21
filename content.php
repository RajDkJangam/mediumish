<?php
/**
 * Created by PhpStorm.
 * User: tblisi
 * Date: 7/12/18
 * Time: 9:46 PM
 */
?>
<!-- begin post -->
<div class="card">
    <a href="<?php the_permalink() ?>">
        <?php if (has_post_thumbnail() ) { ?>
            <img class="img-fluid" src="<?php the_post_thumbnail_url() ?>" title="<?php echo the_title()?>" alt="<?php echo the_title()?>">
        <?php } ?>
    </a>
    <div class="card-block">
        <h2 class="card-title">
            <a href="<?php the_permalink() ?>">
                <?php echo the_title()?>
            </a>
        </h2>
        <h4 class="card-text">
            <?php the_excerpt(); ?>
        </h4>
        <div class="metafooter">
            <div class="wrapfooter">
                <span class="meta-footer-thumb">
                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                        <img class="author-thumb" src="<?php echo get_avatar_url( get_the_author_meta( 'ID' )); ?>" alt="<?php ucfirst(the_author()) ?>">
                    </a>
                </span>
                <span class="author-meta">
                    <span class="post-name">
                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                            <?php ucfirst(the_author()) ?>
                        </a>
                    </span>
                    <br/>
                    <span class="post-date"><?php the_date() ?></span>
                    <span class="dot"></span>
                    <!--<span class="post-read">6 min read</span>-->
                </span>
                <span class="post-read-more">
                    <a href="<?php the_permalink() ?>" title="Read Story">
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
<!-- end post -->