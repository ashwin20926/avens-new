var app = angular.module('myApp', ['ngRoute','ui.tinymce','textAngular','ngFileUpload','ngSanitize']);
var base_url = "http://www.avensonline.org/";
//console.log(app);
app.factory("services", ['$http', function($http) {
  var serviceBase = 'services/'
    var obj = {};
    obj.get_main_category = function(main_cat_id){
        return $http.get(base_url+"admin/get_main_category?id="+main_cat_id+"");
    }
    obj.get_journal = function(main_cat_id){
        return $http.get(base_url+"admin/get_journal?id="+main_cat_id+"");
    }
    obj.get_journalPage = function(PageId){
        return $http.get(base_url+"admin/get_journalPage?id="+PageId+"");
    }
    obj.insertCategory = function (main_category) {
        return $http.get(base_url+"admin/insert_main_category?name="+main_category.cateogry_name+"");       
        
    };
    obj.get_journals = function(journal_type) {        
        return $http.get(base_url+"admin/get_journals?name="+journal_type+"");
    }
    obj.get_journalArchive = function(archive_id) {        
        return $http.get(base_url+"admin/get_journal_archive?id="+archive_id+"");
    }
    obj.get_LatestArticle = function(article_id) {        
        return $http.get(base_url+"admin/get_latest_Article?id="+article_id+"");
    }
    obj.get_Testimonials = function(article_id) {        
        return $http.get(base_url+"admin/get_Testimonial?id="+article_id+"");
    }
    obj.get_Suplitype = function(article_id) {        
        return $http.get(base_url+"admin/get_Suplitype?id="+article_id+"");
    }
    obj.get_FulltextArticle = function(a_id) {        
        return $http.get(base_url+"admin/get_FulltextArticle?id="+a_id+"");
    }
    obj.get_Ebmember = function(eb_id) {        
        return $http.get(base_url+"admin/get_Ebmember?id="+eb_id+"");
    }
    obj.get_New_Ebmember = function(eb_id) {        
        return $http.get(base_url+"admin/get_new_eb_member?id="+eb_id+"");
    }
    obj.updateCategory = function (id,main_category) {        
        //return $http.get(base_url+"admin/insert_main_category?name="+main_category.category_name+"&id="+main_category.category_id+"");
        var params = [];
        params.push("category_id="+id+"");
        params.push("category_name="+main_category.category_name+"");
        $http({
            url: base_url+"admin/insert_main_category",
            method: "POST",
            headers: {'Content-Type': 'application/json'},
            data : JSON.stringify({"category_id":id,"category_name":main_category.category_name})          
        })
        .then(function(response) {            
            if(response.status) {
                window.location = base_url+'admin#/MainCategories'                
            }
        });
    };
    obj.updateJournal = function (id,main_journal) {        
        //return $http.get(base_url+"admin/insert_main_category?name="+main_category.category_name+"&id="+main_category.category_id+"");        
        /*if(!id) {
            main_journal.main_category_id = 0;
        }*/
        //main_journal.journal_url_slug = main_journal.journal_name.toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-');        
        $http({
            url: base_url+"admin/insert_journal",
            method: "POST",
            headers: {'Content-Type': 'application/json'},
            data : JSON.stringify(main_journal)          
        })
        .then(function(response) {            
            if(response.status) {
                window.location = base_url+'admin#/Journals/medical'                
            }
        });
    };
    obj.updateJournalPage = function (id,journal_page,scope) {        
        //return $http.get(base_url+"admin/insert_main_category?name="+main_category.category_name+"&id="+main_category.category_id+"");
        /*if(!id) {
            journal_page.main_category_id = 0;
        }*/        
       /* journal_page.journal_post_slug = journal_page.post_name.toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-');        
        $.each(scope.journal_info,function(i,v){
            if(v.id == journal_page.journal_id) {                
                console.log(v);
                journal_page.journal_slug = v.journal_name.toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-');                            
            }
        });*/
        //journal_page.journal_post_slug = journal_page.journal_post_slug;        
        $http({
            url: base_url+"admin/update_journal_page",
            method: "POST",
            headers: {'Content-Type': 'application/json'},
            data : JSON.stringify(journal_page)          
        })
        .then(function(response) {            
            if(response.status) {
                window.location = base_url+'admin#/JournalPosts'                
            }
        });
    };
    obj.updateEbMember = function (id,eb_member,scope) {                
        $http({
            url: base_url+"admin/update_eb_member",
            method: "POST",
            headers: {'Content-Type': 'application/json'},
            data : JSON.stringify(eb_member)          
        })
        .then(function(response) {            
            if(response.status) {
                window.location = base_url+'admin#/NewEbMembers'                
            }
        });
    };
    obj.updateJournalArchive = function (id,archive_info,scope) {        
        //return $http.get(base_url+"admin/insert_main_category?name="+main_category.category_name+"&id="+main_category.category_id+"");
        /*if(!id) {
            archive_info.main_category_id = 0;
        }*/        
        $.each(scope.journal_info,function(i,v){
            if(v.id == archive_info.journal_id) {                           
                archive_info.journal_slug = v.journal_name.toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-');                            
            }
        });
        $http({
            url: base_url+"admin/update_archive",
            method: "POST",
            headers: {'Content-Type': 'application/json'},
            data : JSON.stringify(archive_info)          
        })
        .then(function(response) {            
            if(response.status) {
                window.location = base_url+'admin#/archives'                
            }
        });
    };
    obj.updateLatestArticle = function (id,article_info,scope) {                
        $http({
            url: base_url+"admin/update_latest_article",
            method: "POST",
            headers: {'Content-Type': 'application/json'},
            data : JSON.stringify(article_info)          
        })
        .then(function(response) {            
            if(response.status) {
                window.location = base_url+'admin#/LatestArticles'                
            }
        });
    };
    obj.updateTestimonial = function (id,testimonials,scope) {                    
        $http({
            url: base_url+"admin/updateTestimonial",
            method: "POST",
            headers: {'Content-Type': 'application/json'},
            data : JSON.stringify(testimonials)          
        })
        .then(function(response) {            
            if(response.status) {
                window.location = base_url+'admin#/Testimonials'                
            }
        });
    };
 obj.updateSuplitype = function (id,suplitypes,scope) {                    
        $http({
            url: base_url+"admin/updateSuplitype",
            method: "POST",
            headers: {'Content-Type': 'application/json'},
            data : JSON.stringify(suplitypes)          
        })
        .then(function(response) {            
            if(response.status) {
                window.location = base_url+'admin#/addSupliTypes'                
            }
        });
    };
 obj.updateFulltextArticle = function (id,fulltextarticle,scope) {                    
        $http({
            url: base_url+"admin/update_fulltext_article",
            method: "POST",
            headers: {'Content-Type': 'application/json'},
            data : JSON.stringify(fulltextarticle)          
        })
        .then(function(response) {            
            if(response.status) {
                window.location = base_url+'admin#/FulltextArticles'                
            }
        });
    };
    obj.saveUploadedImage = function(id, file) {
        var data = new FormData(jQuery('#journal_form')[0]);             
        jQuery.ajax({
            type:"POST",
            url: base_url+'admin/save_uploaded_file',
            data: data,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            dataType:"json",
            success:function(temp) {
            console.log(temp);  
            if(temp.file_type == 'journal_banner_img') {
               $('.uploaded-banner-img').remove();
               $('#journal_banner_img').closest('.banner-img-box').append('<div class="uploaded-banner-img"><input type="hidden" name="uploaded_file" value="'+temp[0].upload_data.file_name+'"><p><img width="200px" height="200px" src="'+temp.uploaded_path+'" alt="'+temp[0].upload_data.file_name+'" /><span class="remove-file">Remove File</span></p></div>');
            } else {
               $('.uploaded-sidebar-img').remove();
               $('#journal_sidebar_img').closest('.sidebar-img-box').append('<div class="uploaded-banner-img"><input type="hidden" name="uploaded_file" value="'+temp[0].upload_data.file_name+'"><p><img width="200px" height="200px" src="'+temp.uploaded_path+'" alt="'+temp[1].upload_data.file_name+'" /><span class="remove-file">Remove File</span></p></div>');
            }
            }
        });  
    }

    return obj;   
}]);

