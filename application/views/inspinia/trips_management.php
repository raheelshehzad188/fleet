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
          <?php
        //   echo "<pre>";
        //   print_r($customerlist);
        //   var_dump($customerlist);
                 ?>
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
                     <label class="form-label">Vechicle<span class="form-required">*</span></label>
                     <select id="t_vechicle" class="form-control" name="t_vechicle">
                        <option value="">Select Vechicle</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
               
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Driver<span class="form-required">*</span></label>
                     <select id="t_driver" class="form-control" name="t_driver">
                      <option value="">Select Driver</option>
                        <?php  foreach ($driverlist as $key => $driverlists) { ?>
                        <option value="<?php echo output($driverlists['d_id']) ?>"><?php echo output($driverlists['d_name']); ?></option>
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
    <div class="card">

        <div class="card-body p-0">
          

         <div class="table-responsive">
            <div class="ibox-content">
             <table id="item-list" class="table table-bordered table-striped table-hover">
        		<thead>
        			<tr>
        				<th>Sr/No.</th>
        				<th>Serial No</th>
        				<th>Customer Name</th>
        				<th>Driver Name</th>
        				<th>Vehicle Name</th>
        				<th>Total Amount</th>
        				<th>Action</th>
        			</tr>
        		</thead>
        		<tbody>
        
        
        		</tbody>
        	</table>
        
          <?php /* ?><div class="ibox-content">
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
                            <a class="icon" href="<?php echo base_url(); ?>trips/invoice/<?php echo output($triplists['t_id']); ?>">
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
                      
                    </table><?php */ ?>
                   
        </div>         
        </div>
        <!-- /.card-body -->
      </div>
      </div>
      
             </div>
    </section>
    <!-- /.content -->

<script type="text/javascript">
$(document).ready(function() {
    var dataTable = $('#item-list').DataTable({
        "ajax": {
            url : "trips/trip_table",
            type : 'POST',
            data: function(d) {
                d.start_date = $('#t_start_date').val();
                d.end_date = $('#t_end_date').val();
                d.t_trackingcode = $('#t_trackingcode').val();
                d.t_customer_id = $('#t_customer_id').val();
                d.t_vechicle = $('#t_vechicle').val();
                d.t_driver = $('#t_driver').val();
            }
        },
    });
    $('#submit').click(function(e) {
        e.preventDefault();
        dataTable.ajax.reload();
    });
});
</script>


