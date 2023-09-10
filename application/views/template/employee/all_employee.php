
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                          <!---table----->
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Employee List <small><?php echo $this->session->flashdata('smgdu');?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="table-responsive">
                      <table  id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                          <tr class="headings">
                            <th class="column-title" style="display: table-cell;">Employee Id </th>
                            <th class="column-title" style="display: table-cell;">Employee Name</th>
                            <th class="column-title" style="display: table-cell;">Phone </th>
                            <th class="column-title" style="display: table-cell;">Designation </th>
                            <th class="column-title" style="display: table-cell;">action </th>
                          </tr>
                        </thead>

                        <tbody>
<?php 
    foreach ($AllEmployList as $employeeData) {
?>
 <tr class="even pointer">
                            <td class=""><?php echo $employeeData->employ_id;?></td>
                            <td class=" "><?php echo $employeeData->name;?></td>
                            <td class=" "><?php echo $employeeData->phone;?></td>
                            <td class=" "><?php echo $employeeData->designation;?></td>
                            <td class=" last">
                               <a href="" class="btn btn-round " data-toggle="modal" data-target="#profile<?php echo $employeeData->id?>">
                            <?php 
                              if($employeeData->image ==null){
                            ?>
                              <img src="<?php echo base_url();?>images/user.png" alt="..." class="img-circle profile_img" style="width:40px;margin:0px;" >
                            <?php
                              }elseif($employeeData->image){
                            ?>
                              <img src="<?php echo base_url();?>images/employee/<?php echo $employeeData->image ;?>" alt="..." class="img-circle profile_img" style="width:40px;margin:0px;" >
                            <?php
                              }
                            ?>
                            </a>
                              <a href="" class="btn btn-round btn-warning" data-toggle="modal" data-target="#editprofile<?php echo $employeeData->id;?>" >E</a>
                              <?php if($pData->types =='Admin'){?>
                              <a href="" class="btn btn-round btn-danger" data-toggle="modal" data-target="#Remove<?php echo $employeeData->id;?>">D</a>
                              <?php }?>
                            </td>
                            </td>
                          </tr>

<!--- model start---->
<!-- Modal profile view-->
<div class="modal fade" id="profile<?php echo $employeeData->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Profile view</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form class="" action="" method="post" novalidate>    
<center>
    <?php  if($employeeData->image ==null){ ?>
    <img src="<?php echo base_url();?>images/img.jpg" alt="..."  style="width:100px;margin:0px;" class="img-circle profile_img">
    <?php }elseif($employeeData->image){ ?>
    <img src="<?php echo base_url();?>images/employee/<?php echo $employeeData->image;?>" alt="..." style="width:100px;margin:0px;" class="img-circle profile_img">
    <?php } ?>   
</center>
<br>
                                        
          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align">employ_id<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" value="<?php echo $employeeData->employ_id;?>" readonly/>
            </div>
         </div>      

          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align">Name<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" value="<?php echo $employeeData->name;?>" readonly/>
            </div>
         </div>      
          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align">Mobile<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" value="<?php echo $employeeData->phone;?>" readonly/>
            </div>
         </div>           
          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align">Address<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" value="<?php echo $employeeData->address;?>" readonly/>
            </div>
         </div> 
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal Profile Edit-->
<div class="modal fade" id="editprofile<?php echo $employeeData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Profile Edit</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

 <?php echo form_open_multipart('Employee/updateEmployee');?>   
      <center>
          <?php 
              if($employeeData->image ==null){
              ?>
               <img src="<?php echo base_url();?>images/user.png" alt="..."  style="width:100px;margin:0px;" class="img-circle profile_img">
                 <?php
                    }elseif($employeeData->image){
                ?>
                <img src="<?php echo base_url();?>images/employee/<?php echo $employeeData->image ;?>" alt="..." style="width:100px;margin:0px;" class="img-circle profile_img">
                <?php   }   ?>   
      </center>
        <input type="hidden" name="id" value="<?php echo $employeeData->id;?>">

        <input type="hidden" name="old_image" value="<?php echo $employeeData->image;?>">

        <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align">image<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input type="file" class="form-control"  name="image" value="<?php echo $employeeData->image;?>" />
            </div>
         </div> 
                                        
          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align">employ_id<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" type="text" name="employ_id" value="<?php echo $employeeData->employ_id;?>" />
            </div>
         </div>      

          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align">Name<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" type="text" name="name"  value="<?php echo $employeeData->name;?>" />
            </div>
         </div> 
          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align"><span class="required">Designation</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" type="text" name="designation"  value="<?php echo $employeeData->designation;?>" />
            </div>
         </div>   

          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align">Mobile<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" type="text" name="phone" value="<?php echo $employeeData->phone;?>" />
            </div>
         </div>      
          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align">Address<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" name="address" value="<?php echo $employeeData->address;?>" />
            </div>
         </div> 
          <div class="ln_solid">
            <div class="form-group">
               <div class="col-md-6 offset-md-3">
                   <button type='submit' class="btn btn-primary">Save</button>
                    <button type='reset' class="btn btn-success">Cancel</button>
                 </div>
            </div>
          </div>
         </form>
      </div>
    </div>
  </div>
</div>
<!--- model end ----->


<!--- remove model  ---->
<div class="modal fade" id="Remove<?php echo $employeeData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"> Agent Name:##<?php echo $employeeData->name;?> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

<form action="<?php echo base_url('Employee/removeEmployee/');?><?php echo $employeeData->id;?>" method="post">
          <div class="field item form-group">
            <label class="col-form-label col-md-12 col-sm-3  label-align" style="color:red;font-size: 1.3rem;font-weight: 900;text-align: center;">  Are You Sure ? Remove It. </label>
         </div>     

          <div class="ln_solid">
            <div class="form-group">
               <div class="col-md-6 offset-md-3">
                   <button type='submit' class="btn btn-primary">Yes</button>
                    <button type='reset' class="btn btn-success">No</button>
                 </div>
            </div>
          </div>
         </form>
      </div>
    </div>
  </div>
</div>
<!--- model end ----->
<?php
    }
?>
                         

                        </tbody>
                      </table>
                    </div>
              
            
                  </div>
                </div>
              </div>
            </div>
        </div>
            <!-- /page content -->
<!--- model start---->