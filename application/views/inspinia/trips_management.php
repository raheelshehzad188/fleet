    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Bookings
            </h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
    <div class="card">

        <div class="card-body p-0">
          

         <div class="table-responsive">
          <div class="ibox-content">
                    <table id="triptbl" class="table card-table table-vcenter text-nowrap">
                      <thead>
                        <tr>
                          <th class="w-1">S.No</th>
                          <th>Customer</th>
                          <th>Vechicle</th>
                          <th>Date</th>
                          <th>Driver</th>
                           <?php if(userpermission('lr_trips_list_edit') || userpermission('lr_booking_del')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php if(!empty($triplist)){ 
                           $count=1;
                           foreach($triplist as $triplists){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                           <td> <?php echo ucfirst($triplists['t_customer_details']->c_name); ?></td>
                           <td> <?php echo output($triplists['t_vechicle_details']->v_name); ?></td>
                           <td><?php echo ucfirst(date(datetimeformat(), strtotime($triplists['t_start_date']))).'<br> to <br>'.ucfirst(date(datetimeformat(), strtotime($triplists['t_end_date']))); ?></td>

                           <td><?= (isset($triplists['t_driver_details']->d_name))?$triplists['t_driver_details']->d_name:'<span class="badge badge-danger">Yet to Assign</span>'; ?></td>
                             <?php if(userpermission('lr_trips_list_edit')) { ?>
                               <td>
                            <a class="icon" href="<?php echo base_url(); ?>trips/edittrip/<?php echo output($triplists['t_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a> | 
                            <a class="icon" href="<?php echo base_url(); ?>trips/details/<?php echo output($triplists['t_id']); ?>">
                              <i class="fa fa-eye"></i>
                            </a>
                            <?php  } if(userpermission('lr_booking_del')) { ?> |
                              <a data-toggle="modal" href="" onclick="confirmation('<?php echo base_url(); ?>trips/deletetrip','<?= output($triplists['t_id']); ?>')" data-target="#deleteconfirm" class="icon text-danger" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
                           </a> 
                           <?php } ?>
                          </td>
                          <?php } ?>
                        </tr>
                        <?php  } ?>
                      </tbody>
                    </table>
                   
        </div>         
        </div>
        <!-- /.card-body -->
      </div>
      </div>
      
             </div>
    </section>
    <!-- /.content -->



