<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
	<?php $this->load->view('_partials/head') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Navbar -->
		<?php $this->load->view('_partials/navbar') ?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<?php $this->load->view('_partials/sidebar_main.php') ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="card-body">
				                <div class="row">
				                  <div class="col-lg-12">
				                  	<div class="card card-info">
				                  		<div class="card-header">
							                <h3 class="card-title">Detail Item - <?php echo $code; echo " [ ".$cc." ]"; ?></h3>
							             </div>
										<div class="card-body">
											<table class="table table-bordered">
											  <thead>
											    <tr>
											      <th style="width: 10px">Create Date</th>
											      <th>Debit Qty</th>
											      <th>Debit Weight</th>
											      <th>Credit Qty</th>
											      <th>Credit Weight</th>
											      <th>Balance Qty</th>
											      <th>Balance Weight</th>
											      <th>Note</th>
											    </tr>
											  </thead>
											  <tbody>
											  	<?php 
											  		$sum_balance_qty = 0; 
											  		$sum_balance_weight = 0;
											  	?>
											    <?php foreach($database as $key => $db) : ?>
											    	<?php 
	                    								$sum_balance_qty += $db->debitqty - $db->creditqty; 
	                    								$sum_balance_weight += $db->debitweight - $db->creditweight;
	                    							?>
												    <tr>
												      <td><?php echo $db->createdate; ?></td>
												      <td><?php echo $db->debitqty; ?></td>
												      <td><?php echo $db->debitweight; ?></td>
												      <td><?php echo $db->creditqty; ?></td>
												      <td><?php echo $db->creditweight; ?></td>
												      <td><?php echo $sum_balance_qty; ?></td>
												      <td><?php echo $sum_balance_weight; ?></td>
												      <td><?php echo $db->note; ?></td>
												    </tr>
											    <?php endforeach; ?>
											  </tbody>
											</table>
										</div>
				                  	</div>
				                  </div>
				                </div>
				              </div>
						</div>
					</div>			

				</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<?php $this->load->view('_partials/footer.php') ?>

		<!-- Control Sidebar -->
		<?php $this->load->view('_partials/sidebar_control.php') ?>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<?php $this->load->view('_partials/js.php') ?>
</body>

</html>