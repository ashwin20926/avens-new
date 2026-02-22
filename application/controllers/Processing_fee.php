<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Processing_fee extends CI_Controller {
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

 if ( ! file_exists(APPPATH.'views/pages/processing_fee.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = "Avens Publishing Group-Processing Fee Page-Fee Details"; // Capitalize the first letter
$data['description'] = 'All the journals are organized by Avens Publishers, a self supporting organization and do not receive funding from any institution/government. Hence, the operation of the Journal is solely financed by the handling fees received from authors and some academic/corporate sponsors. The handling fees are required to meet maintenance of the journal. Being an open access journals,  does not receive payment for subscription, as the articles are freely accessible over the internet. Authors of articles are required to pay a fair handling fee for processing their articles. However, there are no submission charges. Authors are required to make payment ONLY after their manuscript has been accepted for publication.';
$data['keywords'] = 'processing fee, manuscript publication fee';
	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/processing_fee.php', $data);
	        $this->load->view('templates/footer', $data);
	}
	} 
