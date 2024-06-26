<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Settings
            </h1>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title m-0 text-dark">Website Setting</h3>
         </div>
         <div class="ibox-content">
         <form id="addnewcategory" class="basicvalidation" role="form" action="websitesetting_save" method="post" class="col-md-6" enctype='multipart/form-data'>
            <div class="card-body ">
               <div class="row">
                  <div class="col-sm-6 col-md-4">
                     <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_companyname'])?$website_setting[0]['s_companyname']:''); ?>" id="s_companyname" name="s_companyname" placeholder="Enter Company Name">
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                     <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_address'])?$website_setting[0]['s_address']:''); ?>" id="s_address" name="s_address" placeholder="Enter Address">
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                     <div class="form-group">
                        <label>Googel API Key</label>
                        <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_googel_api_key'])?$website_setting[0]['s_googel_api_key']:''); ?>" id="s_googel_api_key" name="s_googel_api_key" placeholder="Enter Address">
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                     <div class="form-group">
                        <label>Invoice Prefix</label>
                        <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_inovice_prefix'])?$website_setting[0]['s_inovice_prefix']:''); ?>" id="s_inovice_prefix" name="s_inovice_prefix" placeholder="Enter Invoice Prefix">
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                     <div class="form-group">
                        <label>Currency Prefix</label>
                        <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_price_prefix'])?$website_setting[0]['s_price_prefix']:''); ?>" id="s_price_prefix" name="s_price_prefix" placeholder="Enter Currency Prefix">
                     </div>
                  </div>
                  
                  <div class="col-sm-6 col-md-4">
                     <div class="form-group">
                        <label>Inovice Service Name</label>
                        <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['s_inovice_servicename'])?$website_setting[0]['s_inovice_servicename']:''); ?>" id="s_inovice_servicename" name="s_inovice_servicename" placeholder="Inovice Service Name">
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                     <div class="form-group">
                        <label>Inovice Terms and condition</label>
                        <textarea id="s_inovice_termsandcondition" name="s_inovice_termsandcondition" rows="4" cols="50" class="form-control" required="true" placeholder="Enter Currency Prefix"><?php echo output(isset($website_setting[0]['s_inovice_termsandcondition'])?$website_setting[0]['s_inovice_termsandcondition']:''); ?>
                        </textarea>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                     <div class="form-group">
                        <label for="exampleInputFile">Logo</label>
                        <div class="input-group"> 
                           <input type="file" class="form-control" id="file" name="file" <?php echo output(($website_setting[0]['s_logo']!='')?'disabled=true':''); ?>>
                        </div>
                        <span  class="bg-gradient-success btn-xs">Image sholud be in 50 X 50px and png format</span>
                     </div>
                     <?php if($website_setting[0]['s_logo']!='') { ?>
                     <img src = "<?= base_url().'assets/uploads/'.$website_setting[0]['s_logo']; ?>" alt = "Logo" height = "50" width = "50" />
                     <button type="button" class="logodelete btn btn-primary">Delete</button>
                     <?php } ?>
                  </div>
                  <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label for="s_date_format" class="form-label">Date Format</label>
                        <select id="s_date_format" name="s_date_format" class="form-control " required="">
                         <option <?php echo (isset($website_setting) && $website_setting[0]['s_date_format']=='Y-m-d H:i') ? 'selected':'' ?> value="Y-m-d H:i">Y-m-d H:i</option>
                          <option <?php echo (isset($website_setting) && $website_setting[0]['s_date_format']=='m-d-Y H:i') ? 'selected':'' ?> value="m-d-Y H:i">m-d-Y H:i</option> 
                          <option <?php echo (isset($website_setting) && $website_setting[0]['s_date_format']=='d-m-Y H:i') ? 'selected':'' ?> value="d-m-Y H:i">d-m-Y H:i</option> 
                        </select>
                      </div>
                    </div>  
                    <div class="col-sm-6 col-md-4">
                     <div class="form-group">
                        <label>background color 1</label>
                        <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['color_1'])?$website_setting[0]['color_1']:''); ?>" id="color_1" name="color_1" placeholder="color 1">
                     </div>
                  </div>
                 <div class="col-sm-6 col-md-4">
                     <div class="form-group">
                        <label>background color 2</label>
                        <input type="text" class="form-control" required="true" value="<?php echo output(isset($website_setting[0]['color_2'])?$website_setting[0]['color_2']:''); ?>" id="color_2" name="color_2" placeholder="color 2">
                     </div>
                  </div>
                  
                   <div style="padding-top: 13px;" class="col-md-12 btn-block text-right mt-3 border border-dark border-top">
                            <button type="submit" class="btn btn-primary  ">Submit</button>
                  </div>
               </div>
            </div>
        
         </form>
      </div>
      </div>
   </div>
</section>