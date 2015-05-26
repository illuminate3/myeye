
 angular.module('shwoodApp')
    .controller('QuestionsViewController',function($scope,$http,QuestionsFactory,$routeParams,$window,messageFactory){
         $scope.questions = {};
          var item  = $routeParams.itemId;
         function init(item){
             QuestionsFactory.getSingleQuestions(item)
                 .success(function(data){
                     $scope.questions = data;
                 });
         }
         init(item);

         $scope.submitForm = function(){
             console.log("posting data....");
             $scope.loading = true;
             $scope.messageSuccess = '';
             $http.put('/adminmaster/questions/' + item, JSON.stringify($scope.questions))
                 .success(function(data){
                 /*success callback*/
                     $scope.loading = false;
                     $scope.messageSuccess = 'پاسخ ارسال گردید ';
                     console.log(data);
                     messageFactory.setSuccess({ show: true, msg: ' پاسخ ارسال گردید' });
                     $window.location.href= "#problems";
                 });
         };
         $scope.cancelView = function(){
             $window.location.href= "#problems";
         };


    });
