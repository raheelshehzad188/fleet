    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 head_box">
            <h1 class="m-0 text-dark"><?php echo (isset($salarydetails))?'Edit Salary':'Add Salary' ?>
            </h1>
          </div><!-- /.col -->
         <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="ibox-content">
      <div class="container-fluid">
       	      <form method="post" id="Salary_add" class="card" action="<?php echo base_url();?>drivers/<?php echo (isset($salarydetails))?'updatesalary':'insertsalary'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                     <?php if(isset($salarydetails)) { ?>
                   <input type="hidden" name="c_id" id="c_id" value="<?php echo (isset($salarydetails)) ? $salarydetails[0]['c_id']:'' ?>" >
                 <?php } ?>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                          <label class="form-label">Name<span class="form-required">*</span></label>
                          <select class="form-control" name="cust_id">
                            <option value="">Select Staff</option>
                            <?php
                            foreach ($driverslist as $key => $value) {
                              ?>
                              <option value="<?= $value['d_id']?>"><?= $value['d_name']?></option>
                            <?php                              
                            }
                            ?>
                          </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Salary<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($salarydetails)) ? $salarydetails[0]['salary']:'' ?>" id="c_mobile" name="salary" placeholder="Salary">
                      </div>
                    </div>
                    <!--<div class="col-sm-6 col-md-4">-->
                    <!--  <div class="form-group">-->
                    <!--     <label class="form-label">Allowance</label>-->
                    <!--      <input type="text" required="true" class="form-control" value="<?php echo (isset($salarydetails)) ? $salarydetails[0]['allowance']:'' ?>" id="allowance" name="allowance" placeholder="Allowance">-->

                    <!--  </div>-->
                    <!--</div>-->
                  
                  </div>
                 <!-- <input type="hidden" id="c_created_date" name="c_created_date" value="<?php //echo date('Y-m-d h:i:s'); ?>"> -->
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($salarydetails))?'Update Salary':'Add Salary' ?></button>
      </div>
    </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



