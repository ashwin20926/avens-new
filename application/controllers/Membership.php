<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membership extends CI_Controller {
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
	        if ( ! file_exists(APPPATH.'views/pages/membership.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = "Avens Publishing Group - Membership Page"; // Capitalize the first letter
 $data['description'] = 'Avens takes a privilege to serve the scientific community, students and researchers with pristine and refined research works and even invites the innovations. As a novice publisher we are introducing you with our Individual and Institutional Memberships as a warm welcome to the budding researchers and our future collaborators.';
                $data['keywords'] = 'Individual Membership fee, Institutional Membership fee';
	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/membership.php', $data);
	        $this->load->view('templates/footer', $data);
	}
	} 
