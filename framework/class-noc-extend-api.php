<?php

class NocExtendApi {
  function __construct() {
    add_action( 'rest_api_init', array( __CLASS__, 'register_yoast_seo_meta' ) );
  }

  function add_role_field() {
    add_action( 'rest_api_init', function () {
      register_rest_field( 'users', 'role', array(
          'get_callback' => function( $comment_arr ) {
              die( $comment_arr );
              //$comment_obj = get_comment( $comment_arr['id'] );
              //return (int) $comment_obj->comment_karma;
          },
          'update_callback' => function( $karma, $comment_obj ) {
              // $ret = wp_update_comment( array(
              //     'comment_ID'    => $comment_obj->comment_ID,
              //     'comment_karma' => $karma
              // ) );
              // if ( false === $ret ) {
              //     return new WP_Error(
              //       'rest_comment_karma_failed',
              //       __( 'Failed to update comment karma.' ),
              //       array( 'status' => 500 )
              //     );
              // }
              return true;
          },
          'schema' => array(
              'description' => __( 'User Role.' ),
              'type'        => 'string'
          ),
      ) );
  } );
  }

  function register_yoast_seo_meta() {
    register_rest_field( 'post',
        '_yoast_wpseo_title',
        array(
            'get_callback'    => 'get_seo_meta_field',
            'update_callback' => null,
            'schema'          => null,
        )
    );
    register_rest_field( 'post',
        '_yoast_wpseo_metadesc',
        array(
            'get_callback'    => 'get_seo_meta_field',
            'update_callback' => null,
            'schema'          => null,
        )
    );
  }
  function get_seo_meta_field( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
  }
}

new NocExtendApi();