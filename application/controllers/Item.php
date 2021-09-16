<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('item_model');
		$this->load->helper(['form','helpers_helper']);
    	$this->load->library(['form_validation', 'session']);
	}

	public function index()
	{
		$data['database'] = $this->item_model->get_cost_center();
		$data['title'] = 'Item Stock';
		$this->load->view('item/index', $data);
	}

	public function search()
	{
		// $dt = $this->item_model->get_item_search();
		// foreach ($dt as $key => $value) {
		// 	if($value->){

		// 	}
		// }
		$data['database'] = $this->item_model->get_item_search();
		$data['title'] = 'Item Stock';
		$this->load->view('item/search', $data);
	}

	public function listitem() { 
 		$database = $this->item_model->getitemlist();
        echo json_encode($database);
    }

	public function detail_item( $code, $cc )
	{
		$data['database'] = $this->item_model->get_detail_item($code, $cc);
		$data['code'] = $code;
		$data['cc'] = $cc;

		$this->load->view('item/detailsearch', $data);
	}

	public function addmutation()
	{
		$data['database'] = $this->item_model->get_cost_center();
		$data['item'] = $this->item_model->get_item();
		$data['title'] = 'Item Stock';
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// exit();
		$this->load->view('mutation/index', $data);
	}

	public function postmutation()
	{
		// $this->form_validation->set_message('is_unique', '{field} sudah terpakai');

		// $this->form_validation->set_rules('kdmobil', 'Kode Mobil', ['required', 'is_unique[mobil.kdmobil]']);

		// $this->validasi();

		// if($this->form_validation->run() === FALSE)
		// {
		// 	$this->addmutation();
		// }
		// else
		// {
		// 	$this->item_model->createmutation();
		// 	$this->session->set_flashdata('input_sukses','Data mutasi berhasil di input');
		// 	redirect('addmutation');
		// }
		$this->item_model->createmutation();
		$this->session->set_flashdata('input_sukses','Data mutasi berhasil di input');
		redirect('addmutation');
		
	}

	public function validasi()
	{
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');

		$config = [[
					'field' => 'src',
					'label' => 'source',
					'rules' => 'required'
				],
				[
					'field' => 'dest',
					'label' => 'dest',
					'rules' => 'required'
				]];

		$this->form_validation->set_rules($config);
	}
}
