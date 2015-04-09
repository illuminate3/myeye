
 angular.module('shwoodApp')
    .controller('FramesCreateController',function($scope,$http,FramesFactory,$routeParams,$window,messageFactory){
         $scope.formData = {
             title: ""
         };


         $scope.submitCreateForm = function(){
             console.log($scope.formData);
             $http.post('/adminmaster/frames', JSON.stringify($scope.formData))
                 .success(function(data){
                 /*success callback*/
                     console.log(data);
                     messageFactory.setSuccess({ show: true, msg: ' آیتم مورد نظر ایجاد گردید' });
                     $window.location.href= "#frames";
                 });
         };
         $scope.cancelCreate = function(){
             $window.location.href= "#frames";
         };
    });
