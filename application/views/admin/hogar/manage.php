<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

	<div class="col-lg-10">

		<h2>Hogar</h2>

		<ol class="breadcrumb">

			<li>

				<a href="<?php echo base_url() . 'cse-macusani/admin/' ?>">Panel de Administración</a>

			</li>

			<li class="active">

				<strong>Hogar</strong>

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

				<a href="<?php echo base_url(); ?>admin/hogar/add" class="btn btn-success">AGREGAR NUEVO</a>

				<div class="form-group pull-right">

<!--					<a href="--><?php //echo $csvlink; ?><!--" class="btn btn-success">CSV</a>-->

					<a href="<?php echo base_url() . "admin/print_hogar/index";?>" class="btn btn-success" target="_blank">IMPRIMIR</a>

				</div>

				<form method="GET" action="<?php echo base_url() . 'admin/hogar/index'; ?>"
					  class="form-inline ibox-content">

					<div class="form-group">

						<select name="searchBy" class="form-control">

							<option
								value="no_ficha" <?php echo $searchBy == "no_ficha" ? 'selected="selected"' : ""; ?>>
								Nro ficha
							</option>
							<option
								value="direccion" <?php echo $searchBy == "direccion" ? 'selected="selected"' : ""; ?>>
								Direccion
							</option>
							<option
								value="barrio.barrio" <?php echo $searchBy == "barrio.barrio" ? 'selected="selected"' : ""; ?>>
								Barrio
							</option>
							<option
								value="ciudad.ciudad" <?php echo $searchBy == "ciudad.ciudad" ? 'selected="selected"' : ""; ?>>
								Ciudad
							</option>
							<option
								value="fecha_registro" <?php echo $searchBy == "fecha_registro" ? 'selected="selected"' : ""; ?>>
								Fecha de registro
							</option>
							<option
								value="cse.cse" <?php echo $searchBy == "cse.cse" ? 'selected="selected"' : ""; ?>>
								Cse
							</option>

						</select>

					</div>

					<div class="form-group">

						<input type="text" name="searchValue" id="searchValue" class="form-control"
							   value="<?php echo $searchValue; ?>">

					</div>

					<input type="submit" name="search" value="Buscar" class="btn btn-primary">

					<div class="form-group pull-right">

						<select name="per_page" class="form-control" onchange="this.form.submit()">

							<option value="8" <?php echo $per_page=="8"?'selected="selected"':""; ?>>8</option>

							<option value="16" <?php echo $per_page=="16"?'selected="selected"':""; ?>>16</option>

							<option value="32" <?php echo $per_page=="32"?'selected="selected"':""; ?>>32</option>

							<option value="64" <?php echo $per_page=="64"?'selected="selected"':""; ?>>64</option>

							<option value="124" <?php echo $per_page=="124"?'selected="selected"':""; ?>>124</option>

						</select>

					</div>

				</form>

			</div>

			<div class="ibox-content">

				<div class="table table-responsive">

					<table class="table table-striped table-bordered table-hover Tax" id="example" style="font-size: 13px; font-family: Arsenal;">

						<thead>

						<tr>

							<th><input onclick="toggle(this,'cbgroup1')" id="foo[]" name="foo[]" type="checkbox"
									   value=""/></th>

							<th> Nro </th>

							<?php $sortSym = isset($_GET["order"]) && $_GET["order"] == "asc" ? "up" : "down"; ?>

							<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "no_ficha" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

							<th>
								<a href="<?php echo $fields_links["no_ficha"]; ?>" class="link_css">
									No_ficha </a>
							</th>


							<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "direccion" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

							<th>
								<a href="<?php echo $fields_links["direccion"]; ?>" class="link_css">
									Direccion </a>
							</th>


							<?php

							$symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "barrio.barrio" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>


							<th>
								<a href="<?php echo $fields_links["barrio.barrio"]; ?>" class="link_css">
									Barrio </a>
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
									Fecha_registro </a>
							</th>


							<?php

							$symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "cse.cse" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>


							<th>
								<a href="<?php echo $fields_links["cse.cse"]; ?>" class="link_css">
									CSE
								</a>
							</th>

							<th class="action-width">Hogar</th>

							<th> Acción</th>

						</tr>

						</thead>

						<tbody>

						<?php if (isset($results) and !empty($results)) {


							$count = 1;


							?>

							<?php

							foreach ($results as $key => $value) {


								?>

								<tr id="hide<?php echo $value->no_ficha; ?>">

									<th><input name='input' id='del' onclick="callme('show')" type='checkbox'
											   class='del'
											   value='<?php echo $value->no_ficha; ?>'/></th>


									<th><?php if (!empty($value->no_ficha)) {
											echo $count;
											$count++;
										} ?></th>
									<th><?php if (!empty($value->no_ficha)) {
											echo $value->no_ficha;
										} ?></th>

									<th><?php if (!empty($value->direccion)) {
											echo $value->direccion;
										} ?></th>

									<th><?php if (!empty($value->barrio)) {
											echo $value->barrio;
										} ?></th>

									<th><?php if (!empty($value->ciudad)) {
											echo $value->ciudad;
										} ?></th>

									<th><?php if (!empty($value->fecha_registro)) {
											echo $value->fecha_registro;
										} ?></th>

									<th><?php if (!empty($value->cse)) {
											echo $value->cse;
										} ?></th>

									<th>

										<a href="<?php echo base_url() ?>admin/persona/index/no_ficha/<?php echo $value->no_ficha; ?>/1?no_ficha_=<?php echo $value->no_ficha; ?>"
										   title="Ver">

											<span class="btn btn-primary "> Hogar </span>

										</a>

									</th>



									<th class="action-width">

										<a href="<?php echo base_url() ?>admin/hogar/view/<?php echo $value->no_ficha; ?>"
										   title="Ver">

											<span class="btn btn-success "><i class="fa fa-eye"></i></span>

										</a>

										<a href="<?php echo base_url() ?>admin/hogar/edit/<?php echo $value->no_ficha; ?>"
										   title="Editar">

											<span class="btn btn-success "><i class="fa fa-edit"></i></span>

										</a>

										<a title="Eliminar" data-toggle="modal" data-target="#commonDelete"
										   onclick="set_common_delete('<?php echo $value->no_ficha; ?>','hogar');">

											<span class="btn btn-danger "><i class="fas fa-trash-alt"></i></span>

										</a>

									</th>

								</tr>

								<?php

							}


						} else {

							echo '<tr><td colspan="100"><h3 align="center" class="text-danger">No Record found!</center</td></tr>';

						} ?>

						</tbody>

					</table>

				</div>

				<?php echo $links; ?>

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

				url: '<?php echo base_url() . "admin/hogar/deleteAll"; ?>',

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
