<?php $this->load->view('header'); ?>

<!--  BO :heading -->

	<div class="row wrapper border-bottom white-bg page-heading">

		<div class="col-sm-4">

			<h2>Persona</h2>

			<ol class="breadcrumb">

				<li>

					<a href="<?php echo base_url() . 'cse-macusani/admin/' ?>">Panel de Administración</a>

				</li>

				<li class="active">

					<strong>Persona</strong>

				</li>

			</ol>

		</div>

		<div class="col-sm-8">

			<div class="title-action">

			</div>

		</div>

	</div>

	<!--  EO :heading -->

	<div class="row">

		<div class="wrapper wrapper-content animated fadeInRight">

			<div class="ibox ">

				<div class="ibox-title">

					<h5>Agregar nuevo <small></small></h5>

					<div class="ibox-tools">

					</div>

				</div>

				<!-- ............................................................. -->

				<!-- BO : content  -->

				<div class="col-sm-12 white-bg ">

					<div class="box box-info">

						<div class="box-header with-border">

							<h3 class="box-title"></h3>

						</div>

						<!-- /.box-header -->

						<!-- form start -->

						<form action="" id="" class="form-horizontal " method="post" enctype="multipart/form-data">

							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
								   value="<?php echo $this->security->get_csrf_hash(); ?>">

							<div class="box-body">

								<?php if ($this->session->flashdata('message')): ?>

									<div class="alert alert-success">

										<button type="button" class="close" data-close="alert"></button>

										<?php echo $this->session->flashdata('message'); ?>

									</div>

								<?php endif; ?>


								<!-- Dni Start -->

								<div class="form-group">

									<label for="dni" class="col-sm-3 control-label"> DNI </label>

									<div class="col-sm-4">

										<input type="text" class="form-control" id="dni" name="dni"
											   value="<?php echo set_value("dni"); ?>">

									</div>

									<div class="col-sm-5">
										<?php echo form_error("dni", "<span class='label label-danger'>", "</span>") ?>

									</div>

								</div>

								<!-- Dni End -->


								<!-- Nombres Start -->

								<div class="form-group">

									<label for="nombres" class="col-sm-3 control-label"> Nombres </label>

									<div class="col-sm-4">

										<input type="text" class="form-control" id="nombres" name="nombres"


											   value="<?php echo set_value("nombres"); ?>"

										>

									</div>

									<div class="col-sm-5">


										<?php echo form_error("nombres", "<span class='label label-danger'>", "</span>") ?>

									</div>

								</div>

								<!-- Nombres End -->


								<!-- Ape_pat Start -->

								<div class="form-group">

									<label for="ape_pat" class="col-sm-3 control-label"> Apellido peterno </label>

									<div class="col-sm-4">

										<input type="text" class="form-control" id="ape_pat" name="ape_pat"


											   value="<?php echo set_value("ape_pat"); ?>"

										>

									</div>

									<div class="col-sm-5">


										<?php echo form_error("ape_pat", "<span class='label label-danger'>", "</span>") ?>

									</div>

								</div>

								<!-- Ape_pat End -->


								<!-- Ape_mat Start -->

								<div class="form-group">

									<label for="ape_mat" class="col-sm-3 control-label"> Apellido materno </label>

									<div class="col-sm-4">

										<input type="text" class="form-control" id="ape_mat" name="ape_mat"


											   value="<?php echo set_value("ape_mat"); ?>"

										>

									</div>

									<div class="col-sm-5">


										<?php echo form_error("ape_mat", "<span class='label label-danger'>", "</span>") ?>

									</div>

								</div>

								<!-- Ape_mat End -->


								<!-- Fech_naci Start -->

								<div class="form-group">

									<label for="fech_naci" class="col-sm-3 control-label"> Fecha de nacimiento </label>

									<div class="col-sm-4">

										<input type="text" class="form-control span2 datepicker" id="fech_naci"
											   name="fech_naci"
											   value="<?php echo set_value("fech_naci", "2020-07-14"); ?>">

									</div>

									<div class="col-sm-5">


										<?php echo form_error("fech_naci", "<span class='label label-danger'>", "</span>") ?>

									</div>

								</div>

								<!-- Fech_naci End -->


								<!-- Sexo Start -->

								<div class="form-group">

									<label class="control-label col-md-3"> Sexo </label>

									<div class="col-md-4">

										<select class="form-control select2" name="sexo" id="sexo">

											<option value="">Seleccionar Sexo</option>

											<?php

											if (isset($sexo) && !empty($sexo)):

												foreach ($sexo as $key => $value): ?>

													<option value="<?php echo $value->id_sexo; ?>">

														<?php echo $value->sexo; ?>

													</option>

												<?php endforeach; ?>

											<?php endif; ?>

										</select>

									</div>

								</div>

								<!-- Sexo End -->


								<!-- Nucleo_fam Start -->

								<div class="form-group">

									<label class="control-label col-md-3"> Nucleo familiar </label>

									<div class="col-md-4">

										<select class="form-control select2" name="nucleo_fam" id="nucleo_fam">

											<option value="">Seleccionar Nucleo familiar</option>

											<?php

											if (isset($nucleo_fam) && !empty($nucleo_fam)):

												foreach ($nucleo_fam as $key => $value): ?>

													<option value="<?php echo $value->id_nucleofam; ?>">

														<?php echo $value->nucleo_fam; ?>

													</option>

												<?php endforeach; ?>

											<?php endif; ?>

										</select>

									</div>

								</div>

								<!-- Nucleo_fam End -->


								<!-- Celular Start -->

								<div class="form-group">

									<label for="celular" class="col-sm-3 control-label"> Celular </label>

									<div class="col-sm-4">

										<input type="text" class="form-control" id="celular" name="celular"


											   value="<?php echo set_value("celular"); ?>"

										>

									</div>

									<div class="col-sm-5">


										<?php echo form_error("celular", "<span class='label label-danger'>", "</span>") ?>

									</div>

								</div>

								<!-- Celular End -->


								<!-- Observations Start -->

								<div class="form-group">

									<label for="observations" class="col-sm-3 control-label"> Observaciones </label>

									<div class="col-sm-4">

										<textarea class="form-control" id="observations"
												  name="observations"><?php echo set_value("observations"); ?></textarea>

									</div>

									<div class="col-sm-5">


										<?php echo form_error("observations", "<span class='label label-danger'>", "</span>") ?>

									</div>

								</div>

								<!-- Observations End -->


								<!-- Fecha_registro Start -->
								<?php
								date_default_timezone_set('America/Lima');

								$date_current = date("Y-m-d");

								?>
