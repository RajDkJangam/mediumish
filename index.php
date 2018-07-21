<?php get_header() ?>
<!-- Begin Site Title
================================================== -->
<div class="container">
    <div class="mainheading">
        <h1 class="sitetitle"><?php echo get_bloginfo('title')?></h1>
        <p class="lead">
            <?php echo get_bloginfo('description')?>
        </p>
    </div>
    <!-- End Site Title
    ================================================== -->
    <?php get_template_part( 'featured', get_post_format() ); ?>
    <?php get_sidebar(); ?>
    <!-- Begin List Posts================================================== -->
    <section class="recent-posts">
        <div class="section-title">
            <h2><span>All Stories</span></h2>
        </div>
        <div class="card-columns listrecent">
            <?php
            if (have_posts()) :
                while ( have_posts() ) : the_post();
                get_template_part( 'content', get_post_format() );
            endwhile;
            endif;
            ?>
        </div>
        <?php  echo paginate_links(); ?>
    </section>
    <!-- End List Posts
    ================================================== -->
    <?php get_footer() ?>
</div>
<!-- /.container -->

