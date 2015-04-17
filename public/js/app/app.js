
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

        //.filter("materialSelected", function () {
        //    return function(data,material) {
        //
        //
        //        //console.log(data);
        //       // var results = data;
        //        if(material.length > 0 && angular.isArray(data)) {
        //           // console.log($filter);
        //            var res = [];
        //                console.log(angular.isArray(data));
        //                    for (var i = 0; i < data.length; i++) {
        //                        for(var j=0; j < data[i]['materials'].length ; j++){
        //                            //if( (data[i]['materials'][j].active == 0)){
        //                            //    data[i]['materials'].splice(j,1);
        //                            //}
        //                            if( (data[i]['materials'][j].title == material)  ){
        //                               res.push(data[i])
        //                               break;
        //                           }
        //                        }
        //                        //console.log(data[i]['materials']);
        //                        //if (data[i]['materials'].indexOf(material) > 0) {
        //                        //
        //                        //    res.push(data[i]);
        //                        //    //res.push(data[i]);
        //                        //}
        //                    }
        //                console.log(res);
        //                return res;
        //        }else{
        //            return data;
        //        }
        //
        //    }
        //
        //})
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
