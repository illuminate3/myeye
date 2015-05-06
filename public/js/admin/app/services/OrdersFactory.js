angular.module('shwoodApp')
    .factory('OrdersFactory',function($http){
        var factory ={};
        factory.getOrders = function(){
            return $http.get('/adminmaster/ordersAll');
        };
        factory.getUser = function(id){
            return $http.get('/adminmaster/users/'+id);
        };
        factory.getUserOrders = function(id){
            return $http.get('/adminmaster/sales/'+id);
        };
        //factory.deleteItem = function(id){
        //    return $http.delete('/adminmaster/sales/'+id);
        //};
        return factory;
    });