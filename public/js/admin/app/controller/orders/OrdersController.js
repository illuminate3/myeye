angular.module('shwoodApp')

    .controller('OrdersController',function($scope,$http,OrdersFactory,messageFactory,$filter) {
        $scope.orders = [];
        $scope.order = 'updated_at';
        $scope.reverse = true;
        $scope.itemSelected='10';
        function init(){
            OrdersFactory.getOrders()
                .success(function(data){
                    $scope.orders = data;
                    filterOrders();
                });
        }
        init();

        var filterOrders = function () {
            angular.forEach($scope.orders,function(val ,key){
                   val.activeOrders = $filter('filter')(val.orders, {active: 1 , seen:0}).length;
                   val.passiveOrders = $filter('filter')(val.orders, {active: 0}).length;
                   val.soldOrders = $filter('filter')(val.orders, {active: 1 , seen:1}).length;
                console.log($scope.orders);
            })
            //$scope.activeOrders = $filter('filter')($scope.orders, {active: 1});
            //console.log(ActiveObjects);
        }
        // $http.get('/admin/getNews').success(function(data){
        //     $scope.books = data;
        //});
        $scope.sort = function(name){
            $scope.order = name;
            $scope.reverse = ! $scope.reverse;
        };

        if (messageFactory.hasAlert()) {
            $scope.success = messageFactory.getSuccess();
            messageFactory.reset();
        }

        $scope.active = function(id){
            console.log(id);
            OrdersFactory.active(id)
                .success(function(data){
                    console.log('aaaaaaaaaaa');
                    init();
                });


        };
        $scope.deleteItem = function(id){
            console.log(id);
            var a = window.confirm('Are you Sure you want to delete this item?');
            if(a) {
                OrdersFactory.deleteItem(id)
                    .success(function (data) {
                        console.log('aaaaaaaaaaa');
                        init();
                    });
            }
        };

        var activeArray = [];
        var ActiveObjects;
        $scope.selectedItems = function () {
            ActiveObjects = $filter('filter')($scope.orders, {checked: true});
            console.log(ActiveObjects);
            // for(var i=0;i<$scope.ActiveObjects.length;i++) {
            //     $http.post('/admin/latest/activeAll', JSON.stringify($scope.ActiveObjects[0]))
            //         .success(function (data) {
            //             console.log(data);
            //         });
            //}
        }
        $scope.activeAll = function(){
            for(var i=0; i < ActiveObjects.length ; i++){
                activeArray.push((ActiveObjects[i].id));
            }
            console.log(activeArray);
            $http.post('/adminmaster/orders/activeAll', JSON.stringify(activeArray))
                .success(function (data) {
                    console.log(data);
                    init();
                });
            activeArray = [];

        };

        $scope.deleteAll = function() {
            var a = window.confirm('Are you Sure you want to delete this item?');
            if (a) {
                for (var i = 0; i < ActiveObjects.length; i++) {
                    activeArray.push((ActiveObjects[i].id));
                }
                console.log(activeArray);
                $http.post('/adminmaster/orders/deleteAll', JSON.stringify(activeArray))
                    .success(function (data) {
                        console.log(data);
                        init();
                    });
                activeArray = [];
            };
        }
    });