angular.module('eyewearApp')

    .controller('RxEyewearProductController',function($scope,$http,RxEyewearFactory,messageFactory,$filter,$routeParams) {
        $scope.imageView = 'side';
        $scope.product = [];
        $scope.products = [];
        $scope.material_selected;
        var item  = $routeParams.item;
        var productId = $routeParams.product;
        var ps = [];
        function init(itemId){
            RxEyewearFactory.getSingleEyewears(itemId)
                .success(function(data){
                    $scope.product= data[0];
                //    console.log($scope.product);
                });

        }
        init(item);

        function initProducts(){
            RxEyewearFactory.getEyewearsWithId(productId)
                .success(function(data){
                    $scope.products= data;
                    console.log($scope.products);
                });

        }
        initProducts();

        $scope.changeMainProduct = function(id){
            init(id);
        }

        $scope.mouseEnter = function (eve) {
            $scope.imageView = eve;
        }

        $scope.mouseLeave = function (eve) {
            $scope.imageView = eve;
        }



    });