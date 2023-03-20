<?php get_header(); ?>

<div id="content" class="blog-wrapper blog-single page-wrapper">
    <div class="row row-large row-divided">
        <div class="large-9 col">
            <div class="entry-content">
				<div class="row row-large row-divided">
<?php
    // Get the current page number from the URL
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    // Set up the query arguments
    $query_args = array(
        'post_type' => 'nha_dat',
        'paged' => $paged
    );

    // Create a new WP_Query object with the query arguments
    $query = new WP_Query($query_args);

    // Check if there are any posts in the query
    if ($query->have_posts()) :

        // Loop through the posts in the query
        while ($query->have_posts()) :
            $query->the_post();
		?>

            <div class="item medium-12 small-12 large-4">
                <div class="property-content mg-bottom-30">
					<div class="mh-estate_image">
						<a href="<?php the_permalink(); ?>">
							<?php echo get_the_post_thumbnail($post_id, 'thumbnail', array('class' => 'thumnail img-fluid')); ?>
						</a>
					</div>
					<div class="mh-caption__inner property-price">
						<p><?php echo do_shortcode('[acf field="gia"]'); ?> <span> <?php echo do_shortcode('[acf field="don_gia"]'); ?> </span></p>
					</div>
                    <div class="mh-estate_info">
                        <div class="mh-estate_title">
                            <h3 class="h6">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?>
								</a>
							</h3>
                        </div>
                        <div class="ml-info">
                            <div class="property-dientich">
                                <?php if (get_field('dien_tich')) : ?>
                                    <span><i class="fas fa-ruler-combined fa-fw mr-2"></i> <?php the_field('dien_tich'); ?> m²</span>
                                <?php endif; ?>
                            </div>
                            <div class="property-huong">
                                <?php if (get_field('huong_nha')) : ?>
                                    <span><i class="fas fa-compass fa-fw mr-2"></i><?php the_field('huong_nha'); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="property-mattien">
                                <?php if (get_field('mat_tien')) : ?>
                                    <span><i class="fas fa-arrows-alt-h fa-fw mr-2"></i><?php the_field('mat_tien'); ?> m</span>
                                <?php endif; ?>
                            </div>
                        </div>
						
                    </div>
					<div class="row row-collapse">
							<div class="col-12 col-sm-12 col-md-4 mb-6 info_bottm_detail">
								<a href="<?php the_permalink(); ?>">Xem chi tiết</a>
							</div>
						</div>
				</div>
			</div>

			<?php
					endwhile;
					
					// Reset the post data to the main query
					wp_reset_postdata();

					// Show pagination
					echo paginate_links(array(
						'total' => $query->max_num_pages,
						'current' => $paged
					));
			?>
				<?php else : ?>
					<!-- Show 404 error message here -->
				<?php endif; ?>
		</div>
	</div>
	</div>	
	<div class="post-sidebar large-3 col">
		<div id="secondary" class="widget-area <?php flatsome_sidebar_classes(); ?>" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar-main' ) ) : ?>
			<?php endif; // end sidebar widget area ?>
		</div>
	</div>
	</div>
</div>
		<?php get_footer(); ?>
