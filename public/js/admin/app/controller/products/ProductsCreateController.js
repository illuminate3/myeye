
 angular.module('shwoodApp')
    .controller('ProductsCreateController',function($scope,$http,ProductsFactory,FramesFactory,$routeParams,$window,messageFactory){
         $scope.formData = {
             title: "",
             frame_id:"",
             type:""
         };
         $scope.frames = '';

         function initFrames(){
             FramesFactory.getFrames()
                 .success(function(data){
                     $scope.frames = data;
                     //console.log(data);
                 });
         }
         initFrames();

         $scope.submitCreateForm = function(){
             console.log($scope.formData);
             $http.post('/adminmaster/products', JSON.stringify($scope.formData))

                 .success(function(data){
                     console.log($scope.formData);
                 /*success callback*/
                     console.log(data);
                     messageFactory.setSuccess({ show: true, msg: ' آیتم مورد نظر ایجاد گردید' });
                     $window.location.href= "#products";
                 });
         };
         $scope.cancelCreate = function(){
             $window.location.href= "#products";
         };
    });
