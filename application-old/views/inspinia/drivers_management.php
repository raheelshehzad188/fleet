<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6 head_box">
            <h1 class="m-0 text-dark">Staff Info
            </h1>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
   <!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
         <form method="post" id="trip_add" class="card" action="" novalidate="novalidate">
         <div class="card-body">
            <div class="row">
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Staff Category<span class="form-required">*</span></label>
                     <select id="s_category" class="form-control" name="t_driver">
                      <option value="">Select Category</option>
                        <?php  foreach ($staff_types as $key => $value) { ?>
                        <option value="<?php echo output($value['st_id']) ?>"><?php echo output($value['type_name']); ?></option>
                        <?php  } ?>
                     </select>
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
            <div class="table-responsive table_design">
               <table id="driverslisttbl_1" class="table card-table table-vcenter text-nowrap">
                  <thead>
                     <tr>
                        <th class="w-1">S.No</th>
                        <th>Staff Type</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>License No</th>
                        <th>License Exp Date</th>
                        <th>Asignment</th>
                        <th>Is Active</th>
                        <?php if(userpermission('lr_drivers_list_edit') || userpermission('lr_driver_del')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <?php /* ?>
                  <tbody>
                       <?php if(!empty($driverslist)){  $count=1;
                        foreach($driverslist as $driverslists){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo (isset($staff_types[$driverslists['st_cat_id']])?$staff_types[$driverslists['st_cat_id']]:''); ?></td>
                        <td><?php if($driverslists['d_file']!='') { ?>
                           <img class="img-fluid" style="width: 58px;" src="<?= base_url(); ?>assets/uploads/<?= ucwords($driverslists['d_file']); ?>">
                        <?php } ?></td>
                        <td> <?php echo output($driverslists['d_name']); ?></td>
                        <td> <?php echo output($driverslists['d_mobile']); ?></td>
                        <td><?php echo output($driverslists['d_licenseno']); ?></td>
                        <td><?php echo output(date(dateformat(), strtotime($driverslists['d_license_expdate']))); ?></td>
                        <td><?php echo output(date(dateformat(), strtotime($driverslists['d_doj']))); ?></td>
                        <td><?php if($driverslists['d_file1']!='') { ?>
                        <a target="_blank" href="<?= base_url(); ?>assets/uploads/<?= ucwords($driverslists['d_file1']); ?>" class="">
                          View
                        </a>
                        <?php } else { echo '-'; } ?></td>
                        <td>  <span class="badge <?php echo ($driverslists['d_is_active']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($driverslists['d_is_active']=='1') ? 'Active' : 'Inactive'; ?></span>  </td>
                        <td>
                           <?php 
                        //   var_dump(userpermission('lr_driver_del'));
                           if(userpermission('lr_drivers_list_edit')) { ?>
                           <a class="icon" href="<?php echo base_url(); ?>drivers/editdriver/<?php echo output($driverslists['d_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>
                           <a class="icon" href="<?php echo base_url(); ?>drivers/viewstaff/<?php echo output($driverslists['d_id']); ?>">
                           <i class="fa fa-eye"></i>
                           <a class="icon text-danger" href="<?php echo base_url(); ?>drivers/deletedriver/<?php echo output($driverslists['d_id']); ?>">
                           <i class="fa fa-trash"></i>
                           </a>
                           <?php  } if(userpermission('lr_driver_del') && false) { ?> |
                              <a data-toggle="modal" href="" onclick="confirmation('<?php echo base_url(); ?>drivers/deletedriver','<?= output($driverslists['d_id']); ?>')" data-target="#deleteconfirm" class="icon text-danger" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
                           </a> 
                           <?php } ?>
                        </td>
                        <?php }  } ?>
                     </tr>
                  </tbody> <?php */ ?>
               </table>
              
            </div>
         </div>
         <!-- /.card-body -->
      </div>
   </div>
</section>
<!-- /.content -->

<script type="text/javascript">
$(document).ready(function() {
    var dataTable = $('#driverslisttbl_1').DataTable({
        "ajax": {
            url : "<?= base_url()?>drivers/drivers_table",
            type : 'POST',
            data: function(d) {
                d.s_category = $('#s_category').val();
            }
        },
    });
    $('#submit').click(function(e) {
        e.preventDefault();
        dataTable.ajax.reload();
    });
});
</script>