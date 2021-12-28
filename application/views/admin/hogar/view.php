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

	<div class="col-lg-12 row wrapper ">

		<div class="ibox ">

			<div class="ibox-title">

				<h5>Ver hogar <small></small></h5>

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

						<div class="box-body">

							<?php if ($this->session->flashdata('message')): ?>

								<div class="alert alert-success">

									<button type="button" class="close" data-close="alert"></button>

									<?php echo $this->session->flashdata('message'); ?>

								</div>

							<?php endif; ?>


							<table class='table table-bordered' style='width:70%;' align='center'>

								<tr>

									<td>

										<label for="no_ficha" class="col-lg-3 control-label"> Nro ficha </label>

									</td>

									<td>

										<?php echo set_value("no_ficha", html_entity_decode($hogar->no_ficha)); ?>

									</td>

								</tr>


								<tr>

									<td>

										<label for="direccion" class="col-sm-3 control-label"> Dirección </label>

									</td>

									<td>

										<?php echo set_value("direccion", html_entity_decode($hogar->direccion)); ?>

									</td>

								</tr>


								<!-- Barrio Start -->

								<tr>

									<td>

										<label class="control-label col-md-3"> Barrio </label>

									</td>

									<td>

										<?php

										if (isset($barrio) && !empty($barrio)):


											foreach ($barrio as $key => $value):

												if ($value->id_barrio == $hogar->barrio)

													echo $value->barrio;


											endforeach;

										endif; ?>

									</td>

								</tr>

								<!-- Barrio End -->


								<!-- Ciudad Start -->

								<tr>

									<td>

										<label class="control-label col-md-3"> Ciudad </label>

									</td>

									<td>

										<?php

										if (isset($ciudad) && !empty($ciudad)):


											foreach ($ciudad as $key => $value):

												if ($value->id_ciudad == $hogar->ciudad)

													echo $value->ciudad;


											endforeach;

										endif; ?>

									</td>

								</tr>

								<!-- Ciudad End -->


								<!-- Fecha_registro Start -->

								<tr>

									<td>

										<label for="fecha_registro" class="col-sm-3 control-label">
											Fecha_registro </label>

									</td>

									<td>

										<?php echo set_value("fecha_registro", html_entity_decode($hogar->fecha_registro)); ?>

									</td>

								</tr>

								<!-- Fecha_registro End -->


								<!-- Cse Start -->

								<tr>

									<td>

										<label class="control-label col-md-3"> CSE </label>

									</td>

									<td>

										<?php

										if (isset($cse) && !empty($cse)):


											foreach ($cse as $key => $value):

												if ($value->id_cse == $hogar->cse)

													echo $value->cse;


											endforeach;

										endif; ?>

									</td>

								</tr>

								<!-- Cse End -->


								<tr>
									<td colspan="2">
										<a type="reset" class="btn btn-success pull-right"
													   onclick="history.back()">Regresar</a>
									</td>
								</tr>
							</table>

							<div class="form-group">

								<div class="col-sm-3">

								</div>

								<div class="col-sm-6">

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
