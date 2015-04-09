
 angular.module('shwoodApp')
    .controller('DetailsEditController',function($scope,$http,DetailsFactory,MaterialsFactory,$routeParams,$window,messageFactory){
         $scope.details = {};
         $scope.materials='';
         var item  = $routeParams.itemId;

         function init(item){
             DetailsFactory.getSingleDetails(item)
                 .success(function(data){
                     $scope.details = data;
                 });

             MaterialsFactory.getMaterials()
                 .success(function(ret){
                     $scope.materials = ret;
                 });
         }
         init(item);

         $scope.submitForm = function(){
             console.log("posting data....");
             $http.put('/adminmaster/productsDetail/' + item, JSON.stringify($scope.details))
                 .success(function(data){
                 /*success callback*/
                     console.log(data);
                     messageFactory.setSuccess({ show: true, msg: ' آیتم مورد نظر اصلاح گردید' });
                     $window.history.back();
                 });
         };
         $scope.cancelEdit = function(){
             $window.history.back();
         };

         $scope.loadingItemFront = false;
         $scope.loadingMainFront = false;
         $scope.loadingMainSide = false;
         $scope.loadingItemSide = false;
         $scope.messageSuccessItemFront = '';
         $scope.messageSuccessMainFront = '';
         $scope.messageSuccessItemSide = '';
         $scope.messageSuccessMainSide = '';
         $scope.ErrorssItemFront = '';
         $scope.ErrorssItemSide = '';
         $scope.ErrorssMainSide = '';
         $scope.ErrorssMainFront = '';

         $scope.uploadFileItemFront = function(files) {
             $scope.messageSuccessItemFront = '';
             $scope.ErrorssItemFront = '';
             console.log(files);
             if(files[0].size < 25000) {
                 var fd = new FormData();
                 $scope.loadingItemFront = true;
                 //Take the first selected file
                 fd.append("fileItemFront", files[0]);
                 //console.log(fd);

                 $http.post('/adminmaster/productsDetail/editUpload/'+item, fd, {
                     withCredentials: false,
                     headers: {'Content-Type': undefined},
                     transformRequest: angular.identity
                 }).success(function (data) {
                     console.log(data);
                     $scope.loadingItemFront = false;
                     init(item);
                     $scope.messageSuccessItemFront = 'Your file uploaded successfully';
                 }).error(function () {
                     $scope.loadingItemFront = false;
                     $scope.ErrorssItemFront = 'Your file uploaded not completed';
                 });
             }else{
                 $scope.ErrorssItemFront = 'Your file is bigger than 25 kilobyte';

                 $window.alert('Your can not be bigger than 25 kilobyte')
             }

         };

         $scope.uploadFileItemSide = function(files) {
             $scope.messageSuccessItemSide = '';
             $scope.ErrorssItemSide = '';
             console.log(files);
             if(files[0].size < 25000) {
                 var fd = new FormData();
                 $scope.loadingItemSide = true;
                 //Take the first selected file
                 fd.append("fileItemSide", files[0]);
                 //console.log(fd);

                 $http.post('/adminmaster/productsDetail/editUpload/'+item, fd, {
                     withCredentials: false,
                     headers: {'Content-Type': undefined},
                     transformRequest: angular.identity
                 }).success(function (data) {
                     console.log(data);
                     $scope.loadingItemSide = false;
                     init(item);
                     $scope.messageSuccessItemSide = 'Your file uploaded successfully';
                 }).error(function () {
                     $scope.loadingItemSide = false;
                     $scope.ErrorssItemSide = 'Your file uploaded not completed';
                 });
             }else{
                 $scope.ErrorssItemSide = 'Your file is bigger than 25 kilobyte';

                 $window.alert('Your can not be bigger than 25 kilobyte')
             }

         };

         $scope.uploadFileMainFront = function(files) {
             $scope.messageSuccessMainFront = '';
             $scope.ErrorssMainFront = '';
             console.log(files);
             if(files[0].size < 85000) {
                 var fd = new FormData();
                 $scope.loadingMainFront = true;
                 //Take the first selected file
                 fd.append("fileMainFront", files[0]);
                 //console.log(fd);

                 $http.post('/adminmaster/productsDetail/editUpload/'+item, fd, {
                     withCredentials: false,
                     headers: {'Content-Type': undefined},
                     transformRequest: angular.identity
                 }).success(function (data) {
                     console.log(data);
                     $scope.loadingMainFront = false;
                     init(item);
                     $scope.messageSuccessMainFront = 'Your file uploaded successfully';
                 }).error(function () {
                     $scope.loadingMainFront = false;
                     $scope.ErrorssMainFront = 'Your file uploaded not completed';
                 });
             }else{
                 $scope.ErrorssMainFront = 'Your file is bigger than 85 kilobyte';

                 $window.alert('Your can not be bigger than 85 kilobyte')
             }

         };

         $scope.uploadFileMainSide = function(files) {
             $scope.messageSuccessMainSide = '';
             $scope.ErrorssMainSide = '';
             console.log(files);
             if(files[0].size < 85000) {
                 var fd = new FormData();
                 $scope.loadingMainSide = true;
                 //Take the first selected file
                 fd.append("fileMainSide", files[0]);
                 //console.log(fd);

                 $http.post('/adminmaster/productsDetail/editUpload/'+item, fd, {
                     withCredentials: false,
                     headers: {'Content-Type': undefined},
                     transformRequest: angular.identity
                 }).success(function (data) {
                     console.log(data);
                     $scope.loadingMainSide = false;
                     init(item);
                     $scope.messageSuccessMainSide = 'Your file uploaded successfully';
                 }).error(function () {
                     $scope.loadingMainSide = false;
                     $scope.ErrorssMainSide = 'Your file uploaded not completed';
                 });
             }else{
                 $scope.ErrorssMainSide = 'Your file is bigger than 85 kilobyte';

                 $window.alert('Your can not be bigger than 85 kilobyte')
             }

         };
    });
