
 angular.module('shwoodApp')
    .controller('ProductsEditController',function($scope,$http,ProductsFactory,FramesFactory,$routeParams,$window,messageFactory){
         $scope.products = {};
          var item  = $routeParams.itemId;
         function init(item){
             ProductsFactory.getSingleProducts(item)
                 .success(function(data){
                     $scope.products = data;
                 });
         }
         init(item);

         $scope.frames = '';

         function initFrames(){
             FramesFactory.getFrames()
                 .success(function(data){
                     $scope.frames = data;
                     //console.log(data);
                 });
         }
         initFrames();

         $scope.submitForm = function(){
             console.log("posting data....");
             $http.put('/adminmaster/products/' + item, JSON.stringify($scope.products))
                 .success(function(data){
                 /*success callback*/
                     console.log(data);
                     messageFactory.setSuccess({ show: true, msg: ' آیتم مورد نظر اصلاح گردید' });
                     $window.location.href= "#products";
                 });
         };
         $scope.cancelEdit = function(){
             $window.location.href= "#products";
         };
    });
