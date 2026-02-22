<rss version="2.0"    
    <channel>     
    <title><?php echo $archive_info['0']['category_name']; ?> - <?php echo $archive_info['0']['journal_name']; ?></title>
    <link><?php echo base_url(); ?></link>    

    <?php foreach ($archive_info as $key => $value) { ?>
        <item>
          <title><?php echo $value['article_title']; ?></title>
          <link><?php echo $value['archive_fulltext']; ?></link>
          <pubDate><?php echo $value['article_pub_date']; ?></pubDate>          
          <description><?php echo $value['article_authors']; ?></description>
        </item>
    <?php } ?>     
    </channel>
</rss>