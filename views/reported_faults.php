<main id="main" class="main">

   <div class="pagetitle">
      <h1 class="">Reported Faults</h1>
      <div class="d-md-flex justify-content-between">
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
               <li class="breadcrumb-item">Reported Faults</li>
            </ol>
         </nav>
      </div>
   </div><!-- End Page Title -->

   <section class="section">
      
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <div class="text-end mb-2 mt-2">
                  </div>
                  <?php
                     echo $web_app->showAlert( $msg, true );
                     if ( $r_fault_arr ) 
                     {
                  ?>
                  <div class="mt-2">
                     <?php
                        echo "<table class='table table-responsive table-striped' id='my_datatable' style='width: 100%'>
                        <thead>
                           <tr>
                              <th>S/N</th>
                              <th>Reported By</th>
                              <th>Fault</th>
                              <th>Description</th>
                              <th>Engineer</th>
                              <th>Status</th>
                              <th>Review Status</th>
                              <th>Feed Back</th>
                           </tr>
                        </thead>
                        <tfoot>
                           <tr>
                              <th>S/N</th>
                              <th>Reported By</th>
                              <th>Fault</th>
                              <th>Description</th>
                              <th>Engineer</th>
                              <th>Status</th>
                              <th>Review Status</th>
                              <th>Feed Back</th>
                           </tr>
                        </tfoot>
                        <tbody>";

                        $sn = 0;
                        $tr_content = '';

                        //looping through records
                        foreach ( $r_fault_arr as $r_fault_data ) 
                        {
                           $id = $r_fault_data[ 'id' ];
                           $full_name = $web_app->fullName( $r_fault_data );
                           $fault_id = $r_fault_data[ 'fault_id' ];
                           $fault = $faults->getById( [ $fault_id ] );
                           $description = $r_fault_data[ 'description' ];
                           $engineer_id = $r_fault_data[ 'engineer_id' ];
                           $engineer_dt = $engr->getById( [ $engineer_id ] );
                           $engineer = $web_app->fullName( $engineer_dt );
                           $status = $r_fault_data[ 'status' ];
                           $feed_back = $r_fault_data[ 'feed_back' ];
                           $btn_state = $status == 'Completed' ? 'd-none' : '';
                           $status_x = $web_app->showStatusType( $status );
                           $review_status = $r_fault_data[ 'review_status' ];
                           $review_status = $web_app->showReviewStatusType( $review_status );


                           $sn++;
                           
                           $tr_content .=  "<tr>
                              <td class='fw-light'> $sn </td>
                              <td class='fw-light'> $full_name </td>
                              <td class='fw-light'> $fault </td>
                              <td class='fw-light'> $description </td>                              
                              <td class='fw-light'> $engineer </td>                              
                              <td class='fw-light'> $status_x </td>
                              <td class='fw-light'> $review_status </td>
                              <td class='fw-light'> $feed_back </td>
                           </tr>";
                        }

                        echo $tr_content .= '</tbody></table>';
                  
                     ?>
                  </div>
                  <?php
                     }
                  ?>
               </div>
            </div>
         </div>
      </div>
      
   </section>  
</main><!-- End #main -->