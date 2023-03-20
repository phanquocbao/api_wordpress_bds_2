<?php
/**
 * The blog template file.
 *
 * @package flatsome
 */

get_header();
$new_query = new WP_Query('post_type=nha_dat');
?>
<div id="content" class="blog-wrapper blog-single page-wrapper">
    <div class="row row-large row-divided ">
        <div class="large-9 ">
            <div class="entry-content single-page border">
                <?php
                // Where you want the slider add the shortcode [lightslider_looper]
                $new_query = new WP_Query('post_type=nha_dat');
                add_shortcode('lightslider_looper', 'tl_light_looper');

                function tl_light_looper()
                {

                    // ACF Custom Fields
                    // tl_slide_images = Gallery Field

                    $images = get_field('gallery'); //add your correct field name

                    ob_start();

                    if ($images) :
                ?>
                        <div class="demo">
                            <ul id="imageGallery">
                                <?php foreach ($images as $image) : ?>
                                    <li data-thumb="<?php echo $image['url']; ?>">
                                        <a href="<?php echo $image['url']; ?>">
                                            <img class="img-fluid" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                <?php endif;

                    return ob_get_clean();
                }
                ?>

                <?php
                if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                }
                ?>
                <div class="mh-wrapper-re">
                    <h1 class="title-re"><?php single_post_title(); ?></h1>
                </div>
				<div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-img" role="tabpanel" aria-labelledby="pills-img-tab">
                        <?php echo do_shortcode('[lightslider_looper]'); ?>
                    </div>
						<?php if( get_field('map') ): ?>
							<div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
							<?php the_field('map'); ?>
							</div>
						<?php endif; ?>
						<?php if( get_field('link_video') ): ?>
							<div class="tab-pane fade" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
								<?php the_field('link_video'); ?>
							</div>
						<?php endif; ?>
                </div>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-img-tab" data-toggle="pill" href="#pills-img" role="tab" aria-controls="pills-img" aria-selected="true">HÌNH ẢNH</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-map-tab" data-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map" aria-selected="false">BẢN ĐỒ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab" aria-controls="pills-video" aria-selected="false">VIDEO</a>
                    </li>
                </ul>
				
		<div class="" style="background-color: #E5F9E7; display:flex;  align-items: center; justify-content: space-between;">
	            <a style="display:inline-block; padding: 8px" class="d-inline-block p-2" href="https://raovatbds.webdaitin.com/ban-nha-rieng/tai/ho-chi-minh">Bán nhà riêng tại Hồ Chí Minh</a>
				<div class="ml-auto re-price "> 
					Giá: <strong><?php the_field('gia'); ?></strong> <?php the_field('don_gia'); ?>
				</div>
	        </div>		
	<div class="row row-collapse row-solid mh-table-re">
				<div class="col medium-6 small-12 large-3">
					<div class="col-inner"> <?php if( get_field('dien_tich') ): ?>
							<span><i class="fas fa-ruler-combined fa-fw mr-2"></i> Diện tích : <?php the_field('dien_tich'); ?> m²</span>
					<?php endif; ?>	
					</div>
					
				</div>	
				<div class="col medium-6 small-12 large-3">
				<div class="col-inner">
				<?php if( get_field('huong_nha') ): ?>
						<span><i class="fas fa-compass fa-fw mr-2"></i> Hướng : <?php the_field('huong_nha'); ?></span>
					<?php endif; ?>	
				</div>
				</div>		
				<div class="col medium-6 small-12 large-3">
				<div class="col-inner">
				<?php if( get_field('mat_tien') ): ?>
						<span><i class="fas fa-arrows-alt-h fa-fw mr-2"></i> Mặt tiền : <?php the_field('mat_tien'); ?></span>
					<?php endif; ?>	
				</div>
				</div>	
				<div class="col medium-6 small-12 large-3">
				<div class="col-inner">
				<?php if( get_field('lo_gioi') ): ?>
						<span><i class="fas fa-exchange-alt fa-fw mr-2"></i> Lộ giới : <?php the_field('lo_gioi'); ?></span>
					<?php endif; ?>	
				</div>
				</div>	
				<div class="col medium-6 small-12 large-3">
				<div class="col-inner">
				<?php if( get_field('so_tang') ): ?>
						<span><i class="fas fa-layer-group fa-fw mr-2"></i> Số tầng : <?php the_field('so_tang'); ?></span>
					<?php endif; ?>	
				</div>
				</div>	
				<div class="col medium-6 small-12 large-3">
				<div class="col-inner">
				<?php if( get_field('so_phong_ngu') ): ?>
						<span><i class="fas fa-bed fa-fw mr-2"></i> Số phòng ngủ : <?php the_field('so_phong_ngu'); ?></span>
					<?php endif; ?>	
				</div>
				</div>	
				<div class="col medium-6 small-12 large-3">
					<div class="col-inner">
						<?php if( get_field('so_toilet') ): ?>
								<span><i class="fas fa-toilet fa-fw mr-2"></i> Số toilet : <?php the_field('so_toilet'); ?></span>
							<?php endif; ?>	
					</div>
				</div>	
				<div class="col medium-6 small-12 large-3">
					<div class="col-inner">
							<span><i class="fas fa-clock fa-fw mr-2"></i> <?php the_time('d/m/Y'); ?></span>
					</div>
				</div>	
				
	</div>		
	<div class="address-re">
			<?php if( get_field('dia_chi') ): ?>
					<span><i class="fas fa-map-marker-alt mr-2"></i> Địa chỉ : <?php the_field('dia_chi'); ?></span>
				<?php endif; ?>	
	</div>	
	

			
	<div class="row">
		<div class="col medium-12 small-12 large-12">
				<h2>
					Thông tin
				</h2>
		</div>
		<div class="col medium-12 small-12 large-12">
			<?php the_content(); ?>
		</div>
	</div>
	
	
	<?php
	wp_link_pages();
	?>

	<?php if ( get_theme_mod( 'blog_share', 1 ) ) {
		// SHARE ICONS
		echo '<div class="blog-share text-center">';
		echo '<div class="is-divider medium"></div>';
		echo do_shortcode( '[share]' );
		echo '</div>';
	} ?>
	<div class="details__meta mb-3">
							<span><strong>Chia sẻ tin này: </strong></span> <a class="item_fb btn_facebook" data-js="facebook-share" rel="nofollow" href="javascript:;" data-url="https://raovatbds.webdaitin.com/nha-dat/1-can-ra-mt-hoang-sa-p11-q3-hem-ba-gac-1-truc-thang-dep-thong-28m2-3-ty-65tl/" title="Chia sẻ bài viết lên facebook">
								<i class="fab fa-facebook-square"></i>
							</a>
	                        <a class="item_twit btn_twitter" rel="nofollow" href="javascript:;" data-js="twitter-share" data-url="https://raovatbds.webdaitin.com/nha-dat/1-can-ra-mt-hoang-sa-p11-q3-hem-ba-gac-1-truc-thang-dep-thong-28m2-3-ty-65tl/" title="Chia sẻ bài viết lên twitter">
								<i class="fab fa-twitter-square"></i>
							</a>
							</div>
</div>

<?php if ( get_theme_mod( 'blog_single_footer_meta', 1 ) ) : ?>
	<footer class="entry-meta text-<?php echo get_theme_mod( 'blog_posts_title_align', 'center' ); ?>">
		<?php
		/* translators: used between list items, there is a space after the comma */
		$category_list = get_the_category_list( __( ', ', 'flatsome' ) );

		/* translators: used between list items, there is a space after the comma */
		$tag_list = get_the_tag_list( '', __( ', ', 'flatsome' ) );


		// But this blog has loads of categories so we should probably display them here.
		if ( '' != $tag_list ) {
			$meta_text = __( 'This entry was posted in %1$s and tagged %2$s.', 'flatsome' );
		} else {
			$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'flatsome' );
		}

		printf( $meta_text, $category_list, $tag_list, get_permalink(), the_title_attribute( 'echo=0' ) );
		?>
	</footer>
<?php endif; ?>


<?php if ( get_theme_mod( 'blog_single_next_prev_nav', 1 ) ) :
	flatsome_content_nav( 'nav-below' );
endif; ?>
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