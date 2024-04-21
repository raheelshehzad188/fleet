<?php
$url = base_url('/inspinia').'/';
?>
<?php 
if($this->config->item('company_name')!=='')
{
  $company_name =  $this->config->item('company_name');
} else {
  $company_name = 'Vechicle Management';
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Log in</title>

    <link href="<?= $url ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?= $url ?>css/animate.css" rel="stylesheet">
    <link href="<?= $url ?>css/style.css" rel="stylesheet">

</head>

<body class="body_bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 formbox">
                <div class="ibox-content">
                  <div class="row">
                    <div class="logo_box">
                        <a href="#"><img src="https://fleet.quickon.pk/assets/uploads/logo.jpg" alt=""></a>
                    </div>
                     <?php $successMessage = $this->session->flashdata('successmessage');  
                           $warningmessage = $this->session->flashdata('warningmessage');                    
                      if (isset($successMessage)) { 
                        unset($_SESSION['successmessage']);
                        echo '<div id="alertmessage" class="col-md-12">
                          <div class="alert alert-success alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                   '. output($successMessage).'
                                  </div>
                          </div>'; } 
                      if (isset($warningmessage)) {
                         unset($_SESSION['warningmessage']);
                       echo '<div id="alertmessage" class="col-md-12">
                          <div class="alert alert-warning alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                   '. output($warningmessage).'
                                  </div>
                          </div>'; }    
                      ?>
                </div>
                    <form action="<?= base_url().'login/login_action'; ?>" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" name="username" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required="">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                        <div class="row">
                            <div class="col-sm-5">
                            <a href="#">
                                Forgot password?
                            </a>        
                            </div>
                            <div class="col-sm-7">
                                <p>Do not have an account?</p>
                            </div>
                        </div>
                        

                        <!-- <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a> -->
                    </form>
                    <!-- <p class="m-t">
                        <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
                    </p> -->
                </div>
            </div>
            <div class="col-sm-3"></div>

            <!-- <div class="col-md-6">
                <h2 class="font-bold">Welcome to IN+</h2>

                <p>
                    Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                </p>

                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>

                <p>
                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>

                <p>
                    <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
                </p>

            </div> -->
            
        </div>
        <!-- <div class="row">
            <div class="col-md-6">
                Copyright Example Company
            </div>
            <div class="col-md-6 text-right">
               <small>© 2014-2015</small>
            </div>
        </div> -->
    </div>

</body>

</html>
