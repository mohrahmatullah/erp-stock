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
					<?php if(isset($_SESSION['input_sukses'])){ ?>
					<div class="row mb-3">
						<div class="col-lg-12">
							
									<div class="alert alert-success">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									  	<strong>Sukses!</strong> <?php echo $_SESSION['input_sukses']; ?>
									</div>
							
						</div>
					</div>	
					<?php } ?>				
					<div class="row">
						<div class="col-lg-12">
				            <form class="card card-info" action="<?php echo base_url('item/postmutation'); ?>" method="post">
					          <div class="card-header">
					            <h3 class="card-title">Add Mutation</h3>
					          </div>
					          <!-- /.card-header -->
					          <div class="card-body">
					            <div class="row mb-5">
					              <div class="col-md-6">
					                <div class="form-group">
					                  <label>Source</label>
					                  <select class="custom-select rounded-0" id="exampleSelectRounded0" name="source" required="true">
										<option value="">Select Cost center</option>
											<?php foreach($database as $db) : ?>  
												<option value="<?php echo $db->code; ?>"><?php echo $db->code; ?></option>
									        <?php endforeach; ?>
										</select>
					                </div>
					              </div>
					              <div class="col-md-6">
					                <div class="form-group">
					                  <label>Destination</label>
					                  <select class="custom-select rounded-0" id="exampleSelectRounded0" name="dest" required="true">
										<option value="">Select Cost center</option>
											<?php foreach($database as $db) : ?>  
												<option value="<?php echo $db->code; ?>"><?php echo $db->code; ?></option>
									        <?php endforeach; ?>
										</select>
					                </div>
					              </div>
					            </div>
					            <div class="row mb-3">
					            	<div class="col-lg-5">
					            		<a href="#" onclick="additems()" class="btn btn-warning"> + Add Item</a>
					            		<a href="#" onclick="deleteRow()" class="btn btn-danger"> - Delete Item</a>
					            	</div>
					            </div>
					            <div class="row">
					            	<div class="col-lg-12">
					            		<table class="table table-bordered">
					            			 <thead>
											    <tr>
											      <th style="width: 50%">Item</th>
											      <th style="width: 20%">Qty</th>
											      <th style="width: 20%">Weight</th>
											      <th style="width: 10%">Action</th>
											    </tr>
											  </thead>
											  <!-- <tbody id="dynamic_field">
											    <tr>  
							                        <td>
							                        	<select class="custom-select rounded-0" id="exampleSelectRounded0" name="item[0]">
							                        		<option value="">Select Cost center</option>
															<?php foreach($item as $db) : ?>  
																<option value="<?php echo $db->code; ?>"><?php echo $db->code; ?></option>
													        <?php endforeach; ?>
														</select>
													</td>
							                        <td><input type="text" name="qty[0]" class="form-control" /></td> 
							                        <td><input type="text" name="weight[0]" class="form-control" /></td>  
							                        <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>
						                    	</tr>  
						                    	<tr>  
							                        <td>
							                        	<select class="custom-select rounded-0" id="exampleSelectRounded0" name="item[1]">
							                        		<option value="">Select Cost center</option>
															<?php foreach($item as $db) : ?>  
																<option value="<?php echo $db->code; ?>"><?php echo $db->code; ?></option>
													        <?php endforeach; ?>
														</select>
													</td>
							                        <td><input type="text" name="qty[1]" class="form-control" /></td> 
							                        <td><input type="text" name="weight[1]" class="form-control" /></td>  
							                        <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>
						                    	</tr> 
											  </tbody> -->
											  <tbody id="mutation_table">
											  </tbody>
						                    
						                </table> 
					            	</div>
					            </div>
					            <!-- /.row -->
					          </div>
					          <!-- /.card-body -->
					          <div class="card-footer">
					          	<button class="btn btn-info" type="submit">Submit</button>
					          </div>
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