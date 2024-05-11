<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6 margin-left-15">
            <h1 class="m-0 text-dark">Tyres Management
            </h1>
         </div>
         </div>
      </div>
   </div>
</div>
<section class="content">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                  
                        <form method="post" id="trip_add" class="card" action="" novalidate="novalidate">
                           <div class="card-body">
                              <div class="row">
                                     
                                  <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                       <label class="form-label">Tyre No<span class="form-required">*</span></label>
                                       <input type="text" name="t_number" value="" class="form-control" id="tyre_no">
                                    </div>
                                 </div>        
                                 <div class="col-sm-6 col-md-3">
                                    <label class="form-label">Company<span class="form-required">*</span></label>
                                    <div class="form-group">
                                       <select id="tyre_company" class="form-control" required="true" name="tyre_company">
                                          <option value="">Select Company</option>
                                          <?php foreach ($tyreCompany as $key => $value) { ?>
                                          <option value="<?php echo output($value['id']) ?>"><?php echo output($value['name']) ?></option>
                                          <?php  } ?>
                                          </select>
                                    </div>
                                 </div>
                                 
                                 <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                       <?php 
                                          $date =  date('Y-m-d');
                                          $datenew =  date('Y-m-d',(strtotime ( '-30 day' , strtotime ( $date) ) ));
                                       ?>
                                       <label class="form-label">From<span class="form-required">*</span></label>
                                       <input type="text" id="t_start_date" value="<?php echo $datenew ?> 00:00:00" name="t_start_date" class="form-control datetimepicker1" placeholder="Trip Start Date" autocomplete="off">
                                    </div>
                                 </div>
                                 <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                       <label class="form-label">To<span class="form-required">*</span></label>
                                       <input type="text"id="t_end_date" value="<?php echo date('Y-m-d'); ?> 23:59:00"  name="t_end_date" class="form-control datetimepicker1" placeholder="Trip End Date" autocomplete="off">
                                    </div>
                                 </div>
                                   <div class="col-sm-6 card-footer">
                                 <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                              </div>

                              </div>
                              </div>
                        </form>
                    <div class="ibox-content">

                         <table id="tyres-list" class="table table-bordered table-striped table-hover">
                            <thead>
                              <tr>
                                 <th class="w-1">S.No</th>
                                 <th>Tyre Name</th>
                                 <th>Tyre Number</th>
                                 <th>Company</th>
                                 <th>Purchasing Date</th>
                                 <th>Mileage</th>
                                 <th>Price</th>
                                 <?php if(userpermission('lr_vech_list_view') || userpermission('lr_vech_list_edit') || userpermission('lr_vech_del')) { ?>
                                 <th>Action</th>
                                 <?php } ?>
                              </tr>
                           </thead>
                           <tbody>
                             
                           </tbody>
                        </table>

                    </div>
                </div>
            </div>
</section>
<script type="text/javascript">
$(document).ready(function() {
    var dataTable = $('#tyres-list').DataTable({
        "ajax": {
            url : "<?= base_url()?>tyres/tyres_table",
            type : 'POST',
            data: function(d) {
                d.start_date = $('#t_start_date').val();
                d.end_date = $('#t_end_date').val();
                d.tyre_no = $('#tyre_no').val();
                d.tyre_comapny = $('#tyre_company').val();
            }
        },
    });
    $('#submit').click(function(e) {
        e.preventDefault();
        dataTable.ajax.reload();
    });
});
</script>


