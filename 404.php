<?php get_header() ?>
<!-- Begin Site Title
================================================== -->
<div class="container">
    <div style="margin-top: 5%" class="section-title">
        <h2><span>
             <?php _e( 'Oops! That page can&rsquo;t be found.', 'helsinki' ); ?>
            </span>
        </h2>
    </div>

    <section class="featured-posts">
        <div class="card-columns listfeaturedtag">
            <p>
                <?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'helsinki' ); ?>
            </p>

            <?php get_search_form(); ?>
        </div>
    </section>

    <?php get_footer() ?>
</div>
<!-- /.container -->