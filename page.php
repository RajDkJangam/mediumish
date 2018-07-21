<?php get_header() ?>
<!-- Begin Site Title
================================================== -->
<div class="container">
    <?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();
        ?>
        <div style="margin-top: 5%" class="section-title">
            <h2><span><?php the_title() ?></span></h2>
        </div>
        <?php
        get_template_part( 'template-parts/page/content', get_post_format() );
        the_content();
    endwhile;
    wp_link_pages();
    endif;
    ?>
    <?php get_footer() ?>
</div>
<!-- /.container -->


