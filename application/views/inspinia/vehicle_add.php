    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 margin-left-15">
            <h1 class="m-0 text-dark"><?php echo (isset($vehicledetails))?'Edit Vehicle':'Add Vehicle' ?>
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

        <form method="post" id="vehicle_add" class="card" action="<?php echo base_url();?>vehicle/<?php echo (isset($vehicledetails))?'updatevehicle':'insertvehicle'; ?>" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <?php if(isset($vehicledetails)) { ?>
                   <input type="hidden" name="v_id" id="v_id" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_id']:'' ?>" >
                    <?php } ?>
                    <div class="col-sm-6 col-md-3">
                        <label class="form-label">Registration Number</label>
                      <div class="form-group">
                        <input type="text" name="v_registration_no" id="v_registration_no" class="form-control" placeholder="Registration Number" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_registration_no']:'' ?>">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <label class="form-label">Vehicle Name</label>
                      <div class="form-group">
                        <input type="text" name="v_name" id="v_name" class="form-control" placeholder="Vehicle Name" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_name']:'' ?>">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Model</label>
                        <input type="text" name="v_model" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_model']:'' ?>" class="form-control" placeholder="Model">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Chassis No</label>
                        <input type="text" name="v_chassis_no" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_chassis_no']:'' ?>" class="form-control" placeholder="Chassis No">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Engine No</label>
                        <input type="text" name="v_engine_no" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_engine_no']:'' ?>" class="form-control" placeholder="Engine No">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Manufactured By</label>
                        <input type="text" name="v_manufactured_by" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_manufactured_by']:'' ?>" class="form-control" placeholder="Manufactured By">
                      </div>
                    </div>
                     <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Vehicle Type</label>
                        <select id="v_type" name="v_type" class="form-control " required="">
                         <option value="">Select Vehicle Type</option> 
                          <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_type']=='CAR') ? 'selected':'' ?> value="CAR">CAR</option> 
                          <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_type']=='MOTORCYCLE') ? 'selected':'' ?> value="MOTORCYCLE">MOTORCYCLE</option> 
                          <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_type']=='TRUCK') ? 'selected':'' ?> value="TRUCK">TRUCK</option> 
                          <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_type']=='BUS') ? 'selected':'' ?> value="BUS">BUS</option> 
                           <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_type']=='TAXI') ? 'selected':'' ?> value="TAXI">TAXI</option> 
                           <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_type']=='BICYCLE') ? 'selected':'' ?> value="BICYCLE">BICYCLE</option> 
                        </select>

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="v_color" class="form-label">Vehicle Color<small> (To show in Map)</small></label>
                        <input id="add-device-color" name="v_color" class="jscolor {valueElement:'add-device-color', styleElement:'add-device-color', hash:true, mode:'HSV'} form-control"  value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_color']:'#D6E1F3' ?>" required>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="v_color" class="form-label">Driver 1</label>
                        <select class="form-control select2" required="true" name ="driver_1">
                        	<option>Select Driver</option>
                        	<?php
                        		foreach ($driver1 as $key => $value) {
                        	?>
                        	<option value="<?= $value['d_id']?>" <?php echo (isset($vehicledetails) && $vehicledetails[0]['driver_1'] == $value['d_id']) ? 'selected':'' ?>><?= $value['d_name']?></option>
                        	<?php
                        		}
                        	?>
                        	
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="v_color" class="form-label">Driver 2</label>
                        <select class="form-control select2" required="true" name ="driver_2">
                        	<option>Select Driver</option>
                        	<?php
                        		foreach ($driver1 as $key => $value) {
                        	?>
                        	<option value="<?= $value['d_id']?>" <?php echo (isset($vehicledetails) && $vehicledetails[0]['driver_2'] == $value['d_id']) ? 'selected':'' ?>><?= $value['d_name']?></option>
                        	<?php
                        		}
                        	?>
                        	
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="v_color" class="form-label">Helper</label>
                        <select class="form-control select2" required="true" name ="helper">
                        	<option>Select Helper</option>
                        	<?php
                        		foreach ($helper as $key => $value) {
                        	?>
                        	<option value="<?= $value['d_id']?>" <?php echo (isset($vehicledetails) && $vehicledetails[0]['helper'] == $value['d_id']) ? 'selected':'' ?>><?= $value['d_name']?></option>
                        	<?php
                        		}
                        	?>
                        	
                        </select>
                      </div>
                    </div>
                    <?php if(isset($vehicledetails[0]['v_is_active'])) { ?>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="v_is_active" class="form-label">Vehicle Status</label>
                        <select id="v_is_active" name="v_is_active" class="form-control " required="">
                          <option value="">Select Vehicle Status</option> 
                          <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_is_active']==1) ? 'selected':'' ?> value="1">Active</option> 
                          <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_is_active']==0) ? 'selected':'' ?> value="0">Inactive</option> 
                        </select>
                      </div>
                    </div>
                  <?php } ?>
                   <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="v_group" class="form-label">Vehicle Group</label>
                        <select id="v_group" name="v_group" class="form-control " required="">
                          <option value="">Select Vehicle Group</option> 
                          <?php if(!empty($v_group)) { foreach($v_group as $v_groupdata) { ?>
                          <option <?= (isset($vehicledetails[0]['v_group']) && $vehicledetails[0]['v_group'] == $v_groupdata['gr_id'])?'selected':''?> value="<?= $v_groupdata['gr_id'] ?>"><?= $v_groupdata['gr_name'] ?></option> 
                          <?php } } ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                      <label class="form-label">Vehicle Image</label>
                      <input type="file" id="file" name="file" class="form-control"/>
                    </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                      <label class="form-label">Vehicle Document</label>
                      <input type="file" id="file1" name="file1" class="form-control"/>
                    </div>
                    </div>
                    <?php $settings=sitedata(); if(isset($settings['s_traccar_enabled']) && $settings['s_traccar_enabled']==1) { ?>  

                    <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                      <label class="form-label">Traccar Device ID <span title="3 New Messages" class="badge ">(Data sycn based on this value)</span></label>
                      <select id="v_traccar_id" name="v_traccar_id" class="form-control">
                         <option value="">Select Traccar Device ID</option> 
                         <?php if(!empty($traccar_list)) { foreach($traccar_list as $traccar) { ?>
                          <option <?= (isset($vehicledetails[0]['v_traccar_id']) && $vehicledetails[0]['v_traccar_id'] == $traccar['id'])?'selected':''?> value="<?= $traccar['id'] ?>"><?= $traccar['name'] ?></option> 
                          <?php } } ?>
                        </select> 
                    </div>
                    </div>


                   


                    <?php } ?>


                    <hr>
