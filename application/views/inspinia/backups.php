<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6 margin-left-15">
            <h1 class="m-0 text-dark">Backup's List
            </h1>
         </div>
         <!-- /.col -->
      </div>
      <a href="<?php echo base_url(); ?>backups/backup">  <button class="btn btn-primary">Backup</button></a>
   </div>
</div>


<section class="content">
   <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                    </div>
                    <div class="ibox-content">

                        <table id="custtbl" class="table">
                  <thead>
                     <tr>
                        <th class="w-1">S.No</th>
                        <th>File Name</th>
                        
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($userlist)){ $count=1;
                        foreach($userlist as $userlists){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo output($userlists['backup']); ?></td>
                      
                        <td>
                           <a class="icon" href="<?php echo base_url(); ?>backups/download/<?php echo output($userlists['backup']); ?>">
                           <i class="fa fa-upload"></i>
                           </a>
                        </td>
                     </tr>
                     <?php } } ?>
                  </tbody>
               </table>

                    </div>
                </div>
            </div>
 
</section>