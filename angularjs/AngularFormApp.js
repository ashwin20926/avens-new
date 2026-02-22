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
        $scope.server_msg = 'Details are saving....';
        if (main_cat_id <= 0) {
            factory.updateCategory("0",main_category,$scope);            
        }
        else {
            factory.updateCategory(main_cat_id, main_category,$scope);
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
        $scope.server_msg = 'Details are saving....';
        if (journal_id <= 0) {
            factory.updateJournal(0,main_journal,$scope);
        }
        else {
            factory.updateJournal(journal_id, main_journal,$scope);
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
         $scope.server_msg = 'Details are saving....';
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
        $scope.server_msg = 'Details are saving....';
        if (article_id <= 0) {            
            factory.updateLatestArticle(0,latest_article,$scope);
        }
        else {
            factory.updateLatestArticle(archive_id, latest_article,$scope);
        }
    }
});
app.controller('userEnquiriesController', function($scope,$rootScope,$http, $window){        
    $scope.spinner = true;
    $scope.gridOptions1 = {
        paginationPageSizes: [25, 50, 75],
        paginationPageSize: 75,
        virtualizationThreshold: 75,
        rowHeight:50,
        columnDefs: [          
          { name: 'name',width:150},                
          { name: 'email',width:200},
          { name: 'department', width:150},
          { name: 'research_interests', width:160},
          { name: 'interest_journals', width:150},
{
            field: 'attached_file',
            cellTemplate: '<div class="ui-grid-cell-contents"><a href="https://www.avensonline.org/public/images/{{ COL_FIELD  }}" download>{{ COL_FIELD }}</a></div>',
            width:150
          },
          { name: 'university', width:150},
          { 
            name: 'signup_type',
            width:110,
            cellTemplate: '<div class="ui-grid-cell-contents"><div ng-show="{{row.entity.signup_type == 1}}"><span class="user-pill author-pill">Author</span></div><div ng-show="{{row.entity.signup_type == 2}}"><span class="user-pill editor-pill">Editor</span></div><div ng-show="{{row.entity.signup_type == 3}}"><span class="user-pill reviewer-pill">Reviewer</span></div></div>'
          },
          { 
            name: 'read_status',
            width:110,            
            cellTemplate: '<div class="ui-grid-cell-contents"><div ng-if="row.entity.read_status == 2"><button ng-click="grid.appScope.setUserEnquiryStatus(row.entity,$event)" class="btn btn-primary">Unread</button></div><div ng-if="row.entity.read_status == 1"><button ng-click="grid.appScope.setUserEnquiryStatus(row.entity,$event)" class="btn btn-success">Read</button></div></div>'
          },
          { name: 'created_date', width:100, displayName: 'Sent Date'},
          { name: 'Delete',
            cellTemplate: '<a class="modify-icon" ng-click="grid.appScope.deleteRow(row)">Delete</a>',
            width:60
          }
        ],
        onRegisterApi: function (gridApi) {
          gridApi.pagination.on.paginationChanged($scope,function(){
            $scope.gridOptions.virtualizationThreshold =  $scope.gridOptions.paginationPageSize;
          })
        },
    };
    $scope.setUserEnquiryStatus = function(rowEntity,$event) {
        console.log($event);
        console.log($scope.gridOptions1.data);
        $http({
            url: base_url+'admin/setUserEnquiryStatus',
            method: "POST",
            data: {id: rowEntity.id, read_status: rowEntity.read_status}
        })
        .then(function(response) {            
            //console.log(response.data.count[0].count);
            if(response.data.status) {                

                if(rowEntity.read_status == 1) {
                    var read_status = 2;
                } else if(rowEntity.read_status == 2) {
                    var read_status = 1;
                }

                angular.forEach($scope.gridOptions1.data, function(v,i) {
                    if(v.id == rowEntity.id) {                
                        v.read_status = read_status;                        
                    }
                });                
                $rootScope.unread_count = response.data.count[0].count;
            }
        });        
    }
    
    $scope.getTableHeight = function() {
       var rowHeight = 110; // your row height
       var headerHeight = 100; // your header height
       return {
          height: (angular.element(window).height() - 119)+'px'
       };
    };
    $scope.deleteRow = function(row) {
      var deleteeb_member = $window.confirm('Are you absolutely sure you want to delete?');
      if (deleteeb_member) {
        $http({
            url: base_url+'admin/deleteUserEnquiry',
            method: "POST",
            data: {id:row.entity.id}
        })
        .then(function(response) {
            //$('#eb_members_'+row.entity.id).closest('tr').remove();            
                var index = $scope.gridOptions1.data.indexOf(row.entity);
                    $scope.gridOptions1.data.splice(index, 1);
        });
      }
    };
    $http({
        url: base_url+'admin/getUserEnquiries',
        method: "POST"
    })
    .then(function(response) {        
        $scope.gridOptions1.data = response.data.enquiries_data;
        $rootScope.unread_count =  response.data.enquiries_unread_count[0].count;        
        $scope.spinner = false;
    });
});
app.controller('UploadFilesToserverController', function($scope,$rootScope,$http){
    console.log('iam here');
});
app.controller('HomeLatestUpdatesController', function($scope,$rootScope,$http){        
    $scope.spinner = true;
    $scope.gridOptions1 = {
        paginationPageSizes: [25, 50, 75],
        paginationPageSize: 75,
        virtualizationThreshold: 75,
        rowHeight:300,
        columnDefs: [          
          { name: 'latest_update_description',width:715},                
          { name: 'created_date',width:150},
          { name: 'updated_date', width:150},
          { name: 'id',
            displayName: 'Edit',
            cellTemplate: '<a class="modify-icon" href="#/EditHomeLatestUpdate/{{COL_FIELD}}">Edit</a>',width:60
          }
        ],
        onRegisterApi: function (gridApi) {
          gridApi.pagination.on.paginationChanged($scope,function(){
            $scope.gridOptions.virtualizationThreshold =  $scope.gridOptions.paginationPageSize;
          })
        }
    };
    $scope.getTableHeight = function() {
       var rowHeight = 110; // your row height
       var headerHeight = 100; // your header height
       return {
          height: (angular.element(window).height() - 119)+'px'
       };
    };

    $http({
        url: base_url+'admin/get_Home_Latest_Updates',
        method: "POST"
    })
    .then(function(response) {
        //$scope.journal_posts_archives = response.data;
        console.log(response.data);
        $scope.gridOptions1.data = response.data; 
        $scope.spinner = false;
    });
});
app.controller('EditHomeLatestUpdateController', function($scope,$rootScope,$routeParams,$location,factory,latest_home_update){        
    var latest_u_id = ($routeParams.updateID) ? parseInt($routeParams.updateID) : 0;
    $rootScope.title = (latest_u_id > 0) ? 'Edit Update' : 'Add Update';
    $scope.buttonText = (latest_u_id > 0) ? 'Edit Update' : 'Add Update';    
    var original = latest_home_update.data[0];    
    $scope.latest_home_update = original;
    $scope.saveLatestUpdate = function(latest_home_update) {
        $scope.server_msg = 'Details are saving....';
        if (latest_u_id <= 0) {
            factory.updateLatestUpdate("0",latest_home_update,$scope);            
        }
        else {
            factory.updateLatestUpdate(latest_u_id, latest_home_update,$scope);
        }
    }
});
app.controller('EditTestimonialController', function($scope,$rootScope,$routeParams,$location,factory,testimonials){        
   var article_id = ($routeParams.ArchiveId) ? parseInt($routeParams.ArchiveId) : 0;
    $rootScope.title = (article_id > 0) ? 'Edit Testimonials' : 'Add Testimonials';
    $scope.buttonText = (article_id > 0) ? 'Update Testimonials' : 'Add New Testimonials';

    $scope.testimonial = testimonials.data[0];

    $scope.saveTestimonial = function(testimonials) {                        
        $scope.server_msg = 'Details are saving....';
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
app.controller('UploadFilesToserverController', function($scope,$rootScope,$http,$timeout) {
    $scope.spinner = true; 
    $scope.gridOptions1 = {
        paginationPageSizes: [25, 50, 75],
        paginationPageSize: 100,
        virtualizationThreshold: 75,        
        rowHeight:50,
        columnDefs: [
          { name: 'file_name',width:'200'},
          { name: 'full_path' ,width:'400'},
          { name: 'file_type',width:'100'},
          { name: 'image_type',width:'110'},
          { name: 'file_ext',width:'110'},
          { name: 'created_date',width:'150'}
        ],
        onRegisterApi: function (gridApi) {
          gridApi.pagination.on.paginationChanged($scope,function(){
            $scope.gridOptions.virtualizationThreshold =  $scope.gridOptions.paginationPageSize;
          })
        }
    };
    $scope.getTableHeight = function() {       
       return {
          height: (angular.element(window).height() - 450)+'px'
       };
    };    
    getUploadedFiles();

    function getUploadedFiles(search_value) {
        $http({
            url: base_url+'admin/getUploadedFiles',
            method: "POST"
        })
        .then(function(response) {
            $scope.gridOptions1.data = response.data;
             $timeout(function() {
                $scope.spinner= false;
             }, 500);        
        });              
    }   
});
app.controller('EditJournalArchiveController', function($scope,$rootScope,$routeParams,$location,factory,archive,$http) {     
    var archive_id = ($routeParams.ArchiveId) ? parseInt($routeParams.ArchiveId) : 0;
    $rootScope.title = (archive_id > 0) ? 'Edit Journal Archive' : 'Add Journal Archive';
    $scope.buttonText = (archive_id > 0) ? 'Update Journal Archive' : 'Add New Journal Archive';    
    var archive_years = [];
    for (var i = 2000; i <=  2026 ; i++) {
        archive_years.push(i);
    }
    var original = archive.data.archive_info;
    $scope.archive_info = original[0];
    $scope.journal_info = archive.data.journal_info;  
    //$scope.volumes_arr = [{"id":"volume-1-issue-1","name":"volume 1 issue 1"},{"id":"volume-1-issue-2","name":"volume 1 issue 2"},{"id":"volume-2-issue-1","name":"volume 2 issue 1"},{"id":"volume-2-issue-2","name":"volume 2 issue 2"},{"id":"volume-3-issue-1","name":"volume 3 issue 1"},{"id":"volume-3-issue-2","name":"volume 3 issue 2"},{"id":"volume-4-issue-1","name":"volume 4 issue 1"},{"id":"volume-4-issue-2","name":"volume 4 issue 2"}];
/*    $scope.volumes_arr = [{"id":"volume-1-issue-1","name":"volume 1 issue 1"},{"id":"volume-1-issue-2","name":"volume 1 issue 2"},
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
                        {"id":"volume-6-issue-3","name":"volume 6 issue 3"}];    */
    //$scope.volumes_arr  = archive.data.volume_info;
    $scope.original_volumes_arr  = archive.data.volume_info;
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
    $scope.getRelatedVolumes = function(journal_id) {

        $scope.volumes_arr = [];
        angular.forEach($scope.original_volumes_arr, function(v,i){
            if(v.journal_id == journal_id || v.journal_id == '9999') {
                $scope.volumes_arr.push(v);
            }            
        });
    }
    if(archive_id == 0) {
        $scope.volumes_arr = [];
        angular.forEach($scope.original_volumes_arr, function(v,i){
            if(v.journal_id == '9999') {
                $scope.volumes_arr.push(v);
            }            
        });   
    } else {
     if($scope.archive_info.journal_id) {
        $scope.volumes_arr = [];
        angular.forEach($scope.original_volumes_arr, function(v,i){
            if(v.journal_id == $scope.archive_info.journal_id || v.journal_id == '9999') {
                $scope.volumes_arr.push(v);
            }            
        });   
    }
    }
    $scope.convertToJournalSlug = function(elem) {        
        $.each($scope.journal_info,function(i,v){
            if(v.id == elem){                
                    $('#journal_slug').val(v.journal_name.toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-'));                            
            }
        });        

    };
    $scope.saveJournalArchive = function(archive_info) {                
        $scope.server_msg = 'Details are saving....';
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
//        $scope.count = response.data[0];
$scope.count = response.data.dashboard_info[0];
        $rootScope.unread_count = response.data.enquiries_unread_count[0].count;
        $rootScope.sm_unread_count = response.data.sm_unread_count[0].count;
        return $scope;
    });    
});
app.controller('JournalsController', function($scope,$rootScope,$http,$timeout){ 
    $scope.spinner = true; 
    $scope.gridOptions1 = {
        paginationPageSizes: [25, 50, 75],
        paginationPageSize: 100,
        virtualizationThreshold: 75,        
        rowHeight:50,
        columnDefs: [
          { name: 'journal_name',width:'400'},
          { name: 'issn_number' ,width:'150'},
          { name: 'category_name',width:'150' },
          { name: 'impact_factor',width: '130'},          
          { name: 'created_date'},
          { name: 'id',
            displayName: 'Edit',
            cellTemplate: '<a class="modify-icon" href="#/EditJournals/{{COL_FIELD}}">Edit</a>'
          }
        ],
        onRegisterApi: function (gridApi) {
          gridApi.pagination.on.paginationChanged($scope,function(){
            $scope.gridOptions.virtualizationThreshold =  $scope.gridOptions.paginationPageSize;
          })
        }
    };
    $scope.getTableHeight = function() {       
       return {
          height: (angular.element(window).height() - 120)+'px'
       };
    };
    $scope.searchGrid = function(search_value) {
        $scope.spinner = true; 
        $timeout(function() {
            getJournals(search_value);            
        },1000);
    }

    getJournals();

    function getJournals(search_value) {
        $http({
            url: base_url+'admin/get_journals',
            method: "POST",
            data : JSON.stringify({"search_value":search_value})
        })
        .then(function(response) {
            $scope.gridOptions1.data = response.data;
             $timeout(function() {
                $scope.spinner= false;
             }, 500);        
        });              
    }
});
app.controller('MainCategoriesController', function($scope,$rootScope,$http,$timeout){
    $scope.spinner = true;        
    $scope.gridOptions1 = {
        paginationPageSizes: [25, 50, 75],
        paginationPageSize: 100,
        virtualizationThreshold: 75,
        rowHeight:40,
        columnDefs: [          
          { name: 'category_name' },
          { name: 'created_date' },          
          { name: 'updated_date'},
          { displayName: 'Edit',
            name: 'category_id',
            cellTemplate: '<a class="modify-icon" href="#/EditMainCategory/{{COL_FIELD}}">Edit</a>'
          }
        ],
        onRegisterApi: function (gridApi) {
          gridApi.pagination.on.paginationChanged($scope,function(){
            $scope.gridOptions.virtualizationThreshold =  $scope.gridOptions.paginationPageSize;
          })
        }
    };

    $scope.getTableHeight = function() {       
       return {
          height: (angular.element(window).height() - 120)+'px'
       };
    };

    $scope.searchGrid = function(search_value) {
        $scope.spinner = true; 
        $timeout(function() {
            getCategories(search_value);            
        },1000);
    }

    getCategories("");

    function getCategories(search_value) {
        $http({
            url: base_url+'admin/get_categories',
            method: "POST",
            data : JSON.stringify({"search_value":search_value})        
        })
        .then(function(response) {        
            $scope.gridOptions1.data = response.data;
             $timeout(function() {
                $scope.spinner= false;
             }, 500);
        });              
    }
});
app.controller('JournalPostsController', function($scope,$rootScope,$http,$timeout,$window) {
        $scope.spinner = true;
        $scope.gridOptions1 = {
        paginationPageSizes: [25, 50, 75],
        paginationPageSize: 75,
        virtualizationThreshold: 75,
        rowHeight:40,
        columnDefs: [
          { name: 'post_name' ,width:160},
          { name: 'journal_name' ,width:330},
          { name: 'category_name',width:150},          
          { name: 'created_date',width:140},
          { name: 'updated_date',width:130},
          { name: 'id',
            displayName: 'Edit',
            cellTemplate: '<a class="modify-icon" href="#/EditJournalPage/{{COL_FIELD}}">Edit</a>'
          }/*,
          { name: 'Delete',
            cellTemplate: '<a class="modify-icon" ng-click="grid.appScope.deleteRow(row)">Delete</a>'
          }*/
        ],
        onRegisterApi: function (gridApi) {
          gridApi.pagination.on.paginationChanged($scope,function(){
            $scope.gridOptions.virtualizationThreshold =  $scope.gridOptions.paginationPageSize;
          })
        }
    };
    $scope.getTableHeight = function() {
       var rowHeight = 110; // your row height
       var headerHeight = 100; // your header height
       return {
          height: (angular.element(window).height() - 120)+'px'
       };
    };
    $scope.searchGrid = function(search_value) {
        $scope.spinner = true; 
        $timeout(function() {
            getJournalPosts(search_value);            
        },1000);
    }

    $scope.deleteRow = function(row) {        
     /* var deleteeb_member = $window.confirm('Are you absolutely sure you want to delete?');
          if(deleteeb_member) {
         $http({
            url: base_url+'admin/deleteJournalPost',
            method: "POST",
            data: {id:row.entity.id}
        })
        .then(function(response) {
            if(response.data) {
                var index = $scope.gridOptions1.data.indexOf(row.entity);
                    $scope.gridOptions1.data.splice(index, 1);
            }           
        });       
        }*/
    };
    getJournalPosts();

    function getJournalPosts(search_value) {
        $http({
            url: base_url+'admin/get_journals_posts',
            method: "POST",
            data : JSON.stringify({"search_value":search_value})
        })
        .then(function(response) {                   
            $scope.gridOptions1.data = response.data;
            $timeout(function(){
                $scope.spinner = false;
            },500);
        });        
    }

});

app.controller('NewEbMembersController', function($scope,$rootScope,$http,$window,$timeout){            

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
        $scope.spinner = true;       
        $scope.gridOptions1 = {
            paginationPageSizes: [25, 50, 75],
            paginationPageSize: 150,
            virtualizationThreshold: 75,
            rowHeight:110,
            columnDefs: [
              { name: 'category_name' ,width:150},
              { name: 'journal_name',width:160},                
              { name: 'eb_member_name',width:150},
              { name: 'eb_member_email',width:200},
              {
                field: 'eb_member_photo',
                cellTemplate: '<div class="ui-grid-cell-contents"><img src="https://www.avensonline.org/wp-content/uploads/{{ COL_FIELD  }}" /></div>',
                width:150
              },      
              { name: 'eb_member_country', width:180},
              { name: 'editor_chief', width:150},              
              { name: 'eb_post_slug',width:130},
              { name: 'eb_journal_slug',width:150},
              { name: 'updated_date', width:130},
              { name: 'id',
                displayName: 'Edit',
                cellTemplate: '<a class="modify-icon" href="#/EditNewEbmember/{{ COL_FIELD }}"">Edit</a>',width:60
              },
              { name: 'Delete',
                cellTemplate: '<a class="modify-icon" ng-click="grid.appScope.deleteRow(row)">Delete</a>',width:60
              }
            ],
            onRegisterApi: function (gridApi) {
              gridApi.pagination.on.paginationChanged($scope,function(){
                $scope.gridOptions.virtualizationThreshold =  $scope.gridOptions.paginationPageSize;
              })
            }
        };
        $scope.getTableHeight = function() {           
           return {
              height: (angular.element(window).height() - 155)+'px'
           };
        };
        $http({
            url: base_url+'admin/get_new_eb_members_by_journal',
            method: "POST",
            data: j_info
        })
        .then(function(response) {            
            $scope.gridOptions1.data = response.data; 
            $scope.spinner = false;
        });        
    };
    $scope.deleteRow = function(row) {        
      var deleteeb_member = $window.confirm('Are you absolutely sure you want to delete?');
          if(deleteeb_member) {
         $http({
            url: base_url+'admin/deleteEBmember',
            method: "POST",
            data: {id:row.entity.id}
        })
        .then(function(response) {
           //$('#eb_members_'+row.entity.id).closest('tr').remove();            
                var index = $scope.gridOptions1.data.indexOf(row.entity);
                    $scope.gridOptions1.data.splice(index, 1);
        });       
        }
    };
});
app.controller('FulltextArticlesController', function($scope,$rootScope,$http,$timeout,$window) {        
    $scope.spinner = true;
    $scope.gridOptions1 = {
        paginationPageSizes: [25, 50, 75],
        paginationPageSize: 75,
        virtualizationThreshold: 75,
        rowHeight:110,
        columnDefs: [          
          {
            field: 'post_title',
            cellTemplate: '<div class="ui-grid-cell-contents"><a target="_blank" href="https://www.avensonline.org/fulltextarticles/{{ COL_FIELD  }}.html">{{ COL_FIELD }}</a>',
            width:200
          },
          { name: 'post_meta_keywords' ,width:300},
          { name: 'post_browser_title' ,width:300},
          { name: 'post_modified',width:140},
          { name: 'authors',width:140},
          { name: 'ID',
            displayName: 'Edit',
            cellTemplate: '<a class="modify-icon" href="#/EditFulltextArticle/{{ COL_FIELD }}">Edit</a>',
            width:60
          },
          { name: 'Delete',
            cellTemplate: '<a class="modify-icon" ng-click="grid.appScope.deleteRow(row)">Delete</a>',width:60
          }
        ],
        onRegisterApi: function (gridApi) {
          gridApi.pagination.on.paginationChanged($scope,function(){
            $scope.gridOptions.virtualizationThreshold =  $scope.gridOptions.paginationPageSize;
          })
        }
    };
    $scope.getTableHeight = function() {
       return {
          height: (angular.element(window).height() - 120)+'px'
       };
    };
    $scope.searchGrid = function(search_value) {
        $scope.spinner = true; 
        $timeout(function() {
            getFulltextArticles(search_value);            
        },1000);
    }
    getFulltextArticles();

    $scope.deleteRow = function(row) {        
      var deleteeb_member = $window.confirm('Are you absolutely sure you want to delete?');
          if(deleteeb_member) {
         $http({
            url: base_url+'admin/deleteFulltextarticle',
            method: "POST",
            data: {id:row.entity.ID}
        })
        .then(function(response) {
            if(response.data) {
                var index = $scope.gridOptions1.data.indexOf(row.entity);
                    $scope.gridOptions1.data.splice(index, 1);
            }           
        });       
        }
    };

    function getFulltextArticles(search_value) {
        $http({
            url: base_url+'admin/get_fulltext_articles',
            method: "POST",
            data : JSON.stringify({"search_value":search_value})
        })
        .then(function(response) {
            //$scope.journal_posts_archives = response.data;
            $scope.gridOptions1.data = response.data; 
            $scope.spinner = false;
        });
        
    }    
});
app.controller('JournalArchiveController', function($scope,$rootScope,$http,$timeout,$window){        
    $http({
        url: base_url+'admin/get_only_journals',
        method: "POST"        
    })
    .then(function(response) {
        $scope.journals = response.data;
        $scope.archive_type = [{"id":"1","name":"Article In Press"},{"id":"2","name":"Current Issue"},{"id":"3","name":"Archive"},{"id":"4","name":"Special Issues"}]
        $scope.journal_posts_archives = [];
        return $scope;
    });
    $scope.GetJournalArchives = function(j_info) {
        $scope.spinner = true;
        $scope.gridOptions1 = {
            paginationPageSizes: [25, 50, 75],
            paginationPageSize: 100,
            rowHeight:40,
            virtualizationThreshold: 75,
            columnDefs: [
              { name: 'journal_name' ,width:300},
              { name: 'category_name',width:130},          
              { name: 'archive_volume',width:120},              
              { name: 'archive_in',
                cellTemplate: '<div>{{COL_FIELD == 3 ? "Archive" : (COL_FIELD == 2 ? "Current Issue" : (COL_FIELD == 1 ? "Article In Press" : "Special Issue"))}}</div>'
              },
              { name: 'archive_year',width:110},
              { name: 'archive_pdf',width:200},
              { name: 'id',
                displayName: 'Edit',
                cellTemplate: '<a class="modify-icon" href="#/EditJournalArchive/{{COL_FIELD}}">Edit</a>'
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
        };

        $http({
            url: base_url+'admin/get_archives_by_journal',
            method: "POST",
            data: j_info
        })
        .then(function(response) {            
            $scope.gridOptions1.data = response.data; 
            $scope.spinner = false;
        });        
    };
    $scope.deleteRow = function(row) {        
      var deleteeb_member = $window.confirm('Are you absolutely sure you want to delete?');
        if(deleteeb_member) {
             $http({
                url: base_url+'admin/deleteJournalArchive',
                method: "POST",
                data: {id:row.entity.id}
            })
            .then(function(response) {
                if(response.data) {
                    var index = $scope.gridOptions1.data.indexOf(row.entity);
                        $scope.gridOptions1.data.splice(index, 1);
                }           
            });       
        }
    };
    $scope.getTableHeight = function() {       
       return {
          height: (angular.element(window).height() - 155)+'px'
       };
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
app.controller('LatestArticlesController', function($scope,$rootScope,$http,$timeout,$window) {
    $scope.spinner = true;
    $scope.gridOptions1 = {
        paginationPageSizes: [25, 50, 75],
        paginationPageSize: 75,
        virtualizationThreshold: 75,
        rowHeight:110,
        columnDefs: [
          { name: 'article_name' ,width:400},
          { name: 'pdf_link',width:200},          
          { name: 'journal_name',width:180},          
          {
            field: 'article_image',
            cellTemplate: '<div class="ui-grid-cell-contents"><img src="https://www.avensonline.org/wp-content/uploads/{{ COL_FIELD  }}" /></div>',
            width:150
          },          
          { name: 'author_name',width:150},
          { name: 'created_date',width:130},
          { name: 'id',
            displayName: 'Edit',
            cellTemplate: '<a class="modify-icon" href="#/EditLatestArticle/{{COL_FIELD}}">Edit</a>',width:60
          },
          { name: 'Delete',
            cellTemplate: '<a class="modify-icon" ng-click="grid.appScope.deleteRow(row)">Delete</a>',width:60
          }
        ],
        onRegisterApi: function (gridApi) {
          gridApi.pagination.on.paginationChanged($scope,function(){
            $scope.gridOptions.virtualizationThreshold =  $scope.gridOptions.paginationPageSize;
          })
        }
    };
    $scope.getTableHeight = function() {      
       return {
          height: (angular.element(window).height() - 119)+'px'
       };
    };
    $scope.deleteRow = function(row) {        
      var deleteeb_member = $window.confirm('Are you absolutely sure you want to delete?');
          if(deleteeb_member) {
         $http({
            url: base_url+'admin/deleteLatestArticle',
            method: "POST",
            data: {id:row.entity.id}
        })
        .then(function(response) {
            if(response.data) {
                var index = $scope.gridOptions1.data.indexOf(row.entity);
                    $scope.gridOptions1.data.splice(index, 1);
            }           
        });       
        }
    };
    $scope.searchGrid = function(search_value) {
        $scope.spinner = true; 
        $timeout(function() {
            getLatestArticles(search_value);            
        },1000);
    }
    getLatestArticles();
    function getLatestArticles(search_value) {
        $http({
            url: base_url+'admin/get_LatestArticles',
            method: "POST",            
            data : JSON.stringify({"search_value":search_value})
        })
        .then(function(response) {        
            $scope.gridOptions1.data = response.data; 
            $scope.spinner = false;
        });            
    }
    
});
app.controller('TestimonialsController', function($scope,$rootScope,$http,$timeout,$window) {
    $scope.spinner = true;
    $scope.gridOptions1 = {
        paginationPageSizes: [25, 50, 75],
        paginationPageSize: 75,
        virtualizationThreshold: 75,
        rowHeight:110,
        columnDefs: [
          { name: 'user_name' ,width:150},
          { name: 'testimonial_desc',width:400},                
          {
            field: 'user_img',
            cellTemplate: '<div class="ui-grid-cell-contents"><img src="https://www.avensonline.org/wp-content/uploads/{{ COL_FIELD  }}" /></div>',
            width:150
          },      
          { name: 'user_desig',width:150},
          { name: 'user_university', width:150},
          { name: 'created_date', width:150},
          { name: 'id',
            displayName: 'Edit',
            cellTemplate: '<a class="modify-icon" href="#/EditTestimonial/{{COL_FIELD}}">Edit</a>',width:60
          },
          { name: 'Delete',
            cellTemplate: '<a class="modify-icon" ng-click="grid.appScope.deleteRow(row)">Delete</a>',width:60
          }
        ],
        onRegisterApi: function (gridApi) {
          gridApi.pagination.on.paginationChanged($scope,function(){
            $scope.gridOptions.virtualizationThreshold =  $scope.gridOptions.paginationPageSize;
          })
        }
    };
    $scope.getTableHeight = function() {
       var rowHeight = 110; // your row height
       var headerHeight = 100; // your header height
       return {
          height: (angular.element(window).height() - 119)+'px'
       };
    };

    $scope.deleteRow = function(row) {        
      var deleteeb_member = $window.confirm('Are you absolutely sure you want to delete?');
          if(deleteeb_member) {
         $http({
            url: base_url+'admin/deleteTestimonial',
            method: "POST",
            data: {id:row.entity.id}
        })
        .then(function(response) {
            if(response.data) {
                var index = $scope.gridOptions1.data.indexOf(row.entity);
                    $scope.gridOptions1.data.splice(index, 1);
            }           
        });       
        }
    };

    $http({
        url: base_url+'admin/get_Testimonials',
        method: "POST"
    })
    .then(function(response) {
        //$scope.journal_posts_archives = response.data;
        $scope.gridOptions1.data = response.data; 
        $scope.spinner = false;
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

app.controller('SitemapController', function($scope,$rootScope,$http){        
    $http({
        url: base_url+'admin/get_sitemap',
        method: "POST"        
    })
    .then(function(response) {        
        $scope.suplitypes = response.data;
        return $scope;
    });
});
app.controller('SubmitManuscriptController', function($scope,$rootScope,$http,$window){        
    $scope.spinner = true;
    $scope.gridOptions1 = {
        paginationPageSizes: [25, 50, 75],
        paginationPageSize: 75,
        virtualizationThreshold: 75,
        rowHeight:50,
        columnDefs: [
          { name: 'created_date' ,width:150},
          { name: 'firstname',width:150},                
          { name: 'email',width:150},
          { 
            name: 'read_status',
            width:110,            
            cellTemplate: '<div class="ui-grid-cell-contents"><div ng-if="row.entity.read_status == 2"><button ng-click="grid.appScope.setsmEnqStatus(row.entity,$event)" class="btn btn-primary">Unread</button></div><div ng-if="row.entity.read_status == 1"><button ng-click="grid.appScope.setsmEnqStatus(row.entity,$event)" class="btn btn-success">Read</button></div></div>'
          },
          { name: 'alter_email', width:150},
          { name: 'journal', width:300},
          { name: 'article', width:300},
          { name: 'country', width:180},
          {
            field: 'uploadfile',
            cellTemplate: '<div class="ui-grid-cell-contents"><a href="https://www.avensonline.org/public/images/{{ COL_FIELD  }}">{{ COL_FIELD }}</a></div>',
            width:150
          },
          { 
            name: 'Delete',
            cellTemplate: '<a class="modify-icon" ng-click="grid.appScope.deleteRow(row)">Delete</a>',width:70
          }
        ],
        onRegisterApi: function (gridApi) {
          gridApi.pagination.on.paginationChanged($scope,function(){
            $scope.gridOptions.virtualizationThreshold =  $scope.gridOptions.paginationPageSize;
          })
        }

    };
    
     $scope.setsmEnqStatus= function(rowEntity,$event) {
        console.log($event);
        console.log($scope.gridOptions1.data);
        $http({
            url: base_url+'admin/setsmEnqStatus',
            method: "POST",
            data: {id: rowEntity.ID, read_status: rowEntity.read_status}
        })
        .then(function(response) {            
            //console.log(response.data.count[0].count);
            if(response.data.status) {                

                if(rowEntity.read_status == 1) {
                    var read_status = 2;
                } else if(rowEntity.read_status == 2) {
                    var read_status = 1;
                }

                angular.forEach($scope.gridOptions1.data, function(v,i) {
                    if(v.ID == rowEntity.ID) {                
                        v.read_status = read_status;                        
                    }
                });                
                $rootScope.sm_unread_count = response.data.count[0].count;
            }
        });        
    }
    
    $scope.getTableHeight = function() {
       var rowHeight = 110; // your row height
       var headerHeight = 100; // your header height
       return {
          height: (angular.element(window).height() - 119)+'px'
       };
    };

    $scope.deleteRow = function(row) {
        console.log(row);
        var deleteeb_member = $window.confirm('Are you sure you want to delete?');
          if(deleteeb_member) {
              $http({
                  url: base_url+'admin/deleteSubmitManuscript',
                  method: "POST",
                  data: {id:row.entity.ID}
              })
              .then(function(response) {               
                      var index = $scope.gridOptions1.data.indexOf(row.entity);
                          $scope.gridOptions1.data.splice(index, 1);
              });       
          }
      };
    $http({
        url: base_url+'admin/get_SubmitManuscript',
        method: "POST"
    })
    .then(function(response) {
        //$scope.journal_posts_archives = response.data;
        $scope.gridOptions1.data = response.data.sm_data; 
        $rootScope.sm_unread_count = response.data.sm_unread_count[0].count;
        $scope.spinner = false;
    });
});
app.controller('ArticleCitationsController', function($scope,$rootScope,$http,$window,$timeout){        
    $scope.spinner = true;
    $scope.gridOptions1 = {
        paginationPageSizes: [25, 50, 75],
        paginationPageSize: 75,
        virtualizationThreshold: 75,
        rowHeight:50,
        columnDefs: [          
          { name: 'journal_name'},                
          { name: 'article_title',width:300},
          { name: 'citation_link', width:400},
          { name: 'citated_count', width:120},
          { name: 'id',
            displayName: 'Edit',
            cellTemplate: '<a class="modify-icon" href="#/EditArticleCitation/{{COL_FIELD}}">Edit</a>',width:60
          },
          { 
            name: 'Delete',
            cellTemplate: '<a class="modify-icon" ng-click="grid.appScope.deleteRow(row)">Delete</a>',width:70
          }
        ],
        onRegisterApi: function (gridApi) {
          gridApi.pagination.on.paginationChanged($scope,function(){
            $scope.gridOptions.virtualizationThreshold =  $scope.gridOptions.paginationPageSize;
          })
        }
    };
    $scope.getTableHeight = function() {
       var rowHeight = 110; // your row height
       var headerHeight = 100; // your header height
       return {
          height: (angular.element(window).height() - 119)+'px'
       };
    };
    getArticleCitations("");
    function getArticleCitations(search_value) {
        $http({
            url: base_url+'admin/get_article_citations',
            method: "POST",            
            data : JSON.stringify({"search_value":search_value})
        })
        .then(function(response) {
            //$scope.journal_posts_archives = response.data;
            console.log(response.data);
            $scope.gridOptions1.data = response.data; 
            $scope.spinner = false;
        });
        
    }
    $scope.searchGrid = function(search_value) {
        $scope.spinner = true; 
        $timeout(function() {
            getArticleCitations(search_value);            
        },1000);
    }
    $scope.deleteRow = function(row) {        
      var deleteeb_member = $window.confirm('Are you absolutely sure you want to delete?');
        if(deleteeb_member) {
            $http({
                url: base_url+'admin/deleteArticleCitation',
                method: "POST",
                data: {id:row.entity.id}
            })
            .then(function(response) {               
                    var index = $scope.gridOptions1.data.indexOf(row.entity);
                        $scope.gridOptions1.data.splice(index, 1);
            });       
        }
    };
});

app.controller('EditArticleCitationController', function($scope,$rootScope,$routeParams,$location,factory,article_citation,$http) {    
    var citation_id = ($routeParams.updateID) ? parseInt($routeParams.updateID) : 0;
    $rootScope.title = (citation_id > 0) ? 'Edit' : 'Add';
    $scope.buttonText = (citation_id > 0) ? 'Edit Update' : 'Add Citation';        
    
    $scope.journal_info = article_citation.data.journal_info;
    if(citation_id > 0) {
        $scope.article_citation = article_citation.data.citation_info[0];        
    } else {
        $scope.article_citation = [];
    }
    $scope.journal_articles = article_citation.data.article_info;
    $scope.saveJournalCitation = function(article_citation) {
        $scope.server_msg = 'Details are saving....';
        if (citation_id <= 0) {
            factory.updateArticleCitation("0",article_citation,$scope);            
        }
        else {
            factory.updateArticleCitation(citation_id, article_citation,$scope);
        }
    }

    $scope.getJournalArticles = function(journal_id) {
        $http({
            url: base_url+'admin/getJournalArticles',
            method: "POST",
            data: {journal_id:journal_id}        
        })
        .then(function(response) {
            $scope.journal_articles = response.data;
        });
    }
});

app.controller('EditFulltextController', function($scope,$rootScope,$routeParams,$location,factory,fulltextArticle){        
   var sid = ($routeParams.sid) ? parseInt($routeParams.sid) : 0;
    $rootScope.title = (sid > 0) ? 'Edit Fulltext' : 'Add Fulltext';
    $scope.buttonText = (sid > 0) ? 'Update Fulltext' : 'Add New Fulltext';    
    
    
    $scope.fulltext_article = fulltextArticle.data.fulltext_info[0] || {};
    if(sid == 0) {
        $scope.fulltext_article.json_format = 1;
    }
    $scope.journal_info = fulltextArticle.data.j_info;
    
    $scope.getUrlSlug = function(fulltextArticle) {
        fulltextArticle.post_browser_title_slug = fulltextArticle.post_browser_title.toLowerCase().trim().replace(/[^\w\s-]/g, '').replace(/[\s_-]+/g, '-').replace(/^-+|-+$/g, '');
    }
    var titleInsertableOptions = [
        {"label": "Article Type", "name":"article_type","label_show":true,value2:""},
    {"label": "Main Heading", "name":"main_heading","label_show":true,value0:""},
    {"label": "Author", "name":"author","label_show":true,value1:""}
];
var referenceInsertableOptions = [
    {"label": "Reference Items", "name":"reference_links"}
];
var commonInsertableOptions = [
    {"label": "Para without Heading", "name":"paragraph_without_heading", placeholder:"Enter Paragraph"},
    {"label": "Para with Inline Heading", "name":"paragraph_with_inline_heading", placeholder:"Enter Paragraph"},
    {"label": "Para with Block Heading", "name":"paragraph_with_block_heading", placeholder:"Enter Paragraph"},
    {"label": "Figure Info box", "name":"figure_info_box", placeholder:"Enter Image Discription"},
    {"label": "Reference Links", "name":"reference_links", placeholder:"Please Enter Links"},
        {"label": "Figure Box", "name":"figure_box", placeholder:"Please Enter image link"}
];
$scope.removeInsertableOption = function(sectionName,index) {        
        angular.forEach($scope.ftSections, function(v,i) {
            if(v.label == sectionName) {
                v.tags.splice(index, 1);
            }
        });
    }
    $scope.addSection = function(sectionName,index) {           
        $scope.ftSections.splice(index + 1, 0, {"label":"section"+index,"name":"section"+index,"insertableOptions": commonInsertableOptions,"tags":[]});        
    }
    $scope.removeSection = function(sectionName,index) {
        $scope.ftSections.splice(index,1);
    }
    
    var ftSection = [];
    $scope.addFulltextSection = function(section) {
        ftSection.push(section.ft_section_name);        
    }    
    $scope.addInsertableOption = function(insertableOption, sectionName,index) {   
    
        angular.forEach($scope.ftSections, function(v,i) {                        
            if(v.name == sectionName) {                                

                angular.forEach($scope.copyInsertableOptions, function(iv,ii) {                    
                    console.log(iv.name, insertableOption);
                    if(iv.name == insertableOption) {
                        console.log(ii);                                               
                        //$scope.insertableOptions[ii]['11value'+v.tags.length] = "";
                        var temp = angular.copy(iv);                        
                        if(insertableOption == 'paragraph_with_inline_heading' || insertableOption == 'paragraph_with_block_heading' || insertableOption == 'figure_info_box' || insertableOption == 'reference_links' || insertableOption == 'figure_box') {
                            temp['child_tag'][0]['value'] = "";
                        }                                                
                        temp['value'] = "";
                        if(index) {
                            v.tags.splice(index + 1, 0, temp);                        
                        } else {
                            v.tags.push(temp);
                        }
                    }
                });                
            }
        });
        
    }
    
   //$scope.ftSections = [{"label":"Title","name":"title","insertableOptions":[{"label":"Paragraph without Heading","name":"paragraph_without_heading","placeholder":"Enter Paragraph"},{"label":"Paragraph with Inline Heading","name":"paragraph_with_inline_heading","placeholder":"Enter Paragraph"},{"label":"Paragraph with Block Heading","name":"paragraph_with_block_heading","placeholder":"Enter Paragraph"},{"label":"Figure Info box","name":"figure_info_box","placeholder":"Enter Image Discription"}],"tags":[{"label":"Main Heading","name":"main_heading","label_show":true,"value0":"","value":"Diagnostic Performance of the Rutgers Alcohol Problem Index (RAPI) in Detecting DSM-5 Alcohol Use Disorders among College Students"},{"label":"Author","name":"author","label_show":true,"value1":"","value":"Brett T. Hagman*"},{"label":"Paragraph with Inline Heading","name":"paragraph_with_inline_heading","placeholder":"Enter Paragraph","child_tag":[{"name":"heading","value":"*Address for Correspondence"}],"value":"Brett T. Hagman, Division of Treatment and Recovery Research, National Institute on Alcohol Abuse and Alcoholism, 5635 Fishers Lane, Room 2044, Bethesda, MD 20892, USA, Tel: 301-443-0638; E-mail: brett.hagman@nih.gov"},{"label":"Paragraph with Inline Heading","name":"paragraph_with_inline_heading","placeholder":"Enter Paragraph","child_tag":[{"name":"heading","value":"Citation"}],"value":"Hagman BT. Diagnostic Performance of the Rutgers Alcohol Problem Index (RAPI) in Detecting DSM-5 Alcohol Use Disorders among College Students. J Addiction Prevention. 2017;5(2): 7."},{"label":"Paragraph without Heading","name":"paragraph_without_heading","placeholder":"Enter Paragraph","value":"Copyright: \u00a9 2017 Hagman BT. This is an open access article distributed under the Creative Commons Attribution License, which permits unrestricted use, distribution, and reproduction in any medium, provided the original work is properly cited."},{"label":"Paragraph without Heading","name":"paragraph_without_heading","placeholder":"Enter Paragraph","value":"Journal of Addiction & Prevention | ISSN: 2330-0396 | Volume: 5, Issue: 2"},{"label":"Paragraph without Heading","name":"paragraph_without_heading","placeholder":"Enter Paragraph","value":"Submission: 26 May, 2017 | Accepted: 04 July, 2017 | Published: 13 July, 2017"}]},{"label":"Keywords","name":"keywords","insertableOptions":[{"label":"Paragraph without Heading","name":"paragraph_without_heading","placeholder":"Enter Paragraph"},{"label":"Paragraph with Inline Heading","name":"paragraph_with_inline_heading","placeholder":"Enter Paragraph"},{"label":"Paragraph with Block Heading","name":"paragraph_with_block_heading","placeholder":"Enter Paragraph"},{"label":"Figure Info box","name":"figure_info_box","placeholder":"Enter Image Discription"}],"tags":[]},{"label":"Abstract","name":"Abstract","insertableOptions":[{"label":"Paragraph without Heading","name":"paragraph_without_heading","placeholder":"Enter Paragraph"},{"label":"Paragraph with Inline Heading","name":"paragraph_with_inline_heading","placeholder":"Enter Paragraph"},{"label":"Paragraph with Block Heading","name":"paragraph_with_block_heading","placeholder":"Enter Paragraph"},{"label":"Figure Info box","name":"figure_info_box","placeholder":"Enter Image Discription"}],"tags":[]},{"label":"Methods","name":"methods","insertableOptions":[{"label":"Paragraph without Heading","name":"paragraph_without_heading","placeholder":"Enter Paragraph"},{"label":"Paragraph with Inline Heading","name":"paragraph_with_inline_heading","placeholder":"Enter Paragraph"},{"label":"Paragraph with Block Heading","name":"paragraph_with_block_heading","placeholder":"Enter Paragraph"},{"label":"Figure Info box","name":"figure_info_box","placeholder":"Enter Image Discription"}],"tags":[]},{"label":"Measures","name":"measures","insertableOptions":[{"label":"Paragraph without Heading","name":"paragraph_without_heading","placeholder":"Enter Paragraph"},{"label":"Paragraph with Inline Heading","name":"paragraph_with_inline_heading","placeholder":"Enter Paragraph"},{"label":"Paragraph with Block Heading","name":"paragraph_with_block_heading","placeholder":"Enter Paragraph"},{"label":"Figure Info box","name":"figure_info_box","placeholder":"Enter Image Discription"}],"tags":[]},{"label":"Results","name":"results","insertableOptions":[{"label":"Paragraph without Heading","name":"paragraph_without_heading","placeholder":"Enter Paragraph"},{"label":"Paragraph with Inline Heading","name":"paragraph_with_inline_heading","placeholder":"Enter Paragraph"},{"label":"Paragraph with Block Heading","name":"paragraph_with_block_heading","placeholder":"Enter Paragraph"},{"label":"Figure Info box","name":"figure_info_box","placeholder":"Enter Image Discription"}],"tags":[]},{"label":"Discussion","name":"discussion","insertableOptions":[{"label":"Paragraph without Heading","name":"paragraph_without_heading","placeholder":"Enter Paragraph"},{"label":"Paragraph with Inline Heading","name":"paragraph_with_inline_heading","placeholder":"Enter Paragraph"},{"label":"Paragraph with Block Heading","name":"paragraph_with_block_heading","placeholder":"Enter Paragraph"},{"label":"Figure Info box","name":"figure_info_box","placeholder":"Enter Image Discription"}],"tags":[]},{"label":"Acknowledgement","name":"acknowledgement","insertableOptions":[{"label":"Paragraph without Heading","name":"paragraph_without_heading","placeholder":"Enter Paragraph"},{"label":"Paragraph with Inline Heading","name":"paragraph_with_inline_heading","placeholder":"Enter Paragraph"},{"label":"Paragraph with Block Heading","name":"paragraph_with_block_heading","placeholder":"Enter Paragraph"},{"label":"Figure Info box","name":"figure_info_box","placeholder":"Enter Image Discription"}],"tags":[]},{"label":"References","name":"references","insertableOptions":[{"label":"Reference Items","name":"reference_items"}],"tags":[]}];
   $scope.insertableOptions = [        
        {"label": "Paragraph without Heading", "name":"paragraph_without_heading", placeholder:"Enter Paragraph"},
        {"label": "Paragraph with Inline Heading", "name":"paragraph_with_inline_heading", placeholder:"Enter Paragraph",child_tag:[{"name":"heading"}]},
        {"label": "Paragraph with Block Heading", "name":"paragraph_with_block_heading", placeholder:"Enter Paragraph",child_tag:[{"name":"heading"}]},
        {"label": "Figure Info box", "name":"figure_info_box", placeholder:"Enter Paragraph",child_tag:[{"name":"heading"}]},
        {"label": "Reference Items", "name":"reference_links", placeholder:"Enter Paragraph",child_tag:[{"name":"heading"}]},
         {"label": "Figure Box", "name":"figure_box", placeholder:"Please Enter image url",child_tag:[{"name":"heading"}]}
    ];
    $scope.copyInsertableOptions = angular.copy($scope.insertableOptions);

    if($scope.fulltext_article && $scope.fulltext_article.post_content)  {
        if($scope.fulltext_article.json_format == 1) {
            $scope.ftSections = JSON.parse($scope.fulltext_article.post_content);
        }
    } else {
         $scope.ftSections = [
            {"label":'Title', "name": 'title',"insertableOptions": commonInsertableOptions,"tags":titleInsertableOptions}        
       ];
    }   


    $scope.saveFulltext = function(fulltextArticle) {
    $scope.server_msg = "Details are saving...";                            
        if (sid <= 0) {            
            factory.updateFulltextArticle(0,fulltextArticle,$scope);
        }
        else {
            factory.updateFulltextArticle(sid, fulltextArticle,$scope);
        }
    }
});

app.controller('CollaborationsController', function($scope,$rootScope,$http){        
   $scope.spinner = true;
    $scope.gridOptions1 = {
        paginationPageSizes: [25, 50, 75],
        paginationPageSize: 75,
        virtualizationThreshold: 75,
        rowHeight:80,
        columnDefs: [
          { name: 'contact_person' ,width:150},
          { name: 'email',width:400},                
          { name: 'univer_name',width:150},
          { name: 'mail_address', width:150},
          { name: 'country', width:150},
          { name: 'telephone', width:150},
          { name: 'website_url', width:150},
          { name: 'mem_univer_dept', width:150},
          { name: 'created_date', width:150}
        ],
        onRegisterApi: function (gridApi) {
          gridApi.pagination.on.paginationChanged($scope,function(){
            $scope.gridOptions.virtualizationThreshold =  $scope.gridOptions.paginationPageSize;
          })
        }
    };
    $scope.getTableHeight = function() {
       var rowHeight = 110; // your row height
       var headerHeight = 100; // your header height
       return {
          height: (angular.element(window).height() - 119)+'px'
       };
    };

    $http({
        url: base_url+'admin/get_Collaborations',
        method: "POST"
    })
    .then(function(response) {
        //$scope.journal_posts_archives = response.data;
        $scope.gridOptions1.data = response.data; 
        $scope.spinner = false;
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
        $scope.server_msg = 'Details are saving....';
        if (page_id <= 0) {            
            factory.updateEbMember(0,eb_member,$scope);
        }
        else {
            factory.updateEbMember(page_id, eb_member,$scope);
        }
    }
   
});
app.controller('ContactController', function($scope,$rootScope,$http) {        
   $scope.spinner = true;
    $scope.gridOptions1 = {
        paginationPageSizes: [25, 50, 75],
        paginationPageSize: 75,
        virtualizationThreshold: 75,
        rowHeight:40,
        columnDefs: [
          { name: 'name' ,width:150},
          { name: 'email',width:400},                
          { name: 'phone_no',width:150},
          { name: 'message', width:150},
          { name: 'created_date', width:150}
        ],
        onRegisterApi: function (gridApi) {
          gridApi.pagination.on.paginationChanged($scope,function(){
            $scope.gridOptions.virtualizationThreshold =  $scope.gridOptions.paginationPageSize;
          })
        }
    };
    $scope.getTableHeight = function() {
       var rowHeight = 110; // your row height
       var headerHeight = 100; // your header height
       return {
          height: (angular.element(window).height() - 119)+'px'
       };
    };

    $http({
        url: base_url+'admin/get_contact_enquiries',
        method: "POST"
    })
    .then(function(response) {
        //$scope.journal_posts_archives = response.data;
        $scope.gridOptions1.data = response.data; 
        $scope.spinner = false;
    });
});

app.directive("uploadsFilesToServer", function($http,$timeout) {
return {
    restrict : "A",
        link: function($scope, element, attrs) {
            if(attrs.id == 'avens-to-server') {
                var ser_url = base_url+'admin/upload_files?save_to_db=true';
            } else if(attrs.id == 'fulltext-server') {
                var ser_url = base_url+'admin/upload_files_to_server';
            }
            var uploader = new qq.FineUploader({
                element: document.getElementById(attrs.id),
                template: 'custom-qq-template-gallery', 
                multiple: true,
                debug: true,
                allowMultipleItems: true,
                request: {
                    endpoint:  ser_url,
                },
                deleteFile: {
                    enabled: true,
                    forceConfirm: true,
                    endpoint:  ser_url,
                },
                validation: {
                    allowedExtensions: ['png','jpeg','jpg','gif','pdf'],
                    sizeLimit: 5 * 1024* 1024
                },
                callbacks: {
                    onDelete: function(id) {
                        
                    },
                    onComplete: function(id, name, responseJSON, maybeXhr) {
                        $scope.spinner= true;
                        $http({
                            url: base_url+'admin/getUploadedFiles',
                            method: "POST"
                        })
                        .then(function(response) {
                            $scope.gridOptions1.data = response.data;
                             $timeout(function() {
                                $scope.spinner= false;
                             }, 500);        
                        });
                        
                    },
                    onSubmit: function() {

                    }
                }
            });
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
            multiple: true,
            allowMultipleItems: true,
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
app.directive("uploadsFilesToServer", function() {    
return {
    restrict : "A",
        link: function($scope, element, attrs) {
            var uploader = new qq.FineUploader({
                element: document.getElementById(attrs.id),
                template: 'qq-template-gallery', 
                multiple: true,
                allowMultipleItems: true,
                request: {
                    endpoint:  base_url+'admin/upload_files_to_server',
                },
                deleteFile: {
                    enabled: true,
                    forceConfirm: true,
                    endpoint:  base_url+'admin/upload_files_to_server',
                },
                validation: {
                    allowedExtensions: ['png','jpeg','jpg','gif','pdf'],
                    sizeLimit: 5 * 1024* 1024
                },
                callbacks: {
                    onDelete: function(id) {
                        
                    },
                    onComplete: function(id, name, responseJSON, maybeXhr) {                        
                        console.log(responseJSON);
                    },
                    onSubmit: function() {                 
                    }
                }
            });
        }
    }
});

app.directive('myGrid', myGrid);
function myGrid($timeout) {
    //$timeout(function(){
     return {          
          templateUrl:base_url+'admin1/angular_pages/GridTemplate.html',
          restrict: 'E',
          scope: {
              options : '=',
          },
          bindToController: true,
          link: function(scope, element, attrs) {                
                console.log(attrs);            
                console.log(scope.options.columnDefs);
                scope.gridOptions = {
                  data: scope.options.data, 
                  columnDefs: scope.options.columnDefs, 
                };
          }
      };
    //},3000);
}