app.controller('EditMaincategoryController', function($scope,$rootScope,$routeParams,$location,services,main_category){        
    var main_cat_id = ($routeParams.MaincatID) ? parseInt($routeParams.MaincatID) : 0;
    $rootScope.title = (main_cat_id > 0) ? 'Edit Category' : 'Add Category';
    $scope.buttonText = (main_cat_id > 0) ? 'Update Category' : 'Add New Category';    
    var original = main_category.data[0];    
    $scope.main_category = original;
    $scope.isClean = function() {
       return angular.equals(original, $scope.main_category);
    }
    $scope.saveCategory = function(main_category) {
        if (main_cat_id <= 0) {
            services.updateCategory("0",main_category);
        }
        else {
            services.updateCategory(main_cat_id, main_category);
        }
    }
});
app.controller('EditJournalController', function($scope,Upload,$timeout,$rootScope,$routeParams,$location,services,main_journal) { 
    var journal_id = ($routeParams.journal_id) ? parseInt($routeParams.journal_id) : 0;
    $rootScope.title = (journal_id > 0) ? 'Edit Journal' : 'Add Journal';
    $scope.buttonText = (journal_id > 0) ? 'Update Journal' : 'Add New Journal';    
    var original = main_journal.data[0];    
    $scope.main_journal = original;
    //$scope.options = [{ name: "Medical", id: 10 }, { name: "Biotechnolgy", id: 20 },{ name: "Pharmaseutical", id: 30 },{ name: "Biology", id: 40 }];
    //$scope.selectedOption = $scope.options[1];
    $scope.isClean = function() {
       return angular.equals(original, $scope.main_journal);
    }
    $scope.convertToJournalSlug = function(elem) {
        //$('#journal_url_slug').val(elem.main_journal.journal_name.toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-'));         
    }
    $scope.saveJournal = function(main_journal) {
        if (journal_id <= 0) {
            services.updateJournal(0,main_journal);
        }
        else {
            services.updateJournal(journal_id, main_journal);
        }
    }
    $scope.uploadImage = function(file) {
        if(file) {
            services.saveUploadedImage(journal_id, file);
        }
    }
    $scope.uploadPic = function(file) {
        file.upload = Upload.upload({
          url: base_url+'admin/save_uploaded_file',
          data: {file: file},
        });

        file.upload.then(function (response) {
          $timeout(function () {
            file.result = response.data;
          });
        }, function (response) {
          if (response.status > 0)
            $scope.errorMsg = response.status + ': ' + response.data;
        }, function (evt) {
          // Math.min is to fix IE which reports 200% sometimes
          file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
        });
    }
});
app.controller('EditJournalPageController', function($scope,$rootScope,$routeParams,$location,services,main_page) { 

    var page_id = ($routeParams.pageID) ? parseInt($routeParams.pageID) : 0;
    $rootScope.title = (page_id > 0) ? 'Edit Journal Page' : 'Add Journal Page';
    $scope.buttonText = (page_id > 0) ? 'Update Journal Page' : 'Add New Journal Page';    
    var original = main_page.data.post_info;
    
    if(page_id == 0) {
        original.post_content = '';
    }
    $scope.main_page = original[0];
    $scope.journal_info = main_page.data.journal_info;    
    //$scope.options = [{ name: "Medical", id: 10 }, { name: "Biotechnolgy", id: 20 },{ name: "Pharmaseutical", id: 30 },{ name: "Biology", id: 40 }];
    //$scope.selectedOption = $scope.options[1];
    $scope.isClean = function() {
       return angular.equals(original, $scope.main_page);
    }
    $scope.saveJournalPage = function(main_page) {
        console.log(main_page);                
        if (page_id <= 0) {            
            services.updateJournalPage(0,main_page,$scope);
        }
        else {
            services.updateJournalPage(page_id, main_page,$scope);
        }
    }
    /*$scope.tinymceOptions = {
        onChange: function(e) {
          // put logic here for keypress and cut/paste changes
        },
        inline: false,
        plugins : 'advlist autolink link image lists charmap print preview link media',
        skin: 'lightgray',
        theme : 'modern',
        width : 600,
        height : 300
      };*/
    $scope.convertToPostSlug = function(elem) {        
        //$('#journal_post_slug').val(elem.main_page.post_name.toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-'));         
    };
    $scope.convertToJournalSlug = function(elem) {        
       /* $.each($scope.journal_info,function(i,v){
            if(v.id == elem){                
                    $('#journal_slug').val(v.journal_name.toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-'));                            
            }
        });*/        

    };
});

