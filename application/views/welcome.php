<?php $this->load->view('header'); ?>

<?php
require_once('application/models/admin_sql/count_table.php');
?>

<!-- content -->
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Panel de Administración</h2>
	</div>
	<div class="col-sm-8">
		<div class="title-action">
			<!-- <a href="" class="btn btn-primary">This is action area</a> -->
		</div>
	</div>
</div>
<br>
<!-- content -->

<div class="row">
	<div class="col-lg-3">
		<div class="ibox " style="text-align: center;">
			<div class="ibox-title">
				<strong>PERSONAS CON CSE</strong>
			</div>
			<div class="ibox-content">
				<i class="fas fa-walking fa-6x"></i>
				<br>
				<br>
				<br>
				<div class="panel panel-default">
					<h1>
						<?php
						echo $row_persons;
						?>
					</h1>
				</div>


			</div>
			<div class="ibox-footer">
				<a href="<?php echo base_url() ?>admin/personalist/index" class="btn btn-success">IR A PERSONAS</a>
			</div>
		</div>
	</div>

	<div class="col-lg-3">
		<div class="ibox " style="text-align: center;">
			<div class="ibox-title">
				<strong>HOGARES</strong>
			</div>
			<div class="ibox-content">
				<i class="fas fa-house-user fa-6x"></i>
				<br>
				<br>
				<br>
				<div class="panel panel-default">
					<h1>
						<?php
						echo $row_family;
						?>
					</h1>
				</div>
			</div>
			<div class="ibox-footer">
				<a href="<?php echo base_url() ?>admin/hogar/index" class="btn btn-success">IR A HOGARES</a>
			</div>
		</div>
	</div>

	<div class="col-lg-2">
		<div class="ibox " style="text-align: center;">
			<div class="ibox-title">
				<strong>EXTREMO POBRE</strong>
			</div>
			<div class="ibox-content">
				<i class="fas fa-street-view fa-6x"></i>
				<!--				<i class="fas fa-house-user fa-6x"></i>-->
				<br>
				<br>
				<br>
				<div class="panel panel-default">
					<h1>
						<?php
						echo $row_extremopobre;
						?>
					</h1>
				</div>
			</div>
			<div class="ibox-footer">
				<a href="<?php echo base_url() ?>admin/hogar/index" class="btn btn-success">IR A HOGARES</a>
			</div>
		</div>
	</div>
	<div class="col-lg-2">
		<div class="ibox " style="text-align: center;">
			<div class="ibox-title">
				<strong>POBRE</strong>
			</div>
			<div class="ibox-content">
				<i class="fas fa-street-view fa-6x"></i>
				<br>
				<br>
				<br>
				<div class="panel panel-default">
					<h1>
						<?php
						echo $row_pobre;
						?>
					</h1>
				</div>
			</div>
			<div class="ibox-footer">
				<a href="<?php echo base_url() ?>admin/hogar/index" class="btn btn-success">IR A HOGARES</a>
			</div>
		</div>
	</div>
	<div class="col-lg-2">
		<div class="ibox " style="text-align: center;">
			<div class="ibox-title">
				<strong>NO POBRE</strong>
			</div>
			<div class="ibox-content">
				<i class="fas fa-street-view fa-6x"></i>
				<br>
				<br>
				<br>
				<div class="panel panel-default">
					<h1>
						<?php
						echo $row_nopobre;
						?>
					</h1>
				</div>
			</div>
			<div class="ibox-footer">
				<a href="<?php echo base_url() ?>admin/hogar/index" class="btn btn-success">IR A HOGARES</a>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="ibox " style="text-align: center;">
			<div class="ibox-title">
				<h1>BUSCAR POR PERSONA</h1>
			</div>
			<div class="ibox-content">
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">Buscar</div>
						<input type="text" class="form-control" id="search_text" name="search_text" placeholder="Buscar...">

					</div>

				</div>
				<div id="result">

				</div>
				<div style="clear:both"></div>
			</div>
		</div>
	</div>
</div>


<?php $this->load->view('footer'); ?>
