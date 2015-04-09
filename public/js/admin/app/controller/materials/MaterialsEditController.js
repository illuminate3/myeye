
 angular.module('shwoodApp')
    .controller('MaterialsEditController',function($scope,$http,MaterialsFactory,$routeParams,$window,messageFactory){
         $scope.materials = {};
          var item  = $routeParams.itemId;
         function init(item){
             MaterialsFactory.getSingleMaterials(item)
                 .success(function(data){
                     $scope.materials = data;
                 });
         }
         init(item);

         $scope.submitForm = function(){
             console.log("posting data....");
             $http.put('/adminmaster/materials/' + item, JSON.stringify($scope.materials))
                 .success(function(data){
                 /*success callback*/
                     console.log(data);
                     messageFactory.setSuccess({ show: true, msg: ' آیتم مورد نظر اصلاح گردید' });
                     $window.location.href= "#materials";
                 });
         };
         $scope.cancelEdit = function(){
             $window.location.href= "#materials";
         };

         $scope.loading = false;
         $scope.messageSuccess = '';
         $scope.Errorss = '';

         $scope.uploadFile = function(files) {
             $scope.messageSuccess = '';
             $scope.Errorss = '';
             console.log(files);
             if(files[0].size < 5000) {
                 var fd = new FormData();
                 $scope.loading = true;
                 //Take the first selected file
                 fd.append("file", files[0]);
                 //console.log(fd);

                 $http.post('/adminmaster/materials/editUpload/'+item, fd, {
                     withCredentials: false,
                     headers: {'Content-Type': undefined},
                     transformRequest: angular.identity
                 }).success(function (data) {
                     console.log(data);
                     $scope.loading = false;
                     init(item);
                     $scope.messageSuccess = 'Your file uploaded successfully';
                 }).error(function () {
                     $scope.loading = false;
                     $scope.Errorss = 'Your file uploaded not completed';
                 });
             }else{
                 $scope.Errorss = 'Your file is bigger than 5 kilobyte';

                 $window.alert('Your can not be bigger than 5 kilobyte')
             }

         };
    });
