angular.module('shwoodApp')
    .controller('MainController', function($scope,$http,$window) {
        $scope.tinymceOptions = {

            selector: "textarea#editor1",

            height : '500px',
            language : 'en',
            // selector: "textarea",
            theme: "modern",
            plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            toolbar2: "print preview media | forecolor backcolor emoticons |  fontselect |  fontsizeselect",
            image_advtab: true,
            image_class_list: [
            {title: 'None', value: ''},
            {title: 'Image Responsive', value: 'img-responsive'}
        ],
            templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ],
            file_browser_callback : function(field_name, url, type, win) {
            // from http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript
            var w = window,
                d = document,
                e = d.documentElement,
                g = d.getElementsByTagName('body')[0],
                x = w.innerWidth || e.clientWidth || g.clientWidth,
                y = w.innerHeight|| e.clientHeight|| g.clientHeight;

            var cmsURL = '/filemanager/show?&field_name='+field_name+'&lang='+tinymce.settings.language;

            if(type == 'image') {
                cmsURL = cmsURL + "&type=images";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });

        }
        };


        $scope.images = '';
        $scope.second_slideshows = '';
        $scope.loadingMainSlideShow = false;
        $scope.messageSuccessMainSlideShow = '';
        $scope.ErrorssMainSlideShow = '';
        $scope.tinymceModel = '';

        function init(){
            $http.get('/adminmaster/mainSlideShow')
                .success(function(data){
                    $scope.images = data;
                    console.log(data);
                });
            $http.get('/pages/main')
                .success(function(data){
                    $scope.tinymceModel = data;
                    console.log(data);
                });
        }
        init();

        function init_second(){
            $http.get('/adminmaster/secondSlideShow')
                .success(function(data){
                    $scope.second_slideshows = data;
                    console.log(data);
                });
        }
        init_second();

        $scope.uploadFileMainSlideShow = function(files) {
            $scope.messageSuccessMainSlideShow = '';
            $scope.ErrorssMainSlideShow = '';
            if(files[0].size < 210000) {
                var fd = new FormData();
                $scope.loadingMainSlideShow = true;

                fd.fileMainSlideShow = files[0].name;
                //Take the first selected file
                fd.append("fileMainSlideShow", files[0]);
                //console.log(fd);

                $http.post('/adminmaster/mainSlideShow', fd, {
                    withCredentials: false,
                    headers: {'Content-Type': undefined},
                    transformRequest: angular.identity
                }).success(function (data) {
                    console.log(data);
                    $scope.loadingMainSlideShow = false;
                    $scope.messageSuccessMainSlideShow = 'Your file uploaded successfully';
                    init();
                }).error(function () {
                    $scope.loadingMainSlideShow = false;
                    $scope.ErrorssMainSlideShow = 'Your file uploaded not completed';
                });
            }else{
                $scope.ErrorssMainSlideShow = 'Your file is bigger than 210 kilobyte';

                $window.alert('Your can not be bigger than 210 kilobyte')
            }

        };

        $scope.removeSlideShow = function(img){
            if($window.confirm('Do you really want to delete this image? ')){
                $http.delete('/adminmaster/mainSlideShow/'+ img.id)
                    .success(function(data){
                        init();

                    });
            }

        };

        $scope.uploadFileMainSlideShowEdit = function(files,id) {

            $scope.messageSuccessMainSlideShowEidt = '';
            $scope.ErrorssMainSlideShowEdit = '';
            if(files[0].size < 210000) {
                var fd = new FormData();
                $scope.loadingMainSlideShowEdit = true;

                fd.fileMainSlideShowEidt = files[0].name;
                //Take the first selected file
                fd.append("fileMainSlideShowEdit", files[0]);
                //console.log(fd);

                $http.post('/adminmaster/mainSlideShowEdit/' + id, fd, {
                    withCredentials: false,
                    headers: {'Content-Type': undefined},
                    transformRequest: angular.identity
                }).success(function (data) {
                    console.log(data);
                    $scope.loadingMainSlideShowEdit = false;
                    $scope.messageSuccessMainSlideShowEdit = 'Your file uploaded successfully';
                    init();
                }).error(function () {
                    $scope.loadingMainSlideShowEdit = false;
                    $scope.ErrorssMainSlideShowEdit = 'Your file uploaded not completed';
                });
            }else{
                $scope.ErrorssMainSlideShowEdit = 'Your file is bigger than 210 kilobyte';

                $window.alert('Your can not be bigger than 210 kilobyte')
            }

        };

        $scope.pageArticle = function () {
            $http.post('/pages/main',JSON.stringify({'description' : $scope.tinymceModel}))
                .success(function () {
                    $window.alert('تغییرات با موقیت انجام شد ');
                })
        };

    });