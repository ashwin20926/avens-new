<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
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

	        if ( ! file_exists(APPPATH.'views/pages/home.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = "Avens Publishing Group-Home Page-Open Access Journals"; // Capitalize the first letter
 $data['description'] = 'Avens Publishing Group-Home Page-Open Access Journals. Open Access Publications provides all the latest updates and happenings of all the journals of Avens Publishing Group.';
	        $this->load->model('App_model');
	        $data['testi_info'] = $this->App_model->get_testimonials();
	        $data['latest_updates_info'] = $this->App_model->latest_updates_info();	        
	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/home.php', $data);
	        $this->load->view('templates/footer', $data);
	}
	} 
