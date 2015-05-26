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
            angular.forEach($scope.orders,function(order,key) {
                $scope.totalPrice += (order.price * order.count);
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