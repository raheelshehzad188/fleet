<style>
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
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6 margin-left-15">
            <h1 class="m-0 text-dark"><?= (isset($detail['pul'])?$detail['pul']:'Somthing wrong'); ?>
            </h1>
         </div>
      </div>
      
   </div>
</div>
<section class="content">

<?php $staff_update_data = $this->session->flashdata('staff_update_data'); 
                unset($_SESSION['staff_update_data']);
            ?>
   <div class="col-lg-12">
          <div class="ibox float-e-margins">
                    <div class="ibox-content box_inner border_box">
                        <div class="box_title">
                        <h3><?= (isset($staff_update_data) ? 'Update '.(isset($detail['single'])?$detail['single']:'Somthing wrong') : 'Add New '.(isset($detail['single'])?$detail['single']:'Somthing wrong'))?></h3>
                        </div>
                        <div class="box_content">
                            <?php
                            $tbl = (isset($detail['tbl'])?$detail['tbl']:' ');
                                if(isset($staff_update_data))
                                {
                                    ?>
                                    <form id="staff_type" method="post" action="<?php echo base_url(); ?>settings/crud/<?= $detail['tbl'] ?>/update/<?= $staff_update_data['staff_update_id'] ?>">
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <form id="staff_type" method="post" action="<?php echo base_url(); ?>settings/crud/<?= $detail['tbl'] ?>/add">
                                    <?php
                                }
                            ?>
    <div class="card-body">
    <div class="row">
        <div class="col-lg-4">
        <div class="form-group">
            <label for="geo_name">Company</label>
            <select name="company" class="form-control">
                <?php
               
                
                if (!empty($type_companies)) {
                    foreach($type_companies as $type_companies){
                        ?>
                       
                       <option value="<?= $type_companies['id']  ?>" <?= (isset($staff_update_data) && $staff_update_data['company'] == $type_companies['id']) ? 'selected' : ''; ?>><?= $type_companies['name']  ?></option>
                       <?php
                    }

                }
                ?>
              
               
            </select>

        </div>
        </div>

        <div class="col-lg-4">
        <div class="form-group">
            <label for="geo_name">Tyre Name</label>
            
            <input type="text" class="form-control" value="<?= (isset($staff_update_data) ? $staff_update_data['tyre_name'] : '') ?>" name="tyre_name" id="tyre_name" required="true" placeholder="Tyre name">

        </div>
        </div>
        <div class="col-lg-4">
        <div class="form-group">
            <label for="geo_name">Tyre Number</label>
            <?php
            
            if ($staff_update_data) {
                $buttonText = "Update";
            } else {
                
                $buttonText = "Save";
            }
            ?>
            <input type="text" class="form-control" value="<?= (isset($staff_update_data) ? $staff_update_data['tyre_number'] : '') ?>" name="tyre_number" id="tyre_number" required="true" placeholder="Tyre number">

        </div>
        </div>
        <div class="col-lg-4">
        <div class="form-group">
                        <label class="form-label">Date of Joining<span class="form-required">*</span></label>
                        <input type="text" value="<?php echo (isset($staff_update_data)) ? $staff_update_data['purchasing_date'] :'' ?>" name="purchasing_date" class="form-control datepicker" placeholder="Date of Joining" >
                      </div>
        </div>

        <div class="col-lg-4">
        <div class="form-group">
            <label for="geo_name">Amount</label>
            
            <input type="text" class="form-control" value="<?= (isset($staff_update_data) ? $staff_update_data['amount'] : '') ?>" name="amount" id="amount" required="true" placeholder="Amount">

        </div>
        </div>


        <div class="col-lg-4">
        <div class="form-group">
            <label for="geo_name">Tire Trails</label>
            
            <input type="text" class="form-control" value="<?= (isset($staff_update_data) ? $staff_update_data['tyre_run'] : '') ?>" name="tyre_run" id="tyre_run" required="true" placeholder="Tire Trails">

        </div>
        </div>
    </div>
        
       

      
    </div>
    <button type="submit" id="submit_type" class="btn btn-primary"><?php echo $buttonText; ?></button>
</form>

         </div>
       </div>
       </div>
       
   </div>
   <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content border_box" >

                        <table class="table">
                            <thead>
                              <tr>
                        <th class="w-1">S.No</th>
                        <th>Tyre Name</th>
                        <th>Tyre Number</th>
                        <th>Purchasing Date</th>
                        <th>Amount</th>
                        <th>Tire Trials</th>
                       
                        <th>Action</th>
                     </tr>
                           </thead>
                           <tbody>
                     <?php if(!empty($type_staff)){  $count=1;
                        foreach($type_staff as $type_staff){
                            
                            
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo $type_staff['tyre_name']; ?></td>
                        <td> <?php echo $type_staff['tyre_number']; ?></td>
                        <td> <?php echo $type_staff['purchasing_date']; ?></td>
                        <td> Rs <?php echo $type_staff['amount']; ?></td>
                        <td> <?php echo $type_staff['tyre_run']; ?></td>

                        <td>
                           <a class="icon" href="<?php echo base_url(); ?>settings/crud/<?= $detail['tbl']?>/edit/<?php echo $type_staff[$detail['key']]; ?>">
                           <i class="fa fa-edit text-success"></i>
                           </a> 
                           <?php 
                            if($type_staff['editable'] == 0){
                           ?>
                            <a class="icon mx-2 mr-2" href="<?php echo base_url(); ?>settings/crud/<?= $detail['tbl']?>/delete/<?php echo $type_staff[$detail['key']]; ?>">
                           <i class="fa fa-trash text-danger"></i>
                           </a> 
                           <?php } ?>
                        </td>
                     </tr>
                     <?php } } ?>
                  </tbody>
                        </table>

                    </div>
                </div>
            </div>
        
            
</section>
