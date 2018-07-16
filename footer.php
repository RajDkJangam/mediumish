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
        Copyright &copy; 2017 Your Website Name
    </p>
    <p class="pull-right">
        Mediumish Theme by <a target="_blank" href="https://www.wowthemes.net">WowThemes.net</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/ie10-viewport-bug-workaround.js"></script>

<script>
    $(document).ready(function () {
        if ($('#wpadminbar')[0]){
            $('.navbar').css('top', '32px')
        }
    });
</script>

<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/mediumish.js"></script>
<?php wp_footer() ?>
</body>
</html>
