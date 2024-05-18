<!DOCTYPE html>
<?php

$murl = base_url('/view29/');




?>
<html>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="assets/js/plugins/splide/splide.min.js"></script>
    <!-- ProgressBar js -->
    <script src="assets/js/plugins/progressbar-js/progressbar.min.js"></script>
    <!-- Base Js File -->
    
    <style>
      .tabset>input[type="radio"] {
        position: absolute;
        left: -200vw;
      }

      .tabset .tab-panel {
        display: none;
      }
      .tabset{
          margin-top: 80px;
      }

      .tabset>input:first-child:checked~.tab-panels>.tab-panel:first-child,
      .tabset>input:nth-child(3):checked~.tab-panels>.tab-panel:nth-child(2),
      .tabset>input:nth-child(5):checked~.tab-panels>.tab-panel:nth-child(3),
      .tabset>input:nth-child(7):checked~.tab-panels>.tab-panel:nth-child(4),
      .tabset>input:nth-child(9):checked~.tab-panels>.tab-panel:nth-child(5),
      .tabset>input:nth-child(11):checked~.tab-panels>.tab-panel:nth-child(6) {
        display: block;
      }

      .card_1 {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-around;
        padding: 10px 10px;
        border-bottom: 1px solid #ebebeb;
        border-top: 1px solid #ebebeb
      }

      .tabset>label {
        position: relative;
        display: inline-block;
        padding: 12px 12px 12px;
        border: 1px solid transparent;
        border-bottom: 0;
        cursor: pointer;
        font-weight: 500;
      }

      input:focus-visible+label {
        outline: 2px solid rgba(0, 102, 204, 1);
        border-radius: 3px;
      }

      .tabset>label:hover,
      .tabset>input:focus+label,
      .tabset>input:checked+label {
        color: #fff;
        background: #a52a2a;
      }

      .tabset>label:hover::after,
      .tabset>input:focus+label::after,
      .tabset>input:checked+label::after {
        background: #06c;
      }

      .tabset>input:checked+label {
        border-color: #000;
        border-bottom: 1px solid #fff;
        margin-bottom: -1px;
      }

      .tab-panel {
        padding: 30px 0;
        border-top: 1px solid #ccc;
      }

      .w_30 {
        display: flex;
        flex-direction: column;
        gap: 9px;
      }

      * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }

      .tab-panel p {
        font-size: 14px;
        padding-top: 4px;
      }
p{
    margin:0;
}
b{
      	font-weight: 700;
      	font-size:20px;
      }

      .my_btn {
        padding: 6px 16px;
        background: #fff;
        border: 1px solid #ccc;
        border-radius: 23PX;
      }

      .w_20 .fa-arrow-right {
        rotate: -44deg;
        font-size: 20px;
        font-weight: 300;
        color: #c83f3f;
      }

      .myy_arrow1 {
        rotate: -44deg;
        font-size: 20px;
        font-weight: 300;
        color: #c83f3f;
      }

      .myy_arrow {
        rotate: 44deg !important;
        font-size: 20px;
        font-weight: 300;
        color: green !important;
      }

      .tabset label {
        width: 31% !important;
      }
    
    #cashInOut{
            text-align: center;
            height: 100vh;
    display: flex;
    justify-content: center;
    }
    .bg-primary{
        background:brown !important;
    }
    .my_class{
        
    width: 24.5%;
    }
