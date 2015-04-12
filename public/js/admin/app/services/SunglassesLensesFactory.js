angular.module('shwoodApp')
    .factory('SunglassesLensesFactory',function($http){
        var factory ={};
        factory.getSunglassesLenses = function(id){
            return $http.get('/adminmaster/sunglassesLenses/lensesAll/'+id);
        };
        //factory.getProduct = function(id){
        //    return $http.get('/adminmaster/sunglassesLenses/getProduct/'+id);
        //};
        factory.getSingleSunglassesLenses = function(id){
            return $http.get('/adminmaster/sunglassesLenses/'+id);
        };


        factory.active = function(id){
            return $http.get('/adminmaster/sunglassesLenses/active/'+id);
        };
        factory.deleteItem = function(id){
            return $http.delete('/adminmaster/sunglassesLenses/'+id);
        };
        return factory;
    });