<?php

/************************************************

    analytics

*************************************************/ 

function diver_initializeAnalytics($num,$pagePath,$span) {


  $VIEW_ID = get_option( 'diver_analytics_api_viewID');
  $keyfile = get_option('diver_analytics_api_key_url');

  if($VIEW_ID && isset($keyfile['file']) && file_exists($keyfile['file'])){
    require_once dirname(__FILE__) . '/../assets/google-api-php-client/vendor/autoload.php';

    $KEY_FILE_LOCATION = $keyfile['file'];

    try{
      $client = new Google_Client();
      $client->setApplicationName( " Diver Analytics Reporting" );
      $client->setAuthConfig($KEY_FILE_LOCATION);
      $client->setScopes(array('https://www.googleapis.com/auth/analytics.readonly'));
      $analytics = new Google_Service_AnalyticsReporting( $client );

      $dateRange = new Google_Service_AnalyticsReporting_DateRange();

      $rangeArr = diver_span_dateRange($span);

      $dateRange->setStartDate($rangeArr[0]);
      $dateRange->setEndDate($rangeArr[1]);

      $sessions = new Google_Service_AnalyticsReporting_Metric();
      $sessions->setExpression( "ga:pageviews" );
      $sessions->setAlias( "pageviews" );

      $dimention = new Google_Service_AnalyticsReporting_Dimension();
      $dimention->setName( 'ga:pagePath' );

      $filter = new Google_Service_AnalyticsReporting_DimensionFilter();
      $filters = new Google_Service_AnalyticsReporting_DimensionFilterClause();

      if($pagePath){
          $filter->setDimensionName( 'ga:pagePath' );

          $filter->setOperator( 'REGEXP' );
          $filter->setExpressions(array('^.*'.$pagePath.'.*'));

          $filters->setFilters(array($filter));
      }

      $orderby = new Google_Service_AnalyticsReporting_OrderBy();
      $orderby->setFieldName( "ga:pageviews" );
      $orderby->setOrderType( "VALUE" );
      $orderby->setSortOrder( "DESCENDING" );

      $request = new Google_Service_AnalyticsReporting_ReportRequest();
      $request->setViewId( $VIEW_ID );
      $request->setDateRanges( $dateRange );
      $request->setMetrics( array( $sessions ) );
      $request->setDimensions( array( $dimention ) );
      $request->setDimensionFilterClauses( $filters );
      $request->setOrderBys( $orderby );
      $request->setPageSize($num + 100);

      $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
      $body->setReportRequests( array( $request) );

      return $analytics->reports->batchGet( $body );
    }catch (Exception $e) {
        return false;
    }
  }else{
    return false;
  }

}


function diver_posts_views_ranking($num = 12,$pagePath = "",$span = "month") {

  date_default_timezone_set('Asia/Tokyo');

  // 最終取得時間を取得
  $updateTime = get_option('diver_analytics_'.$span.'_time');

  $today = date('Y-m-d');

  if($span == "month"){
    $today = date('Y-m-d', strtotime('-1 month'));
  }else if($span == "week"){
    $today = date('Y-m-d', strtotime('-7 day'));
  }else if($span == "day"||$span == "all"){
    $today = date('Y-m-d', strtotime('-1 day'));
  }

  $save_value = get_option('diver_analytics_'.$span.'_date');

  if (!$updateTime || $updateTime < $today) {

    $result = diver_initializeAnalytics($num,$pagePath,$span);

    if($result){
      $result = $result[0];
      $rows = $result->getData()->getRows();
      $count = 0;

      $postArr = array();

      for ( $rowIndex = 0; $rowIndex < count( $rows ); $rowIndex++ ) {

        $row = $rows[ $rowIndex ];
        $dimensions = $row->getDimensions();

          $uri = $dimensions[0];

          $postid = url_to_postid($uri);

          if($postid){
            $metrics = $row->getMetrics();
            $views = $metrics[0]->getValues();
            $views = $views[0];

            $post = get_post($postid);

            if($post->post_type == 'post' && $post->post_status == 'publish'){
              $sum = 0;
              if(isset($postArr[$postid])){
                $sum = $postArr[$postid];
              }

              $postArr[$postid] = (int)$views + (int)$sum;

              $count++;
            }
            if($count >= 50){break;}
          }
      }
      arsort($postArr);
      update_option('diver_analytics_'.$span.'_date', $postArr);

      $rangeArr = diver_span_dateRange($span);
      update_option('diver_analytics_'.$span.'_time', $rangeArr[1]);
    }else{
      return false;
    }

  }else{
    $postArr = get_option('diver_analytics_'.$span.'_date');
  }
  return $postArr;
}


function diver_single_posts_views($post_id,$span = "all") {

  $base = esc_url(home_url());
  $post_url  = get_permalink($post_id,false);

  $url = str_replace($base, '', $post_url);

  // 最終取得時間を取得
  $updateTime = get_post_meta($post_id,'diver_analytics_'.$span.'_views',true);

  $today = date('Y-m-d');

  if($span == "month"){
    $today = date('Y-m-d', strtotime('-1 month'));
  }else if($span == "week"){
    $today = date('Y-m-d', strtotime('-7 day'));
  }else if($span == "day"||$span == "all"){
    $today = date('Y-m-d', strtotime('-1 day'));
  }

  $views = 0;

  if (!$updateTime || $updateTime > $today) {

    $result = diver_initializeAnalytics(1,$url,$span);

    if($result){
      $result = $result[0];
      $rows = $result->getData()->getRows();
      if($rows){
        $row = $rows[0];
        $metrics = $row->getMetrics();
        $views = $metrics[0]->getValues();
        $views = $views[0];

        update_post_meta($post_id,'diver_analytics_'.$span.'_views',$views);

        $rangeArr = diver_span_dateRange($span);
        update_post_meta($post_id,'diver_analytics_'.$span.'_time',$rangeArr[1]);
      }
    }else{
      return false;
    }

  }else{
    $views = get_post_meta($post_id,'diver_analytics_'.$span.'_views',true);
  }
  return $views;
}


function diver_span_dateRange($span){

  $dateRange = array();

  if($span == "month"){
    $dateRange[0] = date('Y-m-d', strtotime('first day of previous month'));
    $dateRange[1] = date('Y-m-d', strtotime('last day of previous month'));
  }else if($span == "week"){
    $dateRange[0] = date('Y-m-d', strtotime('Monday previous week'));
    $dateRange[1] = date('Y-m-d', strtotime('Sunday previous week'));
  }else if($span == "day"){
    $dateRange[0] = date('Y-m-d', strtotime('-1 day'));
    $dateRange[1] = date('Y-m-d', strtotime('-1 day'));
  }else if($span == "all"){
    $dateRange[0] = date('Y-m-d', strtotime('-1 year'));
    $dateRange[1] = date('Y-m-d', strtotime('-1 day'));
  }

  return $dateRange;
}