angular.module('eyewearApp')
    .factory('RxEyewearFactory',function($http){
        var factory ={};
        factory.getEyewears = function(){
            return $http.get('/rxEyewear');
        };
        factory.getSingleEyewears = function(id){
            return $http.get('/eyewear/'+id);
        };

        return factory;
    });