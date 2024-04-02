 <style type="text/css">
   .nav > li > a {
     color: #000 !important; 
    font-weight: 600;
    padding: 10px 20px 10px 25px;
}
.tab-content{
  display: block;
}

 </style>
      
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Vehicle Details
            </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      
    <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <?php if($vehicledetails['v_file']!='') { ?>
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?= base_url(); ?>assets/uploads/<?= ucwords($vehicledetails['v_file']); ?>">
                </div>
                <?php } ?>
                <h3 class="profile-username text-center"><?= ucwords($vehicledetails['v_name']); ?></h3>

                <p class="text-muted text-center"><?= ucwords($vehicledetails['v_type']); ?></p>

                

                <p class="text-muted text-center"><?= ($vehicledetails['v_is_active']==1)?'<span class="right badge badge-success">Active</span>':'<span class="right badge badge-danger">Inactive</span>' ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Trips</b> <a class="float-right"><?= count($bookings); ?></a>
                  </li>
                  
                  <li class="list-group-item">
                    <b>Notifications</b> <a class="float-right"><?= count($geofence_events); ?></a>
                  </li>
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col -->
          <input type="hidden" name="" value="<?php echo $v_id ?>" id="vehicle_id">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                   <li class="nav-item"><a class="nav-link active" href="#basicinfo" data-toggle="tab">Basic Info</a></li>
                  <li class="nav-item"><a class="nav-link " href="#bookings" data-toggle="tab">Trips</a></li>
                  <li class="nav-item"><a class="nav-link" href="#vechicle_geofence" data-toggle="tab">Parts</a></li>
                <li class="nav-item"><a class="nav-link" href="#vechicle_incomexpense" data-toggle="tab">Income & Expense</a></li>
                <li class="nav-item"><a class="nav-link" href="#fuel" data-toggle="tab">Fuel</a></li>
                </ul>
              </div><!-- /.card-header -->
             
              <div class="card-body">
                <div class="tab-content">
                        
                  <div class="tab-pane " id="bookings">
                    <form method="post" id="trip_add" class="card" action="" novalidate="novalidate">
                         <div class="card-body">
                            <div class="row">
                                   
                                <div class="col-sm-6 col-md-3">
                                  <div class="form-group">
                                     <label class="form-label">Serial No<span class="form-required">*</span></label>
                                     <input type="text" name="t_trackingcode" value="" class="form-control" id="t_trackingcode">
                                  </div>
                               </div>        
                               <div class="col-sm-6 col-md-3">
                                <label class="form-label">Customer Name<span class="form-required">*</span></label>
                                <div class="form-group">
                                   <select id="t_customer_id" class="form-control" required="true" name="t_customer_id">
                                      <option value="">Select Customer</option>
                                      <?php foreach ($customerlist as $key => $customerlists) { ?>
                                      <option value="<?php echo output($customerlists['c_id']) ?>"><?php echo output($customerlists['c_name']) ?></option>
                                      <?php  } ?>
                                      </select>
                                </div>
                             </div>
                               
                               <div class="col-sm-6 col-md-3">
                                  <div class="form-group">
                                     <label class="form-label">Trip Start Date<span class="form-required">*</span></label>
                                     <input type="text" id="t_start_date" value="<?php echo date('Y-m-d', strtotime('-30 days')); ?>" name="t_start_date" class="form-control datetimepicker" placeholder="Trip Start Date" autocomplete="off">
                                  </div>
                               </div>
                               <div class="col-sm-6 col-md-3">
                                  <div class="form-group">
                                     <label class="form-label">Trip End Date<span class="form-required">*</span></label>
                                     <input type="text"id="t_end_date" value="<?php echo date('Y-m-d'); ?>"  name="t_end_date" class="form-control datetimepicker" placeholder="Trip End Date" autocomplete="off">
                                  </div>
                               </div>
                                 <div class="col-sm-6 card-footer">
                               <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                            </div>

                            </div>
                            </div>
                            </form>
                    <div class="table-responsive">
            <div class="ibox-content">
             <table id="bookingstbl2" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>Sr/No.</th>
                <th>Driver</th>
                <th>Customer</th>
                <th>Serial No</th>
                <th>Vehicle Name</th>
                <th>Total Amount</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
        
        
            </tbody>
          </table>
        </div>         
        </div>
                     <?php 
                     /*?> <table id="" class="table table-bordered table-striped table-hover">
                          
                          <tbody>
                            <?php if(!empty($bookings)) {
                            $count=1;
                            foreach($bookings as $bookingsdata){
                            ?>
                              <tr>
                                  <td>
                                     <?php echo output($count); $count++; ?>
                                  </td>
                                   <td><?= (isset($bookingsdata['t_driver_details']->d_name))?$bookingsdata['t_driver_details']->d_name:'<span class="badge badge-danger">Yet to Assign</span>'; ?></td>
                                  <td>
                                     <?php echo output($bookingsdata['t_customer_details']->c_name);?>
                                  </td>
                                  <td>
                                     <?php echo '<small>'.output($bookingsdata['t_trip_fromlocation']).'</small>'; echo '<br><span class="badge badge-success">to</span><br>';?>
                                     <?php echo '<small>'.output($bookingsdata['t_trip_tolocation']).'</small>';?>
                                  </td>
                                  <td>
                                     <?php echo output($bookingsdata['t_trip_amount']);?>
                                  </td>
                                  
                                   <td>
                                   <?php 
                                     switch($bookingsdata['t_trip_status']){
                                        case 'ongoing':
                                            $status = '<span class="badge badge-info">Ongoing</span>';
                                            break;
                                        case 'completed':
                                            $status = '<span class="badge badge-success">Completed</span>';
                                             break;
                                        case 'yettostart':
                                            $status = '<span class="badge badge-warning">Yet to start</span>';
                                             break;
                                        case 'cancelled':
                                            $status = '<span class="badge badge-danger">Cancelled</span>'; 
                                             break; 
                                        case 'yettoconfirm':
                                            $status = '<span class="badge badge-danger">Yet to Confirm</span>'; 
                                             break;    
                                      }

                                      ?>
                                     <?=  $status ?>  
                                  </td>
                                  <td> <a class="icon" target="_blank" href="<?php echo base_url(); ?>trips/details/<?php echo output($bookingsdata['t_id']); ?>">
                                     <i class="fa fa-eye"></i>
                                    </a> 
                                  </td>
                              </tr>
                              <?php } } ?>
                          </tbody>
                          
                      </table>
                      <?php 

                          */?>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="vechicle_geofence">
                    <!-- The timeline -->
                    <table id="vgeofencetbl" class="table table-striped projects">
                          <thead>
                              <tr>
                                  <th class="percent1">
                                      #
                                  </th>
                                  <th class="percent25">
                                      Name
                                  </th>
                                  <th class="percent25">
                                      Identity
                                  </th>
                                  <th class="percent25">
                                      Expiry
                                  </th>
                                 <th class="percent25">
                                    Action
                                </th>
                                  
                              </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($vechicle_geofence)){ 
                            $count=1;
                            foreach($vechicle_geofence as $vechicle_geofence){
                            ?>
                              <tr>
                                  <td>
                                     <?php echo output($count); $count++; ?>
                                  </td>
                                  <td>
                                      <?php echo output($vechicle_geofence['geo_name']);?>
                                  </td>
                                  <td>
                                     <?php echo output($vechicle_geofence['geo_description']);?>
                                  </td>
                                  <td> <a class="icon" href="<?php echo base_url(); ?>geofence">
                                     <i class="fa fa-eye"></i>
                                    </a> 
                                  </td>
                              </tr>
                          <?php } } ?>
                          </tbody>
                      </table>
                  </div>

                  <div class="tab-pane" id="vechicle_incomexpense">
                     <table id="incomexpenstbl1" class="table table-striped projects">
                          <thead>
                              <tr>
                                  <th class="percent1">
                                      #
                                  </th>
                                  <th class="percent25">
                                      Date
                                  </th>
                                  <th class="percent25">
                                      Description
                                  </th>
                                  <th class="percent25">
                                    Amount
                                  </th>
                               
                              </tr>
                          </thead>
                       <?php
                        /*
                       ?>   <tbody>
                            <?php if(!empty($vechicle_incomexpense)){ 
                            $count=1;
                            foreach($vechicle_incomexpense as $incomexpensdata){
                            ?>
                              <tr>
                                  <td>
                                     <?php echo output($count); $count++; ?>
                                  </td>
                                  <td>
                                      <?php echo output($incomexpensdata['ie_date']);?>
                                  </td>
                                  <td>
                                     <?php echo output($incomexpensdata['ie_description']);?>
                                  </td>
                                  <td>
                                     <?php echo output($incomexpensdata['ie_amount']);?>
                                  </td>
                                  <td>
                                     <?php echo ($incomexpensdata['ie_type']=='income')?'<span class="right badge badge-success">Income</span>':'<span class="right badge badge-danger">Expense</span>'; ?>
                                  </td>
                                 <td> <a class="icon" href="<?php echo base_url(); ?>incomexpense">
                                     <i class="fa fa-eye"></i>
                                    </a> 
                                  </td>                                 
                              </tr>
                          <?php } } ?>
                          </tbody>
                          <?php
                            */
                          ?>
                      </table>
                  </div>
                  <div class="tab-pane" id="fuel">
                     <table id="fueltable1" class="table table-striped projects">
                         <thead>
                              <tr>
                                  <th class="percent1">
                                      #
                                  </th>
                                  <th class="percent25">
                                      Pump
                                  </th>
                                  <th class="percent25">
                                      Fuel Quantity
                                  </th>
                                  <th class="percent25">
                                    Amount
                                  </th>
                                  <th class="percent25">
                                      Rate
                                  </th>
                                
                              </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($fuel)){ 
                            $count=1;
                            foreach($fuel as $fueldata){
                            ?>
                              <tr>
                                  <td>
                                     <?php echo output($count); $count++; ?>
                                  </td>
                                  <td>
                                      <?php echo $fueldata->name;?>
                                  </td>
                                  <td>
                                     <?php echo $fueldata->fuel_quantity;?>
                                  </td>
                                  <td>
                                     <?php echo $fueldata->amount;?>
                                  </td>
                                  <td>
                                     <?php echo $fueldata->rate; ?>
                                  </td>
                                <!--  <td> <a class="icon" href="<?php echo base_url(); ?>incomexpense">
                                     <i class="fa fa-eye"></i>
                                    </a> 
                                  </td>   -->                               
                              </tr>
                          <?php } } ?>
                          </tbody>
                      </table>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane active" id="basicinfo">
                    <table class="table table-sm table-bordered">
                  <tbody>
                    <tr>
                      <td>Registration No</td>
                      <td><?= output($vehicledetails['v_registration_no']) ?></td>
                    </tr>
                    <tr>
                      <td>Name</td>
                      <td><?= output($vehicledetails['v_name']) ?></td>
                    </tr>
                    <tr>
                      <td>Model</td>
                      <td><?= output($vehicledetails['v_model']) ?></td>
                    </tr>
                    <tr>
                      <td>Chassis No.</td>
                      <td><?= output($vehicledetails['v_chassis_no']) ?></td>
                    </tr>
                    <tr>
                      <td>Engine No.</td>
                      <td><?= output($vehicledetails['v_engine_no']) ?></td>
                    </tr>
                    <tr>
                      <td>Manufactured By</td>
                      <td><?= output($vehicledetails['v_manufactured_by']) ?></td>
                    </tr>
                     <tr>
                      <td>Type</td>
                      <td><?= output($vehicledetails['v_type']) ?></td>
                    </tr>
                     <tr>
                      <td>Mileage/Litre</td>
                      <td><?= output($vehicledetails['v_mileageperlitre']) ?></td>
                    </tr>
                     <tr>
                      <td>API URL</td>
                      <td><?= output($vehicledetails['v_api_url']) ?></td>
                    </tr>
                     <tr>
                      <td>GPS API Username</td>
                      <td><?= output($vehicledetails['v_api_username']) ?></td>
                    </tr>
                     <tr>
                      <td>GPS API Password</td>
                      <td><?= output($vehicledetails['v_api_password']) ?></td>
                    </tr>
                     <tr>
                      <td>Created Date</td>
                      <td><?= output($vehicledetails['v_created_date']) ?></td>
                    </tr>
                     <tr>
                      <td>Modified Date</td>
                      <td><?= output($vehicledetails['v_modified_date']) ?></td>
                    </tr>
                    <tr>
                      <td>Document</td>
                      <td><?php if($vehicledetails['v_file1']!='') { ?>
                        <a target="_blank" href="<?= base_url(); ?>assets/uploads/<?= ucwords($vehicledetails['v_file1']); ?>" class="">
                          View/Download
                        </a>
                        <?php } else { echo '-'; } ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="col-sm-3">
                  <a href="<?= base_url(); ?>vehicle/editvehicle/<?= $vehicledetails['v_id']; ?>">
                   <button type="button" class="btn btn-block btn-success btn-sm">Edit Info</button>
                 </a>
                </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script type="text/javascript">
