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
   <!-- /.content-wrapper -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
      
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
                <li class="nav-item"><a class="nav-link " href="#files" data-toggle="tab">Files</a></li>
                <li class="nav-item"><a class="nav-link " href="#Tyers" data-toggle="tab">Tyers</a></li>
                <li class="nav-item"><a class="nav-link " href="#Maintaine" data-toggle="tab">Maintenance</a></li>
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
                                <!--  <td> <a class="icon" href="<?php echo base_url(); ?>incomexpense">
                                     <i class="fa fa-eye"></i>
                                    </a> 
                                  </td>   -->                               
                              </tr>
                          <?php } } ?>
                          </tbody>
                      </table>
                  </div>
                  
                    <div class="tab-pane" id="Tyers">
                     <table id="tyerstable1" class="table table-striped projects" style="width:100% !important;">
                      <input type="hidden" value="<?php echo $vehicledetails['v_type'] ;?>" name="" id="vih_type">
                         <thead>
                              <tr>
                                  <th class="percent1">
                                      #
                                  </th>
                                  <th class="percent25">
                                      Name
                                  </th>
                                  
                                  <th class="percent25">
                                      Actions
                                  </th>
                                  
                                </tr>
                          </thead>
                        </table>
                        <?php
                       $query = $this->db->select('id')->get('tyres_name');
                        $result = $query->result();
                         $data = $this->db->get('tyre_types');
                       $ret = $data->result_array();
                       
                   
                           foreach ($result as $row) {

                               ?>
                                <div class="modal fade" id="myModal<?php echo $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                 <div class="modal-dialog" role="document">
                                                   <div class="modal-content">
                                                     <div class="modal-header">
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                       <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                                     </div>
                                                     <div class="modal-body">
                                                      <form method="post"  action="<?= base_url()?>vehicle/assign_tyres" >
                                                          
                                                          <?php
                                                          $this->db->select('*');
                                                          $this->db->from('vih_tyre');
                                                          $this->db->where('vid', $v_id);
                                                          $this->db->where('ttpe_id', $row->id);
                                                          $this->db->where('close_date','0');
                                                          $this->db->where('close_meter','0');
                                                          $tyrecheck = $this->db->get();
                                                          $tyre_data = $tyrecheck->result_array();
                                                          
                                                          
                                                     
                                                          ?>
                                                          
                                                         
                                                          
                                                           <input type="hidden" name="vid" value="<?php echo $v_id ?>" >
                                                           <input type="hidden" name="ttpe_id" value="<?php echo $row->id ?>" >
                                                          
                                                         
                                                         <?php
                                                         
                                                         if($tyrecheck->num_rows() > 0){
                                                             ?>
                                                              <input type="hidden" name="id" value="<?php echo $tyre_data[0]['id'] ?>" >
                                                             <div class="">
                                                           <div class="form-group">
                                                             <label class="form-label">Close date</label>
                                                             <input type="date" name="close_date" value="" class="form-control" placeholder="Chassis No">
                                                           </div>
                                                         </div>
                                                         
                                                          <div class="">
                      <div class="form-group">
                        <label for="v_color" class="form-label">Vehicle Tyre</label>
                        <select class="form-control  " required="true" name="tid">
                        	<option>Select Tyres</option>
                        	<?php
                        		foreach ($ret as $v) {
                        		    
                        	?>
                        	<option  value="<?= $v['id']?>" ><?= $v['tyre_name']?></option>
                        	<?php
                        		}
                        	?>
                        	
                        </select>
                      </div>
                    </div>
                                                             <div class="">
                                                           <div class="form-group">
                                                             <label class="form-label">Close Meter</label>
                                                             <input type="text" name="close_meter" value="" class="form-control" placeholder="Close Meter">
                                                           </div>
                                                         </div>
                                                         
                                                           <button type="submit" class="btn btn-primary">Change Tyre</button>
                                                             <?php
                                                         }else{
                                                             ?>
                                                              <div class="">
                                                           <div class="form-group">
                                                             <label class="form-label">Assign date</label>
                                                             <input type="date" name="assign_date" value="<?php echo (isset($tyre_data) && $tyre_data[0]['assign_date'] != 0) ?  date("Y-m-d", strtotime($tyre_data[0]['assign_date'])):'' ?>" class="form-control" placeholder="Chassis No">
                                                           </div>
                                                         </div>
                                                            <div class="">
                      <div class="form-group">
                        <label for="v_color" class="form-label">Vehicle Tyre</label>
                        <select class="form-control  " required="true" name="tid">
                        	<option>Select Tyres</option>
                        	<?php
                        		foreach ($ret as $v) {
                        		    
                        	?>
                        	<option value="<?= $v['id']?>"><?= $v['tyre_name']?></option>
                        	<?php
                        		}
                        	?>
                        	
                        </select>
                      </div>
                    </div>
                                                          
                                                          <div class="">
                                                           <div class="form-group">
                                                             <label class="form-label">Assign meter</label>
                                                             <input type="text" name="assifgnmeter" value="<?php echo (isset($tyre_data)) ? $tyre_data[0]['assifgnmeter']:'' ?>" class="form-control" placeholder="Assign meter">
                                                           </div>
                                                         </div>
                                                         
                                                           <button type="submit" class="btn btn-primary">Assign Tyre</button>
                                                             
                                                             <?php
                                                         }
                                                         
                                                         
                                                         ?>
                                                          
                                                          
                                                        
                                                          
                                                      </form>
                                                     </div>
                                                     
                                                   </div>
                                                 </div>
                                  </div>
                               
                               <?php
                           }
                        ?>
                        
                          
                  </div>
                  
                  
                  
                  
                    <div class="tab-pane" id="Maintaine">
                    <!-- The timeline -->
                    <?php
                    // var_dump($maintenance);
                    ?>
                    <form method="post" id="form_maintenance" class="card" action="" novalidate="novalidate">
                         <div class="card-body">
                            <div class="row">
                                   
                                <div class="col-sm-6 col-md-3">
                                  <div class="form-group">
                                     <label class="form-label">Name<span class="form-required">*</span></label>
                                     <input type="text" class="form-control" name="m_name" id="m_name">
                                      <!-- <select class="form-control" name="m_name" id="m_name"> -->
                                        <?php /*
                                          foreach ($maintenance as $key => $value) {
                                        ?>
                                       <option value="<?= $value['id'] ?>"><?= $value['tyre_name']?></option>
                                       <?php
                                        } */
                                      ?>
                                     <!-- </select> -->
                                  </div>
                               </div>       
                               
                               <div class="col-sm-6 col-md-3">
                                  <div class="form-group">
                                     <label class="form-label">Type<span class="form-required">*</span></label>
                                     <select class="form-control" name="m_type" id="m_type">
                                       <option value="1">By Km</option>
                                       <option value="0">By Date</option>
                                     </select>
                                  </div>
                               </div>
                               <div class="col-sm-6 col-md-3" id="m_date" style="display: none;">
                                  <div class="form-group">
                                     <label class="form-label">Date<span class="form-required">*</span></label>
                                     <input type="text"  value="2024-05-08" id="m_date1" name="m_date" class="form-control datetimepicker"  autocomplete="off">
                                  </div>
                               </div>
                               <div class="col-sm-6 col-md-3" id="m_km" >
                                  <div class="form-group">
                                     <label class="form-label">Km<span class="form-required">*</span></label>
                                     <input type="text" name="m_km" id="m_km1" class="form-control"  autocomplete="off">
                                  </div>
                               </div>
                                 <div class="col-sm-6 card-footer">
                               <button type="submit" class="btn btn-primary" id="save_maintenance">Submit</button>
                            </div>

                            </div>
                            </div>
                            </form>
                    <table id="Maintainetbl" class="table table-striped projects" style="width:100%;">
                          <thead>
                              <tr>
                                  <th class="percent1">
                                      #
                                  </th>
                                  <th class="percent25">
                                      Name 
                                  </th>
                                  <th class="percent25">
                                      Type
                                  </th>
                                  
                                 <th class="percent25">
                                    Action
                                </th>
                                  
                              </tr>
                          </thead>
                          <tbody>
                           
                          </tbody>
                      </table>
                  </div>
                  
                  
                   <div class="tab-pane" id="files">
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
                                <td> <input type="file" name="file" />
                                   <input type="hidden" name="exp"  /></td>
                                <td>update</td>
                            </tr>

                                <?php
                              }
                              ?>
                            
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    // Initialize Select2
    $(document).ready(function() {
        $('.select2').select2();
    });
    
    
    $(document).ready(function() {
    $('.assign_tyres').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '<?= base_url()?>vehicle/assign_tyres', 
            data: formData,
            success: function(response) {
                
                console.log(response);
             
            },
            error: function(xhr, status, error) {
               
                console.error(xhr.responseText);
            }
        });
    });
});
</script>
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
    var dataTable = $('#Maintainetbl').DataTable({
        "ajax": {
            url : "<?= base_url()?>vehicle/maintance",
            type : 'POST',
            data: function(d) {
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
    var dataTable = $('#tyerstable1').DataTable({
      
        "ajax": {
            url : "<?= base_url()?>vehicle/Tyerstable",
            type : 'POST',
            data: function(d) {
                d.vih_type = $('#vih_type').val();
                d.v_id = $('#vehicle_id').val();
            }
        },
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
<script type="text/javascript">
  $('#m_type').on('change',function(){
    var val = $(this).val();
    // alert(val);
    if(val == '0'){
      $('#m_km').css({"display":"none"});
      $('#m_date').css({"display":"block"});
    }else{
      $('#m_km').css({"display":"block"});
      $('#m_date').css({"display":"none"});
    }
    // m_km
  });

  $('#save_maintenance').on('click',function(e){
    e.preventDefault();
        var vehicle_id = $('#vehicle_id').val();
        var name = $('#m_name').val();
        var type = $('#m_type').val();
        var by_km = $('#m_km1').val();
        var by_date = $('#m_date1').val();
        $.ajax({
        url: "<?= base_url()?>vehicle/save_maintenance",
        dataType: "json",
        type: "Post",
        async: true,
        data: {
          vehicle_id:vehicle_id,
          name:name,
          type:type,
          km:by_km,
          date:by_date
         },
        success: function (data) {
          // alert(data);
           if(data){
            location.reload();
           }
        },
    }); 

  });
  function update_maintanence(id){
        $.ajax({
        url: "<?= base_url()?>vehicle/update_maintenance",
        // dataType: "json",
        type: "Post",
        async: true,
        data: {
          id:id
         },
        success: function (data) {
          // // alert(data);
          //  if(data){
            location.reload();
           // }
        },
    }); 

  }
</script>