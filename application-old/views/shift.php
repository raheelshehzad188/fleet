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
    <form ng-submit="submit_form(form)" >

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" ng-m0del="uname" name ="uname">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"  name ="upass">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
First Name: <input type="text" ng-model="firstName"><br>
Last Name: <input type="text" ng-model="lastName"><br>
<br>
Full Name: {{firstName + " " + lastName}}

</div>

<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
  $scope.pages = {
    'preloader':1,
    'login':0,
  };

  $scope.show_page = function(id)
  {
    angular.forEach($scope.pages, function (value, key) { 
                console.log('key='+key);
                console.log('value='+value);
            }); 

    console.log($scope.pages);
  };
    $scope.uname= "John";
    $scope.upass= "Doe";
    $scope.submit_form = function(formData) {
        angular.forEach(values, function (value, key) { 
               
            });
        $scope.formData = formData;

        console.log(formData); // object
        console.log(JSON.stringify(formData)); // string

        $scope.form = {}; // clear ng-model form

    };
    $scope.show_page('preloader');
});
</script>

</body>
</html>
