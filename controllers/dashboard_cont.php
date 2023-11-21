<?php 
	
	#   Date created: 25/04/2023
   #   Date modified: 21/10/2023 

	//auth
	include_once( 'admin_auth.php' );

	//App Functions
	include_once( 'models/Borrower.php' );
	include_once( 'models/Loan.php' );
	include_once( 'models/Batch.php' );
	include_once( 'models/LoanRepayment.php' );
	include_once( 'models/Disbursement.php' );

	//Creating instances;
	$borrower = new Borrower();
	$loan = new Loan();
	$bat = new Batch();
	$repay = new LoanRepayment();
	$disburse = new Disbursement();

	$js_modules = [ 'dashboard' ];

	$bt_top_arr = $bat->getByBatchAndBatchLabel( [ $batch_top, $batch_top_label ] );
	$bt_amount_approved = $bt_top_arr[ 'amount_approved' ] ?? 0.0;
	$bt_amount_approved = 'N' . number_format( $bt_amount_approved, 2 );

	$total_borrowers = $borrower->getCount( [ $batch_top, $batch_top_label ] );
	$total_approved_loans = $loan->getCountByStatus( [ 'Approved', $batch_top, $batch_top_label ] );

	$total_loans_paid = $repay->getTotalAmountPaidByBatch( [ $batch_top, $batch_top_label ], " status != 'Pending' " );
	$total_loans_paid_x = 'N' . number_format( $total_loans_paid, 2 );
	$total_loans_unpaid = $loan->getCountByPaymentStatus( [ 'Unpaid', $batch_top, $batch_top_label ] );

	$total_amount_disbursed = $disburse->getAmountByBatch( [ $batch_top, $batch_top_label ] );
	$total_amount_disbursed_x = 'N' . number_format( $total_amount_disbursed, 2 );
	$loan_amount_approved =  $loan->getAmountByStatusAndPaymentStatus( [ 'Approved', 'Paid', $batch_top, $batch_top_label ] );
	$outstanding_unpaid_amount = $loan_amount_approved - $total_amount_disbursed;
	$outstanding_unpaid_amount = 'N' . number_format( $outstanding_unpaid_amount, 2 );
	$total_unapproved_loans = $loan->getUnapprovedCountByStatus( [ 'Approved', $batch_top, $batch_top_label ] );

	$total_loans_unpaid = $total_amount_disbursed - $total_loans_paid;
	$total_loans_unpaid_x = 'N' . number_format( $total_loans_unpaid, 2 );


	//Dashboard interface
	include_once( 'views/dashboard.php' );
 ?>