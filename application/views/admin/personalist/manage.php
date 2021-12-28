<?php $this->load->view('header'); ?>

<!--  BO :heading -->

	<div class="row wrapper border-bottom white-bg page-heading">

		<div class="col-lg-10">

			<h2>Persona</h2>

			<ol class="breadcrumb">

				<li>

					<a href="<?php echo base_url() . 'cse-macusani//admin/' ?>">Panel de Administración</a>

				</li>

				<li class="active">

					<strong>Persona</strong>

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

					<a href="<?php echo base_url(); ?>cse-macusani//admin/personalist/add/" class="btn btn-success">AGREGAR NUEVO</a>

					<div class="form-group pull-right">

<!--						<a href="--><?php //echo $csvlink; ?><!--" class="btn btn-success">CSV</a>-->

						<a href="<?php echo base_url() . "admin/printpersona/index" ?>" class="btn btn-success">IMPRIMIR</a>

					</div>

					<form method="GET" action="<?php echo base_url() . 'admin/personalist/index'; ?>"
						  class="form-inline ibox-content">

						<div class="form-group">

							<select name="searchBy" class="form-control">

								<option value="dni" <?php echo $searchBy == "dni" ? 'selected="selected"' : ""; ?>>DNI
								</option>
								<option
									value="nombres" <?php echo $searchBy == "nombres" ? 'selected="selected"' : ""; ?>>
									Nombres
								</option>
								<option
									value="ape_pat" <?php echo $searchBy == "ape_pat" ? 'selected="selected"' : ""; ?>>
									Apelido paterno
								</option>
								<option
									value="ape_mat" <?php echo $searchBy == "ape_mat" ? 'selected="selected"' : ""; ?>>
									Apelido materno
								</option>
								<option
									value="fech_naci" <?php echo $searchBy == "fech_naci" ? 'selected="selected"' : ""; ?>>
									Fecha de nacimiento
								</option>
								<option
									value="sexo.sexo" <?php echo $searchBy == "sexo.sexo" ? 'selected="selected"' : ""; ?>>
									Sexo
								</option>
								<option
									value="nucleo_fam.nucleo_fam" <?php echo $searchBy == "nucleo_fam.nucleo_fam" ? 'selected="selected"' : ""; ?>>
									Nucleo Familiar
								</option>
								<option
									value="celular" <?php echo $searchBy == "celular" ? 'selected="selected"' : ""; ?>>
									Celular
								</option>
								<option
									value="observations" <?php echo $searchBy == "observations" ? 'selected="selected"' : ""; ?>>
									Observaciones
								</option>
								<option
									value="fecha_registro" <?php echo $searchBy == "fecha_registro" ? 'selected="selected"' : ""; ?>>
									Fecha de registro
								</option>
								<option
									value="hogar.no_ficha" <?php echo $searchBy == "hogar.no_ficha" ? 'selected="selected"' : ""; ?>>
									Nro de ficha
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

								<option value="8" <?php echo $per_page == "8" ? 'selected="selected"' : ""; ?>>8
								</option>

								<option value="16" <?php echo $per_page == "16" ? 'selected="selected"' : ""; ?>>16
								</option>

								<option value="32" <?php echo $per_page == "32" ? 'selected="selected"' : ""; ?>>32
								</option>

								<option value="64" <?php echo $per_page == "64" ? 'selected="selected"' : ""; ?>>64
								</option>

								<option value="124" <?php echo $per_page == "124" ? 'selected="selected"' : ""; ?>>124
								</option>

							</select>

						</div>

					</form>

				</div>

				<div class="ibox-content">

					<div class="table table-responsive">

						<table class="table table-striped table-bordered table-hover Tax" id="example" style="font-size: 13px; font-family: Arsenal;">

							<thead >

								<tr>

									<th>
										<input onclick="toggle(this,'cbgroup1')" id="foo[]" name="foo[]" type="checkbox" value=""/>
									</th>

									<th style="width: auto;">
										Nro.
									</th>

									<?php $sortSym = isset($_GET["order"]) && $_GET["order"] == "asc" ? "up" : "down"; ?>

									<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "dni" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

									<th>
										<a href="<?php echo $fields_links["dni"]; ?>" class="link_css"> DNI</a>
									</th>


									<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "nombres" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

									<th>
										<a href="<?php echo $fields_links["nombres"]; ?>" class="link_css"> Nombres </a>
									</th>


									<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "ape_pat" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

									<th>
										<a href="<?php echo $fields_links["ape_pat"]; ?>" class="link_css"> <span>Apellido_paterno</span> </a>
									</th>


									<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "ape_mat" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

									<th>
										<a href="<?php echo $fields_links["ape_mat"]; ?>" class="link_css"> Apellido_materno </a>
									</th>


									<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "fech_naci" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

									<th>
										<a href="<?php echo $fields_links["fech_naci"]; ?>" class="link_css"> Fecha_nacimiento </a>
									</th>


									<?php

									$symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "sexo.sexo" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>


									<th>
										<a href="<?php echo $fields_links["sexo.sexo"]; ?>" class="link_css"> Sexo </a>
									</th>


									<?php

									$symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "nucleo_fam.nucleo_fam" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>


									<th>
										<a href="<?php echo $fields_links["nucleo_fam.nucleo_fam"]; ?>" class="link_css"> Nucleo_familiar </a>
									</th>


									<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "celular" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

									<th>
										<a href="<?php echo $fields_links["celular"]; ?>" class="link_css"> Celular </a>
									</th>


									<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "observations" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

									<th>
										<a href="<?php echo $fields_links["observations"]; ?>" class="link_css"> Observaciones </a>
									</th>


									<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "fecha_registro" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

									<th>
										<a href="<?php echo $fields_links["fecha_registro"]; ?>" class="link_css">Fecha_registro </a>
									</th>


									<?php

									$symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "hogar.no_ficha" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>


									<th>
										<a href="<?php echo $fields_links["hogar.no_ficha"]; ?>" class="link_css">
											Nro_de_ficha</a>
									</th>


									<th> Hogar </th>
									<th> Acción</th>

								</tr>

							</thead>

							<tbody >

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

										<th><?php if (!empty($value->no_ficha)) {
												echo $value->no_ficha;
											} ?></th>

										<th class="action-width">

											<a href="<?php echo base_url() ?>admin/persona/index/no_ficha/<?php echo $value->no_ficha; ?>/1?no_ficha_=<?php echo $value->no_ficha; ?>"
											   title="Ver">

												<span class="btn btn-primary ">

													Hogar

												</span>

											</a>

										</th>

										<th class="action-width">

											<a href="<?php echo base_url() ?>admin/personalist/view/<?php echo $value->dni; ?>"
											   title="Ver">

												<span class="btn btn-success "><i class="fa fa-eye"></i></span>

											</a>

											<a href="<?php echo base_url() ?>admin/personalist/edit/<?php echo $value->dni; ?>"
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

					url: '<?php echo base_url() . "admin/personalist/deleteAll"; ?>',

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
