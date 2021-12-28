<?php
	$this->load->view('header');
	require_once ('application/models/admin_sql/admin_sql.php');
?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

	<div class="col-lg-10">

		<h2>Dirección de ficha: <?php echo $_GET['no_ficha_'] ?> </h2>

		<ol class="breadcrumb">

			<li>

				<a href="<?php echo base_url() . 'cse-macusani/admin/' ?>">Panel de administraión</a>

			</li>

			<li class="active">

				<strong>Direccion</strong>

			</li>

		</ol>

	</div>

	<div class="col-lg-2">

	</div>

</div>

<div class="row">

	<div class="col-lg-12">

		<div class="ibox ">

			<br>

			<div class="ibox-title">

				<?php if ($this->session->flashdata('message')): ?>

					<div class="alert alert-success">

						<button type="button" class="close" data-close="alert"></button>

						<?php echo $this->session->flashdata('message'); ?>

					</div>

				<?php endif; ?>

				<a href="<?php echo base_url(); ?>admin/direccion/add?no_ficha_=<?php echo $_GET['no_ficha_'] ?>"
				   class="btn btn-success">Agregar nueva dirección</a>

				<div class="form-group pull-right">

<!--					<a href="--><?php //echo $csvlink; ?><!--" class="btn btn-info">CSV</a>-->

<!--					<a href="--><?php //echo $pdflink; ?><!--" class="btn btn-success">PDF</a>-->

				</div>

<!--				<form method="GET" action="--><?php //echo base_url() . 'admin/direccion/index'; ?><!--"-->
<!--					  class="form-inline ibox-content">-->
<!---->
<!--					<div class="form-group">-->
<!---->
<!--						<select name="searchBy" class="form-control">-->
<!---->
<!--							<option-->
<!--								value="direccion" --><?php //echo $searchBy == "direccion" ? 'selected="selected"' : ""; ?>
<!--								Direccion-->
<!--							</option>-->
<!--							<option-->
<!--								value="barrio.barrio" --><?php //echo $searchBy == "barrio.barrio" ? 'selected="selected"' : ""; ?>
<!--								Barrio-->
<!--							</option>-->
<!--							<option-->
<!--								value="ciudad.ciudad" --><?php //echo $searchBy == "ciudad.ciudad" ? 'selected="selected"' : ""; ?>
<!--								Ciudad-->
<!--							</option>-->
<!--							<option-->
<!--								value="fecha_registro" --><?php //echo $searchBy == "fecha_registro" ? 'selected="selected"' : ""; ?>
<!--								Fecha_registro-->
<!--							</option>-->
<!--							<option-->
<!--								value="hogar.no_ficha" --><?php //echo $searchBy == "hogar.no_ficha" ? 'selected="selected"' : ""; ?>
<!--								No_ficha-->
<!--							</option>-->
<!---->
<!--						</select>-->
<!---->
<!--					</div>-->
<!---->
<!--					<div class="form-group">-->
<!---->
<!--						<input type="text" name="searchValue" id="searchValue" class="form-control"-->
<!--							   value="--><?php //echo $searchValue; ?><!--">-->
<!---->
<!--					</div>-->
<!---->
<!--					<input type="submit" name="search" value="Search" class="btn btn-info">-->
<!---->
<!--					<div class="form-group pull-right">-->
<!---->
<!--						<select name="per_page" class="form-control" onchange="this.form.submit()">-->
<!---->
<!--							<option value="5" --><?php //echo $per_page == "5" ? 'selected="selected"' : ""; ?>
<!--								5-->
<!--							</option>-->
<!---->
<!--							<option value="10" --><?php //echo $per_page == "10" ? 'selected="selected"' : ""; ?>
<!--								10-->
<!--							</option>-->
<!---->
<!--							<option value="20" --><?php //echo $per_page == "20" ? 'selected="selected"' : ""; ?>
<!--								20-->
<!--							</option>-->
<!---->
<!--							<option value="50" --><?php //echo $per_page == "50" ? 'selected="selected"' : ""; ?>
<!--								50-->
<!--							</option>-->
<!---->
<!--							<option value="100" --><?php //echo $per_page == "100" ? 'selected="selected"' : ""; ?>
<!--								100-->
<!--							</option>-->
<!---->
<!--						</select>-->
<!---->
<!--					</div>-->
<!---->
<!--				</form>-->

			</div>




			<div class="ibox-content">

				<div class="table table-responsive">

					<table class="table table-striped table-bordered table-hover Tax" id="example" style="font-size: 13px; font-family: Arsenal;">

						<thead>

						<tr>

							<th><input onclick="toggle(this,'cbgroup1')" id="foo[]" name="foo[]" type="checkbox"
									   value=""/></th>

							<th>Nro</th>

							<?php $sortSym = isset($_GET["order"]) && $_GET["order"] == "asc" ? "up" : "down"; ?>

							<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "direccion" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

							<th>
								<a href="<?php echo $fields_links["direccion"]; ?>" class="link_css">
									Direccion
								</a>
							</th>


							<?php

							$symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "barrio.barrio" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>


							<th>
								<a href="<?php echo $fields_links["barrio.barrio"]; ?>" class="link_css">
									Barrio
								</a>
							</th>


							<?php

							$symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "ciudad.ciudad" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>


							<th>
								<a href="<?php echo $fields_links["ciudad.ciudad"]; ?>" class="link_css">
									Ciudad
								</a>
							</th>


							<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "fecha_registro" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

							<th>
								<a href="<?php echo $fields_links["fecha_registro"]; ?>" class="link_css">
									Fecha_registro
								</a>
							</th>


							<?php

							$symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "hogar.no_ficha" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>


							<th>
								<a href="<?php echo $fields_links["hogar.no_ficha"]; ?>" class="link_css">
									No_ficha
								</a>
							</th>


							<th> Action</th>

						</tr>

						</thead>

						<tbody>

						<?php
							$count = 1;


						//print_r($result_d->fetch_assoc());

