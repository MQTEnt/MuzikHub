<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MuzikHub</title>


    <!-- Custom CSS temp -->


    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- TMQ Custom CSS -->
    <link rel="stylesheet" href="/css/custom.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery -->
        <script src="/js/jquery.min.js"></script>

        <!-- AngularJS -->
        <script src="/js/angular.min.js"></script>

        <!-- Angular Upload file -->
        <script src="/js/ng-file-upload-shim.min.js"></script> <!-- for no html5 browsers support -->
        <script src="/js/ng-file-upload.min.js"></script>

        <!-- Auto-complete module -->
        <script src="/js/bootstrap3-typeahead.js"></script>
        <script src="/js/angular-bootstrap3-typeahead.js"></script>
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            @include('admin.partial.navbar')
            <!-- End Navigation -->

            <div id="page-wrapper">
                @yield('body.content')
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- Bootstrap Core JavaScript -->
        <script src="/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="/js/sb-admin-2.min.js"></script>
        <script>
        var uploadedAudio = {idAudio: null, success: false};
        var uploadedImage = {idImage: null, success: false};
        var app = angular.module('songApp', ['bootstrap3-typeahead', 'ngFileUpload'], function($interpolateProvider) {
            //'bootstrap3-typeahead' is a dependent module for auto-complete feature
            //'ngFileUpload' is a dependent module for upload file and display progress
            //Using <% %> instead {{}} (2 way binding)
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });
        app.controller('songCtrl', ['$scope', 'Upload', '$timeout', '$http', function ($scope, Upload, $timeout, $http){
            $scope.uploadAudioFile = function(audio, image){
                //Delete old alert (if exsist)
                $('#validationError ul li').remove();
                $('#validationError').css('display', 'none');

                /*
                *Alert errors when audio == null or image == null
                */
                if(typeof audio == 'undefined' || audio == null){
                    $('#validationError').css('display', 'block');
                    $('#validationError ul').append('<li>'+'You have to choose an audio'+'</li>');
                    return 0;
                }
                if(typeof image == 'undefined' || image == null){
                    $('#validationError').css('display', 'block');
                    $('#validationError ul').append('<li>'+'You have to choose an image'+'</li>');
                    return 0;
                }
                /*
                ***********Upload Audio File
                */
                /*
                *Kiểm tra nếu trước đó đã upload ảnh thành công rồi thì không cần upload lại nữa
                */
                if(!uploadedAudio.success){
                    audio.upload = Upload.upload({
                        url: '/admin/song/audio_file',
                        method: 'POST',
                        data: {audioFile: audio}
                    });
                    audio.upload.then(function (response){
                        $timeout(function (){
                            audio.result = response.data;
                        });
                        uploadedAudio = response.data;
                    }, function (response){
                        if (response.status > 0){
                            var errors = response.data.audioFile;
                            $('#validationError').css('display', 'block');
                            angular.forEach(errors, function(item, key){
                                $('#validationError ul').append('<li>'+item+'</li>');
                            });
                        }
                    }, function (evt) {
                        // Math.min is to fix IE which reports 200% sometimes
                        audio.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
                    });
                }
                /*
                ***********Upload Image File
                */
                /*
                *Kiểm tra nếu trước đó đã upload ảnh thành công rồi thì không cần upload lại nữa
                */
                if(!uploadedImage.success){
                    image.upload = Upload.upload({
                        url: '/admin/song/image_file',
                        method: 'POST',
                        data: {imageFile: image}
                    });
                    image.upload.then(function (response){
                        $timeout(function (){
                            image.result = response.data;
                        });
                        uploadedImage = response.data;
                    }, function (response){
                        if (response.status > 0){
                            var errors = response.data.imageFile;
                            $('#validationError').css('display', 'block');
                            angular.forEach(errors, function(item, key){
                                $('#validationError ul').append('<li>'+item+'</li>');
                            });
                        }
                    }, function (evt) {
                        // Math.min is to fix IE which reports 200% sometimes
                        image.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
                    });
                }
            }
            /*
            *Xóa audio đã upload
            */
            $scope.removeUploadedAudio = function(file){
                if(uploadedAudio.success){
                    //alert('Xóa audio đã upload');
                    $http.get('/admin/audio/delete/'+uploadedAudio.idAudio)
                    .success(function(data){
                        alert(data.stat);
                        uploadedAudio = {idAudio: null, success: false};
                    })
                    .error(function(data){
                        alert(data);
                    });
                }
                else
                {
                    //alert('Xóa audio chưa upload');
                }
            }

            /*
            *Xóa ảnh đã upload
            */
            $scope.removeUploadedImage = function(file){
                if(uploadedImage.success){
                    $http.get('/admin/image/delete/'+uploadedImage.idImage)
                    .success(function(data){
                        alert(data.stat);
                        uploadedImage = {idImage: null, success: false};
                    })
                    .error(function(data){
                        alert(data);
                    });
                }
                else
                {
                }
            }
            /*
            *Quick search or add new composer
            */
            $scope.composers = ["Maroon5", "Eminem", "Coldplay"];
            $scope.addItem = function () {
                $scope.errortext = "";
                if (!$scope.newItem) {return;}
                if ($scope.composers.indexOf($scope.newItem) == -1) {
                    $scope.composers.push($scope.newItem);
                } else {
                    $scope.errortext = "Composer is aready in list";
                }
            }
            $scope.removeItem = function (x) {
                $scope.errortext = "";
                $scope.composers.splice(x, 1);
            };
            /*
            *Auto-complete
            */
            $scope.artists = [];
            //...Add event type input to send request ???
            $('#btnAddNew').click(function(){
                $http.get('/get_artists')
                .success(function(data){
                    //Loop for push name artists to $scope.artists (array)
                    for (var key in data.artists) {
                       $scope.artists.push(data.artists[key].name);
                    }
                })
                .error(function(data){
                    alert(data);
                });
            });
        }]);
</script>
</body>

</html>
