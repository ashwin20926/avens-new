<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load your model if you fetch URLs from DB
        $this->load->model('Sitemap_model');
    }

    public function sitemap() {
        //echo 'iam here111';exit;
        // Base URL of your site
        $base_url = base_url();

        // Static pages (add more as needed)
        $urls = [
            [
                'loc' => $base_url,
                'priority' => '1.0',
                'changefreq' => 'daily',
                'lastmod' => date('Y-m-d')
            ],
            [
                'loc' => $base_url . 'about',
                'priority' => '0.8',
                'changefreq' => 'monthly',
                'lastmod' => date('Y-m-d')
            ],
        ];

        // Dynamic URLs (example: blog posts)
        $posts = $this->Sitemap_model->get_blog_posts(); // Assume this returns array of post slugs and timestamps
        foreach ($posts as $post) {
            $urls[] = [
                'loc' => $base_url . 'blog/' . $post['slug'],
                'priority' => '0.6',
                'changefreq' => 'weekly',
                'lastmod' => date('Y-m-d', strtotime($post['updated_at']))
            ];
        }

        // Build XML
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        foreach ($urls as $url) {
            $xml .= "<url>" . PHP_EOL;
            $xml .= "<loc>{$url['loc']}</loc>" . PHP_EOL;
            $xml .= "<lastmod>{$url['lastmod']}</lastmod>" . PHP_EOL;
            $xml .= "<changefreq>{$url['changefreq']}</changefreq>" . PHP_EOL;
            $xml .= "<priority>{$url['priority']}</priority>" . PHP_EOL;
            $xml .= "</url>" . PHP_EOL;
        }

        $xml .= '</urlset>';

        // Save to file
        $file_path = FCPATH . 'sitemap.xml'; // Saves in public root
        file_put_contents($file_path, $xml);

        echo "Sitemap generated at " . $file_path;
    }
}
