<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Policies extends CI_Controller {
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
	       if ( ! file_exists(APPPATH.'views/pages/policies.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = "Avens Publishing Group - Policies Page"; // Capitalize the first letter
                $data['description'] = 'Avens strictly follows the publication principles of Creative Commons Attribution License under which all the published data is fully and freely accessible to all the readers. This commitment of Avens has lead to the customer satisfaction and increased readership.';
$data['keywords'] = 'Accessibility and Publication Standards, Publication Ethics, Plagiarism/Duplicate Publication, Citation Manipulation, Conflicts of Interest, Copyright, Open access policies Pricing policy, Peer-review policy, Article Withdrawal & Retraction, Reprints';
	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/policies.php', $data);
	        $this->load->view('templates/footer', $data);
	}
	} 
