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
               <?php if(userpermission('lr_drivers_list') || userpermission('lr_drivers_add')) { ?>
            <li class="<?php echo activate_menu('drivers');?> <?php echo activate_menu('adddrivers');?><?php echo activate_menu('editdriver');?>">
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Staff's</span> <span class="fa arrow"></span></a>
               
               <ul class="nav nav-treeview">
                  <?php if(userpermission('lr_drivers_list')) { ?>
                  <li class="<?php echo activate_menu('drivers');?><?php echo activate_menu('editdriver');?>">
                     <a href="<?= base_url(); ?>drivers" >
                        Staff List
                     </a>
                  </li>
                  <?php } if(userpermission('lr_drivers_add')) { ?>
                  <li class="<?php echo activate_menu('adddrivers');?>">
                     <a href="<?= base_url(); ?>drivers/adddrivers">
                        Add Staff
                     </a>
                  </li>
                  <?php } if(userpermission('lr_drivers_add')) { ?>
                  <li class="<?php echo activate_menu('staff_salary');?>">
                     <a href="<?= base_url(); ?>drivers/salaries">
                        Staff Salary
                     </a>
                  </li>
                  <?php } if(userpermission('lr_drivers_add')) { ?>
                  <li class="<?php echo activate_menu('add_salary');?>">
                     <a href="<?= base_url(); ?>drivers/attendence">
                        Attendence
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
            <?php } ?>
                 <?php /*if(userpermission('lr_drivers_list') || userpermission('lr_drivers_add')) { ?>
            <li class="<?php echo activate_menu('category');?> <?php echo activate_menu('addcategory');?><?php echo activate_menu('editrole');?>">
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Category</span> <span class="fa arrow"></span></a>
               
               <ul class="nav nav-treeview">
                  <?php if(userpermission('lr_drivers_list')) { ?>
                  <li class="<?php echo activate_menu('category');?><?php echo activate_menu('editcategory');?>">
                     <a href="<?= base_url(); ?>category" >
                         Category List
                     </a>
                  </li>
                  <?php } if(userpermission('lr_drivers_add')) { ?>
                  <li class="<?php echo activate_menu('addcategory');?>">
                     <a href="<?= base_url(); ?>category/addcategory">
                        Add Category
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
            <?php } */?>
            <?php if(userpermission('lr_cust_list') || userpermission('lr_cust_add')) { ?>
            <li class="nav-item <?=activate_menu('addcustomer') ?><?= activate_menu('editcustomer')?><?= activate_menu('customer')?>">
               <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Customer</span> <span class="fa arrow"></span></a>
               <ul class="nav nav-treeview">
                <?php  if(userpermission('lr_cust_list')) { ?>
                  <li class=" <?php echo activate_menu('customer');?><?php echo activate_menu('editcustomer');?>">
                     <a href="<?= base_url(); ?>customer">
                        <p>Customer Management</p>
                     </a>
                  </li>
                  <?php } if(userpermission('lr_cust_add')) { ?>
                  <li class="nav-item <?php echo activate_menu('addcustomer');?>">
                     <a href="<?= base_url(); ?>customer/addcustomer">
                        <p>Add Customer</p>
                     </a>
                  </li>
                   <?php } ?>
               </ul>
            </li>
            <?php } ?>
            <?php if(userpermission('lr_trips_list') || userpermission('lr_trips_list_view')) { ?>
            <li class="<?php echo activate_menu('trips') ?> <?= activate_menu('addtrips') ?><?= activate_menu('edittrip') ?><?= activate_menu('details') ?>">
               <a href="#"><i class="fa fa-road"></i> <span class="nav-label">Vouchers</span> <span class="fa arrow"></span></a>
               <ul class="nav nav-treeview">
                  <?php if(userpermission('lr_trips_list')) { ?>
                  <li class="nav-item <?php echo activate_menu('trips');?><?php echo activate_menu('edittrip');?><?php echo activate_menu('details');?>">
                     <a href="<?= base_url(); ?>trips">
                        <p>Voucher List</p>
                     </a>
                  </li>
                  <li>
                      <a href="<?= base_url('trips/exp_type'); ?>">
                          Expense Types
                      </a>
                  </li>
                  <li>
                      <a href="<?= base_url('trips/routes'); ?>">
                          Routes
                      </a>
                  </li>
                  <li>
                      <a href="<?= base_url('trips/pump'); ?>">
                          Pumps
                      </a>
                  </li>
                  <?php } if(userpermission('lr_trips_add')) { ?>
                  <li class="nav-item <?php echo activate_menu('addtrips');?>">
                     <a href="<?= base_url(); ?>trips/addtrips">
                        <p>Add Voucher</p>
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
           <?php } ?>
               <li class="<?php echo activate_menu('vehicle');?> <?php echo activate_menu('addvehicle');?><?php echo activate_menu('viewvehicle');?><?php echo activate_menu('editvehicle');?><?php echo activate_menu('vehiclegroup');?><?php echo activate_menu('addvehiclegroup');?>">
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Vehicle's</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <?php if(userpermission('lr_vech_list')) { ?>
                        <li class="<?php echo activate_menu('vehicle');?><?php echo activate_menu('editvehicle');?><?php echo activate_menu('viewvehicle');?>"><a href="<?= base_url(); ?>vehicle">Vehicle List</a></li>
                        <?php } if(userpermission('lr_vech_add')) { ?>
                        <li class="<?php echo activate_menu('addvehicle');?>"><a href="<?= base_url(); ?>vehicle/addvehicle">Add Vehicle</a></li>
                        <?php } if(userpermission('lr_vech_group')) { ?>
                        <li class="<?php echo activate_menu('vehiclegroup');?>"><a href="<?= base_url(); ?>vehicle/vehiclegroup">Vehicle Group List</a></li>
                      <?php } if(userpermission('lr_vech_group')) { ?>
                        <li class="<?php echo activate_menu('addvehiclegroup');?>"><a href="<?= base_url(); ?>vehicle/addvehiclegroup">Add Vehicle Group</a></li>
                    <?php } ?>
                    </ul>
                </li>
                <li class="<?php echo activate_menu('tyres');?> <?php echo activate_menu('addtyres');?><?php echo activate_menu('viewtyres');?><?php echo activate_menu('edittyres');?><?php echo activate_menu('tyresgroup');?><?php echo activate_menu('addtyresgroup');?>">
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Tyres</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <?php if(userpermission('lr_vech_list')) { ?>
                        <li class="<?php echo activate_menu('tyres');?><?php echo activate_menu('edittyres');?><?php echo activate_menu('viewtyres');?>"><a href="<?= base_url(); ?>tyres">Tyres List</a></li>
                        <?php } if(userpermission('lr_vech_add')) { ?>
                        <li class="<?php echo activate_menu('addtyres');?>"><a href="<?= base_url(); ?>tyres/addtyres">Add tyres</a></li>
                        <?php } /*if(userpermission('lr_vech_group')) { ?>
                        <li class="<?php echo activate_menu('tyresgroup');?>"><a href="<?= base_url(); ?>tyres/tyresgroup">tyres Group List</a></li>
                      <?php } if(userpermission('lr_vech_group')) { ?>
                        <li class="<?php echo activate_menu('addtyresgroup');?>"><a href="<?= base_url(); ?>tyres/addtyresgroup">Add tyres Group</a></li>
                    <?php } */?>
                    </ul>
                </li>
                
                <li class="<?php echo activate_menu('shiftmanager');?> <?php echo activate_menu('add_shift_manager');?><?php echo activate_menu('view_shift_manager');?><?php echo activate_menu('edit_shift_manager');?><?php echo activate_menu('shift_log');?><?php echo activate_menu('vehiclegroup');?><?php echo activate_menu('addvehiclegroup');?>">
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Shift Manager</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="<?php echo activate_menu('tyres');?><?php echo activate_menu('shift_log');?>"><a href="<?= base_url(); ?>shift/shift_log">Shift Log</a></li>
                        <?php if(userpermission('lr_shift_manager')) { ?>
                        <li class="<?php echo activate_menu('add_shift_manager');?>"><a href="<?= base_url(); ?>shiftmanager/add_shift_manager">Add Shift Manager</a></li>
                        <?php } ?>
                    </ul>
                </li>
                <?php  if(userpermission('lr_settings')) { ?>
                    <li class="<?php echo activate_menu('websitesetting');?> <?php echo activate_menu('websitesetting_traccar');?><?php echo activate_menu('smtpconfig');?><?php echo activate_menu('email_template');?><?php echo activate_menu('edit_email_template');?> <?php echo (isset($detail['tbl']))?'active':'';?>">
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Setting's</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <?php
                        if(userpermission('lr_settings'))
                        {
                            $ci =& get_instance();
                            $crud = $ci->db->where('hide_side',0)->get('crud_detail')->result_array();
                            foreach ($crud as $key => $value) {
                                ?>
                                    <li class="<?php echo (isset($detail['tbl']) && $detail['tbl'] == $value['tbl'])?'active':'';?>">
                            <a href="<?= base_url(); ?>settings/crud/<?= $value['tbl'] ?>"><?= $value['pul'] ?></a>
                        </li>
                                <?php
                            }

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
                    </ul>
                </li>

                <li class="<?php echo activate_menu('users');?> ">
                    <a href="#"><i class="fa fa-user"></i> <span class="nav-label">User's</span> <span class="fa arrow"></span></a>
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
            <li class="<?php echo activate_menu('backup');?> ">
                    <a href="<?= base_url(); ?>backups"><i class="fa fa-database"></i> <span class="nav-label">Backup</span></a>
               
            </li>
            <?php } ?>
            
            </ul>

        </div>
    </nav>