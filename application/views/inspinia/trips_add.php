    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 p-0 head_box">
            <h1 class="m-0 text-dark"><?php echo (isset($tripdetails['detail']))?'Edit Voucher':'Add Voucher' ?>
            </h1>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Main content -->
    <section class="content" style="overflow:hidden;">
      <div class="container-fluid">
         <div class="ibox-content " style="overflow:hidden;">
       <form method="post" id="trip_add" class="card"  action="<?php echo base_url();?>Trips/<?php echo (isset($tripdetails['detail']))?'updatetrips':'inserttrips'; ?>">
         <div class="card-body">
            <div class="row">
              <?php if(isset($tripdetails)) { ?>
               <input type="hidden" name="t_id" id="t_id" value="<?php echo (isset($tripdetails['detail'])) ? $tripdetails['detail']['t_id']:'' ?>" >
              <?php } ?>     
                        
               <div class="col-sm-6 col-md-3">
                  <label class="form-label">Customer Name<span class="form-required">*</span></label>
                  <div class="form-group">
                     <select id="t_customer_id"  class="form-control" required="true" name="t_customer_id">
                        <option value="">Select Customer</option>
                        <?php foreach ($customerlist as $key => $customerlists) { ?>
                        <option <?php if((isset($tripdetails)) && $tripdetails['detail']['t_customer_id'] == $customerlists['c_id']){ echo 'selected';} ?> value="<?php echo output($customerlists['c_id']) ?>"><?php echo output($customerlists['c_name']) ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Vechicle<span class="form-required">*</span></label>
                     <select id="t_vechicle"  class="form-control"  name="t_vechicle" >
                        <option value="">Select Vechicle</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option <?php if((isset($tripdetails)) && $tripdetails['detail']['t_vechicle'] == $vechiclelists['v_id']){ echo 'selected';} ?> value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Serial No<span class="form-required">*</span></label>
                     <input type="text" name="t_trackingcode" value="<?php echo (isset($tripdetails)) ? $tripdetails['detail']['t_trackingcode']:'' ?>"  class="form-control t_trackingcode"  readonly="true">
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Driver<span class="form-required">*</span></label>
                     <select id="t_driver"  class="form-control"  name="t_driver">
                       <option value="">Select Driver</option>
                        <?php  foreach ($driverlist as $key => $driverlists) { ?>
                        <option <?php if((isset($tripdetails)) && $tripdetails['detail']['t_driver'] == $driverlists['d_id']){ echo 'selected';} ?> value="<?php echo output($driverlists['d_id']) ?>"><?php echo output($driverlists['d_name']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Approx Total KM<span class="form-required">*</span></label>
                     <input type="text" id="appp_km" readonly="true" value="<?php echo (isset($tripdetails)) ? $tripdetails['detail']['t_totaldistance']:'' ?>"  name="t_totaldistance" id="t_totaldistance" class="form-control" placeholder="Approx Total KM">
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Start Meter<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? date(datetimeformat(), strtotime($tripdetails['detail']['t_start_date'])):'' ?>" name="t_start_date" value="" class="form-control" placeholder="Start Meter">
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">End Meter<span class="form-required">*</span></label>
                     <input type="text" onkeyup="cal_distance()" value="<?php echo (isset($tripdetails)) ? date(datetimeformat(), strtotime($tripdetails['detail']['t_end_date'])):'' ?>" name="t_end_date" value="" class="form-control" placeholder="End Meter">
                  </div>
               </div>
                
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Trip Start Date<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? date(datetimeformat(), strtotime($tripdetails['detail']['t_start_date'])):'' ?>" name="t_start_date" value="" class="form-control datetimepicker" placeholder="Trip Start Date">
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Trip End Date<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? date(datetimeformat(), strtotime($tripdetails['detail']['t_end_date'])):'' ?>" name="t_end_date" value="" class="form-control datetimepicker" placeholder="Trip End Date">
                  </div>
               </div>
                

            </div>

            <div class="tabs_wrap">
                <ul class="tabs">
                  <li class="tab-link current" data-tab="tab-1">Petrol Detail</li>
                  <li class="tab-link" data-tab="tab-2">Trip Routes</li>
                  <li class="tab-link" data-tab="tab-3">Trip Expense</li>
                </ul>

                <div id="tab-1" class="tab-content current">
                  <div class="table-responsive table_design">
                    <table class="table">
                      <h3>Petrol Detail</h3>
                      <thead>
                        <tr>
                          <th scope="col">Pump Name</th>
                          <th scope="col">Deisel Quantity</th>
                          <th scope="col">Rate</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody id="petrcontent">
                      <?php
                      $fuelindex = 0;
                      if(isset($tripdetails['fuel']) && $tripdetails['fuel'])
                      {
                          foreach($tripdetails['fuel'] as $k=> $v)
                          {
                              $fuelindex++;
                              ?>
                              <tr id="pet_<?= $fuelindex ?>" >
                                  <td scope="col">
                                      <select name="petrol[name][]" class="form-control">
                                          <?php
                                          foreach ($pumps as $key => $value) {
                                          ?>
                                          <option value="<?=$value['id'] ?>" <?= $v['name'] == $value['id']?'selected':''; ?> ><?=$value['name'] ?></option>
                                      <?php
                                      }
                                      ?></td>
                                  <td scope="col"><input class="form-control dqty" key="index"onkeyup="cal_distance()" id="dqty_index" placeholder="Deisel Quantity" type="text" value="<?= $v['fuel_quantity'] ?>" name="petrol[fuel_quantity][]" /></td>
                                  <td scope="col"><input class="form-control"onkeyup="cal_distance()" id="drate_index"  key="index" placeholder="Rate" type="text" name="petrol[rate][]" value="<?= $v['rate'] ?>" /></td>
                                  <td scope="col"><input class="form-control" readonly="true"  id="dtot_index" placeholder="Deisel" type="text" name="petrol[amount][]" value="<?= $v['amount'] ?>" /></td>
                                  <td scope="col"><button type="button" class="btn btn-danger"  onclick="del_pet(<?= $fuelindex ?>)">-</button></td>
                              </tr>
                              <?php
                          }
                      }
                      ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <td colspan="12" style="text-align: right;"><button style="background: #007137;font-size: 12px;"  type="button" index="<?= $fuelindex +1 ?>" class="add_more btn btn-success" target="#petrcontent" content='
                          <tr id="pet_index" >
                          <td scope="col">
                            <select name="petrol[name][]" class="form-control">
                              <?php
                                foreach ($pumps as $key => $value) {
                                  ?>
                                    <option value="<?=$value['id'] ?>"><?=$value['name'] ?></option>
                                  <?php
                                }
                              ?>
                              </select>
                            </td>
                          <td scope="col"><input class="form-control dqty" key="index"onkeyup="cal_distance()" id="dqty_index" placeholder="Deisel Quantity" type="text" name="petrol[fuel_quantity][]" /></td>
                          <td scope="col"><input class="form-control"onkeyup="cal_distance()" id="drate_index"  key="index" placeholder="Rate" type="text" name="petrol[rate][]" /></td>
                          <td scope="col"><input class="form-control" readonly="true"  id="dtot_index" placeholder="Deisel" type="text" name="petrol[amount][]" /></td>
                          <td scope="col"><button type="button" class="btn btn-danger"  onclick="del_pet(index)">-</button></td>
                        </tr>
                          '>  <i class="fa fa-plus"></i> Add More</button></td>
                          </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
                <div id="tab-2" class="tab-content">
                  <div class="table_design table-responsive">
                    <table class="table">   
                      <h3>Trip Routes</h3>
                      <thead>
                        <tr>
                          <th scope="col">From</th>
                          <th scope="col">To</th>
                          <th scope="col">Weight</th>
                          <th scope="col">Unit Price</th>
                          <th scope="col">Wages</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody id="routecontent">
                          <?php
                          $routeindex = 0;
                          if(isset($tripdetails['route']) && $tripdetails['route'])
                          {
                              foreach($tripdetails['route'] as $k=> $v)
                              {
                                  $routeindex++;
                                  ?>
                                    <tr id="row_<?= $routeindex ?>" >
                          <td scope="col">
                            <select name="route[route_from][]" class="form-control">
                              <?php
                                foreach ($routes as $key => $value) {
                                  ?>
                                    <option value="<?=$value['id'] ?>"><?=$value['name'] ?></option>
                                  <?php
                                }
                              ?>
                              </select>
                          </td>
                          <td scope="col"><input class="form-control" placeholder="To" type="text" name="route[route_to][]" value="<?= $v['route_to'] ?>" /></td>
                          <td scope="col"><input class="form-control weight" placeholder="Weight" type="text" name="route[weight][]"  value="<?= $v['weight'] ?>" onkeyup="cal_wages(<?=  $routeindex ?>)" /></td>
                          <td scope="col"><input class="form-control unit_price" placeholder="Unit Price" type="text" name="route[unit_price][]"  value="<?= $v['unit_price'] ?>"  onkeyup="cal_wages(<?= $routeindex ?>)" /></td>
                          <td scope="col"><input class="form-control wages" placeholder="Wages" type="text" name="route[wages][]"  value="<?= $v['total'] ?>" readonly="true"  /></td>
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

                            <select name="route[route_from][]" class="form-control">
                              <?php
                                foreach ($routes as $key => $value) {
                                  ?>
                                    <option value="<?=$value['name'] ?>"><?=$value['name'] ?></option>
                                  <?php
                                }
                              ?>
                            </select>
                          </td>
                          <td scope="col">
                           <select name="route[route_to][]" class="form-control">
                              <?php
                                foreach ($routes as $key => $value) {
                                  ?>
                                    <option value="<?=$value['name'] ?>"><?=$value['name'] ?></option>
                                  <?php
                                }
                              ?>
                            </select>
                          </td>
                          <td scope="col"><input class="form-control weight" placeholder="Weight" type="text" name="route[weight][]" onkeyup="cal_wages(index)" /></td>
                          <td scope="col"><input class="form-control unit_price" placeholder="Unit Price" type="text" name="route[unit_price][]"  onkeyup="cal_wages(index)" /></td>
                          <td scope="col"><input class="form-control wages" placeholder="Wages" type="text" name="route[wages][]" readonly="true"  /></td>
                          <td scope="col"><button class="btn btn-danger" target="#routecontent" onclick="del_row(index)">-</button></td>
                        </tr>
                          '><i class="fa fa-plus"></i> Add Route</button></td>
                          </tr>
                      </tfoot>
                    </table>
                    </div>
                </div>
                <div id="tab-3" class="tab-content">
                  <div class="table_design table-responsive">
                    <table class="table">
                        
                    <h3>Trip Expense</h3>
                    <thead>
                      <tr>
                        <th scope="col">Expense</th>
                        <th scope="col">Amount</th>
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
                                <td scope="col"><input class="form-control expense" onkeyup="cal_distance()" type="text" placeholder="Amount" value="<?= $v['amount'] ?>" name="expense[amount][]" onkeyup="cal_distance()" /></td>
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
                                <td scope="col"><input class="form-control expense" onkeyup="cal_distance()" type="text" placeholder="Amount" name="expense[amount][]" onkeyup="cal_distance()"  /></td>
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
                        '><i class="fa fa-plus"></i> Add Expense</button></td>
                        </tr>
                    </tfoot>
                  </table>
                  </div>
                </div>
                
                    
                             <div class="row" style="padding-top: 30px;">
                                  <div class="col-md-6">
                                    <div class="form-floating">
                                      <label for="floatingTextarea">Complain</label>
                                        <textarea class="form-control" name="cmt" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                        
                                      </div>
                                      </div>
                                  <div class="col-md-6">
                                    <form>
                                        <div class="col-sm-6 col-md-12">
                  <div class="form-group">
                     <label class="form-label">Total Amount<span class="form-required">*</span></label>
                     <input type="text" id="tot_amount" readonly="true" value="<?php echo (isset($tripdetails)) ? $tripdetails['detail']['t_trip_amount']:'' ?>" name="tot_amount" value="" class="form-control" placeholder="Total Amount">
                  </div>
               </div>
                <div class="col-sm-6 col-md-12">
                  <div class="form-group">
                     <label class="form-label">Total Expense<span class="form-required">*</span></label>
                     <input type="text" id="tot_exp" readonly="true" value="<?php echo (isset($tripdetails)) ? $tripdetails['detail']['t_exp_amount']:'' ?>" name="t_exp_amount" value="" class="form-control" placeholder="Total Expense">
                  </div>
               </div>
                <div class="col-sm-6 col-md-12">
                  <div class="form-group">
                     <label class="form-label">Grand Total<span class="form-required">*</span></label>
                     <input type="text" id="grand_total" readonly="true" value="<?php echo (isset($tripdetails)) ? $tripdetails['detail']['t_trip_amount']- $tripdetails['detail']['t_exp_amount']:'' ?>" value="" class="form-control" placeholder="Total Expense">
                  </div>
               </div>
                                        
                                    </form>
                                  </div>
                             
                              </div>
                      
            </div>

            <input type="hidden" id="t_created_by" name="t_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
            <input type="hidden" id="t_created_date" name="t_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">

            <div class="card-footer text-right">
               <button type="submit" class="btn btn-primary"> <?php echo (isset($tripdetails))?'Update Trip':'Add Trip' ?></button>
            </div>
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
	$('#t_vechicle').on('change',function(){
		var id = $(this).val();
		$('.t_trackingcode').val('');
		if(id != ''){
		$.ajax({
        url: '<?php echo base_url('trips/generate_serial_no')?>',
        type: "Post",
        async: true,
        data: { id:id},
        success: function (data) {
           if(data){
           	$('.t_trackingcode').val(data);
           }
        }
    });
	}
		
	})
	 
</script>
