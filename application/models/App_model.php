<?php

class App_model extends CI_Model {

    /**
    * Validate the login's data with the database
    * @param string $user_name
    * @param string $password
    * @return void
    */    
	function get_journals($sort_type) {
		/*if($sort_type == 'category-wise' || $sort_type == 'atoz' || $sort_type == 'atozincat') {
			$query = $this->db->query("SELECT * FROM wp_journals INNER JOIN wp_journal_main_categories ON wp_journals.main_category_id = wp_journal_main_categories.category_id WHERE wp_journals.deleted ='1' ORDER BY wp_journals.journal_name ASC");
		} else if($sort_type == 'medical') {
			$query = $this->db->query("SELECT * FROM wp_journals INNER JOIN wp_journal_main_categories ON wp_journals.main_category_id = wp_journal_main_categories.category_id WHERE wp_journals.deleted ='1' AND wp_journal_main_categories.category_name = 'Medical' ORDER BY wp_journals.journal_name ASC");
		} else if($sort_type == 'biotechnology') {
			$query = $this->db->query("SELECT * FROM wp_journals INNER JOIN wp_journal_main_categories ON wp_journals.main_category_id = wp_journal_main_categories.category_id WHERE wp_journals.deleted ='1' AND wp_journal_main_categories.category_name = 'Biotechnology' ORDER BY wp_journals.journal_name ASC");
		} else if($sort_type == 'biology') {
			$query = $this->db->query("SELECT * FROM wp_journals INNER JOIN wp_journal_main_categories ON wp_journals.main_category_id = wp_journal_main_categories.category_id WHERE wp_journals.deleted ='1' AND wp_journal_main_categories.category_name = 'Biology' ORDER BY wp_journals.journal_name ASC");
		} else if($sort_type == 'pharmaceutical') {
			$query = $this->db->query("SELECT * FROM wp_journals INNER JOIN wp_journal_main_categories ON wp_journals.main_category_id = wp_journal_main_categories.category_id WHERE wp_journals.deleted ='1' AND wp_journal_main_categories.category_name = 'Pharmaceutical' ORDER BY wp_journals.journal_name ASC");
		}		
		return $query->result_array();*/
		if($sort_type == 'category-wise' || $sort_type == 'atoz' || $sort_type == 'atozincat') {
			$query = $this->db->query("SELECT * FROM wp_journals INNER JOIN wp_journal_posts ON wp_journals.id = wp_journal_posts.journal_id INNER JOIN wp_journal_main_categories ON wp_journals.main_category_id = wp_journal_main_categories.category_id WHERE post_name = 'Home' AND wp_journals.deleted ='1' ORDER BY wp_journals.journal_name ASC");
		}else if($sort_type == 'medical') {
			$query = $this->db->query("SELECT * FROM wp_journals INNER JOIN wp_journal_posts ON wp_journals.id = wp_journal_posts.journal_id INNER JOIN wp_journal_main_categories ON wp_journals.main_category_id = wp_journal_main_categories.category_id WHERE post_name = 'Home' AND wp_journals.deleted ='1' AND wp_journal_main_categories.category_name = 'Medical' ORDER BY wp_journals.journal_name ASC");
		} else if($sort_type == 'biotechnology') {
			$query = $this->db->query("SELECT * FROM wp_journals INNER JOIN wp_journal_posts ON wp_journals.id = wp_journal_posts.journal_id INNER JOIN wp_journal_main_categories ON wp_journals.main_category_id = wp_journal_main_categories.category_id WHERE post_name = 'Home' AND wp_journals.deleted ='1' AND wp_journal_main_categories.category_name = 'Biotechnology' ORDER BY wp_journals.journal_name ASC");
		} else if($sort_type == 'biology') {
			$query = $this->db->query("SELECT * FROM wp_journals INNER JOIN wp_journal_posts ON wp_journals.id = wp_journal_posts.journal_id INNER JOIN wp_journal_main_categories ON wp_journals.main_category_id = wp_journal_main_categories.category_id WHERE post_name = 'Home' AND wp_journals.deleted ='1' AND wp_journal_main_categories.category_name = 'Biology' ORDER BY wp_journals.journal_name ASC");
		} else if($sort_type == 'pharmaceutical') {
			$query = $this->db->query("SELECT * FROM wp_journals INNER JOIN wp_journal_posts ON wp_journals.id = wp_journal_posts.journal_id INNER JOIN wp_journal_main_categories ON wp_journals.main_category_id = wp_journal_main_categories.category_id WHERE post_name = 'Home' AND wp_journals.deleted ='1' AND wp_journal_main_categories.category_name = 'Pharmaceutical' ORDER BY wp_journals.journal_name ASC");
		}		
		return $query->result_array();
		return $query->result_array();

	}
	function get_journal_post ($cat_name,$journal_name,$post_name) {
		
		$query = $this->db->query('SELECT j.id, jp.post_title_tag,jp.post_keywords,jp.post_meta_description,jp.post_name,jp.post_slug,jp.post_content,mc.category_name,j.journal_url_slug, j.journal_name,j.banner_image,j.sidebar_image,j.issn_number FROM wp_journal_posts jp INNER JOIN wp_journals j on jp.journal_id = j.id INNER JOIN wp_journal_main_categories mc on mc.category_id = j.main_category_id WHERE jp.post_slug = "'.$post_name.'" AND mc.category_name = "'.$cat_name.'" AND j.journal_url_slug = "'.$journal_name.'"');
		return $query->result_array();
	}
	function get_archive_info($cat_name,$journal_name,$post_name) {		
		if((strpos($post_name, 'articles-in-press') !== false)) {
			$archive_type = '1';			
		} else if((strpos($post_name, 'current-issue') !== false)) {
			$archive_type = '2';						
		} else if((strpos($post_name, 'archive') !== false)) {			
			$archive_type = '3';						
		}else if((strpos($post_name, 'special-issues') !== false) ||  (strpos($post_name, 'special-issue') !== false)) {			
			$archive_type = '4';						
		}
		
		$query  = $this->db->query('SELECT DISTINCT wt.post_browser_title_slug, wt.json_format, j.journal_name,jp.article_title,jp.article_link,jp.article_authors,jp.doi_name,jp.doi_link,jp.archive_fulltext_views,jp.archive_pdf_views,jp.supli_pdf_views,jp.videos,jp.archive_volume,jp.id,jp.archive_year,jp.archive_desc,jp.archive_volume,jp.archive_fulltext,jp.archive_pdf,jp.supli_pdf,j.journal_url_slug,jp.archive_in, mc.category_name, jv.volume_name FROM 
			wp_journal_archives jp JOIN wp_journals j 			 
			on jp.journal_id = j.id INNER JOIN wp_journal_main_categories mc
			on mc.category_id = j.main_category_id 
			left join wp_journal_volumes jv 
  			on jv.id=jp.archive_volume
  			left join wp_fulltextarticles wt
			on jp.article_title = wt.post_browser_title
			WHERE jp.archive_in = "'.$archive_type.'" AND mc.category_name = "'.$cat_name.'" AND j.journal_url_slug = "'.$journal_name.'" AND jp.deleted="1" AND wt.deleted="1" ORDER BY jp.archive_year ASC,jp.archive_volume ASC,jp.archive_pdf ASC'
			);
		return $query->result_array();
	}
	
