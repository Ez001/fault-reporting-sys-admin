<?php 
   #   Date created: 17/08/2022 
   #   Date modified: 09/06/2023  
   ob_start();
   
   if ( session_status() == PHP_SESSION_NONE )
   {
      session_start();    
   }       
   
   //App functions
   include_once( 'config.php' );
   include_once( 'models/WebApp.php' );
   include_once( 'models/Batch.php' );

   //Creating App instances
   $web_app = new WebApp();
   $batch = new Batch();

   $batch_dt = $batch->getByIsActive( [ 1 ] );
   $bt_no = $batch_dt['bt_no'];
   $bt_label = $batch_dt['bt_label'];
   $bt_amount_approved = $batch_dt['amount_approved'] ?? 0.0;
   
   $bt_limit = $batch->getMaxBtNo( [ ] );

   $batch_top = $_SESSION[ 'batch_top' ] ?? $bt_no;
   $batch_top_label = $_SESSION[ 'batch_top_label' ] ?? $bt_label;

   //page name logic
   $uri_arr = explode( '/', $uri );
   $uri_len =  count( $uri_arr );
   $page_starts = $uri_len - 1;
   $page = $uri_arr[ $page_starts ];

   $page_arr = explode( '?', $uri_arr[ $page_starts ] );
   $page = $page_arr[0];
   $page = $web_app->fixUrl( $page );

   //$server_name_1 = $server_name . '?tab=';

   //disable header
   $header_blacklist_arr = [ 'login' ];

   //get url path
   /*$tab = isset( $_GET['tab'] ) ? $_GET['tab']  : '';
   $tab = $web_app->fixUrl();*/

   //setting login as default
   if ( !$page ) 
   {
      $page = 'login';
   }
   
   include_once( 'views/header.php' );

   $page_x = $page . '_cont.php';
   $file = "$cur_dir/controllers/$page_x";

   //checking and including file
   if ( is_file( $file ) ) 
   {
      include_once( $file );
   }
   else
   {
      header( "Location: $server_name", true, 301 );
      exit();
   }

   include_once( 'views/footer.php' );
   
   ob_end_flush();
