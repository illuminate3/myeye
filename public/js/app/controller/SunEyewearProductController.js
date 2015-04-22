angular.module('eyewearApp')

    .controller('SunEyewearProductController',function($scope,$http,SunEyewearFactory,messageFactory,$filter,$routeParams) {
        $scope.imageView = 'side';
        $scope.titleLense = '';
        $scope.product = [];
        $scope.lenses = [];
        $scope.products = [];
        $scope.material_selected;
        $scope.lensePrice = 0;
        var item  = $routeParams.item;
        var productId = $routeParams.product;
        var ps = [];
        function init(itemId){
            SunEyewearFactory.getSingleEyewears(itemId)
                .success(function(data){
                    $scope.product= data[0];
                    $scope.lensePrice = 0;
                    $scope.titleLense = 'بدون لنز';
                    initLenses(data[0].id);
                });


        }
        var initLenses = function(id){
            SunEyewearFactory.getLenses(id)
                .success(function(data){
                    $scope.lenses= data;
                    console.log(data);
                });
        };
        init(item);

        function initProducts(){
            SunEyewearFactory.getEyewearsWithId(productId)
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

        $scope.lenseClick = function(sunglass){

            $scope.lensePrice = 0;
            $scope.product.image_main_front = sunglass.image_main_front;
            $scope.product.image_main_side = sunglass.image_main_side;
            $scope.lensePrice = sunglass.lense.price;
            $scope.titleLense = sunglass.lense.title;
        };

        $scope.noLense = function (id) {
            init(id);
        }

    });