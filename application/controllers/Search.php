<?php defined('BASEPATH') or exit('No direct script access allowed');


class Search extends CI_Controller
{
	function __construct()

	{

		parent::__construct();

		$this->load->model('Search_model', 'search');

		$this->load->library('pagination');

		$this->load->library('ion_auth');

	}

	function index()
	{

	}

	function fetch_ajax($offset = null)
	{
		$search = array(
			'keyword' => trim($this->input->post('search_text')),
		);

		$limit = 5;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$config['base_url'] = site_url('search/fetch_ajax');
		$config['total_rows'] = $this->search->get_persona($limit, $offset, $search, $count = true);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 2;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a 
									href="" class="active" 
									style="background-color: #1C84C6; color: white; box-shadow: 0 1px 1px #1C84C6;"
									> ';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Siguiente';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Anterior';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = '«';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '»';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$data['total_rows'] = $config['total_rows'];

		$data['personas'] = $this->search->get_persona($limit, $offset, $search, $count = false);

		$data['pagelinks'] = $this->pagination->create_links();

		$this->load->view('admin/search/fetch_ajax', $data);
	}

}