app.controller('wysiwygeditor', ['$scope', 'textAngularManager', function wysiwygeditor($scope, textAngularManager) {
    $scope.version = textAngularManager.getVersion();
    $scope.versionNumber = $scope.version.substring(1);
    $scope.orightml = '';
    $scope.htmlcontent = $scope.orightml;
    $scope.disabled = false;
}]);

app.controller('EditLatestArticleController', function($scope,$rootScope,$routeParams,$location,services,latest_articles){        
   var article_id = ($routeParams.ArchiveId) ? parseInt($routeParams.ArchiveId) : 0;
    $rootScope.title = (article_id > 0) ? 'Edit Latest Article' : 'Add Latest Article';
    $scope.buttonText = (article_id > 0) ? 'Update Latest Article' : 'Add New Latest Article';

    $scope.latest_article = latest_articles.data.article_info[0];
    $scope.journal_info = latest_articles.data.journal_info;

    $scope.saveLatestArticle = function(latest_article) {                
        if (article_id <= 0) {            
            services.updateLatestArticle(0,latest_article,$scope);
        }
        else {
            services.updateLatestArticle(archive_id, latest_article,$scope);
        }
    }
});
app.controller('EditTestimonialController', function($scope,$rootScope,$routeParams,$location,services,testimonials){        
   var article_id = ($routeParams.ArchiveId) ? parseInt($routeParams.ArchiveId) : 0;
    $rootScope.title = (article_id > 0) ? 'Edit Testimonials' : 'Add Testimonials';
    $scope.buttonText = (article_id > 0) ? 'Update Testimonials' : 'Add New Testimonials';

    $scope.testimonial = testimonials.data[0];

    $scope.saveTestimonial = function(testimonials) {                        
        if (article_id <= 0) {            
            services.updateTestimonial(0,testimonials,$scope);
        }
        else {
            services.updateTestimonial(archive_id, testimonials,$scope);
        }
    }
});
app.controller('EditSupliTypeController', function($scope,$rootScope,$routeParams,$location,services,suplitypes){        
   var sid = ($routeParams.sid) ? parseInt($routeParams.sid) : 0;
    $rootScope.title = (sid > 0) ? 'Edit Suplitype' : 'Add Suplitype';
    $scope.buttonText = (sid > 0) ? 'Update Suplitype' : 'Add New Suplitype';    
    
    
    $scope.suplitype = suplitypes.data.s_info[0];
    $scope.journal_info = suplitypes.data.j_info;

    $scope.saveSuplitype = function(suplitypes) {
        console.log(suplitypes);                    
        if (sid <= 0) {            
            services.updateSuplitype(0,suplitypes,$scope);
        }
        else {
            services.updateSuplitype(sid, suplitypes,$scope);
        }
    }
});
app.controller('EditJournalArchiveController', function($scope,$rootScope,$routeParams,$location,services,archive,$http) {     
    var archive_id = ($routeParams.ArchiveId) ? parseInt($routeParams.ArchiveId) : 0;
    $rootScope.title = (archive_id > 0) ? 'Edit Journal Archive' : 'Add Journal Archive';
    $scope.buttonText = (archive_id > 0) ? 'Update Journal Archive' : 'Add New Journal Archive';    
    var archive_years = [];
    for (var i = 2000; i <=  2020 ; i++) {
        archive_years.push(i);
    }
    var original = archive.data.archive_info;
    $scope.archive_info = original[0];
    $scope.journal_info = archive.data.journal_info;  
    //$scope.volumes_arr = [{"id":"volume-1-issue-1","name":"volume 1 issue 1"},{"id":"volume-1-issue-2","name":"volume 1 issue 2"},{"id":"volume-2-issue-1","name":"volume 2 issue 1"},{"id":"volume-2-issue-2","name":"volume 2 issue 2"},{"id":"volume-3-issue-1","name":"volume 3 issue 1"},{"id":"volume-3-issue-2","name":"volume 3 issue 2"},{"id":"volume-4-issue-1","name":"volume 4 issue 1"},{"id":"volume-4-issue-2","name":"volume 4 issue 2"}];
    $scope.volumes_arr = [{"id":"volume-1-issue-1","name":"volume 1 issue 1"},{"id":"volume-1-issue-2","name":"volume 1 issue 2"},
                        {"id":"volume-1-issue-3","name":"volume 1 issue 3"},
                        {"id":"volume-2-issue-1","name":"volume 2 issue 1"},{"id":"volume-2-issue-2","name":"volume 2 issue 2"},
                        {"id":"volume-2-issue-3","name":"volume 2 issue 3"},{"id":"volume-2-issue-4","name":"volume 2 issue 4"},
                        {"id":"volume-3-issue-1","name":"volume 3 issue 1"},{"id":"volume-3-issue-2","name":"volume 3 issue 2"},
                        {"id":"volume-3-issue-3","name":"volume 3 issue 3"},
                        {"id":"volume-4-issue-1","name":"volume 4 issue 1"},
                        {"id":"volume-4-issue-2","name":"volume 4 issue 2"},
                        {"id":"volume-4-issue-3","name":"volume 4 issue 3"},
                        {"id":"volume-5-issue-1","name":"volume 5 issue 1"},
                        {"id":"volume-5-issue-2","name":"volume 5 issue 2"},
                        {"id":"volume-5-issue-3","name":"volume 5 issue 3"},
                        {"id":"volume-6-issue-1","name":"volume 6 issue 1"},
                        {"id":"volume-6-issue-2","name":"volume 6 issue 2"},
                        {"id":"volume-6-issue-3","name":"volume 6 issue 3"}];    
    $scope.archive_years = archive_years;
    $scope.archive_type = [{"id":"1","name":"Article In Press"},{"id":"2","name":"Current Issue"},{"id":"3","name":"Archive"},{"id":"4","name":"Special Issues"}]

    $scope.tinymceOptions = {
        onChange: function(e) {
          // put logic here for keypress and cut/paste changes
        },
        inline: false,
        plugins : 'advlist autolink link image lists charmap print preview link media',
        skin: 'lightgray',
        theme : 'modern',
        width : 600,
        height : 300
      };

    $scope.convertToJournalSlug = function(elem) {        
        $.each($scope.journal_info,function(i,v){
            if(v.id == elem){                
                    $('#journal_slug').val(v.journal_name.toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-'));                            
            }
        });        

    };
    $scope.saveJournalArchive = function(archive_info) {                
        if (archive_id <= 0) {            
            services.updateJournalArchive(0,archive_info,$scope);
        }
        else {
            services.updateJournalArchive(archive_id, archive_info,$scope);
        }
    };
 $scope.temp = function() {        
        $http({
            url: base_url+'admin/get_supli_type_by_journal',
            method: "POST",
            data: {id:angular.element('#journal_name_select')[0].value}        
        })
        .then(function(response) {
            $scope.supli_arr= response.data;
        });

    }
});

app.controller('JournalsController', function($scope,services) {    
    services.get_journals().then(function(data){    
        $scope.main_journals = data.data;
    });
});
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
    }).when("/Journals/:name", {        
        title: 'Journals',
        templateUrl:base_url+'admin1/angular_pages/journals.html',
        controller: "JournalsController",
        resolve: {
          journals_service: function(services, $route){            
            var journal_type = $route.current.params.name;
            services.get_journals(journal_type);            
          }
        }
    }).when("/NewEbMembers", {        
        title: 'New Eb Members',
        templateUrl:base_url+'admin1/angular_pages/NewEbMembers.html',
        controller: "NewEbMembersController",
    }).when("/FulltextArticles", {        
        title: 'New Eb Members',
        templateUrl:base_url+'admin1/angular_pages/FulltextArticles.html',
        controller: "FulltextArticlesController",
    }).when("/JournalPosts", {        
        title: 'JournalPosts',
        templateUrl:base_url+'admin1/angular_pages/JournalPosts.html',
        controller: "JournalPostsController",
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
    }).when("/addSupliTypes", {        
        title: 'addSupliTypes',
        templateUrl:base_url+'admin1/angular_pages/suplitypes.html',
        controller: "SuplitypeController",
    }).when("/SubmitManuscript", {        
        title: 'Submit Manuscript',
        templateUrl:base_url+'admin1/angular_pages/SubmitManuscript.html',
        controller: "SubmitManuscriptController",
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
          main_category: function(services, $route){            
            var main_cat_id = $route.current.params.MaincatID;
            return services.get_main_category(main_cat_id);
          }
        }    
    }).when("/EditJournals/:JournalID", {        
        title: 'Edit Journal',
        templateUrl:base_url+'admin1/angular_pages/edit-journals.html',
        controller: "EditJournalController",
        resolve: {
          main_journal: function(services, $route){            
            var journal_id = $route.current.params.JournalID;
            return services.get_journal(journal_id);
          }
        }    
    }).when("/EditJournalPage/:pageID", {        
        title: 'Edit Journal Page',
        templateUrl:base_url+'admin1/angular_pages/edit-journal-page.html',
        controller: "EditJournalPageController",
        resolve: {
          main_page: function(services, $route){            
            var Page_id = $route.current.params.pageID;
            return services.get_journalPage(Page_id);
          }
        }    
    }).when("/EditNewEbmember/:pageID", {        
        title: 'Edit Eb Member',
        templateUrl:base_url+'admin1/angular_pages/edit-eb-member.html',
        controller: "EditEbMemberController",
        resolve: {
          eb_member: function(services, $route){            
            var Page_id = $route.current.params.pageID;
            return services.get_New_Ebmember(Page_id);
          }
        }    
    }).when("/EditJournalArchive/:ArchiveId", {        
        title: 'Edit Journal Archive',
        templateUrl:base_url+'admin1/angular_pages/edit-journal-archive.html',
        controller: "EditJournalArchiveController",
        resolve: {
          archive: function(services, $route){            
            var archive_id = $route.current.params.ArchiveId;            
            return services.get_journalArchive(archive_id);
          }
        }    
    }).when("/EditLatestArticle/:ArticleId", {        
        title: 'Edit Latest Article',
        templateUrl:base_url+'admin1/angular_pages/edit-latest-article.html',
        controller: "EditLatestArticleController",
        resolve: {
          latest_articles: function(services, $route){            
            var article_id = $route.current.params.ArticleId;            
            return services.get_LatestArticle(article_id);
          }
        }    
    }).when("/EditTestimonial/:ArticleId", {        
        title: 'Edit Testimonial',
        templateUrl:base_url+'admin1/angular_pages/edit-testimonial.html',
        controller: "EditTestimonialController",
        resolve: {
          testimonials: function(services, $route){            
            var article_id = $route.current.params.ArticleId;            
            return services.get_Testimonials(article_id);
          }        
        }    
    }).when("/EditSuplitype/:sid", {        
        title: 'Edit Supli Type',
        templateUrl:base_url+'admin1/angular_pages/edit-supli-type.html',
        controller: "EditSupliTypeController",
        resolve: {
          suplitypes: function(services, $route){        
            var sid = $route.current.params.sid;                            
            return services.get_Suplitype(sid);
          }        
        }    
    }).when("/EditFulltextArticle/:sid", {
        title: 'Edit Supli Type',
        templateUrl:base_url+'admin1/angular_pages/edit-fulltext-article.html',
        controller: "EditFulltextController",
        resolve: {
          fulltextArticle: function(services, $route){        
            var sid = $route.current.params.sid;                            
            return services.get_FulltextArticle(sid);
          }        
        }    
    })
    .otherwise({
        redirectTo: "/login"
    });
}]);

