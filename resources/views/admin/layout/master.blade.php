<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MuzikHub</title>

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
    <!-- jQuery -->
    <script src="/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/js/sb-admin-2.min.js"></script>
    
    <!-- AngularJS -->
    <script src="/js/angular.min.js"></script>
    <script>
        var app = angular.module('songApp',[]);
        app.controller('songCtrl',function($scope, $http){
            var af = new FormData(); //Audio file
            var imgf = new FormData(); //Image file
            /*
            *Get audio file
            */
            $scope.getAudioFile = function(files){
                af.append("audioFile", files[0]);
                //Display file name
                $('#audioFileName').text(files[0].name);
            }
            /*
            *Get image file
            */
            $scope.getImageFile = function(files){
                imgf.append("imageFile", files[0]);
                //Display image file
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgContent')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
                };
                reader.readAsDataURL(files[0]);
            }
            /*
            *Store song
            */
            $scope.storeAudioFile = function(){
                //Delete old alert (if exsist)
                $('#validationError ul li').remove();
                /*
                *Store image file
                */
                $http.post('/admin/song/image_file', imgf,{
                    withCredentials: true,
                    headers: {'Content-Type': undefined, 'X-Requested-With': 'XMLHttpRequest'},
                    transformRequest: angular.identity
                }).success(function(data){
                    console.log(data);
                })
                .error(function(data){
                    $('#validationError').css('display', 'block');
                    //Display new alert
                    angular.forEach(data, function(item, key){
                        $('#validationError ul').append('<li>'+item+'</li>');
                    });
                });
                /*
                *Store audio file
                */
                $http.post('/admin/song/audio_file', af,{
                    withCredentials: true,
                    headers: {'Content-Type': undefined, 'X-Requested-With': 'XMLHttpRequest'},
                    transformRequest: angular.identity
                }).success(function(data){
                    console.log(data);
                })
                .error(function(data){
                    $('#validationError').css('display', 'block');
                    //Display new alert
                    angular.forEach(data, function(item, key){
                        $('#validationError ul').append('<li>'+item+'</li>');
                    });
                });
            }
        });
    </script>
</body>

</html>
