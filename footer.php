<?php
/**
 * Created by PhpStorm.
 * User: tblisi
 * Date: 7/12/18
 * Time: 6:01 PM
 */
?>

<!-- Begin Footer
================================================== -->
<div class="footer">
    <p class="pull-left">
        Copyright &copy; <?php echo date('Y') ?> <?php echo get_bloginfo('title')?>
    </p>
    <p class="pull-right">
        Helsinki Theme by <a target="_blank" href="">Smarty Bravo</a>
    </p>
    <div class="clearfix">
    </div>
</div>
<!-- End Footer
================================================== -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/tether.min.js" ></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/ie10-viewport-bug-workaround.js"></script>

<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/worker.js"></script>
<?php wp_footer() ?>
</body>
</html>
