angular.module('shwoodApp')
    .factory('LensesFactory',function($http){
        var factory ={};
        factory.getLenses = function(){
            return $http.get('/adminmaster/lenses');
        };
        factory.getSingleLenses = function(id){
            return $http.get('/adminmaster/lenses/'+id);
        };


        factory.active = function(id){
            return $http.get('/adminmaster/lenses/active/'+id);
        };
        factory.deleteItem = function(id){
            return $http.delete('/adminmaster/lenses/'+id);
        };
        return factory;
    });