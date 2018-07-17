<?php get_header() ?>
<!-- Begin Site Title
================================================== -->
<div class="container">
    <?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/page/content', get_post_format() );
        the_content();
    endwhile; endif;
    ?>
    <?php get_footer() ?>
</div>
<!-- /.container -->


