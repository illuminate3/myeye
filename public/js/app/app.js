
var shwoodApp = angular.module('eyewearApp',['ngRoute'])
        .config(function($routeProvider){
            $routeProvider
                .when('/rxeyewear',
                {
                    controller:'RxEyewearController',
                    templateUrl:'/js/app/views/rxeyewear/index.html'
                }
            ).when('/seyewear',
                {
                    controller:'SunEyewearController',
                    templateUrl:'/js/app/views/suneyewear/index.html'
                }
            );
        })
        .filter('htmlToPlaintext', function() {
            return function(text) {
                return String(text).replace(/<[^>]+>/gm, '');
            }
        })
    ;
