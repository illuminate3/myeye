angular.module('shwoodApp')
    .controller('MainController', function($scope) {
        $scope.tinymceOptions = {

            selector: "textarea#editor1",
            plugins: [
                "textcolor",
                "save",
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code ",
                "insertdatetime media table contextmenu paste jbimages"
            ],
            width : '100%',
            height : '500px',
            toolbar: " insertfile undo redo  |, bold,italic,underline,strikethrough, | alignleft aligncenter alignright alignjustify |,justifyleft,justifycenter,justifyright,justifyfull,| bullist numlist outdent indent| ,forecolorpicker , forecolor , backcolor |,styleselect,formatselect,fontselect,fontsizeselect |link image jbimages ",
            theme_advanced_buttons1: "forecolor,backcolor,fontselect,fontsizeselect",
            theme_advanced_buttons2: "",
            relative_urls: false,
            save_enablewhendirty : false,
            theme_advanced_buttons3_add : "save",
            handle_event_callback: function (e) {
                // put logic here for keypress
            }
        };
    });