app.controller('loginController', function($scope,$rootScope,$http){
    $scope.checkLogin = function(user) {       
        $http({
            url: base_url+'admin/validate_credentials',
            method: "POST",
            data: user
        })
        .then(function(response) {
            console.log(response);
            window.location = base_url+'admin#/Dashboard'
        });
    }
});
app.controller('dashboardController', function($scope,$rootScope,$http){        
    $http({
        url: base_url+'admin/dashboard',
        method: "POST"        
    })
    .then(function(response) {
        $scope.count = response.data[0];
        return $scope;
    });    
});
/*app.controller('JournalsController', function($scope,$rootScope,$http){        
     $http({
        url: base_url+'admin/get_journals',
        method: "POST"        
    })
    .then(function(response) {
        $scope.main_journals = response.data;
        return $scope;
    }); 
});*/
app.controller('MainCategoriesController', function($scope,$rootScope,$http){        
    $http({
        url: base_url+'admin/get_categories',
        method: "POST"        
    })
    .then(function(response) {
        $scope.main_categories = response.data;
        return $scope;
    }); 
});
app.controller('JournalPostsController', function($scope,$rootScope,$http){        
    $http({
        url: base_url+'admin/get_journals_posts',
        method: "POST"        
    })
    .then(function(response) {        
        $scope.journal_posts = response.data;
        return $scope;
    });
});
app.controller('NewEbMembersController', function($scope,$rootScope,$http,$window){        
    /*$http({
        url: base_url+'admin/get_new_eb_members',
        method: "POST"        
    })
    .then(function(response) {        
        $scope.eb_members = response.data;
        return $scope;
    });
    $scope.GetJournalArchives = function(j_info) {
        $http({
            url: base_url+'admin/get_archives_by_journal',
            method: "POST",
            data: j_info
        })
        .then(function(response) {
            $scope.journal_posts_archives = response.data;
        });
    };*/

    $http({
        url: base_url+'admin/get_only_journals',
        method: "POST"        
    })
    .then(function(response) {
        console.log(response);
        $scope.journals = response.data;
        $scope.journal_posts_archives = [];
        return $scope;
    });
    $scope.GetEbMembers= function(j_info) {
        $http({
            url: base_url+'admin/get_new_eb_members_by_journal',
            method: "POST",
            data: j_info
        })
        .then(function(response) {
            $scope.eb_members = response.data;
        });
    };
    $scope.ebmemberDelete = function(e_id) {
      var deleteeb_member = $window.confirm('Are you absolutely sure you want to delete?');
          if(deleteeb_member) {
         $http({
            url: base_url+'admin/deleteEBmember',
            method: "POST",
            data: {id:e_id}
        })
        .then(function(response) {
           $('#eb_members_'+e_id).closest('tr').remove();
        });       
        }
    };
});
app.controller('FulltextArticlesController', function($scope,$rootScope,$http){        
    $http({
        url: base_url+'admin/get_fulltext_articles',
        method: "POST"        
    })
    .then(function(response) {        
        $scope.fulltext_Articles = response.data;
        return $scope;
    });    
});
app.controller('JournalArchiveController', function($scope,$rootScope,$http){        
    $http({
        url: base_url+'admin/get_only_journals',
        method: "POST"        
    })
    .then(function(response) {
        console.log(response);
        $scope.journals = response.data;
        $scope.archive_type = [{"id":"1","name":"Article In Press"},{"id":"2","name":"Current Issue"},{"id":"3","name":"Archive"},{"id":"4","name":"Special Issues"}]
        $scope.journal_posts_archives = [];
        return $scope;
    });
    $scope.GetJournalArchives = function(j_info) {
        $http({
            url: base_url+'admin/get_archives_by_journal',
            method: "POST",
            data: j_info
        })
        .then(function(response) {
            $scope.journal_posts_archives = response.data;
        });
    };
 $scope.tinymceOptions = {
    onChange: function(e) {
      // put logic here for keypress and cut/paste changes
    },
    inline: false,
    plugins : 'advlist autolink link image lists charmap print preview link media',
    skin: 'lightgray',
    theme : 'modern',
    width : 600,
    height : 300
  };
});
app.controller('LatestArticlesController', function($scope,$rootScope,$http){        
    $http({
        url: base_url+'admin/get_LatestArticles',
        method: "POST"        
    })
    .then(function(response) {        
        $scope.latest_articles = response.data;
        return $scope;
    });
});
app.controller('TestimonialsController', function($scope,$rootScope,$http){        
    $http({
        url: base_url+'admin/get_Testimonials',
        method: "POST"        
    })
    .then(function(response) {        
        $scope.testimonials = response.data;
        return $scope;
    });
});
app.controller('SuplitypeController', function($scope,$rootScope,$http){        
    $http({
        url: base_url+'admin/get_Suplitypes',
        method: "POST"        
    })
    .then(function(response) {        
        $scope.suplitypes = response.data;
        return $scope;
    });
});
app.controller('SubmitManuscriptController', function($scope,$rootScope,$http){        
    $http({
        url: base_url+'admin/get_SubmitManuscript',
        method: "POST"        
    })
    .then(function(response) {        
        $scope.SubmitManuscript = response.data;
        return $scope;
    });
});

