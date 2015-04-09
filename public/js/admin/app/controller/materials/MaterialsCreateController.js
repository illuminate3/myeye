
 angular.module('shwoodApp')
    .controller('MaterialsCreateController',function($scope,$http,MaterialsFactory,$routeParams,$window,messageFactory){
         $scope.formData = {
             title: ""
         };


         $scope.submitCreateForm = function(){
             console.log($scope.formData);
             $http.post('/adminmaster/materials', JSON.stringify($scope.formData))
                 .success(function(data){
                 /*success callback*/
                     console.log(data);
                     messageFactory.setSuccess({ show: true, msg: ' آیتم مورد نظر ایجاد گردید' });
                     $window.location.href= "#materials";
                 });
         };
         $scope.cancelCreate = function(){
             $window.location.href= "#materials";
         };

         $scope.loading = false;
         $scope.messageSuccess = '';
         $scope.Errorss = '';


         $scope.uploadFile = function(files) {
             $scope.messageSuccess = '';
             $scope.Errorss = '';
             if(files[0].size < 5000) {
                 var fd = new FormData();
                 $scope.loading = true;

                 $scope.formData.file = files[0].name;
                 //Take the first selected file
                 fd.append("file", files[0]);
                 //console.log(fd);

                 $http.post('/adminmaster/materials', fd, {
                     withCredentials: false,
                     headers: {'Content-Type': undefined},
                     transformRequest: angular.identity
                 }).success(function (data) {
                     console.log(data);
                     $scope.loading = false;
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
