<?php

/**
 * Plugin Name: AWS X-Ray
 * Description: HM Platform plugin for sending data to AWS X-Ray
 * Author: Human Made
 * Version: 1.2.3
 */

namespace HM\Platform\XRay;

require_once __DIR__ . '/inc/namespace.php';

bootstrap();

require_once __DIR__ . '/inc/query_monitor/namespace.php';

add_filter( 'query', __NAMESPACE__ . '\\filter_mysql_query' );
add_action( 'requests-requests.before_request', __NAMESPACE__ . '\\trace_requests_request', 10, 5 );
add_filter( 'hm_platform_cloudwatch_error_handler_error', __NAMESPACE__ . '\\on_cloudwatch_error_handler_error' );
add_filter( 'hm_platform.aws_sdk.params', __NAMESPACE__ . '\\on_hm_platform_aws_sdk_params' );
add_action( 'plugins_loaded', __NAMESPACE__ . '\\Query_Monitor\\bootstrap', 9 );