app.controller('EditFulltextController', function($scope,$rootScope,$routeParams,$location,services,fulltextArticle){        
   var sid = ($routeParams.sid) ? parseInt($routeParams.sid) : 0;
    $rootScope.title = (sid > 0) ? 'Edit Fulltext' : 'Add Fulltext';
    $scope.buttonText = (sid > 0) ? 'Update Fulltext' : 'Add New Fulltext';    
    
    
    $scope.fulltext_article = fulltextArticle.data.fulltext_info[0];
    $scope.journal_info = fulltextArticle.data.j_info;

    $scope.saveFulltext = function(fulltextArticle) {                            
        if (sid <= 0) {            
            services.updateFulltextArticle(0,fulltextArticle,$scope);
        }
        else {
            services.updateFulltextArticle(sid, fulltextArticle,$scope);
        }
    }
});

app.controller('CollaborationsController', function($scope,$rootScope,$http){        
    $http({
        url: base_url+'admin/get_Collaborations',
        method: "POST"        
    })
    .then(function(response) {        
        $scope.collaborations = response.data;
        return $scope;
    });
});
app.controller('EditEbMemberController', function($scope,$rootScope,$routeParams,$location,services,eb_member) { 

    var page_id = ($routeParams.pageID) ? parseInt($routeParams.pageID) : 0;
    $rootScope.title = (page_id > 0) ? 'Edit Eb Member' : 'Add Eb Member';
    $scope.buttonText = (page_id > 0) ? 'Update Eb Member' : 'Add New Eb Member';    
    console.log(eb_member);
    var original = eb_member.data.eb_info;
    
    if(page_id == 0) {
        original.post_content = '';
    }
    $scope.eb_member = original[0];
    $scope.journal_info = eb_member.data.journal_info;

    $scope.isClean = function() {
       return angular.equals(original, $scope.eb_member);
    }
    $scope.saveEbMember = function(eb_member) {        
        if (page_id <= 0) {            
            services.updateEbMember(0,eb_member,$scope);
        }
        else {
            services.updateEbMember(page_id, eb_member,$scope);
        }
    }
   
});

