angular.module('eyewearApp')

    .controller('RxEyewearController',function($scope,$http,RxEyewearFactory,MaterialsFactory,messageFactory,$filter) {
        $scope.imageView = 'front';
        $scope.products = [];
        $scope.materials = '';
        $scope.material_selected;
        var ps = [];
        function init(){
            RxEyewearFactory.getEyewears()
                .success(function(data){
                    $scope.products = data;
                    ps = data;
                    //console.log(ps);
                    //console.log($scope.products);
                });
            MaterialsFactory.getMaterials()
                .success(function(data){
                    $scope.materials = data;
                });

        }
        init();

        $scope.resetMaterial = function(){
            $scope.products = JSON.parse(JSON.stringify(ps));
        };

        $scope.productInitImage = function(pr,view){
            if(view == 'front'){

                return pr.materials[0].pivot.image_item_front;
            }

            if(view == 'side'){

                return pr.materials[0].pivot.image_item_side;
            }

        };

        var listItem=[];
        $scope.changeMaterial = function(mat){
            $scope.material_selected = mat;
            $scope.products = JSON.parse(JSON.stringify(ps));

            console.log($scope.products);
            //init();

            angular.forEach($scope.products, function (product , key) {
                //console.log(product.materials);
               listItem = $filter('filter')(product.materials , { pivot : { active : 1} , title: mat.title });
                product.materials = listItem;
                //console.log(listItem);
                if(product.materials.length > 0){
                    if($scope.imageView == 'front'){

                        product.image.front = product.materials[0].pivot.image_item_front;
                    }
                    if($scope.imageView == 'side'){

                        product.image.side = product.materials[0].pivot.image_item_side;
                    }
                }
                //$scope.products[parseInt(key)].materials = product.materials;
              //  console.log( $scope.products[parseInt(key)]);
            });
            //ActiveObjects = $filter('filter')($scope.books, {checked: true});
            //console.log(ActiveObjects);
        }

        $scope.image_item= function(product,material){
            console.log('salam');
                  var random = (new Date()).toString();
            //+  "?cb=" + random
                if($scope.imageView == 'front'){
                    product.image.front = material.pivot.image_item_front ;
                    product.image.side = material.pivot.image_item_side ;
                }

                if($scope.imageView == 'side'){
                    product.image.side = material.pivot.image_item_side;
                    product.image.front = material.pivot.image_item_front;
                    //console.log( product.image.side);
                    //console.log( product.image.front);
                }
            console.log( product.image.front);

                product.price = material.pivot.price;
                product.pivotId = material.pivot.id;
        };

        $scope.changeImageView = function(value){
            $scope.imageView = value;
        };

    });