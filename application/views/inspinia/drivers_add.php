    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 head_box">
            <h1 class="m-0 text-dark"><?php echo (isset($driverdetails))?'Edit staff':'Add staff' ?>
            </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <style type="text/css">
      .driverdata{
        display: none;
      }
    </style>
    <section class="content">
      <div class="container-fluid">
        <form method="post" id="add_driver" class="card" enctype="multipart/form-data" action="<?php echo base_url();?>drivers/<?php echo (isset($driverdetails))?'updatedriver':'insertdriver'; ?>">
                <div class="card-body">


                  <div class="row white_bg">
                    <div class="col-sm-6 col-md-3">
                        <label class="form-label">Staff Category<span class="form-required">*</span></label>
                      <div class="form-group">
                        <select class="form-control" id="staff_category" name="st_cat_id">
                          <option value="">Select Category</option>
                             <?php
                               foreach ($staff_category as $key => $value) {
                                ?>
                                <option value="<?= $value['st_id']?>" <?= (isset($driverdetails) && $driverdetails[0]['st_cat_id'] == $value['st_id'])?'selected':'' ?>><?= $value['type_name']?></option>
                              <?php
                               }
                              ?>
                        </select>
                      </div>
                    </div>
                    <?php if(isset($driverdetails)) { ?>
                   <input type="hidden" name="d_id" id="d_id" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_id']:'' ?>" >
                 <?php } ?>
                    <div class="col-sm-6 col-md-3">
                        <label class="form-label">Staff Name<span class="form-required">*</span></label>
                      <div class="form-group">
                        <input type="text" name="d_name" id="d_name" class="form-control" placeholder="Name" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_name']:'' ?>" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Mobile<span class="form-required">*</span></label>
                        <input type="text" name="d_mobile" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_mobile']:'' ?>" class="form-control" placeholder="Mobile" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Date Of Birth<span class="form-required">*</span></label>
                        <input type="date" name="dob" id="dob" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['dob']:'' ?>" class="form-control" placeholder="Date Of Birth" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Education<span class="form-required">*</span></label>
                        <input type="text" name="education" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['education']:'' ?>" class="form-control" placeholder="Education" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Blood Group<span class="form-required">*</span></label>
                        <input type="text" name="blood_grp" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['blood_grp']:'' ?>" class="form-control" placeholder="Blood Group" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Designation<span class="form-required">*</span></label>
                        <input type="text" name="designation" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['designation']:'' ?>" class="form-control" placeholder="Designation" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Cast<span class="form-required">*</span></label>
                        <input type="text" name="cast" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['cast']:'' ?>" class="form-control" placeholder="Cast" >
                      </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Resident City<span class="form-required">*</span></label>
                        <input type="text" name="city" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['city']:'' ?>" class="form-control" placeholder="City" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">CNIC No<span class="form-required">*</span></label>
                        <input type="text" name="cnic_no" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['cnic_no']:'' ?>" class="form-control" placeholder="CNIC No" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Total Family Members<span class="form-required">*</span></label>
                        <input type="text" name="family_detail" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['family_detail']:'' ?>" class="form-control" placeholder="Total Family Members No" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Emergency Contat No 1<span class="form-required">*</span></label>
                        <input type="text" name="e_c_no" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['e_c_no']:'' ?>" class="form-control" placeholder="Emergency Contat No 1" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Emergency Contat No 2<span class="form-required">*</span></label>
                        <input type="text" name="alt_e_c_no" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['e_c_no']:'' ?>" class="form-control" placeholder="Emergency Contat No 2" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                        <label class="form-label">Date of Joining<span class="form-required">*</span></label>
                        <input type="text" name="d_doj" value="<?php echo (isset($driverdetails)) ? date(dateformat(), strtotime($driverdetails[0]['d_doj'])):'' ?>" class="form-control datepicker" placeholder="Date of Joining" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Contract Expiry<span class="form-required">*</span></label>
                        <input type="text" name="con_expiry" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['con_expiry']:'' ?>" class="form-control datepicker" placeholder="Contract Expiry" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3 driverdata">
                      <div class="form-group">
                        <label class="form-label">License Category<span class="form-required">*</span></label>
                        <input type="text" name="d_licenseno" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_licenseno']:'' ?>" class="form-control" placeholder="License No" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3 driverdata">
                      <div class="form-group">
                        <label class="form-label">License No<span class="form-required">*</span></label>
                        <input type="text" name="d_licenseno" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_licenseno']:'' ?>" class="form-control" placeholder="License No" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3 driverdata">
                      <div class="form-group">
                        <label class="form-label">License Expiry Date<span class="form-required">*</span></label>
                        <input type="text" name="d_license_expdate" value="<?php echo (isset($driverdetails)) ? date(dateformat(), strtotime($driverdetails[0]['d_license_expdate'])):'' ?>" class="form-control datepicker" placeholder="License Expiry Date" >
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3" style="display: none;">
                        <div class="form-group">
                        <label class="form-label">Total Experiance<span class="form-required">*</span></label>
                        <input type="text" name="d_total_exp" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_total_exp']:'' ?>" class="form-control" placeholder="Total Experiance" >
                      </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-3" style="display: none;">
                        <div class="form-group">
                        <label class="form-label">Reference/Notes</label>
                        <input type="text" name="d_ref" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_ref']:'' ?>" class="form-control" placeholder="Reference or Notes" >
                      </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="d_is_active" class="form-label">Staff Status</label>
                        <select id="d_is_active" name="d_is_active" class="form-control " required="">
                            <option value="">Choose Staff Status</option>
                          <option <?php echo (isset($driverdetails) && $driverdetails[0]['d_is_active']==0) ? 'selected':'' ?> value="0">Inactive</option> 
                          <option <?php echo (isset($driverdetails) && $driverdetails[0]['d_is_active']==1) ? 'selected':'' ?> value="1">Active</option> 
                          
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                      <label class="form-label">Staff Photo</label>
                      <input type="file" id="file" name="file" class="form-control"/>
                    </div>
                    </div>
                    
                    </div>
                    <div class="row white_bg">
                      <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                        <label class="form-label">Permanent Address<span class="form-required">*</span></label>
                        <textarea class="form-control" autocomplete="off" placeholder="Permanent Address"  name="d_address"><?php echo (isset($driverdetails)) ? $driverdetails[0]['d_address']:'' ?></textarea>
                        
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                        <label class="form-label">Residential Address<span class="form-required">*</span></label>
                        <textarea class="form-control" autocomplete="off" placeholder="Residential Address"  name="r_address"><?php echo (isset($driverdetails)) ? $driverdetails[0]['r_address']:'' ?></textarea>
                        
                      </div>
                    </div>
                    </div>
                    
                </div>
                 <div class="tabs_wrap">
                <ul class="tabs">
                  <li class="tab-link current" data-tab="tab-1">Reference</li>
                  <li class="tab-link" data-tab="tab-2">Experience</li>
                  <li class="tab-link" data-tab="tab-3">Salary</li>
                </ul>

                <div id="tab-1" class="tab-content current">
                  <div class="table-responsive table_design">
                    <table class="table">
                      <h3>Reference Detail</h3>
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Position</th>
                          <th scope="col">Company</th>
                          <th scope="col">Phone</th>
                        </tr>
                      </thead>
                      <tbody id="petrcontent">
                     
                              <tr id="" >
                                 
                                  <td scope="col">
                                    <input class="form-control"   placeholder="Name" type="text" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_ref']:'' ?>" name="d_ref" /></td>
                                  <td scope="col">
                                    <input class="form-control"  placeholder="Position" type="text" name="ref_position" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['ref_position']:'' ?>" />
                                  </td>
                                  <td scope="col">
                                    <input class="form-control" placeholder="Company" type="text" name="ref_company" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['ref_company']:'' ?>" />
                                  </td>
                                   <td scope="col">
                                    <input class="form-control" placeholder="Phone" type="text" name="ref_phone" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['ref_phone']:'' ?>" />
                                  </td>
                              </tr>
                             
                      </tbody>

                    </table>
                  </div>
                </div>
                <div id="tab-2" class="tab-content">
                  <div class="table_design table-responsive">
                    <table class="table">   
                      <h3>Trip Routes</h3>
                      <thead>
                        <tr>
                          <th scope="col">Name Of Organization</th>
                          <th scope="col">Address</th>
                          <th scope="col">Duration</th>
                          <th scope="col">Experience Detail</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody id="routecontent">
                          <?php
                          $routeindex = 0;
                          if(isset($staff_exp) && $staff_exp)
                          {
                              foreach($staff_exp as $k=> $v)
                              {
                                  $routeindex++;
                                  ?>
                                    <tr id="row_<?= $routeindex ?>" >
                          <td scope="col"><input type="hidden"  name="route[id][]"  value="<?= $v['id'] ?>" /><input class="form-control weight" placeholder="Name Of Organization" type="text" name="route[name][]"  value="<?= $v['name'] ?>"/></td>
                          <td scope="col"><input class="form-control weight" placeholder="Address" type="text" name="route[address][]"  value="<?= $v['address'] ?>"/></td>
                          <td scope="col"><input class="form-control" placeholder="Duration" type="text" name="route[duration][]"  value="<?= $v['duration'] ?>"  /></td>
                          <td scope="col"><input class="form-control" placeholder="Detail" type="textarea" name="route[detail][]"  value="<?= $v['detail'] ?>" readonly="true"  /></td>
                          <td scope="col"><button class="btn btn-danger" target="#routecontent" onclick="del_row(<?= $routeindex; ?>)">-</button></td>
                        </tr>
                                  <?php
                              }
                          }
                          ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              
                              <td  colspan="12" style="text-align: right;"><button style="background: #007137;font-size: 12px;"  type="button" index="<?= $routeindex+1 ?>" class="add_more btn btn-success" target="#routecontent" content='
                          <tr id="row_index" >
                          <td scope="col">
                            <input class="form-control weight" placeholder="Name Of Organization" type="text" name="route[name][]" />
                          </td>
                          <td scope="col">
                           <input class="form-control weight" placeholder="Address" type="text" name="route[address][]" />
                          </td>

                          <td scope="col"><input class="form-control" placeholder="Duration" type="text" name="route[duration][]" /></td>
                          <td scope="col"><input class="form-control" placeholder="Experience Detail" type="text" name="route[detail][]" /></td>
                          <td scope="col"><button class="btn btn-danger" target="#routecontent" onclick="del_row(index)">-</button></td>
                        </tr>
                          '><i class="fa fa-plus"></i> Add More</button></td>
                          </tr>
                      </tfoot>
                    </table>
                    </div>
                </div>
                <div id="tab-3" class="tab-content">
                  <div class="table-responsive table_design">
                    <table class="table">
                      <h3>Reference Detail</h3>
                      <thead>
                        <tr>
                          <th scope="col">Salary</th>
                          <th scope="col">Allowance</th>
                        </tr>
                      </thead>
                      <tbody id="petrcontent">
                     
                              <tr id="" >
                                 
                                  <td scope="col">
                                    <input class="form-control"   placeholder="Salary" type="text" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_ref']:'' ?>" name="d_ref" /></td>
                                  <td scope="col">
                                    <input class="form-control"  placeholder="Allowance" type="text" name="ref_position" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['ref_position']:'' ?>" />
                                  </td>
                                 
                              </tr>
                             
                      </tbody>

                    </table>
                  </div>
                </div>
                      
            </div>

                  <input type="hidden" id="d_created_by" name="d_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
                   <input type="hidden" id="d_created_date" name="d_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary"> <?php echo (isset($driverdetails))?'Update Staff':'Add Staff' ?></button>
                </div>
              </form>
             </div>
    </section>
    <!-- /.content -->
<script type="text/javascript">
$(document).ready(function(){
  
  $('ul.tabs li').click(function(){
    var tab_id = $(this).attr('data-tab');

    $('ul.tabs li').removeClass('current');
    $('.tab-content').removeClass('current');

    $(this).addClass('current');
    $("#"+tab_id).addClass('current');
  })

})
</script>
<script type="text/javascript">
  $('#staff_category').on('change',function(){
    var val = $(this).val();
    $('.driverdata').css({"display":"none"});
    if(val == 1){
      $('.driverdata').css({"display":"block"});
    }
  })
</script>