app.directive("globalFileUpload", function() {    
return {
        restrict : "A",        
        link: function($scope, element, attrs) {

            if(attrs.id == 'global-file-upload-latest-article' || attrs.id == 'global-file-upload-testimonial' || attrs.id == 'global-file-upload-eb-member') {
                var extn_arr = ['png','jpeg','jpg','gif'];
            } else if(attrs.id == 'global-file-upload-s-pdf' || attrs.id == 'global-file-upload-archive-pdf') {
                var extn_arr = ['pdf'];
            }
        var uploader = new qq.FineUploader({
            element: document.getElementById(attrs.id),
            template: 'qq-template-gallery', 
            multiple: false,
            allowMultipleItems: false,
            request: {
                endpoint:  base_url+'admin/upload_files',
            },
            deleteFile: {
                enabled: true,
                forceConfirm: true,
                endpoint:  base_url+'admin/upload_files',
            },
            validation: {
                allowedExtensions: extn_arr,
                sizeLimit: 5 * 1024* 1024
            },
            callbacks: {
                onDelete: function(id) {
                    $('.qq-upload-list').html('');
                    if(attrs.id == 'global-file-upload-testimonial') {
                        $scope.testimonial.user_img =  "";
                    } else if(attrs.id == 'global-file-upload-latest-article') {
                        $scope.latest_article.article_image =  "";
                    }
                    else if(attrs.id == 'global-file-upload-archive-pdf') {
                        $scope.archive_info.archive_pdf =  "";
                    } else if(attrs.id == 'global-file-upload-s-pdf') {
                        $scope.archive_info.supli_pdf =  "";
                    } else if(attrs.id == ' global-file-upload-eb-member') {
                        $scope.eb_member.eb_member_photo =  "";
                    }
                   
                    $scope.$apply();
                },
                onComplete: function(id, name, responseJSON, maybeXhr) {                        
                    if(attrs.id == 'global-file-upload-testimonial') {
                        $scope.testimonial.user_img =  responseJSON.file_data.upload_data.file_name;
                    } else if(attrs.id == 'global-file-upload-latest-article') {
                        $scope.latest_article.article_image =  responseJSON.file_data.upload_data.file_name;
                    } else if(attrs.id == 'global-file-upload-archive-pdf') {
                        $scope.archive_info.archive_pdf =  responseJSON.file_data.upload_data.file_name;
                    } else if(attrs.id == 'global-file-upload-s-pdf') {
                        $scope.archive_info.supli_pdf =  responseJSON.file_data.upload_data.file_name;
                    }else if(attrs.id == 'global-file-upload-eb-member') {
                        $scope.eb_member.eb_member_photo =  responseJSON.file_data.upload_data.file_name;
                    }
                    $scope.$apply();
                },
                onSubmit: function() {
                     angular.element('#'+attrs.id).closest('.col-sm-9').find('.repopulate-uploaded-file').find('.qq-upload-list').remove();
                     //angular.element('.repopulate-uploaded-file').find('.qq-upload-list').remove();
                }
            }
        });
        $scope.removeFile =  function() {
            angular.element('.repopulate-uploaded-file').find('.qq-upload-list').remove();
            if(attrs.id == 'global-file-upload-testimonial') {
                $scope.testimonial.user_img =  "";
            } else if(attrs.id == 'global-file-upload-latest-article') {
                $scope.latest_article.article_image =  "";
            } else if(attrs.id == 'global-file-upload-archive-pdf') {
                $scope.archive_info.archive_pdf =  "";
            } else if(attrs.id == 'global-file-upload-s-pdf') {
                $scope.archive_info.supli_pdf =  "";
            } else if(attrs.id == 'global-file-upload-eb-member') {
                $scope.eb_member.eb_member_photo =  "";
            }
            $scope.$apply();
        }
  }

  }
});



