    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 margin-left-15">
            <h1 class="m-0 text-dark"><?php echo (isset($vehicledescriptions))?'Edit Vehicle Group':'Add Vehicle Group' ?>
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
                            
        <form method="post" id="vehicle_add" class="card" action="<?php echo base_url();?>vehicle/<?php echo (isset($vehicledescriptions))?'updatevehicle':'addgroup'; ?>" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <?php if(isset($vehicledescriptions)) { ?>
                   <input type="hidden" name="v_id" id="v_id" value="<?php echo (isset($vehicledescriptions)) ? $vehicledescriptions[0]['v_id']:'' ?>" >
                    <?php } ?>
                    <div class="col-sm-6 col-md-3">
                        <label class="form-label">Group Number</label>
                      <div class="form-group">
                        <input type="text" name="gr_name" id="v_grp_name" class="form-control" placeholder="Group Name" value="<?php echo (isset($vehicledescriptions)) ? $vehicledescriptions[0]['v_registration_no']:'' ?>">
                      </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Group Description</label>
                        <input type="text" name="gr_desc" value="<?php echo (isset($vehicledescriptions)) ? $vehicledescriptions[0]['v_chassis_no']:'' ?>" class="form-control" placeholder="Group Description">
                      </div>
                    </div>
                   

                    </div>
                    
                    


                    <hr>
                </div>
                  
                  <div class="tabs_wrap">
                <ul class="tabs">
                  <li class="tab-link current" data-tab="tab-1">Parts Description</li>
                  
                </ul>

                <div id="tab-1" class="tab-content current">
                  <div class="table-responsive table_design">
                    <table class="table">
                      <h3>Parts Description</h3>
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">description</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody id="petrcontent">
                      <?php
                      $fuelindex = 0;
                      if(isset($tripdescriptions['fuel']) && $tripdescriptions['fuel'])
                      {
                          foreach($tripdescriptions['fuel'] as $k=> $v)
                          {
                              $fuelindex++;
                              ?>
                              <tr id="pet_<?= $fuelindex ?>" >
                                  <td scope="col"><input type="text" class="form-control" key ="index" name="parts[name][]" >
                                      </td>
                                  <td scope="col"><input class="form-control dqty" key="index"  id="dqty_index" placeholder="Deisel Quantity" type="text" value="<?= $v['description'] ?>" name="parts[description][]" /></td>
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
                          <input type="text" class="form-control" key ="index" name="parts[name][]" >
                            </td>
                          <td scope="col"><input class="form-control dqty" key="index" id="dqty_index" placeholder="Description" type="text" name="parts[description][]" /></td>
                          
                          <td scope="col"><button type="button" class="btn btn-danger"  onclick="del_pet(index)">-</button></td>
                        </tr>
                          '>  <i class="fa fa-plus"></i> Add More</button></td>
                          </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
                      
                      
            </div>
                   <input type="hidden" id="gr_created_date" name="gr_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary"> <?php echo (isset($vehicledescriptions))?'Update Vehicle Group':'Add Vehicle Group' ?></button>
                </div>
              </form>
                        </div>
                    </div>
                </div>
             </div>
    </section>
    <!-- /.content -->



