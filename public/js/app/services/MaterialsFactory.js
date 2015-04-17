angular.module('eyewearApp')
    .factory('MaterialsFactory',function($http){
        var factory ={};
        factory.getMaterials = function(){
            return $http.get('/MaterialEyewear/materials');
        };
        factory.getSingleMaterials = function(id){
            return $http.get('/MaterialEyewear/'+id);
        };

        return factory;
    });