<?php
/*
Template Name: Blog
*/

get_header(); ?>

<div id="content">
    <div class="archive">

        <div class="title"><?php _e('Poslednji postovi', 'unspoken'); ?><a href="javascript: void(0);" id="mode" class="<?php if ($_COOKIE['mode'] == 'grid') echo 'flip'; ?>"></a></div>

        <?php
            $paged = ( !empty($paged) ) ? $paged : $page;
            query_posts(array(
                
                'paged' => $paged,
				'category_name' => 'vesti-citalaca',
            ));
        ?>
        
        <?php get_template_part('loop','blog'); ?>

        <?php get_template_part('pagination'); ?>

        <?php  wp_reset_query(); ?>

    </div> <!-- .archive -->
</div> <!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
