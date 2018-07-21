<?php
/**
 * Created by PhpStorm.
 * User: tblisi
 * Date: 7/12/18
 * Time: 9:53 PM
 */
?>
<div class="vl-sidebar">
    <?php
    if(is_active_sidebar('blog_sidebar')) {
        dynamic_sidebar('blog_sidebar');
        var_dump('amor');
    }
    ?>
</div>