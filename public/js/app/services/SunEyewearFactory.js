angular.module('eyewearApp')
    .factory('SunEyewearFactory',function($http){
        var factory ={};
        factory.getEyewears = function(){
            return $http.get('/sun-eyewear');
        };
        factory.getSingleEyewears = function(id){
            return $http.get('/sun-eyewear/'+id);
        };

        factory.getLenses = function(id){
            return $http.get('/sun-eyewear/lenses/'+id);
        };

        factory.getEyewearsWithId = function(id){
            return $http.get('/sun-eyewearProducts/'+id);
        };

        return factory;
    });