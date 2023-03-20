<?php
/*
Template name: Page - Full Width
*/
get_header(); ?>

<?php do_action( 'flatsome_before_page' ); ?>
	
<div id="content" role="main" class="content-area">
<section class="section" id="section_540700416"><div class="bg section-bg fill bg-fill bg-loaded"></div><div class="section-content relative"><div>
	<div class="row row-small align-bottom">
		<div class="col medium-12 small-12 large-12">
		
	<form class="mh-advanced-search mh-no-margin-bottom" action="<?php echo home_url( '/' ); ?>" method="GET" role="form">
	<div class="row row-small align-bottom">
		<div class="col medium-12 small-12 large-10">
			<div class="form-group">
				<input type="search" class="search-field"
					placeholder="<?php echo esc_attr_x( 'Từ khóa…', 'placeholder' ) ?>"
					value="<?php echo get_search_query() ?>" name="s"
					title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>"
					autocomplete="off" />
			</div>
		</div>
		<div class="col medium-12 small-12 large-2">
			 <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Tìm kiếm', 'submit button' ) ?>" />
		</div>
	</div>
	<div class="row row-small align-bottom">
		<div class="col medium-12 small-6 large-2">
			<div class="form-group">
				<select name="loai_nha_dat">
				  <?php 
				  echo '<option value="all">Chọn loại nhà đất</option>';
				  $terms = get_terms( array(
					'taxonomy' => 'loai_nha_dat',
					'hide_empty' => true,
					'parent' => 0
				  ) );  
				  foreach ($terms  as $term ) {
					?>
					<option value="<?php echo $term->slug ?>"><?php echo $term->name ?></option>
					<?php 
				  }
				  ?>
				</select>
			</div>
		</div>
		<div class="col medium-12 small-6 large-2">
			<div class="form-group">
				<select name="tinh-thanh" id="tinh-thanh" class="form-control" required="required">
					<option value="">Chọn Tỉnh/Thành</option>
						<?php $args = array( 
							'hide_empty' => 0,
							'taxonomy' => 'khu_vuc',
							'parent' => 0
							); 
							$cates = get_categories( $args ); 
							foreach ( $cates as $cate ) {  ?>
								<option value="<?php echo $cate->slug; ?>"><?php echo $cate->name; ?></option>
						<?php } ?>
				</select>
			</div>
		</div>
		<div class="col medium-12 small-6 large-2">
			<div class="form-group">
				<select name="quan-huyen" id="quan-huyen" class="form-control">
					<option value="">Chọn Quận/Huyện</option>
				</select>
			</div>
		</div>
		<div class="col medium-12 small-6 large-2">
			<div class="form-group">
				<select name="xa-phuong" id="xa-phuong" class="form-control">
					<option value="">Chọn Xã/Phường</option>
				</select>
			</div>
		</div>
		<div class="col medium-12 small-6 large-2">
			<div class="form-group">
				 <select name="huong_nha">
					<?php 
					echo '<option value="all">Chọn hướng nhà</option>';
					?>
					<?php
					$huong ='';
					$field = get_field_object('huong_nha');
					$choices = $field['choices'];
					$field_key = "field_608f9e606817d";
					$field = get_field_object($field_key);
					//var_dump($field['choices']);
					if( $field )
					{
					  foreach( $field['choices'] as $k => $v )
					  {
						if (isset($_GET['huong_nha'])) {
						  if ($k == $_GET['huong_nha'])
						  {
							$huong = 'selected';
						  }
						}
						echo '<option value="' . $k . '"'.$huong.' >' . $v . '</option>';
					  }
					}      
					?>
       		   </select>
			</div>
		</div>
		<div class="col medium-12 small-6 large-2">
			<div class="form-group">
				<select name="khoang_gia">
				  <?php 
				  echo '<option value="all">Chọn khoảng giá</option>';
				  $terms = get_terms( array(
					'taxonomy' => 'khoang_gia',
					'hide_empty' => true,
					'parent' => 0
				  ) );	
				  foreach ($terms  as $term ) {
					?>
					<option value="<?php echo $term->slug ?>"><?php echo $term->name ?></option>
					<?php 
				  }
				  ?>
				</select>
			</div>
		</div>
	</div>
</form>	
	</div>
	</div></div><style>#section_540700416 {
  padding-top: 20px;
  padding-bottom: 20px;
  min-height: 220px;
}
#section_540700416 .section-bg.bg-loaded {
  background-image: url(https://batdongsan34.muatheme.com/wp-content/uploads/2019/07/bg-our-services.jpg);
}</style></section>	

		<?php while ( have_posts() ) : the_post(); ?>

			<?php the_content(); ?>
		
		<?php endwhile; // end of the loop. ?>
		
</div>

<?php do_action( 'flatsome_after_page' ); ?>

<?php get_footer(); ?>
