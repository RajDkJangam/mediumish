<?php
/**
 * Created by PhpStorm.
 * User: tblisi
 * Date: 7/13/18
 * Time: 11:22 AM
 */
if ( post_password_required() ) {
    return;
}
?>
<style>
    .comment-form textarea, .comment-form input {
        padding: 10px 10px;
        max-height: 180px;
        width: 100%;
        font-size: 14px;
    }

    .comment-list li.comment, .comment-form textarea, .comment-form input {
        background: #fff;
        box-shadow: 0 1px 4px rgba(0,0,0,.04);
        border: 1px solid rgba(0,0,0,.09);
        border-radius: 3px;
        padding: 20px;
        position: relative;
    }

    .comment-list {
        list-style: none;
        padding-left: 0;
    }

    .comment-list li.comment.depth-1 {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .comment-list li.comment, .comment-form textarea, .comment-form input {
        background: #fff;
        box-shadow: 0 1px 4px rgba(0,0,0,.04);
        border: 1px solid rgba(0,0,0,.09);
        border-radius: 3px;
        padding: 20px;
        position: relative;
    }
    .avatar{
        width: 40px;
        height: 40px;
        float: left;
        margin-right: 13px;
        border-radius: 100%;
    }
    }
</style>

<div id="comments" class="graybg comments-area">
    <?php if ( have_comments() ) { ?>
        <!-- Begin Comments
        ================================================== -->
        <div class="container">
            <div class="row listrecent listrelated">
                <!-- begin post -->
                <div class="col-md-12">
                    <h2 class="card-title">
                        <?php
                        printf( _nx( 'One comment on "%2$s"', '%1$s comments on "%2$s"', get_comments_number(), 'comments title', 'helsinki'),
                            number_format_i18n( get_comments_number() ), get_the_title() );
                        ?>
                    </h2>
                    <div class="metafooter">
                        <ul class="comment-list">
                            <?php
                            wp_list_comments( array(
                                'short_ping'  => true,
                                'avatar_size' => 50,
                                'per_page' => 10,
                                'type' => 'all',
                            ) );
                            echo paginate_comments_links();
                            ?>
                        </ul>
                    </div>
                </div>
                <!-- end post -->
            </div>
        </div>
        <!-- End Comments
        ================================================== -->
    <?php } ?>

    <div class="container">
        <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
            <p class="no-comments">
                <?php _e( 'Comments are closed.', 'helsinki' ); ?>
            </p>
        <?php } ?>
        <?php comment_form(); ?>
    </div>

</div>
