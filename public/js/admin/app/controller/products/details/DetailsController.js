angular.module('shwoodApp')

    .controller('DetailsController',function($scope,$http,DetailsFactory,messageFactory,$filter,$routeParams) {
        $scope.details = [];
        $scope.order = 'created_at';
        $scope.reverse = true;
        $scope.itemSelected='10';
        $scope.product = '';
        var item  = $routeParams.itemId;
        function init(item){
            DetailsFactory.getDetails(item)
                .success(function(data){
                    $scope.details = data;
                    console.log( $scope.details);
                });
            DetailsFactory.getProduct(item)
                .success(function(ret){
                    $scope.product = ret;
                })
        }
        init(item);
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

        $scope.active = function(detail){
            console.log(detail.pivot.id);
            DetailsFactory.active(detail.pivot.id)
                .success(function(data){
                    console.log('aaaaaaaaaaa');
                  //  init(item);
                    detail.pivot.active = ! detail.pivot.active;
                });


        };
        $scope.activeSlideshow = function(detail){
            DetailsFactory.activeSlideShow(detail.pivot.id)
                .success(function(data){
                    console.log('aaaaaaaaaaa');
                    //  init(item);
                    detail.pivot.slide_show = ! detail.pivot.slide_show;
                });
        };
        $scope.deleteItem = function(id){
            console.log(id);
            var a = window.confirm('Are you Sure you want to delete this item?');
            if(a) {
                DetailsFactory.deleteItem(id)
                    .success(function (data) {
                        console.log('aaaaaaaaaaa');
                        init(item);
                    });
            }
        };

        var activeArray = [];
        var ActiveObjects;
        $scope.selectedItems = function () {
            ActiveObjects = $filter('filter')($scope.details, {checked: true});
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
            $http.post('/adminmaster/productsDetail/activeAll', JSON.stringify(activeArray))
                .success(function (data) {
                    console.log(data);
                    init(item);
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
                $http.post('/adminmaster/productsDetail/deleteAll', JSON.stringify(activeArray))
                    .success(function (data) {
                        console.log(data);
                        init(item);
                    });
                activeArray = [];
            };
        }
    });