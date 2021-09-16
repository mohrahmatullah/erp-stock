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
						<div class="col-lg-7">
							<form class="card card-info" action="<?php echo base_url('item/search'); ?>" enctype="multipart/form-data">
				              <div class="card-header">
				                <h3 class="card-title">Form Search</h3>
				              </div>
				              <div class="card-body">
				                <div class="row">
				                  <div class="col-3">
				                    Cost Center
				                  </div>
				                  <div class="col-7">
									<select class="custom-select rounded-0" id="exampleSelectRounded0" name="search" method="get">
										<option value="">Select Cost center</option>
										<?php foreach($database as $db) : ?>  
											<option value="<?php echo $db->code; ?>"><?php echo $db->code; ?></option>
								        <?php endforeach; ?>
									</select>
				                  </div>
				                  <div class="col-2">
				                  	<button class="btn btn-info" type="submit">Search</button>
				                  </div>
				                </div>
				              </div>
				              <!-- /.card-body -->
				            </form>
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