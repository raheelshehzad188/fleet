<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="<?= base_url(); ?>/shift.css" />
<body>

<p>Try to change the names.</p>

<div ng-app="myApp" ng-controller="myCtrl">
  <div id="preloader" ng-if="pages.preloader" > Preloader</div>
  <div id="login" ng-if="pages.login">
    <form ng-submit="submit_form(form)" >

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" ng-model="uname" name ="uname">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"  name ="upass"  ng-model="upass">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" ng-disabled="!uname || !upass">Submit</button>
</form>
</div>

<script>
  var BASE_URL = '<?= base_url('api/'); ?>'
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope,$http) {
  $scope.pages = {
    'preloader':0,
    'login':0,
  };
  $scope.pages.login = 1;

  $scope.show_page = function(id)
  {
    /*angular.forEach($scope.pages, function (value, key) { 
                if(value)
                {
                  $('#'+key).show();
                }
                else
                {
                  $('#'+key).hide();
                }
            }); */

    console.log($scope.pages);
  };
    $scope.uname= "";
    $scope.upass= "";
    $scope.submit_form = function(formData) {
      $scope.pages.preloader = 1;
      $scope.pages.login = 0;
        $scope.formData = formData;

        console.log(formData); // object
        console.log(JSON.stringify(formData)); // string
        var url = BASE_URL+'login', data = { uname:$scope.uname,upass:$scope.upass },config='contenttype';

$http.post(url, data, config).then(function (response) {

console.log(response);

}, function (response) {

// this function handles error

});

    };
    $scope.pages.login = 1;
    $scope.show_page('preloader');
});
</script>

</body>
</html>