.detail_container {
    padding: 20px;
    background:mintcream;
    display: flex;
    border-radius: 10px;
    align-items: center;
    border: 1px solid #ebebeb;
    justify-content: start;
    gap: 15px;
    box-shadow: 0px 0px 5px #9e9e9e0a;
    margin-bottom: 3px;
}
        .img_box a {
            cursor:pointer;
            font-size:16px;
            color:#000 !important;
        }
        .details_section{
    justify-content: center;
        }
        .detail_container img{
            width:60px;
            height:60px;
            object-fit:cover;
            border-radius:50%;
        }
        @media (max-width:768px){
            .my_class{
                width:24.5% !important;
            }
              .img_box a {
            cursor:pointer;
            font-size:13px;
        }
        }
        @media (max-width:576px){
            .my_class{
                width:33% !important;
            }
        }
        @media (max-width:597px){
            .my_class{
                padding:10px;
            }
        }
        @media (max-width:386px){
            .my_class{
                padding:10px 0px;
            }
        }
          .detail_container img{
            width:50px;
            height:50px;
            object-fit:cover;
            border-radius:50%;
        }
        }
     
             
          
        
        
    </style>
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

    <div class="exp_detail" ng-if="ipages.expense_detail">
         <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">{{exp_detail}}</div>
        <div class="right"> 
            <a ng-click="logout_shift()" style="cursor:pointer;color:white;">Logout</a>
        </div>
    </div>
            
            <div id="expense_details" style="margin-top: 77px;" ng-if="ipages.expense_detail">
        
        <div class="wide-block pt-2 pb-2">

            <div class="row">
                <form method="post">
                    <div class="form-group">
                        <input type="text"  placeholder="Expense Amount" ng-model="add_exp.amount"  class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea  placeholder="Expese Details" class="form-control" ng-model="add_exp.reason"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" ng-disabled="!add_exp.amount" ng-click="send_expense()">Add</button>
                    </div>
                    
                </form>
                </div>

            </div>
    </div>
            
       <div class="appBottomMenu">
        <a ng-click="show_page('exp_types')" class="item">
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
    </div>
    <div class="exp_detail" ng-if="ipages.exp_staff">
         <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">{{exp_detail}}</div>
        <div class="right"> 
            <a ng-click="logout_shift()" style="cursor:pointer;color:white;">Logout</a>
        </div>
    </div>
            <div class="container-fluid">
            <div id="expense_details d-flex flex-wrap" style="margin-top: 77px;" ng-if="ipages.exp_staff">
        
        <div class="col-lg-3 col-md-6 col-sm-12 col-12 detail_container" ng-repeat="data in detail.staff_list" ng-click="add_exp.staff_id= data.d_id;show_page('expense_detail')"> 
                        <div class=" img_box">
                            <img src='<?= base_url('/'); ?>/assets/uploads/{{ data.d_file }}'>
                            </div>
                            <div class=" img_box">
                            <div><a ng-click="showExpense(data.st_id)">{{data.d_name}}</a></div>


                            </div>
                    </div>
    </div>
           </div> 
       <div class="appBottomMenu">
        <a ng-click="show_page('exp_types')" class="item">
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
    </div>
    <!--Expense staff-->
<div id="exp_types" ng-if="pages.app_page">
    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">{{ptit}}</div>
        <div class="right"> 
            <a ng-click="logout_shift()" style="cursor:pointer;color:white;">Logout</a>
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    
    <div id="appCapsule" ng-if="ipages.exp_types">
        
        <div class="wide-block pt-2 pb-2">

                <div class="row justify-content-between">
                    <div class=" flex-sm-column flex-column my_class detail_container" ng-repeat="data in detail.ofc_exp" ng-click="showExpense(data.st_id)"> 
                        <div class=" img_box">
                            <img src='<?= base_url('/'); ?>{{ data.exp_img }}'>
                            </div>
                            <div class=" img_box">
                            <div class="text-center"><a >{{data.type_name}}</a></div>


                            </div>
                    </div>
         
                </div>

            </div>
    </div>
    <!-- * App Capsule -->

    <!-- cashin out -->
    
    <div id="cashInOut" ng-if="ipages.cashio">
        
    <div ng-if="!cash_form.type">
        
        
        <p>Choose Cash Type</p>
        <button ng-click="setCashType(1)" class="btn btn-success cash_btn">Cash IN</button>
        <button ng-click="setCashType(2)" class="btn btn-success cash_btn">Cash OUT</button>
    </div>
    <div ng-if="cash_form.type">
        <div class="form-group">
            <input type="text" placeholder="Enter Amount" class="form-control cashIn_filed" ng-model="cash_form.amount"/>
        </div>
        <div class="form-group">
            <textarea class="form-control cashIn_filed" placeholder="Add Reason" ng-model="cash_form.reason"></textarea>
        </div>
        <button class="btn btn-primary" ng-click="sendCash()">Submit</button>
    </div>
