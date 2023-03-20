<?php
add_action( 'rest_api_init', 'myplugin_register_batdongsan_routes' );


function myplugin_register_batdongsan_routes() {
    $prefix_api = "quocbao-api/v1/bds";

    register_rest_route($prefix_api, '/nhadat', array(
        'methods' => 'GET',
        'callback' => 'api_get_danh_sach_bds'
    ));

    register_rest_route($prefix_api, '/menu', array(
        'methods' => 'GET',
        'callback' => 'api_get_menu'
    ));

    register_rest_route( $prefix_api, '/nhadat/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'api_get_detail_bds',
    ) );

    register_rest_route( $prefix_api, '/nhadat/(?P<id>\d+)/categories', array(
        'methods' => 'GET',
        'callback' => 'api_get_nhadat_categories',
    ) );

}

function api_get_nhadat_categories( $request ) {
    $id = $request->get_param( 'id' );

    $categories = wp_get_post_categories( $id, array(
        'fields' => 'all',
    ) );

    $result = array();
    foreach ( $categories as $category ) {
        $result[] = array(
            'id' => $category->term_id,
            'name' => $category->name,
            'slug' => $category->slug,
            'description' => $category->description,
        );
    }

    return $result;
}

function api_get_detail_bds( $request ) {
    $post_id = $request['id'];
    $post = get_post( $post_id );
    $post_thumbnail = get_the_post_thumbnail_url( $post_id );
    $post_content = apply_filters( 'the_content', $post->post_content );
    $categories = get_the_category($post->ID);


    $response = array(
        'id' => $post_id,
        'title' => $post->post_title,
        'content' => $post_content,
        'thumbnail' => $post_thumbnail,
        'categories' => $categories,
    );

    $post_thongso_nha = array(
        "so_phong_ngu" =>get_post_meta($post_id, 'so_phong_ngu', true),
        "gia" =>get_post_meta($post_id, 'gia', true),
        "dongiane" =>get_post_meta($post_id, 'don_gia', true),
        "dientich" =>get_post_meta($post_id, 'dien_tich', true),
        "diachi" =>get_post_meta($post_id, 'dia_chi', true),
        "huongnha" =>get_post_meta($post_id, 'huong_nha', true),
        "mattien" =>get_post_meta($post_id, 'mat_tien', true),
        "logioi" =>get_post_meta($post_id, 'lo_gioi', true),
        "sotang" =>get_post_meta($post_id, 'so_tang', true),
        "sophongngu" =>get_post_meta($post_id, 'so_phong_ngu', true),
        "sotoilet" =>get_post_meta($post_id, 'so_toilet', true),
        "map" =>get_post_meta($post_id, 'map', true),
        "linkyoutube" =>get_post_meta($post_id, 'link_video', true),
    );
    $response['thongso'] = $post_thongso_nha;
 

    return new WP_REST_Response( $response, 200 );
}

function api_get_menu($request){
    $menu_name = $request->get_param('menu_name');
    // $menu_name = 'Main';
    $menu_obj = wp_get_nav_menu_object($menu_name);
    $menu_items = wp_get_nav_menu_items($menu_obj->term_id);
    
    return $menu_items;

}

function api_get_danh_sach_bds($request) {
    $args = array(
        'post_type' => 'nha_dat',
        'posts_per_page' => $request->get_param('per_page') ?: 10, // Lấy số lượng bài viết tối đa cho mỗi trang. Mặc định là 10.
        'paged' => $request->get_param('page') ?: 1, // Lấy trang hiện tại. Mặc định là trang đầu tiên.
        'category_name' => $request->get_param('category'), // Lấy bài viết của một danh mục cụ thể.
        'tag' => $request->get_param('tag'), // Lấy bài viết có thẻ cụ thể.
        's' => $request->get_param('search') // Lấy bài viết theo từ khóa tìm kiếm.
    );

    $query = new WP_Query($args);

    $posts = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $post_item = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'content' => get_the_content(),
                'excerpt' => get_the_excerpt(),
                'permalink' => get_the_permalink(),
                'thumbnail' => get_the_post_thumbnail_url(),
                'date' => get_the_date()
            );
            $post_thongso_nha = array(
                "so_phong_ngu" =>get_post_meta($post_item['id'], 'so_phong_ngu', true),
                "gia" =>get_post_meta($post_item['id'], 'gia', true),
                "dongiane" =>get_post_meta($post_item['id'], 'don_gia', true),
                "dientich" =>get_post_meta($post_item['id'], 'dien_tich', true),
                "diachi" =>get_post_meta($post_item['id'], 'dia_chi', true),
                "huongnha" =>get_post_meta($post_item['id'], 'huong_nha', true),
                "mattien" =>get_post_meta($post_item['id'], 'mat_tien', true),
                "logioi" =>get_post_meta($post_item['id'], 'lo_gioi', true),
                "sotang" =>get_post_meta($post_item['id'], 'so_tang', true),
                "sophongngu" =>get_post_meta($post_item['id'], 'so_phong_ngu', true),
                "sotoilet" =>get_post_meta($post_item['id'], 'so_toilet', true),
                "map" =>get_post_meta($post_item['id'], 'map', true),
                "linkyoutube" =>get_post_meta($post_item['id'], 'link_video', true),
            );
         
            $post_item['thongso'] = $post_thongso_nha;
            array_push($posts, $post_item);
        }
    }

    wp_reset_postdata();

    return $posts;
}
