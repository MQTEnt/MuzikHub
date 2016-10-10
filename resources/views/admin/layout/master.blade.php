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
            $scope.currentYear = new Date().getFullYear();
            $scope.uploadSong = function(audio, image){
                //Delete old alert (if exsist)
                $('#validationError ul li').remove();
                $('#validationError').css('display', 'none');

                /*
                *Validate name of song
                */
                if(typeof $scope.name_song == 'undefined'){
                    $('#validationError').css('display', 'block');
                    $('#validationError ul').append('<li>'+'Fill name of the song'+'</li>');
                    return 0;
                }
                /*
                *Validate year composer
                */
                if(typeof $scope.year_composed == 'undefined'){
                    $('#validationError').css('display', 'block');
                    $('#validationError ul').append('<li>'+'Year composed from 1950 to now'+'</li>');
                    return 0;
                }

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
                *Alert when haven't upload audio or image yet (or fomat incorrect)
                */
                if(uploadedAudio.idAudio == null){
                    $('#validationError').css('display', 'block');
                    $('#validationError ul').append('<li>'+'You have to upload an audio or format is incorrect'+'</li>');
                    return 0;
                }
                if(uploadedImage.idImage == null){
                    $('#validationError').css('display', 'block');
                    $('#validationError ul').append('<li>'+'You have to upload an image or format is incorrect'+'</li>');
                    return 0;
                }
                /*** Insert song ***/
                var dataOfSong = {
                    'name': $scope.name_song,
                    'composer': $scope.composers.join(),
                    'singer': $scope.singers.join(),
                    'cate': $scope.cates.join(),
                    'year_composed': $scope.year_composed,
                    'lyric': $scope.lyric,
                    'audio_id': uploadedAudio.idAudio,
                    'image_id': uploadedImage.idImage
                };
                console.log(dataOfSong);
                $http.post('/admin/song', dataOfSong)
                .success(function(res){
                    alert('You added a new song successfully');
                    location.reload();
                })
                .error(function(res){
                    console.log(res)
                });
            }
            /*
            *Upload Audio
            */
            $scope.uploadAudio = function(audio){
                //Delete old alert (if exsist)
                $('#validationError ul li').remove();
                $('#validationError').css('display', 'none');

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
            *Upload Image
            */
            $scope.uploadImage = function(image){
                //Delete old alert (if exsist)
                $('#validationError ul li').remove();
                $('#validationError').css('display', 'none');

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
            $scope.composers = [];
            $scope.singers = [];
            $scope.cates = [];
            $scope.artists = []; //Artists in Database
            $scope.dbCates = []; //Cates in Database
            $scope.addItem = function (typeItem) {
                /*
                *composer
                */
                if(typeItem=='composer'){
                    $scope.errortextComposer = "";
                    if (!$scope.newComposer) {return;}
                    if ($scope.composers.indexOf($scope.newComposer) == -1){
                        $scope.composers.push($scope.newComposer);
                        if($scope.artists.indexOf($scope.newComposer) == -1)
                        {
                            var confirmAddArtist = confirm('The artist doesn\'t exsist, you want to create and add to list?');
                            if(confirmAddArtist){
                                $http.post('/admin/artist', {'name': $scope.newComposer})
                                .success(function(data){
                                    console.log(data);
                                    //Thêm luôn artist mới tạo vào trong danh sách search artist
                                    $scope.artists.push($scope.newComposer);
                                    
                                })
                                .error(function(data){
                                    //Trường hợp error do thêm một artist đã tồn tại trong database sẽ không sảy ra
                                    console.log(data);
                                });
                            }
                            else{
                                $scope.composers.pop();
                            }
                        }
                    }
                    else{
                        $scope.errortextComposer = "Composer is aready in list";
                    }
                }
                /*
                *singer
                */
                else{
                    if(typeItem=='singer'){
                        $scope.errortextSinger = "";
                        if (!$scope.newSinger) {return;}
                        if ($scope.singers.indexOf($scope.newSinger) == -1){
                            $scope.singers.push($scope.newSinger);
                            if($scope.artists.indexOf($scope.newSinger) == -1)
                            {
                                var confirmAddArtist = confirm('The artist doesn\'t exsist, do you want to create and add to list?');
                                if(confirmAddArtist){
                                    $http.post('/admin/artist', {'name': $scope.newSinger})
                                    .success(function(data){
                                        console.log(data);
                                        //Thêm luôn artist mới tạo vào trong danh sách search artist
                                        $scope.artists.push($scope.newSinger);
                                        
                                    })
                                    .error(function(data){
                                        //Trường hợp error do thêm một artist đã tồn tại trong database sẽ không sảy ra
                                        console.log(data);
                                    });
                                }
                                else{
                                    $scope.singers.pop();
                                }
                            }
                        }
                        else{
                            $scope.errortextSinger = "Singer is aready in list";
                        }
                    }
                    else{
                        /*
                        *cate
                        */
                        if(typeItem == 'cate'){
                            $scope.errortextCate = "";
                            if (!$scope.newCate) {return;}
                            if ($scope.cates.indexOf($scope.newCate) == -1){
                                $scope.cates.push($scope.newCate);
                                if($scope.dbCates.indexOf($scope.newCate) == -1)
                                {
                                    var confirmAddArtist = confirm('The category doesn\'t exsist, do you want to create and add to list?');
                                    if(confirmAddArtist){
                                        $http.post('/admin/cate', {'name': $scope.newCate})
                                        .success(function(data){
                                            console.log(data);
                                            //Thêm luôn cate mới tạo vào trong danh sách search cates
                                            $scope.dbCates.push($scope.newCate);
                                            
                                        })
                                        .error(function(data){
                                            //Trường hợp error do thêm một cate đã tồn tại trong database sẽ không sảy ra
                                            console.log(data);
                                        });
                                    }
                                    else{
                                        $scope.cates.pop();
                                    }
                                }
                            }
                            else{
                                $scope.errortextCate = "Category is aready in list";
                            }
                        }
                    }
                }
            }
            $scope.removeItem = function (x, typeItem) {
                /*
                *Composer
                */
                if(typeItem == 'composer')
                {
                    $scope.errortextComposer = "";
                    $scope.composers.splice(x, 1);
                }
                /*
                *Singer
                */
                if(typeItem == 'singer')
                {
                    $scope.errortextSinger = "";
                    $scope.singers.splice(x, 1);
                }
                /*
                *Cate
                */
                if(typeItem == 'cate')
                {
                    $scope.errortextCate = "";
                    $scope.cates.splice(x, 1);
                }
            };
            /*
            *Auto-complete
            */
            //...Add event typing input to send request ???
            $('#btnAddNew').click(function(){
                /*
                * Get list artists
                */
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
                /*
                * Get list cates in Database
                */
                $http.get('/get_cates')
                .success(function(data){
                    //Loop for push name cates to $scope.dbCates (array)
                    for (var key in data.cates) {
                       $scope.dbCates.push(data.cates[key].name);
                    }
                })
                .error(function(data){
                    alert(data);
                });
            });
        }]);
</script>
<script>
    $(document).ready(function(){
        $('.close-sub-modal').click(function(){
            $('.sub-modal').modal('hide');
        });
    })
</script>
</body>

</html>
