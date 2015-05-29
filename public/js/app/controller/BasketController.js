angular.module('eyewearApp')

    .controller('BasketController',function($scope,$http,BasketFactory,messageFactory,$filter) {
        $scope.orders = [];
        $scope.totalPrice=0;
        function init(){
            BasketFactory.getOrders()
                .success(function(data){
                    $scope.orders = data;
                    $scope.totalPriceCal();
                });

        }
        init();

        $scope.totalPriceCal = function(){
            $scope.totalPrice=0;
            var orderPrice=0;
            angular.forEach($scope.orders,function(order,key) {
                if(order.lense_price != null){
                    orderPrice =  order.lense_price;
                }else{
                    orderPrice = 0;
                }
                $scope.totalPrice += ( (order.price + orderPrice) * order.count);
                });

        };
        $scope.change_quantity = function (order) {

            if(order.count <= 0 ){
                if(order.count != null) {
                    BasketFactory.deleteOrder(order.id)
                        .success(function () {
                            //var index = $scope.orders.indexOf({id : order.id});
                            //$scope.orders.splice(index, 1);
                            //$scope.totalPriceCal();
                            init();
                        });
                }
            }else {
                BasketFactory.updateOrderCount(order.id, order.count)
                    .success(function (data) {
                        // $scope.orders = data;
                        order = data;
                        $scope.totalPrice = 0;
                        $scope.totalPriceCal();
                        console.log(data);
                    });
            }

        }


    });