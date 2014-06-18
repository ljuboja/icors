<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="hentry-meta">
        <h1><?php the_title(); ?></h1>
    </div>

<?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>


    <div class="hentry-content clear">
        <?php the_content(); ?>
    </div>

    <?php comments_template(); ?>

</div> <!-- .page -->

<?php endwhile; // end of the loop. ?>
