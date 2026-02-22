<?php
class Sitemap_model extends CI_Model {

    public function getUrls() {
        $latestRow = $this->db->order_by('created_at', 'DESC') // Order by 'id' in descending order
                       ->limit(1)             // Limit the result to a single row
                       ->get('sitemap_tracking') // Execute the query on 'your_table_name'
                       ->row();
                       $date;
                       if (!empty($latestRow->created_at)) {
                            $date = $latestRow->created_at;
                       }
                       
                      //$date = $latestRow->created_at ? $latestRow->created_at : '';
    $this->db->select('post_title, publication_date, post_modified, post_browser_title, json_format, post_browser_title_slug')
     ->from('wp_fulltextarticles');

    // Conditionally apply where clause if $date is not empty
    if (!empty($date)) {
        $this->db->where('post_date >', $date);
    }
    
    // Apply 'deleted' condition (always applied)
    $this->db->where('deleted', '1');
    
    // Execute the query and fetch the results
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
    }
    
    public function updateSitemapTracking() {
        $data = array('created_at' => date('Y-m-d H:i:s'));
        return $this->db->insert('sitemap_tracking', $data);
    }
}
