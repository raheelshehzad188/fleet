<?php
    $url = base_url('/inspinia').'/';
?>
<?php  
   function activate_menu($controller) {
     $CI = get_instance();
     $last = $CI->uri->total_segments();
     $seg = $CI->uri->segment($last);
     if(is_numeric($seg)) {
       $seg = $CI->uri->segment($last-1);
     }
     if (in_array($controller, array($seg))) {
         return 'active';
     } else {
         return '';   
     } 
   }
   if(!isset($this->session->userdata['session_data'])) {
     $url=base_url().'login';
     header("location: $url");
   }
   ?>
<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?= $url ?>img/profile_small.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="<?= base_url(); ?>login/logout">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li class="nav-item <?php echo activate_menu('dashboard');?>">
               <a href="<?= base_url(); ?>dashboard" class="nav-link ">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                  </p>
               </a>
            </li>
            <?php if(userpermission('lr_vech_availablity')) { ?>
            <li class="nav-item  <?php echo activate_menu('vehicleavailablity');?>">
               <a href="<?= base_url(); ?>vehicleavailablity" class="nav-link ">
                  <i class="nav-icon fa fa-calendar" aria-hidden="true"></i>
                  <p>
                  Availability
                  </p>
               </a>
            </li>
               <?php } ?>
               <li class="<?php echo activate_menu('vehicle');?> <?php echo activate_menu('addvehicle');?><?php echo activate_menu('viewvehicle');?><?php echo activate_menu('editvehicle');?><?php echo activate_menu('vehiclegroup');?>">
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Vehicle's</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <?php if(userpermission('lr_vech_list')) { ?>
                        <li class="<?php echo activate_menu('vehicle');?><?php echo activate_menu('editvehicle');?><?php echo activate_menu('viewvehicle');?>"><a href="<?= base_url(); ?>vehicle">Vehicle List</a></li>
                        <?php } if(userpermission('lr_vech_add')) { ?>
                        <li class="<?php echo activate_menu('addvehicle');?>"><a href="<?= base_url(); ?>vehicle/addvehicle">Add Vehicle</a></li>
                        <?php } if(userpermission('lr_vech_group')) { ?>
                        <li class="<?php echo activate_menu('vehiclegroup');?>"><a href="<?= base_url(); ?>vehicle/vehiclegroup">Vehicle Group</a></li>
                    <?php } ?>
                    </ul>
                </li>
                <?php  if(userpermission('lr_settings')) { ?>
                    <li class="<?php echo activate_menu('websitesetting');?> <?php echo activate_menu('websitesetting_traccar');?><?php echo activate_menu('smtpconfig');?><?php echo activate_menu('email_template');?><?php echo activate_menu('edit_email_template');?>">
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Setting's</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <?php
                        if(userpermission('lr_settings'))
                        {
                            ?>
                        <li class="<?php echo activate_menu('websitesetting');?>">
                            <a href="<?= base_url(); ?>settings/websitesetting">General Settings</a>
                        </li>
                        <?php
                        }

                        ?>
                        <?php
                        if(userpermission('lr_settings'))
                        {
                            ?>
                        <li class="<?php echo activate_menu('smtpconfig');?>">
                             <a href="<?= base_url(); ?>settings/smtpconfig" >
                                <i class="nav-icon fas faa-plus"></i><p>SMTP Configuration</p>
                             </a>
                        </li>
                        <?php
                        }

                        ?>
                        <?php
                        if(userpermission('lr_settings'))
                        {
                            ?>
                        <li class="<?php echo activate_menu('email_template');?>">
                             <a href="<?= base_url(); ?>settings/email_template" >
                                <i class="nav-icon fas faa-plus"></i><p>Email Template</p>
                             </a>
                        </li>
                        <?php
                        }

                        ?>
                        <?php
                        if(userpermission('lr_settings'))
                        {
                            ?>
                        <li class="<?php echo activate_menu('websitesetting_traccar');?>">
                             <a href="<?= base_url(); ?>settings/websitesetting_traccar" >
                                <i class="nav-icon fas faa-plus"></i><p>Traccar Config</p>
                             </a>
                        </li>
                        <?php
                        }

                        ?>
                        
                    </ul>
                </li>

                <li class="<?php echo activate_menu('users');?> ">
                    <a href="index.html"><i class="fa fa-user"></i> <span class="nav-label">User's</span> <span class="fa arrow"></span></a>
               <ul class="nav nav-second-level">
                  <li class="<?php echo activate_menu('users');?> <?php echo activate_menu('edituser');?>">
                     <a href="<?= base_url(); ?>users">
                        <p>User Management</p>
                     </a>
                  </li>
                  <li class="<?php echo activate_menu('adduser');?>">
                     <a href="<?= base_url(); ?>users/adduser">
                        <p>Add User</p>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } ?>
            </ul>

        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
    
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="<?= $url ?>img/a7.jpg">
                                </a>
                                <div>
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="<?= $url ?>img/a4.jpg">
                                </a>
                                <div>
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="<?= $url ?>img/profile.jpg">
                                </a>
                                <div>
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="<?= base_url(); ?>login/logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
            </ul>

        </nav>