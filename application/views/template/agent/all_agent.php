
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                          <!---table----->
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Agent List <small><?php echo $this->session->flashdata('smgdu');?></small></h2>
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
                      <table  id="datatable-buttons" class="table tablewhite table-striped table-bordered">
                        <thead>
                          <tr class="headings">
                            <th class="column-title" style="display: table-cell;">Agent Id </th>
                            <th class="column-title" style="display: table-cell;">Agent Name</th>
                            <th class="column-title" style="display: table-cell;">Phone </th>
                            <th class="column-title" style="display: table-cell;">action </th>
                          </tr>
                        </thead>

                        <tbody>
<?php 
    foreach ($AllAgentList as $agentData) {
?>
 <tr class="even pointer">
                            <td class=""><?php echo 'AG'.$agentData->agent_id;?></td>
                            <td class=" "><?php echo $agentData->agent_name;?></td>
                            <td class=" "><?php echo $agentData->mobile_no;?></td>
                            <td class=" last">
                               <a href="" class="btn btn-round " data-toggle="modal" data-target="#profile<?php echo $agentData->id?>">
                            <?php 
                              if($agentData->agent_image ==null){
                              ?>
                              <img src="<?php echo base_url();?>images/user.png" alt="..." class="img-circle profile_img" style="width:40px;margin:0px;" >
                            <?php
                              }elseif($agentData->agent_image){
                            ?>
                              <img src="<?php echo base_url();?>images/agent/<?php echo $agentData->agent_image ;?>" alt="..." class="img-circle profile_img" style="width:40px;margin:0px;" >
                            <?php
                              }
                            ?>
                            </a>
                              <a href="" class="btn btn-round btn-warning" data-toggle="modal" data-target="#editprofile<?php echo $agentData->id;?>" >E</a>
                              <?php if($pData->types =='Admin'){?>
                              <a href="" class="btn btn-round btn-danger" data-toggle="modal" data-target="#Remove<?php echo $agentData->id;?>">D</a>
                              <?php }?>
                            </td>
                            </td>
                          </tr>

<!--- model start---->
<!-- Modal profile view-->
<div class="modal fade" id="profile<?php echo $agentData->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" style="color:#000;">Profile view</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form class="" action="" method="post" novalidate>    
<center>
    <?php 
                              if($agentData->agent_image ==null){
                              ?>
                              <img src="<?php echo base_url();?>images/img.jpg" alt="..."  style="width:100px;margin:0px;" class="img-circle profile_img">
                            <?php
                              }elseif($agentData->agent_image){
                            ?>
                              <img src="<?php echo base_url();?>images/agent/<?php echo $agentData->agent_image ;?>" alt="..." style="width:100px;margin:0px;" class="img-circle profile_img">
                            <?php
                              }
                            ?>   
</center>
<br>
                                        
          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#000;">Agent_id<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" value="<?php echo $agentData->agent_id;?>" readonly/>
            </div>
         </div>      

          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#000;">Agent Name<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" value="<?php echo $agentData->agent_name;?>" readonly/>
            </div>
         </div>      
          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#000;">Agent Mobile<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" value="<?php echo $agentData->mobile_no;?>" readonly/>
            </div>
         </div>      
          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#000;">Gender<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" value="<?php echo $agentData->gender;?>" readonly/>
            </div>
         </div>      
          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#000;">Address<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" value="<?php echo $agentData->address;?>" readonly/>
            </div>
         </div> 
          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align"style="color:#000;">Agent Details<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" value="<?php echo $agentData->agent_details;?>" readonly/>
            </div>
         </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal Profile Edit-->
<div class="modal fade" id="editprofile<?php echo $agentData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"style="color:#000;">Profile Edit</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

 <?php echo form_open_multipart('Agent/updateAgent');?>   
      <center>
          <?php 
              if($agentData->agent_image ==null){
              ?>
               <img src="<?php echo base_url();?>images/img.jpg" alt="..."  style="width:100px;margin:0px;" class="img-circle profile_img">
                 <?php
                    }elseif($agentData->agent_image){
                ?>
                <img src="<?php echo base_url();?>images/agent/<?php echo $agentData->agent_image ;?>" alt="..." style="width:100px;margin:0px;" class="img-circle profile_img">
                <?php   }   ?>   
      </center>
        <input type="hidden" name="id" value="<?php echo $agentData->id;?>">

        <input type="hidden" name="old_image" value="<?php echo $agentData->agent_image;?>">

        <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align"style="color:#000;">Agent image<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input type="file" class="form-control"  name="agent_image" value="<?php echo $agentData->agent_id;?>" />
            </div>
         </div> 
                                        
          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align"style="color:#000;">Agent_id<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" type="text" name="agent_id" value="<?php echo $agentData->agent_id;?>" />
            </div>
         </div>      

          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align"style="color:#000;">Agent Name<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" type="text" name="agent_name"  value="<?php echo $agentData->agent_name;?>" />
            </div>
         </div>   
          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align"style="color:#000;">Balanch<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" type="text" name="balance"  value="<?php echo $agentData->balance;?>" />
            </div>
         </div>      
          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align"style="color:#000;">Agent Mobile<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" type="text" name="mobile_no" value="<?php echo $agentData->mobile_no;?>" />
            </div>
         </div>      

          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align"style="color:#000;">Gender<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" name="gender" value="<?php echo $agentData->gender;?>" />
            </div>
         </div>      


          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align"style="color:#000;">Address<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" name="address" value="<?php echo $agentData->address;?>" />
            </div>
         </div> 
          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align" style="color:#000;">Agent Details<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" name="agent_details" value="<?php echo $agentData->agent_details;?>" />
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
<div class="modal fade" id="Remove<?php echo $agentData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" style="color:#000;"> Agent Name:##<?php echo $agentData->agent_name;?> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

<form action="<?php echo base_url('Agent/removeAgent/');?><?php echo $agentData->id;?>" method="post">
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