<?php
	$this->load->view('header');
	require_once ('application/models/admin_sql/admin_sql.php');
?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

	<div class="col-lg-10">

		<h2><?php echo $no_ficha_;	?></h2>

		<ol class="breadcrumb">

			<li>

				<a href="<?php echo base_url() . 'cse-macusani/admin/' ?>">Panel de Administración</a>

			</li>

			<li class="active">

				<strong><?php echo $no_ficha_;	?></strong>

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

				<a href="<?php echo base_url(); ?>cse-macusani/admin/persona/add/<?php echo $rel_field; ?>/<?php echo $rel_id; ?>/?no_ficha_=<?php echo $_GET['no_ficha_'] ?>"
				   class="btn btn-success">AGREGAR NUEVO</a>

				<div class="form-group pull-right">

<!--					<a href="--><?php //echo $csvlink; ?><!--" class="btn btn-success">CSV</a>-->
<!--					<a href="--><?php //echo base_url() ?><!--cse-macusani/admin/direccion/index/?no_ficha_=--><?php //echo $_GET['no_ficha_'] ?><!--"-->
<!--					   title="Ver" class="btn btn-success">DIRECCION-->
<!---->
<!---->
<!---->
<!--					</a>-->


					<a href="<?php echo base_url() . "admin/printhogar/index?no_ficha_=".$no_ficha_; ?>" class="btn btn-success" target="_blank">IMPRIMIR</a>
<!--					<a href="--><?php //echo $pdflink; ?><!--" class="btn btn-success">PDF</a>-->

				</div>
				<hr>
				<div class="group-option">

					<?php


//
					?>
					<label class="col-md-3" style="font-family: 'Calibri Light'; font-size: 20px;">CSE:
						<span style="font-family: 'Calibri Light'; font-size: 20px; color: #1C84C6"> <?php echo $cse_cse;	?> </span>
					</label>
					<div class="col-md-6"></div>
					<label class="col-md-3" style="font-family: 'Calibri Light'; font-size: 20px;">Número de ficha:
						<span style="font-family: 'Calibri Light'; font-size: 20px; color: #1C84C6"> <?php echo $no_ficha_;	?> </span>
					</label><br><br><br>

				</div>

			</div>


			<div class="ibox-content">

				<div class="table table-responsive">

					<table class="table table-striped table-bordered table-hover Tax" id="example1" style="font-size: 13px; font-family: Arsenal;">

						<thead>

						<tr>

							<th><input onclick="toggle(this,'cbgroup1')" id="foo[]" name="foo[]" type="checkbox"
									   value=""/></th>

							<th> Nro </th>

							<?php $sortSym = isset($_GET["order"]) && $_GET["order"] == "asc" ? "up" : "down"; ?>

							<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "dni" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

							<th>
								<a href="<?php echo $fields_links["dni"]; ?>" class="link_css">
									DNI </a>
							</th>


							<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "nombres" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

							<th>
								<a href="<?php echo $fields_links["nombres"]; ?>" class="link_css">
									Nombres </a>
							</th>


							<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "ape_pat" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

							<th>
								<a href="<?php echo $fields_links["ape_pat"]; ?>" class="link_css">
									Apellido_paterno </a>
							</th>


							<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "ape_mat" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

							<th>
								<a href="<?php echo $fields_links["ape_mat"]; ?>" class="link_css">
									Apellido_materno
								</a>
							</th>


							<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "fech_naci" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

							<th>
								<a href="<?php echo $fields_links["fech_naci"]; ?>" class="link_css">
									Fecha_nacimiento </a>
							</th>


							<?php

							$symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "sexo.sexo" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>


							<th>
								<a href="<?php echo $fields_links["sexo.sexo"]; ?>" class="link_css">
									Sexo </a>
							</th>


							<?php

							$symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "nucleo_fam.nucleo_fam" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>


							<th>
								<a href="<?php echo $fields_links["nucleo_fam.nucleo_fam"]; ?>" class="link_css">
									Nucleo_familiar
								</a>
							</th>


							<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "celular" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

							<th>
								<a href="<?php echo $fields_links["celular"]; ?>" class="link_css">
									Celular
								</a>
							</th>


							<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "observations" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

							<th>
								<a href="<?php echo $fields_links["observations"]; ?>" class="link_css">
									Observaciones
								</a>
							</th>


							<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "fecha_registro" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

							<th>
								<a href="<?php echo $fields_links["fecha_registro"]; ?>" class="link_css">
									Fecha_registro
								</a>
							</th>


							<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "no_ficha" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

<!--							<th>-->
<!--								<a href="--><?php //echo $fields_links["no_ficha"]; ?><!--" class="link_css">-->
<!--									Nro_de_ficha-->
<!--								</a>-->
<!--							</th>-->


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

								<tr id="hide<?php echo $value->dni; ?>">

									<th><input name='input' id='del' onclick="callme('show')" type='checkbox'
											   class='del'
											   value='<?php echo $value->dni; ?>'/></th>


									<th><?php if (!empty($value->dni)) {
											echo $count;
											$count++;
										} ?></th>
									<th><?php if (!empty($value->dni)) {
											echo $value->dni;
										} ?></th>

									<th><?php if (!empty($value->nombres)) {
											echo $value->nombres;
										} ?></th>

									<th><?php if (!empty($value->ape_pat)) {
											echo $value->ape_pat;
										} ?></th>

									<th><?php if (!empty($value->ape_mat)) {
											echo $value->ape_mat;
										} ?></th>

									<th><?php if (!empty($value->fech_naci)) {
											echo $value->fech_naci;
										} ?></th>

									<th><?php if (!empty($value->sexo)) {
											echo $value->sexo;
										} ?></th>

									<th><?php if (!empty($value->nucleo_fam)) {
											echo $value->nucleo_fam;
										} ?></th>

									<th><?php if (!empty($value->celular)) {
											echo $value->celular;
										} ?></th>

									<th><?php if (!empty($value->observations)) {
											?>
											<button type="button" class="btn btn-sm btn-default" data-container="body"
													data-toggle="popover" data-placement="top" title="Observaciones"
													data-content="<?php echo $value->observations;  ?>">
												Observación
											</button>
											<?php
										} ?></th>

									<th><?php if (!empty($value->fecha_registro)) {
											echo $value->fecha_registro;
										} ?></th>

