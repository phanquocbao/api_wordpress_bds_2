<?php
//  api
add_action( 'rest_api_init', 'myplugin_register_routes' );

function myplugin_register_routes() {
    $prefix_api = "quocbao-api/v1";
    register_rest_route(
        $prefix_api, // endpoint namespace
        '/ping', // endpoint route
        array(
            'methods' => 'GET', // HTTP methods
            'callback' => 'api_get_ping', // callback function
        )
    );

    register_rest_route(
        $prefix_api, // endpoint namespace
        '/data/(?P<id>\d+)', // endpoint route
        array(
            'methods' => 'GET', // HTTP methods
            'callback' => 'api_get_data', // callback function
        )
    );

   
    register_rest_route(
        $prefix_api, // endpoint namespace
        '/ping', // endpoint route
        array(
            'methods' => 'GET', // HTTP methods
            'callback' => 'api_get_ping', // callback function
        )
    );
}

function api_get_data( $request ) {
    $data_id = $request['id'];
	// var_dump($request);
    // Do something with the data ID
    return array( 'data' => $data_id );
}

function api_get_ping() {
    return "pong";
}



