angular.module('eyewearApp')

    .controller('RxEyewearController',function($scope,$http,RxEyewearFactory,messageFactory,$filter) {
        $scope.products = [];
        $scope.order = 'title';
        $scope.reverse = true;
        $scope.itemSelected='10';
        function init(){
            RxEyewearFactory.getEyewears()
                .success(function(data){
                    $scope.products = data;
                });
        }
        init();

        $scope.product_material= function(product,material_id,view){
            material_id = typeof material_id !== 'undefined' ? material_id : 0;
            view = typeof view !== 'undefined' ? view : 'front';
            if(view == 'front') {
                return product.materials[parseInt(material_id)].pivot.image_item_front
            }
            if(view == 'side') {
                return product.materials[parseInt(material_id)].pivot.image_item_side
            }
        }

    });