<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Persona extends CI_Controller

{

	function __construct()
	{

		parent::__construct();

		$this->load->library('pagination');

		$this->load->helper('url');

		$this->load->library('ion_auth');

		$this->load->library('form_validation');

		$this->load->model('admin/persona_model', 'persona');

	}


	function index($rel_field = '', $rel_id = '', $id = 1)

	{

		$cond = "";

		$data['searchBy'] = '';

		$data['searchValue'] = '';

		$v_fields = $this->persona->v_fields;

		$per_page_arr = array('5', '10', '20', '50', '100');


		if (isset($_GET['searchValue']) && isset($_GET['searchBy'])) {

			$data['searchBy'] = $_GET['searchBy'];

			$data['searchValue'] = $_GET['searchValue'];

			if (!empty($_GET['searchValue']) && $_GET['searchValue'] != "" && !empty($_GET['searchBy']) && $_GET['searchBy'] != "") {

				$cond = "true";

			}

		}


		$data['sortBy'] = '';

		$order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields) ? $_GET['sortBy'] : '';

		$order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';

		$searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields) ? $_GET['searchBy'] : null;

		$searchValue = isset($_GET['searchValue']) ? $_GET['searchValue'] : '';

		$searchValue = addslashes($searchValue);


		if (isset($_GET['sortBy']) && $_GET['sortBy'] != '') {

			$data['sortBy'] = $_GET['sortBy'];

			if (isset($_GET['order']) && $_GET['order'] != '') {

				$_GET['order'] = $_GET['order'] == 'asc' ? 'desc' : 'asc';

			} else {

				$_GET['order'] = 'desc';

			}

		}


		$get_q = $_GET;

		foreach ($v_fields as $key => $value) {

			$get_q['sortBy'] = $value;

			$query_result = http_build_query($get_q);

			$data['fields_links'][$value] = current_url() . '?' . $query_result;

		}

		$data['csvlink'] = base_url() . 'admin/persona/export/csv';

		$data['pdflink'] = base_url() . 'admin/persona/export/pdf';

		$data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr) ? $_GET['per_page'] : "20";


		// PAGINATION

		$rel_arr = array('rel_field' => $rel_field, 'rel_id' => $rel_id);

		$config = array();

		$config['suffix'] = '?' . $_SERVER['QUERY_STRING'];

		$config["base_url"] = base_url() . "admin/persona/index/$rel_field/$rel_id";

		$total_row = $this->persona->getCount('persona', $searchBy, $searchValue, $rel_arr);

		$config["first_url"] = base_url() . "admin/persona/index/$rel_field/$rel_id" . '?' . $_SERVER['QUERY_STRING'];

		$config["total_rows"] = $total_row;

		$config["per_page"] = $per_page = $data['per_page'];

		$config["uri_segment"] = $this->uri->total_segments();

		$config['use_page_numbers'] = TRUE;

		$config['num_links'] = 3; //$total_row

		$config['cur_tag_open'] = '&nbsp;<a class="current">';

		$config['cur_tag_close'] = '</a>';

		$config['full_tag_open'] = "<ul class='pagination'>";

		$config['full_tag_close'] = "</ul>";

		$config['num_tag_open'] = '<li>';

		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";

		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";

		$config['next_tag_open'] = "<li>";

		$config['next_tagl_close'] = "</li>";

		$config['prev_tag_open'] = "<li>";

		$config['prev_tagl_close'] = "</li>";

		$config['first_link'] = 'First';

		$config['first_tag_open'] = "<li>";

		$config['first_tagl_close'] = "</li>";

		$config['last_link'] = 'Last';

		$config['last_tag_open'] = "<li>";

		$config['last_tagl_close'] = "</li>";

		$this->pagination->initialize($config);


		if ($this->uri->segment(2)) {

			$cur_page = $id;

			$pagi = array("cur_page" => ($cur_page - 1) * $per_page, "per_page" => $per_page, 'order' => $order, 'order_by' => $order_by, 'rel_field' => $rel_field, 'rel_id' => $rel_id);

		} else {

			$pagi = array("cur_page" => 0, "per_page" => $per_page, 'rel_field' => $rel_field, 'rel_id' => $rel_id);

		}


		$data["results"] = $result = $this->persona->getList("persona", $pagi);

		$str_links = $this->pagination->create_links();


		$data["links"] = $str_links;

		// ./ PAGINATION /.


		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		} else {

			$data['persona'] = $this->persona->getList('persona');

			$data["rel_field"] = $rel_field;

			$data["rel_id"] = $rel_id;

			$this->load->view('admin/persona/manage', $data);

		}

	}


	public function add($rel_field = '', $rel_id = '')

	{

		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}


		$data = NULL;


		$this->form_validation->set_rules('dni', 'Dni Name', 'required|exact_length[8]|numeric');
		$this->form_validation->set_rules('nombres', 'Nombres Name', 'required');
		$this->form_validation->set_rules('ape_pat', 'Ape_pat Name', 'required');
		$this->form_validation->set_rules('ape_mat', 'Ape_mat Name', 'required');
		$this->form_validation->set_rules('fech_naci', 'Fech_naci Name', 'required');
		$this->form_validation->set_rules('sexo', 'Sexo Name', 'required');
		$this->form_validation->set_rules('nucleo_fam', 'Nucleo_fam Name', 'required');
		$this->form_validation->set_rules('celular', 'Celular Name', 'required|exact_length[9]|numeric');
		$this->form_validation->set_rules('observations', 'Observations Name', 'trim');
		$this->form_validation->set_rules('fecha_registro', 'Fecha_registro Name', 'required');
		$this->form_validation->set_rules('no_ficha', 'No_ficha Name', 'required|exact_length[8]');


		$data['errors'] = array();

		if ($this->form_validation->run() == FALSE) {

			$data["sexo"] = $this->persona->getListTable("sexo");
			$data["nucleo_fam"] = $this->persona->getListTable("nucleo_fam");
			$data["hogar"]=$this->persona->getListTable("hogar");

			$data['rel_field'] = $rel_field;

			$data['rel_id'] = $rel_id;

			$this->load->view('admin/persona/add', $data);

		} else {

			$saveData['dni'] = set_value('dni');
			$saveData['nombres'] = set_value('nombres');
			$saveData['ape_pat'] = set_value('ape_pat');
			$saveData['ape_mat'] = set_value('ape_mat');
			$saveData['fech_naci'] = set_value('fech_naci');
			$saveData['sexo'] = set_value('sexo');
			$saveData['nucleo_fam'] = set_value('nucleo_fam');
			$saveData['celular'] = set_value('celular');
			$saveData['observations'] = set_value('observations');
			$saveData['fecha_registro'] = set_value('fecha_registro');
			$saveData['no_ficha'] = set_value('no_ficha');

			$no_ficha_ = set_value('no_ficha');

			$rel_field = $_POST['rel_field'];

			$rel_id = $_POST['rel_id'];

			$saveData[$rel_field] = $rel_id;

			$insert_id = $this->persona->insert('persona', $saveData);


			$this->session->set_flashdata('message', 'Persona añadida con éxito!');

			$rel_field = $_POST['rel_field'];

			$rel_id = $_POST['rel_id'];

			redirect("admin/persona/index/$rel_field/$rel_id"."?no_ficha_=".$no_ficha_);

		}

	}


	function view($id)

	{


		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}


		if (isset($id) and !empty($id)) {

			$data = NULL;


			$this->form_validation->set_rules('dni', 'Dni Name', 'required|exact_length[8]');
			$this->form_validation->set_rules('nombres', 'Nombres Name', 'required');
			$this->form_validation->set_rules('ape_pat', 'Ape_pat Name', 'required');
			$this->form_validation->set_rules('ape_mat', 'Ape_mat Name', 'required');
			$this->form_validation->set_rules('fech_naci', 'Fech_naci Name', 'required');
			$this->form_validation->set_rules('sexo', 'Sexo Name', 'required');
			$this->form_validation->set_rules('nucleo_fam', 'Nucleo_fam Name', 'required');
			$this->form_validation->set_rules('celular', 'Celular Name', 'required|exact_length[9]|numeric');
			$this->form_validation->set_rules('observations', 'Observations Name', 'trim');
			$this->form_validation->set_rules('fecha_registro', 'Fecha_registro Name', 'required');
			$this->form_validation->set_rules('no_ficha', 'No_ficha Name', 'required|exact_length[8]');


			$data['errors'] = array();

			if ($this->form_validation->run() == FALSE) {

				$data["sexo"] = $this->persona->getListTable("sexo");
				$data["nucleo_fam"] = $this->persona->getListTable("nucleo_fam");


				$data['persona'] = $this->persona->getRow('persona', $id);
				//$data['hogar'] = $this->persona->getRow('hogar', $id);

				$this->load->view('admin/persona/view', $data);

			} else {

				redirect('admin/persona/view');

			}

		} else {

			$this->session->set_flashdata('message', ' Identificación invalida !');

			redirect('admin/persona/view');

		}

	}


	function edit($id, $rel_field = '', $rel_id = '')

	{

		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}


		if (isset($id) and !empty($id)) {

			$data = NULL;


			$this->form_validation->set_rules('dni', 'Dni Name', 'required|exact_length[8]');
			$this->form_validation->set_rules('nombres', 'Nombres Name', 'required');
			$this->form_validation->set_rules('ape_pat', 'Ape_pat Name', 'required');
			$this->form_validation->set_rules('ape_mat', 'Ape_mat Name', 'required');
			$this->form_validation->set_rules('fech_naci', 'Fech_naci Name', 'required');
			$this->form_validation->set_rules('sexo', 'Sexo Name', 'required');
			$this->form_validation->set_rules('nucleo_fam', 'Nucleo_fam Name', 'required');
			$this->form_validation->set_rules('celular', 'Celular Name', 'required|exact_length[9]|numeric');
			$this->form_validation->set_rules('observations', 'Observations Name', 'trim');
			$this->form_validation->set_rules('fecha_registro', 'Fecha_registro Name', 'required');
			$this->form_validation->set_rules('no_ficha', 'No_ficha Name', 'required|exact_length[8]');


			$data['errors'] = array();

			if ($this->form_validation->run() == FALSE) {


				$data['persona'] = $this->persona->getRow('persona', $id);

				$data["sexo"] = $this->persona->getListTable("sexo");
				$data["nucleo_fam"] = $this->persona->getListTable("nucleo_fam");
				$data["hogar"] = $this->persona->getListTable("hogar");

				$data['rel_field'] = $rel_field;

				$data['rel_id'] = $rel_id;

				$this->load->view('admin/persona/edit', $data);

			} else {

				$saveData['dni'] = set_value('dni');
				$saveData['nombres'] = set_value('nombres');
				$saveData['ape_pat'] = set_value('ape_pat');
				$saveData['ape_mat'] = set_value('ape_mat');
				$saveData['fech_naci'] = set_value('fech_naci');
				$saveData['sexo'] = set_value('sexo');
				$saveData['nucleo_fam'] = set_value('nucleo_fam');
				$saveData['celular'] = set_value('celular');
				$saveData['observations'] = set_value('observations');
				$saveData['fecha_registro'] = set_value('fecha_registro');
				$saveData['no_ficha'] = set_value('no_ficha');

				$no_ficha_ = set_value('no_ficha');
				$this->persona->updateData('persona', $saveData, $id);


				$this->session->set_flashdata('message', 'Persona actualizada con éxito!');

				redirect("admin/persona/index/$rel_field/$rel_id?no_ficha_=$no_ficha_");

			}

		} else {

			$this->session->set_flashdata('message', ' Identificación invalida !');

			redirect('admin/persona');

		}

	}


	function delete($id = '')

	{

		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}


		if (isset($id) and !empty($id)) {

			$count = $this->persona->getCount('persona', 'persona.dni', $id);

			if (isset($count) and !empty($count)) {

				$this->persona->delete('persona', 'dni', $id);

				$this->session->set_flashdata('message', ' Persona eliminada con éxito !');

				echo "success";

				exit;

			} else {

				$this->session->set_flashdata('message', ' Identificación invalida !');

			}

		} else {

			$this->session->set_flashdata('message', ' Identificación invalida !');

		}

	}


	function deleteAll($id = '')

	{


		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}


		$all_ids = $_POST["allIds"];


		if (isset($all_ids) and !empty($all_ids)) {


			//$count=$this->persona->getCount('persona','persona.id',$id);

			for ($a = 0; $a < count($all_ids); $a++) {

				if ($all_ids[$a] != "") {

					$this->persona->delete('persona', 'dni', $all_ids[$a]);

					$this->session->set_flashdata('message', ' Persona(s) eliminada(s) con éxito !');

				}

			}


			echo "success";

			exit;

		} else {

			$this->session->set_flashdata('message', ' Identificación invalida !');

		}

	}


	function export($filetype = 'csv')
	{


		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}


		$searchBy = '';

		$searchValue = '';

		$v_fields = array('dni', 'nombres', 'ape_pat', 'ape_mat', 'fech_naci', 'sexo', 'nucleo_fam', 'celular', 'observations', 'fecha_registro', 'no_ficha');


		$data['sortBy'] = '';


		$order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields) ? $_GET['sortBy'] : '';

		$order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';


		$searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields) ? $_GET['searchBy'] : null;

		$searchValue = isset($_GET['searchValue']) ? $_GET['searchValue'] : '';

		$searchValue = addslashes($searchValue);

		$pagi = array('order' => $order, 'order_by' => $order_by);


		$result = $this->persona->getList("persona");


		if ($filetype == 'csv') {

			header('Content-Type: application/csv');

			header('Content-Disposition: attachment; filename=persona.csv');

			header('Pragma: no-cache');

			$csv = 'Nro,' . implode(',', $v_fields) . "\n";

			foreach ($result as $key => $value) {

				$line = ($key + 1) . ',';

				foreach ($v_fields as $field) {

					$line .= '"' . addslashes($value->$field) . '"' . ',';

				}

				$csv .= ltrim($line, ',') . "\n";

			}

			echo $csv;
			exit;

		} elseif ($filetype == 'pdf') {

			error_reporting(0);

			ob_start();

			$this->load->library('m_pdf');

			$table = '

		<html>

		<head><title></title>

		<style>

		table{

			border:1px solid;

		}

		tr:nth-child(even)

		{

			background-color: rgba(158, 158, 158, 0.82);

		}

		</style>

		</head>

		<body>

		<h1 align="center">Persona</h1>

		<table><tr>';

			$table .= '<th>Nro</th>';

			foreach ($v_fields as $value) {

				$table .= '<th>' . $value . '</th>';

			}

			$table .= '</tr>';

			foreach ($result as $key => $value) {

				$table .= '<tr><td>' . ($key + 1) . '</td>';

				foreach ($v_fields as $field) {

					$table .= '<td>' . $value->$field . '</td>';

				}

				$table .= '</tr>';

			}

			$table .= '</table></body></html>';

			ob_clean();

			$pdf = $this->m_pdf->load();

			$pdf->WriteHTML($table);

			$pdf->Output('persona.pdf', "D");

			exit;

		} else {

			echo 'Invalid option';
			exit;

		}

	}


	function status($field, $id)

	{

		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}


		if (in_array($field, array())) {

			if (isset($id) && !empty($id)) {

				if (!is_null($persona = $this->persona->getRow('persona', $id))) {

					$status = $persona->$field;

					if ($status == 1) {

						$status = 0;

					} else {

						$status = 1;

					}

					$statusData[$field] = $status;

					$this->persona->updateData('persona', $statusData, $id);

					$this->session->set_flashdata('message', ucfirst($field) . ' Actualizado con éxito');

					if (isset($_GET['redirect']) && $_GET['redirect'] != '') {

						redirect($_GET['redirect']);

					} else {

						redirect('admin/persona');

					}

				} else {

					$this->session->set_flashdata('error', 'Invalid Record Id!');

					redirect('admin/persona');

				}

			} else {

				$this->session->set_flashdata('error', 'Invalid Record Id!');

				redirect('admin/persona');

			}

		}

	}


}
