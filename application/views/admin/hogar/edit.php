<?php $this->load->view('header'); ?>

<!--  BO :heading -->

<div class="row wrapper border-bottom white-bg page-heading">

	<div class="col-sm-4">

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

				<h5> Editar hogar <small></small></h5>

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


							<!-- No_ficha Start -->

							<div class="form-group">

								<label for="no_ficha" class="col-sm-3 control-label"> Número de ficha </label>

								<div class="col-sm-4">

									<input type="text" disabled class="form-control" id="no_ficha"


										   value="<?php echo set_value("no_ficha", html_entity_decode($hogar->no_ficha)); ?>"

									>
									<input type="hidden"  class="form-control" id="no_ficha" name="no_ficha"


										   value="<?php echo set_value("no_ficha", html_entity_decode($hogar->no_ficha)); ?>"

									>

								</div>

								<div class="col-sm-5">


									<?php echo form_error("no_ficha", "<span class='label label-danger'>", "</span>") ?>

								</div>

							</div>

							<!-- No_ficha End -->


							<!-- Direccion Start -->

							<div class="form-group">

								<label for="direccion" class="col-sm-3 control-label"> Dirección </label>

								<div class="col-sm-4">

									<input type="text" class="form-control" id="direccion" name="direccion"


										   value="<?php echo set_value("direccion", html_entity_decode($hogar->direccion)); ?>"

									>

								</div>

								<div class="col-sm-5">


									<?php echo form_error("direccion", "<span class='label label-danger'>", "</span>") ?>

								</div>

							</div>

							<!-- Direccion End -->


							<!-- Barrio Start -->

							<div class="form-group">

								<label class="control-label col-md-3"> Barrio </label>

								<div class="col-md-4">

									<select class="form-control select2" name="barrio" id="barrio">

										<option value="">Seleccionar Barrio</option>

										<?php

										if (isset($barrio) && !empty($barrio)):

											foreach ($barrio as $key => $value): ?>

												<option
													value="<?php echo $value->id_barrio; ?>" <?php echo $value->id_barrio == $hogar->barrio ? 'selected="selected"' : ""; ?>>

													<?php echo $value->barrio; ?>

												</option>

											<?php endforeach; ?>

										<?php endif; ?>

									</select>

								</div>

							</div>

							<!-- Barrio End -->


							<!-- Ciudad Start -->

							<div class="form-group">

								<label class="control-label col-md-3"> Ciudad </label>

								<div class="col-md-4">

									<select class="form-control select2" name="ciudad" id="ciudad">

										<option value="">Seleccionar Ciudad</option>

										<?php

										if (isset($ciudad) && !empty($ciudad)):

											foreach ($ciudad as $key => $value): ?>

												<option
													value="<?php echo $value->id_ciudad; ?>" <?php echo $value->id_ciudad == $hogar->ciudad ? 'selected="selected"' : ""; ?>>

													<?php echo $value->ciudad; ?>

												</option>

											<?php endforeach; ?>

										<?php endif; ?>

									</select>

								</div>

							</div>

							<!-- Ciudad End -->


							<!-- Fecha_registro Start -->

							<div class="form-group">

								<label for="fecha_registro" class="col-sm-3 control-label"> Fecha de registro </label>

								<div class="col-sm-4">

									<input type="text" class="form-control span2 datepicker" id="fecha_registro"
										   name="fecha_registro"


										   value="<?php echo set_value("fecha_registro", $hogar->fecha_registro); ?>"

									>

								</div>

								<div class="col-sm-5">


									<?php echo form_error("fecha_registro", "<span class='label label-danger'>", "</span>") ?>

								</div>

							</div>

							<!-- Fecha_registro End -->


							<!-- Cse Start -->

							<div class="form-group">

								<label class="control-label col-md-3"> CSE </label>

								<div class="col-md-4">

									<select class="form-control select2" name="cse" id="cse">

										<option value="">Seleccionar CSE</option>

										<?php

										if (isset($cse) && !empty($cse)):

											foreach ($cse as $key => $value): ?>

												<option
													value="<?php echo $value->id_cse; ?>" <?php echo $value->id_cse == $hogar->cse ? 'selected="selected"' : ""; ?>>

													<?php echo $value->cse; ?>

												</option>

											<?php endforeach; ?>

										<?php endif; ?>

									</select>

								</div>

							</div>

							<!-- Cse End -->


							<div class="form-group">

								<div class="col-sm-3">

								</div>

								<div class="col-sm-6">
									<button type="reset" class="btn btn-primary"
											onclick="history.back()">Regresar
									</button>
									<button type="reset" class="btn btn-warning ">Resetear</button>

									<button type="submit" class="btn btn-success ">Guardar</button>

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

<?php $this->load->view('footer'); 
