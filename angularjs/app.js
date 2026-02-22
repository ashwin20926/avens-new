var app = angular.module('avensApp', ['ngRoute','ui.tinymce','textAngular','ngFileUpload','ngSanitize', 'ui.grid', 'ui.grid.pagination','ui.grid.autoResize']);
var base_url = "https://www.avensonline.org/";

app.config(['$routeProvider',function ($routeProvider) {
    $routeProvider
    .when("/Dashboard", {
        title: 'Avens Publishing Group Dashboard',
        templateUrl:base_url+'admin1/angular_pages/dashboard.html',
        controller: "dashboardController"
    }).when("/MainCategories", {
        title: 'MainCategories',
        templateUrl:base_url+'admin1/angular_pages/MainCategories.html',
        controller: "MainCategoriesController"
    }).when("/Journals/", {        
        title: 'Journals',
        templateUrl:base_url+'admin1/angular_pages/journals.html',
        controller: "JournalsController"
    }).when("/NewEbMembers", {        
        title: 'New Eb Members',
        templateUrl:base_url+'admin1/angular_pages/NewEbMembers.html',
        controller: "NewEbMembersController",
    }).when("/AuthorEnquiries", {        
        title: 'Submit Manuscript',
        templateUrl:base_url+'admin1/angular_pages/AuthorEnquiries.html',
        controller: "userEnquiriesController",
    }).when("/FulltextArticles", {        
        title: 'New Eb Members',
        templateUrl:base_url+'admin1/angular_pages/FulltextArticles.html',
        controller: "FulltextArticlesController",
    }).when("/JournalPosts", {        
        title: 'JournalPosts',
        controller: "JournalPostsController",
        controllerAs:"JournalPC",
        templateUrl:base_url+'admin1/angular_pages/JournalPosts.html'
    }).when("/archives", {        
        title: 'Journal Archives',
        templateUrl:base_url+'admin1/angular_pages/JournalArchiveForm.html',
        controller: "JournalArchiveController",
    }).when("/LatestArticles", {        
        title: 'Latest Articles',
        templateUrl:base_url+'admin1/angular_pages/LatestArticles.html',
        controller: "LatestArticlesController",
    }).when("/Testimonials", {        
        title: 'Testimonials',
        templateUrl:base_url+'admin1/angular_pages/Testimonials.html',
        controller: "TestimonialsController",
    }).when("/HomeLatestUpdates", {        
        title: 'Submit Manuscript',
        templateUrl:base_url+'admin1/angular_pages/HomeLatestUpdates.html',
        controller: "HomeLatestUpdatesController",
    }).when("/UploadFilesToserver", {        
        title: 'Submit Manuscript',
        templateUrl:base_url+'admin1/angular_pages/UploadFilesToserver.html',
        controller: "UploadFilesToserverController",
    }).when("/addSupliTypes", {        
        title: 'addSupliTypes',
        templateUrl:base_url+'admin1/angular_pages/suplitypes.html',
        controller: "SuplitypeController",
    }).when("/sitemap", {        
        title: 'sitemap',
        templateUrl:base_url+'admin1/angular_pages/sitemap.html',
        controller: "SitemapController",
    }).when("/SubmitManuscript", {        
        title: 'Submit Manuscript',
        templateUrl:base_url+'admin1/angular_pages/SubmitManuscript.html',
        controller: "SubmitManuscriptController",
    }).when("/ArticleCitations", {        
        title: 'Submit Manuscript',
        templateUrl:base_url+'admin1/angular_pages/ArticleCitations.html',
        controller: "ArticleCitationsController",
    }).when("/EditArticleCitation/:updateID", {        
        title: 'Edit Latest Update',
        templateUrl:base_url+'admin1/angular_pages/edit-home-latest-update.html',
        controller: "EditArticleCitationController",
        resolve: {
          article_citation: function(factory, $route) {            
            var update_id = $route.current.params.updateID;            
            return factory.get_journal_citation_info(update_id);
          }
        }    
    }).when("/Collaborations", {        
        title: 'Collaborations',
        templateUrl:base_url+'admin1/angular_pages/Collaborations.html',
        controller: "CollaborationsController",
    }).when("/AllPosts", {        
        title: 'AllPosts',
        templateUrl:base_url+'admin1/angular_pages/Allposts.html',
        controller: "AllPostsController"
    }).when("/EditMainCategory/:MaincatID", {        
        title: 'Edit Main Category',
        templateUrl:base_url+'admin1/angular_pages/edit-maincategory.html',
        controller: "EditMaincategoryController",
        resolve: {
          main_category: function(factory, $route){            
            var main_cat_id = $route.current.params.MaincatID;
            return factory.get_main_category(main_cat_id);
          }
        }    
    }).when("/EditJournals/:JournalID", {        
        title: 'Edit Journal',
        templateUrl:base_url+'admin1/angular_pages/edit-journals.html',
        controller: "EditJournalController",
        resolve: {
          main_journal: function(factory, $route){            
            var journal_id = $route.current.params.JournalID;
            return factory.get_journal(journal_id);
          }
        }    
    }).when("/EditJournalPage/:pageID", {        
        title: 'Edit Journal Page',
        templateUrl:base_url+'admin1/angular_pages/edit-journal-page.html',
        controller: "EditJournalPageController",
        resolve: {
          main_page: function(factory, $route){            
            var Page_id = $route.current.params.pageID;
            return factory.get_journalPage(Page_id);
          }
        }    
    }).when("/EditNewEbmember/:pageID", {        
        title: 'Edit Eb Member',
        templateUrl:base_url+'admin1/angular_pages/edit-eb-member.html',
        controller: "EditEbMemberController",
        resolve: {
          eb_member: function(factory, $route){            
            var Page_id = $route.current.params.pageID;
            return factory.get_New_Ebmember(Page_id);
          }
        }    
    }).when("/EditJournalArchive/:ArchiveId", {        
        title: 'Edit Journal Archive',
        templateUrl:base_url+'admin1/angular_pages/edit-journal-archive.html',
        controller: "EditJournalArchiveController",
        resolve: {
          archive: function(factory, $route){            
            var archive_id = $route.current.params.ArchiveId;            
            return factory.get_journalArchive(archive_id);
          }
        }    
    }).when("/EditLatestArticle/:ArticleId", {        
        title: 'Edit Latest Article',
        templateUrl:base_url+'admin1/angular_pages/edit-latest-article.html',
        controller: "EditLatestArticleController",
        resolve: {
          latest_articles: function(factory, $route){            
            var article_id = $route.current.params.ArticleId;            
            return factory.get_LatestArticle(article_id);
          }
        }    
    }).when("/EditHomeLatestUpdate/:updateID", {        
        title: 'Edit Latest Update',
        templateUrl:base_url+'admin1/angular_pages/edit-home-latest-update.html',
        controller: "EditHomeLatestUpdateController",
        resolve: {
          latest_home_update: function(factory, $route) {            
            var update_id = $route.current.params.updateID;            
            return factory.get_latest_update(update_id);
          }
        }    
    }).when("/EditTestimonial/:ArticleId", {        
        title: 'Edit Testimonial',
        templateUrl:base_url+'admin1/angular_pages/edit-testimonial.html',
        controller: "EditTestimonialController",
        resolve: {
          testimonials: function(factory, $route){            
            var article_id = $route.current.params.ArticleId;            
            return factory.get_Testimonials(article_id);
          }        
        }    
    }).when("/EditSuplitype/:sid", {        
        title: 'Edit Supli Type',
        templateUrl:base_url+'admin1/angular_pages/edit-supli-type.html',
        controller: "EditSupliTypeController",
        resolve: {
          suplitypes: function(factory, $route){        
            var sid = $route.current.params.sid;                            
            return factory.get_Suplitype(sid);
          }        
        }    
    }).when("/EditFulltextArticle/:sid", {
        title: 'Edit Supli Type',
        templateUrl:base_url+'admin1/angular_pages/edit-fulltext-article.html',
        controller: "EditFulltextController",
        resolve: {
          fulltextArticle: function(factory, $route){        
            var sid = $route.current.params.sid;                            
            return factory.get_FulltextArticle(sid);
          }        
        }    
    }).when("/UploadFilesToserver", {        
        title: 'Submit Manuscript',
        templateUrl:base_url+'admin1/angular_pages/UploadFilesToserver.html',
        controller: "UploadFilesToserverController",
    }).when("/ContactUs", {        
        title: 'ContactUs',
        templateUrl:base_url+'admin1/angular_pages/contact-enquiries.html',
        controller: "ContactController",
    })
    .otherwise({
        redirectTo: "/login"
    });
}]);
