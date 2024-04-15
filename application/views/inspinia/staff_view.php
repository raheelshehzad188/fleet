 <style type="text/css">
 .profile-user-img{
         border: 3px solid #adb5bd;
    margin: 0 auto;
    padding: 3px;
    width: 100px;
    height: 100px;
    object-fit: cover;
 }
 
 .active_status {
     background:blue;
     padding:5px 8px;
     border-radius:8px;
     color:white;
 }
 .edit_btn{
     background:#F8AC59;
     padding:5px 15px;
     border-radius:4px;
     color:white;
 }
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
            <h1 class="m-0 text-dark">Driver Details
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
              <?php 
                // var_dump($vehicledetails['d_id']);
                ?>
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <?php if($vehicledetails['d_file']!='') { ?>
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?= base_url(); ?>assets/uploads/<?= ucwords($vehicledetails['d_file']); ?>">
                </div>
                <?php } ?>
                <h3 class="profile-username text-center"><?= ucwords($vehicledetails['d_name']); ?></h3>

                <p class="text-muted text-center"><?= ucwords($vehicledetails['v_type']); ?></p>

                

                <p class="text-muted text-center"><?= ($vehicledetails['d_is_active']==1)?'<span class="right badge badge-success">Active</span>':'<span class="right badge badge-danger">Inactive</span>' ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Trips</b> <a class="float-right"><?= ($bookings)?count($bookings):0; ?></a>
                  </li>
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col -->
          <input type="hidden" name="" value="<?php echo $v_id ?>" id="vehicle_id">
          <input type="hidden" name="" value="<?php echo $vehicledetails['d_id'] ?>" id="staff_id">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                   <li class="nav-item"><a class="nav-link active" href="#basicinfo" data-toggle="tab">Basic Info</a></li>
                  <li class="nav-item"><a class="nav-link " href="#bookings" data-toggle="tab">Trips</a></li>
                  <li class="nav-item"><a class="nav-link " href="#Salary" data-toggle="tab">Payments</a></li>
                  <li class="nav-item"><a class="nav-link " href="#Bonus" data-toggle="tab">Bonus</a></li>
                  <li class="nav-item"><a class="nav-link " href="#files" data-toggle="tab">Files</a></li>
                 <!--  <li class="nav-item"><a class="nav-link" href="#vechicle_geofence" data-toggle="tab">Parts</a></li>
                <li class="nav-item"><a class="nav-link" href="#vechicle_incomexpense" data-toggle="tab">Income & Expense</a></li>
                <li class="nav-item"><a class="nav-link" href="#fuel" data-toggle="tab">Fuel</a></li> -->
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
                                  <div class="col-sm-6 col-md-3" style="display: none;">
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
                                         <input type="text" id="t_start_date" value="<?php echo date('Y-m-d', strtotime('-30 days')); ?>" name="t_start_date" class="form-control datetimepicker1" placeholder="Trip Start Date" autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-sm-6 col-md-3">
                                      <div class="form-group">
                                         <label class="form-label">Trip End Date<span class="form-required">*</span></label>
                                         <input type="text"id="t_end_date" value="<?php echo date('Y-m-d'); ?>"  name="t_end_date" class="form-control datetimepicker1" placeholder="Trip End Date" autocomplete="off">
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
               
                  </div>
                  <div class="tab-pane " id="files">
                    <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>File</th>
                                <th>Preview</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                              foreach ($files as $key => $value) {
                                ?>
                                <tr>
                                <td><?= $key+1; ?></td>
                                <td><?= $value['type_name'] ?></td>
                                <td>update</td>
                            </tr>

                                <?php
                              }
                              ?>
                            
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
               
                  </div>
                  <div class="tab-pane " id="Salary">
                    
                    <div class="table-responsive">
                      <div class="ibox-content">
                         <form method="post" id="p_form" class="card" action="" novalidate="novalidate">
                         <div class="card-body">
                            <div class="row">
                                   
                                  <div class="col-sm-6 col-md-3">
                                      <div class="form-group">
                                         <label class="form-label">Expense Type<span class="form-required">*</span></label>
                                         
                                         <select class="form-control" name="exp">
                                           <?php
                                            foreach ($ofc_exp as $key => $value) {
                                              // var_dump($value);
                                             ?>
                                             <option value="<?= $value['st_id']?>"><?= $value['type_name']?></option>
                                             <?php
                                            }
                                           ?>
                                         </select>
                                      </div>
                                  </div>  
                                   <div class="col-sm-6 col-md-3">
                                      <div class="form-group">
                                         <label class="form-label">Amount<span class="form-required">*</span></label>
                                         <input type="text" name="amount" value="" class="form-control" id="Amount">
                                      </div>
                                  </div>        
                                  <div class="col-sm-6 col-md-3">
                                        <label class="form-label">Customer Name<span class="form-required">*</span></label>
                                        <div class="form-group">
                                           <select id="t_customer_id" class="form-control" required="true" name="cr_dr">
                                              <option value="cr">CR</option>
                                              <option value="dr">DR</option>
                                              </select>
                                        </div>
                                  </div>
                                  <div class="col-sm-6 col-md-3">
                                      <div class="form-group">
                                         <label class="form-label">Reason<span class="form-required">*</span></label>
                                         <textarea  class="form-control " name="reason"></textarea>
                                      </div>
                                  </div>
                                  <div class="col-sm-6 card-footer">
                                      <button type="submit" class="btn btn-primary" id="submit_payments">Submit</button>
                                  </div>

                            </div>
                          </div>
                    </form>
                      </div>         
                    </div>
               
                  </div>

                  <div class="tab-pane " id="Bonus">
                    
                    <div class="table-responsive">
                      <div class="ibox-content">
                         <form method="post" id="b_form" class="card" action="" novalidate="novalidate">
                         <div class="card-body">
                            <div class="row">
                                   <div class="col-sm-6 col-md-3">
                                      <div class="form-group">
                                         <label class="form-label">Amount<span class="form-required">*</span></label>
                                         <input type="text" name="bonus_amount" value="" class="form-control" id="Amount">
                                      </div>
                                  </div>        
                                  <div class="col-sm-6 col-md-3">
                                      <div class="form-group">
                                         <label class="form-label">Reason<span class="form-required">*</span></label>
                                         <textarea  class="form-control " name="bonus_reason"></textarea>
                                      </div>
                                  </div>
                                  <div class="col-sm-6 card-footer">
                                      <button type="submit" class="btn btn-primary" id="submit_bonus">Submit</button>
                                  </div>

                            </div>
                          </div>
                    </form>
                    <hr>
                    
                    <form method="post" id="trip_add" class="card" action="" novalidate="novalidate">
                      <div class="col-sm-6 col-md-3">
                                      <div class="form-group">
                                         <label class="form-label">Trip Start Date<span class="form-required">*</span></label>
                                         <input type="text" id="b_start_date" value="<?php echo date('Y-m-d', strtotime('-30 days')); ?>" name="t_start_date" class="form-control datetimepicker1" placeholder="Trip Start Date" autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-sm-6 col-md-3">
                                      <div class="form-group">
                                         <label class="form-label">Trip End Date<span class="form-required">*</span></label>
                                         <input type="text"id="b_end_date" value="<?php echo date('Y-m-d'); ?>"  name="t_end_date" class="form-control datetimepicker1" placeholder="Trip End Date" autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-sm-6 card-footer">
                                      <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                                  </div>
                    </form>
                     <table id="bonus_data_table" class="table table-bordered table-striped table-hover">
                          <thead>
                            <tr>
                              <th>Sr/No.</th>
                              <th>Amount</th>
                              <th>Reason</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                      
                      
                          </tbody>
                        </table>
                      </div>         
                    </div>
               
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
                      <td>Driver Name</td>
                      <td><?= output($vehicledetails['d_name']) ?></td>
                    </tr>
                    <tr>
                      <td>Vehicle</td>
                      <td>
                          <select class="form-control" onchange="ch_veh('<?= $vehicledetails['d_id'] ?>')">
                              <option>Un assigned</option>
                              <?php
                              foreach($vehicles as $k=> $v)
                              {
                                  ?>
                              <option value="<?= $v['v_id'] ?>" <?= ($v['driver_1'] == $vehicledetails['d_id'] || $v['driver_2'] == $vehicledetails['d_id'] || $v['hrelper'] == $vehicledetails['d_id'])?'selected':'' ?>><?= $v['v_registration_no'] ?></option>
                              <?php
                              }
                              ?>
                              
                          </select>
                          
                      </td>
                    </tr>
                    <tr>
                      <td>Driver Mobile NO</td>
                      <td><?= output($vehicledetails['d_mobile']) ?></td>
                    </tr>
                    <tr>
                      <td>Driver Address</td>
                      <td><?= output($vehicledetails['d_address']) ?></td>
                    </tr>
                    <!--<tr>-->
                    <!--  <td>Driver Age</td>-->
                    <!--  <td><?= output($vehicledetails['d_age']) ?></td>-->
                    <!--</tr>-->
                    <tr>
                      <td>Driver License</td>
                      <td><?= output($vehicledetails['d_licenseno']) ?></td>
                    </tr>
                     <tr>
                      <td>Driver Total Expense</td>
                      <td><?= output($vehicledetails['d_total_exp']) ?></td>
                    </tr>
                     <tr>
                      <td>Driver Joining Date</td>
                      <td><?= output($vehicledetails['d_doj']) ?></td>
                    </tr>
                    <!-- <tr>-->
                    <!--  <td>Driver Refrance</td>-->
                    <!--  <td><?= output($vehicledetails['d_ref']) ?></td>-->
                    <!--</tr>-->
                    <!-- <tr>-->
                    <!--  <td>Driver Created By</td>-->
                    <!--  <td><?= output($vehicledetails['d_created_by']) ?></td>-->
                    <!--</tr>-->
                    <tr>
                      <td>Driver Modified Date</td>
                      <td><?= output($vehicledetails['d_modified_date']) ?></td>
                    </tr>
                     <tr>
                      <td>Driver Status</td>
                      <td><span class="badge badge-success "><?= output($vehicledetails['d_is_active'] == 1) ? 'Active' : 'Left' ?></span></td>
                    </tr>
                     <tr>
                      <td>Driver File</td>
                    <td>
                          <a style="color:skyblue" target="_blank" href="<?= base_url(); ?>assets/uploads/<?= ucwords($vehicledetails['d_file']); ?>" class="">
                          View/Download
                            </a>
                    </td>
                    </tr>
                     <tr>
                      <td>Driver File</td>
                      <td>
                        <a style="color:skyblue" target="_blank" href="<?= base_url(); ?>assets/uploads/<?= ucwords($vehicledetails['d_file1']); ?>" class="">
                          View/Download
                        </a>
                        </td>
                    </tr>
                    <tr>
                      <td>Edit Info</td>
                      <td>
                        <a class="edit_btn" href="<?= base_url(); ?>drivers/editdriver/<?= $vehicledetails['d_id']; ?>">
                        Edit Info
                        </a>
                        </td>
                    </tr>
                  </tbody>
                </table>
                <div class="col-sm-3">
                  
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
            url : "<?= base_url()?>drivers/staff_trip_table",
            type : 'POST',
            data: function(d) {
                d.start_date = $('#t_start_date').val();
                d.end_date = $('#t_end_date').val();
                d.t_trackingcode = $('#t_trackingcode').val();
                d.t_driver = $('#staff_id').val();
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
    // $('#submit').click(function(e) {
    //     e.preventDefault();
    //     dataTable.ajax.reload();
    // });
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
    // $('#submit').click(function(e) {
    //     e.preventDefault();
    //     dataTable.ajax.reload();
    // });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    var dataTable = $('#bonus_data_table').DataTable({

        "ajax": {
            url : "<?= base_url()?>drivers/bonus_table",
            type : 'POST',
            data: function(d) {
                d.start_date = $('#t_start_date_f').val();
                d.end_date = $('#t_end_date_f').val();
                d.sid = $('#staff_id').val();
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
    // $('#submit').click(function(e) {
    //     e.preventDefault();
    //     dataTable.ajax.reload();
    // });
});
</script>
<script type="text/javascript">
  $('#submit_payments').on('click',function(e){
    e.preventDefault();
    var id = $('#staff_id').val();
     // var form = $('#p_form').serializeArray();
     var data = $('#p_form').serializeArray().reduce(function(obj, item) {
    obj[item.name] = item.value;
    return obj;
}, {});
     $.ajax({
        url: '<?= base_url('drivers/save_payments');?>',
        dataType: "json",
        type: "Post",
        async: true,
        data: {
        id:id,
        data:data },
        success: function (data) {
           
        }
    }); 
  })
</script>
<script type="text/javascript">
  $('#submit_bonus').on('click',function(e){
    e.preventDefault();
    var id = $('#staff_id').val();
     // var form = $('#p_form').serializeArray();
     var data = $('#b_form').serializeArray().reduce(function(obj, item) {
    obj[item.name] = item.value;
    return obj;
}, {});
     $.ajax({
        url: '<?= base_url('drivers/save_bonus');?>',
        dataType: "json",
        type: "Post",
        async: true,
        data: {
        id:id,
        data:data },
        success: function (data) {
           if(data){
            location.reload();
           }
        }
    }); 
  })
</script>