<style>
.select2{
    width:100% !important;
}
.buttons{
       display: flex;
    align-items: center;
    height: 100vh;
    justify-content: center;
    gap: 30px;
}
.buttons button{
    width:200px;
    height:50px;
}
    .content{
        padding:20px 0 ;
    }
    .icon{
        margin-right:5px;
    }
    .editable{
            
    color: white;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 700;
    padding: 3px;
    }
    .border_box{
        overflow:hidden;
            border: 1px solid #ddd;
    }
    #submit_type{
            float: right;
    padding: 8px 17px;
    overflow: hidden;
    }
    #type_name{
        height:45px;
    }
    .box_inner{
        padding:0;
        padding-bottom:17px !important;
    }
    .box_title{
            border-bottom: 1px solid #ddd;
    padding: 10px 17px;
    }
    .box_content{
        padding: 17px;
    }
    tr{
            height: 45px;
    }
    tr > td{
        vertical-align:middle;
    }
    
</style>

<div class="buttons">
    <button type="button" id="vendor" class="btn btn-primary">Vendor</button>
    <button type="button" id="customer" class="btn btn-primary">Customer</button>
</div>
<div class="content-header" id="content_show" style="display:none">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6 margin-left-15">
            <h1 class="m-0 text-dark title_change">
            </h1>
         </div>
      </div>
      
   </div>
</div>
<section class="content" style="display:none">
   <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-content border_box" >

                       
                        
                        
                        
                        <table id="cashflow_table" class="table">
    <thead>
        <tr>
            <th>ID</th>
             <th>Name</th>
              <th>Details</th>
           
            <th>Amount</th>
            <th>Cash In/Out</th>
            <th>Date</th>
             <th>Actions</th>
        </tr>
    </thead>
    <tbody>
     
    </tbody>
</table>


                    </div>
                </div>
            </div>
            <?php $staff_update_data = $this->session->flashdata('staff_update_data'); 
                unset($_SESSION['staff_update_data']);
            ?>
   <div class="col-lg-5">
          <div class="ibox float-e-margins">
                    <div class="ibox-content box_inner border_box">
                        <div class="box_title">
                        <h3 class="title_change"></h3>
                        </div>
                        <div class="box_content">
                           
                                    <form  method="post" action="<?php echo base_url(); ?>Drivers/add_cashflow">
                           
                           
    <div class="card-body">
             <div class="form-group">
            <label for="geo_name">Type</label>
            <select name="vc_name" class="form-control" id="vc_name">
                <option value="0">Vendor</option>
                <option value="1">Customer</option>
            </select>

        </div>
        <div class="form-group">
            <label for="geo_name">Cash In/Out</label>
            <select name="cash_in_out" class="form-control" id="cash_in_out">
                <option value="0">Cash In</option>
                <option value="1">Cash Out</option>
            </select>

        </div>
        <label for="geo_name">Enter Price</label>
            <input type="text" class="form-control"  name="price" id="price" required="true" placeholder="Enter Price">
            <input type="hidden"  value="" name="vc_type" id="vc_type">
            <div class="form-group" style="margin-top: 15px;">
                <label for="geo_name">Enter Reason</label>
                    <textarea class="form-control" name="details"  placeholder="Type Reason"></textarea>
            </div>
        </div>
    <button type="submit" id="submit_type" class="btn btn-primary">Add Now</button>
    </div>
    </form>

         </div>
       </div>
       </div>
       
   </div>
            
</section>
<script>
      $(document).ready(function() {
            // Initialize Select2 on the select element
            $('#vc_name').select2();
        });
        
        $('#vendor').click(function(){
            
            $('#vc_type').val('vendor');
            $('#content_show').show();
            $('.title_change').text('vendor');
            $('.content').show();
            $('.buttons').hide();
            fetchOptions('vendor');
             fetchCashflow('vendor');
        });
         $('#customer').click(function(){
            $('#vc_type').val('customer');
            $('#content_show').show();
            $('.title_change').text('customer');
             $('.content').show();
            $('.buttons').hide();
              fetchOptions('customer');
              fetchCashflow('customer');
        });
        
        
        
        
        function fetchOptions(type) {
    $.ajax({
        url: '<?php echo site_url("Drivers/get_options"); ?>',
        method: 'POST',
        data: {vc_type: type},
        dataType: 'json',
        success: function(response) {
            $('#vc_name').empty();
            $.each(response, function(index, option) {
                $('#vc_name').append($('<option>', {
                    value: option.c_id,
                    text: option.c_name
                }));
            });
            $('#vc_name').select2();
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}


function fetchCashflow(type) {
    var del_url = '<?= site_url("cashflow_del/") ?>';
    $.ajax({
        url: '<?php echo site_url("Drivers/get_cashflow"); ?>',
        method: 'POST',
        data: {vc_type: type},
        dataType: 'json',
        success: function(response) {
            // Clear existing table rows
            $('#cashflow_table tbody').empty();

            // Iterate over the fetched data and append rows to the table
            $.each(response, function(index, cashflow) {
                
                var cashInOutText = cashflow.cash_in_out == 0 ? 'cash in' : 'cash out';
               
                    
                var newRow = '<tr id="row-' + cashflow.id + '">' +
                    '<td>' + cashflow.id + '</td>' +
                    '<td>' + cashflow.vc_name + '</td>' +
                    '<td>' + cashflow.details + '</td>' +
                    '<td>' + cashflow.price + '</td>' +
                    '<td><span class="badge badge-success">' + cashInOutText + '</span></td>' +
                    '<td>' + cashflow.created_at + '</td>' +
                    '<td>' +
                    '<a href="#" data-id="' + cashflow.id + '" class="icon text-danger delete-row"><i class="fa fa-trash"></i></a>' +
                    '</td>' +
                    '</tr>';
                $('#cashflow_table tbody').append(newRow);
            });

            // Add event listener for delete buttons
            $('.delete-row').on('click', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                deleteRow(id);
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

function deleteRow(id) {
    var del_url = '<?= site_url("Drivers/cashflow_del/") ?>' + id;
    $.ajax({
        url: del_url,
        method: 'POST',
        success: function(response) {
            // Reload the page upon successful deletion
            location.reload();
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}


 
</script>
