<!DOCTYPE html>
<?php
$murl = base_url('/view29/');
?>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="<?= base_url(); ?>shift.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Mobilekit Mobile UI Kit</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 5, mobile template, cordova, phonegap, mobile, html" />
    <link rel="stylesheet" href="<?= $murl ?>assets/css/style.css">
    <link rel="manifest" href="<?= $murl ?>__manifest.json">
<body>

<div ng-app="myApp" ng-controller="myCtrl">
    <!-- loader -->
    <div id="loader" ng-if="pages.preloader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->


    <!-- App Capsule -->
    <div id="appCapsule" class="pt-0" ng-if="pages.login">

        <div class="login-form mt-1">
            <div class="section">
                <img src="<?= $murl ?>assets/img/sample/photo/vector4.png" alt="image" class="form-image">
            </div>
            <div class="section mt-1">
                <h1>Get started</h1>
                <h4>Fill the form to log in</h4>
            </div>
            <div class="section mt-1 mb-5">
                <form ng-submit="submit_form(form)" >
                    <div class="alert alert-danger" ng-if="login_error"  role="alert">
  {{login_error}}
</div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" ng-model="insert.uname" name ="uname">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"  name ="upass"  ng-model="insert.upass">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-links mt-2">
                        <div>
                            <a href="page-register.html">Register Now</a>
                        </div>
                        <div><a href="page-forgot-password.html" class="text-muted">Forgot Password?</a></div>
                    </div>

                    <div class="form-button-group">
                        <button type="submit" class="btn btn-primary btn-block btn-lg" ng-disabled="!insert.uname || !insert.upass">Log in</button>
                    </div>

                </form>
            </div>
        </div>


    </div>
    <!-- * App Capsule -->
    <!-- App Capsule -->
    <div id="appCapsule" ng-if="pages.oblc">

        <div class="login-form mt-5 pe-2 ps-2">
            <div class="section">
                <img src="<?= $murl ?>assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged rounded w86">
            </div>
            <div class="section mt-3">
                <h2>Julian Gruber</h2>
            </div>
            <div class="section mt-3 mb-5">
                <form ng-submit="oblc_form(form)">

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Opening Balance Amount" ng-model="insert_balance.oblc" name ="oblc">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-button-group">
                        <button type="submit"  class="btn btn-primary btn-block btn-lg">Sign in</button>
                    </div>

                </form>
            </div>
        </div>


    </div>
    <!-- * App Capsule -->
