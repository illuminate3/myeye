angular.module('shwoodApp')
    .factory('DetailsFactory',function($http){
        var factory ={};
        factory.getDetails = function(id){
            return $http.get('/adminmaster/productsDetail/product/'+id);
        };
        factory.getProduct = function(id){
            return $http.get('/adminmaster/productsDetail/getProduct/'+id);
        };
        factory.getSingleDetails = function(id){
            return $http.get('/adminmaster/productsDetail/'+id);
        };


        factory.activeSlideShow = function(id){
            return $http.get('/adminmaster/productsDetail/activeSlideShow/'+id);
        };
        factory.active = function(id){
            return $http.get('/adminmaster/productsDetail/active/'+id);
        };
        factory.deleteItem = function(id){
            return $http.delete('/adminmaster/productsDetail/'+id);
        };
        return factory;
    });