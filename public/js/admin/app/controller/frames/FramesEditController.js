
 angular.module('shwoodApp')
    .controller('FramesEditController',function($scope,$http,FramesFactory,$routeParams,$window,messageFactory){
         $scope.frames = {};
          var item  = $routeParams.itemId;
         function init(item){
             FramesFactory.getSingleFrames(item)
                 .success(function(data){
                     $scope.frames = data;
                 });
         }
         init(item);

         $scope.submitForm = function(){
             console.log("posting data....");
             $http.put('/adminmaster/frames/' + item, JSON.stringify($scope.frames))
                 .success(function(data){
                 /*success callback*/
                     console.log(data);
                     messageFactory.setSuccess({ show: true, msg: ' آیتم مورد نظر اصلاح گردید' });
                     $window.location.href= "#frames";
                 });
         };
         $scope.cancelEdit = function(){
             $window.location.href= "#frames";
         };
    });
