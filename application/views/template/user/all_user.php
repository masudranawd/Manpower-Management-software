
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <!--<div class="page-title">
                        <div class="title_left">
                            <h3>Form Validation</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                          <!---table----->
                <div class="x_panel">
                  <div class="x_title">
                    <h2> User List <small></small></h2>
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
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title" style="display: table-cell;">user Name</th>
                            <th class="column-title" style="display: table-cell;">Full Name</th>
                            <th class="column-title" style="display: table-cell;">User Type </th>
                            <th class="column-title" style="display: table-cell;">Status </th>
                            <th class="column-title" style="display: table-cell;">action </th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
                              foreach ($AlluserData as  $userData) {
                          ?>
                          <tr class="even pointer">
                            <td class=""><?php echo $userData->user_id;?></td>
                            <td class=" "><?php echo $userData->fullname;?></td>
                            <td class=" "><?php echo $userData->types;?></td>
                            <td class=" ">

              <?php 
                if($userData->permission==0){
              ?>
               <a href="<?php echo base_url('index.php/User/UserpermissionActiveMethod/'); ?><?php echo $userData->id; ?>" class="btn btn-round btn-warning">Active</a>
              <?php 
                }else{
              ?> 
              <a href="<?php echo base_url('index.php/User/UserpermissionInActiveMethod/'); ?><?php echo $userData->id; ?>" class="btn btn-round btn-danger">Inactive</a>
              <?php 
                }
              ?>    
                  


                            </td>

                            <td class=" last">
                              <a href="" class="btn btn-round btn-warning" data-toggle="modal" data-target="#editprofile<?php echo $userData->id;?>" >E</a>   

                             <a href="" class="btn btn-round btn-danger btn-xs"  data-toggle="modal" data-target="#Remove<?php echo $userData->id;?>">D</a>
                          
                          </td>
                        </tr>


<!--- remove model  ---->
<div class="modal fade" id="Remove<?php echo $userData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"> User Name:# <?php echo $userData->fullname;?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

<form action="<?php echo base_url('User/userRemoveById/');?><?php echo $userData->id;?>" method="post">
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

<!-- Modal Profile Edit-->
<div class="modal fade" id="editprofile<?php echo $userData->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Profile Edit</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form class="" action="<?php echo base_url('User/UpdateUser');?>" method="post" novalidate>
                                     
          <input type="hidden" name="id" value="<?php echo $userData->id;?>">
          <div class="field item form-group">
            <label class="col-form-label col-md-2 col-sm-3  label-align">User Name<span class="required">*</span></label>
            <div class="col-md-10 col-sm-6">
                <input class="form-control" value="<?php echo $userData->user_id;?>" name="user_id"/>
            </div>
         </div>
                                       
                                     
            <div class="field item form-group">
                <label class="col-form-label col-md-2 col-sm-3  label-align">Full Name<span class="required">*</span></label>
                <div class="col-md-10 col-sm-6">
                   <input class="form-control" name="fullname" value="<?php echo $userData->fullname;?>" />
                </div>
           </div>
          <div class="field item form-group">
             <label class="col-form-label col-md-2 col-sm-3  label-align">Types<span class="required">*</span></label>
                   <div class="col-md-10 col-sm-6">
                      <select class="form-control" name="types" > 
                        <?php 
                          if ($userData->types == 'Admin') {
                       ?>

                        <option >Select Type</option>
                        <option value="Admin" selected="">Admin</option>
                        <option value="Manager">Manager</option>
                        <option value="Operator">Operator</option>
                        <option value="Editor">Editor</option>
                        <option value="Accounts">Accounts</option>
                       <?php
                          }elseif ($userData->types == 'Manager') {
                       ?>

                        <option >Select Type</option>
                        <option value="Admin">Admin</option>
                        <option value="Manager" selected="">Manager</option>
                        <option value="Operator">Operator</option>
                        <option value="Editor">Editor</option>
                        <option value="Accounts">Accounts</option>
                       <?php
                          }elseif ($userData->types == 'Operator') {
                       ?>

                        <option >Select Type</option>
                        <option value="Admin">Admin</option>
                        <option value="Manager">Manager</option>
                        <option value="Operator" selected="">Operator</option>
                        <option value="Editor">Editor</option>
                        <option value="Accounts">Accounts</option>
                       <?php
                          }elseif ($userData->types == 'Editor') {
                       ?>

                        <option >Select Type</option>
                        <option value="Admin">Admin</option>
                        <option value="Manager">Manager</option>
                        <option value="Operator">Operator</option>
                        <option value="Editor" selected="">Editor</option>
                        <option value="Accounts">Accounts</option>
                       <?php
                          }elseif ($userData->types == 'Accounts') {
                       ?>

                        <option >Select Type</option>
                        <option value="Admin">Admin</option>
                        <option value="Manager">Manager</option>
                        <option value="Operator">Operator</option>
                        <option value="Editor">Editor</option>
                        <option value="Accounts" selected="">Accounts</option>
                       <?php
                          }else{
                        ?>
                        <option >Select Type</option>
                        <option value="Admin">Admin</option>
                        <option value="Manager">Manager</option>
                        <option value="Operator">Operator</option>
                        <option value="Editor">Editor</option>
                        <option value="Accounts">Accounts</option>
                        <?php
                          }
                        ?>
                      </select>
                   </div>
          </div>           
           <!--start--->
          <div class="field item form-group">
             <label class="col-form-label col-md-2 col-sm-3  label-align">Phone No.<span class="required">*</span></label>
              <div class="col-md-10 col-sm-6">
                 <input class="form-control" class='optional' name="phone"  type="text"  value="<?php echo $userData->phone;?>" />
              </div>
          </div>
          <!--end--->
         
         <!--start--->
            <div class="field item form-group">
                <label class="col-form-label col-md-2 col-sm-3  label-align">Address <span class="required">*</span></label>
                 <div class="col-md-10 col-sm-6">
                    <textarea class="form-control" rows="1.5" name="address">
                      <?php echo $userData->address;?>
                    </textarea>
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
            </div>
            <!-- /page content -->