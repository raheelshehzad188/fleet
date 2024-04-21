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
   <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-content border_box" >

                        <table class="table">
                            <thead>
                              <tr>
                        <th class="w-1">S.No</th>
                        <th>Company Name</th>
                        <th>Created Date</th>
                        <th>Editable</th>
                        <th>Action</th>
                     </tr>
                           </thead>
                           <tbody>
                     <?php if(!empty($type_staff)){  $count=1;
                        foreach($type_staff as $type_staff){
                            
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo $type_staff['name']; ?></td>
                        <td> <?php echo output($type_staff['create_at']); ?></td>
                        <td> <span class=" <?= ($type_staff['editable'] == 0) ? 'badge badge-success' : 'badge badge-error ' ?>"><?= ($type_staff['editable'] == 0) ? 'Editable' : 'Only Edit' ?></span></td>
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
            <?php $staff_update_data = $this->session->flashdata('staff_update_data'); 
                unset($_SESSION['staff_update_data']);
            ?>
   <div class="col-lg-5">
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
        <div class="form-group">
            <label for="geo_name"><?= (isset($detail['single'])?$detail['single']:'Somthing wrong') ?></label>
            <?php
            
            if ($staff_update_data) {
                $buttonText = "Update";
            } else {
                
                $buttonText = "Save";
            }
            ?>
            <input type="text" class="form-control" value="<?= (isset($staff_update_data) ? $staff_update_data['name'] : '') ?>" name="name" id="name" required="true" placeholder="Company Name">

        </div>
    </div>
    <button type="submit" id="submit_type" class="btn btn-primary"><?php echo $buttonText; ?></button>
</form>

         </div>
       </div>
       </div>
       
   </div>
            
</section>
