<?php
   if(!isset($this->session->userdata['session_data'])) {
     $url=base_url().'login';
     header("location: $url");
   }
   ?>
<?php
    $url = base_url('/inspinia').'/';
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php 
         $data = sitedata();
         $total_segments = $this->uri->total_segments(); 
         echo ucwords(str_replace('_', ' ', $this->uri->segment(1))).' | '.output($data['s_companyname']) ?></title>

    <link href="<?= $url ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $url ?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?= $url ?>css/animate.css" rel="stylesheet">
    <link href="<?= $url ?>css/style.css" rel="stylesheet">
    <style type="text/css">
        .modal{
            position: absolute !important;
        }
        .profile-user-img {
    border: 3px solid #adb5bd;
    margin: 0 auto;
    padding: 3px;
    width: 100px;
}
    </style>

</head>

<body>
    <div id="wrapper">
    