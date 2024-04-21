    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 head_box">
            <h1 class="m-0 text-dark"><?php echo (isset($catdetails))?'Edit staff':'Add staff' ?>
            </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form method="post" id="add_driver" class="card" enctype="multipart/form-data" action="<?php echo base_url();?>category/<?php echo (isset($catdetails))?'updatecategory':'insertcat'; ?>">
                <div class="card-body">

                  
                  <div class="row white_bg">
                    <?php if(isset($catdetails)) { ?>
                   <input type="hidden" name="id" id="id" value="<?php echo (isset($catdetails)) ? $catdetails[0]['id']:'' ?>" >
                 <?php } ?>
                    <div class="col-sm-6 col-md-3">
                        <label class="form-label">Staff Name<span class="form-required">*</span></label>
                      <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Category Name" value="<?php echo (isset($catdetails)) ? $catdetails[0]['name']:'' ?>" >
                      </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="status" class="form-label">Staff Status</label>
                        <select id="status" name="status" class="form-control " required="">
                          <option value="">Select Driver Status</option> 
                          <option <?php echo (isset($catdetails) && $catdetails[0]['status']==1) ? 'selected':'' ?> value="1">Active</option> 
                          <option <?php echo (isset($catdetails) && $catdetails[0]['status']==0) ? 'selected':'' ?> value="0">Inactive</option> 
                        </select>
                      </div>
                    </div>
                    </div>
      
                </div>
                  <input type="hidden" id="created_by" name="created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
                   <input type="hidden" id="created_date" name="created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary"> <?php echo (isset($catdetails))?'Update Category':'Add Category' ?></button>
                </div>
              </form>
             </div>
    </section>
    <!-- /.content -->



