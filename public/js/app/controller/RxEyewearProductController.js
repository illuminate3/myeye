angular.module('eyewearApp')

    .controller('RxEyewearProductController',function($scope,$http,RxEyewearFactory,messageFactory,$filter,$routeParams,$sce) {
        $scope.imageView = 'side';
        $scope.product = [];
        $scope.products = [];
        $scope.material_selected;
        $scope.detail_mat = '';
        $scope.detail_product = '';
        var item  = $routeParams.item;
        var productId = $routeParams.product;
        var ps = [];
        function init(itemId){
            RxEyewearFactory.getSingleEyewears(itemId)
                .success(function(data){
                    $scope.product= data[0];
                    $scope.detail_mat = $sce.trustAsHtml(data[0].material_detail);
                    $scope.detail_product = $sce.trustAsHtml(data[0].product_detail);
                   //console.log('asdfsafsaf');
                  // console.log($scope.product);
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