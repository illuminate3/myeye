angular.module('shwoodApp')
    .factory('ProductsFactory',function($http){
        var factory ={};
        factory.getProducts = function(){
            return $http.get('/adminmaster/products');
        };
        factory.getSingleProducts = function(id){
            return $http.get('/adminmaster/products/'+id);
        };


        factory.active = function(id){
            return $http.get('/adminmaster/products/active/'+id);
        };
        factory.deleteItem = function(id){
            return $http.delete('/adminmaster/products/'+id);
        };
        return factory;
    });