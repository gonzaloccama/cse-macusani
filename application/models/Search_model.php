<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Search_model extends CI_Model
{
	function __construct()

	{
		parent::__construct();
	}

	public function fetch_data_($query, $limit = 10)
	{
		$this->db->select("persona.*, sexo.sexo");
		$this->db->from("persona");

		$this->db->join("sexo", "persona.sexo = sexo.id_sexo");

		if ($query != '') {
			//$this->db->where('dni', 1);
			$this->db->like('dni', $query);
			$this->db->or_like('nombres', $query);
			$this->db->or_like('ape_pat', $query);
			$this->db->or_like('ape_mat', $query);
			$this->db->or_like('no_ficha', $query);
			$this->db->or_like('concat(nombres," ",ape_pat," ", ape_mat)', $query);
		}

		$this->db->limit($limit);
		$this->db->order_by('ape_pat', 'ASC');
		$this->db->order_by('ape_mat', 'ASC');

		return $this->db->get();

	}

	public function get_persona($limit, $offset, $search, $count)
	{
		//$this->db->set('@i');
		$this->db->select('persona.*, sexo.sexo');
		$this->db->from('persona');

		$this->db->join('sexo', 'persona.sexo = sexo.id_sexo');

		if($search){
			$keyword = $search['keyword'];
			if($keyword){
				$this->db->like('dni', $keyword);
				$this->db->or_like('nombres', $keyword);
				$this->db->or_like('ape_pat', $keyword);
				$this->db->or_like('ape_mat', $keyword);
				$this->db->or_like('no_ficha', $keyword);
				$this->db->or_like('concat(nombres," ",ape_pat," ", ape_mat)', $keyword);
			}
		}
		if($count){
			return $this->db->count_all_results();
		}
		else {
			$this->db->limit($limit, $offset);
			
			$this->db->order_by('ape_pat asc');
			$this->db->order_by('ape_mat asc');

			$query = $this->db->get();

			if($query->num_rows() > 0) {
				//var_dump($query->result());
				return $query->result();
			}
		}

		return array();
	}

}