//							$sql = "SELECT *FROM direccion WHERE no_ficha = '$no_ficha_'";
//							$result_ = $conn->query($sql);

							if ($result_d->num_rows > 0) {
								// output data of each row
								while ($row = $result_d->fetch_assoc()) {
									?>

									<tr id="hide<?php echo $row['id_direccion'] ?>">

										<th><input name='input' id='del' onclick="callme('show')" type='checkbox'
												   class='del' value='<?php echo $row['id_direccion'] ?>'/></th>


										<th><?php if (!empty($row['id_direccion'])) {
												echo $count;
												$count++;
											} ?></th>
										<th><?php if (!empty($row['direccion'])) {
												echo $row['direccion'];
											} ?></th>

										<th><?php if (!empty($row['barrio'])) {
												echo $row['barrio'];
											} ?></th>

										<th><?php if (!empty($row['ciudad'])) {
												echo $row['ciudad'];
											} ?></th>

										<th><?php if (!empty($row['fecha_registro'])) {
												echo $row['fecha_registro'];
											} ?></th>

										<th><?php if (!empty($row['no_ficha'])) {
												echo $row['no_ficha'];
											} ?></th>

										<th class="action-width">

											<a href="<?php echo base_url() ?>admin/direccion/view/<?php echo $row['id_direccion']; ?>"
											   title="Ver">

												<span class="btn btn-success "><i class="fa fa-eye"></i></span>

											</a>

											<a href="<?php echo base_url() ?>admin/direccion/edit/<?php echo $row['id_direccion']; ?>"
											   title="Editar">

												<span class="btn btn-success "><i class="fa fa-edit"></i></span>

											</a>

											<a title="Eliminar" data-toggle="modal" data-target="#commonDelete"
											   onclick="set_common_delete('<?php echo $row['id_direccion']; ?>','direccion');">

												<span class="btn btn-danger "><i class="fas fa-trash-alt"></i></span>

											</a>

										</th>

									</tr>
									<?php
								}
							}

						?>

