
<div class="box-header">
	<div class="row">

	</div>
</div>
<div class="box-body">
	<div class="table-responsive ">
		<table class="table no-margin table-hover table-striped table-condensed">
			<thead>
			<tr>
				<th>NRO</th>
				<th>DNI</th>
				<th>NOMBRES</th>
				<th>PATERNO</th>
				<th>MATERNO</th>
				<th>NACIMIENTO</th>
				<th>SEXO</th>
				<th>NRO FICHA</th>
			</tr>
			</thead>
			<tfoot>
			<tr>
				<th>Nro</th>
				<th>DNI</th>
				<th>Nombres</th>
				<th>Paterno</th>
				<th>Materno</th>
				<th>Nacimiento</th>
				<th>Sexo</th>
				<th>Nro ficha</th>
			</tr>
			</tfoot>
			<tbody>
			<?php
			$url_ = $this->config->item('base_url') . 'admin/persona/index/no_ficha/';
			$i = 1;
			if( ! empty($personas)) { ?>

				<?php foreach($personas as $persona){ ?>
					<tr>
						<td width="10px"><?= $i++ ?></td>
						<td width="40px"><?= $persona->dni ?></td>
						<td><?= $persona->nombres ?></td>
						<td><?= $persona->ape_pat  ?></td>
						<td><?= $persona->ape_mat  ?></td>
						<td>
							<?= ($persona->fech_naci) ?>
						</td>
						<td><?= $persona->sexo  ?></td>
						<td class="action">
							<a class="btn btn-sm btn-primary" href="<?= $url_.$persona->no_ficha ?>/1?no_ficha_=<?= $persona->no_ficha ?>"><?= $persona->no_ficha ?></a>
						</td>
					</tr>
				<?php } ?>
			<?php } else { ?>
				<tr><td colspan="8" class="no-records">No records</td></tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<div class="box-footer">
	<div class="row">
		<div class="col-md-8">
			<ul class="pagination" style="margin-top: -8px;">
				<?php echo $pagelinks ?>
			</ul>
		</div>
		<div class="col-md-4">
			<span class="pull-left border-left-right p-w-sm">Total de <?= $total_rows ?> resultados</span>
		</div>
	</div>

</div>
