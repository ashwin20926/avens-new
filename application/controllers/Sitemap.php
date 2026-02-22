<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {

    public function index() {
        // Ensure the script runs only from CLI
        if (!is_cli()) {
            exit("This script can only be run from CLI.\n");
        }
        
        // Load the necessary XML and model
        $mainSitemapFile = 'sitemap.xml';
        $this->load->model('Sitemap_model');
        $urls = $this->Sitemap_model->getUrls();
      //print_r(sizeof($urls));exit;
        // Load the existing sitemap or create a new one
        $dom = $this->loadOrCreateSitemap($mainSitemapFile);
        $root = $dom->documentElement;

        // Append URLs to the sitemap (HTML and PDF)
        foreach ($urls as $urlData) {
            //echo $urlData['json_format'];
            $this->appendUrl($dom, $root, $urlData, 'html');
            $this->appendUrl($dom, $root, $urlData, 'pdf');
            //echo $urlData['json_format'];
           // echo 'test->', $urlData['publication_date'] != '';
             if ($urlData['json_format'] == 1 && $urlData['publication_date'] != '') {
                 //echo 'abstract';
                $this->appendUrl($dom, $root, $urlData, 'abstract');
            }
        }

        // Save the updated sitemap
      $dom->save($mainSitemapFile);

        // Update sitemap tracking
        $this->Sitemap_model->updateSitemapTracking();

        echo "✅ URLs appended successfully!";
    }

    /**
     * Load existing sitemap or create a new one.
     *
     * @param string $mainSitemapFile The path to the sitemap file.
     * @return DOMDocument The DOM object representing the sitemap.
     */
    private function loadOrCreateSitemap($mainSitemapFile) {
        $dom = new DOMDocument();
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;

        if (file_exists($mainSitemapFile)) {
            $dom->load($mainSitemapFile);
        } else {
            // Create a root <urlset> element if the file doesn't exist
            $root = $dom->createElement('urlset');
            $root->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
            $dom->appendChild($root);
        }

        return $dom;
    }

    /**
     * Append a URL to the sitemap.
     *
     * @param DOMDocument $dom The DOM document.
     * @param DOMElement $root The root <urlset> element.
     * @param array $urlData The data for the URL to append.
     * @param string $type The type of URL ('html' or 'pdf').
     */
    private function appendUrl($dom, $root, $urlData, $type) {
        $urlNode = $dom->createElement('url');
        
        // Determine the URL and priority based on type (html or pdf)
        $extension = ($type === 'html') ? '.html' : '.pdf';
        
        $locNode = $dom->createElement('loc', "https://www.avensonline.org/fulltextarticles/{$urlData['post_title']}{$extension}");
        if ($type === 'abstract') {
            //echo 'iam here';echo 'iam here 11';exit;
            //$temp = explode(".", $urlData['post_browser_title']);	
            //$title = str_replace(" ","-", $temp[0]);
            $locNode = $dom->createElement('loc', "https://www.avensonline.org/abstract/{$urlData['post_browser_title_slug']}");
        }

        // Determine the lastmod node (either publication date or post modified)
        $lastmodDate = $urlData['publication_date'] ?: $urlData['post_modified'];
        $lastmodNode = $dom->createElement('lastmod', $lastmodDate);

        // Priority can be different based on type
        $priority = ($type === 'html') ? '5.2' : '5.3';
        $priorityNode = $dom->createElement('priority', $priority);

        // Append the nodes
        $urlNode->appendChild($locNode);
        $urlNode->appendChild($lastmodNode);
        $urlNode->appendChild($priorityNode);

        // Append the URL node to the root
        $root->appendChild($urlNode);
    }
}