<div id="exp_types" ng-if="pages.exp_types">
    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Listview</div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="listview-title mt-2">Simple Listview</div>
        <ul class="listview simple-listview">
            <li>Item 1</li>
            <li>Item 2</li>
            <li>Item 3</li>
        </ul>

        <div class="listview-title mt-2">Link Listview</div>
        <ul class="listview link-listview">
            <li><a href="#">Link Item 1</a></li>
            <li>
                <a href="#">
                    Link Item 3
                    <span class="badge badge-primary">52</span>
                </a>
            </li>
            <li>
                <a href="#">
                    Link Item 3
                    <span class="text-muted">Edit</span>
                </a>
            </li>
        </ul>


        <div class="listview-title mt-2">Image Listview</div>
        <ul class="listview image-listview">
            <li>
                <div class="item">
                    <img src="assets/img/sample/avatar/avatar3.jpg" alt="image" class="image">
                    <div class="in">
                        <div>Edward Lindgren</div>
                        <span class="text-muted">Designer</span>
                    </div>
                </div>
            </li>
            <li>
                <div class="item">
                    <img src="assets/img/sample/avatar/avatar2.jpg" alt="image" class="image">
                    <div class="in">
                        <div>Emelda Scandroot</div>
                        <span class="badge badge-primary">3</span>
                    </div>
                </div>
            </li>
            <li>
                <div class="item">
                    <img src="assets/img/sample/avatar/avatar5.jpg" alt="image" class="image">
                    <div class="in">
                        <div>Henry Bove</div>
                    </div>
                </div>
            </li>
        </ul>

        <div class="listview-title mt-2">Image Link Listview</div>
        <ul class="listview image-listview">
            <li>
                <a href="#" class="item">
                    <img src="assets/img/sample/avatar/avatar3.jpg" alt="image" class="image">
                    <div class="in">
                        <div>Edward Lindgren</div>
                        <span class="text-muted">Designer</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <img src="assets/img/sample/avatar/avatar2.jpg" alt="image" class="image">
                    <div class="in">
                        <div>Emelda Scandroot</div>
                        <span class="badge badge-primary">3</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <img src="assets/img/sample/avatar/avatar5.jpg" alt="image" class="image">
                    <div class="in">
                        <div>Henry Bove</div>
                    </div>
                </a>
            </li>
        </ul>

        <div class="listview-title mt-2">Icon Listview</div>
        <ul class="listview image-listview">
            <li>
                <div class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="image-outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Photos</div>
                        <span class="badge badge-danger">10</span>
                    </div>
                </div>
            </li>
            <li>
                <div class="item">
                    <div class="icon-box bg-secondary">
                        <ion-icon name="videocam-outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Videos</div>
                        <span class="text-muted">None</span>
                    </div>
                </div>
            </li>
            <li>
                <div class="item">
                    <div class="icon-box bg-danger">
                        <ion-icon name="musical-notes-outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Music</div>
                    </div>
                </div>
            </li>
        </ul>

        <div class="listview-title mt-2">Icon Link Listview</div>
        <ul class="listview image-listview">
            <li>
                <a href="#" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="image-outline"></ion-icon>
                    </div>
                    <div class="in">
                        Photos
                        <span class="badge badge-danger">10</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="icon-box bg-secondary">
                        <ion-icon name="videocam-outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Videos</div>
                        <span class="text-muted">None</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="icon-box bg-danger">
                        <ion-icon name="musical-notes-outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Music</div>
                    </div>
                </a>
            </li>
        </ul>

        <div class="listview-title mt-2">Header & Footer</div>
        <ul class="listview image-listview">
            <li>
                <a href="#" class="item">
                    <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="image">
                    <div class="in">
                        <div>
                            <header>Name</header>
                            Juan Esteban Sarmiento
                            <footer>California</footer>
                        </div>
                        <span class="text-muted">Edit</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <img src="assets/img/sample/avatar/avatar7.jpg" alt="image" class="image">
                    <div class="in">
                        <div>
                            <header>Name</header>
                            Monica Ribeiro
                            <footer>Paris</footer>
                        </div>
                        <span class="text-muted">Edit</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <img src="assets/img/sample/avatar/avatar5.jpg" alt="image" class="image">
                    <div class="in">
                        <div>
                            <header>Name</header>
                            Gaspar Antunes
                            <footer>London</footer>
                        </div>
                        <span class="text-muted">Edit</span>
                    </div>
                </a>
            </li>
        </ul>

        <div class="listview-title mt-2">Only Text</div>
        <ul class="listview image-listview text">
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>Notifications</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>Settings</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>Update</div>
                        <span class="badge badge-primary">8</span>
                    </div>
                </a>
            </li>
        </ul>

        <div class="listview-title mt-2">Listview Divider</div>
        <ul class="listview image-listview text">
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>Notifications</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>Settings</div>
                    </div>
                </a>
            </li>
            <li class="divider-title">Divider Title</li>
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>Update</div>
                    </div>
                </a>
            </li>
        </ul>

        <div class="listview-title mt-2">Media Listview</div>
        <ul class="listview image-listview media">
            <li>
                <div class="item">
                    <div class="imageWrapper">
                        <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Birds
                            <div class="text-muted">62 photos</div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="item">
                    <div class="imageWrapper">
                        <img src="assets/img/sample/photo/2.jpg" alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Street Photos
                            <div class="text-muted">15 photos</div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="item">
                    <div class="imageWrapper">
                        <img src="assets/img/sample/photo/3.jpg" alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Dogs
                            <div class="text-muted">97 photos</div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

        <div class="listview-title mt-2">Media Link Listview</div>
        <ul class="listview image-listview media mb-2">
            <li>
                <a href="#" class="item">
                    <div class="imageWrapper">
                        <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Birds
                            <div class="text-muted">62 photos</div>
                        </div>
                        <span class="badge badge-primary">5</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="imageWrapper">
                        <img src="assets/img/sample/photo/2.jpg" alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Street Photos
                            <div class="text-muted">15 photos</div>
                        </div>
                        <span class="text-muted">Edit</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="imageWrapper">
                        <img src="assets/img/sample/photo/3.jpg" alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            Dogs
                            <div class="text-muted">97 photos</div>
                        </div>
                    </div>
                </a>
            </li>
        </ul>


    </div>
    <!-- * App Capsule -->

    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="index.html" class="item">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
            </div>
        </a>
        <a href="app-components.html" class="item">
            <div class="col">
                <ion-icon name="cube-outline"></ion-icon>
            </div>
        </a>
        <a href="page-chat.html" class="item">
            <div class="col">
                <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                <span class="badge badge-danger">5</span>
            </div>
        </a>
        <a href="app-pages.html" class="item">
            <div class="col">
                <ion-icon name="layers-outline"></ion-icon>
            </div>
        </a>
        <a href="#sidebarPanel" class="item" data-bs-toggle="offcanvas">
            <div class="col">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->
