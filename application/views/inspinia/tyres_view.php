 <style type="text/css">
   .nav > li > a {
     color: #000 !important; 
    font-weight: 600;
    padding: 10px 20px 10px 25px;
}
.tab-content{
  display: block;
}

 </style>
   <!-- /.content-wrapper -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
      
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tyre Details
            </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      
    <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
               
                <h3 class="profile-username text-center"><?= ucwords($vehicledetails['tyre_name']); ?></h3>

                <p class="text-muted text-center"><?= ucwords($vehicledetails['tyre_number']); ?></p>

                

               

               

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col -->
          <input type="hidden" name="" value="<?php echo $v_id ?>" id="vehicle_id">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                   <li class="nav-item"><a class="nav-link active" href="#basicinfo" data-toggle="tab">Basic Info</a></li>
                  <li class="nav-item"><a class="nav-link " href="#bookings" data-toggle="tab">Assign Tyre</a></li>
             
                </ul>
              </div><!-- /.card-header -->
             
              <div class="card-body">
                <div class="tab-content">
                        
                  <div class="tab-pane " id="bookings">

                    <div class="table-responsive">
            <div class="ibox-content">
             <table id="bookingstbl2" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>Sr/No.</th>
                <th>Vehicle Name</th>
                <th>Registration Number	</th>
                <th>Model</th>
                <th>Chassis No</th>
                <th>Assign Meter</th>
                <th>Assign Date</th>
                <th>Closing Meter</th>
                <th>Closing Date</th>
                
               
              </tr>
            </thead>
            <tbody>
                
        
        
            </tbody>
          </table>
        </div>         
        </div>
                  
                  </div>
                 
                  
                  
                  
                  
                  <!-- /.tab-pane -->

                  <div class="tab-pane active" id="basicinfo">
                    <table class="table table-sm table-bordered">
                  <tbody>
                    <tr>
                      <td>Tyre Name</td>
                      <td><?= output($vehicledetails['tyre_name']) ?></td>
                    </tr>
                    <tr>
                      <td>Tyre Number</td>
                      <td><?= output($vehicledetails['tyre_number']) ?></td>
                    </tr>
                    <tr>
                      <td>Company</td>
                      <td><?= output($company['name']) ?></td>
                    </tr>
                    <tr>
                      <td>Purchasing Date.</td>
                      <td><?= output($vehicledetails['purchasing_date']) ?></td>
                    </tr>
                    <tr>
                      <td>Amout.</td>
                      <td><?= output($vehicledetails['amount']) ?></td>
                    </tr>
                    <tr>
                      <td>Tyre Run</td>
                      <td><?= output($vehicledetails['tyre_run']) ?></td>
                    </tr>
            
                  </tbody>
                </table>
                <div class="col-sm-3">
                  <a href="<?= base_url(); ?>tyres/edittyres/<?= $vehicledetails['id']; ?>">
                   <button type="button" class="btn btn-block btn-success btn-sm">Edit Info</button>
                 </a>
                </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    // Initialize Select2
    $(document).ready(function() {
        $('.select2').select2();
    });
    
    
    $(document).ready(function() {
    $('.assign_tyres').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '<?= base_url()?>vehicle/assign_tyres', 
            data: formData,
            success: function(response) {
                
                console.log(response);
             
            },
            error: function(xhr, status, error) {
               
                console.error(xhr.responseText);
            }
        });
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    var dataTable = $('#bookingstbl2').DataTable({

        "ajax": {
            url : "<?= base_url()?>tyres/assign_tyres_table",
            type : 'POST',
            data: function(d) {
               
                d.v_id = $('#vehicle_id').val();
           
            }
        },
         "footerCallback": function (row, data, start, end, display) {
            var api = this.api();
            $(api.column(2).footer()).html(
                api.column(2, {page: 'current'}).data().reduce(function (a, b) {
                    return parseFloat(a) + parseFloat(b);
                }, 0)
            );
        }
    });
    $('#submit').click(function(e) {
        e.preventDefault();
        dataTable.ajax.reload();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    var dataTable = $('#fueltable1').DataTable({

        "ajax": {
            url : "<?= base_url()?>vehicle/fuel_trip_table",
            type : 'POST',
            data: function(d) {
                d.start_date = $('#t_start_date_f').val();
                d.end_date = $('#t_end_date_f').val();
                d.v_id = $('#vehicle_id').val();
            }
        },
         "footerCallback": function (row, data, start, end, display) {
            var api = this.api();
            $(api.column(2).footer()).html(
                api.column(2, {page: 'current'}).data().reduce(function (a, b) {
                    return parseFloat(a) + parseFloat(b);
                }, 0)
            );
        }
    });
    $('#submit').click(function(e) {
        e.preventDefault();
        dataTable.ajax.reload();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    var dataTable = $('#tyerstable1').DataTable({
      
        "ajax": {
            url : "<?= base_url()?>vehicle/Tyerstable",
            type : 'POST',
            data: function(d) {
                d.vih_type = $('#vih_type').val();
                d.v_id = $('#vehicle_id').val();
            }
        },
        });
  
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    var dataTable = $('#incomexpenstbl1').DataTable({

        "ajax": {
            url : "<?= base_url()?>vehicle/expense_trip_table",
            type : 'POST',
            data: function(d) {
                d.start_date = $('#t_start_date_f').val();
                d.end_date = $('#t_end_date_f').val();
                d.v_id = $('#vehicle_id').val();
            }
        },
         "footerCallback": function (row, data, start, end, display) {
            var api = this.api();
            $(api.column(2).footer()).html(
                api.column(2, {page: 'current'}).data().reduce(function (a, b) {
                    return parseFloat(a) + parseFloat(b);
                }, 0)
            );
        }
    });
    $('#submit').click(function(e) {
        e.preventDefault();
        dataTable.ajax.reload();
    });
});
</script>
