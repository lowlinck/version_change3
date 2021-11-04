<?php

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('CommentModel', 'news_model');
		$this->load->helper("url");
		$this->load->library('pagination');
		$this->load->library('form_validation');
	}

	function index($offset = 0)
	{
		$config['base_url'] = base_url() . 'welcome/index';
		$config['total_rows'] = $this->news_model->countAll();
		$config['per_page'] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['reuse_query_string'] = TRUE;
		$config['full_tag_open'] = "<ul class='pagination pagination-lg'>";
		$config['full_tag_close'] = "</ul>";
		$config['num_tag_open'] = "<li class='page-item'>";
		$config['num_tag_close'] = "</li>";
		$config['cur_tag_open'] = "<li class='page-item disable'><a class='page-link' href='javascript:void(0)'>";
		$config['cur_tag_close'] = "</a></li>";
		$config['next_tag_open'] = "<li class='page-item'>";
		$config['next_tag_close'] = "</li>";
		$config['prev_tag_open'] = "<li class='page-item'>";
		$config['prev_tag_close'] = "</li>";
		$config['first_tag_open'] = "<li class='page-item'>";
		$config['first_tag_close'] = "</li>";
		$config['last_tag_open'] = "<li class='page-item'>";
		$config['last_tag_close'] = "</li>";
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['attributes'] = array('class' => 'page-link');
		$data['comments'] = $this->news_model->getAll($config['per_page'], $offset);
		$this->pagination->initialize($config);
		$this->load->view('index', $data);
	}
	public function insert()
	{
		if ($this->input->is_ajax_request()) {

			$ajax_data = $this->input->post();
			if ($this->news_model->insert_entry($ajax_data)) {
				$data = array('status' => "Success");
			} else {
				$data = array('status' => "error");
			}
		}
		echo json_encode($data);
	}
}
