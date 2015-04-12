
 angular.module('shwoodApp')
    .controller('SunglassesLensesEditController',function($scope,$http,SunglassesLensesFactory,LensesFactory,$routeParams,$window,messageFactory){
         $scope.sunglasses = {};
         $scope.lenses='';
         var item  = $routeParams.itemId;

         function init(item){
             SunglassesLensesFactory.getSingleSunglassesLenses(item)
                 .success(function(data){
                     $scope.sunglasses = data;
                     console.log($scope.sunglasses.lense_id);
                 });

             LensesFactory.getLenses()
                 .success(function(ret){
                     $scope.lenses = ret;
                 });
         }
         init(item);

         $scope.submitForm = function(){
             console.log("posting data....");
             $http.put('/adminmaster/sunglassesLenses/' + item, JSON.stringify($scope.sunglasses))
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

                 $http.post('/adminmaster/sunglassesLenses/editUpload/'+item, fd, {
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

                 $http.post('/adminmaster/sunglassesLenses/editUpload/'+item, fd, {
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
