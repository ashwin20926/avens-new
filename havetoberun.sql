ALTER TABLE `wp_journal_archives` ADD `archive_fulltext_views` INT(10) NOT NULL DEFAULT '0' AFTER `supli_pdf`, ADD `archive_pdf_views` INT(10) NOT NULL DEFAULT '0' AFTER `archive_fulltext_views`, ADD `supli_pdf_views` INT(10) NOT NULL DEFAULT '0' AFTER `archive_pdf_views`;



ALTER TABLE `wp_journal_archives` ADD `archive_fulltext_downloads` INT(10) NOT NULL DEFAULT '0' AFTER `deleted`, ADD `archive_pdf_downloads` INT(10) NOT NULL DEFAULT '0' AFTER `archive_fulltext_downloads`, ADD `supli_pdf_downloads` INT(10) NOT NULL DEFAULT '0' AFTER `archive_pdf_downloads`;
