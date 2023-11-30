<main id="main" class="main">

   <div class="pagetitle">
      <h1 class="">Users</h1>
      <div class="d-md-flex justify-content-between">
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
               <li class="breadcrumb-item">Users</li>
            </ol>
         </nav>
      </div>
   </div><!-- End Page Title -->

   <section class="section">
      
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">

                  <?php
                     echo $web_app->showAlert( $msg, true );
      
                     if ( $user_arr ) 
                     {
                  ?>
                  <div class="mt-2">
                     <?php
                        echo "<table class='table table-responsive table-striped' id='my_datatable' style='width: 100%'>
                        <thead>
                           <tr>
                              <th>S/N</th>
                              <th>Full Name</th>
                              <th>Email</th>
                           </tr>
                        </thead>
                        <tfoot>
                           <tr>
                              <th>S/N</th>
                              <th>Full Name</th>
                              <th>Email</th>
                           </tr>
                        </tfoot>
                        <tbody>";

                        $sn = 0;
                        $tr_content = '';

                        //looping through records
                        foreach ( $user_arr as $user_data ) 
                        {
                           $id = $user_data[ 'id' ];
                           $full_name = $web_app->fullName( $user_data );
                           $email = $user_data[ 'email' ];

                           $sn++;
                           
                           $tr_content .=  "<tr>
                              <td class='fw-light'> $sn </td>
                              <td class='fw-light'> $full_name </td>
                              <td class='fw-light'> $email </td>
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