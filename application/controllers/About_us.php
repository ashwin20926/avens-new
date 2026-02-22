<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_us extends CI_Controller {
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


	      	if ( ! file_exists(APPPATH.'views/pages/about_us.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = "Avens Publishing Group - About Page"; // Capitalize the first letter
                 $data['description'] = 'Avens Publishing Group is an international, Open Access publisher of peer-reviewed journals encompassing a broad spectrum of scientific research and technological disciplines. Avens originated with a rigid commitment of serving the scientific and research community by inviting innovations and a vision to encourage the existing scientists, experts and young scientists to enlighten the common society';  
$data['keywords'] = 'online journals, open access journals, medical journals, pharma journals, peer reviewed journals, chemistry journals, biology journals, biotechnology journals';
	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/about_us.php', $data);
	        $this->load->view('templates/footer', $data);
	}
	} 
