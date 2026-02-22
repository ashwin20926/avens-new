<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submit_manuscript extends CI_Controller {
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


	      	if ( ! file_exists(APPPATH.'views/pages/submit_manuscript.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = "Avens Publishing Group-Submit Manuscript Page- Manuscript Submission"; // Capitalize the first letter
	        $data['description'] = "Avens Publishing Group is an international Open Access Publisher dealing with Scientific, Technical and Medical Journals. We accept wide range of quality manuscripts of Research, Review, Case reports, Short communications, Letter to Editor Etc. ";
                $data['keywords'] = 'Avens Publishing Group is an international Open Access Publisher dealing with Scientific, Technical and Medical Journals. We accept wide range of quality manuscripts of Research, Review, Case reports, Short communications, Letter to Editor Etc.
';
	        $this->load->model('App_model');		        
	        $data['category_info'] = $this->App_model->get_journals_and_categories();
	        $data['country_info'] = $this->App_model->get_countries();	        

	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/submit_manuscript.php', $data);
	        $this->load->view('templates/footer', $data);
	}
	} 
