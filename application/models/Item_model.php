<?php

class Item_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_cost_center()
	{
		$this->db->from("costcenter");
		$query = $this->db->get();
		return $query->result();
	}

	public function get_item()
	{
		$this->db->from("item");
		$query = $this->db->get();
		return $query->result();
	}

	public function get_item_search()
	{
		if(!empty($this->input->post('search')) ){
			$this->db->from("item_cc");
			$this->db->where('cc', $this->input->post('search'));
			$query = $this->db->get();
		}else{
			$this->db->from("item_cc");
			$query = $this->db->get();
		}
		
		return $query->result();
	}

	public function get_detail_item($code, $cc)
	{
		$this->db->select("*");
		$this->db->from("item_record");
    	$this->db->where('item_code', $code);
    	$this->db->where('cc', $cc);
		$result = $this->db->get();

		return $result->result();
	}

	public function max_id()
	{
		$this->db->select_max('code');
		$this->db->from('mutation');
	    $result = $this->db->get();

		return $result->row();
	}

	public function getitemlist()
	{
		$this->db->select("*");
		$this->db->from('item');
	    $result = $this->db->get();

		return $result->result();
	}

	public function createmutation()
	{
		$code = $this->max_id();
		$urutan = (int) substr($code->code, -1);
		$urutan++;
		$huruf = "MT/901/2108/";
		$kodeMutasi = $huruf . sprintf("%05s", $urutan);

		$mutation = array (
				'code' => $kodeMutasi,
				'src' => $this->input->post('source'),
				'dest' => $this->input->post('dest'),
				'mutationdate' => date('Y-m-d',strtotime('now')),
            );

		$this->db->insert('mutation', $mutation);

		$id_mutation = $this->db->insert_id();
	    $item = count($this->input->post('item'));
        foreach ($this->input->post('item') as $i => $value) {
        	$data = array (
				'mutationid'=> $id_mutation,
				'itemcode'=> $this->input->post('item')[$i],
				'qty'=> $this->input->post('qty')[$i],
				'weight'=> $this->input->post('weight')[$i]
            );
            $this->db->insert('mutation_item',$data);
        }
        foreach ($this->input->post('item') as $i => $value) {
            $record1 = array (
				'item_code'=> $this->input->post('item')[$i],
				'cc'=> $this->input->post('source'),
				'debitqty'=> 0,
				'debitweight'=> 0,
				'creditqty' => $this->input->post('qty')[$i],
				'creditweight' => $this->input->post('weight')[$i],
				'note' => 'Stok Keluar untuk Mutasi #'.$kodeMutasi,
				'createdate' => date('Y-m-d H:i:s',strtotime('now'))
            );
            $this->db->insert('item_record',$record1);
        }

        foreach ($this->input->post('item') as $i => $value) {
            $record2 = array (
				'item_code'=> $this->input->post('item')[$i],
				'cc'=> $this->input->post('dest'),
				'debitqty'=> $this->input->post('qty')[$i],
				'debitweight'=> $this->input->post('weight')[$i],
				'creditqty' => 0,
				'creditweight' => 0,
				'note' => 'Stok Masuk untuk Mutasi #'.$kodeMutasi,
				'createdate' => date('Y-m-d H:i:s',strtotime('now'))
            );
            $this->db->insert('item_record',$record2);
        }
	    
	}


}

?>