<?php get_header() ?>
<!-- Begin Site Title
================================================== -->
<div class="container">
    <div class="mainheading">
        <h1 class="sitetitle">
            <?php echo get_bloginfo('title')?>
        </h1>

        <p class="lead">
            <?php echo get_bloginfo('description')?>
        </p>

    </div>
    <!-- End Site Title================================================== -->
    <?php get_template_part( 'category_posts', get_post_format() ); ?>
    <?php get_footer() ?>
</div>
<!-- /.container -->