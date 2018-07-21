<?php
/**
 * Created by PhpStorm.
 * User: tblisi
 * Date: 7/12/18
 * Time: 6:01 PM
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo esc_attr(get_bloginfo('description')) ?>">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/favicon.ico">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/righteous.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css" rel="stylesheet">
    <?php wp_head();?>
</head>

<style>
    .navbar-nav li {
        /*position: relative;*/
        display: inline-block;
        padding: 20px;
        font-weight: 500;
    }
    .navbar-nav li a {
        color: #666666;
    }

    .current_page_item li a{
        color: black;
    }
</style>

<body>
<!-- Begin Nav
================================================== -->
<nav class="navbar navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <!-- Begin Logo -->
        <a class="navbar-brand" href="<?php echo esc_url(site_url()) ?>" title="Home">
            <?php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            ?>
            <img src="<?php echo esc_url($image[0]); ?>" alt="logo">
        </a>
        <!-- End Logo -->
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <!-- Begin Menu -->
            <ul class="navbar-nav ml-auto">
                <?php wp_list_pages( '&title_li=' ); ?>
            </ul>
            <!-- End Menu -->
            <!-- search -->
            <?php get_search_form() ?>
        </div>
    </div>
</nav>
<!-- End Nav
================================================== -->