</div>
<div id="exp_types" ng-if="pages.exp_types1">
    Shaheer I will help you here
    <img src="https://assets.materialup.com/uploads/155e7e7e-962d-4ff1-869a-566f3ddddc3a/preview.png" />
    <img src="https://miro.medium.com/v2/resize:fit:1400/1*_YRie-rJC8LA_LB0I8tlMQ.png" />
    <img src="https://assets-global.website-files.com/5f16d69f1760cdba99c3ce6e/64a66075a3e6a143d0cc747c_7.png" />
    <a href="https://mobilekit.bragherstudio.com/view29/app-components.html">Test my imsgination</a>
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="assets/js/plugins/splide/splide.min.js"></script>
    <!-- ProgressBar js -->
    <script src="assets/js/plugins/progressbar-js/progressbar.min.js"></script>
    <!-- Base Js File -->

</div>

<script>
  var BASE_URL = '<?= base_url('shift/'); ?>'
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope,$http) {
  $scope.pages = {
    'preloader':1,
    'login':0,
    'oblc':0,
    'exp_types':0,
  };
  $scope.pages.preloader = 0;
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
    // $scope.uname= "";
    // $scope.upass= "";
    $scope.insert_balance = {};
    
    $scope.oblc_form = function(formData) {
        
    $scope.pages.preloader = 1;
    $scope.pages.login = 0;
    $scope.formData = formData;

        var url = BASE_URL+'shift_login', data = $scope.insert_balance ,config='contenttype';
        
        $http.post(url, data, config).then(function (response) {
        $scope.pages.preloader = 0;
        $scope.pages.oblc = 1;
        $scope.pages.exp_types = 0;
        console.log(response);
        
        }, function (response) {
        $scope.pages.preloader = 0;
        $scope.pages.exp_types = 0;
        $scope.pages.oblc = 1;
        // this function handles error
        
        });

    };
    $scope.insert = {};
    $scope.login_error = '';
    $scope.submit_form = function(formData) {
      $scope.pages.preloader = 1;
      $scope.pages.login = 0;
        $scope.formData = formData;

        var url = BASE_URL+'login', data = $scope.insert ,config='contenttype';

        $http.post(url, data, config).then(function (response) {
        response = response.data;
        if(!response.status){
            
        $scope.login_error = response.msg;
        $scope.pages.login = 1;
         $scope.pages.preloader = 0;
        }else{
        
        $scope.pages.oblc = 1;
        $scope.pages.preloader = 0;
        }


}, function (response) {

$scope.pages.login = 1;

});

    };

    // $scope.pages.login = 1;
    // $scope.show_page();
});
</script>

</body>
</html>
