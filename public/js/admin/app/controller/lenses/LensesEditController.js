
 angular.module('shwoodApp')
    .controller('LensesEditController',function($scope,$http,LensesFactory,$routeParams,$window,messageFactory){
         $scope.lenses = {};
          var item  = $routeParams.itemId;
         function init(item){
             LensesFactory.getSingleLenses(item)
                 .success(function(data){
                     $scope.lenses = data;
                 });
         }
         init(item);

         $scope.submitForm = function(){
             console.log("posting data....");
             $http.put('/adminmaster/lenses/' + item, JSON.stringify($scope.lenses))
                 .success(function(data){
                 /*success callback*/
                     console.log(data);
                     messageFactory.setSuccess({ show: true, msg: ' آیتم مورد نظر اصلاح گردید' });
                     $window.location.href= "#lenses";
                 });
         };
         $scope.cancelEdit = function(){
             $window.location.href= "#lenses";
         };

         $scope.loading = false;
         $scope.messageSuccess = '';
         $scope.Errorss = '';

         $scope.uploadFile = function(files) {
             $scope.messageSuccess = '';
             $scope.Errorss = '';
             console.log(files);
             if(files[0].size < 25000) {
                 var fd = new FormData();
                 $scope.loading = true;
                 //Take the first selected file
                 fd.append("file", files[0]);
                 //console.log(fd);

                 $http.post('/adminmaster/lenses/editUpload/'+item, fd, {
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
                 $scope.Errorss = 'Your file is bigger than 25 kilobyte';

                 $window.alert('Your can not be bigger than 25 kilobyte')
             }

         };
    });
