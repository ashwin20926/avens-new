<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feed extends CI_Controller {
	public function index() {		
		$this->load->helper('xml');
		$this->load->helper('text');
		$this->load->model('Feed_model');

		$data['feed_name'] = 'avensonline.org';
        $data['encoding'] = 'utf-8';
        $data['feed_url'] = 'http://avensonline.org/feed';
        $data['page_description'] = 'What my site is about comes here';
        $data['page_language'] = 'en-en';
        $data['creator_email'] = 'mail@me.com';
        $data['archive_info'] = $this->Feed_model->get_archive_info($this->input->get('cat'),$this->input->get('journal'),$this->input->get('type'));
        header("Content-Type: application/rss+xml");
         
        $this->load->view('rss', $data);

	}
	public function xmlformat() {		
		$this->load->helper('xml');
		$this->load->helper('text');
		$this->load->model('Feed_model');

		$data['feed_name'] = 'avensonline.org';
        $data['encoding'] = 'utf-8';
        $data['feed_url'] = 'http://www.avensonline.org/feed';
        $data['page_description'] = 'What my site is about comes here';
        $data['page_language'] = 'en-en';
        $data['archive_info'] = $this->Feed_model->get_fulltext_by_id($this->input->get('fulltext_id'));
        header("Content-Type: application/rss+xml");
         //print_r(json_decode($data['archive_info'][0]['post_content']));
        $this->load->view('xmlformat', $data);

	}
}