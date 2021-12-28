<div class="footer">
    <div class="pull-right">
    </div>
    <div>
		<strong>Copyright</strong>
		<strong>
			<a href="http://www.municarabaya.gob.pe/portal/" target="_blank">Municipalidad Provincial de Carabaya </a>
		</strong>
		<strong>2020 - By</strong>
		<strong>
			<a href="http://www.onelcn.com" target="_blank"> ONELCN </a>
		</strong>
	</div>
</div>
</div>
</div>
<!-- Mainly scripts -->
<script src="<?php echo $this->config->item('accet_url') ?>js/bootstrap.min.js"></script>
<script src="<?php echo $this->config->item('accet_url') ?>js/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo $this->config->item('accet_url') ?>/js/plugins/cropper/cropper.min.js"></script>
<script src="<?php echo $this->config->item('accet_url') ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo $this->config->item('accet_url') ?>js/plugins/jeditable/jquery.jeditable.js"></script>
<script src="<?php echo $this->config->item('accet_url') ?>js/plugins/dataTables/datatables.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable( {
			"language": {
				"sProcessing":     "Procesando...",
				"sLengthMenu":     "Mostrar _MENU_ registros",
				"sZeroRecords":    "No se encontraron resultados",
				"sEmptyTable":     "Ningún dato disponible en esta tabla",
				"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix":    "",
				"sSearch":         "Buscar:",
				"sUrl":            "",
				"sInfoThousands":  ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst":    "Primero",
					"sLast":     "Último",
					"sNext":     "Siguiente",
					"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}
			},
			"searching": false,
			"lengthChange": false,
			"paging": false,
			stateSave: true
		} );
	} );
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#example2').DataTable( {
			"language": {
				"sProcessing":     "Procesando...",
				"sLengthMenu":     "Mostrar _MENU_ registros",
				"sZeroRecords":    "No se encontraron resultados",
				"sEmptyTable":     "Ningún dato disponible en esta tabla",
				"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix":    "",
				"sSearch":         "Buscar:",
				"sUrl":            "",
				"sInfoThousands":  ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst":    "Primero",
					"sLast":     "Último",
					"sNext":     "Siguiente",
					"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}
			},
			stateSave: true,
			//"paging": false,
		} );
	} );
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#example1').DataTable( {
			"language": {
				"sProcessing":     "Procesando...",
				"sLengthMenu":     "Mostrar _MENU_ registros",
				"sZeroRecords":    "No se encontraron resultados",
				"sEmptyTable":     "Ningún dato disponible en esta tabla",
				"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix":    "",
				"sSearch":         "Buscar:",
				"sUrl":            "",
				"sInfoThousands":  ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst":    "Primero",
					"sLast":     "Último",
					"sNext":     "Siguiente",
					"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}
			},
			stateSave: true,
			//"paging": false,
		} );
	} );
</script>

<script type="text/javascript">
	$(function () {
		$('[data-toggle="popover"]').popover()
	})
</script>


<!-- Custom and plugin javascript -->
<script type="text/javascript">
    $(function () {
        var navMain = $("#nav-main");
        navMain.on("click", "a", null, function () {
            navMain.collapse('hide');
        });
    });
</script>
<script src="<?php echo $this->config->item('accet_url') ?>js/plugins/chosen/chosen.jquery.js"></script>
<script type="text/javascript">
    $(".chosen-select").chosen();

</script>
<script src="<?php echo $this->config->item('accet_url') ?>js/plugins/select2/select2.full.min.js"></script>
<script type="text/javascript">
    $(".select2").select2();

</script>
<script type="text/javascript">
    $(function () {
        window.prettyPrint && prettyPrint();
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
    });
</script>
<script src="<?php echo $this->config->item('accet_url') ?>js/plugins/clockpicker/clockpicker.js"></script>
<script type="text/javascript">
    $('.clockpicker').clockpicker();
</script>
<script src="<?php echo $this->config->item('accet_url') ?>css/plugins/moment-develop/min/moment-with-locales.js"></script>
<script src="<?php echo $this->config->item('accet_url') ?>js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript">
    $(function () {
        $(".datetimepicker").datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
    });
</script>

<script type="text/javascript">
	//$(document).ready(function(){
	//
	//	load_data();
	//
	//	function load_data(query)
	//	{
	//		$.ajax({
	//			url:"<?php //echo base_url(); ?>//search/fetch",
	//			method:"POST",
	//			data:{query:query},
	//			success:function(data){
	//				$('#result').html(data);
	//			}
	//		})
	//	}
	//
	//	$('#search_text').keyup(function(){
	//		var search = $(this).val();
	//		if(search != '')
	//		{
	//			load_data(search);
	//		}
	//		else
	//		{
	//			load_data();
	//		}
	//	});
	//});
</script>

<script>
	$(function() {

		/*--first time load--*/
		ajaxlist(page_url=false);

		$('#search_text').keyup(function(){
			var search = $(this).val();
			if(search != '')
			{
				ajaxlist(page_url = false);
			}
		});



		/*-- Search keyword--*/
		$(document).on('click', "#searchBtn", function(event) {
			ajaxlist(page_url=false);
			event.preventDefault();
		});

		/*-- Reset Search--*/
		$(document).on('click', "#resetBtn", function(event) {
			$("#search_key").val('');
			ajaxlist(page_url=false);
			event.preventDefault();
		});

		/*-- Page click --*/
		$(document).on('click', ".pagination li a", function(event) {
			var page_url = $(this).attr('href');
			ajaxlist(page_url);
			event.preventDefault();
		});

		/*-- create function ajaxlist --*/
		function ajaxlist(page_url = false)
		{
			var search_key = $("#search_text").val();

			var dataString = 'search_text=' + search_key;
			var base_url = "<?= base_url() ?>search/fetch_ajax";

			if(page_url == false) {
				var page_url = base_url;
			}

			$.ajax({
				type: "POST",
				url: page_url,
				data: dataString,
				success: function(response) {
					console.log(response);
					$("#result").html(response);
				}
			});
		}
	});
</script>

</body>
</html>
