<?php
/**
 * The blog template file.
 *
 * @package flatsome
 */

get_header();
$new_query = new WP_Query( 'post_type=nha_dat' );
?>

<div id="content" class="blog-wrapper blog-single page-wrapper">
	
	<?php get_template_part( 'template-parts/posts/layout', get_theme_mod('blog_post_layout','right-sidebar') ); ?>
</div>

<?php get_footer(); ?>
