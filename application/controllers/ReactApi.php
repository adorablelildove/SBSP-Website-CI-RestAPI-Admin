<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
header('Access-Control-Allow-Headers: token, Content-Type');


defined('BASEPATH') OR exit('No direct script access allowed');

class ReactApi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('reactapi_model');
	}

	public function products()
	{
		header("Access-Control-Allow-Origin: *");
		
		$products = $this->reactapi_model->get_products();

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($products));
	}

	public function blogs()
	{
		header("Access-Control-Allow-Origin: *");

		$blogs = $this->reactapi_model->get_blogs();

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($blogs));
	}

	public function blogSidebar()
	{
		header("Access-Control-Allow-Origin: *");

		$blogs = $this->reactapi_model->blogSidebar();

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($blogs));
	}

	public function blogDetails($id_blog='')
	{	
		header("Access-Control-Allow-Origin: *");

		$blogDetails = $this->reactapi_model->get_blog_details($id_blog);

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($blogDetails));
	}

	public function allProducts()
	{
		header("Access-Control-Allow-Origin: *");
		
		// load library
		// $this->load->library('pagination');

		// pagination config
		// $config['base_url'] = 'http://localhost/sbsp/#/product/allProducts';
		// $config['total_rows'] = $this->reactapi_model->countAllProducts();
		// $config['per_page'] = 3;

		// initialize
		// $this->pagination->initialize($config);

		$allproducts = $this->reactapi_model->get_all_products();

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($allproducts));
	}
}

 ?>