
 angular.module('shwoodApp')
    .controller('DetailsCreateController',function($scope,$http,DetailsFactory,MaterialsFactory,$routeParams,$window,messageFactory){
         var item  = $routeParams.itemId;
         $scope.formData = {
             product_id: item ,
             material_id:"",
             price:""
         };

         $scope.materials = '';

         function init(){
             MaterialsFactory.getMaterials()
                 .success(function(data){
                     $scope.materials = data;
                 });
             }
         init();


         $scope.submitCreateForm = function(){
             console.log($scope.formData);
             $http.post('/adminmaster/productsDetail', JSON.stringify($scope.formData))
                 .success(function(data){
                 /*success callback*/
                     console.log(data);
                     messageFactory.setSuccess({ show: true, msg: ' آیتم مورد نظر ایجاد گردید' });
                     $window.location.href= "#details/"+ item;
                 });
         };
         $scope.cancelCreate = function(){
             $window.location.href= "#details/"+ item;
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
             if(files[0].size < 25000) {
                 var fd = new FormData();
                 $scope.loadingItemFront = true;

                 $scope.formData.fileItemFront = files[0].name;
                 //Take the first selected file
                 fd.append("fileItemFront", files[0]);
                 //console.log(fd);

                 $http.post('/adminmaster/productsDetail', fd, {
                     withCredentials: false,
                     headers: {'Content-Type': undefined},
                     transformRequest: angular.identity
                 }).success(function (data) {
                     console.log(data);
                     $scope.loadingItemFront = false;
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
             if(files[0].size < 25000) {
                 var fd = new FormData();
                 $scope.loadingItemSide = true;

                 $scope.formData.fileItemSide = files[0].name;
                 //Take the first selected file
                 fd.append("fileItemSide", files[0]);
                 //console.log(fd);

                 $http.post('/adminmaster/productsDetail', fd, {
                     withCredentials: false,
                     headers: {'Content-Type': undefined},
                     transformRequest: angular.identity
                 }).success(function (data) {
                     console.log(data);
                     $scope.loadingItemSide = false;
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
         $scope.uploadFileMainSide = function(files) {
             $scope.messageSuccessMainSide = '';
             $scope.ErrorssMainSide = '';
             if(files[0].size < 85000) {
                 var fd = new FormData();
                 $scope.loadingMainSide = true;

                 $scope.formData.fileMainSide = files[0].name;
                 //Take the first selected file
                 fd.append("fileMainSide", files[0]);
                 //console.log(fd);

                 $http.post('/adminmaster/productsDetail', fd, {
                     withCredentials: false,
                     headers: {'Content-Type': undefined},
                     transformRequest: angular.identity
                 }).success(function (data) {
                     console.log(data);
                     $scope.loadingMainSide = false;
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
         $scope.uploadFileMainFront = function(files) {
             $scope.messageSuccessMainFront = '';
             $scope.ErrorssMainFront = '';
             if(files[0].size < 85000) {
                 var fd = new FormData();
                 $scope.loadingMainFront = true;

                 $scope.formData.fileMainFront = files[0].name;
                 //Take the first selected file
                 fd.append("fileMainFront", files[0]);
                 //console.log(fd);

                 $http.post('/adminmaster/productsDetail', fd, {
                     withCredentials: false,
                     headers: {'Content-Type': undefined},
                     transformRequest: angular.identity
                 }).success(function (data) {
                     console.log(data);
                     $scope.loadingMainFront = false;
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
    });
