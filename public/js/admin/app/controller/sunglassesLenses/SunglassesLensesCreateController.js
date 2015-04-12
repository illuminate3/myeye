
 angular.module('shwoodApp')
    .controller('SunglassesLensesCreateController',function($scope,$http,SunglassesLensesFactory,LensesFactory,$routeParams,$window,messageFactory){
         var item  = $routeParams.itemId;
         $scope.formData = {
             material_product_id: item ,
             lense_id:""
         };

         $scope.sunglasses = '';

         function init(){
             LensesFactory.getLenses()
                 .success(function(data){
                     $scope.sunglasses = data;
                 });
             }
         init();


         $scope.submitCreateForm = function(){
             console.log($scope.formData);
             $http.post('/adminmaster/sunglassesLenses', JSON.stringify($scope.formData))
                 .success(function(data){
                 /*success callback*/
                     console.log(data);
                     messageFactory.setSuccess({ show: true, msg: ' آیتم مورد نظر ایجاد گردید' });
                     $window.location.href= "#sunglassesLenses/"+ item;
                 });
         };
         $scope.cancelCreate = function(){
             $window.location.href= "#sunglassesLenses/"+ item;
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

                 $http.post('/adminmaster/sunglassesLenses', fd, {
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

                 $http.post('/adminmaster/sunglassesLenses', fd, {
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
