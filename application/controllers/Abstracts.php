<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Abstracts extends CI_Controller {
	public function index() {		
		$this->load->model('App_model');
		//print_r($this->uri->segment(1));exit;     
		if($this->uri->segment(1)) {
		    
            $data['fulltext_info'] = $this->App_model->get_abstract_info($this->uri->segment(2));
            
            if ($data['fulltext_info']) {
                //print_r($data['fulltext_info']);exit;
               // print_r( $data['fulltext_info'][0]['post_content']);exit;
    			//echo base_url();exit;
                $data['title'] = $data['fulltext_info'][0]['post_browser_title']?$data['fulltext_info'][0]['post_browser_title']:"Fulltext Article";
                $data['meta_keywords'] = $data['fulltext_info'][0]['post_meta_keywords']?$data['fulltext_info'][0]['post_meta_keywords']:"";
                //$data['journal_name'] = $data['fulltext_info'][0]['post_meta_keywords']?$data['fulltext_info'][0]['post_meta_keywords']:"";
                $data['journal_name'] = $data['fulltext_info'][0]['journal_name']?$data['fulltext_info'][0]['journal_name']:"";
                $data['post_title'] = $data['fulltext_info'][0]['post_title']?$data['fulltext_info'][0]['post_title']:"";
    			$data['citation_fulltext_html_url'] = base_url();
    
                $data['publication_date'] = $data['fulltext_info'][0]['publication_date']?$data['fulltext_info'][0]['publication_date']:"";
                $data['citation_volume'] = $data['fulltext_info'][0]['citation_volume']?$data['fulltext_info'][0]['citation_volume']:"";
                $data['citation_issue'] = $data['fulltext_info'][0]['citation_issue']?$data['fulltext_info'][0]['citation_issue']:"";
                $data['citation_firstpage'] = $data['fulltext_info'][0]['citation_firstpage']?$data['fulltext_info'][0]['citation_firstpage']:"";
                $data['citation_lastpage'] = $data['fulltext_info'][0]['citation_lastpage']?$data['fulltext_info'][0]['citation_lastpage']:"";
    			$data['issn_number'] = $data['fulltext_info'][0]['issn_number']?$data['fulltext_info'][0]['issn_number']:"";
    			$data['post_browser_title_slug'] = $data['fulltext_info'][0]['post_browser_title_slug']?$data['fulltext_info'][0]['post_browser_title_slug']:"";
                $data['json_format'] = $data['fulltext_info'][0]['json_format']?$data['fulltext_info'][0]['json_format']:"";
    			$data['accepted_date'] = $data['fulltext_info'][0]['accepted_date']?$data['fulltext_info'][0]['accepted_date']:"";
        		$data['author_affliations'] = $data['fulltext_info'][0]['author_affliations']?$data['fulltext_info'][0]['author_affliations']:"";
                if($data['fulltext_info'][0]['authors']) {
                    $data['authors'] = explode(',', $data['fulltext_info'][0]['authors']);
                }
                $data['citation_doi'] = $data['fulltext_info'][0]['doi_name']?$data['fulltext_info'][0]['doi_name']:"";
                //$data['article_type'] = $data['fulltext_info'][0]['post_content']?$data['fulltext_info'][0]['article_type']:"";
    			$this->load->view('templates/abstract_header.php', $data);
    			$this->load->view('pages/abstract_view.php', $data);
    			$this->load->view('templates/fulltext_footer.php', $data);   
            } else {
                $this->load->view('404');
            }
		} else {
			$this->load->view('404');
		}

	}
}