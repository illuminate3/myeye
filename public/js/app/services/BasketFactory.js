angular.module('eyewearApp')
    .factory('BasketFactory',function($http){
        var factory ={};
        factory.getOrders = function(){
            return $http.get('/shopAll');
        };

        factory.updateOrderCount = function(id,count){
            return $http.put('/shop/'+id , JSON.stringify({ quantity : count}));
        };

        factory.deleteOrder = function(id,count){
            return $http.delete('/shop/'+id );
        };



        return factory;
    });