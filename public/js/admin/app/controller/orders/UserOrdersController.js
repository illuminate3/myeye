angular.module('shwoodApp')

    .controller('UserOrdersController',function($scope,$http,OrdersFactory,messageFactory,$window,$routeParams,$http) {
        $scope.user = [];
        $scope.orders = [];
        $scope.order = 'updated_at';
        $scope.reverse = true;
        $scope.itemSelected='10';
        var item  = $routeParams.userId;
        function init(){
            OrdersFactory.getUser(item)
                .success(function(data){
                    $scope.user = data;
                });
            OrdersFactory.getUserOrders(item)
                .success(function(data){
                    $scope.orders = data;
                    //console.log(data);
                });
        }
        init();

        $scope.acceptOrder = function(order){
            if($window.confirm('آیا این محصول به صورت قطعی فروش می‌رود؟')){
                $http.post('/adminmaster/acceptedOrder/' + order.id)
                    .success(function(data){
                        order.seen = 1;
                    }) ;
            }
        };

        $scope.sort = function(name){
            $scope.order = name;
            $scope.reverse = ! $scope.reverse;
        };

        if (messageFactory.hasAlert()) {
            $scope.success = messageFactory.getSuccess();
            messageFactory.reset();
        }

        $scope.deleteItem = function(order){
            var a = window.confirm('Are you Sure you want to delete this item?');
            if(a) {
                $http.delete('/adminmaster/sales/' + order.id)
                    .success(function (data) {
                        console.log(data);
                        angular.forEach($scope.orders, function(obj, index){
                            if (obj.id === order.id) {
                                $scope.orders.splice(index, 1);
                            }
                        });
                    });
            }
        };


    });