	function get_abstract_info1($title) {
    	$temp = explode(".", $title);	
    	$title = str_replace("-"," ", $temp[0]);
    	if(isset($title) && !empty($title)) {
    		$query = $this->db->query('SELECT  wa.doi_name, wa.archive_doi, ft.accepted_date, ft.publication_date,ft.citation_volume,ft.authors,ft.citation_issue,ft.citation_firstpage,ft.citation_lastpage,ft.json_format, ft.post_content,ft.post_title, ft.post_browser_title,ft.post_meta_keywords,j.issn_number,j.journal_name,j.banner_image, j.sidebar_image FROM wp_fulltextarticles ft LEFT JOIN wp_journals j ON ft.journal_id = j.id LEFT JOIN wp_journal_archives wa ON wa.archive_pdf = "'.$title.'.pdf" WHERE ft.post_browser_title ="'.$title.'" AND ft.deleted="1"');
    		return $query->result_array();					
    	}
    }
    
    function get_abstract_info($title) {
    	if(isset($title) && !empty($title)) {
			$pdf = $this->db->query('SELECT post_title FROM wp_fulltextarticles WHERE post_browser_title_slug = "'.$title.'" AND deleted="1"')->result_array();
			//print_r($pdf[0]['post_title']);exit;
    		$query = $this->db->query('
    		SELECT 
    		ft.accepted_date, 
    		ft.publication_date,
    		ft.citation_volume,
    		ft.authors,
    		ft.citation_issue,
    		ft.citation_firstpage,
    		ft.citation_lastpage,
    		ft.json_format, 
    		ft.post_content,
    		ft.post_title, 
    		ft.post_browser_title,
    		ft.post_meta_keywords,
			ft.post_browser_title_slug,
			ft.json_format,
    		j.issn_number,
    		j.journal_name,
    		j.banner_image,
			wa.doi_name,
			ft.author_affliations,
    		j.sidebar_image FROM wp_fulltextarticles ft 
    		LEFT JOIN wp_journals j ON ft.journal_id = j.id 
			LEFT JOIN wp_journal_archives wa ON wa.archive_pdf = "'.$pdf[0]['post_title'].'.pdf"
    		WHERE ft.post_browser_title_slug ="'.$title.'" AND ft.deleted="1"');
    		return $query->result_array();					
    	}
    }

	function archive_page_info($journal_name) {
		$query  = $this->db->query('SELECT * FROM wp_journals WHERE journal_url_slug = "'.$journal_name.'" AND deleted = "1"');
		return $query->result_array();		
	}
	function get_sidebar_links($cat_name,$journal_name,$post_name) {
		if((strpos($post_name, 'articles-in-press') !== false)) {
			$archive_type = '1';			
		} else if((strpos($post_name, 'current-issue') !== false)) {
			$archive_type = '2';						
		} else if((strpos($post_name, 'archive') !== false)) {			
			$archive_type = '3';						
		}else if((strpos($post_name, 'special-issues') !== false) || (strpos($post_name, 'special-issue') !== false)) {			
			$archive_type = '4';						
		}
		if($archive_type == '3') {
			$query = $this->db->query('SELECT * FROM wp_journal_archives jp INNER JOIN wp_journals j on jp.journal_id = j.id INNER JOIN wp_journal_main_categories mc on mc.category_id = j.main_category_id WHERE mc.category_name = "'.$cat_name.'" AND j.journal_url_slug = "'.$journal_name.'"');
		} else {
			$query  = $this->db->query('SELECT * FROM wp_journal_archives jp INNER JOIN wp_journals j on jp.journal_id = j.id INNER JOIN wp_journal_main_categories mc on mc.category_id = j.main_category_id WHERE mc.category_name = "'.$cat_name.'" AND j.journal_url_slug = "'.$journal_name.'"');
		}
		
		return $query->result_array();
	}
	function get_latest_journals($position) {
		//$query = $this->db->query("SELECT * FROM `wp_latest_articles` LIMIT $position, 5");
		$query = $this->db->query("SELECT * FROM wp_latest_articles la INNER JOIN wp_journals j ON la.article_category = j.id INNER JOIN wp_journal_main_categories mc ON mc.category_id = j.main_category_id AND la.deleted ='1' ORDER BY la.created_date DESC LIMIT $position , 5 ");
		return $query->result_array();
	}

	function get_sidebar_slugs ($cat_name,$journal_name,$post_name) {
		/*$query = $this->db->query('SELECT * FROM wp_journal_posts INNER JOIN wp_journal_main_categories 
			ON wp_journal_posts.category_id = wp_journal_main_categories.category_id 
			WHERE journal_slug = "'.$journal_name.'" AND category_name="'.$cat_name.'"');*/			
		$query = $this->db->query('SELECT jp.post_name,mc.category_name,j.journal_url_slug,jp.post_slug FROM wp_journal_posts jp INNER JOIN wp_journals j on jp.journal_id = j.id INNER JOIN wp_journal_main_categories mc on mc.category_id = j.main_category_id WHERE mc.category_name = "'.$cat_name.'" AND j.journal_url_slug = "'.$journal_name.'" ORDER BY jp.created_date ASC');			
		return $query->result_array();
	}
	function get_testimonials() {
		$query = $this->db->query("SELECT * FROM wp_testimonials WHERE deleted = '1'");			
		return $query->result_array();	
	}
	function latest_updates_info() {
		$query = $this->db->query("SELECT * FROM wp_home_latest_updates");			
		return $query->result_array();	
	}

	function get_search_results($string) {
		if(isset($string) && !empty($string)) {
			$query  = $this->db->query('SELECT * FROM wp_journal_archives jp JOIN wp_journals j on jp.journal_id = j.id INNER JOIN wp_journal_main_categories mc on mc.category_id = j.main_category_id WHERE jp.archive_desc LIKE "%'.$string.'%"');

			return $query->result_array();					
		}
	}

function get_journals_and_categories() {
		$query = $this->db->query("SELECT wp_journals.journal_name,wp_journals.id, wp_journal_main_categories.category_id, wp_journal_main_categories.category_name FROM wp_journals INNER JOIN wp_journal_main_categories ON wp_journals.main_category_id=wp_journal_main_categories.category_id GROUP BY wp_journals.journal_name");
		return $query->result_array();
	}
	function get_countries() {
		$query = $this->db->query("SELECT * FROM wp_countries");
		return $query->result_array();	
	}
function updateSuplitype($data) {				
		if(isset($data->id) && !empty($data->id)) {
		$query = $this->db->query("UPDATE wp_supli_types SET supli_name='".$data->supli_name."',journal_id='".$data->journal_id."',updated_date='".date('Y-m-d')."' WHERE id=$data->id");
		} else {
		   $query = $this->db->query("INSERT INTO wp_supli_types (supli_name, journal_id, updated_date, created_date) VALUES ('".$data->supli_name."','".$data->journal_id."','".date('Y-m-d')."','".date('Y-m-d')."')");
		}
		return $query;	
	}
	function get_supli_type_by_journal ($data) {
		if(isset($data) && !empty($data)) {			
			$query = $this->db->query("SELECT * FROM `wp_supli_types` WHERE journal_id='".$data."'");
			return $query->result_array();
		}
	}
function get_Suplitypes() {
	$query = $this->db->query('SELECT * FROM wp_supli_types');				
	return $query->result_array();	
}
function get_Suplitype($sid) {
	
	$query = $this->db->query('SELECT * FROM  wp_supli_types WHERE id = "'.$sid.'"');	
	//print_r($query);				
	return $query->result_array();
}
function save_submit_manuscript_info($data) {	
	if(isset($data) && !empty($data)) {	
	   $query = $this->db->query(
	   	"INSERT INTO wp_manuscript (firstname, lastname, tell_no, phoneno, email, alter_email, country, journal, article, cauthor, uploadfile, created_date, read_status) VALUES 
	   		('".$data['firstname']."','".$data['lastname']."','".$data['tellno']."','".$data['phoneno']."','".$data['email']."','".$data['alt_email']."','".$data['country']."','".$data['journal']."','".$data['article']."','".$data['cauthor']."','".$data['temp_file_upload']."','".date('Y-m-d')."',2)"
	   	);	   
		return $query;	
	}
}
function save_contact_enquiry($data) {
	if(isset($data) && !empty($data)) {	
	   $query = $this->db->query(
	   	"INSERT INTO wp_contact_enquiries (name, email, phone_no, message, created_date) VALUES 
	   	    ('".$data['name']."','".$data['email']."','".$data['phone_no']."','".$data['message']."','".date('Y-m-d')."')"
	   	);	   
		return $query;	
	}
}

function save_collab_info($data) {	
	if(isset($data) && !empty($data)) {	
	   $query = $this->db->query(
	   	"INSERT INTO wp_collaboration (contact_person, email, univer_name, mail_address, country, pincode, telephone, fax, wesite_url, mem_univer_dept, created_date) VALUES 
	   	    ('".$data['contact_person']."','".$data['email']."','".$data['institute_name']."','".$data['mailing_address']."','".$data['country']."','".$data['pincode']."','".$data['telephone']."','".$data['faxs']."','".$data['website_rrl']."','".$data['noof_members']."','".date('Y-m-d')."')"
	   	);	   
		return $query;	
	}
}
function save_statistics_info($id, $type) {
	if($type == 'full_text') {
		$string = 'archive_fulltext_views';
	}else if($type == 'pdf') {
		$string = 'archive_pdf_views';
	}else if($type == 'supli_pdf') {
		$string = 'supli_pdf_views';
	}

	$this->db->query("UPDATE wp_journal_archives SET ".$string." = ".$string." + 1 WHERE id = $id");
	$query = $this->db->query("SELECT $string FROM  wp_journal_archives WHERE id = $id");			
	return $query->result();	
}
function get_eb_info ($cat_name,$journal_name,$post_name) {
		
		$query = $this->db->query('SELECT eb.id,eb.eb_post_slug,eb.eb_journal_slug,j.journal_name,mc.category_name,eb.eb_member_name,eb.eb_member_photo,eb.eb_member_country,eb.editor_chief,eb.eb_member_desc,eb.updated_date, j.issn_number, j.banner_image, j.sidebar_image FROM wp_eb_members eb INNER JOIN wp_journals j on eb.journal_id = j.id INNER JOIN wp_journal_main_categories mc on mc.category_id = j.main_category_id WHERE j.journal_url_slug ="'.$journal_name.'" AND eb.eb_post_slug = "'.$post_name.'" AND mc.category_name= "'.$cat_name.'" AND eb.deleted="1" ORDER BY eb.editor_chief DESC');
		return $query->result_array();
	}
function get_fulltext_info($title) {
	$temp = explode(".", $title);	
	if(isset($title) && !empty($title)) {
		$query  = $this->db->query('SELECT wa.doi_name, wa.archive_doi, ft.author_affliations, ft.accepted_date, ft.publication_date,ft.citation_volume,ft.authors,ft.citation_issue,ft.citation_firstpage,ft.citation_lastpage,ft.json_format, ft.post_content,ft.post_title, ft.post_browser_title,ft.post_meta_keywords,j.issn_number,j.journal_name,j.banner_image, j.sidebar_image FROM wp_fulltextarticles ft LEFT JOIN wp_journals j ON ft.journal_id = j.id LEFT JOIN wp_journal_archives wa ON wa.archive_pdf = "'.$temp[0].'.pdf" WHERE ft.post_title ="'.$temp[0].'" AND ft.deleted="1"');

		return $query->result_array();					
	}
}


function get_journal_impact_factor($journal_id) {
	$query = $this->db->query("SELECT impact_factor FROM wp_journals WHERE id='".$journal_id."' AND deleted = '1'");	
	return $query->result_array();
}
function journal_impact_equation($journal_id) {
	//print_r($journal_id);exit;
	$query = $this->db->query("SELECT impact_factor_equation FROM wp_journals WHERE id='".$journal_id."' AND deleted='1'");	
	return $query->result_array();	
}
function get_journal_impact_factor_markup() {
	$query = $this->db->query("SELECT impact_factor_info FROM wp_impact_factor_info");	
	return $query->result_array();	
}
function generate_sitemap_fulltext(){
$query = $this->db->query('SELECT post_title, post_browser_title, post_meta_keywords FROM  wp_fulltextarticles');	
	//print_r($query);				
	return $query->result_array();
}
function generate_sitemap_pdf(){
$query = $this->db->query('SELECT article_title, article_link FROM  wp_journal_archives');	
	//print_r($query);				
	return $query->result_array();
}

function generate_sitemap_fulltext_and_pdf(){
	$query = $this->db->query('SELECT post_title, post_browser_title, post_meta_keywords, publication_date, post_modified FROM  wp_fulltextarticles WHERE deleted="1"');	
	return $query->result_array();
}

function generate_sitemap_abstract() {
	$query = $this->db->query('SELECT post_browser_title, author_affliations,post_browser_title_slug, publication_date FROM wp_fulltextarticles WHERE publication_date !=" " AND json_format="1" AND deleted="1"');	
	return $query->result_array();
}

function get_journal_citations($journal_id) {
	$query = $this->db->query("SELECT SUM(citated_count) as total FROM wp_journal_citations WHERE journal_id='".$journal_id."' AND deleted='1'");	
	return $query->result_array();
}

function get_journal_article_count($journal_id) {
	$query = $this->db->query("SELECT count(*) as journal_count FROM wp_journal_archives WHERE journal_id='".$journal_id."' AND archive_pdf is not NULL AND archive_pdf <> '' AND deleted='1'");	
	return $query->result_array();
}
function get_journal_view_and_downloads($journal_id) {
	$query = $this->db->query("SELECT SUM(archive_fulltext_views + archive_pdf_views + supli_pdf_views) as total FROM wp_journal_archives WHERE journal_id='".$journal_id."'");	
	return $query->result_array();
}
function save_user_signup_info($data) {		
	//print_r($data);exit;
	if(isset($data) && !empty($data)) {	
	   $query = $this->db->query(
	   	"INSERT INTO wp_user_signup_enquiries (name, email, department, interest_journals,research_interests, attached_file, university, signup_type, read_status, created_date) VALUES 
	   	    ('".$data['author_name']."','".$data['email']."','".$data['department']."','".implode(', ', $data['interest_journals'])."','".$data['research_interests']."','".$data['attached_file']."','".$data['university']."','".$data['signup_type']."','2','".date('Y-m-d')."')"
	   	);	   
		return $query;	
	}
}
function get_journal_articles($journal_id) {
	$query = $this->db->query('SELECT j.id as journal_id, j.journal_name,jp.article_title,jp.article_link,jp.article_authors,jp.doi_name,jp.doi_link,jp.archive_fulltext_views,jp.archive_pdf_views,jp.supli_pdf_views,jp.archive_volume,jp.id,jp.archive_year,jp.archive_desc,jp.archive_volume,jp.archive_fulltext,jp.archive_pdf,jp.supli_pdf,j.journal_url_slug,jp.archive_in, mc.category_name, jv.volume_name, jc.citated_count,jc.citation_link FROM 
			wp_journal_archives jp JOIN wp_journals j 			 
			on jp.journal_id = j.id INNER JOIN wp_journal_main_categories mc
			on mc.category_id = j.main_category_id 
			left join wp_journal_volumes jv 
  			on jv.id=jp.archive_volume
  			left join wp_journal_citations jc 
  			on jc.article_id=jp.id
			WHERE j.id = "'.$journal_id.'" AND jp.deleted="1" ORDER BY jp.archive_year ASC,jp.archive_volume ASC,jp.archive_pdf ASC');	
	return $query->result_array();
}

}
