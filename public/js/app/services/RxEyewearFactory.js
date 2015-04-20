angular.module('eyewearApp')
    .factory('RxEyewearFactory',function($http){
        var factory ={};
        factory.getEyewears = function(){
            return $http.get('/rxEyewear');
        };
        factory.getSingleEyewears = function(id){
            return $http.get('/rxEyewear/'+id);
        };

        factory.getEyewearsWithId = function(id){
            return $http.get('/rxEyewearProducts/'+id);
        };

        return factory;
    });