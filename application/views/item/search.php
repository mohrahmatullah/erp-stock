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
							                <h3 class="card-title">Result Search</h3>
							             </div>
										<div class="card-body">
											<table class="table table-bordered">
											  <thead>
											    <tr>
											      <th style="width: 10px">Item</th>
											      <th>Cost Center</th>
											      <th>Qty</th>
											      <th style="width: 40px">Weight</th>
											      <th style="width: 40px">Action</th>
											    </tr>
											  </thead>
											  <tbody>
											  	<?php foreach($database as $db) : ?>
											    <tr>
											      <td><?php echo $db->code; ?></td>
											      <td><?php echo $db->cc; ?></td>
											      <td><?php echo $db->qty; ?></td>
											      <td><?php echo $db->weight; ?></td>
											      <td><a href="<?php echo base_url('item/detail_item/'.$db->code.'/'.$db->cc); ?>" class="btn btn-success">Detail</a></td>
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