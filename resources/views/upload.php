<!DOCTYPE html>
<html lang="en">
<head>
  <style>
  .thumb{
    width: 24px;
    height: 24px;
    float: none;
    position: relative;
    top: 7px;
  }
  form .progress{
      line-height: 15px;
  }
  .progress{
    display: inline-block;
    width: 100px;
    border: 3px groove #CCC;
  }
  .progress div{
    font-size: smaller;
    background: orange;
    width: 0;
  }
  </style>
  <script src="/js/angular.min.js"></script>
  <script src="/js/ng-file-upload-shim.min.js"></script> <!-- for no html5 browsers support -->
  <script src="/js/ng-file-upload.min.js"></script>
</head>
<body ng-app="fileUpload" ng-controller="MyCtrl">
  <form name="myForm">
    <fieldset>
      <legend>Upload on form submit</legend>
      <br>Photo:
      <input type="file" ngf-select ng-model="picFile" name="file"    
      required ngf-model-invalid="errorFile">
      <i ng-show="myForm.file.$error.required">*required</i><br>
      <i ng-show="myForm.file.$error.maxSize">File too large 
        {{errorFile.size / 1000000|number:1}}MB: max 2M</i>
        <img ng-show="myForm.file.$valid" ngf-thumbnail="picFile" class="thumb"> <button ng-click="picFile = null" ng-show="picFile">Remove</button>
        <br>
        <button ng-disabled="!myForm.$valid" 
        ng-click="uploadPic(picFile)">Submit</button>
        <span class="progress" ng-show="picFile.progress >= 0">
          <div style="width:{{picFile.progress}}%" 
          ng-bind="picFile.progress + '%'"></div>
        </span>
        <span ng-show="picFile.result">Upload Successful</span>
        <span class="err" ng-show="errorMsg">{{errorMsg}}</span>
      </fieldset>
      <br>
    </form>
    <script>
    //inject angular file upload directives and services.
    var app = angular.module('fileUpload', ['ngFileUpload']);
    app.controller('MyCtrl', ['$scope', 'Upload', '$timeout', function ($scope, Upload, $timeout) {
        $scope.uploadPic = function(file){
        file.upload = Upload.upload({
          url: '/upload',
          data: {username: $scope.username, file: file},
        });
        file.upload.then(function (response){
          $timeout(function (){
            file.result = response.data;
        });
        }, function (response){
          if (response.status > 0)
          $scope.errorMsg = response.status + ': ' + response.data;
        }, function (evt) {
          // Math.min is to fix IE which reports 200% sometimes
          file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
        });
      }
    }]);
    </script>
  </body>
</html>