<?php
/**
 * Created by PhpStorm.
 * User: tblisi
 * Date: 7/16/18
 * Time: 10:59 PM
 */
?>
<section class="featured-posts">
    <div class="section-title">
        <h2><span><?php the_title() ?></span></h2>
    </div>
    <div class="card-columns listfeaturedtag">
        <?php the_content() ?>
    </div>
</section>