<!--                      <div class="col-sm-12 col-md-12">
                    <div class="tabs_wrap">
                        <ul class="tabs">
                          <li class="tab-link current" data-tab="tab-1">Parts Detail</li>
                        </ul>

                <div id="tab-1" class="tab-content current">
                  <div class="table-responsive table_design">
                    <table class="table">
                                
                            <h3>Trip Expense</h3>
                            <thead>
                              <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody id="expcontent">
                                <?php
                                  $exp_index = 0;
                                  if(isset($tripdetails['expense']) && $tripdetails['expense'])
                                  {
                                      foreach($tripdetails['expense'] as $k=> $v)
                                      {
                                          $exp_index++;
                                          ?>
                                            <tr id="exp_<?= $exp_index ?>" >
                                        <td scope="col">
                                            <input type="hidden" class="form-control" placeholder="Expense" name="expense[expense_id][]" value="<?= $v['expense_id'] ?>" />
                                            <input type="text" class="form-control" placeholder="Expense" name="expense[exp_name][]" value="<?= $v['exp_name'] ?>" readonly="true" />
                                        </td>
                                        <td scope="col"><input <?= ($v['expense_id'] == 19)?'id="des_exp"':''; ?>  class="form-control expense" onkeyup="cal_distance()" type="text" placeholder="Amount" value="<?= $v['amount'] ?>" name="expense[amount][]" onkeyup="cal_distance()" /></td>
                                        <td scope="col"><button class="btn btn-danger " target="#routecontent" onclick="del_exp(<?= $exp_index ?>)">-</button></td>
                                      </tr>
                                          <?php
                                      }
                                  }
                                  else
                                  {
                                  ?>
                                <?php
                                
                                foreach($exp_types as $k=> $v)
                                {
                                    $exp_index++;
                                    ?>
                                    <tr id="exp_<?= $exp_index ?>" >
                                        <td scope="col">
                                            <input type="hidden" class="form-control" placeholder="Expense" name="expense[expense_id][]" value="<?= $v['id'] ?>" />
                                            <input type="text" class="form-control" placeholder="Expense" name="expense[exp_name][]" value="<?= $v['name'] ?>" readonly="true" />
                                        </td>
                                        <td scope="col"><input class="form-control expense" <?= ($v['id'] == 19)?'id="des_exp"':''; ?> onkeyup="cal_distance()" type="text" placeholder="Amount" name="expense[amount][]" onkeyup="cal_distance()"  /></td>
                                        <td scope="col"><button class="btn btn-danger " target="#routecontent" onclick="del_exp(<?= $exp_index ?>)">-</button></td>
                                      </tr>
                                    <?php
                                }
                                  }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    
                                    <td  colspan="12" style="text-align: right;"><button style="background: #007137;font-size: 12px;"  type="button" index="<?= $exp_index ?>" class="add_more btn btn-success" target="#expcontent" content='
                                <tr id="exp_index" >
                                <td scope="col"><input type="hidden" class="form-control" placeholder="Expense" name="expense[expense_id][]" value="0" /><input type="text" class="form-control" placeholder="Expense" name="expense[exp_name][]" /></td>
                                <td scope="col"><input class="form-control expense" type="text" placeholder="Amount" name="expense[amount][]" onkeyup="cal_distance()"  /></td>
                                <td scope="col"><button class="btn btn-danger " target="#routecontent" onclick="del_exp(index)">-</button></td>
                              </tr>
                                '><i class="fa fa-plus"></i> Add Detail</button></td>
                                </tr>
                            </tfoot>
                          </table>
                          </div>
                        </div>
                              
                    </div>
                    </div>
                    </div>
                    
                    

                </div> -->
                  <input type="hidden" id="v_created_by" name="v_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
                                    <input type="hidden" id="v_mileageperlitre" name="v_mileageperlitre" value="0">

                   <input type="hidden" id="v_created_date" name="v_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary"> <?php echo (isset($vehicledetails))?'Update Vehicle':'Add Vehicle' ?></button>
                </div>
              </form>
                        </div>
                    </div>
                </div>
             </div>
    </section>
    <!-- /.content -->


<script type="text/javascript">
  $('#v_group').on('change', function(){
    var id = $(this).val();
      $.ajax({
        url: '<?php echo base_url('vehicle/veh_parts')?>',
        // dataType: "json",
        type: "Post",
        async: true,
        data: { 
          gid : id
        },
        success: function (data) {
           
        }

    });
  })
</script>
