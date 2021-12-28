<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Direccion extends CI_Controller

{

	function __construct()

	{

		parent::__construct();

		$this->load->library('pagination');

		$this->load->helper('url');

		$this->load->library('ion_auth');

		$this->load->library('form_validation');

		$this->load->model('admin/direccion_model','direccion');

	}



	function index($id=1)

	{

		$cond="";

		$data['searchBy']='';

		$data['searchValue']='';

		$v_fields=$this->direccion->v_fields;

		$per_page_arr = array('5', '10', '20', '50', '100');



		if (isset($_GET['searchValue']) && isset($_GET['searchBy'])) {

			$data['searchBy']=$_GET['searchBy'];

			$data['searchValue']=$_GET['searchValue'];

			if (!empty($_GET['searchValue']) && $_GET['searchValue']!="" && !empty($_GET['searchBy']) && $_GET['searchBy']!="" ) {

					$cond="true";

			}

		}



		$data['sortBy']='';

        $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields)?$_GET['sortBy']:'';

        $order = isset($_GET['order']) && $_GET['order']=='asc'?'asc':'desc';

        $searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields)?$_GET['searchBy']:null;

        $searchValue = isset($_GET['searchValue'])?$_GET['searchValue']:'';

        $searchValue = addslashes($searchValue);



		if(isset($_GET['sortBy']) && $_GET['sortBy']!=''){

			$data['sortBy']=$_GET['sortBy'];

			if(isset($_GET['order']) && $_GET['order']!=''){

				$_GET['order']=$_GET['order']=='asc'?'desc':'asc';

			} else{

				$_GET['order']='desc';

			}

		}



		$get_q = $_GET;

		foreach ($v_fields as $key => $value) {

			$get_q['sortBy'] = $value;

			$query_result = http_build_query($get_q);

			$data['fields_links'][$value] =current_url().'?'.$query_result;

		}

		$data['csvlink'] = base_url().'admin/direccion/export/csv';

		$data['pdflink'] = base_url().'admin/direccion/export/pdf';

		$data['per_page'] = isset($_GET['per_page']) && in_array($_GET['per_page'], $per_page_arr)?$_GET['per_page']:"5";



		// PAGINATION

		$config = array();

		$config['suffix']='?'.$_SERVER['QUERY_STRING'];

        $config["base_url"] = base_url() . "admin/direccion/index";

        $total_row = $this->direccion->getCount('direccion', $searchBy, $searchValue);

        $config["first_url"] = base_url()."admin/direccion/index".'?'.$_SERVER['QUERY_STRING'];

        $config["total_rows"] = $total_row;

        $config["per_page"] = $per_page = $data['per_page'];

        $config["uri_segment"] = $this->uri->total_segments();

        $config['use_page_numbers'] = TRUE;

        $config['num_links'] = 3; //$total_row

        $config['cur_tag_open'] = '&nbsp;<a class="current">';

        $config['cur_tag_close'] = '</a>';

        $config['full_tag_open'] = "<ul class='pagination'>";

		$config['full_tag_close'] ="</ul>";

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



        if($this->uri->segment(2)){

        	$cur_page = $id;

        	$pagi = array("cur_page"=>($cur_page-1)*$per_page, "per_page"=>$per_page, 'order'=>$order, 'order_by'=>$order_by);

        }

        else{	

    		$pagi = array("cur_page"=>0, "per_page"=>$per_page);

    	}



        $data["results"] = $result = $this->direccion->getList("direccion",$pagi);

        $str_links = $this->pagination->create_links();



        $data["links"] = $str_links;

        // ./ PAGINATION /.



		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

        }

		else {

			$data['direccion']  = $this->direccion->getList('direccion');

		    $this->load->view('admin/direccion/manage',$data);

		}

	}



	public function add()

	{   

		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}



	    $data = NULL;



		$this->form_validation->set_rules('direccion', 'Direccion Name', 'required');
		$this->form_validation->set_rules('barrio', 'Barrio Name', 'required');
		$this->form_validation->set_rules('ciudad', 'Ciudad Name', 'required');
		$this->form_validation->set_rules('fecha_registro', 'Fecha_registro Name', 'required');
		$this->form_validation->set_rules('no_ficha', 'No_ficha Name', 'required|exact_length[8]');
			



        $data['errors'] = array();

        if($this->form_validation->run() == FALSE) 

        {

			$data["barrio"]=$this->direccion->getListTable("barrio");$data["ciudad"]=$this->direccion->getListTable("ciudad");$data["hogar"]=$this->direccion->getListTable("hogar");

		

			$this->load->view('admin/direccion/add', $data);

        }

        else

        {

			$saveData['direccion'] = set_value('direccion');
			$saveData['barrio'] = set_value('barrio');
			$saveData['ciudad'] = set_value('ciudad');
			$saveData['fecha_registro'] = set_value('fecha_registro');
			$saveData['no_ficha'] = set_value('no_ficha');


			$no_ficha_ = set_value('no_ficha');
			$insert_id = $this->direccion->insert('direccion',$saveData);

			

			$this->session->set_flashdata('message', 'Direccion agregado exitosamente!');
			//header("Location: admin/direccion/index/?no_ficha_=$no_ficha_");
			//redirect("admin/direccion"."?no_ficha_=".$no_ficha_);
			redirect("admin/persona/index/no_ficha/$no_ficha_"."?no_ficha_=".$no_ficha_);

	   }

	}



	function view($id)

	{



	  if (!$this->ion_auth->logged_in()) {

	  redirect('/auth/login/');

	  }



	  if(isset($id) and !empty($id))

	  {

	   $data = NULL;



		$this->form_validation->set_rules('direccion', 'Direccion Name', 'required');
		$this->form_validation->set_rules('barrio', 'Barrio Name', 'required');
		$this->form_validation->set_rules('ciudad', 'Ciudad Name', 'required');
		$this->form_validation->set_rules('fecha_registro', 'Fecha_registro Name', 'required');
		$this->form_validation->set_rules('no_ficha', 'No_ficha Name', 'required|exact_length[8]');




       $data['errors'] = array();

       if($this->form_validation->run() == FALSE) 

       {

      	$data["barrio"]=$this->direccion->getListTable("barrio");$data["ciudad"]=$this->direccion->getListTable("ciudad");$data["hogar"]=$this->direccion->getListTable("hogar");

      	

      	

        $data['direccion']=$this->direccion->getRow('direccion',$id);

        $this->load->view('admin/direccion/view', $data);

       }

       else

       {

		redirect('admin/direccion/view');

       }

    }

    else

    {


       redirect('admin/direccion/view');

	}

  }



	function edit($id)

    {

	 	if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}



		if(isset($id) and !empty($id))

		{

			$data = NULL;



			    		$this->form_validation->set_rules('direccion', 'Direccion Name', 'required');
		$this->form_validation->set_rules('barrio', 'Barrio Name', 'required');
		$this->form_validation->set_rules('ciudad', 'Ciudad Name', 'required');
		$this->form_validation->set_rules('fecha_registro', 'Fecha_registro Name', 'required');
		$this->form_validation->set_rules('no_ficha', 'No_ficha Name', 'required|exact_length[8]');




            $data['errors'] = array();

            if($this->form_validation->run() == FALSE) 

            {

            	

            	

              	$data['direccion']=$this->direccion->getRow('direccion',$id);

              	$data["barrio"]=$this->direccion->getListTable("barrio");$data["ciudad"]=$this->direccion->getListTable("ciudad");$data["hogar"]=$this->direccion->getListTable("hogar");

				$this->load->view('admin/direccion/edit', $data);

            }

            else

            {

			   				$saveData['direccion'] = set_value('direccion');
			$saveData['barrio'] = set_value('barrio');
			$saveData['ciudad'] = set_value('ciudad');
			$saveData['fecha_registro'] = set_value('fecha_registro');
			$saveData['no_ficha'] = set_value('no_ficha');
					

				$this->direccion->updateData('direccion',$saveData,$id);

				

				$this->session->set_flashdata('message', 'Dirección actualizada con éxito!');

				redirect('admin/direccion');

            }

		}

		else

		{

			$this->session->set_flashdata('message', ' Identificación invalida !');

		    redirect('admin/direccion');

		}

	 }



	 function delete($id='')

     {

		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}



 		if(isset($id) and !empty($id))

		{

			$count=$this->direccion->getCount('direccion','direccion.id_direccion',$id);

			if(isset($count) and !empty($count))

			{

				$this->direccion->delete('direccion','id_direccion',$id);

				$this->session->set_flashdata('message', ' Dirección eliminada con éxito !');

	            echo "success";

           		exit;

			}

			else

			{

				$this->session->set_flashdata('message', ' Identificación invalida !');

			}

		}

		else

		{

			$this->session->set_flashdata('message', ' Identificación invalida !');

		}

	}



	function deleteAll($id='')

    {



		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}



		$all_ids = $_POST["allIds"];



 		if(isset($all_ids) and !empty($all_ids))

		{

			

			//$count=$this->direccion->getCount('direccion','direccion.id',$id);

			for($a=0; $a<count($all_ids); $a++)

	  		{

	  			if($all_ids[$a]!="")

	  			{

					$this->direccion->delete('direccion','id_direccion',$all_ids[$a]);

					$this->session->set_flashdata('message', 'Direccion(es) eliminada(s) con éxito !');

					//$this->session->set_flashdata('message', 'Direccion(es) eliminada(s) con éxito !');

				}

	  		}	



            echo "success";

       		exit;

		}

		else

		{

			$this->session->set_flashdata('message', ' Identificación invalida !');

		}

	}



	function export($filetype='csv'){



		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}

		

		$searchBy='';

		$searchValue='';

		$v_fields=array('direccion', 'barrio', 'ciudad', 'fecha_registro', 'no_ficha');



		$data['sortBy']='';



        $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $v_fields)?$_GET['sortBy']:'';

        $order = isset($_GET['order']) && $_GET['order']=='asc'?'asc':'desc';



        $searchBy = isset($_GET['searchBy']) && in_array($_GET['searchBy'], $v_fields)?$_GET['searchBy']:null;

        $searchValue = isset($_GET['searchValue'])?$_GET['searchValue']:'';

        $searchValue = addslashes($searchValue);

        $pagi = array('order'=>$order, 'order_by'=>$order_by);



		$result = $this->direccion->getList("direccion");



		if($filetype=='csv'){

			header('Content-Type: application/csv');

			header('Content-Disposition: attachment; filename=direccion.csv');

			header('Pragma: no-cache');

			$csv='Sr. No,'.implode(',', $v_fields)."\n";

			foreach ($result as $key => $value) {

				$line=($key+1).',';

				foreach ($v_fields as $field) {

					$line.='"'.addslashes($value->$field).'"'.',';

				}

				$csv.=ltrim($line,',')."\n";

			}

			echo $csv; exit;

		} elseif ($filetype=='pdf'){

			error_reporting(0);

			ob_start();

			$this->load->library('m_pdf');

			$table='

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

			<h1 align="center">Direccion</h1>

			<table><tr>';

			$table.='<th>Sr. No</th>';

			foreach ($v_fields as $value) {

				$table.='<th>'.$value.'</th>';

			}

			$table.='</tr>';

			foreach ($result as $key => $value) {

				$table.='<tr><td>'.($key+1).'</td>';

				foreach ($v_fields as $field) {

					$table.='<td>'.$value->$field.'</td>';

				}

				$table.='</tr>';

			}

			$table.='</table></body></html>';

			ob_clean();

			$pdf = $this->m_pdf->load();

			$pdf->WriteHTML($table);

			$pdf->Output('direccion.pdf', "D");

			exit;

		} else{

			echo 'Invalid option'; exit;

		}

	}





	function status($field,$id)

	{

		if (!$this->ion_auth->logged_in()) {

			redirect('/auth/login/');

		}



		if (in_array($field, array()))

		{

			if(isset($id) && !empty($id))

			{

				if (!is_null($direccion=$this->direccion->getRow('direccion',$id)))	

				{					

					$status = $direccion->$field;				

					if($status == 1){

						$status = 0;

					}else{

						$status = 1;

					}

						$statusData[$field] = $status;

						$this->direccion->updateData('direccion',$statusData,$id);

						$this->session->set_flashdata('message', ucfirst($field).' Actualizado con éxito');

						if(isset($_GET['redirect']) && $_GET['redirect']!=''){

							redirect($_GET['redirect']);

						} else{

							redirect('admin/direccion');

						}

				}else{

						$this->session->set_flashdata('error', 'Invalid Record Id!');

						redirect('admin/direccion');

				}

			}

			else

			{

				$this->session->set_flashdata('error', 'Invalid Record Id!');

				redirect('admin/direccion');

			}

		}

	}





}