$(document).ready(function() {
    var dataTable = $('#bookingstbl2').DataTable({

        "ajax": {
            url : "<?= base_url()?>vehicle/vehicle_trip_table",
            type : 'POST',
            data: function(d) {
                d.start_date = $('#t_start_date').val();
                d.end_date = $('#t_end_date').val();
                d.v_id = $('#vehicle_id').val();
                d.t_trackingcode = $('#t_trackingcode').val();
                d.t_customer_id = $('#t_customer_id').val();
            }
        },
         "footerCallback": function (row, data, start, end, display) {
            var api = this.api();
            $(api.column(2).footer()).html(
                api.column(2, {page: 'current'}).data().reduce(function (a, b) {
                    return parseFloat(a) + parseFloat(b);
                }, 0)
            );
        }
    });
    $('#submit').click(function(e) {
        e.preventDefault();
        dataTable.ajax.reload();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    var dataTable = $('#fueltable1').DataTable({

        "ajax": {
            url : "<?= base_url()?>vehicle/fuel_trip_table",
            type : 'POST',
            data: function(d) {
                d.start_date = $('#t_start_date_f').val();
                d.end_date = $('#t_end_date_f').val();
                d.v_id = $('#vehicle_id').val();
            }
        },
         "footerCallback": function (row, data, start, end, display) {
            var api = this.api();
            $(api.column(2).footer()).html(
                api.column(2, {page: 'current'}).data().reduce(function (a, b) {
                    return parseFloat(a) + parseFloat(b);
                }, 0)
            );
        }
    });
    $('#submit').click(function(e) {
        e.preventDefault();
        dataTable.ajax.reload();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    var dataTable = $('#incomexpenstbl1').DataTable({

        "ajax": {
            url : "<?= base_url()?>vehicle/expense_trip_table",
            type : 'POST',
            data: function(d) {
                d.start_date = $('#t_start_date_f').val();
                d.end_date = $('#t_end_date_f').val();
                d.v_id = $('#vehicle_id').val();
            }
        },
         "footerCallback": function (row, data, start, end, display) {
            var api = this.api();
            $(api.column(2).footer()).html(
                api.column(2, {page: 'current'}).data().reduce(function (a, b) {
                    return parseFloat(a) + parseFloat(b);
                }, 0)
            );
        }
    });
    $('#submit').click(function(e) {
        e.preventDefault();
        dataTable.ajax.reload();
    });
});
</script>