</div>


    <!-- * Cash in out -->

    <!-- Ledger -->
    
    <div id="cashInOut" ng-if="ipages.ledger">
        <!--<h1 class="cblc">{{ detail.cblc}}</h1>-->
        <!--<div>-->
        <!--    Detail-->
        <!--    <ul>-->
        <!--        <li ng-repeat="records in detail.ledger ">-->
        <!--            <span>{{records.name}}-{{records.type}}</span>{{records.amount}}-->
        <!--        </li>-->
        <!--    </ul>-->
        <!--</div>-->

        <div class="container-fluid">
      <div class="tabset">
        <input type="radio" name="tabset" id="tab1" aria-controls="marzen" checked>
        <label for="tab1">All</label>
        <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier">
        <label for="tab2">
          <i class="fa-solid fa-arrow-right myy_arrow1" style="margin-right:5px;"></i>Send </label>
        <input type="radio" name="tabset" id="tab3" aria-controls="dunkles">
        <label for="tab3">
          <i class="fa-solid fa-arrow-right myy_arrow" style="margin-right:5px;"></i>Received </label>
        <div class="tab-panels">

          <section id="marzen" class="tab-panel">
            <h1>{{ detail.cblc}}</h1>
            
              
              
              
            <div class="card_1" ng-repeat="records in detail.ledger ">
              <div class="w_20">
                  
                        <i ng-if="records.type == 'minus'" class="fa-solid fa-arrow-right myy_arrow1" style="margin-right:5px;"></i>
                        <i ng-if="records.type == 'add'" class="fa-solid fa-arrow-right myy_arrow" style="margin-right:5px;"></i>
                  
                
              </div>
              <div class="w_100 text-left">
                <b>Rs {{records.amount}}</b>
                <p>{{records.name}}</p>
                <p><span ng-if="records.type == 'minus'">-</span><span ng-if="records.type == 'add'">+</span> {</p>
               
              </div>
            </div>
            
            
            
            
          </section>
          <section id="rauchbier" class="tab-panel">
            <h1>{{ detail.cblc}}</h1>
            <div class="card_1" ng-if="records.type == 'minus'" ng-repeat="records in detail.ledger ">
              <div class="w_20">
                  <i ng-if="records.type == 'minus'" class="fa-solid fa-arrow-right myy_arrow1" style="margin-right:5px;"></i>
               
              </div>
        <div class="w_50 text-left">
                <b>Rs {{records.amount}}</b>
                <p>{{records.name}}</p>
                <p> <span ng-if="records.type == 'minus'">-</span></p>
               
              </div>
              <div class="w_30">
                <button class="my_btn">
                  <i class="fa-solid fa-receipt"></i> Receipt </button>
                
              </div>
            </div>
          </section>
          <section id="dunkles" class="tab-panel">
            <h1>{{ detail.cblc}}</h1>
            <div class="card_1"  ng-if="records.type == 'add'" ng-repeat="records in detail.ledger ">
              <div class="w_20">
                <i ng-if="records.type == 'add'" class="fa-solid fa-arrow-right myy_arrow" style="margin-right:5px;"></i>
              </div>
             <div class="w_100 text-left">
                <b>Rs {{records.amount}}</b>
                <p>{{records.name}}</p>
                <p> <span ng-if="records.type == 'add'">+</span></p>
               
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    
    </div>


    <!-- * Cash in out -->

    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a ng-click="show_page('exp_types')" class="item">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
            </div>
        </a>
        <a ng-click="show_page('cashio')" class="item">
            <div class="col">
                <ion-icon name="cube-outline"></ion-icon>
            </div>
        </a>
        <a ng-click="get_detail();show_page('ledger')" class="item">
            <div class="col">
                <ion-icon name="layers-outline"></ion-icon>
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
    
</div>
<?php 
$shift_user_id  = null;
if(isset($_SESSION['track'])){
 
    $shift_user_id = $_SESSION['track'];
    // Echo the session data as a JavaScript variable
    echo "<script>var shiftUserId = $shift_user_id </script>";
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js" integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  var BASE_URL = '<?= base_url('shift/'); ?>';
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope,$http) {
    
     var session_data = <?= isset($shift_user_id) ? $shift_user_id : 'null' ?>;
    
     var shiftUserId;

    // Check if session data exists and assign it to shiftUserId
    if(session_data !== null) {
        shiftUserId = session_data;
    }
    
    
  $scope.pages = {
    'preloader':1,
    'login':0,
    'oblc':0,
    'app_page':0,
    
  };
  $scope.cash_form = {
    'type': '',
    'amount': '',
    'reason': '',
  };
  $scope.send_cash= function()
  {
    $scope.ipages.preloader = 1;
    var url = BASE_URL + 'cashio';
      var data =  $scope.cash_form ; 
      console.log(data);
      alert(data);
      var config = {}; // You can configure headers or other options here if needed
      
      $http.post(url, data, config).then(function(response) {
        if(response.data){
            
                $scope.ipages.preloader = 0;
                $scope.cash_form.type = '';
                $scope.cash_form.reason = '';
                $scope.cash_form.amount = 0;
                $scope.show_page('exp_types');
        }
  });
  }
  
     
    
    
  $scope.ptit = '';
  $scope.ipages = {
    'preloader':1,
    'login':0,
    'oblc':0,
    'cashio':0,
    'ledger':0,
    'exp_staff':0,
    'exp_types':0,
    'expense_detail':0,
  };
  $scope.title = {
    'preloader':1,
    'login':0,
    'oblc':0,
    'exp_types':'Office expense',
    'exp_detail':'Expense Details',
  };
  
  
  
  $scope.pages.preloader = 0;
  $scope.pages.login = 1;
    
    
      
   


    $scope.detail= {};
  $scope.get_detail = function()
  {
      
      var url = BASE_URL+'detail', data = {} ,config='contenttype';
        $scope.detail = [];
        $http.get(url, data, config).then(function (response) {
                            
                $scope.detail =   response.data;
                
        });
      
  };
  $scope.show_page = function(id)
  {
      $scope.pages.app_page = 1;
    angular.forEach($scope.ipages, function (value, key) { 
                if(key == id)
                {
                  $scope.ipages[key] = 1;
                  $scope.ptit = $scope.title[key];
                }
                else
                {
                  $scope.ipages[key] = 0;
                }
            });

    
  };
    $scope.add_expense = {};  
  $scope.send_expense = function(){
    $scope.ipages.preloader = 1;
      
      var url = BASE_URL + 'expense_detail';
      var data =  $scope.add_exp ; 
      console.log(data);
      alert(data);
      var config = {}; // You can configure headers or other options here if needed
      
      $http.post(url, data, config).then(function(response) {
        if(response.data){
            
                $scope.ipages.preloader = 0;
                $scope.add_exp.exp_id = 0;
                $scope.add_exp.reason = '';
                $scope.add_exp.staff_id = 0;
                $scope.show_page('exp_types');
        }
        
      }).catch(function(error) {
        console.error('Error occurred:', error); // Log any errors
      });
      
  }
  $scope.add_exp = {
    'exp_id' : 0,
    'reason' : '',
    'staff_id': 0,
    'amount': 0,
  };
  
  
  // Initialize cash_form object
    $scope.cash_form = {};

    // Function to set cash type
    $scope.setCashType = function(type) {
        $scope.cash_form.type = type;
    };
    
    // Function to send cash
    $scope.sendCash = function() {
        // Send AJAX request
        $http.post(BASE_URL + 'manage_cash', $scope.cash_form)
            .then(function(response) {
                
                if(response.data == 'success'){
                    
                    $('.cashIn_filed').val('');
                }
                
            }, function(error) {
                // Error callback
                console.error(error); // Log error
                // Handle error or show error message to user
            });
    };
  
  
  
  
   $scope.showExpense = function(st_id) {
    $scope.add_exp.exp_id = st_id;
       if(st_id == 23)
       {
        $scope.show_page('exp_staff');
        return 0;
       }
      var url = BASE_URL + 'expense_page';
      var data = { st_id: st_id }; // Construct data object with st_id
      var config = {}; // You can configure headers or other options here if needed
      
      $http.get(url, { params: data }, config).then(function(response) {
        if(response.data){

            
                $scope.show_page('expense_detail');
        }
        
      }).catch(function(error) {
        console.error('Error occurred:', error); // Log any errors
      });
    };
     
if(typeof shiftUserId !== 'undefined') {
        // If session variable exists, navigate to appropriate page
        $scope.pages.app_page = 1;
        $scope.pages.login = 0;
        $scope.show_page('exp_types');
        $scope.get_detail();
        $scope.pages.oblc = 0;
        $scope.pages.expense_detail = 0;
        
    } else {
        // If session variable doesn't exist, show the login page
        $scope.pages.login = 1;
        $scope.pages.preloader = 0;
        $scope.pages.app_page = 0;
        $scope.pages.expense_detail = 0;
        
    }
    
    
    
  $scope.logout_shift = function() {
    var url = BASE_URL + 'logout';
    var data = {}; // Empty object = 0;
    var config = 'contenttype';

    $http.post(url, data, config)
        .then(function(response) {
            
            if (response.data == "logout") { 
                $scope.pages.preloader = 0;
                $scope.pages.oblc = 0;
                $scope.pages.exp_types = 0;
                $scope.pages.app_page = 0;
                $scope.pages.login = 1;
                $scope.pages.expense_detail = 0;
                
            }
        })
        .catch(function(error) {
            $scope.pages.preloader = 0;
            $scope.pages.exp_types = 1;
            $scope.pages.oblc = 0;
            // Handle error here
        });
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
            if(response == "success");   {
                $scope.pages.preloader = 0;
                $scope.pages.oblc = 0;
                $scope.get_detail();
                $scope.show_page('exp_types');
        }
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
    
    var url = BASE_URL + 'login';
    var data = $scope.insert;
    var config = { 'Content-Type': '*' };
    

    $http.post(url, data, config)
        .then(function(response) {
            response = response.data;
            
            
            
            if (!response.status) {
                $scope.login_error = response.msg;
                $scope.pages.login = 1;
                $scope.pages.preloader = 0;
            } else {
                // Check status and navigate accordingly
                switch (response.status) {
                    case 1:
                        // Status is 1, navigate to oblc page
                        $scope.pages.oblc = 1;
                        $scope.pages.login = 0;
                    
                                    
                        break;
                    case 3:
                        
                        $scope.pages.login = 0;
                        $scope.show_page('exp_types');
                        $scope.get_detail();

                        break;
                    default:
                        // For other cases, show login error
                        $scope.login_error = "Invalid details";
                        $scope.pages.login = 1;
                        break;
                }
                $scope.pages.preloader = 0; 
            }
        })
        .catch(function(response) {
            // Error handling, show login page
            $scope.pages.login = 1;
            $scope.pages.preloader = 0;
        });
};




    // $scope.pages.login = 1;
    // $scope.show_page();
});
</script>

</body>
</html>