<!--								<div class="form-group">-->
<!---->
<!--									<label for="fecha_registro" class="col-sm-3 control-label"> Fecha de registro </label>-->
<!---->
<!--									<div class="col-sm-4">-->

										<input type="hidden" class="form-control span2 datepicker" id="fecha_registro"
											   name="fecha_registro"
											   value="<?php echo set_value("fecha_registro", $date_current); ?>">



<!--								</div>-->

								<!-- Fecha_registro End -->


								<!-- No_ficha Start -->

								<div class="form-group">

									<label class="control-label col-md-3"> Nro de ficha </label>

									<div class="col-md-4">

										<select class="form-control select2" name="no_ficha" id="no_ficha">

											<option value="">Seleccionar Nro de ficha</option>

											<?php

											if (isset($hogar) && !empty($hogar)):

												foreach ($hogar as $key => $value): ?>

													<option value="<?php echo $value->no_ficha; ?>">

														<?php echo $value->no_ficha; ?>

													</option>

												<?php endforeach; ?>

											<?php endif; ?>

										</select>

									</div>

								</div>

								<!-- No_ficha End -->


								<div class="form-group">

									<div class="col-sm-3">

									</div>

									<div class="col-sm-6">
										<button type="reset" class="btn btn-success"
												onclick="history.back()">Regresar</button>
										<button type="reset" class="btn btn-warning ">Resetear</button>

										<button type="submit" class="btn btn-primary ">Guardar</button>

									</div>

									<div class="col-sm-3">

									</div>

								</div>

							</div>

							<!-- /.box-body -->

							<div class="box-footer">

							</div>

							<!-- /.box-footer -->

						</form>

					</div>

					<!-- /.box -->

					<br><br><br><br>

				</div>

				<!-- EO : content  -->

				<!-- ...................................................................... -->

			</div>

		</div>

	</div>

<?php $this->load->view('footer'); ?>
