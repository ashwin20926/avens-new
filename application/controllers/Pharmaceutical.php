<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	function index() {					
		$this->load->view('templates/admin/header');
	    //$this->load->view('pages/'.$page, $data);
	    $this->load->view('templates/admin/content');
	    $this->load->view('templates/admin/footer');
	}
	function login()
	{		
		$this->load->view('templates/admin/header');
	    //$this->load->view('pages/'.$page, $data);
	    $this->load->view('templates/admin/content');
	    $this->load->view('templates/admin/footer');
	}
	function validate_credentials()
	{			
		$this->load->model('Users_model');

		$user_name = $this->input->post('user_name');
		$password = $this->__encrip_password($this->input->post('password'));

		$is_valid = $this->Users_model->validate($user_name, $password);
		
		if($is_valid)
		{
			echo 'if';
			$data = array(
				'user_name' => $user_name,
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('admin/dashboard');
		}
		else // incorrect username or password
		{
			echo 'else';
			$data['message_error'] = TRUE;
			$this->login();	
		}
	}
	function __encrip_password($password) {
        return md5($password);
    }	
	function dashboard() {
		$this->load->model('Users_model');	
		$data = $this->Users_model->get_count();
		if(is_array($data)){
			echo json_encode($data);
		}
		//echo $data;

	}
	function get_categories() {
		$this->load->model('Users_model');	
		$data = $this->Users_model->get_categories();
		if(is_array($data)){
			echo json_encode($data);
		}
		//echo $data;

	}
	function get_journals() {
		$this->load->model('Users_model');	
		$data = $this->Users_model->get_journals();
		if(is_array($data)){
			echo json_encode($data);
		}
		//echo $data;

	}
	function get_journals_posts() {
		$this->load->model('Users_model');	
		$data = $this->Users_model->get_journals_posts();
		$journal_data = $this->Users_model->get_journals_and_categories();

		if(is_array($data)){
			echo json_encode($data);
		}
		//echo $data;

	}
	function get_journals_archives() {
		$this->load->model('Users_model');	
		$data = $this->Users_model->get_journals_archives();
		//$journal_data = $this->Users_model->get_journals_and_categories();

		if(is_array($data)){
			echo json_encode($data);
		}
		//echo $data;

	}
	function get_main_category() {
		$this->load->model('Users_model');
		$cat_id = $this->input->get('id');
		$data = $this->Users_model->get_main_category($cat_id);
		if(is_array($data)) {
			echo json_encode($data);
		}
		//echo $data;

	}
	function insert_main_category() {
		$obj=json_decode(file_get_contents('php://input'));
		//print_r($obj->category_name);exit;
		//print_r($obj);exit;
		$this->load->model('Users_model');
		$cat_id = $obj->category_id;
		$cat_name = $obj->category_name;
		if($cat_id) {
			$data = $this->Users_model->insert_main_category($cat_id,$cat_name);			
			if($data){
				$status = array('status' => true,"message" => 'Category Edited Successfully');
			}
		} else {
			$data = $this->Users_model->insert_main_category($cat_id,$cat_name);			
			if($data) {
				$status = array('status' => true,"message" => 'Category Added Successfully');			
			}
			
		}
		
		echo json_encode($status);		
	}
	function insert_journal() {
		$obj=json_decode(file_get_contents('php://input'));
		//print_r($obj);exit;		
		$this->load->model('Users_model');			
		$journal_id = $obj->id;	
		if($journal_id) {
			$data = $this->Users_model->insert_journal($obj);			
			if($data){
				$status = array('status' => true,"message" => 'Journal Edited Successfully');
			}
		} else {
			$data = $this->Users_model->insert_journal($obj);			
			if($data) {
				$status = array('status' => true,"message" => 'Journal Added Successfully');			
			}
			
		}
		
		echo json_encode($status);		
	}
	function get_LatestArticles() {
		$this->load->model('Users_model');	
		$data = $this->Users_model->get_LatestArticles();
		if(is_array($data)){
			echo json_encode($data);
		}
		//echo $data;

	}

	function get_journal() {
		$this->load->model('Users_model');
		$journal_id = $this->input->get('id');
		$data = $this->Users_model->get_jounal($journal_id);
		if(is_array($data)) {
			echo json_encode($data);
		}
	}
	function get_journalPage() {
		$this->load->model('Users_model');
		$page_id = $this->input->get('id');
		$data['post_info'] = $this->Users_model->get_journalPage($page_id);
		$data['journal_info'] = $this->Users_model->get_journals_and_categories();
		if(is_array($data)) {
			echo json_encode($data);
		}	
	}
	function update_journal_page() {
		$this->load->model('Users_model');
		$obj=json_decode(file_get_contents('php://input'));		
		if(isset($obj->id) && !empty($obj->id)) {
			$data = $this->Users_model->update_journal_page($obj);			
			if($data){
				$status = array('status' => true,"message" => 'Journal Post Edited Successfully');
			}
		} else {
			$data = $this->Users_model->update_journal_page($obj);			
			if($data) {
				$status = array('status' => true,"message" => 'Journal post Added Successfully');			
			}
			
		}		
		echo json_encode($data);
	}
	function get_journal_archive() {
		$this->load->model('Users_model');
		$archive_id = $this->input->get('id');
		$data['archive_info'] = $this->Users_model->get_journal_archive($archive_id);
		$data['journal_info'] = $this->Users_model->get_journals_and_categories();
		if(is_array($data)) {
			echo json_encode($data);
		}
	}
	function get_latest_Article() {
		$this->load->model('Users_model');
		$article_id = $this->input->get('id');
		$data['article_info'] = $this->Users_model->get_latest_Article($article_id);		
		$data['journal_info'] = $this->Users_model->get_journals_and_categories();
		if(is_array($data)) {
			echo json_encode($data);
		}
	}
	function update_archive() {
		$this->load->model('Users_model');
		$obj=json_decode(file_get_contents('php://input'));				
		if(isset($obj->id) && !empty($obj->id)) {
			$data = $this->Users_model->update_archive($obj);			
			if($data){
				$status = array('status' => true,"message" => 'Journal Archive Edited Successfully');
			}
		} else {
			$data = $this->Users_model->update_archive($obj);			
			if($data) {
				$status = array('status' => true,"message" => 'Journal Archive Added Successfully');			
			}
			
		}		
		echo json_encode($data);
	}
	function update_latest_article() {
		$this->load->model('Users_model');
		$obj=json_decode(file_get_contents('php://input'));				
		if(isset($obj->id) && !empty($obj->id)) {
			$data = $this->Users_model->update_latest_article($obj);			
			if($data){
				$status = array('status' => true,"message" => 'Latest Article Edited Successfully');
			}
		} else {
			$data = $this->Users_model->update_latest_article($obj);			
			if($data) {
				$status = array('status' => true,"message" => 'Latest Article Added Successfully');			
			}
			
		}		
		echo json_encode($data);
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}
}