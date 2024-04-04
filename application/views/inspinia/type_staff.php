<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6 margin-left-15">
            <h1 class="m-0 text-dark">Staff Type
            </h1>
         </div>
      </div>
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-add">
      Add New Staff Type
      </button>
   </div>
</div>
<section class="content">
   <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                    </div>
                    <div class="ibox-content">

                        <table class="table">
                            <thead>
                              <tr>
                        <th class="w-1">S.No</th>
                        <th>Staff Type</th>
                        <th>Created Date</th>
                        <th>Action</th>
                     </tr>
                           </thead>
                           <tbody>
                     <?php if(!empty($type_staff)){  $count=1;
                        foreach($type_staff as $type_staff){
                            
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo $type_staff['type_name']; ?></td>
                        <td> <?php echo output($type_staff['created_at']); ?></td>
                        <td>
                           <a class="icon" href="<?php echo base_url(); ?>trips/del_staff_type/<?php echo $type_staff['st_id']; ?>">
                           <i class="fa fa-trash text-danger"></i>
                           </a> 
                        </td>
                     </tr>
                     <?php } } ?>
                  </tbody>
                        </table>

                    </div>
                </div>
            </div>
</section>
<div class="modal fade " id="modal-add" aria-modal="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add Staff Type</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="staff_type" method="post" action="<?php echo base_url(); ?>trips/add_staff_type">
               <div class="card-body">
                  <div class="form-group row">
                     <label for="geo_name" class="col-sm-4 col-form-label">Staff Type</label>
                     <div class="form-group col-sm-8">
                        <input type="text" class="form-control" name="type_name" id="type_name" required="true" placeholder="Enter Staff Type">
                     </div>
                  </div>
                  <!--<div class="form-group row">-->
                  <!--   <label for="Cateogry" class="col-sm-4 col-form-label">Default</label>-->
                  <!--   <div class="form-group col-sm-8">-->
                  <!--      <input type="checkbox" class="form-control" value="1" name="is_default" id="is_def">-->
                  <!--   </div>-->
                  <!--</div>-->
               </div>
         </div>
         <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="submit" id="submit_type" class="btn btn-primary">Save</button>
         </div>
         </form>
      </div>
   </div>
</div>