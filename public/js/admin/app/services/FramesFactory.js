angular.module('shwoodApp')
    .factory('FramesFactory',function($http){
        var factory ={};
        factory.getFrames = function(){
            return $http.get('/adminmaster/frames');
        };
        factory.getSingleFrames = function(id){
            return $http.get('/adminmaster/frames/'+id);
        };


        factory.active = function(id){
            return $http.get('/adminmaster/frames/active/'+id);
        };
        factory.deleteItem = function(id){
            return $http.delete('/adminmaster/frames/'+id);
        };
        return factory;
    });