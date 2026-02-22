<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
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
$data['description'] = $data['title'];
$data['keywords'] = $data['title'];
	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/'.$page, $data);
	        $this->load->view('templates/footer', $data);
	}*/
	public function index()
	{						
	      if ( ! file_exists(APPPATH.'views/pages/contact.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = "Avens Publishing Group - Contact Page"; // Capitalize the first letter
$data['description'] = $data['title'];
$data['keywords'] = $data['title'];
	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/contact.php', $data);
	        $this->load->view('templates/footer', $data);
	}
	} 
