  <main id="main" class="main">

	<div class="pagetitle">
	  <h1>Dashboard</h1>
	  <nav>
		<ol class="breadcrumb">
		  <li class="breadcrumb-item active">Dashboard</li>
	   </ol>
	  </nav>
	</div><!-- End Page Title -->

	<section class="section dashboard" class="my-5">
	  <div class="row">

		<div class="col-md-12">
		  <div class="row">

			<?= $web_app->getCard( 'Batch Amount Approved', $bt_amount_approved, 'bi bi-bank', 'success' ) ?>
			<?= $web_app->getCard( 'Total Borrowers', $total_borrowers, 'bi bi-person', 'success' ) ?>
			<?= $web_app->getCard( 'Total Approved Loans', $total_approved_loans, 'bi bi-patch-check-fill', 'success' ) ?>
			<?= $web_app->getCard( 'Total Amount Disbursed', $total_amount_disbursed_x, 'bi bi-cash-coin', 'success' ) ?>
			<?= $web_app->getCard( 'Total Loans Paid', $total_loans_paid_x, 'bi bi-cash-coin', 'success' ) ?>
			<?= $web_app->getCard( 'Total Loans Unpaid', $total_loans_unpaid_x, 'bi bi-cash-coin', 'danger' ) ?>
			<?= $web_app->getCard( 'Total Unapproved Loans', $total_unapproved_loans, 'bi bi-x-octagon-fill', 'danger' ) ?>
			<?= $web_app->getCard( 'Outstanding Unpaid Amount', $outstanding_unpaid_amount, 'bi bi-cash-coin', 'danger' ) ?>

		  </div>
		</div>

	  </div>
	</section>
  </main><!-- End #main -->