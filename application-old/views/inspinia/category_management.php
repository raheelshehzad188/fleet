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
      <div class="card">
         <div class="card-body p-0">
            <div class="table-responsive table_design">
               <table id="driverslisttbl" class="table card-table table-vcenter text-nowrap">
                  <thead>
                     <tr>
                        <th class="w-1">S.No</th>
                        <th>Name</th>
                        <th>Is Active</th>
                        <?php if(userpermission('lr_drivers_list_edit') || userpermission('lr_driver_del')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                       <?php if(!empty($rolelists)){  $count=1;
                        foreach($rolelists as $rolelist){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo output($rolelist['name']); ?></td>
                        
                        <td>  <span class="badge <?php echo ($rolelist['status']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($rolelist['status']=='1') ? 'Active' : 'Inactive'; ?></span>  </td>
                        <td>
                           <?php if(userpermission('lr_drivers_list_edit')) { ?>
                           <a class="icon" href="<?php echo base_url(); ?>category/editcategory/<?php echo output($rolelist['id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>
                           <?php  } if(userpermission('lr_cat_del')) { ?> 
                              <a data-toggle="modal" href="" onclick="confirmation('<?php echo base_url(); ?>category/deletecategory','<?= output($rolelist['id']); ?>')" data-target="#deleteconfirm" class="icon text-danger" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
                           </a> 
                           <?php } ?>
                        </td>
                        <?php }  } ?>
                     </tr>
                  </tbody>
               </table>
              
            </div>
         </div>
         <!-- /.card-body -->
      </div>
   </div>
</section>
<!-- /.content -->