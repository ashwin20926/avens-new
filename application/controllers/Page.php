<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	public function __construct() { 
		parent::__construct(); 
		$this->load->helper(array('form', 'url')); 
                $this->load->library('email');
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
	/*public function index()
	{			

	        if ( ! file_exists(APPPATH.'views/pages/home.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = "Home Page"; // Capitalize the first letter
	        $this->load->model('App_model');
	        $data['testi_info'] = $this->App_model->get_testimonials();	        
	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/home.php', $data);
	        $this->load->view('templates/footer', $data);
	}*/
	/*public function about_us()
	{						
	        if ( ! file_exists(APPPATH.'views/pages/about_us.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = "About Page"; // Capitalize the first letter

	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/about_us.php', $data);
	        $this->load->view('templates/footer', $data);
	}*/
	/*public function journals()
	{						
	        if ( ! file_exists(APPPATH.'views/pages/journals.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }
			$this->load->model('App_model');		        
	        $data['title'] = "Journal Page"; // Capitalize the first letter
	        $data['j_info'] = $this->App_model->get_journals('category-wise');	        
	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/journals.php', $data);
	        $this->load->view('templates/footer', $data);
	}*/
	/*public function submit_manuscript()
	{						
	        if ( ! file_exists(APPPATH.'views/pages/submit_manuscript.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = "Submit Manuscript Page"; // Capitalize the first letter
	        $this->load->model('App_model');		        
	        $data['category_info'] = $this->App_model->get_journals_and_categories();
	        $data['country_info'] = $this->App_model->get_countries();	        

	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/submit_manuscript.php', $data);
	        $this->load->view('templates/footer', $data);
	}*/
	/*public function processing_fee()
	{						
	        if ( ! file_exists(APPPATH.'views/pages/processing_fee.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = "Processing Fee Page"; // Capitalize the first letter

	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/processing_fee.php', $data);
	        $this->load->view('templates/footer', $data);
	}*/
	/*public function collaborations()
	{						
	        if ( ! file_exists(APPPATH.'views/pages/collaborations.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = "Collaborations Page"; // Capitalize the first letter
        	$this->load->model('App_model');	
	        $this->load->view('templates/header', $data);
	        $data['country_info'] = $this->App_model->get_countries();	        
	        $this->load->view('pages/collaborations.php', $data);
	        $this->load->view('templates/footer', $data);
	}*/
	/*public function membership()
	{						
	        if ( ! file_exists(APPPATH.'views/pages/membership.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = "Membership Page"; // Capitalize the first letter

	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/membership.php', $data);
	        $this->load->view('templates/footer', $data);
	}*/
	/*public function policies()
	{						
	        if ( ! file_exists(APPPATH.'views/pages/policies.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = "Policies Page"; // Capitalize the first letter

	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/policies.php', $data);
	        $this->load->view('templates/footer', $data);
	}*/
	/*public function contact()
	{						
	    if ( ! file_exists(APPPATH.'views/pages/contact.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = "Contact Page"; // Capitalize the first letter

	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/contact.php', $data);
	        $this->load->view('templates/footer', $data);
	}*/
	public function search() {
		if ( ! file_exists(APPPATH.'views/pages/search.php'))
        {
           show_404();
        }

		$this->load->model('App_model');
		$data['search_results'] = $this->App_model->get_search_results($_GET['s']);
        $data['title'] = "Search Page";

        $this->load->view('templates/header', $data);
        $this->load->view('pages/search.php', $data);
        $this->load->view('templates/footer', $data);
		
	}
	public function testimonials() {
		if ( ! file_exists(APPPATH.'views/pages/testimonials.php'))
        {
           show_404();
        }

		$this->load->model('App_model');		
        $data['title'] = "Testimonials Page";
        $data['testimonials'] = $this->App_model->get_testimonials();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/testimonials.php', $data);
        $this->load->view('templates/footer', $data);
		
	}
	public function get_journals() {			
		$this->load->model('App_model');	
		$data['j_info'] = $this->App_model->get_journals($this->input->get('sort_type'));
		$data['sort_type'] = $this->input->get('sort_type');		
		/*$temp = array();
		foreach ($data as $key => $value) {
			if($value['category_name'] == 'Medical') {
				$temp['medical'][] = $value;
			} else if($value['category_name'] == 'Biotechnology') {
				$temp['biotechnology'][] = $value;
			} else if($value['category_name'] == 'Pharmaseutical') {
				$temp['pharmaceutical'][] = $value;
			} else if($value['category_name'] == 'Biology') {
				$temp['biology'][] = $value;
			}
		}*/		
		/*if(is_array($data)){
			echo json_encode($data);
		}	*/
		echo $this->load->view('pages/ajax_journals', $data,TRUE);	
	}

	public function get_latest_journals() {
		$this->load->model('App_model');

		//sanitize post value
		if($this->input->post("page")) {
			$page_number = $this->input->post("page");
		if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
		} else{
			$page_number = 1;
		}

		//get current starting point of records
		$position = (($page_number-1) * 5);

		$data['latest_articles'] = $this->App_model->get_latest_journals($position);

		echo $this->load->view('pages/ajax_latest_articles', $data,TRUE);	
	}
	public function save_submit_manuscript() {
				
		/*$attachment_file=$_FILES["uploadfile"];
		$output_dir = "./public/images";
		$fileName = $_FILES["uploadfile"]["name"];
		move_uploaded_file($_FILES["uploadfile"]["tmp_name"],$output_dir.$fileName);
		echo "File uploaded successfully"*/;

		$config['upload_path']          = './public/images';
        $config['allowed_types']        = 'jpg|png|doc|docx';
        $config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
 	
        $this->load->library('upload', $config); 

        $all_files_uploads = true;
        foreach ($_FILES as $key => $value) {

        	if ( ! $this->upload->do_upload($key))
	        {
                $all_files_uploads = false;

	        }
	        else
	        {
	            $data = array('upload_data' => $this->upload->data());
	        }	
        }
        print_r($all_files_uploads);
        if($all_files_uploads) {
        	echo 'success';
        }

		
	}
	public function upload_files() {
		$config['upload_path']          = './public/images';
        $config['allowed_types']        = 'zip|docx|pdf|tar|rar|doc';
        $config['max_size']             = 25 * 1024 *1024;        
 	
        $this->load->library('upload', $config); 
    	
        foreach ($_FILES as $key => $value) {        	        	
        	if($value['name']) {        		
	        	if ( ! $this->upload->do_upload($key))
		        {
	                $data = array('error' => $this->upload->display_errors());	                

		        }
		        else
		        {		        	
		            $data[] = array('upload_data' => $this->upload->data());		            

		        }
	        }	
        }               
		echo json_encode($data, true);
	}
	public function save_submit_manuscript_info() {		


		$this->load->model('App_model');
		$responce = $this->App_model->save_submit_manuscript_info($_POST);


		if($responce) {
			$status = array('status' => 'success','message' => 'Your Request has been sent Successfully');
		} else {
			$status = array('status' => 'danger','message' => 'Some thing went wrong please try again later');
		}		
		//echo var_dump(json_encode($status));
		echo json_encode($status, true);
	}
	public function save_collab_info() {		
		$this->load->model('App_model');
		$responce = $this->App_model->save_collab_info($_POST);
		if($responce) {
			$status = array('status' => 'success','message' => 'Your Request has been sent Successfully');
		} else {
			$status = array('status' => 'danger','message' => 'Some thing went wrong please try again later');
		}		
		//echo var_dump(json_encode($status));
		echo json_encode($status, true);
	}
public function save_contact_enquiry() {		
		$this->load->model('App_model');
		$responce = $this->App_model->save_contact_enquiry($_POST);
		if($responce) {
			$status = array('status' => 'success','message' => 'Your Request has been sent Successfully');
		} else {
			$status = array('status' => 'danger','message' => 'Some thing went wrong please try again later');
		}		
		//echo var_dump(json_encode($status));
		echo json_encode($status, true);
	}
	public function send_contact_info_mail() {
		print_r($_POST);exit;
	}
public function save_user_signup_info() {		
		$this->load->model('App_model');
		$responce = $this->App_model->save_user_signup_info($_POST);
		if($responce) {
			$status = array('status' => 'success','message' => 'Your Request has been sent Successfully');
		} else {
			$status = array('status' => 'danger','message' => 'Some thing went wrong please try again later');
		}				
		echo json_encode($status, true);	
	}
	public function save_statistics_info() {
		$this->load->model('App_model');
		$archive_id = $this->input->post('id');
		$archive_type = $this->input->post('archive_type');

		$responce = $this->App_model->save_statistics_info($archive_id,$archive_type);

		if($responce) {
			echo json_encode($responce);			
		}

	}
public function journal_statistics() {		
		$this->load->model('App_model');
		if($this->input->get('journal_id')) {
			$data['journal_id'] = $this->input->get('journal_id');
			$data['journal_count'] = $this->App_model->get_journal_article_count($this->input->get('journal_id'));
			$data['view_and_downloads'] = $this->App_model->get_journal_view_and_downloads($this->input->get('journal_id'));				
			$data['citations'] = $this->App_model->get_journal_citations($this->input->get('journal_id'));
$data['impact_factor'] = $this->App_model->get_journal_impact_factor($this->input->get('journal_id'));						
		}
		echo $this->load->view('pages/journal_statistics', $data, TRUE);	
	}
        public function save_scubscribe_info() {

if(isset($_POST["submit"])){
   //print_r($_POST);
   $name =  $_POST["person_name"]? $_POST["person_name"]:'';
   $email =  $_POST["email"]?$_POST["email"]:'';
   $time_wise =  $_POST["time_wise"]?$_POST["time_wise"]:'';
if(!empty($_POST['medical_cat_name'])){
   foreach( $_POST['medical_cat_name'] as $key => $value){
     $medical_string .= $value.',';
   }
}
if(!empty($_POST['bio_cat_name'])){
   foreach( $_POST['bio_cat_name'] as $key => $value){
     $bio_string .= $value.',';
   }
}
if(!empty($_POST['biol_cat_name'])){
  foreach( $_POST['biol_cat_name'] as $key => $value){
     $biol_string .= $value.',';
   }
}
if(!empty($_POST['phar_select_all'])){
foreach( $_POST['phar_select_all'] as $key => $value){
     $phar_string .= $value.',';
   }
}
//  print_r($medical_string);
       $to = 'parameshwer0515@gmail.com';
	$subject = 'Subscribe Enquiry';
	$message .="
	Name :".$name."
	Email :".$email."
        Send me mails :".$time_wise."
        Medical:".$medical_string."
        Biotechnology:".$bio_string."
        Biology:".$biol_string."
        Pharmaceutical:".$phar_string."
 	";
         //print_r($message);
//       $headers = $name;
        $send_status = mail( $to, $subject, $message); 
       if(send_status){
	  echo '<div class="form-group"><div class="col-sm-9">Your Request has been sent successfully</div></div>';
       }
       else{
          	  echo '<div class="form-group"><div class="col-sm-9">Unable to send your request. Please try again later</div></div>';
       } 


}
        }
        
        public function check_email() {
        echo 'test';
         $config['protocol']    = 'smtp';

            $config['smtp_host']    = 'ssl://smtp.gmail.com';

            $config['smtp_port']    = '465';

            $config['smtp_timeout'] = '7';

            $config['smtp_user']    = '';

            $config['smtp_pass']    = '';

            $config['charset']    = 'utf-8';

            $config['newline']    = "\r\n";

            $config['mailtype'] = 'text'; // or html

            $config['validation'] = TRUE; // bool whether to validate email or not      

            $this->email->initialize($config);


            $this->email->from('contact@avensonline.org', 'Avens Group');
            $this->email->to('parameshwer0515@gmail.com'); 


            $this->email->subject('Email Test');

            $this->email->message('Testing the email class.');  

            $this->email->send();

            echo $this->email->print_debugger();

        }
public function generate_sitemap_fulltext() {
	$this->load->model('App_model');		        
	$data['title'] = "Generate Sitemap"; // Capitalize the first letter
	$data['site_map'] = $this->App_model->generate_sitemap_fulltext_and_pdf();	        
	$this->load->view('pages/site_map_fulltext.php', $data);
}
public function generate_sitemap_pdf() {
	$this->load->model('App_model');		        
	$data['title'] = "Generate Sitemap"; // Capitalize the first letter
	$data['site_map_pdf'] = $this->App_model->generate_sitemap_fulltext_and_pdf();	        
	$this->load->view('pages/site_map_pdf.php', $data);
}
public function generate_sitemap_abstract() {
	$this->load->model('App_model');		        
	$data['title'] = "Generate Sitemap"; // Capitalize the first letter
	$data['site_map_pdf'] = $this->App_model->generate_sitemap_abstract();	        
	$this->load->view('pages/site_map_abstract.php', $data);
}
public function get_journal_articles() {
			$this->load->model('App_model');			
			$data['journal_articles'] = $this->App_model->get_journal_articles($this->input->get('journal_id'));	        
			$data['title'] = $data['journal_articles'][0]['journal_name'];
	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/journal_articles.php', $data);
	        $this->load->view('templates/footer', $data);
		}
public function get_journal_impact_factor1() {
			$this->load->model('App_model');			
			$data['journal_articles'] = $this->App_model->get_journal_articles($this->input->get('journal_id'));
			$data['journal_impact_factor_markup'] = $this->App_model->get_journal_impact_factor_markup();
			$data['journal_impact_equation'] = $this->App_model->journal_impact_equation($this->input->get('journal_id'));
			$data['title'] = $data['journal_articles'][0]['journal_name'];			
	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/journal_impact_factor.php', $data);
	        $this->load->view('templates/footer', $data);
		}
} 
