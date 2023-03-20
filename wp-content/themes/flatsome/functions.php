<?php
/**
 * Flatsome functions and definitions
 *
 * @package flatsome
 */

require get_template_directory() . '/inc/init.php';

/**
 * Note: It's not recommended to add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * Learn more here: http://codex.wordpress.org/Child_Themes
 */



// Hàm Xử lý phần backend search cha con
add_action('wp_ajax_showChild', 'showCateFunc');
add_action('wp_ajax_nopriv_showChild', 'showCateFunc');
function showCateFunc() {
	if(isset($_POST['slug']) && $_POST['slug']){
		$slug = $_POST['slug'];
		$parent = get_term_by('slug', $slug, 'khu_vuc');
		$args = array( 
		    'hide_empty' => 0,
		    'taxonomy' => 'khu_vuc',
		    'parent' => $parent->term_id
		    ); 
		    $cates = get_categories( $args );
		    echo '<option value="">Chọn Quận/Huyện</option>';
		    foreach ( $cates as $cate ) {  ?>
				<option value="<?php echo $cate->slug; ?>"><?php echo $cate->name; ?></option>
		<?php }
	} else {
		echo '<option value="">Chọn Quận/Huyện</option>';
	}
	die();
}
// Hàm Xử lý phần backend search cha con
add_action('wp_ajax_showphuongxa', 'showCateFuncphuongxa');
add_action('wp_ajax_nopriv_showphuongxa', 'showCateFuncphuongxa');
function showCateFuncphuongxa() {
	if(isset($_POST['slug']) && $_POST['slug']){
		$slug = $_POST['slug'];
		$parent = get_term_by('slug', $slug, 'khu_vuc');
		$args = array( 
		    'hide_empty' => 0,
		    'taxonomy' => 'khu_vuc',
		    'parent' => $parent->term_id
		    ); 
		    $cates = get_categories( $args );
		    echo '<option value="">Chọn Phường/Xã</option>';
		    foreach ( $cates as $cate ) {  ?>
				<option value="<?php echo $cate->slug; ?>"><?php echo $cate->name; ?></option>
		<?php }
	} else {
		echo '<option value="">Chọn Phường/Xã</option>';
	}
	die();
}



//

add_action( 'pre_get_posts', 'add_my_post_types_to_query' );
  
function add_my_post_types_to_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'nha_dat' ) );
    return $query;
}

// import quoc bao plugin
require_once("quocbao/root.php");


