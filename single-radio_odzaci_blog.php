<?php get_header(); ?>

<div id="content">

<?php get_template_part('loop', 'single'); ?>

</div><!-- #content -->

<?php include(TEMPLATEPATH.'/sidebar-single-blog.php'); ?>

<?php get_footer(); ?>