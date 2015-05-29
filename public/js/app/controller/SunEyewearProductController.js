angular.module('eyewearApp')

    .controller('SunEyewearProductController',function($scope,$http,SunEyewearFactory,messageFactory,$filter,$routeParams,$sce) {
        $scope.imageView = 'side';
        $scope.titleLense = '';
        $scope.product = [];
        $scope.lenses = [];
        $scope.products = [];
        $scope.material_selected;
        $scope.detail_mat = '';
        $scope.detail_product = '';
        $scope.lensePrice = 0;
        $scope.lenseId = 0;

        $scope.totalPrice = 0;

        var item  = $routeParams.item;
        var productId = $routeParams.product;
        var ps = [];
        function init(itemId){
            SunEyewearFactory.getSingleEyewears(itemId)
                .success(function(data){
                    $scope.product= data[0];
                    $scope.totalPrice = data[0].price;
                    $scope.lensePrice = 0;
                    $scope.lenseId = 0;
                    $scope.titleLense = 'بدون لنز';
                    initLenses(data[0].id);
                    $scope.detail_mat = $sce.trustAsHtml(data[0].material_detail);
                    $scope.detail_product = $sce.trustAsHtml(data[0].product_detail);
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
            $scope.totalPrice = 0;
            $scope.lenseId = 0;
            $scope.product.image_main_front = sunglass.image_main_front;
            $scope.product.image_main_side = sunglass.image_main_side;
            $scope.lensePrice = sunglass.lense.price;
            $scope.totalPrice = parseInt(sunglass.lense.price + $scope.product.price);
            $scope.titleLense = sunglass.lense.title;
            $scope.lenseId = sunglass.id;
        };

        $scope.noLense = function (id) {
            init(id);
        }

    });