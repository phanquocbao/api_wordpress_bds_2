<?php
add_action( 'rest_api_init', 'myplugin_register_thongtinlienhe_routes' );

function myplugin_register_thongtinlienhe_routes() {
    $prefix_api = "quocbao-api/v1/thongtinlienhe";

    register_rest_route($prefix_api, '/danhsach', array(
        'methods' => 'GET',
        'callback' => 'api_get_danh_sach_thong_tin_lien_he'
    ));

    register_rest_route($prefix_api, '/tao-moi', array(
        'methods' => 'POST',
        'callback' => 'api_tao_thong_tin_lien_he'
    ));

}

function api_get_danh_sach_thong_tin_lien_he($request) {
    $TABLE_THONG_TIN_LIEN_HE = 'thong_tin_lien_he';
    global $wpdb;
    $table_name = $wpdb->prefix . $TABLE_THONG_TIN_LIEN_HE;

    $results = $wpdb->get_results( "SELECT * FROM $table_name" );

    return $results;
}

function api_tao_thong_tin_lien_he($request) {
    $parameters = $request->get_params();
    $name = $parameters['name'];
    $phone = $parameters['phone'];

    $TABLE_THONG_TIN_LIEN_HE = 'thong_tin_lien_he';
    global $wpdb;
    $table_name = $wpdb->prefix . $TABLE_THONG_TIN_LIEN_HE;

    $wpdb->insert( $table_name, array( 'name' => $name, 'phone_number' => $phone ) );


    return "OK";
}

// INSERT INTO table_name (column1, column2, column3, ...)
// VALUES (value1, value2, value3, ...);