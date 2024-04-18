    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Bookings
            </h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <?php
        //   echo "<pre>";
        //   print_r($customerlist);
        //   var_dump($customerlist);
                 ?>
      <form method="post" id="trip_add" class="card" action="" novalidate="novalidate">
         <div class="card-body">
            <div class="row">       
               <div class="col-sm-6 col-md-3">
                  <label class="form-label">Staff Name<span class="form-required">*</span></label>
                  <div class="form-group">
                     <select id="t_customer_id" class="form-control" required="true" name="t_customer_id">
                        <option value="">Select Staff Member</option>
                        <?php foreach ($customerlist as $key => $customerlists) { ?>
                        <option value="<?php echo output($customerlists['d_id']) ?>"><?php echo output($customerlists['d_name']) ?></option>
                        <?php  } ?>
                        </select>
                  </div>
               </div>
                 <div class="col-sm-6 card-footer">
               <button type="submit" class="btn btn-primary" id="submit">Submit</button>
            </div>

            </div>
            </div>
            </form>
    <div class="card">

        <div class="card-body p-0">
          

         <div class="table-responsive">
            <div class="ibox-content">
             <table id="item-list" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>Sr/No.</th>
                <th>Customer Name</th>
                <th>Salary</th>
                <th>Total Amount</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
        
        
            </tbody>
          </table>
          
        </div>         
        </div>
        <!-- /.card-body -->
      </div>
      </div>
      
             </div>
    </section>
    <!-- /.content -->

<script type="text/javascript">
$(document).ready(function() {
    var dataTable = $('#item-list').DataTable({
        "ajax": {
            url : "<?= base_url()?>drivers/salary_table",
            type : 'POST',
            data: function(d) {
                d.t_customer_id = $('#t_customer_id').val(); 
                }
        },
    });
    $('#submit').click(function(e) {
        e.preventDefault();
        dataTable.ajax.reload();
    });
});
</script>


