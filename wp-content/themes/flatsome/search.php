<?php
/**
 * The blog template file.
 *
 * @package flatsome
 */

get_header();

?>

<div id="content" class="blog-wrapper blog-archive page-wrapper">
		<?php $the_query = new WP_Query( $args ); ?>
		<?php if( $the_query->have_posts() ): ?>
		<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<p><?php the_title(); ?></p>
		<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_query(); 
		?>
		<?php get_template_part( 'template-parts/posts/layout', get_theme_mod('blog_layout','right-sidebar') ); ?>
</div>


<?php get_footer(); ?>