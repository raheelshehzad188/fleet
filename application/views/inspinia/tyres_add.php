    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 margin-left-15">
            <h1 class="m-0 text-dark"><?php echo (isset($tyreDetail))?'Edit Tyre':'Add Tyre' ?>
            </h1>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">

        <form method="post" id="vehicle_add" class="card" action="<?php echo base_url();?>tyres/<?php echo (isset($tyreDetail))?'updatetyres':'inserttyres'; ?>" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <?php 

                    if(isset($tyreDetail)) { ?>
                   <input type="hidden" name="id" id="id" value="<?php echo (isset($tyreDetail)) ? $tyreDetail[0]['id']:'' ?>" >
                    <?php } ?>
                    <div class="col-sm-6 col-md-3">
                        <label class="form-label">Company</label>
                      <div class="form-group">
                       <select class="form-control" required name="t_comapny">
                        <?php
                          foreach ($tyreCompany as $key => $value) {
                           ?>
                         <option value="<?php echo $value['id']?>" <?php echo (isset($tyreDetail[0]['company']) && $tyreDetail[0]['company'] == $value['id'] ) ? 'selected' : '' ?> ><?php echo $value['name']?></option>
                         <?php
                          }
                         ?>
                       </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <label class="form-label">Tyre Name</label>
                      <div class="form-group">
                        <input type="text" required name="t_name" id="t_name" class="form-control" placeholder="Tyre Name" value="<?php echo (isset($tyreDetail)) ? $tyreDetail[0]['tyre_name']:'' ?>">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Number</label>
                        <input type="text" required name="t_number" value="<?php echo (isset($tyreDetail)) ? $tyreDetail[0]['tyre_number']:'' ?>" class="form-control" placeholder="Number">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Purchasing Date</label>
                        <input type="text" value="<?php echo (isset($tyreDetail)) ? date('Y-m-d',strtotime($tyreDetail[0]['purchasing_date'])) :'' ?>" required name="purchasing_date" class="form-control datepicker" placeholder="Purchasing Date" autocomplete="off">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Mileage</label>
                        <input type="text" name="mileage" value="<?php echo (isset($tyreDetail)) ? $tyreDetail[0]['tyre_run']:'' ?>" class="form-control" placeholder="Mileage" required>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Price</label>
                        <input type="text" name="t_price" value="<?php echo (isset($tyreDetail)) ? $tyreDetail[0]['amount']:'' ?>" class="form-control" placeholder="Price" required>
                      </div>
                    </div>


                    <hr>
                  <input type="hidden" id="v_created_by" name="v_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
                  <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary"> <?php echo (isset($tyreDetail))?'Update Tyre':'Add Tyre' ?></button>
                  </div>
              </form>
                        </div>
                    </div>
                </div>
             </div>
    </section>
    <!-- /.content -->
