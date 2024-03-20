<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6 margin-left-15">
            <h1 class="m-0 text-dark">Expense Type
            </h1>
         </div>
      </div>
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-add">
      Add New Expense Type
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
                        <th>Name</th>
                        <th>Is Default</th>
                        <th>Created Date</th>
                        <th>Action</th>
                     </tr>
                           </thead>
                           <tbody>
                     <?php if(!empty($vehiclegroup)){  $count=1;
                        foreach($vehiclegroup as $vehiclegroupdata){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo $vehiclegroupdata['name']; ?></td>
                        <td> <?php echo ($vehiclegroupdata['is_default'])?'Yes':'No'; ?></td>
                        <td> <?php echo output($vehiclegroupdata['create_at']); ?></td>
                        <td>
                           <a class="icon" href="<?php echo base_url(); ?>trips/delexp/<?php echo output($vehiclegroupdata['id']); ?>">
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
            <h4 class="modal-title">Add New Expense</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="geofencesave" method="post" action="<?php echo base_url(); ?>trips/addexp">
               <div class="card-body">
                  <div class="form-group row">
                     <label for="geo_name" class="col-sm-4 col-form-label">Name</label>
                     <div class="form-group col-sm-8">
                        <input type="text" class="form-control" name="name" id="exp_name" required="true" placeholder="Enter Expense Name">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="Cateogry" class="col-sm-4 col-form-label">Default</label>
                     <div class="form-group col-sm-8">
                        <input type="checkbox" class="form-control" value="1" name="is_default" id="is_def">
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="submit" id="geofenvaluesave" class="btn btn-primary">Save</button>
         </div>
         </form>
      </div>
   </div>
</div>