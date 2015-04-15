
var shwoodApp = angular.module('shwoodApp',['ngRoute','ui.tinymce'])
        .config(function($routeProvider){
            $routeProvider
                .when('/frames',
                    {
                        controller:'FramesController',
                        templateUrl:'/js/admin/app/views/frames/index.html'
                    }
                ).when('/frames/create',
                {
                    controller:'FramesCreateController',
                    templateUrl:'/js/admin/app/views/frames/framesCreate.html'
                }
            )
                .when('/frames/:itemId',
                {
                    controller:'FramesEditController',
                    templateUrl:'/js/admin/app/views/frames/framesEdit.html'
                }
                ).when('/products',
                    {
                        controller:'ProductsController',
                        templateUrl:'/js/admin/app/views/products/index.html'
                    }
                ).when('/products/create',
                    {
                        controller:'ProductsCreateController',
                        templateUrl:'/js/admin/app/views/products/productsCreate.html'
                    }
                )
                    .when('/products/:itemId',
                    {
                        controller:'ProductsEditController',
                        templateUrl:'/js/admin/app/views/products/productsEdit.html'
                    }
                ).when('/materials',
                {
                    controller:'MaterialsController',
                    templateUrl:'/js/admin/app/views/materials/index.html'
                }
            ).when('/materials/create',
                {
                    controller:'MaterialsCreateController',
                    templateUrl:'/js/admin/app/views/materials/materialsCreate.html'
                }
            )
                .when('/materials/:itemId',
                {
                    controller:'MaterialsEditController',
                    templateUrl:'/js/admin/app/views/materials/materialsEdit.html'
                }
            ).when('/details/create/:itemId',
                {
                    controller:'DetailsCreateController',
                    templateUrl:'/js/admin/app/views/products/details/detailsCreate.html'
                }
            )
            .when('/details/show/:itemId',
                {
                    controller:'DetailsEditController',
                    templateUrl:'/js/admin/app/views/products/details/detailsEdit.html'
                }
            )
                .when('/details/:itemId',
                {
                    controller:'DetailsController',
                    templateUrl:'/js/admin/app/views/products/details/details.html'
                }
            ).when('/lenses',
                {
                    controller:'LensesController',
                    templateUrl:'/js/admin/app/views/lenses/index.html'
                }
            ).when('/lenses/create',
                {
                    controller:'LensesCreateController',
                    templateUrl:'/js/admin/app/views/lenses/lensesCreate.html'
                }
            )
                .when('/lenses/:itemId',
                {
                    controller:'LensesEditController',
                    templateUrl:'/js/admin/app/views/lenses/lensesEdit.html'
                }).when('/sunglassesLenses/create/:itemId',
                {
                    controller:'SunglassesLensesCreateController',
                    templateUrl:'/js/admin/app/views/sunglassesLenses/sunglassesLensesCreate.html'
                }
            )
                .when('/sunglassesLenses/show/:itemId',
                {
                    controller:'SunglassesLensesEditController',
                    templateUrl:'/js/admin/app/views/sunglassesLenses/sunglassesLensesEdit.html'
                }
            )
                .when('/sunglassesLenses/:itemId',
                {
                    controller:'SunglassesLensesController',
                    templateUrl:'/js/admin/app/views/sunglassesLenses/sunglassesLenses.html'
                }
            ).when('/',
                {
                    controller:'MainController',
                    templateUrl:'/js/admin/app/views/main/main.html'
                }
            );

        })
        .filter("checkBoxFn", function () {
            return function(data) {
                if (angular.isArray(data)) {
                    for (var i = 0; i < data.length; i++) {
                        data[i]['checkbox'] = false;
                    }
                }
                return data;
            }

        })
        .filter('htmlToPlaintext', function() {
            return function(text) {
                return String(text).replace(/<[^>]+>/gm, '');
            }
        })
        ;
