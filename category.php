<?php
/**
 * Created by PhpStorm.
 * User: tblisi
 * Date: 7/18/18
 * Time: 9:43 AM
 */

$cat_id = get_queried_object_id();
?>
<?php get_header() ?>
<!-- Begin Site Title
================================================== -->
<div class="container">
    <div class="mainheading">
        <h1 class="sitetitle"><?php single_cat_title(); ?></h1>

<!--        <p class="lead">Posts in </p>-->
    </div>
    <section class="featured-posts">
        <div class="section-title">
            <h2><span></span></h2>
        </div>
    </section>
    <?php get_template_part( 'category_posts', get_post_format() ); ?>
    <?php get_footer() ?>
</div>
<!-- /.container -->
