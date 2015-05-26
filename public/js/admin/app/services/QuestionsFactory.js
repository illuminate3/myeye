angular.module('shwoodApp')
    .factory('QuestionsFactory',function($http){
        var factory ={};
        factory.getQuestions = function(){
            return $http.get('/adminmaster/questionsAll');
        };
        factory.getSingleQuestions = function(id){
            return $http.get('/adminmaster/questions/'+id);
        };


        factory.active = function(id){
            return $http.get('/adminmaster/questions/active/'+id);
        };
        factory.deleteItem = function(id){
            return $http.delete('/adminmaster/questions/'+id);
        };
        return factory;
    });