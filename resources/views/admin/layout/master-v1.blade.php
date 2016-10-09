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

        <!-- jQuery -->
        <script src="/js/jquery.min.js"></script>

        <!-- AngularJS -->
        <script src="/js/angular.min.js"></script>

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
        var app = angular.module('songApp', ['bootstrap3-typeahead'], function($interpolateProvider) {
            //'bootstrap3-typeahead' is a dependent module for auto-complete feature
            //Using <% %> instead {{}} (2 way binding)
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });
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
            };
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
            //...Add event type input to send request
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
</script>
</body>

</html>
