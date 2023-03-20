<?php

function shortcut_bds_block() {
    $args = array(
        'post_type' => 'nha_dat',
        'posts_per_page'=> 10, // Lấy số lượng bài viết tối đa cho mỗi trang. Mặc định là 10.
        'paged' => 1, // Lấy trang hiện tại. Mặc định là trang đầu tiên.
        // 'category_name' => $request->get_param('category'), // Lấy bài viết của một danh mục cụ thể.
        // 'tag' => $request->get_param('tag'), // Lấy bài viết có thẻ cụ thể.
        // 's' => $request->get_param('search') // Lấy bài viết theo từ khóa tìm kiếm.
    );

    $query = new WP_Query($args);

    $posts = array();

    $html = '<div>';

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $html = $html . '<h1>'. get_the_title() . '</h1>';

            // $post_item = array(
            //     'id' => get_the_ID(),
            //     'title' => get_the_title(),
            //     'content' => get_the_content(),
            //     'excerpt' => get_the_excerpt(),
            //     'permalink' => get_the_permalink(),
            //     'thumbnail' => get_the_post_thumbnail_url(),
            //     'date' => get_the_date()
            // );
            // $post_thongso_nha = array(
            //     "so_phong_ngu" =>get_post_meta($post_item['id'], 'so_phong_ngu', true),
            //     "gia" =>get_post_meta($post_item['id'], 'gia', true),
            //     "dongiane" =>get_post_meta($post_item['id'], 'don_gia', true),
            // );
         
            // $post_item['thongso'] = $post_thongso_nha;

            // array_push($posts, $post_item);
        }
    }
    $html = $html . '</div>';

    wp_reset_postdata();

    return $html;
 }
 add_shortcode( 'bds_block', 'shortcut_bds_block' );
 