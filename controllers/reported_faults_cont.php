<?php 
	
	#   Date created: 18/12/2023
   #   Date modified: 18/12/2023 

	//auth
	include_once( 'user_auth.php' );

	//App Function
	include_once( 'models/Fault.php' );
	include_once( 'models/ReportFault.php' );
	include_once( 'models/Engineer.php' );

	$js_modules = [ 'reported_fault' ];

	//Creating Instances
	$faults = new Fault();
	$report_fault = new ReportFault();
	$engr = new Engineer();


	$r_fault_arr = $report_fault->getAll( [ ] );

	//Report Fault interface
	include_once( 'views/reported_faults.php' );
 ?>