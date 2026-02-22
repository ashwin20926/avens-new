<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medical extends CI_Controller {
    public function index() {   

        $this->load->model('App_model');                
        if((strpos($this->uri->segment(3), 'current-issue') !== false) || (strpos($this->uri->segment(3), 'articles-in-press') !== false) || (strpos($this->uri->segment(3), 'archive') !== false) || (strpos($this->uri->segment(3), 'special-issues') !== false) || (strpos($this->uri->segment(3), 'special-issue') !== false)) {                
            //echo '1'; exit;
            $data['archive_info'] = $this->App_model->get_archive_info($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3));
            $data['archive_page_info'] = $this->App_model->archive_page_info($this->uri->segment(2));
            $data['get_sidebar_links'] = $this->App_model->get_sidebar_links($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3));
            $data['links_info'] = $this->App_model->get_sidebar_slugs($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3));


            if(isset($data['archive_info'][0]) && !empty($data['archive_info'][0])) {
                if($data['archive_info'][0]['archive_in'] == '1') {
                    $ar_title = 'Article In Press';
                }else if($data['archive_info'][0]['archive_in'] == '2') {
                    $ar_title = 'Current Issue';
                }else if($data['archive_info'][0]['archive_in'] == '3') {
                    $ar_title = 'Archive';
                }else if($data['archive_info'][0]['archive_in'] == '4') {
                    $ar_title = 'Special Issue';
                }
                if(isset($data) && !empty($data)) {         
                    $data['title'] = $data['archive_info'][0]['category_name'] .' - '. $data['archive_info'][0]['journal_name'] .' - '.$ar_title;
                    $data['description'] = $data['archive_info'][0]['category_name'] .' - '. $data['archive_info'][0]['journal_name'] .' - '.$ar_title;
                }
            } else {
                $data['title'] = '';
                $data['description'] = '';
            }
            $this->load->view('templates/header', $data);
            $this->load->view('pages/archive_info.php', $data);
            $this->load->view('templates/footer', $data);
        } else if((strpos($this->uri->segment(3), 'home') !== false) || (strpos($this->uri->segment(3), 'aims-scope') !== false) || (strpos($this->uri->segment(3), 'aim-and-scope') !== false) || (strpos($this->uri->segment(3), 'aims-and-scope') !== false)  || (strpos($this->uri->segment(3), 'manuscript-work-flow') !== false) || (strpos($this->uri->segment(3), 'current-issue') !== false) || (strpos($this->uri->segment(3), 'articles-in-press') !== false) || (strpos($this->uri->segment(3), 'article-in-press') !== false) || (strpos($this->uri->segment(3), 'archive') !== false) || (strpos($this->uri->segment(3), 'instructions-to-author') !== false) || (strpos($this->uri->segment(3), 'instructions-for-authors') !== false)) {
            $data['post_info'] = $this->App_model->get_journal_post($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3));
            $data['links_info'] = $this->App_model->get_sidebar_slugs($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3));        

            if(isset($data) && !empty($data)) {
                if(isset($data['post_info']) && !empty($data['post_info'])) {
                    if(isset($data['post_info'][0]['post_title_tag']) && !empty($data['post_info'][0]['post_title_tag'])) {
                        $data['title'] = $data['post_info'][0]['post_title_tag'];
                    } else {
                        $data['title'] = $data['post_info'][0]['category_name'] .' - '. $data['post_info'][0]['journal_name'] .' - '.$data['post_info'][0]['post_name'];
                    }

                    $data['description'] =  $data['post_info']['0']['post_meta_description']? $data['post_info']['0']['post_meta_description']:'';
                    $data['keywords'] = $data['post_info'][0]['post_keywords']?$data['post_info'][0]['post_keywords']:'';
                    $this->load->view('templates/header', $data);
                    $this->load->view('pages/post_info.php', $data);
                    $this->load->view('templates/footer', $data);
                } else {
                    $this->load->view('404');
                }
            }
        }else if((strpos($this->uri->segment(3), 'editorial-board') !== false)) {

            $data['eb_info'] = $this->App_model->get_eb_info($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3));

            $data['links_info'] = $this->App_model->get_sidebar_slugs($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3));            
            if(isset($data) && !empty($data)) {         
                $data['title'] = $data['eb_info'][0]['category_name'] .' - '. $data['eb_info'][0]['journal_name'] .' - '.'Editorial Board';                        
                $data['description'] = $data['title'];
            }

            $this->load->view('templates/header', $data);
            $this->load->view('pages/eb_info.php', $data);
            $this->load->view('templates/footer', $data);
        }
        else {
            $this->load->view('404');
        }

    }
}