angular.module('shwoodApp')
    .factory('MaterialsFactory',function($http){
        var factory ={};
        factory.getMaterials = function(){
            return $http.get('/adminmaster/materials');
        };
        factory.getSingleMaterials = function(id){
            return $http.get('/adminmaster/materials/'+id);
        };


        factory.active = function(id){
            return $http.get('/adminmaster/materials/active/'+id);
        };
        factory.deleteItem = function(id){
            return $http.delete('/adminmaster/materials/'+id);
        };
        return factory;
    });