<!--									<th>--><?php //if (!empty($value->no_ficha)) {
//											echo $value->no_ficha;
//										} ?><!--</th>-->

									<th class="action-width">

										<a href="<?php echo base_url() ?>admin/persona/view/<?php echo $value->dni; ?>/<?php echo $rel_field; ?>/<?php echo $rel_id; ?>"
										   title="Ver">

											<span class="btn btn-success "><i class="fa fa-eye"></i></span>

										</a>

										<a href="<?php echo base_url() ?>admin/persona/edit/<?php echo $value->dni; ?>/<?php echo $rel_field; ?>/<?php echo $rel_id; ?>"
										   title="Editar">

											<span class="btn btn-success "><i class="fa fa-edit"></i></span>

										</a>

										<a title="Eliminar" data-toggle="modal" data-target="#commonDelete"
										   onclick="set_common_delete('<?php echo $value->dni; ?>','persona');">

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

				<?php //echo $links; ?>

			</div>
			<div class="ibox-title">
				<h3>INFORMACIÓN DEL HOGAR</h3>
			</div>
			<div class="ibox-content">
				<div class="group-option">

					<?php


					//
					?>
					<label class="col-md-4" style="font-family: 'Calibri Light'; font-size: 15px;">DIRECCIÓN:
						<span style="font-family: 'Calibri Light'; font-size: 15px; color: #1C84C6"> <?php echo empty($hogar['direccion']) ?
							"Aún no registra dirección" : $hogar['direccion'];	?> </span>
					</label>
					<label class="col-md-3" style="font-family: 'Calibri Light'; font-size: 15px;">BARRIO:
						<span style="font-family: 'Calibri Light'; font-size: 15px; color: #1C84C6"> <?php echo empty($barrio) ?
								"No registra" : $barrio;	?></span>
					</label>
					<label class="col-md-2" style="font-family: 'Calibri Light'; font-size: 15px;">CIUDAD:
						<span style="font-family: 'Calibri Light'; font-size: 15px; color: #1C84C6"> <?php echo empty($ciudad) ?
								"No registra" : $ciudad;	?> </span>
					</label>
					<label class="col-md-3" style="font-family: 'Calibri Light'; font-size: 15px;">FECHA DE REGISTRO:
						<span style="font-family: 'Calibri Light'; font-size: 15px; color: #1C84C6"> <?php echo $hogar['fecha_registro'];	?> </span>
					</label><br>

				</div>
			</div>
			<div class="ibox-title">
				<h3>MÁS DETALLES DE DOMICILIOS DEL HOGAR</h3>
			</div>
			<div class="ibox-content">
				<a href="<?php echo base_url(); ?>admin/direccion/add?no_ficha_=<?php echo $_GET['no_ficha_'] ?>"
				   class="btn btn-success">AGREGAR NUEVA DIRECCIÓN</a>
				<hr>
<!--				<label class="col-md-6" style="font-family: 'Calibri Light'; font-size: 20px;">MÁS DETALLES DE DOMICILIOS DEL HOGAR</label>-->

				<table class="table table-striped table-bordered table-hover Tax table-direc" style="font-size: 13px; font-family: Arsenal;">
					<thead>

					<tr>

						<th><input onclick="toggle(this,'cbgroup1')" id="foo[]" name="foo[]" type="checkbox"
								   value=""/></th>

						<th> Nro </th>

						<th>
							Dirección
						</th>

						<th>
							Barrio/Sector
						</th>
						<th>
							Ciudad/Centro_Poblado
						</th>

						<th>
							Fecha_Registro
						</th>

						<th> Acción</th>

					</tr>

					</thead>
					<tbody>

						<?php
						$count = 1;
						if ($result_d->num_rows > 0){
							while ($row = $result_d->fetch_assoc()) {
						?><tr>
								<th><input name='input' id='del' onclick="callme('show')" type='checkbox'
										   class='del'
										   value='<?php echo $value->dni; ?>'/></th>
								<th>
									<?php echo $count;?>
								</th>
								<th>
									<?php echo $row['direccion'];?>
								</th>
								<th>
									<?php echo $row['barrio'];?>
								</th>
								<th>
									<?php echo $row['ciudad'];?>
								</th>
								<th>
									<?php echo $row['fecha_registro'];?>
								</th>
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

						<?php
							}
						?>

						<?php
						} else {

							echo '<tr><td colspan="100"><h3 align="center" class="text-danger">No hay más domicilios registrados en el hogar!</center</td></tr>';

						} ?>
					</tr>

					</tbody>
				</table>
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

				url: '<?php echo base_url() . "admin/persona/deleteAll"; ?>',

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
