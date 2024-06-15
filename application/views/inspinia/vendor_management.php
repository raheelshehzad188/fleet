<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6 head_box">
            <h1 class="m-0 text-dark">Vendor Info
            </h1>
         </div>
        
      </div>
   </div>
</div>
<section class="content">
   <div class="container-fluid">
      <div class="card">
         <div class="card-body p-0">
            <div class="table-responsive">
               <div class="ibox-content">
               <table id="custtbl" class="table card-table table-vcenter">
                  <thead>
                     <tr>
                        <th class="w-1">S.No</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Status</th>
                        <?php if(userpermission('lr_cust_edit') || userpermission('lr_cust_del')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($customerlist)){ 
                     $count=1;
                        foreach($customerlist as $customerlists){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo output($customerlists['c_name']); ?></td>
                        <td> <?php echo output($customerlists['c_mobile']); ?></td>
                        <td><?php echo output($customerlists['c_email']); ?></td>
                        <td><?php echo output($customerlists['c_address']); ?></td>
                         <td>  <span class="badge <?php echo ($customerlists['c_isactive']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($customerlists['c_isactive']=='1') ? 'Active' : 'Inactive'; ?></span>  </td>
                       
                        <td>
                           <a class="icon" href="<?php echo base_url(); ?>vendor/editvendor/<?php echo output($customerlists['c_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a>
                          
                              <a data-toggle="modal" href="" onclick="confirmation('<?php echo base_url(); ?>vendor/deletevendor','<?= output($customerlists['c_id']); ?>')" data-target="#deleteconfirm" class="icon text-danger" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
                           </a> 
                         
                        </td>
                        <?php } ?>
                     </tr>
                     <?php  } ?>
                  </tbody>
               </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
