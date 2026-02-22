<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journals extends CI_Controller {
	public function __construct() { 
		parent::__construct(); 
		$this->load->helper(array('form', 'url')); 
  	}
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
	/*public function view($page = 'home')
	{			
	        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = ucfirst($page); // Capitalize the first letter

	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/'.$page, $data);
	        $this->load->view('templates/footer', $data);
	}*/
	public function index()
	{			


	      	 if ( ! file_exists(APPPATH.'views/pages/journals.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }
		$this->load->model('App_model');		        
	        $data['title'] = " Avens Publishing Group-Journal Page-Journals"; // Capitalize the first letter
	        $data['description'] = "Avens Publishing Group international, Open Access publisher of peer-reviewed journals. We are in our way to serve the scientific community with 46 international Open Access peer-reviewed journals with our aim of Inviting Innovations."; 
	        $data['keywords'] = "online journals, open access journals, medical journals, pharma journals, peer reviewed journals, chemistry journals, biology journals, biotechnology journals"; 
	        $data['j_info'] = $this->App_model->get_journals('category-wise');	        
	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/journals.php', $data);
	        $this->load->view('templates/footer', $data);
	}
	} 