<!--						--><?php //if (isset($results) and !empty($results)) {
//
//
//							$count = 1;
//
//
//							?>
<!---->
<!--							--><?php
//
//							foreach ($results as $key => $value) {
//
//
//								?>
<!---->
<!--								<tr id="hide--><?php //echo $value->id_direccion; ?><!--">-->
<!---->
<!--									<th><input name='input' id='del' onclick="callme('show')" type='checkbox'-->
<!--											   class='del' value='--><?php //echo $value->id_direccion; ?><!--'/></th>-->
<!---->
<!---->
<!--									<th>--><?php //if (!empty($value->id_direccion)) {
//											echo $count;
//											$count++;
//										} ?><!--</th>-->
<!--									<th>--><?php //if (!empty($value->direccion)) {
//											echo $value->direccion;
//										} ?><!--</th>-->
<!---->
<!--									<th>--><?php //if (!empty($value->barrio)) {
//											echo $value->barrio;
//										} ?><!--</th>-->
<!---->
<!--									<th>--><?php //if (!empty($value->ciudad)) {
//											echo $value->ciudad;
//										} ?><!--</th>-->
<!---->
<!--									<th>--><?php //if (!empty($value->fecha_registro)) {
//											echo $value->fecha_registro;
//										} ?><!--</th>-->
<!---->
<!--									<th>--><?php //if (!empty($value->no_ficha)) {
//											echo $value->no_ficha;
//										} ?><!--</th>-->
<!---->
<!--									<th class="action-width">-->
<!---->
<!--										<a href="--><?php //echo base_url() ?><!--admin/direccion/view/--><?php //echo $value->id_direccion; ?><!--"-->
<!--										   title="View">-->
<!---->
<!--											<span class="btn btn-info "><i class="fa fa-eye"></i></span>-->
<!---->
<!--										</a>-->
<!---->
<!--										<a href="--><?php //echo base_url() ?><!--admin/direccion/edit/--><?php //echo $value->id_direccion; ?><!--"-->
<!--										   title="Edit">-->
<!---->
<!--											<span class="btn btn-info "><i class="fa fa-edit"></i></span>-->
<!---->
<!--										</a>-->
<!---->
<!--										<a title="Delete" data-toggle="modal" data-target="#commonDelete"-->
<!--										   onclick="set_common_delete('--><?php ////echo $value->id_direccion; ?><!--','direccion');">-->
<!--//-->
<!--//											<span class="btn btn-info "><i class="fa fa-trash-o "></i></span>-->
<!--//-->
<!--//										</a>-->
<!--//-->
<!--//									</th>-->
<!--//-->
<!--//								</tr>-->
<!--//-->
<!--//								--><?php
////
////							}
////
////
////						} else {
////
////							echo '<tr><td colspan="100"><h3 align="center" class="text-danger">No Record found!</center</td></tr>';
////
////						} ?>

						</tbody>

					</table>

				</div>

				<?php //echo $links; ?>

			</div>

		</div>

		<img onclick="callme('','item','')"
			 src="<?php echo $this->config->item('accet_url') ?>/img/mac-trashcan_full-new.png" id="recycle"
			 style="width:90px;  display:none; position:fixed; bottom: 50px; right: 50px;"/>

	</div>

</div>

<script type="text/javascript">

	function delRow() {

		var confrm = confirm("Are you sure you want to delete?");

		if (confrm) {

			ids = values();

			$.ajax({

				type: "POST",

				url: '<?php echo base_url() . "admin/direccion/deleteAll"; ?>',

				data: {

					allIds: ids,

					'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'

				},

				success: function () {

					location.reload();

				},

			});

		}

	}

</script>

<?php $this->load->view('footer'); ?>
