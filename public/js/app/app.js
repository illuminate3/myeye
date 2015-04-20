
var shwoodApp = angular.module('eyewearApp',['ngRoute'])
        .config(function($routeProvider){
            $routeProvider
                .when('/rxeyewear',
                {
                    controller:'RxEyewearController',
                    templateUrl:'/js/app/views/rxeyewear/index.html'
                }
            )
                .when('/rxeyewear/:item/:product',
                {
                    controller:'RxEyewearProductController',
                    templateUrl:'/js/app/views/rxeyewear/product.html'
                }
            )
                .when('/seyewear',
                {
                    controller:'SunEyewearController',
                    templateUrl:'/js/app/views/suneyewear/index.html'
                }
            );
        })

        .filter("matcheckbox", function () {
            return function(data) {
                if (angular.isArray(data)) {
                    for (var i = 0; i < data.length; i++) {
                        data[i]['checkbox']= true;
                    }
                }
                return data;
            }

        })
        .filter("withMaterial", function () {
            return function(data) {
                //console.log(data);
                var results = [];
                    if (angular.isArray(data)) {
                        //console.log(angular.isArray(data));
                        for (var i = 0; i < data.length ; i++) {
                            //console.log(data[i]['materials'].length + 'sdafsaf');
                            if (data[i]['materials'].length > 0) {
                                console.log(data[i]['materials'].length);
                               results.push(data[i]);
                            }
                        }

                        for (var i = 0; i < results.length ; i++) {
                            //console.log(results[i]['materials'].length + 'sdafsaf');
                            angular.forEach(results[i]['materials'],function(mat,key){
                                if(mat.pivot.active == 0){
                                    results[i]['materials'].splice(key,1);
                                }
                            });
                        }
                    }
                return results;
            }

        })
        .filter('htmlToPlaintext', function() {
            return function(text) {
                return String(text).replace(/<[^>]+>/gm, '');
            }
        })
    ;
