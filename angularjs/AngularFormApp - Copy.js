app.directive('myGrid', myGrid);
function myGrid() {
     return {          
          templateUrl:base_url+'admin1/angular_pages/GridTemplate.html',
          restrict: 'E',
          scope: {
              options : '=',
          },
          bindToController: true,
          link: function(scope, element, attrs) {
            console.log(scope);            
            scope.gridOptions = {
              data: scope.options.data, 
              columnDefs: scope.options.columnDefs, 
            };
          }
      };
}

app.controller('EditMaincategoryController', function($scope,$rootScope,$routeParams,$location,factory,main_category){        
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
            factory.updateCategory("0",main_category);
        }
        else {
            factory.updateCategory(main_cat_id, main_category);
        }
    }
});
app.controller('EditJournalController', function($scope,Upload,$timeout,$rootScope,$routeParams,$location,factory,main_journal) { 
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
            factory.updateJournal(0,main_journal);
        }
        else {
            factory.updateJournal(journal_id, main_journal);
        }
    }
    $scope.uploadImage = function(file) {
        if(file) {
            factory.saveUploadedImage(journal_id, file);
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
app.controller('EditJournalPageController', function($scope,$rootScope,$routeParams,$location,factory,main_page) { 

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
            factory.updateJournalPage(0,main_page,$scope);
        }
        else {
            factory.updateJournalPage(page_id, main_page,$scope);
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

app.controller('EditLatestArticleController', function($scope,$rootScope,$routeParams,$location,factory,latest_articles){        
   var article_id = ($routeParams.ArchiveId) ? parseInt($routeParams.ArchiveId) : 0;
    $rootScope.title = (article_id > 0) ? 'Edit Latest Article' : 'Add Latest Article';
    $scope.buttonText = (article_id > 0) ? 'Update Latest Article' : 'Add New Latest Article';

    $scope.latest_article = latest_articles.data.article_info[0];
    $scope.journal_info = latest_articles.data.journal_info;

    $scope.saveLatestArticle = function(latest_article) {                
        if (article_id <= 0) {            
            factory.updateLatestArticle(0,latest_article,$scope);
        }
        else {
            factory.updateLatestArticle(archive_id, latest_article,$scope);
        }
    }
});
app.controller('EditTestimonialController', function($scope,$rootScope,$routeParams,$location,factory,testimonials){        
   var article_id = ($routeParams.ArchiveId) ? parseInt($routeParams.ArchiveId) : 0;
    $rootScope.title = (article_id > 0) ? 'Edit Testimonials' : 'Add Testimonials';
    $scope.buttonText = (article_id > 0) ? 'Update Testimonials' : 'Add New Testimonials';

    $scope.testimonial = testimonials.data[0];

    $scope.saveTestimonial = function(testimonials) {                        
        if (article_id <= 0) {            
            factory.updateTestimonial(0,testimonials,$scope);
        }
        else {
            factory.updateTestimonial(archive_id, testimonials,$scope);
        }
    }
});
app.controller('EditSupliTypeController', function($scope,$rootScope,$routeParams,$location,factory,suplitypes){        
   var sid = ($routeParams.sid) ? parseInt($routeParams.sid) : 0;
    $rootScope.title = (sid > 0) ? 'Edit Suplitype' : 'Add Suplitype';
    $scope.buttonText = (sid > 0) ? 'Update Suplitype' : 'Add New Suplitype';    
    
    
    $scope.suplitype = suplitypes.data.s_info[0];
    $scope.journal_info = suplitypes.data.j_info;

    $scope.saveSuplitype = function(suplitypes) {
        console.log(suplitypes);                    
        if (sid <= 0) {            
            factory.updateSuplitype(0,suplitypes,$scope);
        }
        else {
            factory.updateSuplitype(sid, suplitypes,$scope);
        }
    }
});
app.controller('EditJournalArchiveController', function($scope,$rootScope,$routeParams,$location,factory,archive,$http) {     
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
            factory.updateJournalArchive(0,archive_info,$scope);
        }
        else {
            factory.updateJournalArchive(archive_id, archive_info,$scope);
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

/*app.controller('JournalsController', function($scope,factory) {    
    $http({
        url: base_url+'admin/get_journals',
        method: "POST"        
    })
    .then(function(data) {
        $scope.main_journals = data.data;
        return $scope;
    }); 
});
*/

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
app.controller('JournalsController', function($scope,$rootScope,$http,$timeout){        
    $scope.gridOptions1 = {
        paginationPageSizes: [25, 50, 75],
        paginationPageSize: 100,
        columnDefs: [
          { name: 'journal_name',width:'400'},
          { name: 'issn_number' ,width:'150'},
          { name: 'category_name',width:'150' },          
          { name: 'created_date'},
          { name: 'Edit',
            cellTemplate: '<a class="modify-icon" ng-click="grid.appScope.editRow(row)">Edit</a>'
          },
          { name: 'Delete',
            cellTemplate: '<a class="modify-icon" ng-click="grid.appScope.deleteRow(row)">Delete</a>'
          }
        ]
    };

    $http({
        url: base_url+'admin/get_journals',
        method: "POST"        
    })
    .then(function(response) {
        $scope.gridOptions1.data = response.data;
        /*$scope.main_journals = response.data;
        return $scope;*/
    }); 
    $timeout(function(){
        angular.element('.grid').height((angular.element(window).height() - 150)+'px');
    },2000);
});
app.controller('MainCategoriesController', function($scope,$rootScope,$http){        
    $scope.gridOptions1 = {
        paginationPageSizes: [25, 50, 75],
        paginationPageSize: 100,
        columnDefs: [
          { name: 'category_id' },
          { name: 'category_name' },
          { name: 'created_date' },          
          { name: 'updated_date'},
          { name: 'Edit',
            cellTemplate: '<a class="modify-icon" ng-click="grid.appScope.editRow(row)">Edit</a>'
          },
          { name: 'Delete',
            cellTemplate: '<a class="modify-icon" ng-click="grid.appScope.deleteRow(row)">Delete</a>'
          }
        ]
    };
    $http({
        url: base_url+'admin/get_categories',
        method: "POST"        
    })
    .then(function(response) {
        //$scope.main_categories = response.data;
        //return $scope;
        $scope.gridOptions1.data = response.data;
    }); 
});
app.controller('JournalPostsController', function($scope,$rootScope,$http,$timeout) {
 /*$scope.gridOptions1 = {
        paginationPageSizes: [25, 50, 75],
        paginationPageSize: 75,
        virtualizationThreshold: 75,
        columnDefs: [
          { name: 'post_name' ,width:160},
          { name: 'journal_name' ,width:330},
          { name: 'category_name',width:150},          
          { name: 'created_date',width:140},
          { name: 'updated_date',width:130},
          { name: 'Edit',
            cellTemplate: '<a class="modify-icon" ng-click="grid.appScope.editRow(row)">Edit</a>'
          },
          { name: 'Delete',
            cellTemplate: '<a class="modify-icon" ng-click="grid.appScope.deleteRow(row)">Delete</a>'
          }
        ],
        onRegisterApi: function (gridApi) {
          gridApi.pagination.on.paginationChanged($scope,function(){
            $scope.gridOptions.virtualizationThreshold =  $scope.gridOptions.paginationPageSize;
          })
        }
    };*/
    var self = this; 
        self.grid_data = {};
        /*self.grid_data.data = [
            {
                "post_name": "Cox",
                "journal_name": "Carney",
                "created_date": "Enormo",
                "updated_date": 'true',
                "id":'222',
                "category_name":"dsdsds"
            }
        ];*/

        self.grid_data.columnDefs = [
              { name: 'post_name' ,width:160},
              { name: 'journal_name' ,width:330},
              { name: 'category_name',width:150},          
              { name: 'created_date',width:140},
              { name: 'updated_date',width:130},
              { name: 'Edit',
                cellTemplate: '<a class="modify-icon" ng-click="grid.appScope.editRow(row)">Edit</a>'
              },
              { name: 'Delete',
                cellTemplate: '<a class="modify-icon" ng-click="grid.appScope.deleteRow(row)">Delete</a>'
              }
            ];

    $http({
        url: base_url+'admin/get_journals_posts',
        method: "POST"        
    })
    .then(function(response) {
        console.log(response.data);                
        //this.journal_posts.data = response.data;
        self.grid_data.data = [
            {
                "post_name": "Cox",
                "journal_name": "Carney",
                "created_date": "Enormo",
                "updated_date": 'true',
                "id":'222',
                "category_name":"dsdsds"
            }
        ];
        /*$scope.journal_posts = response.data;
        return $scope;*/
    });

    /*$timeout(function(){
        angular.element('.grid').height((angular.element(window).height() - 120)+'px');
        angular.element('.ui-grid-viewport').height((angular.element(window).height() - 185)+'px');
    },100);*/
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

app.controller('EditFulltextController', function($scope,$rootScope,$routeParams,$location,factory,fulltextArticle){        
   var sid = ($routeParams.sid) ? parseInt($routeParams.sid) : 0;
    $rootScope.title = (sid > 0) ? 'Edit Fulltext' : 'Add Fulltext';
    $scope.buttonText = (sid > 0) ? 'Update Fulltext' : 'Add New Fulltext';    
    
    
    $scope.fulltext_article = fulltextArticle.data.fulltext_info[0];
    $scope.journal_info = fulltextArticle.data.j_info;

    $scope.saveFulltext = function(fulltextArticle) {                            
        if (sid <= 0) {            
            factory.updateFulltextArticle(0,fulltextArticle,$scope);
        }
        else {
            factory.updateFulltextArticle(sid, fulltextArticle,$scope);
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
app.controller('EditEbMemberController', function($scope,$rootScope,$routeParams,$location,factory,eb_member) { 

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
            factory.updateEbMember(0,eb_member,$scope);
        }
        else {
            factory.updateEbMember(page_id, eb_member,$scope);
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



